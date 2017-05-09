<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->default('');
            $table->text('description');
            $table->string('entry_url')->default('');
            $table->enum('status', ['Closed', 'In Progress', 'Open']);
            $table->datetime('start')->nullable()->default(NULL);
            $table->datetime('end')->nullable()->default(NULL);
            $table->integer('created_by')->default(2);
            $table->timestamp('created_date')->nullable()->default(NULL);
            $table->timestamp('modified_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->integer('modified_by')->default(2);
            $table->boolean('inactive')->default(false);
        });

        DB::update("ALTER TABLE projects AUTO_INCREMENT = 1;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
