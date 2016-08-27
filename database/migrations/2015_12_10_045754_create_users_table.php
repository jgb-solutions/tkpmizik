<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function( $table )
		{
			$table->increments('id');
			$table->string('name');
			$table->string('username', 60)->unique();
			$table->string('email', 60)->unique();
			$table->string('password', 60);
			$table->string('image');
			$table->string('telephone', 20);
			$table->tinyInteger('admin');
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
