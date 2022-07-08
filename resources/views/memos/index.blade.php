@extends('memos.layout')
@section('head')
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
@endsection
@section('content')
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
                    <a href="{{ route('trashes.index') }}">ゴミ箱</a>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="create-area">
                <form id="create_memo" action="{{ route('memos.store') }}" method="POST">
                    @csrf
                    <div class="title"><input id="title" name="title" type="text" placeholder="タイトル"></div>
                    <textarea autofocus maxlength="150" id="content" name="content" class="content" placeholder="メモを入力..."></textarea> 
                    <button name="insert" id="content_insert" class="content-insert">登録</button>
                    <div class="close-btn-area">
                        <button name="close" id="memo_close" class="memo-close" type="button">×</button>
                    </div>
                </form>
            </div>
            <div id="list_area" class="list-area">
                @foreach ($memos as $memo)
                <div class="memo-content">
                    <form id="update{{$memo->id}}" action="{{ route('memos.update',$memo->id) }}" method="POST">
                        @csrf   
                        @method('PUT')
                    </form>
                    <form id="delete{{$memo->id}}" action="{{ route('memos.destroy',$memo->id) }}" method="POST">
                        @csrf
                        @method('DELETE')    
                    </form>
                    <input form="update{{$memo->id}}" value="{{ $memo->title }}" name="title">
                    <input form="update{{$memo->id}}" value="{{ $memo->content }}" name="content">
                    <button form="update{{$memo->id}}" class="update-button">編集</button>
                    <button form="delete{{$memo->id}}" class="delete-button">削除</button>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</body>
@endsection