<?php

namespace Database\Seeders;

use App\Models\WhyChooseCard;
use Illuminate\Database\Seeder;

class WhyChooseCardSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'title' => 'AI-Driven & Industry-Aligned Curriculum',
                'description' => 'Learn the latest technologies relevant to today\'s startup landscape, from web development to artificial intelligence.',
                'order' => 1,
            ],
            [
                'title' => 'Developer-Standard Lab Facilities',
                'description' => 'Get hands-on experience using high-spec computers, high-speed internet, and a comfortable workspace.',
                'order' => 2,
            ],
            [
                'title' => 'Practitioner Mentors & Certifications',
                'description' => 'Receive direct guidance from experienced instructors and industry practitioners who will help you build a professional portfolio while still in school.',
                'order' => 3,
            ],
        ];

        foreach ($rows as $row) {
            WhyChooseCard::updateOrCreate(['title' => $row['title']], $row);
        }
    }
}
