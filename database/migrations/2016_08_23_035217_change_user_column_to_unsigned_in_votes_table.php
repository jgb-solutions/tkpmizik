<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUserColumnToUnsignedInVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('votes', function($table) {
           DB::statement("alter table `votes` change `user_id` `user_id` int(11) unsigned not null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('votes', function($table) {
            DB::statement("alter table `votes` change `user_id` `user_id` int(11) not null");
        });
    }
}
