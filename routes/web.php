<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//    Route::get('/edit/{id}', [CommentController::class, 'edit'])->name('comment.edit');
//    Route::get('/create', [CommentController::class, 'create'])->name('comment.create');
//    Route::get('/', [CommentController::class, 'index'])->name('comment.index');
//    Route::get('/{id}', [CommentController::class, 'show'])->name('comment.show');
//    Route::post('/', [CommentController::class, 'store'])->name('comment.store');
//    Route::patch('/{id}', [CommentController::class, 'update'])->name('comment.update');
//    Route::delete('/destroy/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

Route::resource('/comment', CommentController::class);
