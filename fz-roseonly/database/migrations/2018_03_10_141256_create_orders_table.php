<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');    
            $table->integer('order_number')->unique();        //订单号  
            $table->integer('member_id');                     //会员ID    
            $table->double('pay_prices',20,2);                //实际支付价格
            $table->tinyInteger('is_pay');                    //是否支付 0：未支付，1：完成支付
            $table->integer('pay_time');                      //支付时间 UNIX时间戳  
            $table->tinyInteger('is_ship');                   //是否发货。0：未发货，1：已发货
            $table->integer('ship_time');                     //发货时间 UNIX时间戳
            $table->tinyInteger('is_receipt');                //是否收货。0：未收货，1：已收货
            $table->integer('receipt_time');                  //收货时间 UNIX时间戳
            $table->string('ship_number', 100);               //快递单号
            $table->tinyInteger('status');                    //记录状态。0：禁用，1：正常，2，删除
            $table->timestamps();                              //创建时间，和修改时间
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
