<?php namespace Jiri\JKShop\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class Update_144 extends Migration
{

    public function up()
    {
        Schema::table('jiri_jkshop_brands', function ($table) {
            $table->text("short_description")->nullable();
        });
    }

    public function down()
    {
        Schema::table('jiri_jkshop_brands', function ($table) {
            $table->dropColumn('short_description');
        });
    }

}
