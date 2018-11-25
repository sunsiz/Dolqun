<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('user_id')->index();
            $table->string('title');
            $table->string('description', 255)->nullable();
            $table->string('slug', 255);
            $table->longText('body');
            $table->string('author')->nullable();
            $table->integer('clicks')->default(0)->nullable();
            $table->string('thumb')->nullable();
            $table->smallInteger('status')->default(0);
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
        Schema::dropIfExists('posts');
    }
}
