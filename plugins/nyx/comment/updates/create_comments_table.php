<?php namespace Nyx\Comment\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('nyx_comment_comments', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('email');
            $table->string('owner');
            $table->longText('message');
            $table->integer('post_id')->unsigned()->index()->nullable();
            $table->timestamps();
            $table->foreign('post_id')->references('id')->on('rainlab_blog_posts');
        });
    }

    public function down()
    {
        Schema::dropIfExists('nyx_comment_comments');
    }
}
