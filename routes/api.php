<?php

use App\Http\Controllers\api\backoffice\AuthController;
use App\Http\Controllers\api\frontoffice\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/store/visits', [HomeController::class, 'storeVisites']);

Route::get('/home/footer/categories', [HomeController::class, 'categories']);

Route::get('/home/footer/tags', [HomeController::class, 'tagsF']);

Route::post('/newsletter/store', [HomeController::class, 'storeNewsLetter']);

Route::post('/contact/store', [HomeController::class, 'storeSms']);

Route::get('/home/posts/important', [HomeController::class, 'importants']);

Route::get('/home/posts/all', [HomeController::class, 'all']);

Route::get('/home/posts/aNePasManquer', [HomeController::class, 'aNePasManquer']);

Route::get('/home/posts/sports', [HomeController::class, 'sports']);

Route::get('/home/posts/societe', [HomeController::class, 'societe']);

Route::get('/home/posts/opinion', [HomeController::class, 'opinion']);

Route::get('/home/posts/faits/divers', [HomeController::class, 'faitsdivers']);

Route::get('/home/posts/fenetres', [HomeController::class, 'fenetre']);

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});
