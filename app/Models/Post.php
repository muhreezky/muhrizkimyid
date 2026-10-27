<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Post extends Model
{
    use AsSource, Attachable, Filterable, HasFactory;

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
