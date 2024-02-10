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
        Schema::create('audios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('audio_category_id');
            $table->string("title");
            $table->tinyInteger("status")->default(config('constants.ACTIVE'));
            $table->string("audio");
            $table->timestamps();
            $table->foreign('audio_category_id')->references('id')->on('audio_categories')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audio');
    }
};
