@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Work Out Logs</h1>
        <a href="{{ route('workoutlogs.create') }}" class="btn btn-primary">Create New Log</a>
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
                @foreach($workOutLogs as $log)
                    <tr>
                        <td>{{ $log->exercise->muscle_area->name }}</td>
                        <td>{{ $log->exercise->name }}</td>
                        <td>{{ $log->weight }}</td>
                        <td>{{ $log->reps }}</td>
                        <td>{{ $log->log_date }}</td>
                        <td>
                            <a href="{{ route('workoutlogs.show', $log->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('workoutlogs.edit', $log->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('workoutlogs.delete', $log->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
