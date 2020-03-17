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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'TestController@index');

Route::post('/send', 'SendMailController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/proposal/create', 'ProposalController@create')->name('create-proposal');

Route::match(['get', 'post'],'/proposal/delete', 'ProposalController@delete')->name('delete-proposal');



