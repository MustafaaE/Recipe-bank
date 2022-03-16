<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [RecipeController::class, 'index'])->name('home');
// Route::get('/profile',[UserController::class, 'show'])->name('profile');

// Route::get('/recipes/index', [App\Http\Controllers\RecipeController::class, 'index'])->name('index');

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'userProfile'])->name('profile');
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/home', HomeController::class);
Route::resource('/recipes', RecipeController::class);
Route::resource('/categories', CategoryController::class);

Route::middleware('auth')->group(function () {
    Route::get('/recipes/create', [App\Http\Controllers\RecipeController::class, 'create'])->name('create');
});
