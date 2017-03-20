<?php namespace Nyx\PostExtend\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddFooterToPost extends Migration
{
    public function up()
    {
		if(!Schema::hasColumn('sticky_footer',	'rainlab_blog_posts'))
		{
			Schema::table('rainlab_blog_posts', function($table) {
				$table->longText('sticky_footer')->nullable();
			});
		}	
		if(!Schema::hasColumn('footer_enabled',	'rainlab_blog_posts'))
		{
			Schema::table('rainlab_blog_posts', function($table) {
				$table->boolean('footer_enabled');
			});
		}
		if(!Schema::hasColumn('footer_mobile_only',	'rainlab_blog_posts'))
		{
			Schema::table('rainlab_blog_posts', function($table) {
				$table->boolean('footer_mobile_only');
			});
		}
		if(!Schema::hasColumn('footer_show_position',	'rainlab_blog_posts'))
		{
			Schema::table('rainlab_blog_posts', function($table) {
				$table->integer('footer_show_position')->unsigned();
			});
		}
    }

    public function down()
    {
		if(Schema::hasColumn('sticky_footer', 'rainlab_blog_posts')) {
			$Schema::table('rainlab_blog_posts', function($table){
				$table->dropColumn('sticky_footer');
			});
		}
		if(Schema::hasColumn('footer_enabled', 'rainlab_blog_posts')) {
			$Schema::table('rainlab_blog_posts', function($table){
				$table->dropColumn('footer_enabled');
			});
		}
		if(Schema::hasColumn('footer_show_position', 'rainlab_blog_posts')) {
			$Schema::table('rainlab_blog_posts', function($table){
				$table->dropColumn('footer_show_position');
			});
		}
		if(Schema::hasColumn('footer_mobile_only', 'rainlab_blog_posts')) {
			$Schema::table('rainlab_blog_posts', function($table){
				$table->dropColumn('footer_mobile_only');
			});
		}
    }
}
