<?php
Auth::routes();

Route::get('', 'HomeController@index')->name('home');

Route::group(['as' => 'kategoria.', 'prefix' => 'kategoria'], function () {
    Route::get('wszystkie', 'CategoryController@index')->name('index');
    Route::get('{category_name}', 'CategoryController@show')->name('show');
});

Route::group(['as' => 'gra.', 'prefix' => 'gra'], function () {
    Route::get('{unique_code}', 'GameController@index')->name('index');
});