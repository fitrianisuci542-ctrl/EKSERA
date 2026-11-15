<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $columns = Schema::getColumnListing('events');

        Schema::table('events', function (Blueprint $table) use ($columns) {
            if (!in_array('deskripsi', $columns)) {
                $table->text('deskripsi')->nullable();
            }

            if (!in_array('tanggal', $columns)) {
                $table->date('tanggal')->nullable();
            }

            if (!in_array('jam_mulai', $columns)) {
                $table->time('jam_mulai')->nullable();
            }

            if (!in_array('jam_selesai', $columns)) {
                $table->time('jam_selesai')->nullable();
            }

            if (!in_array('lokasi', $columns)) {
                $table->string('lokasi')->nullable();
            }

            if (!in_array('penyelenggara', $columns)) {
                $table->string('penyelenggara')->nullable();
            }

            if (!in_array('foto', $columns)) {
                $table->string('foto')->nullable();
            }

            if (!in_array('status', $columns)) {
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
        // Data dan kolom tidak dihapus.
    }
};