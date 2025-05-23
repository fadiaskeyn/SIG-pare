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
        Schema::create('kunjungan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('device_id'); // Bisa menyimpan IPv4 (15 char) atau IPv6 (45 char)
            $table->timestamps();

            // Foreign key constraint
            $table->foreignId('kursus_id')
                ->nullable()
                ->constrained('data_kursus')
                ->onDelete('cascade') // Hapus kunjungan jika kursus dihapus
                ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kunjungan');
    }
};
