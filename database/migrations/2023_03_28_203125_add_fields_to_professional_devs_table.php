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
        Schema::table('profesional_devs', function (Blueprint $table) {
            $table->date('date')->nullable();
            $table->string('venue')->nullable();
            $table->string('cost')->nullable();
            $table->text('course_objectives')->nullable();
            $table->text('target_audience')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profesional_devs', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('venue');
            $table->dropColumn('cost');
            $table->dropColumn('course_objectives');
            $table->dropColumn('target_audience');
        });
    }
};
