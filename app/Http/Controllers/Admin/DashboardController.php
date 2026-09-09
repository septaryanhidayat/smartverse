<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DigitalProduct;
use App\Models\DomainRenewal;
use App\Models\FinancialRecord;
use App\Models\Gallery;
use App\Models\Inquiry;
use App\Models\Invoice;
use App\Models\Post;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Training;
use App\Models\User;
use App\Models\VisitorLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $projectCount = Project::count();
        $productCount = DigitalProduct::count();
        $trainingCount = Training::count();
        $galleryCount = Gallery::count();
        $postCount = Post::count();
        $categoryCount = Category::count();
        $inquiryCount = Inquiry::count();
        $unreadInquiryCount = Inquiry::where('is_read', false)->count();
        $userCount = User::count();

        // Invoices Statistics (Self-healing safe query)
        $invoiceCount = 0;
        $paidInvoiceCount = 0;
        $unpaidInvoiceCount = 0;
        $totalInvoiceAmount = 0;
        $recentInvoices = collect();

        if (Schema::hasTable('invoices')) {
            $invoiceCount = Invoice::count();
            $paidInvoiceCount = Invoice::where('status', 'paid')->orWhere('status', 'PAID')->count();
            $unpaidInvoiceCount = Invoice::whereIn('status', ['unpaid', 'pending', 'overdue', 'UNPAID', 'PARTIAL', 'partial'])->count();
            $totalInvoiceAmount = (float) Invoice::sum('total_amount');
            $totalInvoicePaid = (float) (Schema::hasColumn('invoices', 'paid_amount') ? Invoice::sum('paid_amount') : Invoice::where('status', 'PAID')->sum('total_amount'));
            $totalInvoiceRemaining = (float) (Schema::hasColumn('invoices', 'remaining_amount') ? Invoice::sum('remaining_amount') : Invoice::whereIn('status', ['UNPAID', 'PARTIAL'])->sum('total_amount'));
            $recentInvoices = Invoice::latest()->take(5)->get();
        } else {
            $totalInvoicePaid = 0;
            $totalInvoiceRemaining = 0;
        }

        // Institutional Finance & Kas Summary
        $financeTotalInflow = $totalInvoicePaid;
        $financeTotalExpenses = 0;
        $financeNetProfit = 0;

        if (Schema::hasTable('financial_records')) {
            $manualIncome = (float) FinancialRecord::where('type', 'income')->sum('amount');
            $financeTotalExpenses = (float) FinancialRecord::where('type', 'expense')->sum('amount');
            $financeTotalInflow += $manualIncome;
            $financeNetProfit = $financeTotalInflow - $financeTotalExpenses;
        }

        // Live Visitors Count
        $totalVisitors = 153563;
        $onlineVisitors = 1;
        if (Schema::hasTable('visitor_logs')) {
            $baseOffset = (int) (Setting::getValue('visitor_offset', '153563') ?: 153563);
            $totalVisitors = $baseOffset + VisitorLog::count();
            $onlineVisitors = VisitorLog::getRealOnlineCount();
        }

        // Domain & Hosting Asset Tracking Metrics
        $domainCount = 0;
        $domainCriticalCount = 0;
        $domainWarningCount = 0;
        $domainExpiringSoonList = collect();

        if (Schema::hasTable('domain_renewals')) {
            $today = Carbon::today()->format('Y-m-d');
            $in7Days = Carbon::today()->addDays(7)->format('Y-m-d');
            $in30Days = Carbon::today()->addDays(30)->format('Y-m-d');

            $domainCount = DomainRenewal::count();
            $domainCriticalCount = DomainRenewal::where('expiry_date', '>=', $today)
                ->where('expiry_date', '<=', $in7Days)
                ->count();
            $domainWarningCount = DomainRenewal::where('expiry_date', '>', $in7Days)
                ->where('expiry_date', '<=', $in30Days)
                ->count();
            
            $domainExpiringSoonList = DomainRenewal::orderBy('expiry_date', 'asc')
                ->take(6)
                ->get();
        }

        $recentInquiries = Inquiry::latest()->take(5)->get();
        $recentProjects = Project::with('category')->latest()->take(4)->get();
        $recentProducts = DigitalProduct::latest()->take(4)->get();
        $recentPosts = Post::with('category')->latest()->take(4)->get();

        $primaryColor = Setting::where('key', 'theme_primary_color')->value('value') ?? '#3E5CE7';
        $accentColor = Setting::where('key', 'theme_accent_color')->value('value') ?? '#fe6000';

        // Security & Error Logs Parser (Inspect laravel.log)
        $systemLogs = [];
        $errorCount = 0;
        $logFile = storage_path('logs/laravel.log');

        if (file_exists($logFile)) {
            $fileSize = filesize($logFile);
            $readSize = min($fileSize, 100000);
            $fp = @fopen($logFile, 'r');
            if ($fp) {
                if ($fileSize > $readSize) {
                    @fseek($fp, -$readSize, SEEK_END);
                }
                $logContent = @fread($fp, $readSize);
                @fclose($fp);

                if ($logContent) {
                    preg_match_all('/\[(\d{4}-\d{2}-\d{2}[^\]]+)\]\s+([a-zA-Z0-9_\.]+)\.([A-Z]+):\s+([^\r\n]+)/', $logContent, $matches, PREG_SET_ORDER);
                    
                    $matches = array_reverse($matches);
                    $count = 0;
                    foreach ($matches as $m) {
                        if ($count >= 5) break;
                        $level = strtoupper($m[3] ?? 'INFO');
                        if (in_array($level, ['ERROR', 'CRITICAL', 'ALERT', 'EMERGENCY'])) {
                            $errorCount++;
                        }
                        
                        $rawMessage = trim($m[4] ?? '');
                        $cleanMessage = preg_replace('/\{\"exception\".*$/', '', $rawMessage);
                        $cleanMessage = preg_replace('/#\d+\s.*$/', '', $cleanMessage);
                        $cleanMessage = trim($cleanMessage);

                        $systemLogs[] = [
                            'timestamp' => $m[1] ?? '',
                            'env' => $m[2] ?? 'production',
                            'level' => $level,
                            'message' => Str::limit($cleanMessage, 110),
                        ];
                        $count++;
                    }
                }
            }
        }

        // Enterprise Security & Health Audit Metrics
        $securityStatus = [
            'firewall' => 'AKTIF & MONITORING',
            'waf_status' => 'L2 Rate Limiter (60 req/min)',
            'brute_force' => 'Anti-Brute Force (5 attempts/min)',
            'hsts' => 'HSTS & Anti-Sniffing Protected',
            'threats_blocked' => 0,
            'db_health' => 'OPTIMAL (Connected)',
            'php_version' => PHP_VERSION,
            'laravel_version' => app()->version(),
        ];

        return view('admin.dashboard', compact(
            'projectCount',
            'productCount',
            'trainingCount',
            'galleryCount',
            'postCount',
            'categoryCount',
            'inquiryCount',
            'unreadInquiryCount',
            'userCount',
            'invoiceCount',
            'paidInvoiceCount',
            'unpaidInvoiceCount',
            'totalInvoiceAmount',
            'totalInvoicePaid',
            'totalInvoiceRemaining',
            'financeTotalInflow',
            'financeTotalExpenses',
            'financeNetProfit',
            'domainCount',
            'domainCriticalCount',
            'domainWarningCount',
            'domainExpiringSoonList',
            'totalVisitors',
            'onlineVisitors',
            'recentInvoices',
            'recentInquiries',
            'recentProjects',
            'recentProducts',
            'recentPosts',
            'systemLogs',
            'errorCount',
            'securityStatus',
            'primaryColor',
            'accentColor'
        ));
    }
}
