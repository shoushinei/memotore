<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $muscleArea->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="{{ url('/muscle-areas') }}" class="back-button">戻る</a>
            <span>2024/06/22</span>
            <a href="#" class="add-button">追加</a>
        </div>
        <h2>種目を選択 - {{ $muscleArea->name }}</h2>
        <div class="exercise-list">
            @foreach ($muscleArea->exercises as $exercise)
                <a href="{{ url('/exercises/' . $exercise->id) }}" class="exercise-button">{{ $exercise->name }}</a>
            @endforeach
        </div>
        <div class="footer">
            <a href="#" class="footer-link">ホーム</a>
            <a href="#" class="footer-link">チャット</a>
            <a href="#" class="footer-link">分析</a>
        </div>
    </div>
</body>
</html>
