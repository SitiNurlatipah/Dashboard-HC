<?php

use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('pages.dashboard');
});
Route::view('welcomes','welcome');
 
Route::get('/locater',function(){
        return view('pages.locater.index');
    });

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/user', 'UserController@index')->name('user');

Route::get('/locater', 'LocaterController@index')->name('locater');
Route::get('/history', 'HistoryController@index')->name('history');
Route::get('/module', 'ModuleController@index')->name('module');
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', 'AuthController@getLogin')->name('login');
    Route::post('/login', 'AuthController@postLogin')->name('login.post');
});
