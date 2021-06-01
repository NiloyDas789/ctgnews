<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});



Route::get( '/search', 'App\Http\Controllers\FormController@search')->name( 'search' );

Route::group(['prefix' => 'main', 'middleware' => ['auth']], function () {

    Route::get('/master', function () {
        return view('master.master_admin');
    });

        Route::resource('form', 'App\Http\Controllers\FormController');
        Route::resource('assignment', 'App\Http\Controllers\AssignmentController');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
