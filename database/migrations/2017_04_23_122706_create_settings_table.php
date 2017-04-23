<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name');
            $table->string('logo_image');
            $table->string('background_image');
            $table->timestamps();
        });

        DB::table('settings')->insert([
            'site_name' => 'VIS TV',
            'logo_image' => url('images/settings/') . 'logo.png',
            'background_image' => url('images/settings/') . 'background.jpg'
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
}
