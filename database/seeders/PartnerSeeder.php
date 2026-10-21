<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['name' => 'Partner One',   'website_url' => null, 'logo_path' => 'partners/placeholder-1.svg', 'order' => 1],
            ['name' => 'Partner Two',   'website_url' => null, 'logo_path' => 'partners/placeholder-2.svg', 'order' => 2],
            ['name' => 'Partner Three', 'website_url' => null, 'logo_path' => 'partners/placeholder-3.svg', 'order' => 3],
            ['name' => 'Partner Four',  'website_url' => null, 'logo_path' => 'partners/placeholder-4.svg', 'order' => 4],
        ];

        foreach ($rows as $row) {
            Partner::updateOrCreate(['name' => $row['name']], $row);
        }
    }
}
