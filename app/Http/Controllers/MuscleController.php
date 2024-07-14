<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MuscleArea;
use App\Models\Exercise;

class MuscleAreaController extends Controller
{
    public function index()
    {
        $muscleAreas = MuscleArea::all();
        return view('muscle_areas.index', compact('muscleAreas'));
    }

    public function show($id)
    {
        $muscleArea = MuscleArea::findOrFail($id);
        return view('muscle_areas.show', compact('muscleArea'));
    }

    public function exercises($id)
    {
        $muscleArea = MuscleArea::findOrFail($id);
        $exercises = Exercise::where('muscle_area_id', $id)->get();
        return view('muscle_areas.exercises', compact('muscleArea', 'exercises'));
    }
}
