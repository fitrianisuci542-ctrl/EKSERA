<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('pembinas')) {
            Schema::create('pembinas', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')
                    ->nullable()
                    ->unique()
                    ->constrained('users')
                    ->nullOnDelete();
                $table->string('nama')->nullable();
                $table->string('email')->nullable()->unique();
                $table->string('no_hp', 20)->nullable();
                $table->string('bidang')->nullable();
                $table->text('alamat')->nullable();
                $table->timestamps();
            });

            return;
        }

        Schema::table('pembinas', function (Blueprint $table) {
            if (!Schema::hasColumn('pembinas', 'nama')) {
                $table->string('nama')->nullable();
            }

            if (!Schema::hasColumn('pembinas', 'email')) {
                $table->string('email')->nullable()->unique();
            }

            if (!Schema::hasColumn('pembinas', 'no_hp')) {
                $table->string('no_hp', 20)->nullable();
            }

            if (!Schema::hasColumn('pembinas', 'bidang')) {
                $table->string('bidang')->nullable();
            }

            if (!Schema::hasColumn('pembinas', 'alamat')) {
                $table->text('alamat')->nullable();
            }
        });
    }

    public function down(): void
    {
        // Tidak menghapus kolom agar data tetap aman.
    }
};