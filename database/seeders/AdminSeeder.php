<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name'      => 'admin',
            'email'     => 'admin@admin.com',
            'password'  => bcrypt('adminadmin'),
            'role'      => 'admin',
        ]);
    }
}
