<?php

use App\Http\Controllers\api\backoffice\admin\DashboardController;
use App\Http\Controllers\api\backoffice\publicateur\DashboardController as PublicateurDashboardController;
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

Route::get('auteurs/{slug}', [HomeController::class, 'authors']);

Route::get('tags/{slug}', [HomeController::class, 'tags']);





