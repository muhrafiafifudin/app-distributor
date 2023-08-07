<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@agi.com',
            'password' => bcrypt('agi12345'),
            'created_at' => Carbon::now()
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Owner',
            'email' => 'owner@agi.com',
            'password' => bcrypt('agi12345'),
            'created_at' => Carbon::now()
        ]);

        $user->assignRole('owner');

        $user = User::create([
            'name' => 'Produksi',
            'email' => 'produksi@agi.com',
            'password' => bcrypt('agi12345'),
            'created_at' => Carbon::now()
        ]);

        $user->assignRole('user');
    }
}
