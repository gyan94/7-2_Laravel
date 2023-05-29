<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('resto/gestheader.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('resto/register.css') }}">
    <title>ユーザー登録画面</title>
</head>
<body>
    @include("resto.gestheader")

    <div class="container">
        <h2 id="h2">アカウント作成</h2>
        <form method="post">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif  

            <label for="username">ユーザーネーム:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            
            <label for="email">メールアドレス:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            
            <label for="password">パスワード:</label>
            <input type="password" id="password" name="password">
            
            <label for="confirm_password">パスワード確認:</label>
            <input type="password" id="confirm_password" name="confirm_password">
            
            <button type="submit">登録</button>
        </form>
        {{-- Google登録 --}}
        <div id="google">
            <a href="{{ url('login/google') }}">
              <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
            </a>
        </div>
    </div>
</body>
</html>