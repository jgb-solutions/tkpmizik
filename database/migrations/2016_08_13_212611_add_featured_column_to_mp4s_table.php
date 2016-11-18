<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFeaturedColumnToMp4sTable extends Migration
{
   public function up()
    {
            Schema::table('mp4s', function($table) {
                $table->tinyInteger('featured');
            });
    }

        public function down()
      {
            Schema::table('mp4', function($table) {
                $table->dropColumn('featured');
            });
    }
}
