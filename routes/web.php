<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/articles', [MainController::class, 'index'])->name('articles');
Route::get('/articles/{article:slug}', [MainController::class, 'show'])->name('article');

Auth::routes();

// OPTIMISATION DES ROUTES
//CECI:
// Route::get('/admin/articles', [ArticleController::class, 'index'])->middleware('admin')->name('articles.index');
// Route::get('/admin/articles/create', [ArticleController::class, 'create'])->middleware('admin')->name('articles.create');
// Route::get('/admin/articles/{article}/edit', [ArticleController::class, 'edit'])->middleware('admin')->name('articles.edit');
// Route::post('/admin/articles/store', [ArticleController::class, 'store'])->middleware('admin')->name('articles.store');
// Route::put('/admin/articles/{article}/update', [ArticleController::class, 'update'])->middleware('admin')->name('articles.update');
// Route::delete('/admin/articles/{article}/delete', [ArticleController::class, "delete"])->middleware(('admin'))->name('articles.delete');
//EST EGALE A CELA (Pour des route de type resource)

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::resource('article', ArticleController::class)->except([
        //except permet de supprimer les routes indésirable en l'occurence show (équivalent de findByID)
        'show'
    ]);
});
// FIN DE L'OPTIMISATION DES ROUTES