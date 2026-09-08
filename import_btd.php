<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

echo "=== MEMULAI IMPORT DATABASE TERBARU: database/berandad_db_btd.sql ===\n";

$sqlContent = file_get_contents(__DIR__ . '/database/berandad_db_btd.sql');

function parseSqlValuesStrict($colsStr, $valsStr) {
    $columns = array_map(function($col) {
        return trim(trim($col), '`"');
    }, explode(',', $colsStr));

    $rows = [];
    $len = strlen($valsStr);
    $inString = false;
    $stringChar = '';
    $inTuple = false;
    $currentVal = '';
    $currentRow = [];
    $wasInString = false;

    for ($i = 0; $i < $len; $i++) {
        $ch = $valsStr[$i];

        if ($inString) {
            if ($ch === '\\') {
                if ($i + 1 < $len) {
                    $next = $valsStr[$i + 1];
                    $currentVal .= match($next) {
                        'n' => "\n",
                        'r' => "\r",
                        't' => "\t",
                        '\'' => "'",
                        '"' => '"',
                        '\\' => '\\',
                        '0' => "\0",
                        default => $next
                    };
                    $i++;
                }
                continue;
            }

            if ($ch === $stringChar) {
                if ($i + 1 < $len && $valsStr[$i + 1] === $stringChar) {
                    $currentVal .= $stringChar;
                    $i++;
                    continue;
                }
                $inString = false;
                $wasInString = true;
                continue;
            }

            $currentVal .= $ch;
            continue;
        }

        if ($ch === "'" || $ch === '"') {
            $inString = true;
            $stringChar = $ch;
            $wasInString = true;
            $currentVal = '';
            continue;
        }

        if ($ch === '(' && !$inTuple) {
            $inTuple = true;
            $currentRow = [];
            $currentVal = '';
            $wasInString = false;
            continue;
        }

        if ($ch === ')' && $inTuple) {
            $inTuple = false;
            $currentRow[] = formatValue($currentVal, $wasInString);
            $currentVal = '';
            $wasInString = false;
            if (count($currentRow) === count($columns)) {
                $rows[] = array_combine($columns, $currentRow);
            } else {
                echo "  WARNING: col count mismatch! Cols: " . count($columns) . " vs Vals: " . count($currentRow) . "\n";
            }
            continue;
        }

        if ($ch === ',' && $inTuple) {
            $currentRow[] = formatValue($currentVal, $wasInString);
            $currentVal = '';
            $wasInString = false;
            continue;
        }

        if ($inTuple) {
            $currentVal .= $ch;
        }
    }

    return $rows;
}

function formatValue($val, $wasInString) {
    if (!$wasInString) {
        $trimmed = trim($val);
        if (strtoupper($trimmed) === 'NULL' || $trimmed === '') {
            return null;
        }
        if (is_numeric($trimmed)) {
            return strpos($trimmed, '.') !== false ? (float)$trimmed : (int)$trimmed;
        }
        return $trimmed;
    }
    return $val;
}

DB::statement('PRAGMA foreign_keys = OFF;');

preg_match_all('/INSERT INTO [`"]?([a-zA-Z0-9_]+)[`"]?\s*\((.+?)\)\s*VALUES\s*(.+?\);)(?:\r?\n|$)/is', $sqlContent, $matches, PREG_SET_ORDER);

// Group rows by table
$tableRows = [];
foreach ($matches as $match) {
    $table = $match[1];
    $colsStr = $match[2];
    $valsStr = $match[3];

    if (in_array($table, ['cache', 'cache_locks', 'sessions', 'jobs', 'job_batches', 'failed_jobs', 'migrations', 'password_reset_tokens'])) {
        continue;
    }

    $rows = parseSqlValuesStrict($colsStr, $valsStr);
    if (!isset($tableRows[$table])) {
        $tableRows[$table] = [];
    }
    $tableRows[$table] = array_merge($tableRows[$table], $rows);
}

// 1. Categories
if (isset($tableRows['categories'])) {
    echo "Importing " . count($tableRows['categories']) . " categories...\n";
    DB::table('categories')->truncate();
    foreach ($tableRows['categories'] as $row) {
        DB::table('categories')->insert($row);
    }
}

// 2. Users
if (isset($tableRows['users'])) {
    echo "Importing " . count($tableRows['users']) . " users...\n";
    DB::table('users')->truncate();
    foreach ($tableRows['users'] as $row) {
        DB::table('users')->insert($row);
    }
}

// 3. Posts
if (isset($tableRows['posts'])) {
    echo "Importing " . count($tableRows['posts']) . " posts...\n";
    DB::table('posts')->truncate();
    foreach ($tableRows['posts'] as $row) {
        DB::table('posts')->insert($row);
    }
}

// 4. Projects
if (isset($tableRows['projects'])) {
    echo "Importing " . count($tableRows['projects']) . " projects...\n";
    DB::table('projects')->truncate();
    foreach ($tableRows['projects'] as $row) {
        DB::table('projects')->insert($row);
    }
}

// 5. Galleries
if (isset($tableRows['galleries'])) {
    echo "Importing " . count($tableRows['galleries']) . " galleries...\n";
    DB::table('galleries')->truncate();
    foreach ($tableRows['galleries'] as $row) {
        DB::table('galleries')->insert($row);
    }
}

// 6. Invoices
if (isset($tableRows['invoices'])) {
    echo "Importing " . count($tableRows['invoices']) . " invoices...\n";
    DB::table('invoices')->truncate();
    foreach ($tableRows['invoices'] as $row) {
        DB::table('invoices')->insert($row);
    }
}

// 7. Trainings
if (isset($tableRows['trainings'])) {
    echo "Importing " . count($tableRows['trainings']) . " trainings...\n";
    DB::table('trainings')->truncate();
    foreach ($tableRows['trainings'] as $row) {
        DB::table('trainings')->insert($row);
    }
}

// 8. Settings
if (isset($tableRows['settings'])) {
    echo "Importing " . count($tableRows['settings']) . " settings...\n";
    DB::table('settings')->truncate();
    foreach ($tableRows['settings'] as $row) {
        DB::table('settings')->insert($row);
    }

    // Now apply SmartVerse specific umbrella branding settings
    echo "Updating SmartVerse umbrella branding settings...\n";
    $smartVerseSettings = [
        'site_name' => 'SmartVerse',
        'site_tagline' => 'Umbrella Brand Produk Digital Terpadu & AI Solutions - SmartVerse.id',
        'hero_badge' => 'Umbrella Brand Produk Digital & AI No. 1 di Indonesia',
        'hero_tagline' => 'Akselerasi Transformasi Digital & AI Solutions Terpadu',
        'hero_description' => 'SmartVerse.id adalah umbrella brand dari 5 ekosistem produk digital unggulan: SmartNews (Media Online), SmartEdu (School ERP), SmartFeed (AI Visual Studio), SmartSDM (HRIS Presensi Wajah), dan SmartSynth (Lab Forensik Konten AI).',
        'site_meta_title' => 'SmartVerse - Umbrella Brand Produk Digital Terpadu & AI Solutions',
        'site_meta_description' => 'Ekosistem produk digital terdepan di Indonesia: SmartNews, SmartEdu, SmartFeed, SmartSDM, dan SmartSynth. Didukung teknologi AI mutakhir & arsitektur enterprise.',
        'site_logo' => '/images/smartverse/logo-smartverse.jpg',
    ];

    foreach ($smartVerseSettings as $k => $v) {
        DB::table('settings')->updateOrInsert(['key' => $k], [
            'value' => $v,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}

// 9. Digital Products: 5 Flagship Products + Dump Products
echo "Setting up Digital Products (5 Flagship Products + Dump Products)...\n";
DB::table('digital_products')->truncate();

$flagshipProducts = [
    [
        'id' => 1,
        'category_id' => 5,
        'title' => 'SmartNews - Platform Media Online & Portal Berita Modern Berstandar Dewan Pers',
        'slug' => 'smartnews-cms-portal-berita',
        'badge' => 'Media & News',
        'tagline' => 'CMS Portal Berita Modern, Redaksi Multi-Role, SEO Score 95+ & Ready Monetisasi Ads',
        'description' => 'Platform portal berita dan sistem manajemen redaksi terlengkap yang dirancang memenuhi standar Dewan Pers. Dilengkapi fitur verifikasi wartawan, manajemen artikel, live report, analitik real-time, dan optimasi Core Web Vitals untuk pengalaman membaca super cepat.',
        'features' => json_encode([
            'Standar Jurnalistik & Regulasi Dewan Pers',
            'Redaksi Multi-Role: Reporter, Editor, Redaktur, Pemred',
            'Manajemen Iklan Mandiri & Google AdSense Ready',
            'AMP & PWA Support, Kecepatan Loading < 1.2 Detik',
            'Arsitektur Laravel Modern & Skalabilitas Tinggi'
        ]),
        'price' => 4999000,
        'price_type' => 'one_time',
        'demo_url' => 'https://smartnews.test',
        'buy_url' => 'https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20dengan%20produk%20SmartNews',
        'thumbnail' => '/images/smartverse/SmartNews.jpg',
        'is_featured' => 1,
        'order' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ],
    [
        'id' => 2,
        'category_id' => 5,
        'title' => 'SmartEdu - All-in-One Educational ERP Sekolah Islam Terpadu Multi-Unit',
        'slug' => 'smartedu-ekosistem-sekolah-terpadu',
        'badge' => 'Education ERP',
        'tagline' => 'Sistem Terintegrasi Akademik, Keuangan Syariah, Tahfidz & Portal Orang Tua Terpadu',
        'description' => 'Solusi ERP pendidikan modern untuk yayasan dan sekolah Islam terpadu jenjang KB, TK, SD, SMP, SMA/SMK. Mengintegrasikan pencatatan SPP virtual account, mutabaah yaumiyah & tahfidz Quran, e-Rapor, presensi guru/siswa, dan aplikasi wali santri secara real-time.',
        'features' => json_encode([
            'Manajemen Multi-Unit & Multi-Jenjang Sekolah (TK-SMA)',
            'Modul Tahfidz Quran, Setoran Hafalan & Mutabaah',
            'Billing Keuangan Otomatis, VA & Notifikasi WhatsApp Gateway',
            'Aplikasi Mobile Wali Murid & Raport Digital',
            'Dashboard Eksekutif Yayasan & Analitik Akademik'
        ]),
        'price' => 12500000,
        'price_type' => 'one_time',
        'demo_url' => 'https://smartverse.id/products/smartedu-ekosistem-sekolah-terpadu',
        'buy_url' => 'https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20dengan%20produk%20SmartEdu',
        'thumbnail' => '/images/smartverse/SmartEDU.jpg',
        'is_featured' => 1,
        'order' => 2,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ],
    [
        'id' => 3,
        'category_id' => 7,
        'title' => 'SmartFeed - Studio Visual AI & Otomasi Konten Promosi Media Sosial',
        'slug' => 'smartfeed-ai-visual-studio',
        'badge' => 'AI Creative Suite',
        'tagline' => 'Generator Banner, Copywriting Viral & Penjadwalan Konten Otomatis Multi-Platform',
        'description' => 'Studio kreatif berbasis kecerdasan buatan (AI) yang mengubah ide produk menjadi visual iklan profesional, copy interaktif, dan kalender konten otomatis dalam hitungan detik. Menghemat biaya agensi dan meningkatkan konversi penjualan digital.',
        'features' => json_encode([
            'AI Visual Generator Resolusi Tinggi untuk Feed & Story',
            'Smart Copywriter Berbasis Psikologi Penjualan & Hook Viral',
            'Template Desain Modern Khusus Bisnis UMKM & Startup',
            'Export Format PNG, JPG, dan Story Siap Unggah',
            'Terintegrasi AI Forensik & Verifikasi Keaslian Konten'
        ]),
        'price' => 2490000,
        'price_type' => 'one_time',
        'demo_url' => 'https://smartverse.id/products/smartfeed-ai-visual-studio',
        'buy_url' => 'https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20dengan%20produk%20SmartFeed',
        'thumbnail' => '/images/smartverse/SmartFeed.jpg',
        'is_featured' => 1,
        'order' => 3,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ],
    [
        'id' => 4,
        'category_id' => 6,
        'title' => 'SmartSDM - Aplikasi Mobile HRIS Presensi Wajah Liveness & Anti-Fake GPS',
        'slug' => 'smartsdm-mobile-hris-presensi',
        'badge' => 'Mobile HRIS',
        'tagline' => 'Presensi Biometrik Wajah Liveness Detection, Geofencing Akurat & Payroll Otomatis',
        'description' => 'Aplikasi mobile HRIS enterprise untuk mengelola presensi karyawan, pengajuan cuti, izin, lembur, dan slip gaji secara transparan. Dilengkapi proteksi anti-mock location (anti-fake GPS) dan deteksi wajah liveness guna mencegah kecurangan presensi.',
        'features' => json_encode([
            'Face Recognition + Liveness Detection Anti-Foto/Topeng',
            'Geofencing Presensi Radius Akurat & Anti Fake GPS',
            'Pengajuan Cuti, Izin, Sakit & Lembur Real-Time Approval',
            'Perhitungan Payroll & Cetak Slip Gaji PDF Otomatis',
            'Tersedia Aplikasi Mobile Android & Dashboard Web Admin'
        ]),
        'price' => 6990000,
        'price_type' => 'one_time',
        'demo_url' => 'https://smartverse.id/products/smartsdm-mobile-hris-presensi',
        'buy_url' => 'https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20dengan%20produk%20SmartSDM',
        'thumbnail' => '/images/smartverse/SmartSDM.jpg',
        'is_featured' => 1,
        'order' => 4,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ],
    [
        'id' => 5,
        'category_id' => 7,
        'title' => 'SmartSynth - Lab Forensik Konten AI & Cek Fakta Visual Digital',
        'slug' => 'smartsynth-lab-forensik-ai',
        'badge' => 'AI Forensics Lab',
        'tagline' => 'Uji Keaslian Foto Digital: EXIF Biner, C2PA 2.4, Real ELA 80% & 2D FFT Spektrogram',
        'description' => 'Sistem saintifik audit forensik gambar digital dan cek fakta visual. Menganalisis metadata EXIF biner, riwayat suntingan C2PA Cryptographic Provenance, kompresi Error Level Analysis (ELA) 80%, serta 2D FFT Spektrogram Frekuensi untuk mendeteksi sintesis generative AI dan manipulasi gambar.',
        'features' => json_encode([
            'EXIF Binary Parser: Kamera, GPS, Hex Dump & Thumbnail Hidden Marker',
            'C2PA 2.4 Verification: Manifest Kriptografi JUMBF & Content Provenance',
            'Real ELA (Error Level Analysis) 80% Kompresi Differensial',
            '2D FFT Spektrogram Frekuensi: Deteksi Grid & Pola Resampling AI',
            'Generator Berita Acara SOP Forensik Digital Resmi & Audit Trail'
        ]),
        'price' => 8500000,
        'price_type' => 'one_time',
        'demo_url' => 'https://smartverse.id/products/smartsynth-lab-forensik-ai',
        'buy_url' => 'https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20dengan%20produk%20SmartSynth',
        'thumbnail' => '/images/smartverse/SmartSynth.jpg',
        'is_featured' => 1,
        'order' => 5,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ],
];

foreach ($flagshipProducts as $fp) {
    DB::table('digital_products')->insert($fp);
}

// Now insert any existing products from dump (giving them order 6, 7, 8...)
if (isset($tableRows['digital_products'])) {
    $existingSlugs = array_column($flagshipProducts, 'slug');
    $nextId = 6;
    $nextOrder = 6;
    foreach ($tableRows['digital_products'] as $dp) {
        if (!in_array($dp['slug'], $existingSlugs)) {
            $dp['id'] = $nextId++;
            $dp['order'] = $nextOrder++;
            DB::table('digital_products')->insert($dp);
            echo "  Added product from dump: " . $dp['title'] . "\n";
        }
    }
}

DB::statement('PRAGMA foreign_keys = ON;');

echo "\n=== IMPORT SELESAI DENGAN SUKSES! ===\n";

// Summary of all data
$summary = [
    'categories' => DB::table('categories')->count(),
    'users' => DB::table('users')->count(),
    'posts' => DB::table('posts')->count(),
    'projects' => DB::table('projects')->count(),
    'galleries' => DB::table('galleries')->count(),
    'invoices' => DB::table('invoices')->count(),
    'trainings' => DB::table('trainings')->count(),
    'settings' => DB::table('settings')->count(),
    'digital_products' => DB::table('digital_products')->count(),
];

echo "Ringkasan data di database SQLite saat ini:\n";
print_r($summary);
