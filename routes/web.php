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

Route::get('/', 'PageController@default');

Route::get('/page', 'PageController@check0')->name('home');
Route::get('/page/{page}', 'PageController@check');

Route::get('/interface', function() {
    return view('interface');
});

Route::get('/blog/{url}', "BlogController@check");
Route::post('/blog/{url}', "BlogController@loved");
Route::post('/blog/{url}/comment', "BlogController@comment");

Route::get('/mails/newsletter', function(){
    return view('mails.check');
});
Route::post('/mails/newsletter','MailController@newsletter');
