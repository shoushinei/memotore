<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>隙間時間の筋メモ</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #333;
        }
        .app-header {
            display: flex;
            justify-content: space-between;
            padding: 1rem 2rem;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .app-header a {
            color: #333;
            font-weight: 600;
            text-decoration: none;
            margin-left: 1.5rem;
            transition: color 0.3s ease;
        }
        .app-header a:hover {
            color: #007BFF;
        }
        .app-name {
            font-size: 2.5rem;
            font-weight: 600;
            text-align: center;
            margin-top: 3rem;
            color: #007BFF;
        }
        .app-description, .app-background, .app-development, .app-features, .app-difficulty {
            max-width: 800px;
            margin: 2rem auto;
            text-align: center;
            line-height: 1.6;
        }
        .app-background, .app-development, .app-features, .app-difficulty {
            text-align: left;
            color: #555;
            padding: 0 1rem;
        }
        .section-title {
            font-size: 1.75rem;
            margin-top: 3rem;
            color: #444;
            text-align: center;
        }
        .highlight {
            font-weight: bold;
            color: #007BFF;
        }
        .auth-links {
            display: flex;
            justify-content: flex-end;
        }
        .auth-links a {
            margin-left: 1.5rem;
        }
        /* Hover Effect for Buttons */
        .auth-links a:hover {
            color: #007BFF;
            text-decoration: underline;
        }
        @media (max-width: 768px) {
            .app-name {
                font-size: 2rem;
            }
            .app-description, .app-background, .app-development, .app-features, .app-difficulty {
                padding: 0 1rem;
            }
        }
    </style>
</head>
<body class="antialiased">

    <!-- Header with Auth Links -->
    <header class="app-header">
        <div class="app-name">
            隙間時間の筋メモ
        </div>
        <div class="auth-links">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </header>

    <!-- App Introduction -->
    <div class="app-description">
        筋トレの隙間時間を利用して記録し、記録を管理するアプリです。
    </div>

    <!-- App Background Section -->
    <div class="section-title">作成背景</div>
    <div class="app-background">
        ずっと筋トレ管理アプリを愛用している身として、筋トレアプリが存在する問題に気づきました。<br>
        筋トレを記録する際、フォームやトレーニングの状態を細かく設定できるアプリは少なく、ユーザーとして欲しい機能が満たされていないと感じています。<br>
        また、ジムでのインターバルやマシン待ちの隙間時間が有効活用できていないことにも気づきました。そこで、この問題を解決するために、自分の理想の筋トレ管理アプリを開発することを決意しました。
    </div>

    <!-- Development Journey Section -->
    <div class="section-title">開発経緯</div>
    <div class="app-development">
        プログラミングを学び始めて2か月が経った頃、「隙間時間の筋メモ」を開発するプロジェクトをスタートしました。<br>
        このアプリを通じて、これまで学んだ知識を実際のアプリケーションに落とし込み、さらに自分のスキルを磨くことができました。<br>
        特に、Laravelを用いたバックエンド開発や、AWSの活用、データベース設計におけるER図作成など、幅広い技術を習得することができました。
    </div>

    <!-- Features Section -->
    <div class="section-title">工夫した点</div>
    <div class="app-features">
        特に力を入れたのは、細かいトレーニング状況を管理できるタグ機能です。<br>
        筋トレをしていると、ただ重量や回数を記録するだけでなく、フォームの精度やトレーニング時の体の状態、装備の有無（例: ベルトの使用、補助の有無）など、詳細な記録が求められることがあります。<br>
        この課題を解決するため、事前に登録したタグを簡単に選択できるようにしました。将来的には、タグに基づいた詳細な分析機能も追加する予定です。
    </div>

    <!-- Difficulty Section -->
    <div class="section-title">難しいと感じた点</div>
    <div class="app-difficulty">
        特に難しかったのは、ER図の設計とタグ機能の実装です。<br>
        異なるユーザーのデータを分離するため、リレーションを多対多にし、中間テーブルを設計しました。<br>
        また、JavaScriptを用いた動的操作が難しく、3日間の試行錯誤を経て、タグ機能を完成させることができました。
    </div>

</body>
</html>