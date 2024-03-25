<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title', 'content', 'user_id', 'file_path'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);           //Laten weten dat een post bij een User hoord
    }

    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'post_has_likes', 'post_id', 'user_id');
    }

    public function hasLiked(?User $user): bool
    {
        if($user)
        {
            return $this->likedByUsers()->where('user_id', $user->id)->exists();
        }
        return false;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}


