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
    <link rel="stylesheet" type="text/css" href="{{ asset('resto/index2.css') }}">
    <title>Gourmet Memory グルメモリー</title>
</head>
@if (Auth::check() && Auth::user()->role == 1)
    <!-- 管理者専用 -->
    <body>
        <main>
            @include('resto.header')
            <div id="container">
            {{-- 検索ボックス --}}
            <div id="search-container" class="margin-top">
                <form id="search-form" action="{{ route('search') }}" method="GET">
                    @csrf
                    <div id ="search-box">
                        <div>
                            <select name="area">
                                <option value="選択されていません">エリアを選択してください</option>
                                @foreach ($areas as $area)
                                <option value="{{ $area }}">{{ $area }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <select name="genre">
                                <option value="選択されていません">ジャンルを選択してください</option>
                                @foreach ($genres as $genre)
                                <option value="{{ $genre }}">{{ $genre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="center">
                    <button type="submit">検索</button>
                    </div>
                </form> 
            </div>
    
            {{-- 投稿記事 --}}
            @foreach ($posts as $post)
                <div class="linkbox">
                    <div>
                        <div><img src="{{ Storage::url($post->image) }}" alt=""></div>
                        <a href="{{ route('detail', $post->id) }}"></a>
                    </div>
                    <div>
                        <p>投稿者：{{ $post->user->name }}  </p>
                        <p>店名：    {{ $post->name }}</p>
                        <p>エリア：  {{ $post->area }}</p>
                        <p>ジャンル：{{ $post->genre }}</p>
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
            <script>
                function confirm_delete() {
                    var select = confirm("本当に削除してもよろしいですか？");
                        return select;
                        }
            </script>
    
            
            {{-- ページング --}}
            <div class="pagination-container">
                <ul class="pagination">
                    @if ($posts->currentPage() > 1)
                        <li class="pagination-item">
                            <a href="{{ $posts->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    @endif
            
                    @for ($i = 1; $i <= $posts->lastPage(); $i++)
                        <li class="pagination-item {{ $i === $posts->currentPage() ? 'active' : '' }}">
                            <a href="{{ $posts->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
            
                    @if ($posts->hasMorePages())
                        <li class="pagination-item">
                            <a href="{{ $posts->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            </div>
        </main>
    </body>
    </html>

    @else
    <!-- 一般ユーザー -->
    <body>
        <main>
            @include('resto.header')
            <div id="container">
            {{-- 検索ボックス --}}
            <div id="search-container" class="margin-top">
                <form id="search-form" action="{{ route('search') }}" method="GET">
                    @csrf
                    <div id ="search-box">
                        <div>
                            <select name="area">
                                <option value="選択されていません">エリアを選択してください</option>
                                @foreach ($areas as $area)
                                <option value="{{ $area }}">{{ $area }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <select name="genre">
                                <option value="選択されていません">ジャンルを選択してください</option>
                                @foreach ($genres as $genre)
                                <option value="{{ $genre }}">{{ $genre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="center">
                    <button type="submit">検索</button>
                    </div>
                </form> 
            </div>
    
            {{-- 投稿記事 --}}
            @foreach ($posts as $post)
                <div class="linkbox">
                    <div>
                        <div><img src="{{ Storage::url($post->image) }}" alt=""></div>
                        <a href="{{ route('detail', $post->id) }}"></a>
                    </div>
                    <div>
                        <p>投稿者：{{ $post->user->name }}  </p>
                        <p>店名：    {{ $post->name }}</p>
                        <p>エリア：  {{ $post->area }}</p>
                        <p>ジャンル：{{ $post->genre }}</p>
                        <span class="like-count">いいね：💓{{ $post->likes->count() }}</span>
                        <a href="{{ route('detail', $post->id) }}"></a>
                    </div>
                </div>
            @endforeach
            <script>
                function confirm_delete() {
                    var select = confirm("本当に削除してもよろしいですか？");
                        return select;
                        }
            </script>
    
            
            {{-- ページング --}}
            <div class="pagination-container">
                <ul class="pagination">
                    @if ($posts->currentPage() > 1)
                        <li class="pagination-item">
                            <a href="{{ $posts->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    @endif
            
                    @for ($i = 1; $i <= $posts->lastPage(); $i++)
                        <li class="pagination-item {{ $i === $posts->currentPage() ? 'active' : '' }}">
                            <a href="{{ $posts->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
            
                    @if ($posts->hasMorePages())
                        <li class="pagination-item">
                            <a href="{{ $posts->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            </div>
        </main>
    </body>
    </html>
@endif





