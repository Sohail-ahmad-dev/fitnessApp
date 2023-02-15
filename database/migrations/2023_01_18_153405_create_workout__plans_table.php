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
        Schema::create('workout__plans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->string('level');
            $table->string('kcal');
            $table->string('goal');
            $table->string('equipment');
            $table->string('duration');
            $table->string('upload_type');
            $table->string('upload_url');
            $table->longText('description');
            $table->string('days',2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workout__plans');
    }
};
