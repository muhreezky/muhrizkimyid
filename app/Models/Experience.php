<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Experience extends Model
{
    use AsSource, Attachable, Filterable, HasFactory;

    /** @var string */
    protected $table = 'experiences';

    /** @var array */
    protected $fillable = [
        'title',
        'company',
        'position',
        'start_date',
        'end_date',
        'current',
        'description',
        'sort',
    ];

    /** @var array */
    protected $casts = [
        'current' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
