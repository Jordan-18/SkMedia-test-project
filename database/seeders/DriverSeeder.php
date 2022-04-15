<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $driver = [
            [
                'name' => 'Sutisna',
                'NomorHp' => '6281515440667',
                'url' => 'https://img.icons8.com/color/344/driver.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Ahmad',
                'NomorHp' => '6281515440667',
                'url' => 'https://img.icons8.com/bubbles/344/driver.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Maya',
                'NomorHp' => '6281515440667',
                'url' => 'https://img.icons8.com/external-flaticons-lineal-color-flat-icons/344/external-driver-professions-flaticons-lineal-color-flat-icons.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Celya',
                'NomorHp' => '6281515440667',
                'url' => 'https://img.icons8.com/external-flaticons-lineal-color-flat-icons/344/external-driver-motor-sports-flaticons-lineal-color-flat-icons-17.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

        ];
        DB::table('drivers')->insert($driver);
    }
}
