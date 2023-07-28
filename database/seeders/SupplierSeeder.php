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
                'supplier' => 'Supplier 1',
                'created_at' => Carbon::now(),
            ],
            [
                'supplier' => 'Supplier 2',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
