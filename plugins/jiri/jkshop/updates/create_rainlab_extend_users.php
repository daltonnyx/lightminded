<?php namespace Jiri\JKShop\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateRainlabExtendUsers extends Migration
{
    public function up()
    {
        if (Schema::hasColumns('users', [
            "jkshop_ds_first_name",
            "jkshop_ds_last_name",
            "jkshop_ds_address",
            "jkshop_ds_address_2",
            "jkshop_ds_postcode",
            "jkshop_ds_city",
            "jkshop_ds_country",
            "jkshop_ds_county",
            // Invoice address
            "jkshop_is_first_name",
            "jkshop_is_last_name",
            "jkshop_is_address",
            "jkshop_is_address_2",
            "jkshop_is_postcode",
            "jkshop_is_city",
            "jkshop_is_country",
            "jkshop_is_county",            
            
            // Contact
            "jkshop_contact_email",
            "jkshop_contact_phone",
            ])) 
        {
            return;
        }
        Schema::table('users', function($table)
        {
            // Delivery address
            $table->string("jkshop_ds_first_name")->nullable();
            $table->string("jkshop_ds_last_name")->nullable();
            $table->string("jkshop_ds_address")->nullable();
            $table->string("jkshop_ds_address_2")->nullable();
            $table->string("jkshop_ds_postcode")->nullable();
            $table->string("jkshop_ds_city")->nullable();
            $table->string("jkshop_ds_country")->nullable();
            $table->string("jkshop_ds_county")->nullable();
            // Invoice address
            $table->string("jkshop_is_first_name")->nullable();
            $table->string("jkshop_is_last_name")->nullable();
            $table->string("jkshop_is_address")->nullable();
            $table->string("jkshop_is_address_2")->nullable();
            $table->string("jkshop_is_postcode")->nullable();
            $table->string("jkshop_is_city")->nullable();
            $table->string("jkshop_is_country")->nullable();
            $table->string("jkshop_is_county")->nullable();            
            
            // Contact
            $table->string("jkshop_contact_email")->nullable();
            $table->string("jkshop_contact_phone")->nullable();   
        });
    }
    
    public function down()
    {
    }
    

}