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
Route::resource('sponsor', 'SponsorController');
Route::resource('video', 'VideoController');
Route::resource('module', 'ModuleController');
Route::resource('pdf', 'PdfController');
Route::resource('product', 'ProductController');
Route::resource('brand', 'BrandController');
Route::resource('notification', 'NotificationController');
Route::resource('package', 'PackageController');
Route::resource('all-package', 'AllPackageController');
Route::get('create-cat', 'PackageController@createCat');
Route::get('cat-package', 'PackageController@catIndex');
Route::get('cat-edit/{id}', 'PackageController@show');
Route::post('/ads','VideoController@ads');
Route::post('/pdf_ads','PdfController@ads');
Route::post('/product_ads','ProductController@ads');
Route::post('/video_upload','VideoController@video');
Route::POST('send-notification', 'NotificationController@sendOfferNotification');
