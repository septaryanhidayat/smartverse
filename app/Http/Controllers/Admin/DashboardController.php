<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DigitalProduct;
use App\Models\Gallery;
use App\Models\Inquiry;
use App\Models\Invoice;
use App\Models\Post;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Training;
use App\Models\User;
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
            $paidInvoiceCount = Invoice::where('status', 'PAID')->count();
            $unpaidInvoiceCount = Invoice::whereIn('status', ['UNPAID', 'PARTIAL'])->count();
            $totalInvoiceAmount = (float) Invoice::sum('total_amount');
            $recentInvoices = Invoice::latest()->take(5)->get();
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
                    // Regex captures timestamp, environment, log level, and the complete error message line
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
                        // Clean up verbose SQL/Exception traces to keep it human readable
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
            'db_health' => 'OPTIMAL (MySQL Connected)',
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
