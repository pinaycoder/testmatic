<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
                'name' => 'Super Administrator'
            ]);

        DB::table('roles')->insert([
                'name' => 'Test Administrator'
            ]);

        DB::table('roles')->insert([
                'name' => 'Test Participant'
            ]);
    }
}
