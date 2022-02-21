<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarsController;

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

Route::post('cars', [CarsController::class, 'addCar']);
Route::put('cars/{id}', [CarsController::class, 'updateCar']);
Route::delete('cars/{id}', [CarsController::class, 'destroyCar']);
Route::get('cars', [CarsController::class, 'listCars']);
Route::get('cars/firstBigUppercase', [CarsController::class, 'firstBigUppercase']);
Route::get('cars/firstBigLowercase', [CarsController::class, 'firstBigLowercase']);
Route::delete('cars/', [CarsController::class, 'destroyFirstBig']);
