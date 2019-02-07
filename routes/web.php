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

Route::post('/logout', 'AdminController@logout')->name('Common.logout');
Route::get('/logout', 'AdminController@logout')->name('Common.logout');
Route::get('/students/create', 'AdminController@create')->name('Students.Create');
Route::post('/students/add', 'AdminController@store')->name('Students.Add');

Route::get('/search/ajax','AdminController@searchOrders')->name('Students.Search');

Route::post('home/edit/singleOrder', 'AdminController@editOrder')->name('Orders.Edit');

Route::post('home/orders-quick', 'AdminController@quickOrder')->name('Orders.addOrder');

Route::post('home/delete-order','AdminController@deleteOrder')->name('Orders.Delete');
