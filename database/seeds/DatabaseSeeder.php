<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        
        $this->call(SecurityQuestionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TemplatesTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        //$this->call(TemplateComponentsTableSeeder::class);
        //$this->call(ProjectComponentsTableSeeder::class);
        
    }
}
