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
        Schema::table('users', function (Blueprint $table) {
            // $table->string('photo')->nullable();
            $table->string('photo')->default('storage/users/profile.png');
            $table->string('job')->nullable();
            $table->string('place')->nullable();
            $table->string('membership')->default('basic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('photo');
            $table->dropColumn('job');
            $table->dropColumn('place');
            $table->dropColumn('membership');
        });
    }
};
