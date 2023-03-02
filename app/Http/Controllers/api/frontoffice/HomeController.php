<?php

namespace App\Http\Controllers\api\frontoffice;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Message;
use App\Models\NewsLetter;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends BaseController
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {

        $categories = Category::where('visible', 1)->get();

        return $this->sendResponse([
            'categories' => $categories, 
            'status' => 200
        ], 'Informations sur le footer');

    }

    public function tagsF()
    {

        $tags =  Tags::orderby('id', 'desc')->take(21)->get();

        return $this->sendResponse([
            'tags' => $tags ,
            'status' => 200
        ], 'Informations sur le footer');

    }

    public function homePosts()
    {
        return view('welcome');

    }

    public function tags($slug)
    {
       

        $author = Tags::where('slug', $slug)->where('visible', 1)->first();

        if ($author == null) {

            return view('layouts.404');
       
        } else {

            return view('tags', ['category' => $author]);
           
    
        }

    }

    public function category($slug)
    {

        if ($slug == 'about') {

            return view('about');
           
        } elseif ($slug == 'publicites') {

            return view('publicites');

        }elseif ($slug == 'forum') {

            return view('forum');

        }elseif ($slug == 'contact') {

            return view('contact');

        }elseif ($slug == 'infos-pratiques') {

            return view('infosPratiques');

        }elseif ($slug == 'login') {

            return view('backoffice');

        }else{

            $author = Category::where('slug', $slug)->where('visible', 1)->first();


            if (($author == null)) {

                return view('layouts.404');
        
            } elseif(($author !== null)) {

        
                return view('category', ['category' => $author]);
            
        
            }

        }
        
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNewsLetter(Request $request)
    {
        $datas = $request->all();

        $validator = Validator::make($datas, [
            'email' => ['required','string', 'email', 'max:255', 'unique:news_letters'],
        ],[
            'required' => 'L\' :attribute est obligatoire.',
        ], [
            'email' => 'email',
        ]);

       if ($validator->fails()) {

            return $this->sendResponse(['errors'=> $validator->errors(), 'status' => 401],'Erreur de validation');

        }
        if (isset($datas['email']) && !empty($datas['email'])) {

            $datas['slug'] = str_replace(' ', '-', strtolower($datas['email']));

        }

        $utlisateur = NewsLetter::create([
            'email' => $datas['email'],
            'slug' =>  $datas['slug'],
        ]);

        return $this->sendResponse(['utlisateur', $utlisateur, 'status' => 200], 'Vous êtes maintenant abonné à ce site".');
    }
   
    public function storeSms(Request $request )
    {

        $datas = $request->all();

        $validator = Validator::make($datas, [
            'email' => ['required','string', 'email', 'max:255', 'unique:users'],
            'telephone' => ['required','integer', ],
            'siteweb' => [],
            'nomComplet' => ['required', 'string', 'max:255'],
            'sujet' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'min:3'],
        ],[
            'required' => 'Votre :attribute est obligatoire.',
            'password.required' => 'Votre :attribute est obligatoire.',
            'nomComplet.required' => 'Vos :attribute est obligatoire.'
        ], [
            'email' => 'email',
            'telephone' => 'Télephone',
            'nomComplet' => 'nom et prénoms',
            'siteweb' => 'Site Web',
            'sujet' => 'Sujet',
            'content' => 'Contenu',
        ]);

        if ($validator->fails()) {

            return $this->sendResponse(['errors'=> $validator->errors(), 'status' => 401],'Erreur de validation');

        }


        $message = Message::create($datas);


        return $this->sendResponse(['message' => $message, 'status' => 200], 'Message envoyé avec succès');

    }
}
