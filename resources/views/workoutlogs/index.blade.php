@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Work Out Logs</h1>
    <a href="{{ route('workoutlogs.select_muscle') }}" class="btn btn-primary">トレーニング追加</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>部位</th>
                <th>種目</th>
                <th>重さ</th>
                <th>回数</th>
                <th>記録日</th>
                <th>アクション</th>
            </tr>
        </thead>
        <tbody>
            @foreach($workOutLogs as $groupKey => $logs)
                @php
                    $firstLog = $logs->first();
                @endphp
                <tr>
                    <td>{{ $firstLog->exercise->muscle_area->name }}</td>
                    <td>{{ $firstLog->exercise->name }}</td>
                    <td>
                        @foreach($logs as $log)
                            {{ $log->weight }} kg<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($logs as $log)
                            {{ $log->reps }} 回<br>
                        @endforeach
                    </td>
                    <td>{{ (new \DateTime($firstLog->log_date))->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('workoutlogs.show', $firstLog->id) }}" class="btn btn-info">詳細</a>
                        <a href="{{ route('workoutlogs.edit', $firstLog->id) }}" class="btn btn-warning">編集</a>
                        <form action="{{ route('workoutlogs.delete', $firstLog->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection