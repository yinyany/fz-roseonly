<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateButesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('butes', function (Blueprint $table) {
            $table->increments('id');  //属性名编号
            $table->string('name','36');   //属性名
            $table->tinyInteger('type_id');   //分类表id
            $table->enum('state', ['单选','多选']); //枚举
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
        Schema::drop('butes');
    }
}
