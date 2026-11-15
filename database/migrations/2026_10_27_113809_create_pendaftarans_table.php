<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('ekskul_id')
                ->constrained('ekskuls')
                ->cascadeOnDelete();

            $table->string('status')->default('menunggu');
            $table->text('catatan')->nullable();

            $table->timestamps();

            $table->unique(
                ['user_id', 'ekskul_id'],
                'pendaftaran_user_ekskul_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};