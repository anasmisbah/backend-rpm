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

Route::get('chat/us',function()
{
    return view('chat');
});
Route::get('news/read/{slug}','NewsController@read')->name('news.read');
Route::get('event/read/{slug}','EventController@read')->name('event.read');
Route::get('transaction/distributor/chart/{id}','TransactionController@chart')->name('transaction.distributor.chart');
Route::get('transaction/datachart','TransactionController@datachart')->name('transaction.datachart');
Route::get('401', function () {
    return view('auth.401');
})->name('error.401');
Route::get('/company/profile/download','CompanyController@download')->name('company.profile.download');

Route::middleware(['auth','admin'])->group(function (){
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::get('/user/profile','UserController@profile')->name('profile.user');
    Route::get('/user/profile/edit','UserController@profileedit')->name('profile.edit');
    Route::put('/user/profile','UserController@profileupdate')->name('profile.update');

    Route::resource('news', 'NewsController');
    Route::resource('event', 'EventController');

    Route::middleware(['superadmin'])->group(function (){

        Route::get('home/chart','HomeController@chart')->name('home.chart');
        Route::get('home/voucher','HomeController@voucher')->name('home.voucher');
        Route::get('home/delivery','HomeController@delivery')->name('home.delivery');

        Route::resource('category', 'CategoryController');
        Route::resource('promo', 'PromoController');
        Route::resource('distributor', 'DistributorController');

        Route::get('distributor/coupon/{id}','CouponController@index')->name('distributor.coupon.index');
        Route::get('distributor/coupon/create/{id}','CouponController@create')->name('distributor.coupon.create');
        Route::post('distributor/coupon/store','CouponController@store')->name('distributor.coupon.store');
        Route::delete('distributor/coupon/delete/{id}','CouponController@destroy')->name('distributor.coupon.destroy');
        Route::get('distributor/coupon/deleteall/{id}','CouponController@deleteall')->name('distributor.coupon.deleteall');
        Route::get('distributor/coupon/print/{id}','CouponController@print')->name('distributor.coupon.print');

        Route::get('employee/distributor/{id}','EmployeeController@index')->name('employee.distributor.index');
        Route::get('employee/distributor/create/{id}','EmployeeController@create')->name('employee.distributor.create');
        Route::get('employee/distributor/detail/{id}','EmployeeController@show')->name('employee.distributor.show');
        Route::get('employee/distributor/edit/{id}','EmployeeController@edit')->name('employee.distributor.edit');
        Route::delete('employee/distributor/{id}','EmployeeController@destroy')->name('employee.distributor.destroy');
        Route::post('employee/distributor/store','EmployeeController@store')->name('employee.distributor.store');
        Route::put('employee/distributor/update/{id}','EmployeeController@update')->name('employee.distributor.update');

        Route::get('transaction/distributor/{id}','TransactionController@index')->name('transaction.distributor.index');
        Route::get('transaction/distributor/create/{id}','TransactionController@create')->name('transaction.distributor.create');
        Route::get('transaction/distributor/detail/{id}','TransactionController@show')->name('transaction.distributor.show');
        Route::get('transaction/distributor/edit/{id}','TransactionController@edit')->name('transaction.distributor.edit');
        Route::delete('transaction/distributor/{id}','TransactionController@destroy')->name('transaction.distributor.destroy');
        Route::post('transaction/distributor/store','TransactionController@store')->name('transaction.distributor.store');
        Route::put('transaction/distributor/update/{id}','TransactionController@update')->name('transaction.distributor.update');

        Route::get('/user','UserController@index')->name('user.index');
        Route::get('/user/{id}','UserController@show')->name('user.show');

        Route::resource('admin', 'AdminController');
        Route::resource('driver', 'DriverController');

        Route::get('/company','CompanyController@index')->name('company.index');
        Route::get('/company/edit','CompanyController@edit')->name('company.edit');
        Route::put('/company/{id}','CompanyController@update')->name('company.update');
    });
});
