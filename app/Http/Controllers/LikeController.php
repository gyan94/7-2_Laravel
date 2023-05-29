<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;



class LikeController extends Controller
{
    // いいねボタン表示場所
    public function show_like($postId)
    {
        $post = Post::withCount('likes')->findOrFail($postId);

        return view('resto.detail',compact('post'));
    }


    public function index()
    {
        // いいね一覧用
        $userId = auth()->id();
        $likedPosts = Post::join('likes', 'posts.id', '=', 'likes.post_id')
                ->where('likes.user_id', $userId)
                ->select('posts.*')
                ->get();
        $likedPosts = Post::whereHas('likes')->with('user')->paginate(20);


        //dd($likedPosts);
        return view('resto.like', compact('likedPosts'));
    }

}
