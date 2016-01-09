<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageableIdAndImageableTypeToImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function($table)
        {
            $table->integer('imageable_id');
            $table->string('imageable_type');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function($table)
        {
            $table->dropColumn('imageable_id');
            $table->dropColumn('imageable_type');
        });
    }
}
