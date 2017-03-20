<?php namespace Jiri\JKShop\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreatePropertyOptionsTable extends Migration
{

    public function up()
    {
        Schema::create('jiri_jkshop_property_options', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            
            $table->integer('property_id')->nullable()->index();
            $table->string('title');
            $table->integer('order_index');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jiri_jkshop_property_options');
    }

}
