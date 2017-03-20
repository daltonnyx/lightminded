<?php namespace Jiri\JKShop\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateProductsProductsFeatured extends Migration
{

    public function up()
    {
        Schema::create('jiri_jkshop_products_featured', function($table)
        {
            $table->integer('product_id')->unsigned();
            $table->integer('featured_id')->unsigned();
            $table->primary(['product_id', 'featured_id']);         
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('jiri_jkshop_products_featured');
    }

}