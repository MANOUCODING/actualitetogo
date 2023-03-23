<?php


use App\Http\Controllers\api\backoffice\AuthController;
use App\Http\Controllers\api\backoffice\CategoryController;
use App\Http\Controllers\api\backoffice\NewsLetterController;
use App\Http\Controllers\api\backoffice\TagsController;
use App\Http\Controllers\api\frontoffice\HomeController;
use App\Http\Controllers\api\frontoffice\NewsLettersController;
use App\Http\Controllers\api\frontoffice\VisitsController;
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

// Route::post('/store/visits', [VisitsController::class, 'storeVisites']);

Route::get('/home/footer/categories', [HomeController::class, 'categories']);

Route::get('/home/footer/tags', [HomeController::class, 'tags']);

Route::post('/home/newsletter/store', [NewsLettersController::class, 'storeNewsLetter']);


// Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {

//     Route::post('login', [AuthController::class, 'login']);

//     Route::post('logout', [AuthController::class, 'logout']);

//     Route::post('refresh', [AuthController::class, 'refresh']);
    
//     Route::post('me', [AuthController::class, 'me']);

   

// });
