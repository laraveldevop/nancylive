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

//Auth::routes();

Auth::routes([ 'register' => false ]);
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('category', 'CategoryController');
Route::resource('artist', 'ArtistController');
Route::resource('sponsor', 'SponsorController');
Route::resource('video', 'VideoController');
//Route::resource('module', 'ModuleController');
Route::resource('pdf', 'PdfController');
Route::resource('product', 'ProductController');
Route::resource('brand', 'BrandController');
Route::resource('notification', 'NotificationController');
Route::resource('package', 'PackageController');
Route::resource('all-package', 'AllPackageController');
Route::resource('cat-package', 'PackageCategoryController');
Route::resource('order', 'OrderController');
Route::resource('user-package', 'UserPackageController');
Route::resource('users', 'UserController');
Route::resource('dashboard', 'DashboardController');
Route::resource('user-role', 'UsersController');
Route::resource('sub-role', 'SubRoleController');
Route::resource('download', 'DownloadController');
Route::resource('referral-product', 'ReferralProductController');
Route::resource('referral-magazine', 'ReferralMagazineController');
Route::resource('setting', 'SettingController');




Route::post('image_crop/uploadCategory', 'ImageController@uploadCategory')->name('image_crop.uploadCategory');
Route::post('image_crop/uploadArtist', 'ImageController@uploadArtist')->name('image_crop.uploadArtist');
Route::post('image_crop/uploadVideo', 'ImageController@uploadVideo')->name('image_crop.uploadVideo');
Route::post('image_crop/uploadBrand', 'ImageController@uploadBrand')->name('image_crop.uploadBrand');
Route::post('image_crop/uploadSponsor', 'ImageController@uploadSponsor')->name('image_crop.uploadSponsor');
Route::post('image_crop/uploadPackage', 'ImageController@uploadPackage')->name('image_crop.uploadPackage');
Route::post('image_crop/deleteImage', 'ImageController@deleteImage')->name('image_crop.deleteImage');
Route::post('image_crop/deleteProductImage', 'ImageController@deleteProductImage')->name('image_crop.deleteProductImage');
Route::post('image_crop/deleteSponsorImage', 'ImageController@deleteSponsorImage')->name('image_crop.deleteSponsorImage');
Route::post('package_user/packageList', 'UserPackageController@packageList')->name('package_user.list');


Route::post('add_status/Update_status', 'OrderController@updateStatus')->name('add_status.Update_status');
Route::post('add_role/Update_role', 'UsersController@updateRole')->name('add_role.Update_role');
Route::post('add_sub_role/Update_role', 'SubRoleController@updateRole')->name('add_sub_role.Update_role');
Route::post('view_data/view_referral_code', 'DownloadController@viewReferral')->name('view_data.view_referral_code');
Route::post('view_data/view_referral_history_code', 'DownloadController@viewReferralHistory')->name('view_data.view_referral_history_code');
Route::post('referral_code/Update_status', 'DownloadController@UpdateReferralStatus')->name('referral_code.Update_status');


Route::post('approve_brand/Update_to_approve', 'BrandController@UpdateToApprove')->name('approve_brand.Update_to_approve');




Route::post('/ads','VideoController@ads');
Route::post('/pdf_ads','PdfController@ads');
Route::post('/product_ads','ProductController@ads');
Route::post('/videoDownload','VideoController@videoDownload');
Route::POST('send-notification', 'NotificationController@sendOfferNotification');

// delete
Route::POST('check-password', 'CategoryController@CheckPassword');
