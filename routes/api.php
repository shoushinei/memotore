<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Exercise;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/exercises/{muscle_area}', function($muscle_area) {
    return Exercise::where('muscle_area_id', $muscle_area)->get();
});