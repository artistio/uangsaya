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
    return view('dashboard');
})->middleware('auth');

Route::resource('account', 'FinancialAccountController');
Route::resource('contact', 'ContactController');
Route::resource('income', 'TransactionController');
Route::resource('expense', 'TransactionController');
Route::resource('transfer', 'TransactionController');
Route::resource('transaction', 'AdvanceTransactionController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
