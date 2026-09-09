<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\VisitorLog;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAnalyticsController extends Controller
{
    public function index(Request $request)
    {
        VisitorLog::ensureTableExists();

        $period = $request->query('period', '7_days');
        if (!in_array($period, ['today', '7_days', '30_days', 'all'])) {
            $period = '7_days';
        }

        // Base Query with Period Scope
        $query = VisitorLog::period($period);

        // 1. Metric Cards
        $totalOffset = (int) Setting::getValue('visitor_offset', '153563');
        $allTimeHits = VisitorLog::count();
        $totalDisplayCount = $totalOffset + $allTimeHits;

        $periodHits = (clone $query)->count();
        $uniqueVisitors = (clone $query)->distinct('ip_address')->count('ip_address');
        $activeOnline = VisitorLog::getRealOnlineCount();

        $deviceCounts = (clone $query)->select('device_type', DB::raw('count(*) as total'))
            ->groupBy('device_type')
            ->pluck('total', 'device_type')
            ->toArray();

        $mobileCount = $deviceCounts['Mobile'] ?? 0;
        $desktopCount = $deviceCounts['Desktop'] ?? 0;
        $tabletCount = $deviceCounts['Tablet'] ?? 0;
        $totalDevices = max(1, $periodHits);

        $mobilePercentage = round(($mobileCount / $totalDevices) * 100, 1);
        $desktopPercentage = round(($desktopCount / $totalDevices) * 100, 1);
        $tabletPercentage = round(($tabletCount / $totalDevices) * 100, 1);

        // 2. Dual-Line Chart Data (Trend Kunjungan & Pengunjung Unik)
        $chartData = $this->generateTrendChartData($period);

        // 3. Top 10 Halaman & Artikel Populer
        $topPages = (clone $query)->select('url', 'page_title', DB::raw('count(*) as views'))
            ->groupBy('url', 'page_title')
            ->orderByDesc('views')
            ->take(10)
            ->get();

        // 4. Sumber Asal Kunjungan (Traffic Sources)
        $rawTrafficSources = (clone $query)->select('traffic_source', DB::raw('count(*) as count'))
            ->groupBy('traffic_source')
            ->orderByDesc('count')
            ->get();

        $trafficSources = $rawTrafficSources->map(function ($item) use ($totalDevices) {
            $item->percentage = round(($item->count / $totalDevices) * 100, 1);
            return $item;
        });

        // 5. Asal Wilayah Geografis Pengunjung
        $rawLocations = (clone $query)->select('city', 'country', DB::raw('count(*) as count'))
            ->groupBy('city', 'country')
            ->orderByDesc('count')
            ->take(10)
            ->get();

        $locations = $rawLocations->map(function ($item) use ($totalDevices) {
            $item->percentage = round(($item->count / $totalDevices) * 100, 1);
            return $item;
        });

        // 6. Browser Distribution
        $rawBrowsers = (clone $query)->select('browser', DB::raw('count(*) as count'))
            ->groupBy('browser')
            ->orderByDesc('count')
            ->take(6)
            ->get();

        $browsers = $rawBrowsers->map(function ($item) use ($totalDevices) {
            $item->percentage = round(($item->count / $totalDevices) * 100, 1);
            return $item;
        });

        // 7. Log Kunjungan Terbaru (50 Log Terakhir)
        $recentLogs = VisitorLog::latest()->take(50)->get();

        return view('admin.analytics.index', compact(
            'period',
            'totalDisplayCount',
            'allTimeHits',
            'totalOffset',
            'periodHits',
            'uniqueVisitors',
            'activeOnline',
            'mobilePercentage',
            'desktopPercentage',
            'tabletPercentage',
            'mobileCount',
            'desktopCount',
            'tabletCount',
            'totalDevices',
            'chartData',
            'topPages',
            'trafficSources',
            'locations',
            'browsers',
            'recentLogs'
        ));
    }

    /**
     * Generate chart labels and datasets for Chart.js
     */
    protected function generateTrendChartData(string $period): array
    {
        $labels = [];
        $pageviews = [];
        $uniques = [];

        if ($period === 'today') {
            // Group by every 2 hours of today
            $today = Carbon::today();
            for ($hour = 0; $hour < 24; $hour += 2) {
                $start = $today->copy()->setHour($hour)->setMinute(0)->setSecond(0);
                $end = $start->copy()->addHours(2)->subSecond();

                $labels[] = sprintf('%02d:00', $hour);

                $pageviews[] = VisitorLog::whereBetween('created_at', [$start, $end])->count();
                $uniques[] = VisitorLog::whereBetween('created_at', [$start, $end])->distinct('ip_address')->count('ip_address');
            }
        } elseif ($period === '30_days') {
            // Daily for past 30 days
            $startDate = Carbon::now()->subDays(29)->startOfDay();
            $endDate = Carbon::now()->endOfDay();
            $datePeriod = CarbonPeriod::create($startDate, '1 day', $endDate);

            foreach ($datePeriod as $date) {
                $dayStart = $date->copy()->startOfDay();
                $dayEnd = $date->copy()->endOfDay();

                $labels[] = $date->isoFormat('D MMM');
                $pageviews[] = VisitorLog::whereBetween('created_at', [$dayStart, $dayEnd])->count();
                $uniques[] = VisitorLog::whereBetween('created_at', [$dayStart, $dayEnd])->distinct('ip_address')->count('ip_address');
            }
        } elseif ($period === 'all') {
            // Last 6 months or past 12 weeks
            $startDate = Carbon::now()->subWeeks(11)->startOfWeek();
            $endDate = Carbon::now()->endOfWeek();
            $weekPeriod = CarbonPeriod::create($startDate, '1 week', $endDate);

            foreach ($weekPeriod as $week) {
                $wStart = $week->copy()->startOfWeek();
                $wEnd = $week->copy()->endOfWeek();

                $labels[] = 'Mg ' . $week->isoFormat('D MMM');
                $pageviews[] = VisitorLog::whereBetween('created_at', [$wStart, $wEnd])->count();
                $uniques[] = VisitorLog::whereBetween('created_at', [$wStart, $wEnd])->distinct('ip_address')->count('ip_address');
            }
        } else {
            // Default 7_days
            $startDate = Carbon::now()->subDays(6)->startOfDay();
            $endDate = Carbon::now()->endOfDay();
            $datePeriod = CarbonPeriod::create($startDate, '1 day', $endDate);

            foreach ($datePeriod as $date) {
                $dayStart = $date->copy()->startOfDay();
                $dayEnd = $date->copy()->endOfDay();

                $labels[] = $date->isoFormat('D MMM');
                $pageviews[] = VisitorLog::whereBetween('created_at', [$dayStart, $dayEnd])->count();
                $uniques[] = VisitorLog::whereBetween('created_at', [$dayStart, $dayEnd])->distinct('ip_address')->count('ip_address');
            }
        }

        return [
            'labels' => $labels,
            'pageviews' => $pageviews,
            'uniques' => $uniques,
        ];
    }

    /**
     * Clean logs older than 30 days to maintain high performance
     */
    public function cleanOldLogs(Request $request)
    {
        $deleted = VisitorLog::where('created_at', '<', Carbon::now()->subDays(30))->delete();

        return redirect()->route('admin.analytics.index')
            ->with('success', "Pembersihan log berhasil: Sebanyak {$deleted} riwayat log kunjungan yang berusia lebih dari 30 hari telah dihapus.");
    }
}
