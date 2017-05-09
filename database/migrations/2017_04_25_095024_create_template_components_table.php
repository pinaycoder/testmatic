<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_components', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('template_id')->unsigned();
            $table->foreign('template_id')->references('id')->on('templates');
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

        DB::update("ALTER TABLE template_components AUTO_INCREMENT = 1;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('template_components');
    }
}
