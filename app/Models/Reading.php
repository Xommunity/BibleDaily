<?php

namespace App\Models;

use App\Builders\ReadingBuilder;
use App\Builders\SharedBuilder;
use App\Casts\MakePointsCast;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reading extends SharedModel
{
    use HasFactory;
    use UUID;

    protected $fillable = [
        'read',
        'notes',
        'prayer_points',
        'prayer',
        'bible_session_id'
    ];

    protected $casts = [
        'prayer_points' => MakePointsCast::class,
        'notes' => MakePointsCast::class,
    ];

    public function newEloquentBuilder($query): ReadingBuilder
    {
        return new ReadingBuilder($query);
    }
}
