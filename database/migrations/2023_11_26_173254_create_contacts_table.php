<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string("email");
            $table->string("facebook");
            $table->string("instagram");
            $table->string("telegram");
            $table->string("youtube");
            $table->timestamps();
        });

        DB::table('contacts')->insert([
            'email' => 'zeyn4loff@gmail.com',
            'facebook' => 'flatstudio.az',
            'instagram' => 'flatstudio.az',
            'telegram' => 'flatstudio.az',
            'youtube' => 'flatstudio.az',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
