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
        Schema::table('acara_details', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['id_jenis']);
            
            // Drop the column
            $table->dropColumn('id_jenis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('acara_details', function (Blueprint $table) {
            // Add the column back
            $table->unsignedBigInteger('id_jenis');

            // Re-add the foreign key constraint
            $table->foreign('id_jenis')->references('id')->on('jenis')->onDelete('cascade');
        });
    }
};
