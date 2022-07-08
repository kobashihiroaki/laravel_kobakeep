@extends('memos.layout')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>KOBA keep</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <script defer src="/src/main.js"></script>
</head>
<body>
    <header>
        <a href="./">
            <h1>KOBA Keep</h1>
        </a>
    </header>
    <main>
        <div class="sidemenu">
            <ul>
                <li class="side-button">
                    <a href="./memos">メモ</a>
                </li>
                <li class="side-button">
                    <a href="./trash">ゴミ箱</a>
                </li>
            </ul>
        </div>
        <div class="container">
            <div id="list_area" class="list-area">
                
            </div>
        </div>
    </main>
</body>
@endsection