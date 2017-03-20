<?php namespace Nyx\PostExtend\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddBuyboxToPost extends Migration
{
    public function up()
    {
		if(!Schema::hasColumn('buybox',	'rainlab_blog_posts'))
		{
			Schema::table('rainlab_blog_posts', function($table) {
				$table->longText('buybox')->nullable();
			});
		}	
    }

    public function down()
    {
		if(Schema::hasColumn('buybox', 'rainlab_blog_posts')) {
			$Schema::table('rainlab_blog_posts', function($table){
				$table->dropColumn('buybox');
			});
		}
    }
}
