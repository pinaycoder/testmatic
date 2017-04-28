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
        for($i = 1; $i <= 5; $i++){
	        DB::table('users')->insert([
	            'username' => 'username' . $i . '@gmail.com',
                'password' => Hash::make('test123'),
                'first_name' => 'Test',
                'middle_name' => 'Name ' . $i,
                'last_name' => 'Test Last Name',
                'email' => 'test' . $i . '@gmail.com',
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
                'username' => 'username' . $i . '@gmail.com',
                'password' => Hash::make('test123'),
                'first_name' => 'Test',
                'middle_name' => 'Name ' . $i,
                'last_name' => 'Test Last Name',
                'email' => 'test' . $i . '@gmail.com',
                'contact_num' => '+639217271881',
                'question_id_1' => 1,
                'question_ans_1' => 'Test Answer 1',
                'question_id_2' => 1,
                'question_ans_2' => 'Test Answer 2',
                'gender' => 'Male',
                'role' => 'Administrator',
                'birthdate' => '1992-04-25'
            ]);
        }

        for($i = 11; $i <= 15; $i++){
            DB::table('users')->insert([
                'username' => 'username' . $i . '@gmail.com',
                'password' => Hash::make('test123'),
                'first_name' => 'Test',
                'middle_name' => 'Name ' . $i,
                'last_name' => 'Test Last Name',
                'email' => 'test' . $i . '@gmail.com',
                'contact_num' => '+639217271881',
                'question_id_1' => 1,
                'question_ans_1' => 'Test Answer 1',
                'question_id_2' => 1,
                'question_ans_2' => 'Test Answer 2',
                'gender' => 'Female',
                'role' => 'Participant',
                'birthdate' => '1992-04-25'
            ]);
        }
    }
}
