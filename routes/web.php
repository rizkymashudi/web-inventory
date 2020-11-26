<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('dashboard', 'DashboardController@index')->name('Dashboard');
Route::get('stock', 'StockController@index')->name('incomingStock');
Route::post('stock', 'StockController@store')->name('CreateIncomingStock');

Route::get('outcomingstock', 'OutcomeStockController@index')->name('OutcomingStock');



Route::get('UnitStock', 'UnitController@index')->name('UnitStock');
Route::get('UserSetting', 'UserSettingController@index')->name('UserSetting');
Route::get('UserManagement', 'UserManagementController@index')->name('UserManagement');