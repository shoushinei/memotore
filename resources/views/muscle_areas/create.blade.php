<x-app-layout>
<div class="containers">
    <h2>部位を編集</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    <form action="{{ route('muscle_areas.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">部位名</label>
            <input type="text" name="name" id="name" required>
        </div>
        <button type="submit">追加</button>
    </form>

    <h3>既存の部位</h3>
    <ul>
        @foreach ($muscleAreas as $muscleArea)
            <li>
                <form action="{{ route('muscle_areas.update', $muscleArea->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" value="{{ $muscleArea->name }}">
                    <button type="submit">更新</button>
                </form>
                <form action="{{ route('muscle_areas.destroy', $muscleArea->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('本当に削除してもよろしいですか？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('workoutlogs.select_muscle') }}" class="btn btn-secondary">戻る</a> 
</div>
</x-app-layout>
