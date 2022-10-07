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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->decimal("salary", 10, 2, true);
            $table->decimal("bonus", 10, 2, true);
            $table->decimal("pantry", 10, 2, true);
            $table->decimal("isr", 10, 2, true);
            $table->decimal("assurance", 10, 2, true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
};
