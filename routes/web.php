<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[authController::class, 'home'])->name('home');

Route::get('/relationship',[UserRoleController::class, 'relationship'])->name('relationship');

Route::get('/login',[authController::class, 'login'])->name('login');

Route::post('/login',[authController::class, 'loginPost'])->name('loginPost');

Route::get('/register',[authController::class, 'register'])->name('register');

Route::post('/register',[authController::class, 'registerPost'])->name('registerPost');

Route::middleware('userLoggedIn')->group(function(){
    Route::get('/viewBlog',[BlogController::class, 'viewBlog'])->name('viewBlog');
    Route::post('/blogCreate',[BlogController::class, 'blogCreate'])->name('blogCreate');
    Route::get('/showBlogs',[BlogController::class, 'showBlogs'])->name('showBlogs');
    Route::get('/myBlogs',[BlogController::class, 'myBlogs'])->name('myBlogs');
    Route::get('/editBlogs/{id}',[BlogController::class, 'showEdit'])->name('showEdit');
    Route::post('/editBlogs/{id}',[BlogController::class, 'editBlogs'])->name('editBlogs');
    Route::get('/deleteBlogs/{id}',[BlogController::class, 'deleteBlogs'])->name('deleteBlogs');

    Route::get('logout',[authController::class, 'logout'])->name('logout');
});