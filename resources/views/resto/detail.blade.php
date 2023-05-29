
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('resto/detail.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('resto/header.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>詳細画面</title>
</head>
<body>
    <main class="sns-style-1">
        @include('resto.header')
        <div id="container">
        <div class="post-details">
            <div class="post-image">
                <img id="pic" src="{{ Storage::url($post->image) }}" alt="">
            </div>
            <table class="post-info">
                <tbody>
                    <tr><td class="info-row">投稿者: {{ $post->user->name }}</td></tr>
                    <tr><td class="info-row">投稿日: {{ $post->created_at }}</td></tr>
                    <tr><td class="info-row">店名: {{ $post->name }}</td></tr>
                    <tr><td class="info-row">ジャンル: {{ $post->genre }}</td></tr>
                    <tr><td class="info-row">エリア: {{ $post->area }}</td></tr>
                    <tr><td class="info-row">住所: {{ $post->address }}</td></tr>
                    <tr><td class="info-row">コメント:{{ $post->comment }}</td></tr>
                </tbody>
            </table>
            <div class="post-actions">
                <button class="like-button {{ $post->likes->contains('user_id', auth()->id()) ? 'liked' : '' }}" data-post-id="{{ $post->id }}">
                    <span class="material-icons like-icon">
                        {{ $post->likes->contains('user_id', auth()->id()) ? 'いいね' : 'いいね' }}
                    </span>
                    <span class="like-text">
                        {{ $post->likes->contains('user_id', auth()->id()) ? '💓' : '💓' }}
                    </span>
                </button>
                <span class="like-count">{{ $post->likes->count() }}</span>
            </div>
        </div>
        <button onclick="history.back()" class="back-link" >戻る</button>
        </div>
    </main>
    
    
</body>


{{-- いいねボタン --}}
<script>
$(document).ready(function() {
    $('.like-button').click(function() {
        var postId = $(this).data('post-id');
        var button = $(this);
        var likeCount = button.siblings('.like-count');
        var liked = button.hasClass('liked');

        $.ajax({
            url: '/like/' + postId,
            type: 'POST',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (liked) {
                    button.removeClass('liked');
                    button.find('.like-icon').text('いいね');
                    button.find('.like-text').text('💓');
                } else {
                    button.addClass('liked');
                    button.find('.like-icon').text('いいね');
                    button.find('.like-text').text('💓');
                }
                likeCount.text(response.likeCount);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
});
</script>


</html>