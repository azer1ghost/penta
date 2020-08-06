<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/articles', 'ArticlesController@index')->name('Articles.Frontend');
Route::get('/article/{slug}', 'ArticlesController@read')->name('Articles.Read');





Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
