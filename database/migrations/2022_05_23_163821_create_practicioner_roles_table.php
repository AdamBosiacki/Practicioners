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
        Schema::create('practicioner_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('practicioner_id')->nullable(false);
            $table->foreign('practicioner_id')->references('id')->on('practicioners');
            $table->date('start_date')->nullable(false);
            $table->date('finish_date')->nullable(true);
            $table->string('name')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practicioner_roles');
    }
};
