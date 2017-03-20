<?php namespace Jiri\JKShop\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateProductsOptions extends Migration
{
    public function up()
    {
        Schema::create('jiri_jkshop_products_options', function($table)
        {
            $table->integer('product_id')->unsigned();
            $table->integer('option_id')->unsigned();
            $table->primary(['product_id', 'option_id']);
            
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->double('price_difference_with_tax')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jiri_jkshop_products_options');
    }

}