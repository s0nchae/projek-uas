<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kalkulator', function (Blueprint $table) {
            $table->id();
            $table->integer('bungkus_per_hari');
            $table->integer('harga_per_bungkus');
            $table->integer('lama_bulan_merokok');
            $table->integer('total_per_hari');
            $table->integer('total_per_bulan');
            $table->integer('total_uang');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kalkulator');
    }
};