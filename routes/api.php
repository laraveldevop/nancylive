<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//$router->get('/', function (){
//    return response()->json('Welcome To laravel API');
//});




Route::group(['middleware' => ['json.response']], function () {

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    // public routes
    Route::post('/login', 'API\AuthController@login');
    Route::post('/user-register', 'API\AuthController@userRegister');
    Route::post('/logout', 'API\AuthController@logout');
    Route::post('/forgot-password', 'API\AuthController@forgot_password');
    Route::post('/verify-otp', 'API\AuthController@verify_otp');
    Route::post('/password/email', 'Api\ForgotPasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'Api\ResetPasswordController@reset');


    Route::post('add-category', 'API\CategoryViewController@addCategory')->middleware('checkUser');
    Route::post('add-artist', 'API\ArtistController@store')->middleware('checkUser');
    Route::post('add-brand', 'API\BrandViewController@store')->middleware('checkUser');
    Route::post('add-product', 'API\ProductController@store')->middleware('checkUser');
    Route::post('add-video', 'API\VideoController@store')->middleware('checkUser');
    Route::post('video-updates', 'API\AllVideosController@store')->middleware('checkUser');

    //approve or Reject
    Route::post('approve-artist', 'API\ArtistController@artistApprove')->middleware('checkUser');
    Route::post('approve-brand', 'API\BrandViewController@brandApprove')->middleware('checkUser');
    Route::post('approve-product', 'API\ProductController@productApprove')->middleware('checkUser');
    Route::post('approve-video', 'API\VideoController@videoApprove')->middleware('checkUser');


    Route::get('count', 'API\HomeController@count')->middleware('checkUser');



    //delete

    Route::post('delete-product', 'API\ProductController@destroy')->middleware('checkUser');
    Route::post('delete-brand', 'API\BrandViewController@destroy')->middleware('checkUser');
    Route::post('delete-artist', 'API\ArtistController@destroy')->middleware('checkUser');
    Route::post('delete-video', 'API\VideoController@destroy')->middleware('checkUser');



    Route::post('category-detail', 'API\CategoryViewController@categoryDetail')->middleware('checkUser');
    Route::post('brand-detail', 'API\BrandViewController@brandDetail')->middleware('checkUser');
    Route::post('brand-view', 'API\BrandViewController@brandView')->middleware('checkUser');
    Route::post('sponsor-detail', 'API\SponsorViewController@sponsorDetail')->middleware('checkUser');
    Route::post('artist-detail', 'API\HomeController@artist')->middleware('checkUser');
    Route::post('product', 'API\ProductController@index')->middleware('checkUser');
    Route::post('user-package-history', 'API\HistoryController@userPackageHistory')->middleware('checkUser');
    Route::post('video', 'API\VideoController@index')->middleware('checkUser');
    Route::post('user-update', 'API\HomeController@userUpdate')->middleware('checkUser');
    Route::post('order-post', 'API\OrderController@orderPost')->middleware('checkUser');
    Route::post('user-package', 'API\UserPackageController@userPackage')->middleware('checkUser');
    Route::post('package-update', 'API\UserPackageController@userPackageUpdate')->middleware('checkUser');
    Route::post('change-password', 'API\HomeController@changePassword')->middleware('checkUser');
    Route::post('check_user', 'API\AuthController@check_user');

    Route::get('home', 'API\HomeController@advertise')->middleware('checkUser');
    Route::get('order-detail', 'API\HomeController@order')->middleware('checkUser');
    Route::post('artist', 'API\HomeController@artist')->middleware('checkUser');
    Route::get('document', 'API\PdfController@index')->middleware('checkUser');
    Route::get('history', 'API\HistoryController@index')->middleware('checkUser');
    Route::get('package', 'API\PackageController@index')->middleware('checkUser');
    Route::get('user', 'API\UserController@index')->middleware('checkUser');
    Route::post('user-list', 'API\UserController@userList')->middleware('checkUser');
    Route::post('role', 'API\RoleController@roleUpdate')->middleware('checkUser');

    // private routes
    Route::middleware('auth:api')->group(function () {

    });

});
