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


    Route::get('home', 'API\HomeController@advertise')->middleware('checkUser');
    Route::post('category-detail', 'API\CategoryViewController@categoryDetail')->middleware('checkUser');
    Route::post('brand-detail', 'API\BrandViewController@brandDetail')->middleware('checkUser');
    Route::post('sponsor-detail', 'API\SponsorViewController@sponsorDetail')->middleware('checkUser');
    Route::post('artist-detail', 'API\HomeController@artist')->middleware('checkUser');
    Route::get('order-detail', 'API\HomeController@order')->middleware('checkUser');
    Route::get('artist', 'API\HomeController@index')->middleware('checkUser');
    Route::post('product', 'API\ProductController@index')->middleware('checkUser');
    Route::get('document', 'API\PdfController@index')->middleware('checkUser');
    Route::get('history', 'API\HistoryController@index')->middleware('checkUser');
    Route::post('user-package-history', 'API\HistoryController@userPackageHistory')->middleware('checkUser');
    Route::post('video', 'API\VideoController@index')->middleware('checkUser');
    Route::post('user-update', 'API\HomeController@userUpdate')->middleware('checkUser');
    Route::post('order-post', 'API\OrderController@orderPost')->middleware('checkUser');
    Route::post('user-package', 'API\UserPackageController@userPackage')->middleware('checkUser');
    Route::post('package-update', 'API\UserPackageController@userPackageUpdate')->middleware('checkUser');
    Route::post('change-password', 'API\HomeController@changePassword')->middleware('checkUser');
    Route::get('package', 'API\PackageController@index')->middleware('checkUser');
    Route::post('check_user', 'API\AuthController@check_user');

    // private routes
    Route::middleware('auth:api')->group(function () {

    });

});
