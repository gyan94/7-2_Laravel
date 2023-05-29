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
    <link rel="stylesheet" type="text/css" href="{{ asset('resto/edit.css') }}">
    <title>編集画面</title>
</head>
<body>
    @include('resto.header')
    <div>
    <div class="container">
        <h1>編集画面</h1>
          <form method="post" enctype = "multipart/form-data">
          @csrf
    
          <label for="image">写真 @if ($errors->has('image')){{$errors->first('image')}}@endif</label>
          <input type="file" id="image" name="image">

    
          <label for="shop-name">お店の名前 @if ($errors->has('name')){{$errors->first('name')}}@endif</label>
          <input type="text" id="shop-name" name="name" placeholder="必須" value="{{ data_get($date,'name') }}">
    

          <label for="genre">ジャンル @if ($errors->has('genre')){{$errors->first('genre')}}@endif</label>
          <select id="genre" name="genre">
            <option value="">ジャンルを選択してください</option>
            @foreach ($genres as $genre)
            <option value="{{ $genre }}" {{ data_get($date,'genre') === $genre ? 'selected' : '' }}>{{ $genre }}</option>
            @endforeach
          </select>
    

          <label for="area">エリア @if ($errors->has('area')){{$errors->first('area')}}@endif</label>
          <select id="area" name="area">
            <option value="">エリアを選択してください</option>
            @foreach ($areas as $area)
            <option value="{{ $area }}" {{ data_get($date,'area') === $area ? 'selected' : '' }}>{{ $area }}</option>
            @endforeach
          </select>
    

          <label for="address">住所</label>
          <input type="text" id="address" name="address" placeholder="任意" value="{{ data_get($date,'address') }}">
    

          <label for="comment">コメント @if ($errors->has('comment')){{$errors->first('comment')}}@endif</label>
          <textarea id="comment" name="comment" placeholder="必須">{{ data_get($date,'comment') }}</textarea>
    

          <input type="submit" value="投稿" onclick="return confirm_contact()">

            <script>
            function confirm_contact() {
                var select = confirm("この内容で編集してもよろしいですか？");
                    return select;
                    }
            </script>
        </form>
      </div>
    </div>
</body>
</html>



{{-- 
<option>エリアを選択してください</option>
            <option value="0">北海道</option>
            <option value="1">青森県</option>
            <option value="2">岩手県</option>
            <option value="3">宮城県</option>
            <option value="4">秋田県</option>
            <option value="5">山形県</option>
            <option value="6">福島県</option>
            <option value="7">茨城県</option>
            <option value="8">栃木県</option>
            <option value="9">群馬県</option>
            <option value="10">埼玉県</option>
            <option value="11">千葉県</option>
            <option value="12">東京都</option>
            <option value="13">神奈川県</option>
            <option value="14">新潟県</option>
            <option value="15">富山県</option>
            <option value="16">石川県</option>
            <option value="17">福井県</option>
            <option value="18">山梨県</option>
            <option value="19">長野県</option>
            <option value="20">岐阜県</option>
            <option value="21">静岡県</option>
            <option value="22">愛知県</option>
            <option value="23">三重県</option>
            <option value="24">滋賀県</option>
            <option value="25">京都府</option>
            <option value="26">大阪府</option>
            <option value="27">兵庫県</option>
            <option value="28">奈良県</option>
            <option value="29">和歌山県</option>
            <option value="30">鳥取県</option>
            <option value="31">島根県</option>
            <option value="32">岡山県</option>
            <option value="33">広島県</option>
            <option value="34">山口県</option>
            <option value="35">徳島県</option>
            <option value="36">香川県</option>
            <option value="37">愛媛県</option>
            <option value="38">高知県</option>
            <option value="39">福岡県</option>
            <option value="40">佐賀県</option>
            <option value="41">長崎県</option>
            <option value="42">熊本県</option>
            <option value="43">大分県</option>
            <option value="44">宮崎県</option>
            <option value="45">鹿児島県</option>
            <option value="46">沖縄県</option> 


        <option value="">ジャンルを選択してください</option>
            <option value="0">日本料理</option>
            <option value="1">イタリアン</option>
            <option value="2">洋食</option>
            <option value="3">中華</option>
            <option value="4">カフェ</option>
            <option value="5">スイーツ</option>
            <option value="6">カフェ・喫茶店</option>
            <option value="7">居酒屋</option>
            <option value="8">焼肉</option>
            <option value="9">海鮮</option>
            <option value="10">麺類</option>
            <option value="11">その他</option> --}}