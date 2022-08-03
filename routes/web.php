<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Models\UserModel;

Route::get('/',function(){
    return view('pages.dashboard');
});
Route::get('/locater',function(){
        return view('pages.locater.index');
    });

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', 'AuthController@getLogin')->name('login');
    Route::post('/login', 'AuthController@postLogin')->name('login.post');
    
});
    
    Route::get('/logout', 'AuthController@getLogout')->name('logout');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    //manajemen user
    Route::get('/employee', 'EmployeeController@index')->name('employee');
    //Route::get('/employee/get', 'EmployeeController@cgJson')->name('employee.get');    
    Route::post('/employee/post', 'EmployeeController@store')->name('employee.post');
    //locater    
    Route::get('/locater', 'LocaterController@index')->name('locater');
    //user
    Route::get('/user', 'UserController@index')->name('user');
    Route::post('/user', 'UserController@store')->name('user.post');
    Route::put('/user/{UserModel}', 'UserController@update');
    // Route::patch('/user', 'UserController@update')->name('user.update');
    Route::delete('/user/{id}', 'UserController@destroy')->name('user.delete');    
    //module
    Route::get('/module', 'ModuleController@index')->name('module');

    Route::get('/register', 'AuthController@getRegister')->name('register');
    Route::post('/register', 'AuthController@postRegister')->name('register.post');
