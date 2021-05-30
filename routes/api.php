<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;

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

Route::post('/signin', [AuthController::class, 'signin']);
Route::post('/register', [AuthController::class, 'register']);

// Route::get('/getAllMahasiswa', [DataController::class, 'getAllMahasiswa']);
Route::get('/getAllMahasiswaByProdi', [DataController::class, 'getAllMahasiswaByProdi']);
Route::get('/getAllProdi', [DataController::class, 'getAllProdi']);