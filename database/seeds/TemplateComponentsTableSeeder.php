<?php

use Illuminate\Database\Seeder;

class TemplateComponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 30; $i++){
	        DB::table('template_components')->insert([
	        	'template_id' => $i,
	        	'order' => 1,
	            'name' => 'Template Question Component ' . $i,
	            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi non eros eget ipsum luctus ultrices. Sed eget finibus elit. Proin fringilla dui augue, sit amet pulvinar ex porttitor nec. Quisque nec arcu ut est sagittis faucibus in eget arcu. Proin in sagittis quam. In ut imperdiet metus. Suspendisse suscipit bibendum lectus, sed ultrices dui. Maecenas risus ligula, mattis vel dolor ac, vehicula ultrices metus. Donec nulla ligula, consectetur et volutpat at, placerat a enim. In dui metus, tristique gravida dui et, viverra accumsan ipsum. Nullam pellentesque lobortis lacus, tincidunt feugiat nibh placerat sit amet.',
	            'help' => 'Quisque nec arcu ut est sagittis faucibus in eget arcu. Proin in sagittis quam. In ut imperdiet metus.',
	            'selection' => 'A,B,C,D,E'
	        ]);
    	}

    for($i = 1; $i < 30; $i++){
	        DB::table('template_components')->insert([
	        	'template_id' => $i,
	        	'order' => 2,
	            'name' => 'Template Scenario Component ' . $i,
	            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi non eros eget ipsum luctus ultrices. Sed eget finibus elit. Proin fringilla dui augue, sit amet pulvinar ex porttitor nec. Quisque nec arcu ut est sagittis faucibus in eget arcu. Proin in sagittis quam. In ut imperdiet metus. Suspendisse suscipit bibendum lectus, sed ultrices dui. Maecenas risus ligula, mattis vel dolor ac, vehicula ultrices metus. Donec nulla ligula, consectetur et volutpat at, placerat a enim. In dui metus, tristique gravida dui et, viverra accumsan ipsum. Nullam pellentesque lobortis lacus, tincidunt feugiat nibh placerat sit amet.',
	            'target' => 'http://www.testmatic' . $i . '.com',
	            'help' => 'Quisque nec arcu ut est sagittis faucibus in eget arcu. Proin in sagittis quam. In ut imperdiet metus.',
	            'time_limit' => '500'
	        ]);
    	}
    }
}
