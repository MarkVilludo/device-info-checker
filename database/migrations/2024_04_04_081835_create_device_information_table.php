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
            $table->string('color_depth', 8)->nullable();
            $table->string('current_resolution', 64)->nullable();
            $table->string('available_resolution', 64)->nullable();
            $table->string('device_type', 32)->nullable();
            $table->string('ip', 128)->nullable();
            $table->string('os', 32)->nullable();
            $table->text('fonts')->nullable();
            $table->string('engine', 32)->nullable();
            $table->string('is_cookie', 8)->nullable();
            $table->string('is_session_storage', 8)->nullable();
            $table->string('is_canvas', 8)->nullable();
            $table->string('is_silverlight', 8)->nullable();
            $table->string('is_mobile', 8)->nullable();
            $table->string('is_mobile_major', 8)->nullable();
            $table->string('is_mobile_android', 8)->nullable();
            $table->string('is_mobile_opera', 8)->nullable();
            $table->string('is_mobile_windows', 8)->nullable();
            $table->string('is_mobile_blackberry', 8)->nullable();
            $table->string('is_mobile_ios', 8)->nullable();
            $table->string('is_iphone', 8)->nullable();
            $table->string('is_ipad', 8)->nullable();
            $table->string('is_ipod', 8)->nullable();
            $table->string('is_windows', 8)->nullable();
            $table->string('is_mac', 8)->nullable();
            $table->string('is_linux', 8)->nullable();
            $table->string('is_ubuntu', 8)->nullable();

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
