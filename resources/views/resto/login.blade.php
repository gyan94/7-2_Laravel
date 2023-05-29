<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('resto/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('resto/gestheader.css') }}">
    <title>ログイン画面</title>
</head>
<body>
    @include("resto.gestheader")
    <main>
        <div class="container">
            <h2 id="login">ログイン</h2>
            <form action="{{ route('showLogin') }}" method="post">
                @csrf
                {{-- バリデーションエラー文 --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif  
                {{-- ログインエラー文 --}}
                {{-- <x-alert type="error" :session="session('login_error')"/> --}}

                <label for="email">メールアドレス:</label>
                <input type="text" id="email" name="email" >

                <label for="password">パスワード:</label>
                <input type="password" id="password" name="password">

                <button type="submit">ログイン</button>
            </form>

            <div id="google">
                <a href="{{ url('login/google') }}">
                  <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
                </a>
            </div>

            <div class="signup">
                <p><a href="{{ route('showRegister') }}">アカウント作成はこちら</a></p>
            </div>

            <div class="signup">
                <p><a href="{{ route('password_reset.email.form') }}">パスワード変更はこちら</a></p>
            </div>
            
        </div>
        
    </main>
</body>
</html>