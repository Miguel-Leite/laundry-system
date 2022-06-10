<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ServiceController;
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

Route::get('/',[PagesController::class,'index'])->name('pages.index');
Route::post('/',[AuthController::class,'login'])->name('pages.index');
Route::get('/recuperar-senha',[PagesController::class,'forgotPassword'])->name('pages.forgotPassword');

Route::middleware('authentication')->group(function (){
    Route::get('/home',[PagesController::class,'home'])->name('pages.home');
    Route::get('/users/create',[PagesController::class,'userCreate'])->name('pages.userCreate');
    Route::post('/users/create',[AuthController::class,'create'])->name('pages.userCreate');

    Route::get('/services/creat',[PagesController::class,'serviceCreate'])->name('pages.serviceCreate');
    Route::post('/services/create',[ServiceController::class,'create'])->name('pages.serviceCreate');
});