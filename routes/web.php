<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

Route::group(['prefix' => \UriLocalizer::localeFromRequest()], function(){

    Route::group(['prefix' => 'admin'], function () {
        Voyager::routes();
    });

    Route::get('/', 'PageController@index')->name('Page.index');
    Route::get('/pages/{slug}', 'PageController@getPage')->where('slug', '^((?!authors).)*$')->name('Page.read');
    Route::get('/pages/authors', 'AuthorController@index')->name('Author.list');

    Route::prefix('article')->group(function () {
        Route::get('/all', 'ArticlesController@index')->name('Articles.list');
        Route::get('/{slug}', 'ArticlesController@read')->where('slug', '^((?!create|all).)*$')->name('Articles.read');
        Route::get('/create', 'ArticlesController@create')->name('Articles.create')->middleware('auth');
    });

    Route::prefix('author')->group(function () {
        Route::get('/login', 'AuthorLoginController@index')->name('Author.login');
        Route::post('/loginCheck', 'AuthorLoginController@authenticate')->name('Author.check');
        Route::get('/register', 'AuthorLoginController@register')->name('Author.register');
        Route::get('/logout', 'AuthorLoginController@logout')->name('Author.logout');
        Route::post('/reset', 'AuthorLoginController@resetPass')->name('Author.reset');
        Route::get('/profile', function () {
            echo "welcome";
        })->middleware('auth');
    });


}); // language



//Route::middleware(['admin'])->group(function () {
//
//});
