@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Work Out Log Details</h1>
        <div>
            <strong>部位:</strong> {{ $workOutLog->exercise->muscle_area->name }}
        </div>
        <div>
            <strong>種目:</strong> {{ $workOutLog->exercise->name }}
        </div>
        <div>
            <strong>重さ:</strong> {{ $workOutLog->weight }} kg
        </div>
        <div>
            <strong>回数:</strong> {{ $workOutLog->reps }} 回
　　　　</div>
        <div>
            <strong>記録日:</strong> {{ $workOutLog->log_date }}
        </div>
        <a href="{{ route('workoutlogs.index') }}" class="btn btn-primary">戻る</a>
    </div>
@endsection
