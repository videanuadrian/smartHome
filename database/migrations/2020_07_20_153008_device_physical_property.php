<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DevicePhysicalProperty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('device_physical_property', function (Blueprint $table) {
            $table->integer('physical_property_id')->unsigned();
            $table->integer('device_id')->unsigned();
            $table->foreign('physical_property_id')->references('id')->on('physical_properties');
            $table->foreign('device_id')->references('id')->on('devices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('device_user', function (Blueprint $table) {
            //
        });
    }
}
