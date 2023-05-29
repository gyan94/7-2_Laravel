<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('resto/email_send.css') }}">
    <title>パスワード再設定メール送信フォーム</title>
</head>
<body>
    <div class="container">
        <h1 class="title">パスワード再設定メール送信フォーム</h1>
        <form class="form" method="POST" action="{{ route('password_reset.email.send') }}">
            @csrf
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button class="button">再設定用メールを送信</button>
        </form>
        <a href="{{ route('showLogin') }}" class="link">戻る</a>
    </div>
</body>
</html>
