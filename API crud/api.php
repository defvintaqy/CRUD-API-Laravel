<?php
use App\Http\Controllers\APImahasiswaController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('apimahasiswa', [APImahasiswaController::class, 'index']);
Route::get('apimahasiswa/{id}', [APImahasiswaController::class, 'show']);
Route::post('apimahasiswa', [APImahasiswaController::class, 'store']);
Route::put('apimahasiswa/{id}', [APImahasiswaController::class, 'update']);
Route::delete('apimahasiswa/{id}', [APImahasiswaController::class, 'destroy']);

