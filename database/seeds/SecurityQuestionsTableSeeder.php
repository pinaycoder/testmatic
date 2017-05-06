<?php

use Illuminate\Database\Seeder;

class SecurityQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$questions = [
    						'What is your favorite basketball team?',
    						'What was your childhood nickname?',
    						'What is your pet\'s name?',
    						'What was your favorite sport in high school?',
    						'What was your favorite food as a child?',
    						'What is your oldest sibling\'s birthday month and year (e.g. January 1900)?',
    						'In what town was your first job?',
    						'What was the name of the company where you had your first job?',
    						'What is your youngest sibling\'s birthday?',
    						'What is your maternal grandmother\'s maiden name?'
    					];

    	foreach($questions as $question){
    		DB::table('security_questions')->insert(['question' => $question]);
    	}
        
    }
}
