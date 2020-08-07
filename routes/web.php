<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@index')->name('Page.homepage');
Route::get('/pages/{slug}', 'PageController@getPage')->name('Page.read');

Route::get('/articles', 'ArticlesController@index')->name('Articles.list');
Route::get('/article/{slug}', 'ArticlesController@read')->name('Articles.read');

Route::get('/authors', 'AuthorController@index')->name('Author.list');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
