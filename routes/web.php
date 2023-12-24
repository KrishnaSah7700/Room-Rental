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

Route::get('/', function () {
    return view('welcome');
});
Route::view('login','backend.dashboard.login')->name('login');
Route::post('submit','LoginController@login')->name('admin.login.submit');
Route::group(['prefix' =>'admin','middleware'=>'auth'], function () {
    Route::view('dashboard','backend.dashboard.index')->name('dashboard');
    Route::view('login','backend.dashboard.system_settings')->name('system.setting');
    Route::resource('system-setting','SystemController');

});

