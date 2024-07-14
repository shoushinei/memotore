<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $muscleArea->name }}の種目</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="{{ url('/muscle-areas/' . $muscleArea->id) }}" class="back-button">戻る</a>
            <span>2024/06/22</span>
            <a href="#" class="add-button">追加</a>
        </div>
        <h2>{{ $muscleArea->name }}の種目</h2>
        <div class="exercise-list">
            @foreach ($exercises as $exercise)
                <div class="exercise-button">{{ $exercise->name }}</div>
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
