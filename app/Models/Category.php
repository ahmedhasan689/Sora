<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'category_name',
    ];

    public function images() {
        return $this->hasMany(Image::class, 'category_id');
    }

    public function posts() {
        return $this->hasMany(Post::class, 'post_id');
    }
}
