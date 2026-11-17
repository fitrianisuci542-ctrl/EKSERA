
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('siswas')) {
            Schema::create('siswas', function (Blueprint $table) {
                $table->id();
                $table->string('nis', 30)->unique();
                $table->string('nama');
                $table->string('kelas', 50)->nullable();
                $table->string('jurusan', 100)->nullable();
                $table->string('jenis_kelamin', 20)->nullable();
                $table->string('email')->nullable();
                $table->string('no_hp', 20)->nullable();
                $table->text('alamat')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
