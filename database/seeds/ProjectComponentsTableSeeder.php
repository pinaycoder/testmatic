<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProjectComponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 30; $i++){
	        DB::table('project_components')->insert([
	        	'project_id' => $i,
	        	'order' => 1,
	            'name' => 'Project Question Component ' . $i,
	            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi non eros eget ipsum luctus ultrices. Sed eget finibus elit. Proin fringilla dui augue, sit amet pulvinar ex porttitor nec. Quisque nec arcu ut est sagittis faucibus in eget arcu. Proin in sagittis quam. In ut imperdiet metus. Suspendisse suscipit bibendum lectus, sed ultrices dui. Maecenas risus ligula, mattis vel dolor ac, vehicula ultrices metus. Donec nulla ligula, consectetur et volutpat at, placerat a enim. In dui metus, tristique gravida dui et, viverra accumsan ipsum. Nullam pellentesque lobortis lacus, tincidunt feugiat nibh placerat sit amet.',
	            'help_text' => 'Quisque nec arcu ut est sagittis faucibus in eget arcu. Proin in sagittis quam. In ut imperdiet metus.',
	            'selections' => 'A,B,C,D,E',
	            'type' => 'Question',
                'created_date' => Carbon::now(),
                'modified_date' => Carbon::now()
	        ]);
    	}

    for($i = 1; $i <= 30; $i++){
	        DB::table('project_components')->insert([
	        	'project_id' => $i,
	        	'order' => 2,
	            'name' => 'Project Scenario Component ' . $i,
	            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi non eros eget ipsum luctus ultrices. Sed eget finibus elit. Proin fringilla dui augue, sit amet pulvinar ex porttitor nec. Quisque nec arcu ut est sagittis faucibus in eget arcu. Proin in sagittis quam. In ut imperdiet metus. Suspendisse suscipit bibendum lectus, sed ultrices dui. Maecenas risus ligula, mattis vel dolor ac, vehicula ultrices metus. Donec nulla ligula, consectetur et volutpat at, placerat a enim. In dui metus, tristique gravida dui et, viverra accumsan ipsum. Nullam pellentesque lobortis lacus, tincidunt feugiat nibh placerat sit amet.',
	            'target' => 'http://www.testmatic' . $i . '.com',
	            'help_text' => 'Quisque nec arcu ut est sagittis faucibus in eget arcu. Proin in sagittis quam. In ut imperdiet metus.',
	            'time_limit' => '500',
	            'type' => 'Scenario',
                'created_date' => Carbon::now(),
                'modified_date' => Carbon::now()
	        ]);
    	}
    }
}
