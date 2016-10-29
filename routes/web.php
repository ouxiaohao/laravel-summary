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

Route::get('/', 'Study\IndexController@index');



Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('student/index','Study\StudentController@index');
Route::match(['get','post'],'student/add','Study\StudentController@add');
Route::match(['get','post'],'student/edit/{id}','Study\StudentController@edit');
Route::get('student/del/{id}','Study\StudentController@del');
