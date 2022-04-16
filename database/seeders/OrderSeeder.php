<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = [
            [
                'name' => 'imam',
                'nomor' => '0861661612',
                'id_admin' => 1,
                'id_transport' => 2,
                'id_driver' => 4,
                'id_approver' => 3,
                'awal_pinjam' => '2022-04-16 00:00:00',
                'akhir_pinjam' => '2022-04-22 00:00:00',
                'bbm_awal' => 3,
                'status' => 'PENDING',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Yusuf',
                'nomor' => '0861661612',
                'id_admin' => 1,
                'id_transport' => 2,
                'id_driver' => 2,
                'id_approver' => 3,
                'awal_pinjam' => '2022-04-16 00:00:00',
                'akhir_pinjam' => '2022-04-22 00:00:00',
                'bbm_awal' => 3,
                'status' => 'PENDING',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Ghifary',
                'nomor' => '62892446671',
                'id_admin' => 1,
                'id_transport' => 6,
                'id_driver' => 1,
                'id_approver' => 3,
                'awal_pinjam' => '2022-04-16 00:00:00',
                'akhir_pinjam' => '2022-04-22 00:00:00',
                'bbm_awal' => 5,
                'status' => 'PENDING',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Rizal',
                'nomor' => '62892446671',
                'id_admin' => 1,
                'id_transport' => 7,
                'id_driver' => 3,
                'id_approver' => 4,
                'awal_pinjam' => '2022-04-16 00:00:00',
                'akhir_pinjam' => '2022-04-22 00:00:00',
                'bbm_awal' => 2,
                'status' => 'PENDING',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            

        ];
        DB::table('orders')->insert($order);
    }
}
