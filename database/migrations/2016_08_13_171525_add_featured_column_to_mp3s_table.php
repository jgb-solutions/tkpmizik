<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFeaturedColumnToMp3sTable extends Migration
{
    public function up()
    {
	      	Schema::table('mp3s', function($table) {
	      		$table->tinyInteger('featured');
	    	});
  	}

    	public function down()
      {
      		Schema::table('mp3', function($table) {
        		$table->dropColumn('featured');
      		});
  	}
}