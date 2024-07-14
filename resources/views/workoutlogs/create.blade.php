@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Work Out Log</h1>
        <form action="{{ route('workoutlogs.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="muscle_area">部位</label>
                <select id="muscle_area" class="form-control" onchange="updateExercises()">
                    <option value="">選択してください</option>
                    @foreach($muscleAreas as $muscleArea)
                        <option value="{{ $muscleArea->id }}">{{ $muscleArea->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exercise_id">種目</label>
                <select id="exercise_id" name="exercise_id" class="form-control">
                    <option value="">先に部位を選んでください</option>
                </select>
            </div>
            <div class="form-group">
                <label for="weight">重さ (kg)</label>
                <input type="number" name="weight" class="form-control" step="0.1" required>
            </div>
            <div class="form-group">
                <label for="reps">回数</label>
                <input type="number" name="reps" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="log_date">記録日</label>
                <input type="datetime-local" name="log_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>

    <script>
        function updateExercises() {
            var muscleAreaId = document.getElementById('muscle_area').value;
            var exerciseSelect = document.getElementById('exercise_id');
            exerciseSelect.innerHTML = '<option value="">ロード中...</option>';
            
            fetch(`/api/exercises/${muscleAreaId}`)
                .then(response => response.json())
                .then(data => {
                    exerciseSelect.innerHTML = '<option value="">選択してください</option>';
                    data.forEach(exercise => {
                        exerciseSelect.innerHTML += `<option value="${exercise.id}">${exercise.name}</option>`;
                    });
                });
        }
    </script>
@endsection

