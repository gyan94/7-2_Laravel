
## 概要
Laravel8で飲食店情報共有・口コミサイトを作成

以下3つのユーザーが存在

【管理者】
投稿機能・投稿記事の詳細閲覧・検索機能・いいね機能・全ての投稿記事を編集、削除機能が利用可能

【会員ユーザー】
投稿機能・投稿記事の詳細閲覧・検索機能・いいね機能・自分の投稿記事のみ編集、削除機能が利用可能

【ゲスト】
投稿記事の閲覧のみ


## 使い方

アカウント作成で会員登録<br>
↓<br>
ログイン後ホーム画面へ<br>
↓<br>
・投稿記事クリックで詳細　→　いいねを押したら、いいねリストに追加<br>
・投稿する　→　お店の登録<br>
・投稿履歴　→　自分の投稿した記事のみ表示<br>
・いいね一覧　→　いいねした記事のみ表示<br>
・検索 →　エリアorジャンルを選択して検索　→　該当する投稿記事のみ表示<br>


## 環境
PHP8.2<br>
Laravel8.7<br>
MySQL<br>
phpMyAdmin<br>
XAMPP<br>


## データベース

データベース名：resto

テーブル：app\database\migrations　参照
