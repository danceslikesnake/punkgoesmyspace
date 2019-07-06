<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToAlbums extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('albums', function($table) {
            $table->enum('album_type', ['manual', 'instagram'])->default('manual');
            $table->string('instagram_hashtag')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('albums', function($table) {
            $table->dropColumn('album_type');
            $table->dropColumn('instagram_hashtag');
        });
    }
}
