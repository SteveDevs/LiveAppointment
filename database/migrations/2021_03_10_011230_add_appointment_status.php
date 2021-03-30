<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAppointmentStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('appointments', function (Blueprint $table) {
            $table->enum('status', ['COMPLETED', 'CURRENT', 'CANCELLED', 'CREATED'])->default('CREATED');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
