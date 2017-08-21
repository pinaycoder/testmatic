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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->integer('question_id_1')->default(2);
            $table->string('question_ans_1', 20)->default('');
            $table->integer('question_id_2')->default(2);
            $table->string('question_ans_2', 20)->default('');
            $table->timestamp('last_login_date')->nullable()->default(NULL);
            $table->timestamp('last_pass_change')->nullable()->default(NULL);
            $table->string('first_name', 50)->default('');
            $table->string('middle_name', 50)->default('')->nullable();
            $table->string('last_name', 50)->default('');
            $table->date('birthdate')->nullable();
            $table->enum('gender', ['Female', 'Male']);
            $table->enum('role', ['Super Administrator', 'Test Administrator', 'Test Participant']);
            //$table->foreign('role_id')->references('id')->on('roles');
            $table->string('email');
            $table->string('contact_num', 50)->default('')->nullable();
            $table->string('user_pic_file', 50)->default('/img/default-user-img.png');
            $table->integer('created_by')->default(2);
            $table->timestamp('created_date')->nullable()->default(NULL);
            $table->timestamp('modified_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->integer('modified_by')->default(2);
            $table->boolean('inactive')->default(false);
            $table->boolean('confirmed')->default(false);
            $table->string('remember_token', 100)->nullable();
            $table->string('confirmation_token', 100)->nullable();
        });

        DB::update("ALTER TABLE users AUTO_INCREMENT = 1;");
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
