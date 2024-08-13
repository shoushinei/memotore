<x-app-layout>
    <div class="containers">
        <h1>Work Out Log Details</h1>
        <div>
            <strong>部位:</strong> {{ $workOutLog->exercise->muscle_area->name }}
        </div>
        <div>
            <strong>種目:</strong> {{ $workOutLog->exercise->name }}
        </div>
        <div>
            <strong>記録日:</strong> {{ $workOutLog->log_date }}
        </div>
        <div>
            <strong>セット:</strong>
            <ul>
                @foreach ($workOutLogs as $log)
                    <li>
                        <strong>重さ:</strong> {{ $log->weight }} kg,
                        <strong>回数:</strong> {{ $log->reps }} 回
                        <div>
                            @foreach ($log->tags as $tag)
                                <span class="tag">{{ $tag->comment }}</span>
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <a href="{{ route('workoutlogs.index') }}" class="btn-back">戻る</a>
    </div>
</x-app-layout>

