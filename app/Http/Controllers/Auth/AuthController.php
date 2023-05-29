<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // 認証
use App\Models\User;
use App\Models\Post;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    // TOP画面
    public function index() 
    {
 
        $posts = Post::with('user')->get();

        return view('resto.index', compact('posts'));
    }

    // ホーム画面
    public function home() 
    {
        //$posts = Post::with('user')->get(); // Model:user()
        $posts = Post::all();
        $posts = Post::paginate(10);

        return view('resto.index2', compact('posts'));
    }

    // ログイン画面
    public function showLogin() 
    {

        return view('resto.login');
    }

    // ユーザ登録画面
    public function showRegister() 
    {
        return view('resto.register');
    }



    
    /**
     * ユーザ登録処理 
     */
    public function store(Request $request) 
    {
        $date = $request->validate([
            'name' => ['required', 'string', 'max:15'],
            'email' => ['required', 'email:filter', Rule::unique('users')],
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required']
        ], [], [
            // /lang/ja/validation.phpでも指定可
            'name' => 'ユーザーネーム',
            'confirm_password' => 'パスワードの確認'
        ]);

        $user = User::create([
            'name' => $date["name"],
            'email' => $date["email"],
            'password' => bcrypt($date["password"]),
        ]);

        // $request->dd();

        return redirect()->route('showLogin');
    }




     /**
     * ログイン機能
     */
    public function Login(LoginFormRequest $request) 
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // ログイン成功したらセッションを書き換える
            $request->session()->regenerate();
            // ログイン成功でindex2を渡す
            return redirect('home')->with('login_success','ログイン成功しました。');
        }

        // ログイン失敗でログイン画面に戻す
        return redirect()->route('showLogin')->withErrors([
            "login_error" => "メールアドレスかパスワードが間違っています。",
        ]); 
    }




    /**
     * ログアウト機能
     */
    public function logout(Request $request)
    {
        // ログアウト→セッション削除→セッション生成
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index')->with('logout','ログアウトしました');
    }




    


}
