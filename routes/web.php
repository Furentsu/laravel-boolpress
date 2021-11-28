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

Route::get('/', 'frontoffice\HomeController@index')->name('frontoffice.home');

Route::get('/contacts', 'frontoffice\HomeController@showContactForm')->name('frontoffice.contacts'); // Email Create
Route::post('/contacts', 'frontoffice\HomeController@ContactFormHandler')->name('frontoffice.contacts.send'); // Email Store
Route::get('/thanks', 'frontoffice\HomeController@ContactFormThanks')->name('frontoffice.thanks'); // Redirect



Auth::routes();

Route::resource('posts', PostController::class)->only([
    'index',
    'show'
]);

Route::middleware('auth')
    ->namespace('Backoffice')
    ->name('backoffice.')
    ->prefix('backoffice')
    ->group(function() {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('posts', PostController::class);
    });


