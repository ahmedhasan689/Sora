<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'cookie_id',
        'image_id',
        'user_id',
        'quantity',
    ];

    protected $with = [
        'image',
    ];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

}
