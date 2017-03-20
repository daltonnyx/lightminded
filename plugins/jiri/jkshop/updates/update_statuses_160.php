<?php namespace Jiri\JKShop\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class UpdateStatuses160 extends Migration
{

    public function up()
    {
        Schema::table('jiri_jkshop_order_statuses', function ($table) {
            
            // qty increase back
            $table->boolean('qty_increase_back')->default(false); // active
            
            // qty decrease
            $table->boolean('qty_decrease')->default(false); // active
            
            // disallow for gateway (paid, canceled)
            $table->boolean('disallow_for_gateway')->default(false); // active
        });
    }

    public function down()
    {
        
    }

}
