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
    Schema::create('certificate_files', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('applicant_id');
        $table->string('file');
        $table->timestamps();

        $table->foreign('applicant_id')
              ->references('id')
              ->on('applicants')
              ->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificate_files');
    }
};
