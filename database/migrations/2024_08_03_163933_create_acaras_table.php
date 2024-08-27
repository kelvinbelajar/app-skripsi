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
        Schema::create('acaras', function (Blueprint $table) {
            $table->id();
            $table->string('nama_acara');
            $table->string('deskripsi');
            $table->string('gambar');
            $table->unsignedBigInteger('id_eo');
            $table->string('estimasi_pengunjung');
            $table->string('biaya_tiket');
            $table->string('anggaran');
            $table->timestamps();

            // foreign key
            $table->foreign('id_eo')->references('id')->on('event_organizers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acaras');
    }
};
