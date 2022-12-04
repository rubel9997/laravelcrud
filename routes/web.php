<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

//Route clear
Route::get('clear-all', function () {
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('clear-compiled');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    dd('Cached Cleared');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/home/userlist', [App\Http\Controllers\HomeController::class, 'userlistshow'])->name('home.userlist');

//Category Route
//Route::resource('category', CategoryController::class);

//Products Route
Route::resource('products', ProductController::class);


//Category Route individual
Route::get('/category/index',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/show/{id}',[CategoryController::class,'show'])->name('category.show');
Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('/category/{id}',[CategoryController::class,'destroy'])->name('category.destroy');

//Data Searching 
Route::get('/search/', [CategoryController::class, 'search'])->name('search');

//Admin Route
Route::get('/admin-list',[AdminController::class,'adminList'])->name('admin.list');
Route::get('/admin-create',[AdminController::class,'adminCreate'])->name('admin.create');
Route::post('/admin-store',[AdminController::class,'adminStore'])->name('admin.store');
Route::get('/admin-edit/{id}/edit',[AdminController::class,'adminEdit'])->name('admin.edit');
Route::post('/admin-update/{id}',[AdminController::class,'adminUpdate'])->name('admin.update');
Route::get('/admin-show/{id}',[AdminController::class,'adminShow'])->name('admin.show');
Route::get('/admin-delete/{id}',[AdminController::class,'adminDelete'])->name('admin.delete');
