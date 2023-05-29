<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('resto/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('resto/history.css') }}">
    <title>投稿履歴</title>
</head>
<body>
    <main>
        @include('resto.header')
        <div class="container"> 
            <h2>{{ Auth()->user()->name }}の投稿履歴</h2>
            @foreach ($posts as $post)         
                <div class="linkbox">
                    <div>
                        <div><img src="{{ Storage::url($post->image) }}" alt=""></div>
                        <a href="{{ route('detail', $post->id) }}"></a>
                    </div>
                    <div>
                        <p class="user">投稿者：{{ $post->user->name }}</p>
                        <p class="name">店名：{{ $post->name }}</p>
                        <p class="area">エリア：{{ $post->area }}</p>
                        <p class="genre">ジャンル：{{ $post->genre }}</p>
                        <span class="like-count">いいね：💓{{ $post->likes->count() }}</span>
                        <a href="{{ route('detail', $post->id) }}"></a>
                    </div>
                    <div class="edit">
                        <form action="{{ route('edit', $post->id) }}">
                            @csrf
                            <button>編集</button>
                        </form>
                        <form method="post" action="{{ route('delete', $post->id) }}">
                            @csrf @method('delete') 
                            <button type="submit" onclick="return confirm_delete()">削除</button>
                        </form>
                    </div>
                </div>
            
            @endforeach
        </div>
            <script>
                function confirm_delete() {
                    var select = confirm("本当に削除してもよろしいですか？");
                        return select;
                        }
            </script>
    </main>
</body>
</html>
