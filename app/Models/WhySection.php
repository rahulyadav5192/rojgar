<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhySection extends Model
{
    protected $fillable = [
        'title', 'description',
        'card1_title', 'card1_desc', 'card2_title', 'card2_desc',
        'card3_title', 'card3_desc', 'card4_title', 'card4_desc',
        'card5_title', 'card5_desc', 'card6_title', 'card6_desc',
    ];
}
