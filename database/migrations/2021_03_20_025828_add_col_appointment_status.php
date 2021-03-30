<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColAppointmentStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->tinyInteger('confirmed_start')->default(0);
            $table->tinyInteger('confirmed_completed')->default(0);
            $table->tinyInteger('confirmed')->default(0);
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
            $table->dropColumn('confirmed_start');
            $table->dropColumn('confirmed_completed');
            $table->dropColumn('confirmed');
        });
    }
}
