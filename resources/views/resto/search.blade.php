<?php
$areas = ['北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', '茨城県', '栃木県', '群馬県', 
'埼玉県', '千葉県', '東京都', '神奈川県', '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県', 
'静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県', '鳥取県', '島根県',
 '岡山県', '広島県', '山口県', '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県', '熊本県', 
 '大分県', '宮崎県', '鹿児島県', '沖縄県'];
$genres = ['日本料理', 'イタリアン', '洋食', '中華', 'カフェ', 'スイーツ', '居酒屋', '焼肉', '海鮮', '麺類', 'その他'];


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('resto/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('resto/search.css') }}">
    <title>検索一覧</title>
</head>
<body>
    <main id="search-main">
        @include('resto.header')

        <div id="container">

            <div id="search-info">
                <p>検索したエリア：{{ request()->get('area') }}</p>
                <p>検索したジャンル：{{ request()->get('genre') }}</p>
            </div>
        
            <div id="search-results">
                @foreach ($posts as $post)
                    <div class="linkbox">
                        <div>
                            <div><img src="{{ Storage::url($post->image) }}" alt=""></div>
                            <a href="{{ route('detail', $post->id) }}"></a>
                        </div>
                        <div>
                            <p>投稿者：  {{ $post->user->name }}</p>
                            <p>店名：    {{ $post->name }}</p>
                            <p>エリア：  {{ $post->area }}</p>
                            <p>ジャンル：{{ $post->genre }}</p>
                            <span class="like-count">いいね：{{ $post->likes->count() }}</span>
                            <a href="{{ route('detail', $post->id) }}"></a>
                        </div>
                    </div>
                @endforeach
            </div>
    </main>
</body>
</html>
