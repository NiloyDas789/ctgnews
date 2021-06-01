<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','deleted_at','updated_at'];

    protected $casts = [
        'reporters' => 'array'
    ];
}