<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('majors', function (Blueprint $table) {
            $table->string('faculty_id',15)->after('major_id');
            $table->index('faculty_id');
            $table->foreign('faculty_id')->references('faculty_id')->on('faculties')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('majors', function (Blueprint $table) {
            $table->dropForeign('faculty_id');
            $table->dropColumn('faculty_id');
        });
    }
};
