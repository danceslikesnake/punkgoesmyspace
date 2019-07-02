<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_themes', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('cookie_id');
            $table->string('custom_url');
            $table->mediumText('profile_content');
            $table->mediumText('profile_theme');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_themes');
    }
}
