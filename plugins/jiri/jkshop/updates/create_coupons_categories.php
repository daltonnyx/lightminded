<?php namespace Jiri\JKShop\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCouponsCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('jiri_jkshop_coupons_categories', function($table)
        {
            $table->integer('coupon_id')->unsigned();
            $table->integer('category_id')->unsigned();
            
            $table->primary(['coupon_id', 'category_id']);         
            
            $table->foreign('coupon_id')->references('id')->on('jiri_jkshop_coupons')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('jiri_jkshop_categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jiri_jkshop_coupons_categories');
    }

}