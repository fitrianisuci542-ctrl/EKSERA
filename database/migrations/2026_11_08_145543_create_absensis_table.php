<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pendaftaran_id')
                ->constrained('pendaftarans')
                ->cascadeOnDelete();

            $table->foreignId('pembina_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->date('tanggal');

            $table->enum('status', [
                'hadir',
                'izin',
                'sakit',
                'alpa'
            ]);

            $table->text('catatan')->nullable();

            $table->timestamps();

            $table->unique(
                ['pendaftaran_id', 'tanggal'],
                'absensi_pendaftaran_tanggal_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};