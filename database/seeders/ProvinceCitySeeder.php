<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = json_decode(file_get_contents(database_path('seeders/provinces_city.json')), true);

        foreach ($data as $provinceName => $cities) {
            $province = Province::create(['name' => $provinceName]);

            foreach ($cities as $cityName) {
                City::create([
                    'province_id' => $province->id,
                    'name' => $cityName,
                ]);
            }
    }
}
}
