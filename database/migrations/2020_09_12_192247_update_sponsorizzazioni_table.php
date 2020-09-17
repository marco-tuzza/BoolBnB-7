<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSponsorizzazioniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sponsorizzazioni', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pagamento')->nullable()->after('id');
            $table->foreign('id_pagamento')->references('id')->on('pagamenti');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sponsorizzazioni', function (Blueprint $table) {
            //
        });
    }
}
