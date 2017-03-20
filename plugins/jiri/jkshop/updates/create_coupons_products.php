<?php namespace Jiri\JKShop\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCouponsProductsTable extends Migration
{

    public function up()
    {
        Schema::create('jiri_jkshop_coupons_products', function($table)
        {
            $table->integer('coupon_id')->unsigned();
            $table->integer('product_id')->unsigned();
            
            $table->primary(['coupon_id', 'product_id']);         
            
            $table->foreign('coupon_id')->references('id')->on('jiri_jkshop_coupons')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('jiri_jkshop_products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jiri_jkshop_coupons_products');
    }

}