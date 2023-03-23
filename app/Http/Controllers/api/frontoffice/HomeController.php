<?php

namespace App\Http\Controllers\api\frontoffice;

use App\Http\Controllers\api\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tags;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function home(){

        $categories = Category::where('visible', 1)->get();

        return view('welcome', ['categories' => $categories]);

    }

    public function tags()
    {

        $tags =  Tags::orderby('id', 'desc')->take(21)->get();

        return $this->sendResponse(['tags' => $tags , 'status' => 200], 'Informations sur le footer');

    }

}
