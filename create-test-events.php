<?php

use App\Models\Event;
use Illuminate\Support\Facades\DB;

// Create test events
DB::table('events')->truncate();

Event::create([
    'title' => 'Rozgaar Mahakumbh - Domestic Job Fair',
    'description' => 'Join us for India\'s largest integrated employment and placement initiative. Meet top employers and explore career opportunities.',
    'location' => 'Delhi Convention Center, Delhi',
    'image' => null,
    'start_date' => now()->addDays(5),
    'end_date' => now()->addDays(5),
    'timing' => '10:00 AM - 5:00 PM',
    'status' => 'published',
    'who_can_apply' => 'all',
    'featured' => true,
    'type' => 'Domestic',
]);

Event::create([
    'title' => 'International Recruitment Summit',
    'description' => 'Exciting opportunity to work with international companies. Networking event with visa sponsorship options for selected candidates.',
    'location' => 'Mumbai Business District, Mumbai',
    'image' => null,
    'start_date' => now()->addDays(10),
    'end_date' => now()->addDays(12),
    'timing' => '9:00 AM - 6:00 PM',
    'status' => 'published',
    'who_can_apply' => 'all',
    'featured' => true,
    'type' => 'International',
]);

Event::create([
    'title' => 'Tech Careers Expo 2026',
    'description' => 'Connect with leading IT and tech companies. Explore roles in software development, data science, and digital marketing.',
    'location' => 'Bangalore Tech Hub, Bangalore',
    'image' => null,
    'start_date' => now()->addDays(15),
    'end_date' => now()->addDays(15),
    'timing' => '10:00 AM - 4:00 PM',
    'status' => 'published',
    'who_can_apply' => 'all',
    'featured' => false,
    'type' => 'Domestic',
]);

echo "✓ Test events created successfully!\n";
echo "Events created: 3 (2 Domestic, 1 International)\n";
