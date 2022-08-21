<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ArticleController;

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
Route::group(['middleware' => ['auth','admin']], function (){
    Route::get('Article/create', 'App\Http\Controllers\ArticleController@create')->name('Article.create');
    Route::post('Article/create', 'App\Http\Controllers\ArticleController@store')->name('Article.store');
    Route::delete('Article/{Article}', 'App\Http\Controllers\ArticleController@destroy')->name('Article.destroy');
    
    Route::get('Category/create', 'App\Http\Controllers\CategoryController@create')->name('Category.create');
    Route::post('Category/create', 'App\Http\Controllers\CategoryController@store')->name('Category.store');
});

Route::get('search','App\Http\Controllers\ArticleController@search')->name('Article.search');
Route::post('download', 'App\Http\Controllers\MediaController@download')->name('download');
Route::get('/', 'App\Http\Controllers\ArticleController@latest' )->name('home');
Route::get('Article', 'App\Http\Controllers\ArticleController@index' )->name('Article.index');
Route::get('Article/{Article}', 'App\Http\Controllers\ArticleController@show' )->name('Article.show');

Route::group(['middleware' => ['auth']], function (){
    Route::get('User/favories', 'App\Http\Controllers\UserController@favories' )->name('User.favories');
    Route::resource('News','App\Http\Controllers\NewsController')->only('index');
});


Route::group(['middleware' => ['auth','admin','superadmin']], function () {
    Route::resource('News','App\Http\Controllers\NewsController')->except('index');
    Route::resource('User', 'App\Http\Controllers\UserController');
});
// Route::




/* 
    les routes 
    ##Article
    1 - home > latest
    2 - Article > index get
    3 - Article.show > show get
    4 - Article.create > create lien get  --note: actuellement je galere avec cette route 17/18/22 23:54
    6 - Article.store > store lien post pour enfin creer l'article
    7 - Article.favories > favories get lien
    8 - Article.destroy > destroy delete method
    9 - Article.edit > edit get method  
    10 - Article.update > update put|patch method  
    ##Media
    1 - download post
    ##Category 
    1 - create|store > get|post

*/

// Route::get('Article/create','App\Http\Controllers\ArticleController@create')->name('create');
// /* les routes sont imbriquées de façon à herite toutes les routes du route parent   */
// Route::group(['middleware' => ['auth']], function () {
//     Route::resource('Article', 'App\Http\Controllers\ArticleController')->only('index', 'show');
//     // Route::get('User/favories', 'App\Http\Controllers\UserController@favories')->name('User.favories');
//     Route::post('download', [MediaController::class, 'download'])->name('download');
//     Route::get('help', function () { return view('help');})->name('help');
//     Route::group(['middleware' => ['admin']], function () {
//         Route::resource('Article', 'App\Http\Controllers\ArticleController')->except('index', 'show');
//         Route::get('Article/create', 'App\Http\Controllers\ArticleController@create')->name('Article.create');
//         Route::get('Category/create', 'App\Http\Controllers\CategoryController@create')->name('Category.create');
//         Route::post('Category/create', 'App\Http\Controllers\CategoryController@store')->name('Category.store');

//         Route::group(['middleware' => ['superadmin']], function () {
//             Route::resource('User', 'App\Http\Controllers\UserController');
//         });
//     });
// });

// Route::post('addtest', [ArticleController::class, 'show']);
// Route::get('addtest',[ArticleController::class,'show']);


// Route::get('articles', function () {
//     return view('articles');
// })->name('articles');
// Route::get('/home', function () {
//     return view('home');
// })->middleware(['auth'])->name('home');

// Route::resource('Article','App\Http\Controllers\ArticleController')->only('index','show');

require __DIR__ . '/auth.php';
