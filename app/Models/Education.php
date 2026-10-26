<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    /** @var string */
    protected $table = 'educations';

    /** @var array */
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
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}