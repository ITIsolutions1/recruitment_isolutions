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
    Schema::table('applicants', function (Blueprint $table) {
        $table->string('ijazah_file')->nullable()->after('photo_pass');
    });
}

public function down()
{
    Schema::table('applicants', function (Blueprint $table) {
        $table->dropColumn('ijazah_file');
    });
}
};
