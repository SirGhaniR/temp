<?php

namespace Database\Seeders;

use App\Models\CurriculumItem;
use Illuminate\Database\Seeder;

class CurriculumItemSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'title' => 'Web Development',
                'description' => 'HTML, CSS, JavaScript, and industry frameworks like Laravel & Express for backend; Vue, React for frontend.',
                'order' => 1,
            ],
            [
                'title' => 'Mobile Development',
                'description' => 'Ship real apps across platforms with Flutter, React Native, or Kotlin. From prototype to store.',
                'order' => 2,
            ],
            [
                'title' => 'Game Development',
                'description' => 'Design game logic, create 2D/3D assets, and build your own game with modern game engines.',
                'order' => 3,
            ],
        ];

        foreach ($rows as $row) {
            CurriculumItem::updateOrCreate(['title' => $row['title']], $row);
        }
    }
}
