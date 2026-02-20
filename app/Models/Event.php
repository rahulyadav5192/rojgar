<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'location',
        'type',
        'image',
        'start_date',
        'end_date',
        'timing',
        'status',
        'who_can_apply',
        'featured',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'featured' => 'boolean',
        ];
    }

    public static function statusOptions(): array
    {
        return [
            'draft' => 'Draft',
            'published' => 'Published',
            'cancelled' => 'Cancelled',
        ];
    }

    public static function typeOptions(): array
    {
        return [
            'Domestic' => 'Domestic',
            'International' => 'International',
        ];
    }

    public static function whoCanApplyOptions(): array
    {
        return [
            'all' => 'All',
            'man' => 'Man',
            'woman' => 'Woman',
        ];
    }
}
