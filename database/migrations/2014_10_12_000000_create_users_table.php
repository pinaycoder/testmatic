<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->integer('question_id_1')->default(1);
            $table->string('question_ans_1', 20)->default('');
            $table->integer('question_id_2')->default(1);
            $table->string('question_ans_2', 20)->default('');
            $table->timestamp('last_login_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('last_pass_change')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('first_name', 50)->default('');
            $table->string('middle_name', 50)->default('');
            $table->string('last_name', 50)->default('');
            $table->date('birthdate');
            $table->enum('gender', ['Female', 'Male']);
            $table->enum('role', ['Super Administrator', 'Administrator', 'Participant']);
            $table->string('email');
            $table->string('contact_num', 50)->default('');
            $table->string('user_pic_file', 50)->default('/img/default-user-img.png');
            $table->integer('created_by')->default(1);
            $table->timestamp('created_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('modified_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->integer('modified_by')->default(1);
            $table->boolean('inactive')->default(false);
            $table->string('remember_token', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
