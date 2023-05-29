<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Validation\Rule;
use App\Http\Requests\PostSaveRequest;
// いいね
use App\Models\Like;




class RestoController extends Controller
{

    // 投稿画面
    public function show_contact() 
    {
        
        return view('resto.contact');
    }

    /**
     * 投稿処理 
     */
    public function store(Request $request) 
    {
        $date = $request->validate([
            'image' => ['required', 'image', 'max:5000'],
            'name' => ['required', 'string', 'max:30'],
            'genre' => ['required'],
            'area' => ['required'],
            'address' => ['max:40'],
            'comment' => ['required', 'string', 'max:255'],
        ], [], [
            'image' => '',
            'name' => '',
            'genre' => '',
            'area' => '',
            'comment' => '',
        ]);

        // 画像ファイルの保存処理
        $date['image'] = $request->file('image')->store('posts', 'public');

        // 投稿時にuser_idを記録
        $request->user()->posts()->create($date);
        
        return redirect()->route('home');
    }

    

    /**
     * 詳細画面
     */
    public function  detail(Post $post) 
    {
        // $nice = Nice::where('post_id', $post->id)->where('user_id', $user)->first();,'posts','user','nice'
        return view('resto.detail', compact('post'));
    }





    /**
     * 投稿履歴画面
     */
    public function  history(Request $request) 
    {
        // 自分の投稿のみ表示
        // $posts = Post::where('user_id', Auth::id())->get();
        $posts = $request->user()->posts; // Model:Post posts()使用

        return view('resto.history', compact('posts'));
    }


    /**
     * 編集画面
     */
    public function edit(Post $post, Request $request) 
    {
        // 他ユーザー編集画面へのアクセス禁止
        if ($request->user()->isNot($post->user)) {
            // 他ユーザー編集画面へのアクセス禁止
            if ($request->user()->role != 1) {
                abort(403);
            }
        }

        $date = old() ?: $post;

        return view('resto.edit', compact('date'));
    }


    /**
     * 編集処理
     */
    public function update(Post $post, PostSaveRequest $request) 
    {
        // 他ユーザー編集画面へのアクセス禁止
        if ($request->user()->isNot($post->user)) {
            // 他ユーザー編集画面へのアクセス禁止
            if ($request->user()->role != 1) {
                abort(403);
            }
        }
        
        $date = $request->validated();

        if ($request->hasFile('image')) {
            // 更新時に古い画像を削除
            $post->deleteImgFile();
            $date['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($date);
        
        return redirect(route('history', $post));

    }


    /**
     * 削除処理
     */
    public function destroy(Post $post, Request $request) 
    {
        // 他ユーザー編集画面へのアクセス禁止
        if ($request->user()->isNot($post->user)) {
            // 他ユーザー編集画面へのアクセス禁止
            if ($request->user()->role != 1) {
                abort(403);
            }
        }

        // 画像はイベントにて削除 Models/Post参照

        $post->delete();

        return redirect('history');
    }


    // 検索処理
    public function search(Request $request)
    {
        $area = $request->input('area');
        $genre = $request->input('genre');

        $query = Post::query();


        // エリアorジャンル
        if ($area && $genre) {
            $query->where(function ($query) use ($area, $genre) {
                $query->where('area', $area)
                      ->orWhere('genre', $genre);
            });
        } elseif ($area) {
            $query->where('area', $area);
        } elseif ($genre) {
            $query->where('genre', $genre);
        }

        $posts = $query->get();


        return view('resto.search', compact('posts'));   
    }







}
