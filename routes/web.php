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

Route::get('/proposal', 'ProposalController@index')->name('proposal')->middleware('role:employee');

Route::post('/proposal/list', 'ProposalController@show')->name('list-proposal');

Auth::routes();

Route::get('/list', 'HomeController@show')->name('show-list')->middleware('role:manager');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/proposal/create', 'ProposalController@create')->name('create-proposal')->middleware('role:employee');

Route::post('/proposal/update', 'ProposalController@update')->name('update-proposal')->middleware('role:manager');


Route::match(['get', 'post'],'/proposal/delete', 'ProposalController@delete')->name('delete-proposal');



