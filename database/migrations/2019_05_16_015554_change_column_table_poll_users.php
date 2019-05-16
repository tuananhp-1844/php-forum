<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnTablePollUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('poll_users', function (Blueprint $table) {
            $table->renameColumn('question_id', 'user_id');
            $table->renameColumn('title', 'poll_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('poll_users', function (Blueprint $table) {
            $table->renameColumn('user_id', 'question_id');
            $table->renameColumn('poll_id', 'title');
        });
    }
}
