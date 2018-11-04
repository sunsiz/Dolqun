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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->default('images/avatar.jpg');
            $table->boolean('is_admin')->default(false); //是否为管理员
            $table->string('activation_token', 80)->nullable(); //激活token
            $table->boolean('is_activated')->default(false); //是否已激活
            $table->integer('experience')->nullable()->comment('积分');
            $table->string('api_token', 80)->nullable();
            $table->enum('sex', ['male', 'female']);
            $table->timestamp('last_login_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
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
