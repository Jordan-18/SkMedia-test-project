<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'roles' => 'ADMIN',
                'password' => '$2y$10$IB0YqMdgcU9P5vtBpj92/.1MKgLd3Ci49RjLPyd486sHo/V/Kwo9y',
                'slug' => 'admin',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'roles' => 'ADMIN',
                'password' => '$2y$10$kfVGCPRABAphozWlZcRQ0eL9mx46CBItVAAMt6udcPwIBT/XvWpwm',
                'slug' => 'user',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'tes',
                'email' => 'tes@gmail.com',
                'roles' => 'APPROVER',
                'password' => '$2y$10$kfVGCPRABAphozWlZcRQ0eL9mx46CBItVAAMt6udcPwIBT/XvWpwm',
                'slug' => 'tes',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'sekawan',
                'email' => 'sekawan@gmail.com',
                'roles' => 'APPROVER',
                'password' => '$2y$10$kfVGCPRABAphozWlZcRQ0eL9mx46CBItVAAMt6udcPwIBT/XvWpwm',
                'slug' => 'sekawan',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        DB::table('users')->insert($users);
    }
}
