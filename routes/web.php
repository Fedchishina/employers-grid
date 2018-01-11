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
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localizationRedirect']], function()
{
    Route::get('/', ['as' => 'employers-departments.index', 'uses' => 'EmployerDepartmentsController@index']);

    Auth::routes();

    Route::group(['prefix' => 'employers'], function () {
        Route::get('/', ['as' => 'employers.index', 'uses' => 'EmployersController@index']);
        Route::get('/add', ['as' => 'employers.add-form', 'uses' => 'EmployersController@getAddForm']);
        Route::post('/add', ['as' => 'employers.add', 'uses' => 'EmployersController@add']);
        Route::get('/edit/{id}', ['as' => 'employers.edit-form', 'uses' => 'EmployersController@getEditForm']);
        Route::post('/edit/{id}', ['as' => 'employers.edit', 'uses' => 'EmployersController@edit']);
        Route::post('/delete/{id}', ['as' => 'employers.delete', 'uses' => 'EmployersController@delete']);
    });

    Route::group(['prefix' => 'departments'], function () {
        Route::get('/', ['as' => 'departments.index', 'uses' => 'DepartmentsController@index']);
        Route::post('/add', ['as' => 'departments.add', 'uses' => 'DepartmentsController@add']);
        Route::post('/edit', ['as' => 'departments.edit', 'uses' => 'DepartmentsController@edit']);
        Route::post('/delete/{id}', ['as' => 'departments.delete', 'uses' => 'DepartmentsController@delete']);
    });
});




