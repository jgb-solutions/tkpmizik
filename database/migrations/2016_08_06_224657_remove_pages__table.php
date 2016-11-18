<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('pages');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::create('pages', function($table)
            {
                $table->increments('id');
                $table->string('title', 128);
                $table->string('slug', 60);
                $table->text('content');
                $table->timestamps();
        });
    }
}
