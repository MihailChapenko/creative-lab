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

Route::domain(env('SM_DOMAIN_CRM'))->group(function () {
    Route::get('/', 'Clients\Users\UserController@index')->middleware('auth');

    //User profile
    Route::get('/get_user_profile', 'Clients\Users\UserController@getUserProfile')->middleware('auth');
    Route::post('/update_own_profile', 'Clients\Users\UserController@updateOwnProfile')->middleware('auth');
    Route::post('/get_countries_list', 'Clients\Users\UserController@getCountriesList')->middleware('auth');
    Route::post('/get_cities_list', 'Clients\Users\UserController@getCitiesList')->middleware('auth');
    Route::post('/update_own_avatar', 'Clients\Users\UserController@updateOwnAvatar')->middleware('auth');
    Route::post('/search_country', 'Clients\Users\UserController@searchCountry')->middleware('auth');
    Route::post('/search_city', 'Clients\Users\UserController@searchCity')->middleware('auth');
    Route::post('/change_user_pass', 'Clients\Users\UserController@changeUserPass')->middleware('auth');

    //user CRUD
    Route::post('/add_new_user', 'Clients\Users\UserController@addNewUser')->middleware('auth');
});
