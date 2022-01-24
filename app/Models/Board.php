<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'post_id',
    ];


    // Relation
    public function user() {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function post() {
        return $this->belongsToMany(Post::class, 'board_post');
    }
}
