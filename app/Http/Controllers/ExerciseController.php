<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Models\MuscleArea;

class ExerciseController extends Controller
{
    public function create($muscleAreaId)
    {
        $muscleArea = MuscleArea::findOrFail($muscleAreaId);
        $exercises = $muscleArea->exercises; // 関連する種目を取得

        return view('exercises.create', compact('muscleArea', 'exercises'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'muscle_area_id' => 'required|exists:muscle_areas,id',
        ]);

        Exercise::create([
            'name' => $request->name,
            'muscle_area_id' => $request->muscle_area_id,
        ]);

        return redirect()->route('exercises.create', $request->muscle_area_id);
    }

    public function index($muscleAreaId)
    {
        $muscleArea = MuscleArea::findOrFail($muscleAreaId);
        $exercises = Exercise::where('muscle_area_id', $muscleAreaId)->get();
        return view('exercises.create', compact('muscleArea', 'exercises'));
    }

    public function update(Request $request, Exercise $exercise)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $exercise->update(['name' => $request->name]);

        return redirect()->route('exercises.create', $exercise->muscle_area_id);
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();

        return redirect()->route('exercises.create', $exercise->muscle_area_id)->with('success', '種目が削除されました');
    }
}
