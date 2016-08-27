<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugColumnToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    	public function up()
    	{
        	Schema::table('mp3s', function($table)
		{
			$table->string('slug');
		});
    	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    	public function down()
    	{
       	Schema::table('mp3s', function($table)
        	{
        		$table->dropColumn('slug');
        	});
    }
}