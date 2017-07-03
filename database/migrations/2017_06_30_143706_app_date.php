<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $user) {
            $user->increments('id');
            $user->string('place');
            $user->string('shop_name');
            $user->string('url');
            $user->string('who');
            $user->string('how');
            $user->string('impression');
            $user->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
