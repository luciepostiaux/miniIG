<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// autres imports ...
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;

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

Route::get('/', [HomepageController::class, 'index'])->name("homepage");

Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostsController::class, 'show'])->name('posts.show');


// autres routes ...
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('posts', AdminPostController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';