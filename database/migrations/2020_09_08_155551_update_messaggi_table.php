<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMessaggiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messaggi', function (Blueprint $table) {
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
        Schema::table('messaggi', function (Blueprint $table) {
            //
        });
    }
}
