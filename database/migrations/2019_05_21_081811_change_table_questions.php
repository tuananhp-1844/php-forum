<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTableQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            DB::statement('ALTER TABLE questions ADD FULLTEXT `search` (`title`, `content`)');
            DB::statement('ALTER TABLE questions ENGINE = MyISAM');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            DB::statement('ALTER TABLE questions ADD FULLTEXT `search` (`title`, `content`)');
            DB::statement('ALTER TABLE questions ENGINE = MyISAM');
        });
    }
}
