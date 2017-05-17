<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationshipsToTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tag_posts', function (Blueprint $table) {
            $table->integer('tag_id')->unsigned()->change();
            $table->foreign('tag_id')->references('id')->on('tags')
                ->onUpdate('cascade')->onDelete('cascade');
        });

         Schema::table('tag_posts', function (Blueprint $table) {
            $table->integer('post_id')->unsigned()->change();
            $table->foreign('post_id')->references('id')->on('posts')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tag_posts', function(Blueprint $table) {
            $table->dropForeign('tag_posts_tag_id_foreign');
        });

        Schema::table('tag_posts', function(Blueprint $table) {
            $table->dropIndex('tag_posts_tag_id_foreign');
        });

        Schema::table('tag_posts', function(Blueprint $table) {
            $table->integer('tag_id')->change();
        });

        Schema::table('tag_posts', function(Blueprint $table) {
            $table->dropForeign('tag_posts_post_id_foreign');
        });

        Schema::table('tag_posts', function(Blueprint $table) {
            $table->dropIndex('tag_posts_post_id_foreign');
        });

        Schema::table('tag_posts', function(Blueprint $table) {
            $table->integer('post_id')->change();
        });
    }
}
