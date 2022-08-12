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
        DB::table('tbl_settings')->insert([
            'id'=>1,
            'logo' =>'adsdasdsa',
            'contact_information' => '9841324566',
            'office_location' => 'Balkumari, Lalitpur',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
