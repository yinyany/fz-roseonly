<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsShopcarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_shopcars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id');                     //会员ID   
            $table->integer('goods_id');                     //商品ID   
            $table->integer('num');                          //商品数量 
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
        Schema::drop('goods_shopcars');
    }
}
