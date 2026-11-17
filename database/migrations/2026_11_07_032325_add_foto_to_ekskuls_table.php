<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ekskuls', function (Blueprint $table) {
            if (!Schema::hasColumn('ekskuls', 'foto')) {
                $table->string('foto')->nullable();
            }

            $table->integer('kuota')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('ekskuls', function (Blueprint $table) {
            $table->dropColumn('foto');
            $table->integer('kuota')->nullable(false)->change();
        });
    }
};