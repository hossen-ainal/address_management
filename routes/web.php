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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/user', function(){
	return view('backend.user.user-view');
});


Route::prefix('divisions')->group(function(){
	Route::get('/view', 'backend\DivisionController@view')->name('division.view');
	Route::get('/add',  'backend\DivisionController@add')->name('division.add');
	Route::post('/store', 'backend\DivisionController@store')->name('division.store');
	Route::get('/edit/{id}', 'backend\DivisionController@edit')->name('division.edit');
	Route::post('/update/{id}','backend\DivisionController@update')->name('division.update');
	Route::get('/delete/{id}','backend\DivisionController@delete')->name('division.delete');
});

Route::prefix('districts')->group(function(){
	Route::get('/view', 'backend\DistrictController@view')->name('districts.view');
	Route::get('/add',  'backend\DistrictController@add')->name('districts.add');
	Route::post('/store', 'backend\DistrictController@store')->name('districts.store');
	Route::get('/edit/{id}', 'backend\DistrictController@edit')->name('districts.edit');
	Route::post('/update/{id}','backend\DistrictController@update')->name('districts.update');
	Route::get('/delete/{id}','backend\DistrictController@delete')->name('districts.delete');
});

Route::prefix('upzillas')->group(function(){
	Route::get('/view', 'backend\UpzillaController@view')->name('upzillas.view');
	Route::get('/add',  'backend\UpzillaController@add')->name('upzillas.add');
	Route::post('/store', 'backend\UpzillaController@store')->name('upzillas.store');
	Route::get('/edit/{id}', 'backend\UpzillaController@edit')->name('upzillas.edit');
	Route::post('/update/{id}','backend\UpzillaController@update')->name('upzillas.update');
	Route::get('/delete/{id}','backend\UpzillaController@delete')->name('upzillas.delete');
});

// Default Route
Route::get('/get-district','backend\DefaultController@getDistrict')->name('default.get-district');
Route::get('/get-upzilla','backend\DefaultController@getUpzilla')->name('default.get-upzilla');


Route::prefix('unions')->group(function(){
	Route::get('/view', 'backend\UnionController@view')->name('unions.view');
	Route::get('/add',  'backend\UnionController@add')->name('unions.add');
	Route::post('/store', 'backend\UnionController@store')->name('unions.store');
	Route::get('/edit/{id}', 'backend\UnionController@edit')->name('unions.edit');
	Route::post('/update/{id}','backend\UnionController@update')->name('unions.update');
	Route::get('/delete/{id}','backend\UnionController@delete')->name('unions.delete');
});