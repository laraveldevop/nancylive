<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('category', 'CategoryController');
Route::resource('artist', 'ArtistController');
Route::resource('video', 'VideoController');
Route::resource('module', 'ModuleController');
Route::resource('pdf', 'PdfController');
Route::resource('product', 'ProductController');
Route::post('/ads','VideoController@ads');
Route::post('/pdf_ads','PdfController@ads');
Route::post('/video_upload','VideoController@video');
