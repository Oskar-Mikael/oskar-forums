<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\ThreadsController;
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

Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [ProfilesController::class, 'update'])->name('profile.update');

Route::get('/category', [CategoriesController::class, 'index'])->name('category.index');
Route::get('/category/{category}', [CategoriesController::class, 'show'])->name('category.show');

Route::get('/threads', [ThreadsController::class, 'index'])->name('threads.index');
Route::get('/threads/create', [ThreadsController::class, 'create'])->name('threads.create');
Route::get('/threads/{thread}/edit', [ThreadsController::class, 'edit'])->name('threads.edit');
Route::get('/threads/{thread}', [ThreadsController::class, 'show'])->name('threads.show');
Route::post('/threads', [ThreadsController::class, 'store'])->name('threads.store');
Route::patch('/threads/{thread}', [ThreadsController::class, 'update'])->name('threads.update');
Route::delete('/threads/{thread}', [ThreadsController::class, 'destroy'])->name('threads.destroy');

Route::get('/threads/{thread}/comment', [CommentsController::class, 'create']);
Route::post('/threads/{thread}', [CommentsController::class, 'addThreadComment'])->name('comments.store');
Route::delete('/threads/{thread}/comment', [CommentsController::class, 'destroy'])->name('comments.destroy');


require __DIR__ . '/auth.php';



