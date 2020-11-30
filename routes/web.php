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
Route::post('Updatestock', 'StockController@update')->name('UpdateIncomingStock');
Route::delete('Deletestock', 'StockController@delete')->name('DeleteIncomingStock');

Route::get('outcomingstock', 'OutcomeStockController@index')->name('OutcomingStock');
Route::post('outcomingstock', 'OutcomeStockController@store')->name('InsertOutcomingStock');
Route::get('PrintPDF/{transaction}', 'InvoiceController@generateInvoice')->name('printReportpdf');



Route::get('UnitStock', 'UnitController@index')->name('UnitStock');
Route::get('UserSetting', 'UserSettingController@index')->name('UserSetting');


Route::get('UserManagement', 'UserManagementController@index')->name('UserManagement');
Route::post('UserManagement', 'UserManagementController@store')->name('CreateNewUser');
Route::post('UserManagement/Update', 'UserManagementController@update')->name('UpdateUser');
Route::delete('UserManagement/delete', 'UserManagementController@delete')->name('DeleteUser');