<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            ['name' => 'Africa', 'code' => 'AF', 'active' => 1],
            ['name' => 'Antarctica', 'code' => 'AN', 'active' => 1],
            ['name' => 'Asia', 'code' => 'AS', 'active' => 1],
            ['name' => 'Australia', 'code' => 'AU', 'active' => 1],
            ['name' => 'Europe', 'code' => 'EU', 'active' => 1],
            ['name' => 'North America', 'code' => 'NA', 'active' => 1],
            ['name' => 'South America', 'code' => 'SA', 'active' => 1],
        ];
        foreach ($regions as $key => $value) {
            $value['name'] = strtoupper($value['name']);
            Region::create($value);
        }
    }
}
