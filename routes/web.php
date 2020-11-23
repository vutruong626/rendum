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


Route::get('/random-user/id/{code}', 'IndexController@index')->middleware('check.link');
Route::get('/', 'IndexController@index')->middleware('check.link');
Route::get('/import-excel', 'MyController@ImportExcel');
Route::post('/users', 'UserController@store');
Route::get('/get-user-prize-first','UserController@getUserPrizeFirst');
