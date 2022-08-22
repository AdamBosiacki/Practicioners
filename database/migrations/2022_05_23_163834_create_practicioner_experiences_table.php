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
        Schema::create('practicioner_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('practicioner_id')->nullable(false);
            $table->foreign('practicioner_id')->references('id')->on('practicioners');
            $table->date('start_date')->nullable(false);
            $table->date('finish_date')->nullable(true);
            $table->unsignedBigInteger('university_id')->nullable(false);
            $table->foreign('university_id')->references('id')->on('universities');
            $table->unsignedBigInteger('field_of_knowledge_id')->nullable(false);
            $table->foreign('field_of_knowledge_id')->references('id')->on('field_of_knowledges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practicioner_experiences');
    }
};
