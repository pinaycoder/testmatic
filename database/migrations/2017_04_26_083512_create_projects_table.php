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
            $table->datetime('start')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->datetime('end')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('created_by')->default(1);
            $table->timestamp('created_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('modified_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->integer('modified_by')->default(1);
            $table->boolean('inactive')->default(false);
        });
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