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
use Carbon\Carbon;

class WorkOutLogController extends Controller
{
    public function index()
    {
        $workOutLogs = WorkOutLog::with('exercise.muscle_area')
            ->where('user_id', Auth::id())
            ->orderBy('log_date', 'desc')
            ->get()
            ->groupBy(function($log) {
                return $log->exercise_id . '_' . (new \DateTime($log->log_date))->format('Y-m-d');
            });
    
        return view('workoutlogs.index', compact('workOutLogs'));
    }

    public function show(WorkOutLog $workOutLog)
    {
        $startOfDay = Carbon::parse($workOutLog->log_date)->startOfDay();
        $endOfDay = Carbon::parse($workOutLog->log_date)->endOfDay();
    
        $workOutLogs = WorkOutLog::where('user_id', $workOutLog->user_id)
                                 ->where('exercise_id', $workOutLog->exercise_id)
                                 ->whereBetween('log_date', [$startOfDay, $endOfDay])
                                 ->with('tags')
                                 ->get();
    
        return view('workoutlogs.show', compact('workOutLogs', 'workOutLog'));
    }




    public function create(Request $request)
    {
        $exercise = Exercise::findOrFail($request->exercise);
        $tags = Tag::where('user_id', auth()->id())->get(); // ユーザーのタグを取得
        return view('workoutlogs.create', compact('exercise', 'tags'));
    }
    
    public function selectMuscle()
    {
        $user = auth()->user();
        $muscleAreas = $user->muscle_areas()->get();
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
        $request->merge(['user_id' => auth()->id()]);
        $request->validate([
            'exercise_id' => 'required|exists:exercises,id',
            'weights' => 'required|array',
            'weights.*' => 'numeric|min:0',
            'reps' => 'required|array',
            'reps.*' => 'numeric|min:1',
            'user_id' => 'required|exists:users,id',
            'tags' => 'array', // タグのバリデーションを追加
            'tags.*' => 'array', // 各セットに対してのタグ
        ]);
    
        foreach ($request->weights as $index => $weight) {
            $workOutLog = WorkOutLog::create([
                'user_id' => $request->user_id,
                'exercise_id' => $request->exercise_id,
                'weight' => $weight,
                'reps' => $request->reps[$index],
                'log_date' => new \DateTime('now', new \DateTimeZone('Asia/Tokyo')), 
            ]);
    
            // タグの保存処理
            if (!empty($request->tags[$index + 1])) { // インデックスの調整
                foreach ($request->tags[$index + 1] as $tagName) {
                    $tag = Tag::firstOrCreate([
                        'user_id' => $request->user_id,
                        'comment' => $tagName,
                    ]);
                    $workOutLog->tags()->attach($tag->id); // 中間テーブルに保存
                }
            }
        }
    
        return redirect()->route('workoutlogs.index')->with('success', '記録が追加されました。');
    }



    public function edit(WorkOutLog $workOutLog)
    {
        $startOfDay = Carbon::parse($workOutLog->log_date)->startOfDay();
        $endOfDay = Carbon::parse($workOutLog->log_date)->endOfDay();
    
        $workOutLogs = WorkOutLog::where('user_id', $workOutLog->user_id)
                                 ->where('exercise_id', $workOutLog->exercise_id)
                                 ->whereBetween('log_date', [$startOfDay, $endOfDay])
                                 ->with('tags')
                                 ->get();
    
        $muscleAreas = MuscleArea::all();
        
        return view('workoutlogs.edit', compact('workOutLogs', 'muscleAreas', 'workOutLog'));
    }


    public function update(Request $request, WorkOutLog $workOutLog)
    {
        $request->merge(['user_id' => auth()->id()]);
        $request->validate([
            'exercise_id' => 'required|exists:exercises,id',
            'weights' => 'required|array',
            'weights.*' => 'numeric|min:0',
            'reps' => 'required|array',
            'reps.*' => 'numeric|min:1',
            'user_id' => 'required|exists:users,id',
        ]);
    
        if ($request->deletedAll == '1') {
            return $this->destroy($workOutLog);
        }
    
        $startOfDay = Carbon::parse($workOutLog->log_date)->startOfDay();
        $endOfDay = Carbon::parse($workOutLog->log_date)->endOfDay();
    
        // 既存のログを更新または削除
        $existingLogs = WorkOutLog::where('user_id', auth()->id())
                                  ->where('exercise_id', $request->exercise_id)
                                  ->whereBetween('log_date', [$startOfDay, $endOfDay])
                                  ->get();
    
        foreach ($existingLogs as $existingLog) {
            if (isset($request->weights[$existingLog->id])) {
                $existingLog->weight = $request->weights[$existingLog->id];
                $existingLog->reps = $request->reps[$existingLog->id];
                $existingLog->save();
            } else {
                $existingLog->delete();
            }
        }
    
        // 新しいログの作成
        $latestTime = Carbon::parse($workOutLog->log_date)->endOfDay();
        foreach ($request->weights as $key => $weight) {
            if (strpos($key, 'new_') === 0) {
                $newKey = (int)str_replace('new_', '', $key); // 'new_1' を 1 に変換
                WorkOutLog::create([
                    'user_id' => $request->user_id,
                    'exercise_id' => $request->exercise_id,
                    'weight' => $weight,
                    'reps' => $request->reps[$key],
                    'log_date' => $latestTime->subSecond($newKey)->format('Y-m-d H:i:s'),
                ]);
            }
        }
    
        return redirect()->route('workoutlogs.index')->with('success', '記録が更新されました。');
    }
    
    public function destroy(WorkOutLog $workOutLog)
    {
        $startOfDay = Carbon::parse($workOutLog->log_date)->startOfDay();
        $endOfDay = Carbon::parse($workOutLog->log_date)->endOfDay();
    
        WorkOutLog::where('user_id', auth()->id())
                  ->where('exercise_id', $workOutLog->exercise_id)
                  ->whereBetween('log_date', [$startOfDay, $endOfDay])
                  ->delete();
    
        return redirect()->route('workoutlogs.index')->with('success', '記録が削除されました。');
    }
    
    public function get_work_out_logs(Request $request)
    {
        
    
        // 登録処理
        return WorkOutLog::query()
            ->select(
                // FullCalendarの形式に合わせる
                'log_date as start',
                'id'
            )
            ->get();
    }
    
    }