<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;

class PostController extends Controller
{


    public function like(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        
        // いいねがあるかチェック
        $liked = $post->likes()->where('user_id', auth()->id())->exists();

        if ($liked) {
            // いいね解除
            $post->likes()->where('user_id', auth()->id())->delete();
        } else {
            // いいね追加
            $like = new Like();
            $like->user_id = auth()->id();
            $post->likes()->save($like);
        }

        // いいねのカウント
        $likeCount = $post->likes()->count();

        return response()->json([
            'liked' => !$liked,
            'likeCount' => $likeCount,
        ]);

//        return view('resto.index2', compact('likeCount'));
    }
}
