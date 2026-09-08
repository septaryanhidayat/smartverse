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
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'features')) {
                $table->json('features')->nullable()->after('solution');
            }
            if (!Schema::hasColumn('projects', 'app_type')) {
                $table->string('app_type', 50)->default('web')->after('features');
            }
            if (!Schema::hasColumn('projects', 'status_badge')) {
                $table->string('status_badge', 100)->nullable()->after('app_type');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'features')) {
                $table->dropColumn('features');
            }
            if (Schema::hasColumn('projects', 'app_type')) {
                $table->dropColumn('app_type');
            }
            if (Schema::hasColumn('projects', 'status_badge')) {
                $table->dropColumn('status_badge');
            }
        });
    }
};
