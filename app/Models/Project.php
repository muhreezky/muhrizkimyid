<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /** @var string */
    protected $table = 'projects';

    /** @var array */
    protected $fillable = [
        'title',
        'description',
        'technologies',
        'repository',
        'demo_url',
        'sort',
    ];

    /** @var array */
    protected $casts = [
        'technologies' => 'array',
    ];
}