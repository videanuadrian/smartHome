<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixMissingConstrints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::table('device_physical_property', function ($table) {
            $table->primary(['physical_property_id', 'device_id']);
        });

        Schema::table('devices', function ($table) {
            $table->bigInteger('user_id')->unsigned()->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('No action')->onUpdate('No action');

        });

        Schema::table('measurement_logs', function ($table) {
            $table->bigInteger('device_id')->unsigned()->change();
            $table->bigInteger('physical_property_id')->unsigned()->change();

            $table->foreign('device_id')->references('id')->on('devices')->onDelete('No action')->onUpdate('No action');
            $table->foreign('physical_property_id')->references('id')->on('physical_properties')->onDelete('No action')->onUpdate('No action');
            $table->index('created_at');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
