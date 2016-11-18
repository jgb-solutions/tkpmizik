<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMp4sTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mp4s', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('image');
			$table->string('youtube_id');
			$table->text('description');
			$table->integer('user_id');
			$table->integer('category_id');
			$table->integer('views');
			$table->integer('download');
			$table->mediumInteger('vote_up');
			$table->mediumInteger('vote_down');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mp4s');
	}

}
