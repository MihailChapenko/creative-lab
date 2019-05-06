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

Route::domain(env('SM_DOMAIN_CRM'))->group(function() {
   Route::get('/', 'Clients\Users\UserController@index')->middleware('auth');
   Route::get('/user_profile', 'Clients\Users\UserController@getUserProfile')->middleware('auth');
});
