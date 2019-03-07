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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {

    Route::prefix('enigma')->group(function () {

        Route::post('/', 'EnigmaController@unlock')->name('enigma.unlock');

        Route::get('{id}', 'EnigmaController@show')->name('enigma.show');

        Route::get('{id}/{step}', 'EnigmaController@step')->name('enigma.step');
        Route::post('{id}/{step}', 'EnigmaController@completeStep')->name('enigma.step.confirm');

    });
});

Auth::routes();
