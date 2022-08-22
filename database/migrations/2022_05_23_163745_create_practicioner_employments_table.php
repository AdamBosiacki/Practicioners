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
        Schema::create('practicioner_employments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('field_of_study_id')->nullable(false);
            $table->foreign('field_of_study_id')->references('id')->on('field_of_studies');
            $table->unsignedBigInteger('practicioner_id')->nullable(false);
            $table->foreign('practicioner_id')->references('id')->on('practicioners');
            $table->unsignedBigInteger('subject_id')->nullable(false);
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->char('semester',1)->nullable(false);
            $table->integer('year')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practicioner_employments');
    }
};
