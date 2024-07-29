<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ChatLog;
use App\Models\Exercise;
use App\Models\MuscleArea;
use App\Models\Tag;
use App\Models\WorkOutLog;
use Illuminate\Support\Facades\Auth;

class WorkOutLogController extends Controller
{
    public function index()
    {
        $workOutLogs = WorkOutLog::with('exercise.muscle_area')->where('user_id', Auth::id())->get();
        return view('workoutlogs.index', compact('workOutLogs'));
    }

    public function show(WorkOutLog $workOutLog)
    {
        return view('workoutlogs.show')->with(['workOutLog' => $workOutLog]);
    }

    public function create(Request $request)
    {
        $exercise = Exercise::findOrFail($request->exercise);
        return view('workoutlogs.create', compact('exercise'));
    }
    
    public function selectMuscle()
    {
        $muscleAreas = MuscleArea::all();
        return view('workoutlogs.select_muscle', compact('muscleAreas'));
    }

    public function selectExercise($muscleAreaId)
    {
        $muscleArea = MuscleArea::findOrFail($muscleAreaId);
        $exercises = Exercise::where('muscle_area_id', $muscleAreaId)->get();
        return view('workoutlogs.select_exercise', compact('muscleArea', 'exercises'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $workOutLog = new WorkOutLog();
        $workOutLog->user_id = Auth::id();
        $workOutLog->exercise_id = $input['exercise_id'];
        $workOutLog->weight = $input['weight'];
        $workOutLog->reps = $input['reps'];
        $workOutLog->log_date = $input['log_date'];
        $workOutLog->save();

        return redirect()->route('workoutlogs.index');
    }

    public function edit(WorkOutLog $workOutLog)
    {
        $muscleAreas = MuscleArea::all();
        return view('workoutlogs.edit')->with(['workOutLog' => $workOutLog, 'muscleAreas' => $muscleAreas]);
    }

    public function update(Request $request, WorkOutLog $workOutLog)
    {
        $input = $request->all();
        $workOutLog->exercise_id = $input['exercise_id'];
        $workOutLog->weight = $input['weight'];
        $workOutLog->reps = $input['reps'];
        $workOutLog->log_date = $input['log_date'];
        $workOutLog->save();

        return redirect()->route('workoutlogs.index');
    }

    public function destroy(WorkOutLog $workOutLog)
    {
        $workOutLog->delete();
        return redirect()->route('workoutlogs.index');
    }
}
