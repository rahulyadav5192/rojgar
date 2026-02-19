<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CounterContent extends Model
{
    protected $fillable = ['speakers_count', 'seats_count', 'sponsors_count', 'sessions_count'];

    protected function casts(): array
    {
        return [
            'speakers_count' => 'integer',
            'seats_count' => 'integer',
            'sponsors_count' => 'integer',
            'sessions_count' => 'integer',
        ];
    }
}
