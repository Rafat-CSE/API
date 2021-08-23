<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthenticationController;

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

// Route::resource('employees', EmployeeController::class);


//-------- All Public Routes
Route::post('/login', [AuthenticationController::class, "login"]);
Route::post('/registration', [AuthenticationController::class, "register"]);


// Route::get('/employees', [EmployeeController::class, "index"]);
// Route::get('/employees/{id}', [EmployeeController::class, "show"]);
// Route::post('/employees', [EmployeeController::class, "store"]);
// Route::put('/employees/{id}', [EmployeeController::class, "update"]);
// Route::delete('/employees/{id}', [EmployeeController::class, "destroy"]);
// Route::post('/logout', [AuthenticationController::class, "logout"]);

//----------- All Private Route
Route::group(["middleware" => 'auth:sanctum'], function () { 
    Route::get('/employees', [EmployeeController::class, "index"]);
    Route::get('/employees/{id}', [EmployeeController::class, "show"]);

    Route::post('/employees', [EmployeeController::class, "store"]);
    Route::put('/employees/{id}', [EmployeeController::class, "update"]);
    Route::delete('/employees/{id}', [EmployeeController::class, "destroy"]);
    Route::get('/logout', [AuthenticationController::class, "logout"]);
});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
