<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConferenceContent extends Model
{
    protected $fillable = ['image', 'location', 'date_time', 'speakers_text', 'seats_text'];
}
