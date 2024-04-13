<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\ConsumerController;
use App\Http\Controllers\Api\CustumerController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('email',           [MessageController::class, 'store'])->name('api.email.store');
Route::post('consumers',       [ConsumerController::class, 'store'])->name('api.consumers.store');
Route::post('custumers',       [CustumerController::class, 'store'])->name('api.custumers.store');
