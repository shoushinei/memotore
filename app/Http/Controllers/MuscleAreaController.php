<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MuscleArea;
use App\Models\User;
use App\Models\Exercise;
use App\Models\Tag;
use App\Models\WorkOutLog;
use Illuminate\Support\Facades\Auth;

class MuscleAreaController extends Controller
{
    public function create()
    {
        $muscleAreas = MuscleArea::all();
        return view('muscle_areas.create', compact('muscleAreas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        MuscleArea::create([
            'name' => $request->name,
        ]);

        return redirect()->route('muscle_areas.create');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $muscleArea = MuscleArea::findOrFail($id);
        $muscleArea->name = $request->name;
        $muscleArea->save();

        return redirect()->route('muscle_areas.create');
    }

    public function destroy($id)
    {
        $muscleArea = MuscleArea::findOrFail($id);

        if ($muscleArea->exercises->count() > 0) {
            // 部位に関連付けられた種目が存在する場合、削除の前に警告メッセージを表示
            return redirect()->route('muscle_areas.create')->with('error', '部位の中に種目が入っています。先に種目を削除してください。');
            
        }
    // dd($muscleArea);
        $muscleArea->delete();

        return redirect()->route('muscle_areas.create')->with('success', '部位が削除されました');
    }
    
}
