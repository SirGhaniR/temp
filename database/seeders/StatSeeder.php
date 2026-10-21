<?php

namespace Database\Seeders;

use App\Models\Stat;
use Illuminate\Database\Seeder;

class StatSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['label' => 'Ready for Work or University', 'value' => '92', 'suffix' => '%', 'order' => 1],
            ['label' => 'Partnership', 'value' => '50', 'suffix' => '+', 'order' => 2],
            ['label' => 'Project and Game created', 'value' => '100', 'suffix' => '+', 'order' => 3],
        ];

        foreach ($rows as $row) {
            Stat::updateOrCreate(['label' => $row['label']], $row);
        }
    }
}
