<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            StatSeeder::class,
            WhyChooseCardSeeder::class,
            CurriculumItemSeeder::class,
            TimelineCardSeeder::class,
            PartnerSeeder::class,
        ]);
    }
}
