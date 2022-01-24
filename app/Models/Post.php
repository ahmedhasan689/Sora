<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'content',
        'image_path',
        'category_id'
    ];

    // Relation
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'post_id')->withDefault();
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id')->withDefault();
    }

    public function board() {
        return $this->belongsToMany(Board::class, 'board_post');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }


}
