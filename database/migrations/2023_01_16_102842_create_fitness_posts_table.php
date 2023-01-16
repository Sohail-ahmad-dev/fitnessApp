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
        Schema::create('fitness_posts', function (Blueprint $table) {
            $table->id();
            $table->string('post_category');
            $table->string('post_title');
            $table->text('post_content');
            $table->string('post_type');
            $table->string('post_url');
            $table->string('post_status');
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
        Schema::dropIfExists('fitness_posts');
    }
};
