<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationToPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kategori_posts', function (Blueprint $table) {
            $table->integer('kategori_id')->unsigned()->change();
            $table->foreign('kategori_id')->references('id')->on('kategoris')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('kategori_posts', function (Blueprint $table) {
            $table->integer('post_id')->unsigned()->change();
            $table->foreign('post_id')->references('id')->on('posts')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->change();
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::table('kategori_posts', function(Blueprint $table) {
            $table->dropForeign('kategori_posts_kategori_id_foreign');
        });

        Schema::table('kategori_posts', function(Blueprint $table) {
            $table->dropIndex('kategori_posts_kategori_id_foreign');
        });

        Schema::table('kategori_posts', function(Blueprint $table) {
            $table->integer('kategori_id')->change();
        });

        Schema::table('kategori_posts', function(Blueprint $table) {
            $table->dropForeign('kategori_posts_post_id_foreign');
        });

        Schema::table('kategori_posts', function(Blueprint $table) {
            $table->dropIndex('kategori_posts_post_id_foreign');
        });

        Schema::table('kategori_posts', function(Blueprint $table) {
            $table->integer('post_id')->change();
        });

        Schema::table('posts', function(Blueprint $table) {
            $table->dropForeign('posts_user_id_foreign');
        });

        Schema::table('posts', function(Blueprint $table) {
            $table->dropIndex('posts_user_id_foreign');
        });

        Schema::table('posts', function(Blueprint $table) {
            $table->integer('user_id')->change();
        });
    }
}
