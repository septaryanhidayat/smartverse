<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('visitor_logs')) {
            Schema::create('visitor_logs', function (Blueprint $table) {
                $table->id();
                $table->string('ip_address', 45)->index();
                $table->string('session_id', 100)->nullable()->index();
                $table->string('device_type', 20)->default('Desktop')->index(); // Desktop, Mobile, Tablet
                $table->string('browser', 50)->default('Chrome');
                $table->string('os', 50)->default('Windows');
                $table->string('url', 500);
                $table->string('page_title', 255)->default('Beranda');
                $table->text('referer')->nullable();
                $table->string('traffic_source', 100)->default('Langsung (Direct)')->index();
                $table->string('country', 100)->default('Indonesia');
                $table->string('city', 100)->default('Palembang');
                $table->text('user_agent')->nullable();
                $table->timestamps();

                $table->index('created_at');
            });
        }

        // Insert default visitor_offset setting if not exists
        if (Schema::hasTable('settings')) {
            $exists = DB::table('settings')->where('key', 'visitor_offset')->exists();
            if (!$exists) {
                DB::table('settings')->insert([
                    'key' => 'visitor_offset',
                    'value' => '153563',
                    'group' => 'general',
                    'label' => 'Offset Baseline Pengunjung (Branding Counter)',
                    'type' => 'number',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_logs');
    }
};
