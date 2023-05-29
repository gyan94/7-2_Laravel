
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('resto/gestheader.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('resto/index.css') }}">
    <title>Gourmet Memory グルメモリー</title>
</head>
<body>
    <main>
        @include('resto.gestheader')
        <div id="container">
            @foreach ($posts as $post)
            <div class="linkbox">
                <div class="post-image">
                    <div><img src="{{ Storage::url($post->image) }}" alt=""></div>
                </div>
                <div class="post-details">
                    <p class="post-author">投稿者：{{ $post->name }}</p>
                    <p class="post-name">店名：{{ $post->name }}</p>
                    <p class="post-area">エリア：{{ $post->area }}</p>
                    <p class="post-genre">ジャンル：{{ $post->genre }}</p>
                    <span class="like-count">いいね：💓{{ $post->likes->count() }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </main>
</body>
</html>
