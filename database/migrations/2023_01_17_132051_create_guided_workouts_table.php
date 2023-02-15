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
        Schema::create('guided_workouts', function (Blueprint $table) {
            $table->id();
            $table->string('workout_title');
            $table->string('workout_qualities');
            $table->string('workout_duration');
            $table->string('workout_calories');
            $table->string('upload_type');
            $table->string('workout_url');
            $table->text('workout_content');
            $table->string('workout_categories');
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
        Schema::dropIfExists('guided_workouts');
    }
};
