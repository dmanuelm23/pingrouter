<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PingRouterController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/ping/{ip}', [PingRouterController::class, 'pingRouter'])->name('pingRouter');
Route::get('/get-ping-routers', [PingRouterController::class, 'pingRouters'])->name('pingRouters');
Route::get('/ip/{ip}', [PingRouterController::class, 'findIpPing'])->name('findIpPing');
