<?php

namespace Database\Seeders;

use App\Models\AboutContent;
use App\Models\ConferenceContent;
use App\Models\CounterContent;
use App\Models\Speaker;
use App\Models\WhySection;
use Illuminate\Database\Seeder;

class HomeContentSeeder extends Seeder
{
    public function run(): void
    {
        AboutContent::firstOrCreate(['id' => 1], [
            'title' => 'About The Conference',
            'description' => '<p>In a rapidly evolving global economy, Rozgaar Mahakumbh emerges as Uttar Pradesh\'s largest integrated employment and placement initiative conceived to bridge the widening chasm between potential and opportunity.</p>
<p>Orchestrated by BCS Consulting Pvt. Ltd., this landmark movement is driven by a singular purpose: to make employment accessible, meaningful, and future-ready. More than a job fair, Rozgaar Mahakumbh is a structured platform designed to connect ambition with opportunity and translate policy intent into real livelihoods.</p>
<p>At the heart of this initiative lies Uttar Pradesh. With its immense demographic dividend, the state stands as the ideal launchpad for India\'s employment-driven growth. Rozgaar Mahakumbh serves as a clarion call to employers, institutions, and communities to unlock India\'s human capital and collectively propel Uttar Pradesh towards becoming the Employment Capital of India.</p>
<ul>
<li>Largest integrated employment &amp; placement initiative in UP</li>
<li>Orchestrated by BCS Consulting Pvt. Ltd.</li>
<li>Making employment accessible, meaningful &amp; future-ready</li>
<li>Connecting ambition with opportunity</li>
<li>Towards Uttar Pradesh as the Employment Capital of India</li>
</ul>',
        ]);

        ConferenceContent::firstOrCreate(['id' => 1], [
            'image' => null,
            'location' => 'Maria Hall, NY, USA',
            'date_time' => '10am - 7pm, 15th Oct',
            'speakers_text' => '25 Professionals',
            'seats_text' => '100 People',
        ]);

        WhySection::firstOrCreate(['id' => 1], [
            'title' => 'Why You Should Join?',
            'description' => 'Register for free, submit your CV, and connect directly with employers. Your next job opportunity is one step away.',
            'card1_title' => 'Register Online',
            'card1_desc' => 'Sign up for the job fair in minutes. Free registration for all job seekers.',
            'card2_title' => 'Submit Your CV',
            'card2_desc' => 'Upload your resume so employers can find and shortlist you for roles.',
            'card3_title' => 'Meet Employers',
            'card3_desc' => 'Connect with hiring companies and recruiters from various industries.',
            'card4_title' => 'Get Shortlisted',
            'card4_desc' => 'Stand out with your profile and get called for interviews.',
            'card5_title' => 'One-on-One Sessions',
            'card5_desc' => 'Talk directly to recruiters and discuss opportunities.',
            'card6_title' => 'Land Your Dream Job',
            'card6_desc' => 'Take the next step in your career with real job offers.',
        ]);

        CounterContent::firstOrCreate(['id' => 1], [
            'speakers_count' => 42,
            'seats_count' => 800,
            'sponsors_count' => 24,
            'sessions_count' => 56,
        ]);

        if (Speaker::count() === 0) {
            $speakers = [
                ['name' => 'JONATHON DOE', 'designation' => 'Product Designer, Tesla'],
                ['name' => 'Patric Green', 'designation' => 'Front-end Developer'],
                ['name' => 'Paul Kowalsy', 'designation' => 'Lead Designer, TNW'],
                ['name' => 'Jhon Doe', 'designation' => 'Back-end Developer, ASUS'],
                ['name' => 'Daryl Dixon', 'designation' => 'Full-stack Developer, Google'],
                ['name' => 'Chris Adams', 'designation' => 'UI Designer, Apple'],
            ];
            foreach ($speakers as $i => $s) {
                Speaker::create([
                    'name' => $s['name'],
                    'designation' => $s['designation'],
                    'image' => null,
                    'sort_order' => $i + 1,
                ]);
            }
        }
    }
}
