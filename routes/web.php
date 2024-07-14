<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuscleController;
use App\Http\Controllers\WorkOutLogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function() {
    Route::get('/work_out_logs', [WorkOutLogController::class, 'index'])->name('workoutlogs.index');
    Route::post('/work_out_logs', [WorkOutLogController::class, 'store'])->name('workoutlogs.store');
    Route::get('/work_out_logs/create', [WorkOutLogController::class, 'create'])->name('workoutlogs.create');
    Route::get('/work_out_logs/{workOutLog}', [WorkOutLogController::class, 'show'])->name('workoutlogs.show');
    Route::put('/work_out_logs/{workOutLog}', [WorkOutLogController::class, 'update'])->name('workoutlogs.update');
    Route::delete('/work_out_logs/{workOutLog}', [WorkOutLogController::class, 'destroy'])->name('workoutlogs.delete');
    Route::get('/work_out_logs/{workOutLog}/edit', [WorkOutLogController::class, 'edit'])->name('workoutlogs.edit');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
