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
    Route::post('/login', 'Api\AuthController@login')->name('login.api');
    Route::post('/register', 'Api\AuthController@register')->name('register.api');
    Route::post('/logout', 'Api\AuthController@logout');
    Route::get('home', 'API\HomeController@advertise')->middleware('checkUser');
    Route::get('artist', 'API\HomeController@artist')->middleware('checkUser');
    Route::get('product', 'API\ProductController@index')->middleware('checkUser');
    Route::post('check_user', 'API\AuthController@check_user');

    // private routes
    Route::middleware('auth:api')->group(function () {

    });

});