<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInstagramDataToPhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photos', function($table) {
            $table->string('instagram_id')->nullable(true);
            $table->mediumText('instagram_metadata')->nullable(true);
            $table->boolean('instagram_is_visible')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photos', function($table) {
            $table->dropColumn('instagram_id');
            $table->dropColumn('instagram_metadata');
            $table->dropColumn('instagram_is_visible');
        });
    }
}
