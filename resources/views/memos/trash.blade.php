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
            <div id="list_area" class="list-area">
                @foreach ($trashes as $trash)
                <div class="memo-content">
                    <form id="delete{{$trash->id}}" action="{{ route('trash.force_delete',$trash->id) }}" method="POST">
                        @csrf
                        @method('DELETE')    
                    </form>
                    <form id="restore{{$trash->id}}" action="{{ route('trash.restore', $trash->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                    </form>
                    <input value="{{ $trash->title }}" name="title">
                    <input value="{{ $trash->content }}" name="content">
                    <button form="delete{{$trash->id}}" class="delete-button">削除</button>
                    <button form="restore{{$trash->id}}" class="undo">元に戻す</button>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</body>
@endsection