<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'category_name',
        'type',
        'salable',
        'parent_id',
    ];



    // Relations
    public function childern()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id')->withDefault([
            'category_name' => 'It,s Parent',
        ]);
    }

    public function images() {
        return $this->hasMany(Image::class, 'category_id')->withDefault();
    }





}
