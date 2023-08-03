<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorPatientController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use App\Models\Doctor;
use App\Models\DoctorPatient;
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

Route::get('/cities', [CityController::class, 'index']);

Route::get('/doctors', [DoctorController::class, 'index']);

Route::get('/cities/{id_city}/doctors', [DoctorController::class, 'listDoctorsCity']);

Route::post('/user', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/doctors', [DoctorController::class, 'store']);

    Route::post('/doctors/{id_doctor}/patients', [DoctorPatientController::class, 'bindPatient']);
    Route::get('/doctors/{id_doctor}/patients', [DoctorPatientController::class, 'listPatients']);

    Route::put('/patients/{id}', [PatientController::class, 'update']);
    Route::post('/patients', [PatientController::class, 'store']);

});

Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
