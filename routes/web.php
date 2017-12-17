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

Route::get('/', 'EmployerDepartmentsController@index');

Auth::routes();

Route::group(['prefix' => 'employers'], function () {
});

Route::group(['prefix' => 'departments'], function () {
    Route::get('/', ['as' => 'departments.index', 'uses' => 'DepartmentsController@index']);
    Route::post('/add', ['as' => 'departments.add', 'uses' => 'DepartmentsController@add']);
    Route::post('/edit', ['as' => 'departments.edit', 'uses' => 'DepartmentsController@edit']);
    Route::post('/delete', ['as' => 'departments.delete', 'uses' => 'DepartmentsController@delete']);
});

Route::group(['prefix' => 'employers-departments'], function () {
    Route::get('/', ['as' => 'employers-departments.index', 'uses' => 'EmployerDepartmentsController@index']);
});



