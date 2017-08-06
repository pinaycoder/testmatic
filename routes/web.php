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

Route::get('/dashboard', 'DashboardController@index');

// Routes for the Test Template Module

Route::get('/templates', 'TemplateController@index');

Route::get('/templates/show/{id}', 'TemplateController@show');

Route::get('/templates/create', 'TemplateController@create');

Route::post('/templates/store', 'TemplateController@store');

Route::get('/templates/edit/{id}', 'TemplateController@edit');

Route::post('/templates/update/{id}', 'TemplateController@update');

Route::get('/templates/delete', 'TemplateController@destroy');

Route::get('/templates/details/{id}', 'TemplateController@getDetails');

Route::get('/templates/deactivate/{id}', 'TemplateController@deactivate');

Route::get('/templates/activate/{id}', 'TemplateController@activate');

// Routes for the Test Components Module

Route::get('/templates/components', 'TemplateComponentController@index');

Route::get('/templates/components/show/{id}', 'TemplateComponentController@show');

Route::post('/templates/components/create/{id}', 'TemplateController@addComponent');

Route::post('/templates/components/store', 'TemplateComponentController@store');

Route::get('/templates/components/edit/{id}', 'TemplateComponentController@edit');

Route::post('/templates/components/update/{id}', 'TemplateComponentController@update');

Route::get('/templates/components/delete/{id}', 'TemplateComponentController@destroy');

Route::get('/templates/components/get/{id}', 'TemplateComponentController@getTemplateComponents');

// Routes for the Test Projects Module

Route::get('/projects', 'ProjectController@index');

Route::get('/projects/show/{id}', 'ProjectController@show');

Route::get('/projects/create', 'ProjectController@create');

Route::post('/projects/store', 'ProjectController@store');

Route::get('/projects/edit/{id}', 'ProjectController@edit');

Route::post('/projects/update/{id}', 'ProjectController@update');

Route::get('/projects/delete', 'ProjectController@destroy');

Route::post('/projects/user/add/{id}', 'ProjectController@addUser');

Route::get('/projects/test/{id}/{cid}', 'ProjectController@test');

Route::get('/projects/user/delete/{project_id}/{user_id}', 'ProjectController@removeUser');

Route::get('/projects/deactivate/{id}', 'ProjectController@deactivate');

Route::get('/projects/activate/{id}', 'ProjectController@activate');

Route::post('/projects/markComplete/{project_id}/{component_id}/{user_id}', 'ProjectController@markComplete');

Route::post('/projects/components/create/{id}', 'ProjectController@addComponent');

Route::get('/projects/components/edit/{id}', 'ProjectComponentController@edit');

Route::get('/projects/components/show/{id}', 'ProjectComponentController@show');

Route::post('/projects/components/update/{id}', 'ProjectComponentController@update');

Route::get('/projects/components/delete/{id}', 'ProjectComponentController@destroy');

// Routes for the Test Users Module

Route::get('/users', 'UserController@index');

Route::get('/users/confirm/{confirmation_token}', 'UserController@confirm');

Route::post('/users/setpassword/{id}', 'UserController@setPassword');

Route::get('/users/show/{id}', 'UserController@show');

Route::get('/myprofile/{id}', 'UserController@show');

Route::get('/users/create', 'UserController@create');

Route::post('/users/store', 'UserController@store');

Route::get('/users/edit/{id}', 'UserController@edit');

Route::post('/users/update/{id}', 'UserController@update');

Route::get('/users/checkEmail', 'UserController@checkIfEmailExist');

Route::get('/users/delete', 'UserController@destroy');

Route::get('/users/deactivate/{id}', 'UserController@deactivate');

Route::get('/users/activate/{id}', 'UserController@activate');


// Routes for the Test Reports Module

Route::get('/reports', 'ReportController@index');

Auth::routes();

Route::get('/home', 'DashboardController@index');
Route::get('/logout', array('uses' => 'DashboardController@logout'));
