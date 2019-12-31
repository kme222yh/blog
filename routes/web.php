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

Route::get('/', 'MainController@home');

Route::get('contact', 'MainController@contact');
Route::post('contact', 'MailController@contact');

Route::get('deploy', function() {return redirect('/');});
Route::post('deploy', 'DeployController');
