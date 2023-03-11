<?php

namespace App\Http\Controllers\api\backoffice;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NewsLetterController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsLetterCount = NewsLetter::where("visible", 1)->count();


        if ($newsLetterCount == 0) {

            return $this->sendResponse(['newsLetterCount'=>$newsLetterCount, 'status' => 401], 'Aucun abonné n\'est enregistré.');

        } else {

            if(request('search')){

                $newsLetters = DB::table("news_letters")->where("visible", 1)->where('news_letters.email', 'like', '%'. request('search') . '%')->paginate(10);

            }else{

                $newsLetters = DB::table("news_letters")->where("visible", 1)->paginate(10);

            }

           

            return $this->sendResponse(['newsLetterCount'=>$newsLetterCount, 'newsLetters' => $newsLetters,'status' => 200], 'Liste de tous les abonnés.');
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

        return $this->sendResponse(['utlisateur', $utlisateur, 'status' => 200], 'Abonné ajouté avec succes.');
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

            $adminShow = DB::table("news_letters")->where('news_letters.slug', $slug)->where("visible", 1)->first();

            if(is_null($adminShow)){

                return $this->sendResponse(['utilisateur' => $adminShow, 'status' => 401], 'Aucun abonné trouvé.');

            }else{

                return $this->sendResponse(['utilisateur' => $adminShow, 'status' => 200], 'Un abonné trouvé.');

            }

        } catch (ModelNotFoundException $modelNotFoundException){

            return $this->sendError('Aucun abonné trouvé.');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datas = $request->all();

        $validator = Validator::make($datas, [
            'email' => ['required','string', 'email', 'max:255'],
        ],[
            'required' => 'L\' :attribute est obligatoire.',
        ], [
            'email' => 'email',
        ]);

       if ($validator->fails()) {

            return $this->sendResponse(['errors'=> $validator->errors(), 'status' => 401],'Erreur de validation');

        }


        $administrateur = NewsLetter::findOrFail($id);

        if (isset($datas['email']) && !empty($datas['email'])) {

            $datas['slug'] = str_replace(' ', '-', strtolower($datas['email']));

        }


        $administrateur->update([
            'email' => $datas['email'],
            'slug' =>  $datas['slug'],
        ]);

        return $this->sendResponse(['utilisateur' => $administrateur, 'status' => 200], 'Email de l\' abonné modifié avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visiteur = NewsLetter::findOrFail($id);

        $visiteur->visible = 0;

        $visiteur->update();

        return $this->sendResponse(['utilisateur' => $visiteur,'status' => 200], "Cet abonné a ete supprimé avec succès.");
    }

    public function changerStatusNewsletters($id)
    {

        $user = NewsLetter::findOrFail($id);

        if ($user->status == 1) {

            $user->status = 0;

            $user->update();

            return $this->sendResponse(['utilisateur' => $user,'status' => 200], "Cet abonné a été bloqué avec succès.");

        } else {

            $user->status = 1;

            $user->update();

            return $this->sendResponse(['utilisateur' => $user,'status' => 200], "Cet abonné a été débloqué avec succès.");
        }

    }

}
