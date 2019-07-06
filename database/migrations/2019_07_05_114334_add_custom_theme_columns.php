<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomThemeColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('custom_themes', function($table) {
            $table->mediumText('profile_spotify_embed')->nullable();
            $table->mediumText('profile_top_twelve')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('custom_themes', function($table) {
            $table->dropColumn('pfoile_spotify_embed');
            $table->dropColumn('profile_top_twelve');
        });
    }
}
