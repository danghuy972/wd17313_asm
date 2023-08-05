<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/login',[AuthController::class,'getLogin'])->name('getLogin');
Route::get('/admin',[ProfileController::class,'dashboard'])->name('dashboard');

//user
Route::get('/admin/user',[UserController::class,'index'])->name('route_user_index');
Route::match(['GET','POST'],'/admin/user/add',[UserController::class,'add'])->name('route_user_add');
Route::match(['GET','POST'],'/admin/user/edit/{id}',[UserController::class,'edit'])->name('route_user_edit');
Route::get('/admin/user/delete/{id}',[UserController::class,'delete'])->name('route_user_delete');

//categories
Route::get('/admin/categories',[CategoriesController::class,'index'])->name('route_categories_index');
Route::match(['GET','POST'],'/admin/categories/add',[CategoriesController::class,'add'])->name('route_categories_add');
Route::match(['GET','POST'],'/admin/categories/edit/{id}',[CategoriesController::class,'edit'])->name('route_categories_edit');
Route::get('/admin/categories/delete/{id}',[CategoriesController::class,'delete'])->name('route_categories_delete');