<x-app-layout>
<div class="containers">
    <h2>部位を選択</h2>
    <ul>
        @foreach ($muscleAreas as $muscleArea)
            <li>
                <a href="{{ route('workoutlogs.select_exercise', $muscleArea->id) }}">{{ $muscleArea->name }}</a>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('muscle_areas.create') }}" class="btn btn-secondary">部位編集</a>
</div>
</x-app-layout>

