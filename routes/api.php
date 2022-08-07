<?php

use App\Http\Controllers\Api\AdsApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\TagsApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'advertise'], function () {



    Route::group(['prefix' => 'tag'], function () {
        //you can user route resource
        Route::post('/', [TagsApiController::class, 'createTag']);
        Route::get('/{id}', [TagsApiController::class, 'getTag']);
        Route::delete('/{id}', [TagsApiController::class, 'DeleteTag']);
        Route::put('/{id}', [TagsApiController::class, 'updateTag']);
    });
    Route::group(['prefix' => 'category'], function () {
        //you can user route resource
        Route::post('/', [CategoryApiController::class, 'createCategory']);
        Route::get('/{id}', [CategoryApiController::class, 'getCategory']);
        Route::delete('/{id}', [CategoryApiController::class, 'DeleteCategory']);
        Route::put('/{id}', [CategoryApiController::class, 'updateCategory']);
    });
    Route::get('ads/', [AdsApiController::class, 'getAllAds']);
});
