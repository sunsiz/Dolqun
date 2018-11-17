<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilghetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filghets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ug')->index()->commit('维吾尔语简称');
            $table->string('zh')->index()->commit('中文简称');
            $table->string('other')->commit('其他语言');
            $table->string('description')->commit('备注');
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
        Schema::dropIfExists('filghets');
    }
}
