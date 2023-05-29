<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('resto/email_update.css') }}">
    <link rel="stylesheet" href="styles.css">
    <title>新しいパスワードを設定</title>
</head>
<body>
    <div class="container">
        <h1 class="title">新しいパスワードを設定</h1>
        <form class="form" method="POST" action="{{ route('password_reset.update') }}">
            @csrf
            <input type="hidden" name="reset_token" value="{{ $userToken->token }}">
            <div class="form-group">
                <label for="password" class="label">パスワード</label>
                <input type="password" name="password" class="input {{ $errors->has('password') ? 'incorrect' : '' }}">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
                @error('token')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="label">パスワードを再入力</label>
                <input type="password" name="password_confirmation" class="input {{ $errors->has('password_confirmation') ? 'incorrect' : '' }}">
            </div>
            <button class="button" type="submit">パスワードを再設定</button>
        </form>
    </div>
</body>
</html>
