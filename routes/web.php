<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();




Route::middleware(['auth'])->group(function (){
    Route::get('/', function () {
        return view('home');
    });

    Route::resource('category', 'CategoryController');
    Route::resource('news', 'NewsController');
    Route::resource('event', 'EventController');
    Route::resource('promo', 'PromoController');
    Route::resource('company', 'CompanyprofileController');
    Route::resource('distributor', 'DistributorController');

    Route::get('employee/distributor/{id}','EmployeeController@index')->name('employee.distributor.index');
    Route::get('employee/distributor/create/{id}','EmployeeController@create')->name('employee.distributor.create');
    Route::get('employee/distributor/detail/{id}','EmployeeController@show')->name('employee.distributor.show');
    Route::get('employee/distributor/edit/{id}','EmployeeController@edit')->name('employee.distributor.edit');
    Route::delete('employee/distributor/{id}','EmployeeController@destroy')->name('employee.distributor.destroy');
    Route::post('employee/distributor/store','EmployeeController@store')->name('employee.distributor.store');
    Route::put('employee/distributor/update/{id}','EmployeeController@update')->name('employee.distributor.update');

    Route::get('/user','UserController@index')->name('user.index');
    Route::get('/user/{id}','UserController@show')->name('user.show');

});
