<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RestoController;
use App\Http\Controllers\PasswordController;

use App\Http\Controllers\LoginWithGoogleController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
//use App\Http\View\Composers\LikeCountComposer;



Route::middleware(['guest'])->group(function () {

    // TOP画面表示
    Route::get('/', [AuthController::class, 'index'])->name('index');


    // ユーザ登録画面表示 // ユーザ登録処理
    Route::get('/signup', [AuthController::class, 'showRegister'])->name('showRegister');
    Route::post('/signup', [AuthController::class, 'store']);

    // ログイン画面表示 // ログイン処理
    Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
    Route::post('/login', [AuthController::class, 'Login'])->name('Login');

    
});


// ログイン後
Route::middleware(['auth'])->group(function () {
    
    // ホーム画面表示
    Route::get('/home', [AuthController::class, 'home'])->name('home');

    // 検索画面
    Route::get('/search',  [RestoController ::class, 'search'])->name('search');

    // ログアウト処理
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // 投稿画面表示・投稿処理
    Route::get('/contact', [RestoController ::class, 'show_contact'])->name('show_contact');
    Route::post('/contact', [RestoController::class, 'store']);

    // 詳細画面表示
    Route::get('/detail/{post}', [RestoController ::class, 'detail'])->name('detail');

    // 投稿履歴表示
    Route::get('/history', [RestoController ::class, 'history'])->name('history');

    // 編集画面表示・編集処理
    Route::get('/edit/{post}', [RestoController ::class, 'edit'])->name('edit');
    Route::post('/edit/{post}', [RestoController ::class, 'update']);

    // 削除処理 
    Route::delete('/delete/{post}', [RestoController ::class, 'destroy'])->name('delete');

    // いいね処理
    Route::get('/like/{postId}', [LikeController ::class, 'show_like'])->name('show_like');
    Route::post('/like/{postId}', [PostController::class, 'like'])->name('resto.like');
    
    // いいね一覧画面
    Route::get('/like', [LikeController::class, 'index'])->name('like');

    

    

});


// パスワードリセット関連
Route::prefix('password_reset')->name('password_reset.')->group(function () {
    Route::prefix('email')->name('email.')->group(function () {     
        // パスワードリセットメール送信フォームページ
        Route::get('/', [PasswordController::class, 'emailFormResetPassword'])->name('form');
        // メール送信処理
        Route::post('/', [PasswordController::class, 'sendEmailResetPassword'])->name('send');
        // メール送信完了ページ
        Route::get('/send_complete', [PasswordController::class, 'sendComplete'])->name('send_complete');
        });
    // パスワード再設定ページ
    Route::get('/edit', [PasswordController::class, 'edit'])->name('edit');
    // パスワード更新処理
    Route::post('/update', [PasswordController::class, 'update'])->name('update');
    // パスワード更新終了ページ
    Route::get('/edited', [PasswordController::class, 'edited'])->name('edited');
});


// API
Route::get('/login/google', [LoginWithGoogleController::class, 'redirectToGoogle']);
Route::get('/login/google/callback', [LoginWithGoogleController::class, 'handleGoogleCallback']);


