<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /** @var string */
    protected $fillable = [
        'title',
        'description',
        'technologies',
        'link',
        'image',
        'published',
        'sort',
    ];

    /** @var array */
    protected $casts = [
        'published' => 'boolean',
    ];
}