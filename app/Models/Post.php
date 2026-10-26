<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /** @var string */
    protected $table = 'posts';

    /** @var array */
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'category',
        'status',
        'sort',
    ];

    /** @var array */
    protected $casts = [
        'status' => 'integer',
    ];
}