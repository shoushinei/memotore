<x-app-layout>
<div class="containers">
    <h2>{{ $workOutLog->exercise->name }}の編集</h2>
    <form id="workOutForm" action="{{ route('workoutlogs.update', $workOutLog) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="exercise_id" value="{{ $workOutLog->exercise_id }}">
        <input type="hidden" id="deletedAll" name="deletedAll" value="0">

        <div id="sets">
            @foreach ($workOutLogs as $log)
                <div class="set" data-id="{{ $log->id }}">
                    <h3>セット {{ $loop->iteration }}</h3>
                    <div>
                        <label for="weight_{{ $log->id }}">重さ</label>
                        <input type="number" name="weights[{{ $log->id }}]" id="weight_{{ $log->id }}" value="{{ $log->weight }}" required>
                    </div>
                    <div>
                        <label for="reps_{{ $log->id }}">回数</label>
                        <input type="number" name="reps[{{ $log->id }}]" id="reps_{{ $log->id }}" value="{{ $log->reps }}" required>
                    </div>
                    <div>
                        @foreach ($log->tags as $tag)
                            <span class="tag">{{ $tag->comment }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <button type="button" id="addSetButton" class="btn-primary">セットを追加</button>
        <button type="button" id="removeSetButton" class="btn-danger">セットを削除</button>
        
        <button type="submit" class="btn-warning">更新する</button>
    </form>
    <a href="{{ route('workoutlogs.index') }}" class="btn-back">戻る</a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let setCount = {{ count($workOutLogs) }};

        function updateRemoveButtonVisibility() {
            const sets = document.querySelectorAll('.set');
            const removeButton = document.getElementById('removeSetButton');
            if (sets.length === 0) {
                removeButton.style.display = 'none';
            } else {
                removeButton.style.display = 'inline-block';
            }
        }

        document.getElementById('addSetButton').addEventListener('click', function() {
            setCount++;
            const newSet = document.createElement('div');
            newSet.classList.add('set');
            newSet.setAttribute('data-id', 'new_' + setCount);
            newSet.innerHTML = `
                <h3>セット ${setCount}</h3>
                <div>
                    <label for="weight_new_${setCount}">重さ</label>
                    <input type="number" name="weights[new_${setCount}]" id="weight_new_${setCount}" required>
                </div>
                <div>
                    <label for="reps_new_${setCount}">回数</label>
                    <input type="number" name="reps[new_${setCount}]" id="reps_new_${setCount}" required>
                </div>
            `;
            document.getElementById('sets').appendChild(newSet);
            updateRemoveButtonVisibility();
        });

        document.getElementById('removeSetButton').addEventListener('click', function() {
            const sets = document.querySelectorAll('.set');
            if (sets.length > 0) {
                sets[sets.length - 1].remove();
                setCount--;
                updateRemoveButtonVisibility();
            }
        });

        updateRemoveButtonVisibility();
    });
</script>
</x-app-layout>
