<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'site_name'     => 'Site Name',
            'email'         => 'email@email.com',
            'image'         => 'Image',
            'facebook_url'  => 'facebook url',
            'instagram_url' => 'instagram url',
            'linkedin_url'  => 'linkedin url',
            'twitter_url'   => 'twitter url',
            'phone'         => '0123456789',
            'location'      => 'location',
            'site_name_ar'  => 'Site Name AR',
            'location_ar'   => 'location ar',
        ]);
    }
}
