<?php

use App\Http\Controllers\Kendaraan;
use App\Http\Controllers\KendaraanController;
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
// user
Route::get('/user',[KendaraanController::class,'index']);
Route::post('/user/store',[KendaraanController::class,'store']);
// input data pemesanan
Route::get('/pemesanan',[KendaraanController::class,'pemesanan']);
Route::post('/pemesanan/store',[KendaraanController::class,'storePemesanan']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
