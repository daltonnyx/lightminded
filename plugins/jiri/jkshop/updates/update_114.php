<?php namespace Jiri\JKShop\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class Update114 extends Migration
{

    public function up()
    {
        Schema::table('jiri_jkshop_orders', function ($table) {
            $table->string("tracking_number")->nullable();
        });
    }

    public function down()
    {
        Schema::table('jiri_jkshop_orders', function ($table) {
            $table->dropColumn('tracking_number');
        });
    }

}
