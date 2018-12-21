<?php


    Route::get('/', 'HomeCTRL@index')->name('index');
    Route::get('/anket/{id}', 'HomeCTRL@anket')->name('anket');
    Route::get('/oy_ver/{id}', 'HomeCTRL@oy_ver')->name('oy_ver');



    Route::group(['prefix' => '/adminer/', 'middleware' => 'auth'], function () {
        Route::get('/', 'AdminCTRL@index')->name('admin_dashboard');


        Route::resource('/bolge', 'StateCTRL');
        Route::resource('/anket', 'PollCTRL');
        Route::resource('/secenek', 'OptionCTRL');
        Route::resource('/hack', 'HackCTRL');

    });

    Auth::routes();