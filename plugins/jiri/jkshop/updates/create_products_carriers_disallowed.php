<?php namespace Jiri\JKShop\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateProductsCarriersDisallowed extends Migration
{

    public function up()
    {
        Schema::create('jiri_jkshop_products_carriers_no', function($table)
        {
            $table->integer('product_id')->unsigned();
            $table->integer('carrier_id')->unsigned();
            $table->primary(['product_id', 'carrier_id']);         
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('jiri_jkshop_products_carriers_no');
    }

}