<?php

use App\Http\Controllers\ApiController;
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

Route::post('/v1/login/email', [ApiController::class, 'loginByEmail'])->name('login.mail');
Route::post('/v1/login/otp', [ApiController::class, 'loginByOtp'])->name('login.otp');
Route::post('/v1/verify_otp', [ApiController::class, 'verifyOtp'])->name('otp.verify');
Route::post('/v1/logout', [ApiController::class, 'logout']);

/*
    |--------------------------------------------------------------------------
    |                               API ACCESS ROUTES 
    |--------------------------------------------------------------------------
    |
    */

Route::group(array('prefix' => 'v1', 'middleware' => ['api_access']), function () {
});
