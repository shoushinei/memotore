<x-app-layout>
<div class="containers">
    <h2>種目を選択 ({{ $muscleArea->name }})</h2>
    <ul>
        @foreach ($exercises as $exercise)
            <li>
                <a href="{{ route('workoutlogs.create', ['exercise' => $exercise->id]) }}">{{ $exercise->name }}</a>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('exercises.create', ['muscle_area_id' => $muscleArea->id]) }}" class="btn btn-secondary">種目編集</a>
</div>
</x-app-layout>

