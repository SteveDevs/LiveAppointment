<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_service', function (Blueprint $table) {
            $table->unsignedInteger('employee_id');

            //$table->foreign('employee_id', 'employee_id_fk_360622')->references('id')->on('employees')->onDelete('cascade');

            $table->unsignedInteger('service_id');

            //$table->foreign('service_id', 'service_id_fk_360622')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_service');
    }
}
