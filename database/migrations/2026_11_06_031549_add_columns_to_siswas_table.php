<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            if (!Schema::hasColumn('siswas', 'nis')) {
                $table->string('nis', 30)->unique();
            }

            if (!Schema::hasColumn('siswas', 'nama')) {
                $table->string('nama');
            }

            if (!Schema::hasColumn('siswas', 'kelas')) {
                $table->string('kelas', 50);
            }

            if (!Schema::hasColumn('siswas', 'jurusan')) {
                $table->string('jurusan', 100);
            }

            if (!Schema::hasColumn('siswas', 'jenis_kelamin')) {
                $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            }

            if (!Schema::hasColumn('siswas', 'no_hp')) {
                $table->string('no_hp', 20)->nullable();
            }

            if (!Schema::hasColumn('siswas', 'alamat')) {
                $table->text('alamat')->nullable();
            }
        });
    }

    public function down(): void
    {
        // Tidak menghapus kolom agar data tetap aman.
    }
};