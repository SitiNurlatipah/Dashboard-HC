<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductivityController;
use App\Models\UserModel;

Route::get('/',function(){
    return view('pages.dashboard');
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
    Route::post('/employee', 'EmployeeController@store')->name('employee.post');
    Route::post('/employee/geto', 'EmployeeController@storeGeto')->name('geto.post');
    Route::post('/employee/to', 'EmployeeController@storeTo')->name('to.post');
    Route::put('/employee/{EmployeeModel}', 'EmployeeController@update');
    Route::put('/employee/geto/{GetoModel}', 'EmployeeController@updateGeto');
    Route::put('/employee/to/{ToModel}', 'EmployeeController@updateTo');
    Route::delete('/employee/{id}', 'EmployeeController@destroy')->name('employee.delete');    
    Route::delete('/employee/geto/{id}', 'EmployeeController@destroyGeto')->name('geto.delete');    
    Route::delete('/employee/to/{id}', 'EmployeeController@destroyTo')->name('to.delete');    
    //chart manajemen employee
    Route::get('/employee/chart', 'EmployeeController@chart',)->name('chart');

      
    Route::get('/recruitment', 'RecruitmentController@index')->name('recruitment');
    Route::get('/leadtime', 'AvgLeadtimeController@index')->name('leadtime');
    
    //Productivity
    Route::get('/productivity', 'ProductivityController@index')->name('productivity');
    Route::post('/productivity', 'ProductivityController@store')->name('productivity.post');
    Route::put('/productivity/{Productivity}', 'ProductivityController@update');
    Route::delete('/productivity/{id}', 'ProductivityController@destroy')->name('productivity.delete');    
    Route::post('/productivity/humancost', 'ProductivityController@storeHumancost')->name('humancost.post');
    Route::put('/productivity/humancost/{HumanCost}', 'ProductivityController@updateHumancost');
    Route::delete('/productivity/humancost/{id}', 'ProductivityController@destroyHumancost')->name('humancost.delete');    
    
    Route::get('/hrga', 'HrgaIssuesController@index')->name('hrga');
    Route::get('/training', 'TrainingPermonthController@index')->name('training');
    Route::get('/realization', 'TrainingRealizationController@index')->name('realization');
    Route::get('/ceo', 'CeoTrainingController@index')->name('ceo');
    Route::get('/totalemployee', 'DataTotalEmployeeController@index')->name('total');
    Route::post('/totalemployee', 'DataTotalEmployeeController@store')->name('total.post');
    Route::put('/totalemployee/{dataTotalEmployee}', 'DataTotalEmployeeController@update');
    Route::delete('/totalemployee/{id}', 'DataTotalEmployeeController@destroy')->name('total.delete');    
    Route::post('/totalemployee/filter', 'DataTotalEmployeeController@filter')->name('total.filter');

    //user
    Route::get('/user', 'UserController@index')->name('user');
    Route::post('/user', 'UserController@store')->name('user.post');
    Route::put('/user/{UserModel}', 'UserController@update');
    // Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::delete('/user/{id}', 'UserController@destroy')->name('user.delete');    
    
    
    //module
    Route::get('/mppvsreal', 'MppRealController@index')->name('mppreal');

    Route::get('/register', 'AuthController@getRegister')->name('register');
    Route::post('/register', 'AuthController@postRegister')->name('register.post');
