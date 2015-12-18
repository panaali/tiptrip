<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::before(function ($request) {

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT,  DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
    header('Access-Control-Allow-Credentials: true');
});

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

// Task Routes
Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');

// Authentication Routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration Routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['prefix' => 'api/v1'], function ($app) {
    $app->get('place/html', 'TipController@indexHtml');
    $app->get('place/{id}', 'PlaceController@getPlace');
    $app->get('tip/{id}', 'TipController@getTip');
    $app->get('going', 'GoingController@index');
    $app->get('going/{id}', 'GoingController@getgoing');
    $app->get('signout', 'Auth\AuthController@getLogout');
    $app->get('tip', 'TipController@index');
});

Route::group(['prefix' => 'api/v1'], function ($app) { //, 'middleware'=>'simpleauth'
    $app->get('login', 'GoingController@getLoginRest');
    $app->get('place/going/{pid}', 'GoingController@getGoingfromids');

    $app->post('place', 'PlaceController@createBook');
    $app->put('place/{id}', 'PlaceController@updateBook');
    $app->delete('place/{id}', 'PlaceController@deleteBook');

    $app->post('tip', 'TipController@createBook');
    $app->put('tip/{id}', 'TipController@updateBook');
    $app->delete('tip/{id}', 'TipController@deleteBook');

    $app->post('going', 'GoingController@createBook');
    $app->put('going/{id}', 'GoingController@updateBook');
    $app->delete('going/{id}', 'GoingController@deleteBook');

});
