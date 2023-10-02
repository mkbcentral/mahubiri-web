<?php

use App\Http\Controllers\Api\Church\CrudChurchController;
use App\Http\Controllers\Api\Church\CrudPreachingController;
use App\Http\Controllers\Api\Church\OtherPreachingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('church', CrudChurchController::class);
Route::resource('preaching', CrudPreachingController::class);
Route::prefix('other')->group(function () {
    Route::controller(OtherPreachingController::class)->group(function () {
        /**
         * Get list preaching by church_id
         * params(request('church_id'))
         */
        Route::get('preaching-by-church', 'getListPreachingByChurchId');
        /**
         * Get Favorite list preachings
         */
        Route::get('favorites', 'gettFavoritePreachingByUserId');
        /**
         * Add preching to favorite list
         */
        Route::post('add-to-favorite', 'addPreachingToFavorite');
        /**
         * Get list preaching by church_id
         * params(request('preaching_id'))
         */
        Route::delete('delete-preaching-to-favorite', 'deletePreachingToFavorite');
    });
});
