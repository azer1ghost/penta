<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@index')->name('Page.Homepage');
Route::get('/pages/{slug}', 'PageController@getPage')->name('Page.Read');

Route::get('/articles', 'ArticlesController@index')->name('Articles.Frontend');
Route::get('/article/{slug}', 'ArticlesController@read')->name('Articles.Read');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
