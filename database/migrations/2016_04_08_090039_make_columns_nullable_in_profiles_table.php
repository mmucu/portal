<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeColumnsNullableInProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('image_name')->nullable()->change(); // cannot be reversed without raw db
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            /*make image_name un-nullable*/
            DB::statement("UPDATE 'profiles' SET 'image_name'= '' WHERE 'image_name' IS NULL;");
            DB:statement("ALTER TABLE 'profiles' MODIFY 'image_name' VARCHAR(50) NOT NULL");
        });
    }
}
