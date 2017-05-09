<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_components', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->enum('type', ['Question', 'Scenario']);
            $table->integer('order')->default(0);
            $table->text('description');
            $table->text('help_text');
            $table->string('target')->default('');
            $table->string('time_limit', 5)->default('');
            $table->string('selections')->default('');
            $table->integer('created_by')->default(2);
            $table->timestamp('created_date')->nullable()->default(NULL);
            $table->timestamp('modified_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->integer('modified_by')->default(2);
        });

        DB::update("ALTER TABLE project_components AUTO_INCREMENT = 1;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_components');
    }
}
