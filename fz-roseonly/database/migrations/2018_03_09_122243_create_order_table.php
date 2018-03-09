<?php
//订单
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('order', function (Blueprint $table) {
            $table->increments('id');    
            $table->integer('ordernum');                       //订单号  
            $table->integer('member_id');                     //会员ID
            $table->integer('brand_id');                      //商品信息ID
            $table->integer('shopnum');                       //购物数量
            $table->integer('prices');                        //商品价格合计
            $table->string('orderstatus');                    //订单状态
            $table->string('rec_name');                       //收件人
            $table->string('rec_tel');                        //收件人联系方式
             $table->string('time');                          //交易时间
            $table->string('rec_address');                    //收件人联系地址
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
        //
    }
}
