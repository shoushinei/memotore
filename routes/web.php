<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuscleController;
use App\Http\Controllers\WorkOutLogController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\MuscleAreaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| ここにアプリケーションのルートを登録します。
| RouteServiceProvider によって読み込まれ、"web" ミドルウェアグループに
| 自動的に割り当てられます。
|--------------------------------------------------------------------------
*/

// ウェルカムページの表示
Route::get('/', function () {
    return view('welcome');
});

// ダッシュボードページの表示
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 認証が必要なルート
Route::middleware(['auth'])->group(function () {
    // WorkoutLog関連のルート
    Route::get('/work_out_logs', [WorkOutLogController::class, 'index'])->name('workoutlogs.index');
    Route::post('/work_out_logs', [WorkOutLogController::class, 'store'])->name('workoutlogs.store');
    Route::get('/work_out_logs/create', [WorkOutLogController::class, 'create'])->name('workoutlogs.create');
    Route::get('/work_out_logs/select_muscle', [WorkOutLogController::class, 'selectMuscle'])->name('workoutlogs.select_muscle');
    Route::get('/work_out_logs/select_exercise/{muscleArea}', [WorkOutLogController::class, 'selectExercise'])->name('workoutlogs.select_exercise');
    Route::get('/work_out_logs/{workOutLog}', [WorkOutLogController::class, 'show'])->name('workoutlogs.show');
    Route::put('/work_out_logs/{workOutLog}', [WorkOutLogController::class, 'update'])->name('workoutlogs.update');
    Route::delete('/work_out_logs/{workOutLog}', [WorkOutLogController::class, 'destroy'])->name('workoutlogs.delete');
    Route::get('/work_out_logs/{workOutLog}/edit', [WorkOutLogController::class, 'edit'])->name('workoutlogs.edit');
    
    // プロフィール編集関連のルート
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // MuscleArea編集関連のルート
    Route::get('/muscle_areas/{muscleArea}/edit', [MuscleAreaController::class, 'edit'])->name('muscle_areas.edit');
    Route::put('/muscle_areas/{muscleArea}', [MuscleAreaController::class, 'update'])->name('muscle_areas.update');
    Route::delete('/muscle_areas/{muscleArea}', [MuscleAreaController::class, 'destroy'])->name('muscle_areas.destroy');

    // Exercise編集関連のルート
    Route::get('/exercises/{exercise}/edit', [ExerciseController::class, 'edit'])->name('exercises.edit');
    Route::put('/exercises/{exercise}', [ExerciseController::class, 'update'])->name('exercises.update');
    Route::delete('/exercises/{exercise}', [ExerciseController::class, 'destroy'])->name('exercises.destroy');
});

// Exercise作成関連のルート（認証不要）
Route::get('/exercises/create/{muscle_area_id}', [ExerciseController::class, 'create'])->name('exercises.create');
Route::post('/exercises', [ExerciseController::class, 'store'])->name('exercises.store');

// MuscleArea作成関連のルート（認証不要）
Route::get('/muscle_areas/create', [MuscleAreaController::class, 'create'])->name('muscle_areas.create');
Route::post('/muscle_areas', [MuscleAreaController::class, 'store'])->name('muscle_areas.store');

// 認証用のルート設定
require __DIR__.'/auth.php';