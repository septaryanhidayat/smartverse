<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Enable error reporting during bootstrapping for diagnostics
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Locate basePath
$basePath = file_exists(__DIR__ . '/bootstrap/app.php') ? __DIR__ : (file_exists(__DIR__ . '/../bootstrap/app.php') ? dirname(__DIR__) : __DIR__);

// Auto-create essential storage subdirectories
$storageFolders = [
    $basePath . '/storage/framework/views',
    $basePath . '/storage/framework/sessions',
    $basePath . '/storage/framework/cache',
    $basePath . '/storage/logs',
    $basePath . '/bootstrap/cache',
];
foreach ($storageFolders as $folder) {
    if (!is_dir($folder)) {
        @mkdir($folder, 0775, true);
    }
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = $basePath . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader dynamically
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require __DIR__ . '/vendor/autoload.php';
} elseif (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require __DIR__ . '/../vendor/autoload.php';
} else {
    http_response_code(503);
    echo '<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartVerse • Inisialisasi Server Diperlukan</title>
    <style>
        body { font-family: system-ui, -apple-system, sans-serif; background: #07153f; color: #f8fafc; margin: 0; padding: 2rem 1rem; display: flex; align-items: center; justify-content: center; min-height: 100vh; box-sizing: border-box; }
        .card { background: #0f172a; border: 1px solid #1e293b; border-radius: 1.25rem; max-width: 720px; width: 100%; padding: 2.25rem; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5); }
        .badge { display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(59,130,246,0.15); color: #60a5fa; border: 1px solid rgba(59,130,246,0.3); font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; padding: 0.35rem 0.75rem; border-radius: 9999px; margin-bottom: 1rem; }
        h1 { font-size: 1.5rem; font-weight: 800; margin: 0 0 0.75rem 0; color: #ffffff; }
        p { color: #94a3b8; font-size: 0.95rem; line-height: 1.6; margin: 0 0 1.25rem 0; }
        .code-box { background: #020617; border: 1px solid #1e293b; border-radius: 0.75rem; padding: 1.25rem; margin: 1rem 0; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace; font-size: 0.85rem; color: #38bdf8; overflow-x: auto; line-height: 1.8; }
        .step-title { font-weight: 700; color: #e2e8f0; font-size: 0.9rem; margin-top: 1rem; margin-bottom: 0.25rem; }
        .btn { display: inline-block; background: #2563eb; color: #ffffff; font-weight: 700; font-size: 0.9rem; text-decoration: none; padding: 0.75rem 1.5rem; border-radius: 0.75rem; border: none; cursor: pointer; transition: 0.2s; margin-top: 1rem; }
        .btn:hover { background: #1d4ed8; }
        .note { font-size: 0.8rem; color: #64748b; margin-top: 1.5rem; border-top: 1px solid #1e293b; padding-top: 1rem; }
    </style>
</head>
<body>
    <div class="card">
        <div class="badge">🚀 SmartVerse Deployment Initializer</div>
        <h1>Inisialisasi Dependensi Vendor Diperlukan</h1>
        <p>Aplikasi SmartVerse telah siap di server, namun dependensi Composer (folder <code>vendor/</code>) belum terpasang. Karena CLI Terminal cPanel Anda saat ini menggunakan PHP 8.1, jalankan perintah instalasi menggunakan binary <strong>EA-PHP 8.4</strong> di Terminal cPanel:</p>
        
        <div class="step-title">Salin & Jalankan di Terminal cPanel:</div>
        <div class="code-box">
            cd /home/pesonaas/repositories/smartverse<br>
            /usr/local/bin/ea-php84 /usr/local/bin/composer install --no-dev --optimize-autoloader<br>
            /usr/local/bin/ea-php84 artisan storage:link<br>
            /usr/local/bin/ea-php84 artisan optimize:clear
        </div>

        <button class="btn" onclick="window.location.reload();">🔄 Refresh Halaman Setelah Selesai</button>

        <div class="note">
            💡 <strong>Info:</strong> Setelah proses <code>composer install</code> selesai, reload halaman ini dan SmartVerse akan langsung aktif dengan PHP 8.4!
        </div>
    </div>
</body>
</html>';
    exit;
}

// Bootstrap Laravel and handle request with exception catcher
try {
    /** @var Application $app */
    $app = require_once $basePath . '/bootstrap/app.php';
    $app->handleRequest(Request::capture());
} catch (\Throwable $e) {
    echo "<div style='font-family: system-ui, sans-serif; padding: 24px; background: #fff1f2; border: 2px solid #e11d48; border-radius: 12px; color: #9f1239; margin: 24px;'>";
    echo "<h2 style='margin-top:0;'>⚠️ Laravel Startup Diagnostic Error</h2>";
    echo "<p><strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . " (Line " . $e->getLine() . ")</p>";
    echo "<pre style='background: #ffe4e6; padding: 16px; border-radius: 8px; overflow-x: auto; font-family: monospace; font-size: 13px;'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</div>";
}
