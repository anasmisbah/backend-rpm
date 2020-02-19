<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login','API\AuthController@login');
Route::middleware('auth:api')->post('logout','API\AuthController@logout');

Route::get('news','API\NewsController@allnews');
Route::get('news/{id}','API\NewsController@detail');

Route::get('event','API\EventController@allevents');
Route::get('event/{id}','API\EventController@detail');

Route::get('promo','API\PromoController@allpromos');
Route::get('promo/normal','API\PromoController@promonormal');
Route::get('promo/hot','API\PromoController@promohot');
Route::get('promo/{id}','API\PromoController@detail');

Route::get('home','API\HomeController@home');

Route::get('company/profile','API\CompanyController@profile');
Route::get('company/contact','API\CompanyController@contact');

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/me','API\UserController@me');

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
