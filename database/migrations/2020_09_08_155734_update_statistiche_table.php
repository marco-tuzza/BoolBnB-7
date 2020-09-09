<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStatisticheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('statistiche', function (Blueprint $table) {
            $table->unsignedBigInteger('id_appartamento')->nullable()->after('id');
            $table->foreign('id_appartamento')->references('id')->on('appartamenti');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('statistiche', function (Blueprint $table) {
            //
        });
    }
}
