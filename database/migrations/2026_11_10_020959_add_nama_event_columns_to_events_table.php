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
                $table->string('nama_event')->nullable();
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
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $columns = [
                'nama_event',
                'deskripsi',
                'tanggal',
                'jam_mulai',
                'jam_selesai',
                'lokasi',
                'penyelenggara',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('events', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};