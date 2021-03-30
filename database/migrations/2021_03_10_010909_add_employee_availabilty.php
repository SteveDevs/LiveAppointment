<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmployeeAvailabilty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('employees', function (Blueprint $table) {
            $table->enum('status', ['AVAILABLE', 'IN_APPOINTMENT_TIME', 'CONFIRMED_IN_APPOINTMENT', 'CONFIRMED_NOT_IN_APPOINTMENT']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
