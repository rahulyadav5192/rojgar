<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EventRegistration extends Model
{
    protected $fillable = [
        'event_id',
        'process',
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
        'passport_image',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function getResumeUrlAttribute(): ?string
    {
        if (! $this->resume) {
            return null;
        }

        if (Str::startsWith($this->resume, ['http://', 'https://'])) {
            return $this->resume;
        }

        if (Str::startsWith($this->resume, ['uploads/', 'assets/'])) {
            return asset($this->resume);
        }

        return asset('storage/'.$this->resume);
    }

    public function getResumeIsImageAttribute(): bool
    {
        if (! $this->resume) {
            return false;
        }

        $extension = strtolower(pathinfo($this->resume, PATHINFO_EXTENSION));

        return in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'], true);
    }
}
