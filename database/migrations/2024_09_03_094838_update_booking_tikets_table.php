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
        Schema::table('booking_tikets', function (Blueprint $table) {
            // Drop the existing 'bukti_bayar' column
            $table->dropColumn('bukti_bayar');

            // Add 'status_bayar' column with ENUM type
            $table->enum('status_bayar', ['Sudah Bayar', 'Belum Bayar'])
                  ->default('Belum Bayar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booking_tikets', function (Blueprint $table) {
            // Revert to the previous schema
            $table->string('bukti_bayar');

            // Drop the 'status_bayar' column
            $table->dropColumn('status_bayar');
        });
    }
};
