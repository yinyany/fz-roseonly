<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('password', 60);
            $table->string('birthday');
            $table->enum('sex', ['男', '女']);
            $table->enum('affective', ['未婚', '订婚','已婚']);
            $table->string('address');
            $table->string('email')->unique();
            $table->string('fere');
            $table->string('fere-phone');
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
        Schema::drop('member');
    }
}
