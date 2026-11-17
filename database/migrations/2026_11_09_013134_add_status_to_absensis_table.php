<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('absensis', 'status')) {
            Schema::table('absensis', function (Blueprint $table) {
                $table->enum('status', ['hadir', 'izin', 'sakit', 'alpa'])
                      ->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('absensis', 'status')) {
            Schema::table('absensis', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }
    }
};