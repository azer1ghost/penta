<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

Route::get('/', 'PageController@index')->name('Page.homepage');
Route::get('/pages/{slug}', 'PageController@getPage')->name('Page.read');

Route::get('/articles', 'ArticlesController@index')->name('Articles.list');
Route::get('/articles/{slug}', 'ArticlesController@read')->name('Articles.read');
Route::get('/article/create', 'ArticlesController@create')->name('Articles.create')->middleware('auth');

Route::get('/authors', 'AuthorController@index')->name('Author.list');
Route::get('/login', 'AuthorLoginController@index')->name('Author.login');
Route::get('/register', 'AuthorLoginController@register')->name('Author.register');
Route::post('/loginCheck', 'AuthorLoginController@authenticate')->name('Author.check');
Route::get('/logout', 'AuthorLoginController@logout')->name('Author.logout');
Route::post('/reset', 'AuthorLoginController@resetPass')->name('Author.reset');


Route::get('/profile', function () {
    echo "welcome";
})->middleware('auth');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
