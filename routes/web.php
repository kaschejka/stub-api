<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\getLogController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/getLog', function () {
    return view('api-log');
});


Route::get('/logConnector', function () {
    return view('logNotif');
});

Route::get('/mtslog', function () {
    return view('mtslog');
});



Route::post('/result', [getLogController::class,'getLog']);


Route::post('/result_del', [getLogController::class,'delLog']);


Route::post('/notifGet', [getLogController::class,'getLogConnector']);

Route::post('/notifDel', [getLogController::class,'delLogConnector']);

Route::post('/mtsGet', [getLogController::class,'mtsget']);

Route::post('/mtsDel', [getLogController::class,'mtsdel']);
