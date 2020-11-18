<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'blog',
    'as' => 'blog.'
],function ($router)
{
    $router->get('/', ['as' => 'index', 'uses' => 'BlogController@index']);
    $router->get('/create', ['as' => 'create', 'uses' => 'BlogController@create']);
    $router->post('/', ['as' => 'store', 'uses' => 'BlogController@store']);
    $router->get('/{id}', ['as' => 'show', 'uses' => 'BlogController@ehow']);
    $router->get('/{id}/edit', ['as' => 'edit', 'uses' => 'BlogController@edit']);
    $router->put('/{id}', ['as' => 'update', 'uses' => 'BlogController@update']);
    $router->delete('/{id}', ['as' => 'delete', 'uses' => 'BlogController@delete']);
});

