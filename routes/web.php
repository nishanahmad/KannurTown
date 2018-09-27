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


Route::get('members/create', 'MembersController@create');
Route::post('members/create', 'MembersController@insert');
Route::get('members/index', 'MembersController@index');
Route::get('/member/{id?}', 'MembersController@show');
Route::get('/member/{id?}/edit','MembersController@edit');
Route::post('/member/{id?}/edit','MembersController@update');
Route::post('/member/{id?}/delete','MembersController@destroy');

Route::get('houses/create', 'HousesController@create');
Route::post('houses/create', 'HousesController@insert');
Route::get('houses/index', 'HousesController@index');
Route::get('/house/{id?}', 'HousesController@show');
Route::get('/house/{id?}/edit','HousesController@edit');
Route::post('/house/{id?}/edit','HousesController@update');
Route::post('/house/{id?}/delete','HousesController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
