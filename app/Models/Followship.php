<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followship extends Model
{
    use HasFactory;

    protected $table = 'followships';

    protected $fillable = [
        'user_id',
        'follow_id',
    ];

}
