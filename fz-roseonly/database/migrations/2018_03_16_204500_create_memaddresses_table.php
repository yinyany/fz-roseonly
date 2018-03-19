<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemaddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memaddresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id');                     //会员ID
            $table->string('shpeople');                       // 收货人
            $table->string('shaddress');                      //收货地址
            $table->integer('shphone');                         //收货人联系电话
            $table->integer('shpostcode');                    //收货邮编
            $table->enum('state', ['0', '1']);          //记录状态。0：禁用，1：默认
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
        Schema::drop('memaddresses');
    }
}
