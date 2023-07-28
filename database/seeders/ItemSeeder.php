<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'code' => 'B001',
                'item' => 'Benang Katun',
                'image' => 'benang-katun.jpeg',
                'stock' => 0,
                'created_at' => Carbon::now(),
            ],
            [
                'code' => 'B002',
                'item' => 'Benang Nylon',
                'image' => 'benang-nylon.jpeg',
                'stock' => 0,
                'created_at' => Carbon::now(),
            ],
            [
                'code' => 'B003',
                'item' => 'Benang Rajut',
                'image' => 'benang-rajut.jpeg',
                'stock' => 0,
                'created_at' => Carbon::now(),
            ],
            [
                'code' => 'B004',
                'item' => 'Dus Size 38',
                'image' => NULL,
                'stock' => 0,
                'created_at' => Carbon::now(),
            ],
            [
                'code' => 'B005',
                'item' => 'Dus Size 39',
                'image' => NULL,
                'stock' => 0,
                'created_at' => Carbon::now(),
            ],
            [
                'code' => 'B006',
                'item' => 'Dus Size 40',
                'image' => NULL,
                'stock' => 0,
                'created_at' => Carbon::now(),
            ],
            [
                'code' => 'B007',
                'item' => 'Dus Size 41',
                'image' => NULL,
                'stock' => 0,
                'created_at' => Carbon::now(),
            ],
            [
                'code' => 'B008',
                'item' => 'Dus Size 42',
                'image' => NULL,
                'stock' => 0,
                'created_at' => Carbon::now(),
            ],
            [
                'code' => 'B009',
                'item' => 'Label Size 38',
                'image' => NULL,
                'stock' => 0,
                'created_at' => Carbon::now(),
            ],
            [
                'code' => 'B010',
                'item' => 'Label Size 39',
                'image' => NULL,
                'stock' => 0,
                'created_at' => Carbon::now(),
            ],
            [
                'code' => 'B011',
                'item' => 'Label Size 40',
                'image' => NULL,
                'stock' => 0,
                'created_at' => Carbon::now(),
            ],
            [
                'code' => 'B012',
                'item' => 'Label Size 41',
                'image' => NULL,
                'stock' => 0,
                'created_at' => Carbon::now(),
            ],
            [
                'code' => 'B013',
                'item' => 'Label Size 42',
                'image' => NULL,
                'stock' => 0,
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
