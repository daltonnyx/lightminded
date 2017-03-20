<?php namespace Jiri\JKShop\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCouponsUsersTable extends Migration
{

    public function up()
    {
        Schema::create('jiri_jkshop_coupons_users', function($table)
        {
            $table->integer('coupon_id')->unsigned();
            $table->integer('user_id')->unsigned();
            
            $table->primary(['coupon_id', 'user_id']);         
            
            $table->foreign('coupon_id')->references('id')->on('jiri_jkshop_coupons')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jiri_jkshop_coupons_users');
    }

}