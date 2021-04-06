<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UrlFormController;

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

Route::get('/',UrlFormController::Class);
Route::get('/news', NewsController::Class);
Route::get('/news/{identificador}',[ NewsController::Class,'order'])->name('news');
Route::post('/search',[SearchController::Class,'store']);
Route::resource('news.search',SearchController::Class)->only(['index','store','show']);
Route::post('/post-feed',[ItemController::class,'formulario'])->name('postfeed');
