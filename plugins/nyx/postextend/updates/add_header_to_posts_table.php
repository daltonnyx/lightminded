<?php namespace Nyx\PostExtend\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddHeaderToPost extends Migration
{
    public function up()
    {
		if(!Schema::hasColumn('header',	'rainlab_blog_posts'))
		{
			Schema::table('rainlab_blog_posts', function($table) {
				$table->longText('header')->nullable();
			});
		}	
		if(!Schema::hasColumn('header_enabled', 'rainlab_blog_posts'))
		{
			Schema::table('rainlab_blog_posts', function($table) {
				$table->boolean('header_enabled');
			});
		}
		if(!Schema::hasColumn('header_mobile_only', 'rainlab_blog_posts'))
		{
			Schema::table('rainlab_blog_posts', function($table) {
				$table->boolean('header_mobile_only');
			});
		}
    }

    public function down()
    {
		if(Schema::hasColumn('header', 'rainlab_blog_posts')) {
			$Schema::table('rainlab_blog_posts', function($table){
				$table->dropColumn('header');
			});
		}
		if(Schema::hasColumn('header_enabled', 'rainlab_blog_posts')) {
			$Schema::table('rainlab_blog_posts', function($table){
				$table->dropColumn('header_enabled');
			});
		}
		if(Schema::hasColumn('header_mobile_only', 'rainlab_blog_posts')) {
			$Schema::table('rainlab_blog_posts', function($table){
				$table->dropColumn('header_mobile_only');
			});
		}
    }
}
