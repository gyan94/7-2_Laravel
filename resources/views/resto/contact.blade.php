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
    <link rel="stylesheet" type="text/css" href="{{ asset('resto/contact.css') }}">
    <title>投稿画面</title>
</head>
<body>
    @include('resto.header')
    <div id="margin-top">
    <div class="container">
        <h1>投稿フォーム</h1>
          <form  method="post" enctype = "multipart/form-data">
          @csrf

    
          <label for="image">写真 @if ($errors->has('image')){{$errors->first('image')}}@endif</label>
          <input type="file" id="image" name="image">
    
          <label for="shop-name">お店の名前 @if ($errors->has('name')){{$errors->first('name')}}@endif</label>
          <input type="text" id="shop-name" name="name" placeholder="必須" value="{{ old('name') }}">
    
          <label for="genre">ジャンル @if ($errors->has('genre')){{$errors->first('genre')}}@endif</label>
          <select id="genre" name="genre">
            <option value="">ジャンルを選択してください</option>
            @foreach ($genres as $genre)
            <option value="{{ $genre }}" {{ old('genre') === $genre ? 'selected' : '' }}>{{ $genre }}</option>
            @endforeach
          </select>
    
          <label for="area">エリア @if ($errors->has('area')){{$errors->first('area')}}@endif</label>
          <select id="area" name="area">
            <option value="">エリアを選択してください</option>
            @foreach ($areas as $area)
            <option value="{{ $area }}" {{ old('area') === $area ? 'selected' : '' }}>{{ $area }}</option>
            @endforeach
          </select>
    
          <label for="address">住所</label>
          <input type="text" id="address" name="address" placeholder="任意" value="{{ old('address') }}">
    
          <label for="comment">コメント @if ($errors->has('comment')){{$errors->first('comment')}}@endif</label>
          <textarea id="comment" name="comment" placeholder="必須">{{ old('comment') }}</textarea>
    
          <input type="submit" value="投稿" onclick="return confirm_contact()">

            <script>
            function confirm_contact() {
                var select = confirm("この内容で投稿してもよろしいですか？");
                    return select;
                    }
            </script>
        </form>
      </div>
    </div>
</body>
</html>


