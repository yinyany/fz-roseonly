<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');                     //订单ID
            $table->integer('goods_id');                     //商品ID
            $table->integer('goods_num');                    //商品购买数量   
            $table->double('goods_prices',20,2);                //单个价格
            $table->tinyInteger('status');                    //记录状态。0：禁用，1：正常，2，删除
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
        Schema::drop('order_goods');
    }
}
