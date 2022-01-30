<?php

use App\Http\Controllers\CatController;
use App\Http\Controllers\AuthController;
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


// Route::resource('cats', CatController::class);


// Public
Route::get('/cats', [CatController::class, 'index']);
Route::get('/cats/{id}', [CatController::class, 'show']);
Route::get('/cats/search/{name}', [CatController::class, 'search']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


// Protected
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/cats', [CatController::class, 'store']);
    Route::put('/cats/{id}', [CatController::class, 'update']);
    Route::delete('/cats/{id}', [CatController::class, 'destroy']);


    Route::post('/logout', [AuthController::class, 'logout']);
});





