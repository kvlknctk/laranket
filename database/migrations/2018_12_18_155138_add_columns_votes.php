<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsVotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('votes', function($table)
        {
            $table->integer('option_id')->unsigned()->after('id');
            $table->foreign('option_id')->references('id')->on('options');

            $table->string('ip')->after('option_id');
        });
    }
    // deleted_at

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
