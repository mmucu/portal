<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditOwnerTypeAndIdInPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('owner_id');
            $table->string('owner_type');
            $table->dropColumn('commentable_id');
            $table->dropColumn('commentable_type');
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
            $table->integer('commentable_id');
            $table->string('commentable_type');
            $table->dropColumn('owner_id');
            $table->dropColumn('owner_type');
        });
    }
}
