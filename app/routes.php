<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/'                , 'HomeController@index');
Route::get('/whatisnew'       , 'HomeController@whatisnew');
Route::get('/lessons'         , 'HomeController@lessons');
Route::get('/series'          , 'HomeController@series');
Route::get('/browse'          , ['as' => 'browse'      , 'uses' => 'HomeController@browse']);
Route::get('/series/{series}' , ['as' => 'series.show' , 'uses' => 'HomeController@seriesDetail']);
Route::get('/cast/{cast}'     , ['as' => 'cast.show'   , 'uses' => 'HomeController@show']);


// Confide routes
// Route::get('users/create'              , 'UsersController@create');
// Route::post('users'                    , 'UsersController@store');
Route::get('register'                     , 'UsersController@create');
Route::post('register'                    , 'UsersController@store');
Route::get('users/login'                  , 'UsersController@login');
Route::post('users/login'                 , 'UsersController@doLogin');
Route::get('users/confirm/{code}'         , 'UsersController@confirm');
Route::get('users/forgot_password'        , 'UsersController@forgotPassword');
Route::post('users/forgot_password'       , 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}' , 'UsersController@resetPassword');
Route::post('users/reset_password'        , 'UsersController@doResetPassword');
Route::get('users/logout'                 , 'UsersController@logout');


// Admin page
// Route::group(['prefix' => 'admin', 'before' => 'admin'], function()
Route::group(['prefix' => 'admin'], function()
{
    Route::get('/', 'XcastsController@home');

    // Users
    Route::resource('users', 'UsersController', ['except' => ['show', 'create', 'store']]);

    // Series
    Route::resource('series', 'SeriesController', ['except' => ['show']]);

    // Xcasts
    Route::resource('xcasts'                     , 'XcastsController');
    Route::get('xcasts/{xcasts}/upload_image'    , ['as' => 'admin.xcasts.upload_image'   , 'uses' => 'XcastsController@uploadImage']);
    Route::post('xcasts/{xcasts}/transmit_image' , ['as' => 'admin.xcasts.transmit_image' , 'uses' => 'XcastsController@transmitImage']);
    Route::get('xcasts/{xcasts}/upload_video'    , ['as' => 'admin.xcasts.upload_video'   , 'uses' => 'XcastsController@uploadVideo']);
    Route::post('xcasts/{xcasts}/transmit_video' , ['as' => 'admin.xcasts.transmit_video' , 'uses' => 'XcastsController@transmitVideo']);

});
