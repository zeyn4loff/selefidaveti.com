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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("site_name");
            $table->string("logo_white");
            $table->string("logo_black");
            $table->string("favicon");
            $table->timestamps();
        });

        DB::table('settings')->insert([
            'site_name' => 'Sünnəyə Dəvət',
            'logo_white' => 'assets/site/img/logo/logo_w.png',
            'logo_black' => 'assets/site/img/logo/logo_b.png',
            'favicon' => 'assets/site/img/favicon.png',
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
        Schema::dropIfExists('settings');
    }
};
