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

Route::get('/', 'DashboardController@index');

Route::get('/', 'DashboardController@index');

Route::get('/dashboard', 'DashboardController@index');

// Routes for the Test Template Module

Route::get('/templates', 'TemplateController@index');

Route::get('/templates/show/{id}', 'TemplateController@show');

Route::get('/templates/create', 'TemplateController@create');

Route::post('/templates/store', 'TemplateController@store');

Route::get('/templates/edit/{id}', 'TemplateController@edit');

Route::post('/templates/update', 'TemplateController@update');

Route::get('/templates/delete', 'TemplateController@destroy');

// Routes for the Test Components Module

Route::get('/templates/components', 'TemplateComponentController@index');

Route::get('/templates/components/show/{id}', 'TemplateComponentController@show');

Route::get('/templates/components/create', 'TemplateComponentController@create');

Route::get('/templates/components/store', 'TemplateComponentController@store');

Route::get('/templates/components/edit/{id}', 'TemplateComponentController@edit');

Route::post('/templates/components/update/{id}', 'TemplateComponentController@update');

Route::get('/templates/components/delete', 'TemplateComponentController@destroy');

// Routes for the Test Projects Module

Route::get('/projects', 'ProjectController@index');

// Routes for the Test Users Module

Route::get('/users', 'UserController@index');

Route::get('/users/show/{id}', 'UserController@show');

Route::get('/users/create', 'UserController@create');

Route::get('/users/store', 'UserController@store');

Route::get('/users/edit/{id}', 'UserController@edit');

Route::get('/users/update', 'UserController@update');

Route::get('/users/delete', 'UserController@destroy');

// Routes for the Test Reports Module

Route::get('/reports', 'ReportController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
