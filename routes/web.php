<?php

use App\Http\Controllers\ArticleController;
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

Route::group(['prefix' => 'admin'], function () {
    Route::resource('articles', ArticleController::class);
});

Route::fallback(function () {
    return response()->json(['message' => 'Not Found!'], 404);
});

Route::get('/', [ArticleController::class, 'list'])->name('articles.list');

Route::get('/about', function () {
    return view('about');
});

Route::get('/{id}', [ArticleController::class, 'detail'])->name('articles.detail');

Route::fallback(function () {
    return response()->json(['message' => 'Not Found!'], 404);
});
