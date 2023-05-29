
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('resto/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('resto/like.css') }}">
    <title>Gourmet Memory グルメモリー</title>
</head>
<body>
    <main>
        @include('resto.header')
        <div id="container">
        <div>
            <h2>いいねした投稿一覧</h2>

            @foreach ($likedPosts as $post)
                <div class="linkbox">
                    <div>
                        <div><img src="{{ Storage::url($post->image) }}" alt=""></div>
                        <a href="{{ route('detail', $post->id) }}"></a>
                    </div>
                    <div>
                        <p>投稿者：{{ $post->user->name }}</p>
                        <p>店名：{{ $post->name }}</p>
                        <p>エリア：{{ $post->area }}</p>
                        <p>ジャンル：{{ $post->genre }}</p>
                        <span class="like-count">いいね：💓{{ $post->likes->count() }}</span>
                        <a href="{{ route('detail', $post->id) }}"></a>
                    </div>
                </div>
            @endforeach

        </div>
        </div>
    </main>
</body>
</html>

