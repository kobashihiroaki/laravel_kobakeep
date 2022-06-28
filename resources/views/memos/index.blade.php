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
                    <a href="./">メモ</a>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="create-area">
                <div id="create_memo">
                    <div class="title"><input id="title" type="text" placeholder="タイトル"></div>
                    <textarea maxlength="150" id="content" class="content" placeholder="メモを入力..."></textarea> 
                    <button name="insert" id="content_insert" class="content-insert">登録</button>
                    <div class="close-btn-area">
                        <button name="close" id="memo_close" class="memo-close">×</button>
                    </div>
                </div>
            </div>
            <div id="list_area" class="list-area">
                @foreach ($memos as $memo)
                <div class="memo-content">
                    <input value="{{ $memo->title }}">
                    <input value="{{ $memo->content }}">
                    <button class="update-button" value="${data.id}">編集</button>
                    <button class="delete-button" onclick="memoDelete(${data.id})">削除</button>
                </div>
                @endforeach
            </div>
        </div>
    </main>
    <script src="/src/insert.js"></script>
    <script src="/src/delete.js"></script>
</body>

@endsection