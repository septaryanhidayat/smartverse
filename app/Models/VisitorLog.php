<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VisitorLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'session_id',
        'device_type',
        'browser',
        'os',
        'url',
        'page_title',
        'referer',
        'traffic_source',
        'country',
        'city',
        'user_agent',
    ];

    /**
     * Self-healing table check to guarantee zero-terminal execution
     */
    public static function ensureTableExists(): void
    {
        if (!Schema::hasTable('visitor_logs')) {
            Schema::create('visitor_logs', function (Blueprint $table) {
                $table->id();
                $table->string('ip_address', 45)->index();
                $table->string('session_id', 100)->nullable()->index();
                $table->string('device_type', 20)->default('Desktop')->index();
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
    }

    /**
     * Scope for real-time active users (default last 5 minutes)
     */
    public function scopeActiveOnline($query, int $minutes = 5)
    {
        return $query->where('created_at', '>=', Carbon::now()->subMinutes($minutes));
    }

    /**
     * Scope query based on time period
     */
    public function scopePeriod($query, string $period = '7_days')
    {
        return match ($period) {
            'today' => $query->whereDate('created_at', Carbon::today()),
            '7_days' => $query->where('created_at', '>=', Carbon::now()->subDays(7)),
            '30_days' => $query->where('created_at', '>=', Carbon::now()->subDays(30)),
            'this_month' => $query->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year),
            default => $query,
        };
    }

    /**
     * Get branding total visitor count (Offset baseline + actual logs)
     */
    public static function getDisplayVisitorCount(): int
    {
        static::ensureTableExists();
        $baseOffset = (int) Setting::getValue('visitor_offset', '153563');
        $realHits = static::count();
        return $baseOffset + $realHits;
    }

    /**
     * Get formatted display count (e.g. "153.563")
     */
    public static function getFormattedDisplayVisitorCount(): string
    {
        return number_format(static::getDisplayVisitorCount(), 0, ',', '.');
    }

    /**
     * Get real-time active users count in last 5 minutes
     */
    public static function getRealOnlineCount(): int
    {
        static::ensureTableExists();
        $online = static::where('created_at', '>=', Carbon::now()->subMinutes(5))
            ->distinct('session_id')
            ->count('session_id');

        return max(1, $online);
    }
}
