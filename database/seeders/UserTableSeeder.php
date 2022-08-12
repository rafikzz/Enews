<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'super',
            'email' => 'super@admin.com',
            'password' => bcrypt('password'),
            'role' =>'superadmin',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role' =>'admin',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
            'role' =>'user',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
