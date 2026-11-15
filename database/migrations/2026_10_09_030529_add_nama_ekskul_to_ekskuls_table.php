<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $columns = [
            'pembina' => fn ($table) => $table->string('pembina')->nullable(),
            'hari' => fn ($table) => $table->string('hari')->nullable(),
            'jam_mulai' => fn ($table) => $table->string('jam_mulai')->nullable(),
            'jam_selesai' => fn ($table) => $table->string('jam_selesai')->nullable(),
            'lokasi' => fn ($table) => $table->string('lokasi')->nullable(),
            'kuota' => fn ($table) => $table->integer('kuota')->nullable(),
            'deskripsi' => fn ($table) => $table->text('deskripsi')->nullable(),
        ];

        foreach ($columns as $column => $definition) {
            if (!Schema::hasColumn('ekskuls', $column)) {
                Schema::table('ekskuls', $definition);
            }
        }
    }

    public function down(): void
    {
        // Tidak menghapus kolom agar data tetap aman.
    }
};