<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            [
                'supplier' => 'PT. Swatama Karya Gemilang ',
                'created_at' => Carbon::now(),
            ],
            [
                'supplier' => 'PT. Graha Media Raya',
                'created_at' => Carbon::now(),
            ],
            [
                'supplier' => 'CV. Astro Teknindo',
                'created_at' => Carbon::now(),
            ],
            [
                'supplier' => 'Mas Comodos Utama Label',
                'created_at' => Carbon::now(),
            ],
            [
                'supplier' => 'Metal Fastindo Abadi',
                'created_at' => Carbon::now(),
            ],
            [
                'supplier' => 'Aseli Garmen Jakarta',
                'created_at' => Carbon::now(),
            ],
            [
                'supplier' => 'PT. Kusuma Sandang Mekarjaya',
                'created_at' => Carbon::now(),
            ],
            [
                'supplier' => 'PT. Altra Multi Sandang',
                'created_at' => Carbon::now(),
            ],
            [
                'supplier' => 'PT. Pintex',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
