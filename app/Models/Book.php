<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'author', 'name', 'count', 'short_description', 'img',
    ];
}
