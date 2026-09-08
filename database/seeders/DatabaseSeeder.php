<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\DigitalProduct;
use App\Models\Gallery;
use App\Models\Inquiry;
use App\Models\Post;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Training;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed database using authentic preview screenshots from public/preview directory.
     */
    public function run(): void
    {
        // 1. Admin User
        $admin = User::updateOrCreate(
            ['email' => 'info@berandadigital.net'],
            [
                'name' => 'Administrator Beranda Digital',
                'password' => Hash::make('P4l3mb4ng123!'),
            ]
        );

        // 2. Categories
        $catWeb = Category::create(['name' => 'Website & System Information', 'slug' => 'website-system-info', 'type' => 'project']);
        $catMobile = Category::create(['name' => 'Mobile App (Android & iOS)', 'slug' => 'mobile-app-android-ios', 'type' => 'project']);
        $catAI = Category::create(['name' => 'AI & Intelligent Automation', 'slug' => 'ai-automation', 'type' => 'project']);
        $catEdu = Category::create(['name' => 'School & Smart Village', 'slug' => 'school-smart-village', 'type' => 'project']);

        $catProdSaas = Category::create(['name' => 'SaaS Platform', 'slug' => 'saas-platform', 'type' => 'product']);
        $catProdScript = Category::create(['name' => 'Enterprise Script', 'slug' => 'enterprise-script', 'type' => 'product']);
        $catProdAI = Category::create(['name' => 'AI Suite & Chatbot', 'slug' => 'ai-suite', 'type' => 'product']);

        $blogEvent = Category::create(['name' => 'Workshop & Keynote Event', 'slug' => 'workshop-keynote-event', 'type' => 'post']);
        $blogTech = Category::create(['name' => 'Teknologi & Vibe Coding', 'slug' => 'teknologi-vibe-coding', 'type' => 'post']);
        $blogAI = Category::create(['name' => 'AI & Machine Learning', 'slug' => 'ai-machine-learning', 'type' => 'post']);

        // 3. Settings - SmartVerse Umbrella Brand (smartverse.id)
        $settings = [
            ['key' => 'site_name', 'value' => 'SmartVerse', 'group' => 'general', 'label' => 'Nama Brand', 'type' => 'text'],
            ['key' => 'site_title', 'value' => 'SmartVerse (smartverse.id) - Umbrella Brand 5 Produk Digital Unggulan', 'group' => 'general', 'label' => 'Judul Situs', 'type' => 'text'],
            ['key' => 'site_tagline', 'value' => 'SmartNews, SmartEdu, SmartFeed, SmartSDM, SmartSynth - Ekosistem Solusi Digital Terintegrasi', 'group' => 'general', 'label' => 'Tagline Utama', 'type' => 'text'],
            ['key' => 'site_logo', 'value' => '/images/smartverse/logo-smartverse.jpg', 'group' => 'general', 'label' => 'Logo Brand', 'type' => 'text'],
            ['key' => 'site_favicon', 'value' => '/images/smartverse/logo-smartverse.jpg', 'group' => 'general', 'label' => 'Favicon Brand', 'type' => 'text'],
            ['key' => 'og_image', 'value' => '/images/smartverse/logo-smartverse.jpg', 'group' => 'general', 'label' => 'OG Image', 'type' => 'text'],
            ['key' => 'hero_badge', 'value' => 'Official Umbrella Brand · smartverse.id', 'group' => 'hero', 'label' => 'Badge Hero', 'type' => 'text'],
            ['key' => 'hero_title_1', 'value' => 'Satu Ekosistem Cerdas,', 'group' => 'hero', 'label' => 'Judul Hero Baris 1', 'type' => 'text'],
            ['key' => 'hero_title_2', 'value' => '5 Kekuatan Transformasi Digital', 'group' => 'hero', 'label' => 'Judul Hero Baris 2', 'type' => 'text'],
            ['key' => 'hero_description', 'value' => 'SmartVerse (smartverse.id) adalah umbrella brand ekosistem digital terdepan yang menaungi 5 lini produk inovasi unggulan: SmartNews (Portal Berita Dewan Pers), SmartEdu (ERP Pendidikan JSIT & Merdeka), SmartFeed (Studio Visual AI Instan), SmartSDM (Aplikasi Mobile HRIS Presensi Wajah), dan SmartSynth (Lab Forensik Konten AI & Cek Fakta Visual).', 'group' => 'hero', 'label' => 'Deskripsi Hero', 'type' => 'textarea'],
            ['key' => 'theme_primary_color', 'value' => '#00B5B8', 'group' => 'theme', 'label' => 'Warna Utama Brand', 'type' => 'text'],
            ['key' => 'theme_accent_color', 'value' => '#0A1C3C', 'group' => 'theme', 'label' => 'Warna Aksen Brand', 'type' => 'text'],

            ['key' => 'trainer_name', 'value' => 'Septa Ryan Hidayat, S.Kom', 'group' => 'trainer', 'label' => 'Nama Founder & Lead Architect', 'type' => 'text'],
            ['key' => 'trainer_title', 'value' => 'Founder SmartVerse, Direktur CV. Beranda Teknologi Digital & AI Specialist', 'group' => 'trainer', 'label' => 'Gelar / Jabatan', 'type' => 'text'],
            ['key' => 'trainer_bio', 'value' => 'Founder SmartVerse & Lead Software Architect di CV. Beranda Teknologi Digital. Dewan Pakar IGI Ogan Ilir, Narasumber Komdigi & Media Indonesia, serta Perancang 5 Ekosistem Produk Digital Nasional: SmartNews, SmartEdu, SmartFeed, SmartSDM, dan SmartSynth.', 'group' => 'trainer', 'label' => 'Bio Trainer', 'type' => 'textarea'],
            ['key' => 'trainer_avatar', 'value' => '/images/Insight-Talks-Komdigi.jpeg', 'group' => 'trainer', 'label' => 'Foto Profile Trainer', 'type' => 'text'],
            ['key' => 'trainer_stats_years', 'value' => '8+', 'group' => 'trainer', 'label' => 'Pengalaman Tahun', 'type' => 'text'],
            ['key' => 'trainer_stats_events', 'value' => '85+', 'group' => 'trainer', 'label' => 'Workshop & Seminar', 'type' => 'text'],
            ['key' => 'trainer_stats_alumni', 'value' => '5,000+', 'group' => 'trainer', 'label' => 'Pengguna & Alumni', 'type' => 'text'],

            ['key' => 'contact_email', 'value' => 'info@smartverse.id', 'group' => 'contact', 'label' => 'Email Resmi', 'type' => 'text'],
            ['key' => 'contact_phone', 'value' => '089695249089', 'group' => 'contact', 'label' => 'WhatsApp Utama', 'type' => 'text'],
            ['key' => 'contact_phone_wa_profile', 'value' => '0896 9524 9089', 'group' => 'contact', 'label' => 'WhatsApp Profil', 'type' => 'text'],
            ['key' => 'contact_address', 'value' => 'SmartVerse (smartverse.id) - Ogan Ilir & Palembang, Sumatera Selatan, Indonesia', 'group' => 'contact', 'label' => 'Alamat Kantor', 'type' => 'textarea'],
            ['key' => 'social_facebook', 'value' => 'https://www.facebook.com/profile.php?id=61593862816388', 'group' => 'social', 'label' => 'Facebook Page', 'type' => 'text'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/smartverse.id', 'group' => 'social', 'label' => 'Instagram', 'type' => 'text'],
        ];

        foreach ($settings as $s) {
            Setting::updateOrCreate(['key' => $s['key']], $s);
        }

        // 4. Authentic Projects & Products Mapped to High-Tech Mockups with Interactive Slider Screens
        Project::create([
            'category_id' => $catWeb->id,
            'title' => 'Website Enterprise & Portal Korporat',
            'slug' => 'website-enterprise-portal-company-profile',
            'summary' => 'Solusi website company profile profesional, katalog digital, dan portal berita berkecepatan tinggi.',
            'challenge' => 'Kebutuhan website bisnis modern dengan desain cepat, optimasi kecepatan, dan keamanan data.',
            'solution' => 'Arsitektur website Laravel 13 & PHP 8.4 terhubung dengan CMS admin instan dan integrasi WhatsApp.',
            'features' => [
                'Kecepatan loading ultra-cepat (< 1 detik) & mobile responsive',
                'Dashboard CMS admin mudah tanpa perlu keahlian coding',
                'SEO score 95+ teroptimasi pencarian Google & terhubung WhatsApp',
            ],
            'app_type' => 'web',
            'status_badge' => '🚀 High Performance',
            'tech_stack' => ['Laravel 13', 'PHP 8.4', 'MySQL', 'Tailwind CSS', 'Alpine.js'],
            'client_name' => 'CV. Beranda Teknologi Digital',
            'project_url' => 'https://berandadigital.net',
            'thumbnail' => '/images/products/enterprise-web-mockup.jpg',
            'gallery' => [
                [
                    'url' => '/images/products/enterprise-web-mockup.jpg',
                    'title' => 'Tampilan Desktop & Mobile Korporat',
                    'type' => 'web',
                    'caption' => 'Desain modern bento grid dengan metrik kinerja bisnis'
                ],
                [
                    'url' => '/images/portofolio-web-1.webp',
                    'title' => 'Layout Halaman Depan & Profil',
                    'type' => 'web',
                    'caption' => 'Katalog layanan dan visual identity korporat'
                ],
                [
                    'url' => '/images/Portofolio-sim.webp',
                    'title' => 'Dashboard Manajemen & Analitik',
                    'type' => 'web',
                    'caption' => 'Panel admin lengkap untuk pengelolaan konten dan inquiry'
                ]
            ],
            'is_featured' => true,
            'order' => 1,
        ]);

        Project::create([
            'category_id' => $catEdu->id,
            'title' => 'Portal PPDB Online & Sistem Akademik',
            'slug' => 'portal-sekolah-elearning-ppdb-online',
            'summary' => 'Sistem informasi sekolah terpadu untuk registrasi siswa baru, pengumuman kelulusan, dan raport digital.',
            'challenge' => 'Sistem PPDB manual sering menyebabkan antrean panjang dan kesalahan pencatatan data calon siswa.',
            'solution' => 'Portal web responsif dengan formulir PPDB online, verifikasi dokumen, dan pengiriman notifikasi otomatis.',
            'features' => [
                'Formulir pendaftaran PPDB online mandiri dengan cetak bukti PDF',
                'Notifikasi otomatis status pendaftaran & biaya via WhatsApp',
                'Manajemen guru, jadwal pelajaran, bank soal & e-learning terpadu',
            ],
            'app_type' => 'web',
            'status_badge' => '⚡ All-in-One Portal',
            'tech_stack' => ['Laravel 13', 'MySQL', 'Tailwind CSS', 'Alpine.js'],
            'client_name' => 'Lembaga Pendidikan & Sekolah Mitra',
            'project_url' => 'https://berandadigital.net',
            'thumbnail' => '/images/products/school-portal-mockup.jpg',
            'gallery' => [
                [
                    'url' => '/images/products/school-portal-mockup.jpg',
                    'title' => 'Dashboard SIAKAD & Kartu Siswa QR',
                    'type' => 'web',
                    'caption' => 'Monitoring pendaftaran PPDB, absensi dan kartu pelajar digital'
                ],
                [
                    'url' => '/images/ppdb.png',
                    'title' => 'Formulir Pendaftaran Siswa Baru (PPDB)',
                    'type' => 'web',
                    'caption' => 'Alur pendaftaran mandiri yang mudah diakses orang tua dari HP'
                ],
                [
                    'url' => '/images/ELEARNING.png',
                    'title' => 'Portal E-Learning & Raport Online',
                    'type' => 'web',
                    'caption' => 'Akses materi belajar, kuis interaktif, dan rekap nilai siswa'
                ]
            ],
            'is_featured' => true,
            'order' => 2,
        ]);

        Project::create([
            'category_id' => $catProdSaas->id,
            'title' => 'Sistem Informasi Desa Digital (Smart Village)',
            'slug' => 'sistem-informasi-administrasi-surating-desa-digital',
            'summary' => 'Platform administrasi desa untuk pelayanan surat online mandiri, sensus penduduk, dan validasi dokumen resmi.',
            'challenge' => 'Pelayanan pengurusan surat administrasi desa membutuhkan waktu lama karena pencatatan arsip fisik yang manual.',
            'solution' => 'Beranda Teknologi Digital membangun portal web desa responsif terhubung dengan generator surat otomatis berbasis QR Code verifikasi.',
            'features' => [
                'Otomasi cetak 30+ jenis format surat resmi desa & RT/RW',
                'Tanda tangan digital berotentikasi QR Code terverifikasi',
                'Buku induk sensus kependudukan & grafik statistik realtime',
            ],
            'app_type' => 'web',
            'status_badge' => '🟢 Siap Diimplementasi',
            'tech_stack' => ['Laravel 13', 'PHP 8.4', 'MySQL', 'Tailwind CSS'],
            'client_name' => 'Pemerintah Desa Senuro Timur, Kab. Ogan Ilir',
            'project_url' => 'https://berandadigital.net',
            'thumbnail' => '/images/products/smart-village-mockup.jpg',
            'gallery' => [
                [
                    'url' => '/images/products/smart-village-mockup.jpg',
                    'title' => 'Dashboard Pelayanan Administrasi Desa',
                    'type' => 'web',
                    'caption' => 'Statistik kependudukan dan monitoring permohonan surat warga'
                ],
                [
                    'url' => '/images/surat.png',
                    'title' => 'Otomasi Cetak 30+ Format Surat Resmi',
                    'type' => 'web',
                    'caption' => 'Dokumen resmi desa otomatis terbit dalam hitungan detik'
                ],
                [
                    'url' => '/images/ss-asalam.png',
                    'title' => 'Buku Induk Kependudukan & Data RT/RW',
                    'type' => 'web',
                    'caption' => 'Database warga terenkripsi dan pencarian data cepat'
                ]
            ],
            'is_featured' => true,
            'order' => 3,
        ]);

        Project::create([
            'category_id' => $catWeb->id,
            'title' => 'Jasa Pembuatan Website & Campaign Digital Publik / Leader',
            'slug' => 'jasa-pembuatan-website-campaign-digital',
            'summary' => 'Platform portal informasi, video profil, dan campaign digital publik dengan sistem interaktif.',
            'challenge' => 'Membangun branding publik yang transparan dan cepat diakses oleh seluruh lapisan masyarakat.',
            'solution' => 'Portal web responsif dengan integrasi galeri video, jadwal kegiatan, dan form aspirasi.',
            'tech_stack' => ['Laravel', 'Tailwind CSS', 'MySQL'],
            'client_name' => 'Public Leader & Agency Partner',
            'project_url' => 'https://berandadigital.net',
            'thumbnail' => '/preview/screencapture-berandadigital-net-jasa-website-caleg-2026-08-19-17_54_34.png',
            'is_featured' => false,
            'order' => 4,
        ]);

        // 5. THE 5 FLAGSHIP DIGITAL PRODUCTS OF SMARTVERSE (smartverse.id)
        // -------------------------------------------------------------
        // Product 1: SmartNews
        DigitalProduct::create([
            'category_id' => $catProdSaas->id,
            'title' => 'SmartNews CMS — Portal Berita Media Online Standar Dewan Pers',
            'slug' => 'smartnews-cms-portal-berita',
            'badge' => 'Media & Portal CMS',
            'tagline' => 'Solusi Portal Berita Siap Terbit: AI SEO Analyzer, 6 Slot Iklan Cuan & Standar Dewan Pers',
            'description' => 'Paket lengkap pembuatan website portal berita media online profesional siap terbit berstandar Dewan Pers RI. Dilengkapi AI SEO Analyzer real-time, 6 slot penempatan iklan monetisasi cuan, manajemen hierarki redaksi wartawan-editor, multi-bahasa, auto sitemap XML, dan integrasi instant payment Tripay serta WhatsApp order.',
            'features' => [
                'Standar Dewan Pers (Pedoman Media Siber, Struktur Redaksi, Kode Etik Jurnalistik)',
                'AI SEO Content Analyzer & Realtime Keyword Score',
                '6 Slot Penempatan Iklan Cuan (Header Banner, In-Article, Sticky Bottom, Pop-up, Native Ads)',
                'Manajemen Wartawan, Editor, & Kontributor dengan scoped permission',
                'Integrasi Instant Tripay Payment Gateway & WhatsApp Checkout',
                'Dukungan Penuh Laravel 13, PHP 8.4, Fast Cache & RSS Feed Otomatis',
            ],
            'price' => 1500000,
            'price_type' => 'one_time',
            'demo_url' => 'https://smartnews.berandadigital.net',
            'buy_url' => 'https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20membeli%20SmartNews%20CMS',
            'thumbnail' => '/images/smartverse/SmartNews.jpg',
            'is_featured' => true,
            'order' => 1,
        ]);

        // Product 2: SmartEdu
        DigitalProduct::create([
            'category_id' => $catProdSaas->id,
            'title' => 'SmartEdu — Ekosistem Digital & ERP Sekolah Islam Terpadu',
            'slug' => 'smartedu-ekosistem-sekolah-terpadu',
            'badge' => 'All-in-One Educational ERP',
            'tagline' => '23+ Modul Digital Terpadu, Multi-Tenancy Yayasan & 4 Unit, E-Rapor Merdeka/JSIT + Smart AI Assistant',
            'description' => 'Platform All-in-One Educational ERP dan Web Portal Multi-Unit untuk Yayasan dan Sekolah (TKIT, SDIT, SMPIT, SMAIT). Mengintegrasikan 23+ Modul Digital: Akademik, E-Rapor Kurikulum Merdeka & JSIT P5, CBT Asesmen Ujian Digital, E-SPP Billing Otomatis & Cashless Canteen, Persuratan Digital ber-TTE SHA-256, dan Asisten Cerdas Smart AI RAG 24/7.',
            'features' => [
                'Arsitektur Multi-Tenancy Terisolasi (Yayasan + TKIT, SDIT, SMPIT, SMAIT)',
                'E-Rapor Kurikulum Merdeka & Standar JSIT dengan Penilaian P5 Lengkap',
                'CBT Ujian & Asesmen Digital Otomatis dengan Bank Soal Acak & Timer',
                'E-SPP Billing Otomatis, Kuitansi PDF Resmi Ber-QR & Akuntansi COA',
                'Persuratan Digital ber-TTE Resmi (Hash SHA-256 & Verifikasi Publik QR)',
                'Smart AI Knowledge Assistant (RAG) Siap Jawab Dokumen Regulasi 24/7',
                'E-Library Sirkulasi QR & Inventaris Sarana Prasarana Barcode Scanner',
            ],
            'price' => 4500000,
            'price_type' => 'one_time',
            'demo_url' => 'https://sitrobbani.sch.id',
            'buy_url' => 'https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20dengan%20platform%20SmartEdu',
            'thumbnail' => '/images/smartverse/SmartEDU.jpg',
            'is_featured' => true,
            'order' => 2,
        ]);

        // Product 3: SmartFeed
        DigitalProduct::create([
            'category_id' => $catProdAI->id,
            'title' => 'SmartFeed — Studio Visual AI Instan & Otomasi Konten Promosi',
            'slug' => 'smartfeed-ai-visual-studio',
            'badge' => 'Instant Visual & Content AI',
            'tagline' => 'Studio Visual AI Instan: Banner Iklan, Carousel Medsos, Naskah Video & Copywriting Tanpa Desainer',
            'description' => 'Studio visual instan bertenaga kecerdasan buatan untuk menciptakan materi iklan profesional, carousel Instagram/LinkedIn, thumbnail YouTube, storyboard, naskah narasi video TikTok/Reels, dan copywriting promosi penjualan dalam hitungan detik tanpa membutuhkan desainer grafis.',
            'features' => [
                'Generator Banner Iklan & Carousel Media Sosial Otomatis dalam Hitungan Detik',
                'AI Copywriting Engine Multichannel (Hook Menarik, Storytelling & CTA Persuasif)',
                'Generator Naskah Video Narasi & Storyboard Konten Pendek (Reels/Shorts/TikTok)',
                'Koleksi 100+ Template Desain Vektor Siap Pakai dengan Tipografi Modern',
                'Ekspor Aset Desain Resolusi Tinggi (PNG, SVG, PDF Siap Cetak)',
                'Antarmuka Responsif dengan Tema Dark Obsidian & Electric Blue',
            ],
            'price' => 499000,
            'price_type' => 'one_time',
            'demo_url' => 'https://smartfeed.berandadigital.net',
            'buy_url' => 'https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20dengan%20produk%20SmartFeed',
            'thumbnail' => '/images/smartverse/SmartFeed.jpg',
            'is_featured' => true,
            'order' => 3,
        ]);

        // Product 4: SmartSDM
        DigitalProduct::create([
            'category_id' => $catProdSaas->id,
            'title' => 'SmartSDM — HRIS Mobile App & Presensi GPS Biometrik Wajah',
            'slug' => 'smartsdm-mobile-hris-presensi',
            'badge' => 'Mobile HRIS & Biometric GPS',
            'tagline' => 'Aplikasi Mobile SDM (React Native Expo SDK 52): Presensi Wajah Liveness & Anti-Fake GPS',
            'description' => 'Platform aplikasi mobile resmi SDM dan HRIS berbasis React Native (Expo SDK 52) untuk seluruh tenaga kependidikan dan pegawai perusahaan. Dilengkapi fitur Auto Multi-Tenancy Detection saat login, Presensi Selfie Wajah Liveness, Proteksi Anti-Fake GPS Geofencing Haversine, Pengajuan Cuti Real-time, dan E-Slip Gaji ber-QR TTE resmi.',
            'features' => [
                'Aplikasi Mobile Lintas Platform Android & iOS (React Native Expo SDK 52)',
                'Auto Multi-Tenancy Detection: Otomatis mendeteksi cabang & unit kerja',
                'Presensi Selfie Face Recognition & Liveness Detection Anti-Foto Cetak',
                'Proteksi Radius Geofencing (Haversine Formula) & Deteksi Mock Location / Fake GPS',
                'Pengajuan Cuti & Izin Online Real-Time dengan Approval Berjenjang Pimpinan',
                'E-Slip Gaji Digital (Payroll) Resmi dengan QR Code TTE Verifikasi Publik',
                'Evaluasi Kinerja KPI 5 Dimensi & Dompet Belanja Digital Koperasi Pegawai',
            ],
            'price' => 2500000,
            'price_type' => 'one_time',
            'demo_url' => 'https://smartverse.test/products/smartsdm-mobile-hris-presensi',
            'buy_url' => 'https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20dengan%20aplikasi%20SmartSDM',
            'thumbnail' => '/images/smartverse/SmartSDM.jpg',
            'is_featured' => true,
            'order' => 4,
        ]);

        // Product 5: SmartSynth
        DigitalProduct::create([
            'category_id' => $catProdAI->id,
            'title' => 'SmartSynth — Lab Forensik Konten AI & Cek Fakta Visual',
            'slug' => 'smartsynth-lab-forensik-ai',
            'badge' => 'Scientific AI Forensics & C2PA',
            'tagline' => 'Uji Keaslian Foto Digital: EXIF Biner, Kriptografi C2PA 2.4, Real ELA, 2D FFT & Berita Acara SOP',
            'description' => 'Platform investigasi multimedia dan lab forensik visual saintifik untuk membuktikan keaslian foto digital secara objektif. Mengintegrasikan 3 Lapis Verifikasi: Analisis Biner Header & EXIF Scanner (deteksi Midjourney, DALL-E, SD, Flux, atau hardware kamera fisik), Kriptografi C2PA 2.4 JUMBF Manifest (sertifikat digital OpenAI/Adobe), Real In-Browser Error Level Analysis (ELA 80% JPEG compression delta), 2D FFT Spektrogram Frekuensi (deteksi checkerboard deconvolution artifact), Laplacian Noise Residual Filter, serta Generator Berita Acara SOP Redaksi Resmi.',
            'features' => [
                'Lapis 1: Binary Header & EXIF Scanner (Deteksi Software AI, Hardware Optik & Stripping WhatsApp)',
                'Lapis 2: Kriptografi C2PA 2.4 (Pemindaian JUMBF Box Manifest OpenAI & Adobe Trust Authority)',
                'Lapis 3: Real In-Browser Error Level Analysis (ELA 80% Kompresi JPEG Delta)',
                'Lapis 3: Real 2D Fast Fourier Transform (FFT) Spektrogram Frekuensi Radix-2',
                'Laplacian Noise Residual Filter (Isolasi Noise Sensor Optik vs Difusi Laten AI)',
                'Simulasi Uji Siksa Redaksi: Kompresi WhatsApp & Crop 50% Anti-Bypass',
                'Generator Berita Acara SOP Redaksi Resmi (Nomor Registrasi Unik, Putusan & Cetak PDF)',
            ],
            'price' => 2990000,
            'price_type' => 'one_time',
            'demo_url' => 'https://smartverse.test/products/smartsynth-lab-forensik-ai',
            'buy_url' => 'https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20dengan%20Lab%20Forensik%20SmartSynth',
            'thumbnail' => '/images/smartverse/SmartSynth.jpg',
            'is_featured' => true,
            'order' => 5,
        ]);

        // 6. Training Modules
        Training::create([
            'title' => 'Lecturer Development Program: Artificial Intelligence & Vibe Coding',
            'slug' => 'lecturer-development-program-ai-vibe-coding',
            'level' => 'Executive & Dosen',
            'duration' => '1 Hari Workshop Intensif',
            'target_audience' => 'Dosen, Akademisi & Pengajar Perguruan Tinggi',
            'summary' => 'Pelatihan Pemanfaatan Artificial Intelligence (AI) untuk pembuatan aplikasi praktis dan profesional tanpa coding, khusus bagi Dosen Politeknik Akamigas Palembang.',
            'syllabus' => [
                'Pengenalan Konsep Vibe Coding & Generative AI',
                'Pembuatan Prototype Aplikasi Tanpa Baris Kode',
                'Pemanfaatan AI dalam Inovasi Pembelajaran Perguruan Tinggi',
                'Studi Kasus Otomasi Administrasi Akademik'
            ],
            'price' => 1500000,
            'thumbnail' => '/preview/screencapture-berandadigital-test-trainer-2026-08-19-17_49_10.png',
            'is_featured' => true,
            'order' => 1,
        ]);

        Training::create([
            'title' => 'Pelatihan Augmented Reality (AR) & Koding untuk Media Edukasi Interaktif',
            'slug' => 'pelatihan-augmented-reality-ar-dan-koding',
            'level' => 'Guru & Praktisi Pendidikan',
            'duration' => '1 Hari Workshop',
            'target_audience' => 'Guru SD, SMP, SMA & Pengembang Media Pembelajaran',
            'summary' => 'Pelatihan pembuatan aplikasi 3D Augmented Reality untuk visualisasi materi pelajaran interaktif di kelas.',
            'syllabus' => [
                'Dasar 3D Modeling & AR Marker',
                'Pengenalan Software AR Creator',
                'Integrasi AR dengan Buku Pelajaran',
                'Publishing Aplikasi AR ke Smartphone'
            ],
            'price' => 1200000,
            'thumbnail' => '/images/Flyer-AR-New-1-scaled.jpg',
            'is_featured' => true,
            'order' => 2,
        ]);

        // 7. Authentic Event Galleries with REAL Photo Posters from Preview Directory
        Gallery::create([
            'title' => 'Tampilan Beranda Website Resmi Beranda Teknologi Digital',
            'event_name' => 'Original Web Preview',
            'location' => 'berandadigital.net',
            'event_date' => '2026-08-19',
            'category' => 'preview',
            'image_path' => '/preview/screencapture-berandadigital-net-2026-08-19-17_31_05.png',
            'description' => 'Tampilan asli beranda utama website Beranda Teknologi Digital.',
            'is_featured' => true,
            'order' => 1,
        ]);

        Gallery::create([
            'title' => 'Keynote Speaker: Insight Talks Vol. 3 Palembang (Komdigi RI & Media Indonesia)',
            'event_name' => 'Insight Talks Vol. 3 Palembang',
            'location' => 'Hotel Harper Palembang',
            'event_date' => '2026-04-14',
            'category' => 'keynote',
            'image_path' => '/images/Insight-Talks-Komdigi.jpeg',
            'description' => 'Septa Ryan Hidayat (CEO Beranda Teknologi Digital) menjadi narasumber bersama Plt. Direktur Komdigi RI dan Direktur Media Indonesia.',
            'is_featured' => true,
            'order' => 2,
        ]);

        Gallery::create([
            'title' => 'Halaman Layanan Jasa & Paket Pembuatan Aplikasi',
            'event_name' => 'Original Services Preview',
            'location' => 'berandadigital.net/layanan',
            'event_date' => '2026-08-19',
            'category' => 'preview',
            'image_path' => '/preview/screencapture-berandadigital-net-layanan-2026-08-19-17_52_22.png',
            'description' => 'Tampilan halaman layanan jasa pembuatan website, mobile app, dan sistem informasi.',
            'is_featured' => true,
            'order' => 3,
        ]);

        Gallery::create([
            'title' => 'Halaman Profil Perusahaan & Bio Direktur Utama Septa Ryan Hidayat',
            'event_name' => 'Original Profile Preview',
            'location' => 'berandadigital.net/profile',
            'event_date' => '2026-08-19',
            'category' => 'preview',
            'image_path' => '/preview/screencapture-berandadigital-net-profile-2026-08-19-17_53_14.png',
            'description' => 'Tampilan halaman profil resmi CV. Beranda Teknologi Digital.',
            'is_featured' => true,
            'order' => 4,
        ]);

        // 8. Authentic Real Posts from exact_posts_with_images.json
        $jsonPath = 'C:\Users\RYAN\.gemini\antigravity-ide\brain\e76328d7-060a-4578-8722-8e9279955ad0\scratch\exact_posts_with_images.json';
        if (file_exists($jsonPath)) {
            $parsedPosts = json_decode(file_get_contents($jsonPath), true);
            foreach ($parsedPosts as $index => $pData) {
                Post::create([
                    'category_id' => ($index % 2 === 0) ? $blogEvent->id : $blogAI->id,
                    'user_id' => $admin->id,
                    'title' => $pData['title'],
                    'slug' => $pData['slug'] . '-' . uniqid(),
                    'thumbnail' => $pData['image'],
                    'excerpt' => $pData['excerpt'],
                    'body' => $pData['content'],
                    'status' => 'published',
                    'published_at' => $pData['date'] ? \Carbon\Carbon::parse($pData['date']) : now()->subDays($index * 3),
                ]);
            }
        }

        // 9. Sample Inquiries
        Inquiry::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@techcorp.id',
            'subject' => 'Konsultasi Ekosistem Digital SmartVerse',
            'message' => 'Halo tim SmartVerse, kami tertarik untuk berdiskusi mengenai integrasi produk SmartEdu dan SmartSDM untuk lembaga pendidikan kami.',
            'is_read' => false,
        ]);

        // 10. Authentic Projects & Legal Profile from Company Proposal Document
        require __DIR__ . '/populate_btd_profile.php';
    }
}
