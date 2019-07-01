<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCookieIdToVotesAgain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('album_single_votes', function($table){
            $table->mediumText('cookie_id');
            $table->mediumText('ip_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('album_single_votes', function($table){
            $table->dropColumn('cookie_id');
            $table->dropColumn('ip_address');
        });
    }
}
