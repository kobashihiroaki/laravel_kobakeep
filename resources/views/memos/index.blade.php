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
                <form id="create_memo" action="{{ route('memos.store') }}" method="POST">
                    @csrf
                    <div class="title"><input id="title" name="title" type="text" placeholder="タイトル"></div>
                    <textarea maxlength="150" id="content" name="content" class="content" placeholder="メモを入力..."></textarea> 
                    <button name="insert" id="content_insert" class="content-insert">登録</button>
                    <div class="close-btn-area">
                        <button name="close" id="memo_close" class="memo-close">×</button>
                    </div>
                </form>
            </div>
            <div id="list_area" class="list-area">
                @foreach ($memos as $memo)
                <form class="memo-content" action="{{ route('memos.update',$memo->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input value="{{ $memo->title }}" name="title">
                    <input value="{{ $memo->content }}" name="content">
                    <button class="update-button" value="${data.id}">編集</button>
                    <button class="delete-button" onclick="memoDelete(${data.id})">削除</button>
                </form>
                @endforeach
            </div>
        </div>
    </main>
    <script src="/src/insert.js"></script>
    <script src="/src/delete.js"></script>
</body>

@endsection