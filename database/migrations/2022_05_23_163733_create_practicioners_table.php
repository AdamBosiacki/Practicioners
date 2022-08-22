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
        Schema::create('practicioners', function (Blueprint $table) {
            $table->id();
            $table->string("first_name")->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->string("phone")->nullable(false);
            $table->string("email")->nullable(false);
            $table->decimal('hourly_rate')->nullable(false);
            $table->string('availability')->nullable(false);
            $table->string('cur_company')->nullable(true);
            $table->string('cur_position')->nullable(true);
            $table->char('contact_source',1)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practicioners');
    }
};
