<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'owner',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'user',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
