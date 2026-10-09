<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('settings')) {
            try {
                Schema::table('settings', function (Blueprint $table) {
                    $table->longText('value')->nullable()->change();
                });
            } catch (\Throwable $e) {
                // Ignore if SQLite or already longText
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('settings')) {
            try {
                Schema::table('settings', function (Blueprint $table) {
                    $table->text('value')->nullable()->change();
                });
            } catch (\Throwable $e) {
                // Ignore
            }
        }
    }
};
