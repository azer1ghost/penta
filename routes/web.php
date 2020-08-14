<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

Route::get('/', 'PageController@index')->name('Page.index');
Route::get('/pages/{slug}', 'PageController@getPage')->where('slug', '^((?!authors).)*$')->name('Page.read');
Route::get('/pages/authors', 'AuthorController@index')->name('Author.list');


Route::get('/article/all', 'ArticlesController@index')->name('Articles.list');
Route::get('/article/{slug}', 'ArticlesController@read')->where('slug', '^((?!create|all).)*$')->name('Articles.read');
Route::get('/article/create', 'ArticlesController@create')->name('Articles.create')->middleware('auth');



Route::get('author/login', 'AuthorLoginController@index')->name('Author.login');
Route::post('author/loginCheck', 'AuthorLoginController@authenticate')->name('Author.check');
Route::get('author/register', 'AuthorLoginController@register')->name('Author.register');
// register check post in there
Route::get('author/logout', 'AuthorLoginController@logout')->name('Author.logout');
Route::post('author/reset', 'AuthorLoginController@resetPass')->name('Author.reset');


Route::get('/profile', function () {
    echo "welcome";
})->middleware('auth');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
