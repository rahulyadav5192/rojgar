<?php

require __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Blog;

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

Blog::create([
    'title' => 'Register for Job Fairs Near You',
    'slug' => 'register-for-job-fairs-near-you',
    'body' => '<p>This is a test blog post for job fairs. Here you will find information about upcoming job fairs and how to register.</p>',
    'author' => 'Admin',
    'published_at' => now(),
]);

echo "Test blog created with slug 'register-for-job-fairs-near-you'.\n";
