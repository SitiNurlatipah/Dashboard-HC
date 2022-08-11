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
    //manajemen employee
    Route::get('/employee', 'EmployeeController@indexEmployee',)->name('employee');
    Route::post('/employee/filter', 'EmployeeController@filter')->name('employee.filter');
    // Route::post('/employee/filtergeto', 'EmployeeController@employeeFilterGeto')->name('geto.filter');
    // Route::post('/employee/filterto', 'EmployeeController@employeeFilterTo')->name('to.filter');
    // Route::get('/employee/to', 'EmployeeController@toFilter',)->name('to');
    Route::post('/employee', 'EmployeeController@store')->name('employee.post');
    Route::post('/employee/geto', 'EmployeeController@storeGeto')->name('geto.post');
    Route::post('/employee/to', 'EmployeeController@storeTo')->name('to.post');
    Route::put('/employee/{EmployeeModel}', 'EmployeeController@update');
    Route::put('/employee/geto/{GetoModel}', 'EmployeeController@updateGeto');
    Route::put('/employee/to/{ToModel}', 'EmployeeController@updateTo');
    Route::delete('/employee/{id}', 'EmployeeController@destroy')->name('employee.delete');    
    Route::delete('/employee/geto/{id}', 'EmployeeController@destroyGeto')->name('geto.delete');    
    Route::delete('/employee/to/{id}', 'EmployeeController@destroyTo')->name('to.delete');    

    //locater    
    Route::get('/locater', 'LocaterController@index')->name('locater');
    
    //user
    Route::get('/user', 'UserController@index')->name('user');
    Route::post('/user', 'UserController@store')->name('user.post');
    Route::put('/user/{UserModel}', 'UserController@update');
    // Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::delete('/user/{id}', 'UserController@destroy')->name('user.delete');    
    
    
    //module
    Route::get('/module', 'ModuleController@index')->name('module');

    Route::get('/register', 'AuthController@getRegister')->name('register');
    Route::post('/register', 'AuthController@postRegister')->name('register.post');
