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
                'item' => 'Label 777',
                'image' => 'label-777.jpeg',
                'stock' => 0,
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
