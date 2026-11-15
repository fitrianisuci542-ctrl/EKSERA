<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            if (!Schema::hasColumn('events', 'nama_event')) {
                $table->string('nama_event');
            }

            if (!Schema::hasColumn('events', 'deskripsi')) {
                $table->text('deskripsi')->nullable();
            }

            if (!Schema::hasColumn('events', 'tanggal')) {
                $table->date('tanggal')->nullable();
            }

            if (!Schema::hasColumn('events', 'jam_mulai')) {
                $table->time('jam_mulai')->nullable();
            }

            if (!Schema::hasColumn('events', 'jam_selesai')) {
                $table->time('jam_selesai')->nullable();
            }

            if (!Schema::hasColumn('events', 'lokasi')) {
                $table->string('lokasi')->nullable();
            }

            if (!Schema::hasColumn('events', 'penyelenggara')) {
                $table->string('penyelenggara')->nullable();
            }

            if (!Schema::hasColumn('events', 'foto')) {
                $table->string('foto')->nullable();
            }

            if (!Schema::hasColumn('events', 'status')) {
                $table->enum('status', [
                    'akan_datang',
                    'berlangsung',
                    'selesai'
                ])->default('akan_datang');
            }
        });
    }

    public function down(): void
    {
        // Tidak menghapus kolom agar data Event tetap aman.
    }
};