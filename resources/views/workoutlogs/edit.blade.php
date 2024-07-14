@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Work Out Log</h1>
        <form action="{{ route('workoutlogs.update', $workOutLog->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="muscle_area">部位</label>
                <select id="muscle_area" class="form-control" onchange="updateExercises()" disabled>
                    @foreach($muscleAreas as $muscleArea)
                        <option value="{{ $muscleArea->id }}" {{ $workOutLog->exercise->muscle_area->id == $muscleArea->id ? 'selected' : '' }}>{{ $muscleArea->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exercise_id">種目</label>
                <select id="exercise_id" name="exercise_id" class="form-control">
                    @foreach($workOutLog->exercise->muscle_area->exercises as $exercise)
                        <option value="{{ $exercise->id }}" {{ $workOutLog->exercise->id == $exercise->id ? 'selected' : '' }}>{{ $exercise->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="weight">重さ (kg)</label>
                <input type="number" name="weight" class="form-control" step="0.1" value="{{ $workOutLog->weight }}" required>
            </div>
            <div class="form-group">
                <label for="reps">回数</label>
                <input type="number" name="reps" class="form-control" value="{{ $workOutLog->reps }}" required>
            </div>
            <div class="form-group">
                <label for="log_date">記録日</label>
                <input type="datetime-local" name="log_date" class="form-control" value="{{ $workOutLog->log_date" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
