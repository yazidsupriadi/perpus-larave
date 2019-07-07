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


Route::get('/','BerandaController@index');
Route::get('/allbook','BerandaController@allbook');
Route::get('/book/{name}','BerandaController@bookbycategory');
Route::get('/book/{id}/detail','BerandaController@detail');
Route::get('/member/register','AuthController@register');
Route::post('/member/store','AuthController@store')->name('home.register');
Route::post('/member/login','AuthController@login')->name('login');
Route::get('/member/logout','BerandaController@logout')->name('logout');
Route::get('cart/{id}','CartController@index');
Auth::routes();

Route::group(['prefix'=>'admin','middleware' => ['auth','checkStatus:admin'] ],function()
{
	
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('author/search','AuthorController@search');
	Route::resource('author','AuthorController');
	Route::get('publisher/search','PublisherController@search');
	Route::resource('publisher','PublisherController');
	Route::resource('category','CategoryController');
	Route::get('user','UserController@index');
	Route::get('user/add','UserController@adduser');
	Route::post('user/add/store','UserController@store');
	Route::post('user','UserController@store');
	Route::get('user/edit/{id}','UserController@edit');
	Route::post('user/edit/update','UserController@update');
	Route::get('user/delete/{id}','UserController@delete');
	Route::get('shelf','ShelfController@index');
	Route::post('shelf','ShelfController@store');
	Route::delete('shelf/{id}','ShelfController@destroy');
	Route::get('shelf/{id}/edit','ShelfController@edit');
	Route::put('shelf/{id}','ShelfController@update');
	Route::get('book','BookController@index');
	Route::delete('book/{id}','bookController@destroy');
	Route::post('book','BookController@store');
	Route::get('book/{id}/edit','BookController@edit');
	Route::put('book/{id}','BookController@update');
	Route::get('book/search','BookController@search');
	Route::get('user/status/{id}','UserController@changestatus');
	Route::get('loaning','LoaningController@index');
	Route::get('loaning/delete/{id}','LoaningController@destroy');
	Route::post('loaning','LoaningController@store');
	Route::get('loaning/{id}/edit','LoaningController@edit');
	Route::put('loaning/{id}','LoaningController@update');
	Route::get('loaning/status/{id}','LoaningController@changestatus');
	Route::get('loaning/search','LoaningController@search');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
