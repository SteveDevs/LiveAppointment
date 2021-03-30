<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AppointmentService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_service', function (Blueprint $table) {
            $table->unsignedInteger('appointment_id');

            //$table->foreign('appointment_id', 'appointment_id_fk_360720')->references('id')->on('appointments')->onDelete('cascade');

            $table->unsignedInteger('service_id');

            //$table->foreign('service_id', 'service_id_fk_360720')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment_service');
    }
}
