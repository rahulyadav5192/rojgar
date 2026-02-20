<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    protected $fillable = [
        'event_id',
        'full_name',
        'gender',
        'aadhaar_number',
        'phone_number',
        'email_address',
        'college_university',
        'qualification',
        'referred_by',
        'has_certifications',
        'certifications_detail',
        'resume',
        'passport_number',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
