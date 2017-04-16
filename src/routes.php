<?php

Route::group([
  'namespace' => 'Goszowski\Runsite\Http\Controllers',
  'prefix'=>'runsite/admin',
  'middleware' => ['web'],
  'as' => 'runsite.',
], function() {

  Route::group(['namespace' => 'Auth', 'prefix'=>'auth'], function() {
    Route::get('login', ['as' => 'runsite.auth.login', 'uses' => 'LoginController@showLoginForm']);
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout');
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'ResetPasswordController@reset');
  });


  // Route::group(['middleware' => 'runsite.auth'], function() {
    // Main
    Route::get('/', ['as' => 'runsite', 'uses' => 'MainController@index']);

    Route::resource('models', 'ModelsController');
    Route::resource('fields', 'FieldsController');
    Route::resource('languages', 'LanguagesController');
    Route::resource('usergroups', 'UserGroupController');
    Route::resource('users', 'UsersController');
    // Route::group(['prefix' => 'models'], function() {
    //   Route::get('/',           ['as' => 'runsite.models.index',    'uses' => 'ModelsController@index']);
    //   Route::get('/create',     ['as' => 'runsite.models.create',   'uses' => 'ModelsController@create']);
    //   Route::get('/edit/{id}',  ['as' => 'runsite.models.edit',     'uses' => 'ModelsController@edit']);
    //   Route::post('/',          ['as' => 'runsite.models.store',    'uses' => 'ModelsController@store']);
    //   Route::patch('/{id}',     ['as' => 'runsite.models.update',   'uses' => 'ModelsController@update']);
    //   Route::delete('/{id}',    ['as' => 'runsite.models.update',   'uses' => 'ModelsController@update']);
    // });


  });






// });
