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
        Schema::create('device_information', function (Blueprint $table) {
            $table->id();
            $table->string('time_zone', 32)->nullable();
            $table->string('language', 8)->nullable();
            $table->integer('color_depth')->nullable();
            $table->string('current_resolution', 64)->nullable();
            $table->string('available_resolution', 64)->nullable();
            $table->string('device_type', 32)->nullable();
            $table->string('ip', 128)->nullable();
            $table->string('os', 32)->nullable();
            $table->text('fonts')->nullable();
            $table->string('engine', 32)->nullable();
            $table->boolean('is_cookie')->nullable();
            $table->boolean('is_session_storage')->nullable();
            $table->boolean('is_canvas')->nullable();
            $table->boolean('is_silverlight')->nullable();
            $table->boolean('is_mobile')->nullable();
            $table->boolean('is_mobile_major')->nullable();
            $table->boolean('is_mobile_android')->nullable();
            $table->boolean('is_mobile_opera')->nullable();
            $table->boolean('is_mobile_windows')->nullable();
            $table->boolean('is_mobile_blackberry')->nullable();
            $table->boolean('is_mobile_ios')->nullable();
            $table->boolean('is_iphone')->nullable();
            $table->boolean('is_ipad')->nullable();
            $table->boolean('is_ipod')->nullable();
            $table->boolean('is_windows')->nullable();
            $table->boolean('is_mac')->nullable();
            $table->boolean('is_linux')->nullable();
            $table->boolean('is_ubuntu')->nullable();
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
        Schema::dropIfExists('device_information');
    }
};
