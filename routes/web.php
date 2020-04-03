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

Route::get('/login',function(){
	return view('login',['a'=>'0']);
});

Route::post('/login/user', 'AdminController@login');

Route::get('/admin/manage/cari','AdminController@cari');
Route::get('/admin/manage','AdminController@index');
Route::post('/admin/manage/add','AdminController@add');
Route::put('/admin/manage/edit','AdminController@edit');
Route::get('/admin/manage/delete/{id}','AdminController@delete');

Route::get('/post/manage','PostController@index');
Route::post('/post/manage/add','PostController@add');
Route::put('/post/manage/edit','PostController@edit');
Route::get('/post/manage/delete/{id}','PostController@delete');


Route::get('/home','PostController@home');