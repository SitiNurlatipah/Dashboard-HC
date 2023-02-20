<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductivityController;
use App\Models\UserModel;


Route::get('/', 'AuthController@getLogin')->name('login');
Route::get('/login', 'AuthController@getLogin')->name('login');
Route::post('/login', 'AuthController@postLogin')->name('login.post');
Route::get('/register', 'AuthController@getRegister')->name('register');
Route::post('/register', 'AuthController@postRegister')->name('register.post');
Route::get('/logout', 'AuthController@getLogout')->name('logout');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::post('/dashboard/filter', 'DashboardController@filter')->name('dashboard.filter');
    //users
    Route::get('/user', 'UserController@index')->name('user');
    Route::post('/user', 'UserController@store')->name('user.post');
    Route::put('/user/{User}', 'UserController@update');
    Route::delete('/user/{id}', 'UserController@destroy')->name('user.delete');
    //users
    Route::get('/users', 'UserLoginController@index')->name('pengguna');
    Route::post('/users', 'UserLoginController@store')->name('pengguna.post');
    Route::put('/users/{LoginModel}', 'UserLoginController@update');
    Route::delete('/users/{id}', 'UserLoginController@destroy')->name('pengguna.delete');

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
    Route::delete('/employee/geto/{idGeto}', 'EmployeeController@destroyGeto')->name('geto.delete');    
    Route::delete('/employee/to/{idTo}', 'EmployeeController@destroyTo')->name('to.delete');    
    //chart manajemen employee

      
    Route::get('/recruitment', 'RecruitmentController@index')->name('recruitment');
    Route::post('/recruitment', 'RecruitmentController@store')->name('recruitment.post');
    Route::put('/recruitment/{RecruitmentModel}', 'RecruitmentController@update');
    Route::delete('/recruitment/{idRecruitment }', 'RecruitmentController@destroy')->name('recruitment.delete');
    //leadtime
    Route::get('/leadtime', 'AvgLeadtimeController@index')->name('avg');
    Route::post('/leadtime', 'AvgLeadtimeController@store')->name('avg.post');
    Route::put('/leadtime/{AvdLeadtimeRecruitment}', 'AvgLeadtimeController@update');
    Route::delete('/leadtime/{idAvg}', 'AvgLeadtimeController@destroy')->name('avg.delete');    
    Route::post('/leadtime/filter', 'AvgLeadtimeController@filter')->name('avg.filter');

    //Productivity
    Route::get('/productivity', 'ProductivityController@index')->name('productivity');
    Route::post('/productivity', 'ProductivityController@store')->name('productivity.post');
    Route::put('/productivity/{Productivity}', 'ProductivityController@update');
    Route::delete('/productivity/{id}', 'ProductivityController@destroy')->name('productivity.delete');    
    Route::post('/productivity/humancost', 'ProductivityController@storeHumancost')->name('humancost.post');
    Route::put('/productivity/humancost/{HumanCost}', 'ProductivityController@updateHumancost');
    Route::delete('/productivity/humancost/{id}', 'ProductivityController@destroyHumancost')->name('humancost.delete');    
    Route::post('/productivity/growth', 'ProductivityController@storeGrowth')->name('growth.post');
    Route::put('/productivity/growth/{Growth}', 'ProductivityController@updateGrowth');
    Route::delete('/productivity/growth/{id}', 'ProductivityController@destroyGrowth')->name('growth.delete');    
    Route::post('/productivity/filter', 'ProductivityController@filter')->name('productivity.filter');
    //kcs
    Route::get('/hrgakcs', 'HrgaKcsController@index')->name('kcs');
    Route::post('/hrgakcs', 'HrgaKcsController@storeTop')->name('kcs.post');
    Route::put('/hrgakcs/{KcsToptenModel}', 'HrgaKcsController@updateTop');
    Route::delete('/hrgakcs/{idtopten}', 'HrgaKcsController@destroyTop')->name('kcs.delete');
    Route::post('/hrgakcs/filter', 'HrgaKcsController@filterTop')->name('kcs.filter');
    //jmlitemcode
    Route::post('/hrgakcs/code', 'HrgaKcsController@storeCode')->name('kcscode.post');
    Route::put('/hrgakcs/code/{KcsJmlCodeModel}', 'HrgaKcsController@updateCode');
    Route::delete('/hrgakcs/code/{idJmlCode}', 'HrgaKcsController@destroyCode')->name('kcscode.delete');
    //receiptusage
    Route::post('/hrgakcs/receiptissue', 'HrgaKcsController@storeReceipt')->name('kcsreceipt.post');
    Route::put('/hrgakcs/receiptissue/{KcsReceiptUsageModel}', 'HrgaKcsController@updateReceipt');
    Route::delete('/hrgakcs/receiptissue/{idreceiptissue}', 'HrgaKcsController@destroyReceipt')->name('kcsreceipt.delete');
    //fsn
    Route::post('/hrgakcs/fsn', 'HrgaKcsController@storeFsn')->name('kcsfsn.post');
    Route::put('/hrgakcs/fsn/{KcsFsnModel}', 'HrgaKcsController@updateFsn');
    Route::delete('/hrgakcs/fsn/{idkcsfsn}', 'HrgaKcsController@destroyFsn')->name('kcsfsn.delete');
    //inventory
    Route::post('/hrgakcs/target', 'HrgaKcsController@storeTarget')->name('kcstarget.post');
    Route::post('/hrgakcs/inventory', 'HrgaKcsController@storeInventory')->name('kcsinventory.post');
    Route::put('/hrgakcs/inventory/{KcsInventoryModel}', 'HrgaKcsController@updateInventory');
    Route::delete('/hrgakcs/inventory/{idinventory}', 'HrgaKcsController@destroyInventory')->name('kcsinventory.delete');
    //toptenissued
    Route::post('/hrgakcs/topissued', 'HrgaKcsController@storeTopIssued')->name('kcstopissued.post');
    Route::put('/hrgakcs/topissued/{KcsToptenIssuedModel}', 'HrgaKcsController@updateTopIssued');
    Route::delete('/hrgakcs/topissued/{idkcstoptenissued}', 'HrgaKcsController@destroyTopIssued')->name('kcstopissued.delete');
    //toptenreceipt
    Route::post('/hrgakcs/topreceipt', 'HrgaKcsController@storeTopReceipt')->name('kcstopreceipt.post');
    Route::put('/hrgakcs/topreceipt/{KcsToptenReceiptModel}', 'HrgaKcsController@updateTopReceipt');
    Route::delete('/hrgakcs/topreceipt/{idkcstoptenreceipt}', 'HrgaKcsController@destroyTopReceipt')->name('kcstopreceipt.delete');
    //department
    Route::post('/hrgakcs/department', 'HrgaKcsController@storeDepartment')->name('kcsdepartment.post');
    Route::put('/hrgakcs/department/{KcsDepartmentModel}', 'HrgaKcsController@updateDepartment');
    Route::delete('/hrgakcs/department/{idkcsdepartment}', 'HrgaKcsController@destroyDepartment')->name('kcsdepartment.delete');
    //costcenter
    Route::post('/hrgakcs/costcenter', 'HrgaKcsController@storeCostCenter')->name('kcsccissued.post');
    Route::put('/hrgakcs/costcenter/{KcsCostCenterIssuedModel}', 'HrgaKcsController@updateCostCenter');
    Route::delete('/hrgakcs/costcenter/{idkcscostcenter}', 'HrgaKcsController@destroyCostCenter')->name('kcsccissued.delete');
    //payroll
    Route::get('/payroll', 'PayrollController@index')->name('payroll');
    Route::post('/payroll/filter', 'PayrollController@filter')->name('payroll.filter');
    Route::post('/payroll', 'PayrollController@storeOvertime')->name('payroll.post');
    Route::put('/payroll/{PayrollOvertimeModel}', 'PayrollController@updateOvertime');
    Route::delete('/payroll/{idtop_ot}', 'PayrollController@destroyOvertime')->name('payroll.delete');
    //dukacita
    Route::post('/payroll/dukacita', 'PayrollController@storeDukacita')->name('payrollDukacita.post');
    Route::put('/payroll/dukacita/{PayrollDukacitaModel}', 'PayrollController@updateDukacita');
    Route::delete('/payroll/dukacita/{id_dukacita}', 'PayrollController@destroyDukacita')->name('payrollDukacita.delete');
    //kelahiran
    Route::post('/payroll/kelahiran', 'PayrollController@storeKelahiran')->name('payrollKelahiran.post');
    Route::put('/payroll/kelahiran/{PayrollKelahiranModel}', 'PayrollController@updateKelahiran');
    Route::delete('/payroll/kelahiran/{id_kelahiran}', 'PayrollController@destroyKelahiran')->name('payrollKelahiran.delete');
    //terlambat
    Route::post('/payroll/terlambat', 'PayrollController@storeTerlambat')->name('payrollLate.post');
    Route::put('/payroll/terlambat/{PayrollTerlambatModel}', 'PayrollController@updateTerlambat');
    Route::delete('/payroll/terlambat/{id_terlambat}', 'PayrollController@destroyTerlambat')->name('payrollLate.delete');

    //kch
    Route::get('/hrgakch', 'HrgaKchController@index')->name('kch');
    Route::post('/hrgakch', 'HrgaKchController@storeTop')->name('kchtopten.post');
    Route::put('/hrgakch/{KchToptenModel}', 'HrgaKchController@updateTop');
    Route::delete('/hrgakch/{idkchtopten}', 'HrgaKchController@destroyTop')->name('kchtopten.delete');
    Route::post('/hrgakch/filter', 'HrgaKchController@filter')->name('kch.filter');

    //kchjmlitemcode
    Route::post('/hrgakch/code', 'HrgaKchController@storeCode')->name('kchcode.post');
    Route::put('/hrgakch/code/{KchJmlCodeModel}', 'HrgaKchController@updateCode');
    Route::delete('/hrgakch/code/{idkchjmlcode}', 'HrgaKchController@destroyCode')->name('kchcode.delete');
    //kchreceiptusage,
    Route::post('/hrgakch/receiptissue', 'HrgaKchController@storeReceipt')->name('kchreceipt.post');
    Route::put('/hrgakch/receiptissue/{KchReceiptUsageModel}', 'HrgaKchController@updateReceipt');
    Route::delete('/hrgakch/receiptissue/{idkchreceiptissue}', 'HrgaKchController@destroyReceipt')->name('kchreceipt.delete');
    //kchinventory
    Route::post('/hrgakch/target', 'HrgaKchController@storeTarget')->name('kchtarget.post');
    Route::post('/hrgakch/inventory', 'HrgaKchController@storeInventory')->name('kchinventory.post');
    Route::put('/hrgakch/inventory/{KchInventoryModel}', 'HrgaKchController@updateInventory');
    Route::delete('/hrgakch/inventory/{idkchinventory}', 'HrgaKchController@destroyInventory')->name('kchinventory.delete');
    //kchfsn
    Route::post('/hrgakch/fsn', 'HrgaKchController@storeFsn')->name('kchfsn.post');
    Route::put('/hrgakch/fsn/{KchFsnModel}', 'HrgaKchController@updateFsn'); 
    Route::delete('/hrgakch/fsn/{idkchfsn}', 'HrgaKchController@destroyFsn')->name('kchfsn.delete');
    //kchtoptenissued
    Route::post('/hrgakch/topissued', 'HrgaKchController@storeTopIssued')->name('kchtopissued.post');
    Route::put('/hrgakch/topissued/{KchToptenIssuedModel}', 'HrgaKchController@updateTopIssued');
    Route::delete('/hrgakch/topissued/{idkchtoptenissued}', 'HrgaKchController@destroyTopIssued')->name('kchtopissued.delete');
    //kchtoptenreceipt
    Route::post('/hrgakch/topreceipt', 'HrgaKchController@storeTopReceipt')->name('kchtopreceipt.post');
    Route::put('/hrgakch/topreceipt/{KchToptenReceiptModel}', 'HrgaKchController@updateTopReceipt');
    Route::delete('/hrgakch/topreceipt/{idkchtoptenreceipt}', 'HrgaKchController@destroyTopReceipt')->name('kchtopreceipt.delete');
    //kchdepartment
    Route::post('/hrgakch/department', 'HrgaKchController@storeDepartment')->name('kchdepartment.post');
    Route::put('/hrgakch/department/{KchDepartmentModel}', 'HrgaKchController@updateDepartment');
    Route::delete('/hrgakch/department/{idkchdepartment}', 'HrgaKchController@destroyDepartment')->name('kchdepartment.delete');
    //kchcostcenter
    Route::post('/hrgakch/costcenter', 'HrgaKchController@storeCostCenter')->name('kchccissued.post');
    Route::put('/hrgakch/costcenter/{KchCostCenterIssuedModel}', 'HrgaKchController@updateCostCenter');
    Route::delete('/hrgakch/costcenter/{idkchcostcenter}', 'HrgaKchController@destroyCostCenter')->name('kchccissued.delete');

    //data trainee
    Route::get('/training/trainee', 'DataTraineeController@index')->name('trainee');
    Route::post('/training/trainee', 'DataTraineeController@store')->name('trainee.post');
    Route::put('/training/trainee/{DataTraineeModel}', 'DataTraineeController@update');
    Route::delete('/training/trainee/{idTrainee}', 'DataTraineeController@destroy')->name('trainee.delete');    
 
    //training total per month
    Route::get('/training', 'TrainingPermonthController@index')->name('training');
    Route::post('/training', 'TrainingPermonthController@store')->name('training.post');
    Route::put('/training/{TrainingTotalPerMonth}', 'TrainingPermonthController@update');
    Route::delete('/training/{idTrainingTotalPerMonth}', 'TrainingPermonthController@destroy')->name('training.delete');    
    Route::post('/training/filter', 'TrainingPermonthController@filter')->name('training.filter');

    //training realisasi
    Route::get('/realization', 'TrainingRealizationController@index')->name('realization');
    Route::post('/realization', 'TrainingRealizationController@store')->name('realization.post');
    Route::put('/realization/{TrainingRealization}', 'TrainingRealizationController@update');
    Route::delete('/realization/{id}', 'TrainingRealizationController@destroy')->name('realization.delete');    
    //costcenter
    Route::post('/training/kasbon', 'KasbonController@store')->name('kasbon.post');
    Route::put('/training/kasbon/{KasbonModel}', 'KasbonController@update');
    Route::delete('/training/kasbon/{idKasbon}', 'KasbonController@destroy')->name('kasbon.delete');    
    //ikatan dinas
    Route::post('/training/ikatandinas', 'IkatanDinasController@store')->name('dinas.post');
    Route::put('/training/ikatandinas/{IkatanDinasModel}', 'IkatanDinasController@update');
    Route::delete('/training/ikatandinas/{idIkatanDinas}', 'IkatanDinasController@destroy')->name('dinas.delete');    
    //learninghours
    Route::post('/training/learninghours', 'LearningHoursController@store')->name('learninghours.post');
    Route::put('/training/learninghours/{LearningHoursTrainingModel}', 'LearningHoursController@update');
    Route::delete('/training/learninghours/{id_learninghours}', 'LearningHoursController@destroy')->name('learninghours.delete');    

    Route::get('/ceo', 'CeoTrainingController@index')->name('ceo');
    Route::get('/totalemployee', 'DataTotalEmployeeController@index')->name('total');
    Route::post('/totalemployee', 'DataTotalEmployeeController@store')->name('total.post');
    Route::put('/totalemployee/{dataTotalEmployee}', 'DataTotalEmployeeController@update');
    Route::delete('/totalemployee/{id}', 'DataTotalEmployeeController@destroy')->name('total.delete');    
    Route::post('/totalemployee/filter', 'DataTotalEmployeeController@filter')->name('total.filter');

    //user
        
    
    //Blanace Scorecard
    Route::get('/balacescorecard', 'BalanceScorecardController@index')->name('balance');
    Route::post('/balacescorecard', 'BalanceScorecardController@store')->name('financial.post');
    Route::put('/balacescorecard/{BalanceScorecardModel}', 'BalanceScorecardController@update');
    Route::delete('/balacescorecard/{idfinancial}', 'BalanceScorecardController@destroy')->name('financial.delete');
    //Balance Business
    Route::post('/balacescorecard/business', 'BalanceBusinessController@store')->name('business.post');
    Route::put('/balacescorecard/business/{BSCBusinessModel}', 'BalanceBusinessController@update');
    Route::delete('/balacescorecard/business/{idbussiness}', 'BalanceBusinessController@destroy')->name('business.delete');
    //Balance Customer
    Route::post('/balacescorecard/customer', 'BalanceCustomerController@store')->name('customer.post');
    Route::put('/balacescorecard/customer/{BSCCustomerModel}', 'BalanceCustomerController@update');
    Route::delete('/balacescorecard/customer/{idcustomer}', 'BalanceCustomerController@destroy')->name('customer.delete');
    //Balance Learn
    Route::post('/balacescorecard/learngrowth', 'BalanceLearnGrowthController@store')->name('learn.post');
    Route::put('/balacescorecard/learngrowth/{BSCLearnGrowthModel}', 'BalanceLearnGrowthController@update');
    Route::delete('/balacescorecard/learngrowth/{idlearngrowth}', 'BalanceLearnGrowthController@destroy')->name('learn.delete');
    
    //Sales
    Route::get('/sales', 'SalesController@index')->name('sales');
    Route::post('/sales', 'SalesController@store')->name('sales.post');
    Route::put('/sales/{SalesModel}', 'SalesController@update');
    Route::delete('/sales/{idMtd}', 'SalesController@destroy')->name('sales.delete');
    //sales ytd
    Route::post('/sales/ytd', 'SalesYtdController@store')->name('salesytd.post');
    Route::put('/sales/ytd/{SalesYtdModel}', 'SalesYtdController@update');
    Route::delete('/sales/ytd/{idYtd}', 'SalesYtdController@destroy')->name('salesytd.delete');

    
    //real
    Route::get('/mppvsreal', 'MppRealController@index')->name('mppreal');
    Route::post('/mppvsreal', 'MppRealController@store')->name('mppreal.post');
    Route::post('/mppvsreal/filter', 'MppRealController@filter')->name('mppreal.filter');
    Route::put('/mppvsreal/{RealModel}', 'MppRealController@update');
    Route::delete('/mppvsreal/{idReal}', 'MppRealController@destroy')->name('mppreal.delete');
    //mpp    
    Route::post('/mppvsreal/mpp', 'MppRealController@storeMpp')->name('mpp.post');
    Route::put('/mppvsreal/mpp/{MppModel}', 'MppRealController@updateMpp');
    Route::delete('/mppvsreal/mpp/{idmpp}', 'MppRealController@destroyMpp')->name('mpp.delete');    
    
});
    
        
    
