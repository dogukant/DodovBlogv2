<?php

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

//FRONTEND
Route::get('/home','App\Http\Controllers\Homepage@index')->name('index');
Route::get('/single/{slug}','App\Http\Controllers\Homepage@single')->name('single');
Route::get('/category/{slug}','App\Http\Controllers\Homepage@category')->name('category');
Route::get('/about','App\Http\Controllers\Homepage@abouts')->name('about');
Route::get('/contact','App\Http\Controllers\Homepage@contact')->name('contact');
Route::post('/contactpost','App\Http\Controllers\Homepage@contactpost')->name('contactpost');

//BACKEND
    Route::get('login','App\Http\Controllers\LoginController@login')->name('admin.login')->middleware('isLogin');
    Route::post('logingiris','App\Http\Controllers\LoginController@logingiris')->name('admin.logingiris')->middleware('isLogin');

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function (){

    Route::get('index','App\Http\Controllers\back\index@index')->name('index');
    Route::get('articles','App\Http\Controllers\back\ArticleController@articles')->name('articles');
    Route::get('create','App\Http\Controllers\back\ArticleController@articleCreate')->name('create');
    Route::post('post','App\Http\Controllers\back\ArticleController@createPost')->name('create.post');
    Route::get('edit/{id}','App\Http\Controllers\back\ArticleController@edit')->name('edit');
    Route::post('update','App\Http\Controllers\back\ArticleController@update')->name('update');
    Route::delete('destroy','App\Http\Controllers\back\ArticleController@destroy')->name('destroy');
    Route::delete('delete','App\Http\Controllers\back\ArticleController@hardDelete')->name('delete');
    Route::get('trashed','App\Http\Controllers\back\ArticleController@trashed')->name('trashed');
    Route::get('recover/{id}','App\Http\Controllers\back\ArticleController@recover')->name('recover');
    Route::get('categories','App\Http\Controllers\back\ArticleController@categories')->name('categories');
    Route::get('categoriescreate','App\Http\Controllers\back\ArticleController@categoriescreate')->name('categories.create');
    Route::post('categorypost','App\Http\Controllers\back\ArticleController@categoryPost')->name('categorypost');
    Route::get('categoriesedit/{id}','App\Http\Controllers\back\ArticleController@categoriesEdit')->name('categoriesedit');
    Route::get('aboutedit','App\Http\Controllers\back\index@aboutedit')->name('aboutedit');
    Route::post('aboutupdate','App\Http\Controllers\back\index@aboutupdate')->name('aboutupdate');
    Route::get('contactforms','App\Http\Controllers\back\index@contactforms')->name('contactforms');
    Route::get('logout','App\Http\Controllers\LoginController@logout')->name('logout');
    Route::delete('categorydelete','App\Http\Controllers\back\ArticleController@categorydelete')->name('categorydelete');
    Route::get('categorytrashed','App\Http\Controllers\back\ArticleController@categoryTrashed')->name('categorytrashed');
    Route::delete('categoryforcedelete','App\Http\Controllers\back\ArticleController@categoryForcedelete')->name('categoryforcedelete');
    Route::get('categoryrecover/{id}','App\Http\Controllers\back\ArticleController@categoryRecover')->name('categoryrecover');
});






