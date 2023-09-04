<?php
use App\Http\Controllers\Api\MuridController;
use App\Http\Controllers\Api\MahasiswaController;
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
Route::get('murid', [MuridController::class, 'index']);
Route::post('murid', [MuridController::class, 'create']);
Route::post('murid/{id}', [MuridController::class, 'edit']);
Route::delete('murid/{id}', [MuridController::class, 'delete']);
Route::get('mahasiswa', [MahasiswaController::class, 'index']);
Route::post('siswa', [MahasiswaController::class, 'create']);
Route::post('siswa/{id}', [MahasiswaController::class, 'edit']);
Route::delete('siswa/{id}', [MahasiswaController::class, 'delete']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
