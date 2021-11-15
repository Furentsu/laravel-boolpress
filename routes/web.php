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

Route::get('/', 'frontoffice\HomeController@index')->name('Frontoffice.home');

Auth::routes();

Route::middleware('auth')
    ->namespace('Backoffice')
    ->name('backoffice.')
    ->prefix('backoffice')
    ->group(function() {
        Route::get('/', 'HomeController@index');
        Route::resource('posts', PostController::class);
    });


