<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    	public function up()
    	{
        	Schema::create('playlists', function (Blueprint $table) {
            		$table->increments('id');
            		$table->string('name');
            		$table->integer('user_id')->unsigned();
            		$table->integer('list_id')->unsigned();
            		$table->timestamps();

	       	$table
				->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('playlists');
    }
}
