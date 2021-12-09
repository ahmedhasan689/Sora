<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image_path',
        'category_id',
        'user_id',
    ];






    // Relations
    public function user(){
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

}
