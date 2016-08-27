<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMp3sTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mp3s', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('mp3name');
			$table->string('image');
			$table->text('description');
			$table->string('size');
			$table->integer('user_id');
			$table->integer('category_id');
			$table->integer('views');
			$table->integer('play');
			$table->integer('download');
			$table->boolean('publish');
			$table->string('code');
			$table->string('price', 4);
			$table->integer('buy_count');
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
		Schema::drop('mp3s');
	}

}
