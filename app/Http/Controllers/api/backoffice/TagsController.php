<?php

namespace App\Http\Controllers\api\backoffice;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\ArticleTags;
use App\Models\Tags;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TagsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagsCount = Tags::where("visible", 1)->count();

        if ($tagsCount == 0) {

            return $this->sendResponse(['tagsCount'=>$tagsCount ,'status' => 401,], 'Aucun Tag n\'est enregistré.');

        } else {

            $tags = Tags::query();

            if(request('search')){

                $tags = DB::table("tags") ->select(array("tags.id", "tags.name", "tags.slug" , "tags.count" ,"tags.updated_at" ,DB::raw('COUNT(article_tags.id) as articles')))
                ->where('tags.visible', '=', 1)
                ->where('tags.name', 'like', '%'. request('search') . '%')
                ->orWhere('tags.slug', 'like', '%'. request('search') . '%')
                ->orWhere('tags.count', 'like', '%'. request('search') . '%')
                ->orWhere('tags.updated_at', 'like', '%'. request('search') . '%')
                ->leftJoin("article_tags", "article_tags.tag_id", "=", "tags.id")
                ->groupBy("tags.id", "tags.name", "tags.slug", "tags.count" ,"tags.updated_at")
                ->orderBy('articles', 'desc')
                ->paginate(10);

            }else{

                $tags = DB::table("tags") ->select(array("tags.id", "tags.name", "tags.slug", "tags.count" , "tags.updated_at" ,DB::raw('COUNT(article_tags.id) as articles')))
                ->where('tags.visible', '=', 1)
                ->leftJoin("article_tags", "article_tags.tag_id", "=", "tags.id")
                ->groupBy("tags.id", "tags.name", "tags.slug", "tags.count" ,"tags.updated_at")
                ->orderBy('articles', 'desc')
                ->paginate(10);

            }

            return $this->sendResponse(['tags'=>$tags, 'tagsCount'=>$tagsCount,'status' => 200,], 'Liste de tous les tags.');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->all();

        $validator = Validator::make($datas, [
            'name' => ['required', 'string', 'unique:categories' ,'max:255'],
        ],[
            'name.required' => 'Le :attribute est obligatoire.'
        ], [
            'name' => 'tag'
        ]);

        if ($validator->fails()) {

            return $this->sendError('Erreur de validation', $validator->errors());

        }

        if (isset($datas['name']) && !empty($datas['name'])) {

            $datas['slug'] = str_replace(' ', '-', strtolower($datas['name']));

        }

        $category = Tags::create([
            'name' => $datas['name'],
            'slug' =>  $datas['slug'],
        ]);

        return $this->sendResponse(['category' => $category, 'status' => 200 ], 'Votre tag a ete créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        try {

            $category = Tags::where('slug', $slug)->where("visible", 1)->first();

            return $this->sendResponse(['category' => $category, 'status' => 200 ], 'Votre tag a été selectionnée.');

        } catch (ModelNotFoundException $modelNotFoundException){

            return $this->sendError('Aucun tag trouvé.');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $datas = $request->all();

        $validator = Validator::make($datas, [
            'name' => ['required', 'string', 'max:255'],
        ],[
            'name.required' => 'Le :attribute est obligatoire.'
        ], [
            'name' => 'tag'
        ]);

        if ($validator->fails()) {

            return $this->sendError('Erreur de validation', $validator->errors());

        }

        if (isset($datas['name']) && !empty($datas['name'])) {

            $datas['slug'] = str_replace(' ', '-', strtolower($datas['name']));

        }

        $category = Tags::where('slug', $slug)->where("visible", 1)->first();

        $category->update($datas);

        return $this->sendResponse(['category' => $category, 'status' => 200 ], 'Votre tag a été modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $category = Tags::where('slug', $slug)->where("visible", 1)->first();

        $articles = ArticleTags::where('tag_id', '=', $category->id)->where("visible", 1)->get();

        foreach ($articles as $article) {


            $article->visible = 0;


            $article->update();
        }


        $category->visible = 0;

        $category->update();

        return $this->sendResponse(['category' => $category, 'status' => 200 ], "Le tag a été supprimé avec succès.");
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all($slug)
    {
        $categoryCount = Tags::where('visible', 1)->count();

        $author = Tags::where('slug', $slug)->where('visible', 1)->first();

        if ($author == null) {

            return $this->sendResponse([ 'slug' => $slug, 'author' => 0, 'status' => 404, 'articleCount' => 0, 'articlePublishCount' => 0, 'articleNotPublishCount' => 0], 'Ce tag n\'existe pas');
       
        } else {

            if ($categoryCount == 0) {

                return $this->sendResponse([ 'slug' => $slug,'author' => $author->name, 'status' => 401, 'articleCount' => 0, 'articlePublishCount' => 0, 'articleNotPublishCount' => 0], 'Aucun tag n\'est enregistré.');
    
            } else {
    
                $articleCount = DB::table("articles") ->select(array("articles.id", "articles.title", "articles.slug" , "articles.visible" ,"articles.status" , "articles.updated_at" , "articles.date_publish", "article_tags.tag_id", "tags.name as tagName" ))
                ->where("articles.visible", 1)
                ->where('article_tags.tag_id', $author->id)
                ->leftJoin("article_tags", "article_tags.id", "=", "articles.id")
                ->leftJoin("tags", "tags.id", "=", "article_tags.tag_id")
                ->count();
    
                $articlePublishCount = DB::table("articles") ->select(array("articles.id", "articles.title", "articles.slug" , "articles.visible" ,"articles.status" , "articles.updated_at" , "articles.date_publish", "article_tags.tag_id", "tags.name as tagName" ))
                ->where("articles.visible", 1)
                ->where("articles.status", 1)
                ->where('article_tags.tag_id', $author->id)
                ->leftJoin("article_tags", "article_tags.id", "=", "articles.id")
                ->leftJoin("tags", "tags.id", "=", "article_tags.tag_id")
                ->count();
    
                $articleNotPublishCount = DB::table("articles") ->select(array("articles.id", "articles.title", "articles.slug" , "articles.visible" ,"articles.status" , "articles.updated_at" , "articles.date_publish", "article_tags.tag_id", "tags.name as tagName" ))
                ->where("articles.visible", 1)
                ->where("articles.status", 0)
                ->where('article_tags.tag_id', $author->id)
                ->leftJoin("article_tags", "article_tags.id", "=", "articles.id")
                ->leftJoin("tags", "tags.id", "=", "article_tags.tag_id")
                ->count();
    
                if ($articleCount == 0) {
        
                    return $this->sendResponse(['slug' => $slug,'author' => $author->name, 'status' => 401,'articleCount' => $articleCount, 'articlePublishCount' => $articlePublishCount, 'articleNotPublishCount' => $articleNotPublishCount ], 'Aucun article de ce tag n\'est enregistré.');
        
                }else{
                   
                    if ($articleCount == 0) {
            
                        return $this->sendResponse(['slug' => $slug,'author' => $author->name,  'status' => 401,'articleCount' => $articleCount, 'articlePublishCount' => $articlePublishCount, 'articleNotPublishCount' => $articleNotPublishCount], 'Aucun article de ce tag n\'est enregistré.');
            
                    }else{

                        if(request('search')){

                            $articlePublish = DB::table("articles") ->select(array("articles.id", "articles.title", "articles.slug" , "articles.visible" ,"articles.status" , "articles.updated_at" , "articles.date_publish", "article_tags.tag_id", "tags.name as tagName" ))
                            ->where("articles.visible", 1)
                            ->where('articles.title', 'like', '%'. request('search') . '%')
                            ->orWhere('articles.slug', 'like', '%'. request('search') . '%')
                            ->orWhere('articles.date_publish', 'like', '%'. request('search') . '%')
                            ->orWhere('tags.name', 'like', '%'. request('search') . '%')
                            ->where('article_tags.tag_id', $author->id)
                            ->leftJoin("article_tags", "article_tags.id", "=", "articles.id")
                            ->leftJoin("tags", "tags.id", "=", "article_tags.tag_id")
                            ->orderBy('articles.date_publish', 'desc')
                            ->paginate(10);
            
                        }else{
            
                            $articlePublish = DB::table("articles") ->select(array("articles.id", "articles.title", "articles.slug" , "articles.visible" ,"articles.status" , "articles.updated_at" , "articles.date_publish", "article_tags.tag_id", "tags.name as tagName" ))
                            ->where("articles.visible", 1)
                            ->where('article_tags.tag_id', $author->id)
                            ->leftJoin("article_tags", "article_tags.id", "=", "articles.id")
                            ->leftJoin("tags", "tags.id", "=", "article_tags.tag_id")
                            ->orderBy('articles.date_publish', 'desc')
                            ->paginate(10);
            
                        }
    
                       
    
                        return $this->sendResponse(['slug' => $slug, 'author' => $author->name ,'articleCount' => $articleCount, 'status' => 200, 'articlePublishCount' => $articlePublishCount, 'articleNotPublishCount' => $articleNotPublishCount, 'articlePublish' => $articlePublish], 'Liste des articles publiés');
                    }
                }
            }
        }
                
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function publish($slug)
    {
        $categoryCount = Tags::where('visible', 1)->count();

        $author = Tags::where('slug', $slug)->where('visible', 1)->first();

        if ($author == null) {

            return $this->sendResponse([ 'slug' => $slug, 'author' => 0, 'status' => 404, 'articleCount' => 0, 'articlePublishCount' => 0, 'articleNotPublishCount' => 0], 'Ce tag n\'existe pas');
       
        } else {

            if ($categoryCount == 0) {

                return $this->sendResponse([ 'slug' => $slug,'author' => $author->name, 'status' => 401, 'articleCount' => 0, 'articlePublishCount' => 0, 'articleNotPublishCount' => 0], 'Aucun tag n\'est enregistré.');
    
            } else {
    
                $articleCount = DB::table("articles") ->select(array("articles.id", "articles.title", "articles.slug" , "articles.visible" ,"articles.status" , "articles.updated_at" , "articles.date_publish", "article_tags.tag_id", "tags.name as tagName" ))
                ->where("articles.visible", 1)
                ->where('article_tags.tag_id', $author->id)
                ->leftJoin("article_tags", "article_tags.id", "=", "articles.id")
                ->leftJoin("tags", "tags.id", "=", "article_tags.tag_id")
                ->count();
    
                $articlePublishCount = DB::table("articles") ->select(array("articles.id", "articles.title", "articles.slug" , "articles.visible" ,"articles.status" , "articles.updated_at" , "articles.date_publish", "article_tags.tag_id", "tags.name as tagName" ))
                ->where("articles.visible", 1)
                ->where("articles.status", 1)
                ->where('article_tags.tag_id', $author->id)
                ->leftJoin("article_tags", "article_tags.id", "=", "articles.id")
                ->leftJoin("tags", "tags.id", "=", "article_tags.tag_id")
                ->count();
    
                $articleNotPublishCount = DB::table("articles") ->select(array("articles.id", "articles.title", "articles.slug" , "articles.visible" ,"articles.status" , "articles.updated_at" , "articles.date_publish", "article_tags.tag_id", "tags.name as tagName" ))
                ->where("articles.visible", 1)
                ->where("articles.status", 0)
                ->where('article_tags.tag_id', $author->id)
                ->leftJoin("article_tags", "article_tags.id", "=", "articles.id")
                ->leftJoin("tags", "tags.id", "=", "article_tags.tag_id")
                ->count();
    
                if ($articleCount == 0) {
        
                    return $this->sendResponse(['slug' => $slug,'author' => $author->name,'status' => 401,'articleCount' => $articleCount, 'articlePublishCount' => $articlePublishCount, 'articleNotPublishCount' => $articleNotPublishCount ], 'Aucun article de ce tag n\'est enregistré.');
        
                }else{
                   
                    if ($articlePublishCount == 0) {
            
                        return $this->sendResponse(['slug' => $slug,'author' => $author->name,'status' => 401,'articleCount' => $articleCount, 'articlePublishCount' => $articlePublishCount, 'articleNotPublishCount' => $articleNotPublishCount], 'Aucun article publié de ce tag n\'est enregistré.');
            
                    }else{
    
                        if(request('search')){

                            $articlePublish = DB::table("articles") ->select(array("articles.id", "articles.title", "articles.slug" , "articles.visible" ,"articles.status" , "articles.updated_at" , "articles.date_publish", "article_tags.tag_id", "tags.name as tagName" ))
                            ->where("articles.visible", 1)
                            ->where("articles.status", 1)
                            ->where('articles.title', 'like', '%'. request('search') . '%')
                            ->orWhere('articles.slug', 'like', '%'. request('search') . '%')
                            ->orWhere('articles.date_publish', 'like', '%'. request('search') . '%')
                            ->orWhere('tags.name', 'like', '%'. request('search') . '%')
                            ->where('article_tags.tag_id', $author->id)
                            ->leftJoin("article_tags", "article_tags.id", "=", "articles.id")
                            ->leftJoin("tags", "tags.id", "=", "article_tags.tag_id")
                            ->orderBy('articles.date_publish', 'desc')
                            ->paginate(10);
            
                        }else{
            
                            $articlePublish = DB::table("articles") ->select(array("articles.id", "articles.title", "articles.slug" , "articles.visible" ,"articles.status" , "articles.updated_at" , "articles.date_publish", "article_tags.tag_id", "tags.name as tagName" ))
                            ->where("articles.visible", 1)
                            ->where("articles.status", 1)
                            ->where('article_tags.tag_id', $author->id)
                            ->leftJoin("article_tags", "article_tags.id", "=", "articles.id")
                            ->leftJoin("tags", "tags.id", "=", "article_tags.tag_id")
                            ->orderBy('articles.date_publish', 'desc')
                            ->paginate(10);
            
                        }

                        
    
                        return $this->sendResponse(['slug' => $slug, 'author' => $author->name ,'articleCount' => $articleCount, 'status' => 200, 'articlePublishCount' => $articlePublishCount, 'articleNotPublishCount' => $articleNotPublishCount, 'articlePublish' => $articlePublish], 'Liste des articles publiés');
                    }
                }
            }
        }
                
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function notPublish($slug)
    {
        $categoryCount = Tags::where('visible', 1)->count();

        $author = Tags::where('slug', $slug)->where('visible', 1)->first();

        if ($author == null) {

            return $this->sendResponse([ 'slug' => $slug, 'author' => 0, 'status' => 404, 'articleCount' => 0, 'articlePublishCount' => 0, 'articleNotPublishCount' => 0], 'Ce tag n\'existe pas');
       
        } else {

            if ($categoryCount == 0) {

                return $this->sendResponse([ 'slug' => $slug,'author' => $author->name, 'status' => 401, 'articleCount' => 0, 'articlePublishCount' => 0, 'articleNotPublishCount' => 0], 'Aucun tag n\'est enregistré.');
    
            } else {
    
                $articleCount = DB::table("articles") ->select(array("articles.id", "articles.title", "articles.slug" , "articles.visible" ,"articles.status" , "articles.updated_at" , "articles.date_publish", "article_tags.tag_id", "tags.name as tagName" ))
                ->where("articles.visible", 1)
                ->where('article_tags.tag_id', $author->id)
                ->leftJoin("article_tags", "article_tags.id", "=", "articles.id")
                ->leftJoin("tags", "tags.id", "=", "article_tags.tag_id")
                ->count();
    
                $articlePublishCount = DB::table("articles") ->select(array("articles.id", "articles.title", "articles.slug" , "articles.visible" ,"articles.status" , "articles.updated_at" , "articles.date_publish", "article_tags.tag_id", "tags.name as tagName" ))
                ->where("articles.visible", 1)
                ->where("articles.status", 1)
                ->where('article_tags.tag_id', $author->id)
                ->leftJoin("article_tags", "article_tags.id", "=", "articles.id")
                ->leftJoin("tags", "tags.id", "=", "article_tags.tag_id")
                ->count();
    
                $articleNotPublishCount = DB::table("articles") ->select(array("articles.id", "articles.title", "articles.slug" , "articles.visible" ,"articles.status" , "articles.updated_at" , "articles.date_publish", "article_tags.tag_id", "tags.name as tagName" ))
                ->where("articles.visible", 1)
                ->where("articles.status", 0)
                ->where('article_tags.tag_id', $author->id)
                ->leftJoin("article_tags", "article_tags.id", "=", "articles.id")
                ->leftJoin("tags", "tags.id", "=", "article_tags.tag_id")
                ->count();
    
                if ($articleCount == 0) {
        
                    return $this->sendResponse(['slug' => $slug,'author' => $author->name,'status' => 401,'articleCount' => $articleCount, 'articlePublishCount' => $articlePublishCount, 'articleNotPublishCount' => $articleNotPublishCount ], 'Aucun article de ce tag n\'est enregistré.');
        
                }else{
                   
                    if ($articleNotPublishCount == 0) {
            
                        return $this->sendResponse(['slug' => $slug,'author' => $author->name,'status' => 401,'articleCount' => $articleCount, 'articlePublishCount' => $articlePublishCount, 'articleNotPublishCount' => $articleNotPublishCount], 'Aucun brouillon de ce tag n\'est enregistré.');
            
                    }else{
    
                        if(request('search')){

                            $articlePublish = DB::table("articles") ->select(array("articles.id", "articles.title", "articles.slug" , "articles.visible" ,"articles.status" , "articles.updated_at" , "articles.date_publish", "article_tags.tag_id", "tags.name as tagName" ))
                            ->where("articles.visible", 1)
                            ->where("articles.status", 0)
                            ->where('articles.title', 'like', '%'. request('search') . '%')
                            ->orWhere('articles.slug', 'like', '%'. request('search') . '%')
                            ->orWhere('articles.date_publish', 'like', '%'. request('search') . '%')
                            ->orWhere('tags.name', 'like', '%'. request('search') . '%')
                            ->where('article_tags.tag_id', $author->id)
                            ->leftJoin("article_tags", "article_tags.id", "=", "articles.id")
                            ->leftJoin("tags", "tags.id", "=", "article_tags.tag_id")
                            ->orderBy('articles.date_publish', 'desc')
                            ->paginate(10);
            
                        }else{
            
                            $articlePublish = DB::table("articles") ->select(array("articles.id", "articles.title", "articles.slug" , "articles.visible" ,"articles.status" , "articles.updated_at" , "articles.date_publish", "article_tags.tag_id", "tags.name as tagName" ))
                            ->where("articles.visible", 1)
                            ->where("articles.status", 0)
                            ->where('article_tags.tag_id', $author->id)
                            ->leftJoin("article_tags", "article_tags.id", "=", "articles.id")
                            ->leftJoin("tags", "tags.id", "=", "article_tags.tag_id")
                            ->orderBy('articles.date_publish', 'desc')
                            ->paginate(10);
            
                        }
    
                        return $this->sendResponse(['slug' => $slug, 'author' => $author->name ,'articleCount' => $articleCount, 'status' => 200, 'articlePublishCount' => $articlePublishCount, 'articleNotPublishCount' => $articleNotPublishCount, 'articlePublish' => $articlePublish], 'Liste des articles publiés');
                    }
                }
            }
        }
                
    }
}