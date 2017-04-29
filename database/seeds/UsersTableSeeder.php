<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
                'username' => 'superadmin@gmail.com',
                'password' => Hash::make('test123'),
                'first_name' => 'Test',
                'middle_name' => '123',
                'last_name' => 'Super Admin 1',
                'email' => 'superadmin@gmail.com',
                'contact_num' => '+639217271881',
                'question_id_1' => 1,
                'question_ans_1' => 'Test Answer 1',
                'question_id_2' => 1,
                'question_ans_2' => 'Test Answer 2',
                'gender' => 'Female',
                'role' => 'Super Administrator',
                'birthdate' => '1992-04-25'
            ]);

        for($i = 1; $i <= 5; $i++){
	        DB::table('users')->insert([
	            'username' => 'superadmin' . $i . '@gmail.com',
                'password' => Hash::make('test123'),
                'first_name' => 'Test',
                'middle_name' => 'Name ' . $i,
                'last_name' => 'Test Last Name',
                'email' => 'superadmin' . $i . '@gmail.com',
                'contact_num' => '+639217271881',
                'question_id_1' => 1,
                'question_ans_1' => 'Test Answer 1',
                'question_id_2' => 1,
                'question_ans_2' => 'Test Answer 2',
                'gender' => 'Female',
                'role' => 'Super Administrator',
                'birthdate' => '1992-04-25'
	        ]);
    	}

        for($i = 6; $i <= 10; $i++){
            DB::table('users')->insert([
                'username' => 'testadmin_' . ($i - 5) . '@gmail.com',
                'password' => Hash::make('test123'),
                'first_name' => 'Test',
                'middle_name' => 'Name ' . $i,
                'last_name' => 'Test Last Name',
                'email' => 'testadministrator' . ($i - 5)  . '@gmail.com',
                'contact_num' => '+639217271881',
                'question_id_1' => 1,
                'question_ans_1' => 'Test Answer 1',
                'question_id_2' => 1,
                'question_ans_2' => 'Test Answer 2',
                'gender' => 'Male',
                'role' => 'Test Administrator',
                'birthdate' => '1992-04-25'
            ]);
        }

        for($i = 11; $i <= 15; $i++){
            DB::table('users')->insert([
                'username' => 'testparticipant_' . ($i - 10) . '@gmail.com',
                'password' => Hash::make('test123'),
                'first_name' => 'Test',
                'middle_name' => 'Name ' . $i,
                'last_name' => 'Test Last Name',
                'email' => 'testparticipant_' . ($i - 10) . '@gmail.com',
                'contact_num' => '+639217271881',
                'question_id_1' => 1,
                'question_ans_1' => 'Test Answer 1',
                'question_id_2' => 1,
                'question_ans_2' => 'Test Answer 2',
                'gender' => 'Female',
                'role' => 'Test Participant',
                'birthdate' => '1992-04-25'
            ]);
        }
    }
}
