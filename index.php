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
    die("<h3>Error: vendor/autoload.php not found.</h3>");
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
