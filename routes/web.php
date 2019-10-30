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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::prefix('dashboard')->group(function() {
  Route::get('home', 'DashboardController@home')->name('dashboard.home');
  Route::get('matches', 'DashboardController@matches')->name('dashboard.matches');
  Route::get('resume', 'DashboardController@resume')->name('dashboard.resume');
});
