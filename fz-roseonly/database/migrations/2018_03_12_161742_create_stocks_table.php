<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');   //库存表id
            $table->tinyInteger('good_id');   //商品表id
            $table->tinyInteger('bid');   //属性名id
            $table->tinyInteger('vid');   //属性值id
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
        Schema::drop('stocks');
    }
}
