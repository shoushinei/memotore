@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $exercise->name }}の記録</h2>
    <form action="{{ route('workoutlogs.store') }}" method="POST">
        @csrf
        <input type="hidden" name="exercise_id" value="{{ $exercise->id }}">
        <div>
            <label for="weight">重さ</label>
            <input type="number" name="weight" id="weight" required>
        </div>
        <div>
            <label for="reps">回数</label>
            <input type="number" name="reps" id="reps" required>
        </div>
        <div>
            <label for="log_date">日付</label>
            <input type="date" name="log_date" id="log_date" required>
        </div>
        <button type="submit">記録する</button>
    </form>
</div>
@endsection

