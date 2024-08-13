<x-app-layout>
<div class="containers">
    <h2>{{ $muscleArea->name }}に種目を編集</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('exercises.store') }}" method="POST">
        @csrf
        <input type="hidden" name="muscle_area_id" value="{{ $muscleArea->id }}">
        <div>
            <label for="name">種目名</label>
            <input type="text" name="name" id="name" required>
        </div>
        <button type="submit">追加</button>
    </form>

    <h3>既存の種目</h3>
    <ul>
        @foreach ($exercises as $exercise)
            <li>
                <form action="{{ route('exercises.update', $exercise->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" value="{{ $exercise->name }}">
                    <button type="submit">編集</button>
                </form>
                <form action="{{ route('exercises.destroy', $exercise->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('本当に削除してもよろしいですか？');">削除</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('workoutlogs.select_muscle') }}" class="btn btn-secondary">戻る</a>
</div>
</x-app-layout>

