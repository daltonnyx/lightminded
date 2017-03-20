<?php namespace Jiri\JKShop\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class UpdateOrders150 extends Migration
{

    public function up()
    {
        Schema::table('jiri_jkshop_orders', function ($table) {
            // Order status - payment_gateways
            $table->integer('payment_gateway_id')->unsigned()->nullable();
            $table->foreign('payment_gateway_id')->references('id')->on('jiri_jkshop_payment_gateways')->onDelete('set null');
        });
    }

    public function down()
    {
        
    }

}
