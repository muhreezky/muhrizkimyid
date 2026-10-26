<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /** @var string */
    protected $fillable = [
        'title',
        'slug',
        'body',
        'excerpt',
        'published',
        'sort',
    ];

    /** @var array */
    protected $casts = [
        'published' => 'boolean',
    ];

    /** @var array */
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}