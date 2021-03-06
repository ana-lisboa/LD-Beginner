<?php

use App\Http\Controllers\Front\ArticleController as FrontController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
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

Route::get('/', [FrontController::class, 'index'])->name('articles.list');

Route::get('/about', function () {
    return view('about');
});

Route::redirect('/dashboard', '/admin/')->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::redirect('/', 'admin/articles/');

    Route::resource('articles', ArticleController::class);

    Route::resource('tags', TagController::class);

    Route::resource('categories', CategoryController::class);
});

require __DIR__ . '/auth.php';

Route::get('/{article:id}', [FrontController::class, 'show'])->name('articles.detail')->scopeBindings();

Route::fallback(function () {
    return response()->json(['message' => 'Not Found!'], 404);
});
