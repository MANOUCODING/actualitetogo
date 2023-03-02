<?php

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
