<?php

namespace App\Models;

use App\Traits\UUID;
use App\Casts\DateReadCast;
use App\Casts\MakePointsCast;
use App\Builders\SharedBuilder;
use App\Builders\ReadingBuilder;
use App\ValueObjects\Date;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'created_at' => DateReadCast::class,
        // 'points' => MakePointsCast::class, #when they are related
    ];

    // protected $appends = ['date_read'];

    // protected function dateRead(): Attribute
    // {
    //     return  Attribute::make(
    //         get: fn ($value,$attributes) => Date::readable($attributes['created_at']),
    //     );
    // }

    public function newEloquentBuilder($query): ReadingBuilder
    {
        return new ReadingBuilder($query);
    }
}
