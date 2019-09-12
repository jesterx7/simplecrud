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

Route::get('/login', function () {
    return view('login');
});

Route::get('/', 'MainController@index');
Route::get('/list_data', 'MainController@list_data');
Route::get('/manage_data', 'MainController@manage_data');
Route::get('/add_data', 'MainController@add_data');
Route::get('/checking', 'MainController@checking');
Route::get('/edit_data/{data_id}', 'MainController@edit_data');
Route::get('/delete_data/{data_id}', 'MainController@delete_data');
Route::get('/manage_account', 'MainController@manage_account');
Route::get('/add_account', 'MainController@add_account');
Route::get('/edit_account/{user_id}', 'MainController@edit_account');
Route::get('/delete_account/{user_id}', 'MainController@delete_account');
Route::get('/logout', 'MainController@logout');

Route::post('/login', 'MainController@user_login');
Route::post('/add_data', 'MainController@submit_data');
Route::post('/edit_data/{data_id}', 'MainController@update_data');
Route::post('/add_account', 'MainController@submit_account');
Route::post('/edit_account/{user_id}', 'MainController@update_account');