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
        $regions =
            [
                ['active' => 1, 'name' => 'Africa', 'code' => ''],
                ['active' => 1, 'name' => 'Asia', 'code' => ''],
                ['active' => 1, 'name' => 'Europe', 'code' => ''],
                ['active' => 1, 'name' => 'North America', 'code' => ''],
                ['active' => 1, 'name' => 'Oceania', 'code' => ''],
                ['active' => 1, 'name' => 'South America', 'code' => '']


            ];
        foreach ($regions as $key => $value) {
            $value['name'] = strtoupper($value['name']);
            Region::create($value);
        }
    }
}
