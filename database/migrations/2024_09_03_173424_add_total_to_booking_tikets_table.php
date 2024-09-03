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
            $table->string('status_bayar')->after('email');
            $table->decimal('total', 15, 2)->after('status_bayar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booking_tikets', function (Blueprint $table) {
            $table->dropColumn('status_bayar');
            $table->dropColumn('total');
        });
    }
};
