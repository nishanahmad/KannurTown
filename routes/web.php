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
Route::resource('members', 'MembersController');
Route::get('/member/order/{memberId}/{order}', 'MembersController@reorder');
Route::get('/member/family/{memberId}/{familyId}', 'MembersController@assign');

Route::resource('houses', 'HousesController');
Route::post('/houses/updateName','HousesController@updateName');
Route::post('/houses/updateAddress','HousesController@updateAddress');

Route::get('tj/index/{year}', 'TJController@index');
Route::get('/houses/assign/{id?}', 'HousesController@assign');

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/', 'HomeController@home')->name('home');
