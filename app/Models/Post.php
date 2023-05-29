<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

class Post extends Authenticatable 
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'id',
        'image',
        'name',
        'genre',
        'area',
        'address',
        'comment',
        'user_id'
    ];
    // protected $guarded = [];


    // ユーザ名取得  元はuser
    public function user()
    {
        return $this->belongsTo(User::class);
    }



    // 画像削除処理
    protected static function booted()
    {
        static::deleting(function ($post) {
            $post->deleteImgFile();
        });
    }

    
    // 更新時に古い画像を削除
    public function deleteImgFile()
    {
        if ($this->image) {
            Storage::disk('public')->delete($this->image);
        }
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }


 




}