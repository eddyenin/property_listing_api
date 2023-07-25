<?php

use App\Http\Controllers\BrokerController;
use App\Http\Controllers\PropertyController;
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
Route::get('/brokers',[BrokerController::class,'index']);
Route::get('/brokers/{broker}',[BrokerController::class,'show']);

Route::apiResource('/property',PropertyController::class);

Route::apiResource('/brokers',BrokerController::class);
Route::group(['middleware'=>['auth:sanctum']], function(){
   // Route::apiResource('/brokers',BrokerController::class);
});


