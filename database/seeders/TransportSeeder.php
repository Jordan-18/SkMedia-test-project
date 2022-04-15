<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transports = [
            [
                'name' => 'Mobil 1',
                'jenis_kendaraan' => 'Penampung Orang',
                'Jumlah_bbm' => 4,
                'url' => 'https://img.icons8.com/office/344/car.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Truck',
                'jenis_kendaraan' => 'Penampung Barang',
                'Jumlah_bbm' => 6,
                'url' => 'https://img.icons8.com/office/344/truck.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Mobil 2',
                'jenis_kendaraan' => 'Penampung Orang',
                'Jumlah_bbm' => 2,
                'url' => 'https://img.icons8.com/office/344/car.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Plow Truck',
                'jenis_kendaraan' => 'Penampung Barang',
                'Jumlah_bbm' => 3,
                'url' => 'https://img.icons8.com/office/344/interstate-plow-truck.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Taxi',
                'jenis_kendaraan' => 'Penampung Orang',
                'Jumlah_bbm' => 3,
                'url' => 'https://img.icons8.com/office/344/taxi.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Transportation',
                'jenis_kendaraan' => 'Penampung Orang',
                'Jumlah_bbm' => 3,
                'url' => 'https://img.icons8.com/office/344/transportation.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'campground',
                'jenis_kendaraan' => 'Penampung Barang',
                'Jumlah_bbm' => 2,
                'url' => 'https://img.icons8.com/office/344/rv-campground.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Snow Plow Truck',
                'jenis_kendaraan' => 'Penampung Barang',
                'Jumlah_bbm' => 2,
                'url' => 'https://img.icons8.com/office/344/snow-plow-truck.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

        ];
        DB::table('transports')->insert($transports);
    }
}
