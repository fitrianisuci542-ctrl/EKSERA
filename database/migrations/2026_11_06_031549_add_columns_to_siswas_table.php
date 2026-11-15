<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->string('nis', 30)->unique();
            $table->string('nama');
            $table->string('kelas', 50);
            $table->string('jurusan', 100);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('no_hp', 20)->nullable();
            $table->text('alamat')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropUnique(['nis']);
            $table->dropColumn([
                'nis',
                'nama',
                'kelas',
                'jurusan',
                'jenis_kelamin',
                'no_hp',
                'alamat'
            ]);
        });
    }
};