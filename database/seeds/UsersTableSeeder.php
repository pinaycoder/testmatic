<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_superadmin = Role::where('name', 'Super Administrator')->first();
        $role_admin  = Role::where('name', 'Test Admin')->first();
        $role_participant  = Role::where('name', 'Test Participant')->first();

        $user = new User();

        $user->username = 'superadmin@gmail.com';
        $user->password = Hash::make('test123');
        $user->first_name = 'Test';
        $user->middle_name = '123';
        $user->last_name = 'Super Admin 1';
        $user->email = 'superadmin@gmail.com';
        $user->contact_num = '+639217271881';
        $user->question_id_1 = 2;
        $user->question_ans_1 = 'Test Answer 1';
        $user->question_id_2 = 2;
        $user->question_ans_2 = 'Test Answer 2';
        $user->gender = 'Female';
        $user->role = 'Super Administrator';
        $user->birthdate = '1992-04-25';
        $user->created_date = Carbon::now();
        $user->modified_date = Carbon::now();
        $user->save();
        $user->roles()->attach($role_superadmin);


        $user2 = new User();

        $user2->username = 'testparticipant@gmail.com';
        $user2->password = Hash::make('test123');
        $user2->first_name = 'Test';
        $user2->middle_name = '123';
        $user2->last_name = 'testparticipant@gmail.com';
        $user2->email = 'testparticipant@gmail.com';
        $user2->contact_num = '+639217271881';
        $user2->question_id_1 = 2;
        $user2->question_ans_1 = 'Test Answer 1';
        $user2->question_id_2 = 2;
        $user2->question_ans_2 = 'Test Answer 2';
        $user2->gender = 'Female';
        $user2->role = 'Test Participant';
        $user2->birthdate = '1992-04-25';
        $user2->created_date = Carbon::now();
        $user2->modified_date = Carbon::now();
        $user2->save();
        $user2->roles()->attach($role_participant);

        $user3 = new User();

        $user3->username = 'testadmin@gmail.com';
        $user3->password = Hash::make('test123');
        $user3->first_name = 'Test';
        $user3->middle_name = '123';
        $user3->last_name = 'testadmin@gmail.com';
        $user3->email = 'testadmin@gmail.com';
        $user3->contact_num = '+639217271881';
        $user3->question_id_1 = 2;
        $user3->question_ans_1 = 'Test Answer 1';
        $user3->question_id_2 = 2;
        $user3->question_ans_2 = 'Test Answer 2';
        $user3->gender = 'Female';
        $user3->role = 'Test Administrator';
        $user3->birthdate = '1992-04-25';
        $user3->created_date = Carbon::now();
        $user3->modified_date = Carbon::now();
        $user3->save();
        $user3->roles()->attach($role_admin);


        /**for($i = 1; $i <= 5; $i++){
	        DB::table('users')->insert([
	            'username' => 'superadmin' . $i . '@gmail.com',
                'password' => Hash::make('test123'),
                'first_name' => 'Test',
                'middle_name' => 'Name ' . $i,
                'last_name' => 'Test Last Name',
                'email' => 'superadmin' . $i . '@gmail.com',
                'contact_num' => '+639217271881',
                'question_id_1' => 2,
                'question_ans_1' => 'Test Answer 1',
                'question_id_2' => 2,
                'question_ans_2' => 'Test Answer 2',
                'gender' => 'Female',
                'role' => 'Super Administrator',
                'birthdate' => '1992-04-25',
                'created_date' => Carbon::now(),
                'modified_date' => Carbon::now()
	        ]);
    	}

        for($i = 6; $i <= 10; $i++){
            DB::table('users')->insert([
                'username' => 'testadmin' . ($i - 5) . '@gmail.com',
                'password' => Hash::make('test123'),
                'first_name' => 'Test',
                'middle_name' => 'Name ' . $i,
                'last_name' => 'Test Last Name',
                'email' => 'testadministrator' . ($i - 5)  . '@gmail.com',
                'contact_num' => '+639217271881',
                'question_id_1' => 2,
                'question_ans_1' => 'Test Answer 1',
                'question_id_2' => 2,
                'question_ans_2' => 'Test Answer 2',
                'gender' => 'Male',
                'role' => 'Test Administrator',
                'birthdate' => '1992-04-25',
                'created_date' => Carbon::now(),
                'modified_date' => Carbon::now(),
                'confirmation_token' => str_random(15)
            ]);
        }

        for($i = 11; $i <= 15; $i++){
            DB::table('users')->insert([
                'username' => 'testparticipant' . ($i - 10) . '@gmail.com',
                'password' => Hash::make('test123'),
                'first_name' => 'Test',
                'middle_name' => 'Name ' . $i,
                'last_name' => 'Test Last Name',
                'email' => 'testparticipant' . ($i - 10) . '@gmail.com',
                'contact_num' => '+639217271881',
                'question_id_1' => 2,
                'question_ans_1' => 'Test Answer 1',
                'question_id_2' => 2,
                'question_ans_2' => 'Test Answer 2',
                'gender' => 'Female',
                'role' => 'Test Participant',
                'birthdate' => '1992-04-25',
                'created_date' => Carbon::now(),
                'modified_date' => Carbon::now(),
                'confirmation_token' => str_random(15)
            ]);
        }**/
    }
}
