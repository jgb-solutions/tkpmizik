<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IndexMp3sMp4sTitle extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mp3s', function($table)
		{
			$table->index('name');
		});

		Schema::table('mp4s', function($table)
		{
			$table->index('name');
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
			$table->dropIndex('name');
		});

		Schema::table('mp4s', function($table)
		{
			$table->dropIndex('name');
		});
	}

}
