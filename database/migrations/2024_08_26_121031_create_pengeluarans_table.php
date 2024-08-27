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
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_acara');
            $table->date('tanggal_pengeluaran');
            $table->integer('nominal_pengeluaran');
            $table->string('bukti_pengeluaran');
            $table->timestamps();

            $table->foreign('id_acara')->references('id')->on('acaras');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};
