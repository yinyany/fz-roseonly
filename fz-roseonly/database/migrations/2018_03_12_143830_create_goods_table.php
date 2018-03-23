<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');    //商品的编号
            $table->tinyInteger('type_id');   //分类表id
            $table->string('bid');   //属性id
            $table->string('name','36');   //商品的名称
            $table->double('price',20,2);                //单个价格
            $table->string('imgurl');   //商品图片的路径
            $table->enum('state', ['热卖', '售馨','下架']); //枚举
            $table->string('content');   //商品的详情
            $table->integer('votes');   //销量
            $table->integer('price');   //商品的价格
            $table->integer('stock');   //商品的库存
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
        Schema::drop('goods');
    }
}
