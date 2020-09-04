<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

Route::group(['prefix' => \UriLocalizer::localeFromRequest()], function(){

    Route::group(['prefix' => 'admin'], function () {
        Voyager::routes();
    });

    Route::get('/', 'PageController@index')->name('Page.index');
    Route::get('/pages/{slug}', 'PageController@getPage')->where('slug', '^((?!authors).)*$')->name('Page.read');
    Route::get('/pages/authors', 'AuthorController@authors')->name('Author.list');

    Route::prefix('article')->group(function () {
        Route::get('/all', 'ArticlesController@index')->name('Articles.list');
        Route::get('/{slug}', 'ArticlesController@read')->where('slug', '^((?!create|all).)*$')->name('Articles.read');
        Route::get('/create', 'ArticlesController@create')->name('Articles.create')->middleware('auth');
    });

    Route::prefix('author')->group(function () {
        Route::get('/login', 'AuthorController@index')->name('Author.login');
        Route::post('/login', 'AuthorController@authenticate')->name('Author.check');
        Route::get('/register', 'AuthorController@index')->name('Author.register');
        Route::get('/logout', 'AuthorController@logout')->name('Author.logout');
        Route::get('/reset', 'AuthorController@index')->name('Author.reset');
        Route::get('/set-password', 'AuthorController@index')->name('Author.setpassword');
        Route::post('/reset', 'AuthorController@recover')->name('Author.recover');
        Route::get('/profile', function () {
            echo "welcome";
        })->middleware('auth');
    });


}); // language



//Route::middleware(['admin'])->group(function () {
//
//});


