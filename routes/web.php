<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClothingsController;
use App\Http\Controllers\FabricController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ToWashController;
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

    Route::get('/users',[PagesController::class,'userList'])->name('pages.userList');
    Route::get('/users/{id}/update',[PagesController::class,'userUpdate'])->name('pages.userUpdate');
    Route::post('/users/{id}/update',[AuthController::class,'update'])->name('pages.userUpdate');
    Route::get('/users/create',[PagesController::class,'userCreate'])->name('pages.userCreate');
    Route::post('/users/create',[AuthController::class,'create'])->name('pages.userCreate');

    Route::get('/services',[PagesController::class,'serviceList'])->name('pages.serviceList');
    Route::get('/services/create',[PagesController::class,'serviceCreate'])->name('pages.serviceCreate');
    Route::post('/services/create',[ServiceController::class,'create'])->name('pages.serviceCreate');

    Route::get('/categories',[PagesController::class,'categoryList'])->name('pages.categoryList');
    Route::get('/categories/{id}/update',[PagesController::class,'categoryUpdate'])->name('pages.categoryUpdate');
    Route::post('/categories/{id}/update',[CategoryController::class,'update'])->name('pages.categoryUpdate');
    Route::get('/categories/create',[PagesController::class,'categoryCreate'])->name('pages.categoryCreate');
    Route::post('/categories/create',[CategoryController::class,'create'])->name('pages.categoryCreate');

    Route::get('/fabrics',[PagesController::class,'fabricList'])->name('pages.fabricList');
    Route::get('/fabric/create',[PagesController::class,'fabricCreate'])->name('pages.fabricCreate');
    Route::post('/fabric/create',[FabricController::class,'create'])->name('pages.fabricCreate');

    Route::get('/clothings',[PagesController::class,'clothingList'])->name('pages.clothingList');
    Route::get('/clothings/create',[PagesController::class,'clothingCreate'])->name('pages.clothingCreate');
    Route::post('/clothings/create',[ClothingsController::class,'create'])->name('pages.clothingCreate');

    Route::get('/towashs',[PagesController::class,'toWashList'])->name('pages.toWashList');
    Route::get('/towash/create',[PagesController::class,'toWashCreate'])->name('pages.toWashCreate');
    Route::post('/towash/create',[ToWashController::class,'create'])->name('pages.toWashCreate');
});