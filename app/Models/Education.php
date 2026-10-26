<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    /** @var string */
    protected $fillable = [
        'institution',
        'degree',
        'field_of_study',
        'start_date',
        'end_date',
        'current',
        'description',
        'sort',
    ];

    /** @var array */
    protected $casts = [
        'current' => 'boolean',
    ];

    /** @var array */
    protected $dates = [
        'start_date',
        'end_date',
    ];
}