<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ClassesController;
use App\Http\Controllers\Admin\CoursController;
use App\Http\Controllers\Admin\InstructorsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Requests\ClassesRequest;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::match(['GET','POST'],'/login',[LoginController::class,'login'])->name('login');


Route::get('/',[HomeController::class,'home'])->name('homepage');
Route::get('/courses',[HomeController::class,'courses'])->name('courses');
Route::match(['GET','POST'],'/courses/chitiet/{id}',[HomeController::class,'chitiet'])->name('chitiet');

Route::middleware(['auth','isAdmin'])->group(function(){
    // tất cả những route nào được check đăng nhập mới vào được  
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

    //cours
    Route::get('/admin/cours',[CoursController::class,'index'])->name('route_cours_index');
    Route::match(['GET','POST'],'/admin/cours/add',[CoursController::class,'add'])->name('route_cours_add');
    Route::match(['GET','POST'],'/admin/cours/edit/{id}',[CoursController::class,'edit'])->name('route_cours_edit');
    Route::get('/admin/cours/delete/{id}',[CoursController::class,'delete'])->name('route_cours_delete');

    //instructor
    Route::get('/admin/instructors',[InstructorsController::class,'index'])->name('route_instructors_index');
    Route::match(['GET','POST'],'/admin/instructors/add',[InstructorsController::class,'add'])->name('route_instructors_add');
    Route::match(['GET','POST'],'/admin/instructors/edit/{id}',[InstructorsController::class,'edit'])->name('route_instructors_edit');
    Route::get('/admin/instructors/delete/{id}',[InstructorsController::class,'delete'])->name('route_instructors_delete');

    //class
    Route::get('/admin/classes',[ClassesController::class,'index'])->name('route_classes_index');
    Route::match(['GET','POST'],'/admin/classes/add',[ClassesController::class,'add'])->name('route_classes_add');
    Route::match(['GET','POST'],'/admin/classes/edit/{id}',[ClassesController::class,'edit'])->name('route_classes_edit');
    Route::get('/admin/classes/delete/{id}',[ClassesController::class,'delete'])->name('route_classes_delete');
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
