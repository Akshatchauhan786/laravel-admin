<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'category',
        'author',
        'published_date',
        'reading_time',
        'content'
    ];

    protected $casts = [
        'tags' => 'array',
    ];
}
