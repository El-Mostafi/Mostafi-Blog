<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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
Route::get('/home', function () {
    return view('welcome');
});
Route::get('/', [PostController::class,'index'])->name('posts.index');
Route::get('/posts', [PostController::class,'index'])->name('posts.index');
// Route::post('/posts', [PostController::class,'store'])->name('posts.store');
// Route::put('/posts/{posts}', [PostController::class,'update'])->name('posts.update');
Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');
Route::get('/posts/{posts}/edite', [PostController::class,'edite'])->name('posts.edite');
Route::get('/posts/{posts}', [PostController::class,'show'])->name('posts.show');
// Route::delete('/posts/{posts}', [PostController::class,'destroy'])->name('posts.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
});

