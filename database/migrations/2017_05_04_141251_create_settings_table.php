<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_title');
            $table->string('tagline');
            $table->string('email');
            $table->string('blog_show_item');
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('google_webmaster')->nullable();
            $table->text('bing_webmaster')->nullable();
            $table->text('google_analystic')->nullable();
            $table->text('pixel_fb')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
