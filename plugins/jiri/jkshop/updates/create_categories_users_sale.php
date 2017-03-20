<?php namespace Jiri\JKShop\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCategoriesUsersSale extends Migration
{

    public function up()
    {
        Schema::create('jiri_jkshop_categories_users_sale', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->unique(['category_id', 'user_id']);
            
            $table->double('sale')->unsigned();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jiri_jkshop_categories_users_sale');
    }

}