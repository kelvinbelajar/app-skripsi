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
        Schema::create('acara_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_eo');
            $table->unsignedBigInteger('id_acara');
            $table->unsignedBigInteger('id_jenis');
            $table->unsignedBigInteger('id_jadwal');
            $table->unsignedBigInteger('id_lokasi');
            $table->timestamps();

            //foreign key
            $table->foreign('id_eo')->references('id')->on('event_organizers')->onDelete('cascade');
            $table->foreign('id_acara')->references('id')->on('acaras')->onDelete('cascade');
            $table->foreign('id_jenis')->references('id')->on('jenis')->onDelete('cascade');
            $table->foreign('id_jadwal')->references('id')->on('jadwals')->onDelete('cascade');
            $table->foreign('id_lokasi')->references('id')->on('lokasis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acara_details');
    }
};
