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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => '', 'middleware' => ['auth','checkrole']], function (){
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    Route::get('/dashboard/artikel', 'AdminController@artikel')->name('artikel');
    Route::get('/dashboard/artikel/create', 'AdminController@create')->name('tambah-artikel');
    Route::post('/dashboard/artikel','AdminController@store')->name('simpan-artikel');
    Route::delete('dashboard/artikel/{article}/delete','AdminController@destroy')->name('delete-artikel');
});
Route::get('/error', 'ErrorController@error')->name('error');
Route::get('/', 'ErrorController@goback')->name('back');

Route::post('/login/custom', 'LoginController@login')->name('login.custom');
// Route::get('/dashboard', 'AdminController@index')->name('dashboard')->middleware('checkrole:500');


