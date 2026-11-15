
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('ekskuls', 'pembina')) {
            Schema::table('ekskuls', function (Blueprint $table) {
                $table->string('pembina')->nullable();
            });
        }

        if (!Schema::hasColumn('ekskuls', 'hari')) {
            Schema::table('ekskuls', function (Blueprint $table) {
                $table->string('hari')->nullable();
            });
        }

        if (!Schema::hasColumn('ekskuls', 'jam_mulai')) {
            Schema::table('ekskuls', function (Blueprint $table) {
                $table->string('jam_mulai')->nullable();
            });
        }

        if (!Schema::hasColumn('ekskuls', 'jam_selesai')) {
            Schema::table('ekskuls', function (Blueprint $table) {
                $table->string('jam_selesai')->nullable();
            });
        }

        if (!Schema::hasColumn('ekskuls', 'lokasi')) {
            Schema::table('ekskuls', function (Blueprint $table) {
                $table->string('lokasi')->nullable();
            });
        }

        if (!Schema::hasColumn('ekskuls', 'kuota')) {
            Schema::table('ekskuls', function (Blueprint $table) {
                $table->integer('kuota')->nullable();
            });
        }

        if (!Schema::hasColumn('ekskuls', 'deskripsi')) {
            Schema::table('ekskuls', function (Blueprint $table) {
                $table->text('deskripsi')->nullable();
            });
        }
    }

    public function down(): void
    {
        // Kolom tidak dihapus agar data tetap aman.
    }
};
