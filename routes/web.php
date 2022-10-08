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
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/add', "TodoController@index");
Route::post('/add',"TodoController@store");

Route::post('/todo/delete/{id}','TodoController@destroy');
Route::post('/todo/edit/{id}','TodoController@editView');

Route::post('/update/{id}',"TodoController@update");