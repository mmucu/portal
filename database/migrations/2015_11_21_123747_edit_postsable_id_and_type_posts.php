<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditPostsableIdAndTypePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('postable_id');
            $table->string('postable_type');
            $table->dropColumn('owner_id');
            $table->dropColumn('owner_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('owner_id');
            $table->string('owner_type');
            $table->dropColumn('postable_id');
            $table->dropColumn('postable_type');
        });
    }
}
