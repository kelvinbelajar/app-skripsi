<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_acara');
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->time('waktu_mulai');
            $table->time('waktu_akhir');
            $table->timestamps();
        });
        //foreign key
        Schema::table('jadwals', function (Blueprint $table) {
            $table->foreign('id_acara')->references('id')->on('acaras');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
