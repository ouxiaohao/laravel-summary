<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'Home\IndexController@index');



Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('student/index','Home\StudentController@index');
Route::match(['get','post'],'student/add','Home\StudentController@add');
Route::match(['get','post'],'student/edit/{id}','Home\StudentController@edit');
Route::get('student/del/{id}','Home\StudentController@del');
