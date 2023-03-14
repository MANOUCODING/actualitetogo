<?php

use App\Http\Controllers\api\frontoffice\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'homePosts']);

Route::get('/{slug}', [HomeController::class, 'category']);

Route::get('/auteurs/{slug}', [HomeController::class, 'authors']);

Route::get('/tags/{slug}', [HomeController::class, 'tags']);

Route::view('/admin/dashboard', 'backoffice');

Route::view('/admin/newsletters', 'backoffice');

Route::view('/admin/category', 'backoffice');

Route::view('/admin/category/{slug}/articles', 'backoffice');

Route::view('/admin/category/{slug}/articles/publish', 'backoffice');

Route::view('/admin/category/{slug}/articles/not/publish', 'backoffice');

Route::view('/admin/tags', 'backoffice');

Route::view('/admin/tags/{slug}/articles', 'backoffice');

Route::view('/admin/tags/{slug}/articles/publish', 'backoffice');

Route::view('/admin/tags/{slug}/articles/not/publish', 'backoffice');

Route::view('/authors/dashboard', 'backoffice');
   


