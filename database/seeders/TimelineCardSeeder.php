<?php

namespace Database\Seeders;

use App\Models\TimelineCard;
use Illuminate\Database\Seeder;

class TimelineCardSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            // projects section
            ['step' => 1, 'headline' => 'Headline', 'description' => null, 'link' => null, 'order' => 1],
            ['step' => 1, 'headline' => 'Headline', 'description' => null, 'link' => null, 'order' => 2],
            ['step' => 1, 'headline' => 'Headline', 'description' => null, 'link' => null, 'order' => 3],
            ['step' => 1, 'headline' => 'Headline', 'description' => null, 'link' => null, 'order' => 4],

            // deploy section
            ['step' => 2, 'headline' => 'Headline', 'description' => null, 'link' => null, 'order' => 1],
            ['step' => 2, 'headline' => 'Headline', 'description' => null, 'link' => null, 'order' => 2],
            ['step' => 2, 'headline' => 'Headline', 'description' => null, 'link' => null, 'order' => 3],
        ];

        foreach ($rows as $row) {
            TimelineCard::updateOrCreate(
                ['step' => $row['step'], 'order' => $row['order']],
                $row
            );
        }
    }
}
