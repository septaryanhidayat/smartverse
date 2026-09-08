-- =========================================================
-- Database SQL Dump for cPanel / phpMyAdmin
-- Aplikasi: CV. Beranda Teknologi Digital
-- Tanggal Ekspor: 2026-08-27 07:21:21
-- Engine: MySQL 8.0+ / MariaDB 10.4+
-- =========================================================

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------
-- Struktur dari tabel `users`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `users`
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Septa Ryan Hidayat, S.Kom', 'admin@berandadigital.net', NULL, '$2y$12$5B/sW0bWHybTlTzAwt6Kru0704xjb.Z8WFtgypd.XqN/89vdQDwNm', 'OKZ94TqyQE0pmjm5sCgADBP9DFVg2GQwJHLoL5WgZ4jdCAFO7Um4ZTtiJwj4', '2026-08-27 02:27:25', '2026-08-27 02:27:25');

-- --------------------------------------------------------
-- Struktur dari tabel `categories`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'project',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `categories`
INSERT INTO `categories` (`id`, `name`, `slug`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Website & System Information', 'website-system-info', 'project', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(2, 'Mobile App (Android & iOS)', 'mobile-app-android-ios', 'project', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(3, 'AI & Intelligent Automation', 'ai-automation', 'project', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(4, 'School & Smart Village', 'school-smart-village', 'project', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(5, 'SaaS Platform', 'saas-platform', 'product', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(6, 'Enterprise Script', 'enterprise-script', 'product', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(7, 'AI Suite & Chatbot', 'ai-suite', 'product', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(8, 'Workshop & Keynote Event', 'workshop-keynote-event', 'post', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(9, 'Teknologi & Vibe Coding', 'teknologi-vibe-coding', 'post', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(10, 'AI & Machine Learning', 'ai-machine-learning', 'post', '2026-08-27 02:27:25', '2026-08-27 02:27:25');

-- --------------------------------------------------------
-- Struktur dari tabel `projects`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `challenge` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solution` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tech_stack` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tech_stack`)),
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gallery`)),
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_category_id_foreign` (`category_id`),
  CONSTRAINT `projects_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `projects`
INSERT INTO `projects` (`id`, `category_id`, `title`, `slug`, `summary`, `challenge`, `solution`, `tech_stack`, `client_name`, `project_url`, `thumbnail`, `gallery`, `is_featured`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Portal Layanan Pembuatan Website Enterprise & Company Profile', 'portal-layanan-pembuatan-website-enterprise', 'Jasa Pembuatan Website Perusahaan, Portal Berita, E-Commerce & Landing Page dengan SEO & Mobile Responsive 100%.', 'Kebutuhan website bisnis modern dengan desain cepat, optimasi kecepatan, dan keamanan data.', 'Arsitektur website Laravel 13 & PHP 8.4 terhubung dengan CMS admin instan dan integrasi WhatsApp.', '[\"Laravel 13\",\"PHP 8.4\",\"MySQL\",\"Tailwind CSS\",\"Alpine.js\"]', 'CV. Beranda Teknologi Digital', 'https://berandadigital.net', '/preview/screencapture-berandadigital-net-portofolio-website-2026-08-19-17_54_22.png', '[\"\\/preview\\/screencapture-berandadigital-net-2026-08-19-17_31_05.png\"]', 1, 1, '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(2, 2, 'Jasa Pembuatan Aplikasi Mobile Android & iOS (Flutter)', 'jasa-pembuatan-aplikasi-mobile-android-ios', 'Aplikasi Mobile Cross-Platform berbasis Flutter berkecepatan tinggi dengan integrasi RESTful API & Push Notifications.', 'Pengembangan aplikasi mobile dua platform (Android & iOS) sering memakan waktu dan biaya tinggi.', 'Solusi Flutter tunggal terhubung ke backend Laravel dengan fitur offline-first dan geolokalasi.', '[\"Flutter\",\"RESTful API\",\"Laravel\",\"Firebase FCM\"]', 'Klien Startup & Public Agency', 'https://berandadigital.net', '/preview/screencapture-berandadigital-net-aplikasi-android-2026-08-19-17_55_00.png', '[\"\\/preview\\/screencapture-berandadigital-net-layanan-2026-08-19-17_52_22.png\"]', 1, 2, '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(3, 4, 'Sistem Informasi Administrasi Surating & Desa Digital', 'sistem-informasi-administrasi-surating-desa-digital', 'Sistem Informasi Digitalisasi Desa dan Otomasi Surat-menyurat Terpadu untuk Perangkat Desa, Pendamping Desa, dan Warga Desa Senuro Timur.', 'Pelayanan pengurusan surat administrasi desa membutuhkan waktu lama karena pencatatan arsip fisik yang manual.', 'Beranda Teknologi Digital membangun portal web desa responsif terhubung dengan generator surat otomatis berbasis QR Code verifikasi.', '[\"Laravel 13\",\"PHP 8.4\",\"MySQL\",\"Tailwind CSS\"]', 'Pemerintah Desa Senuro Timur, Kab. Ogan Ilir', 'https://berandadigital.net', '/preview/screencapture-berandadigital-net-sistem-informasi-2026-08-19-17_55_14.png', '[\"\\/images\\/surat.png\",\"\\/images\\/ss-asalam.png\"]', 1, 3, '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(4, 1, 'Jasa Pembuatan Website & Campaign Digital Publik / Leader', 'jasa-pembuatan-website-campaign-digital', 'Platform portal informasi, video profil, dan campaign digital publik dengan sistem interaktif.', 'Membangun branding publik yang transparan dan cepat diakses oleh seluruh lapisan masyarakat.', 'Portal web responsif dengan integrasi galeri video, jadwal kegiatan, dan form aspirasi.', '[\"Laravel\",\"Tailwind CSS\",\"MySQL\"]', 'Public Leader & Agency Partner', 'https://berandadigital.net', '/preview/screencapture-berandadigital-net-jasa-website-caleg-2026-08-19-17_54_34.png', NULL, 0, 4, '2026-08-27 02:27:25', '2026-08-27 02:27:25');

-- --------------------------------------------------------
-- Struktur dari tabel `digital_products`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `digital_products`;
CREATE TABLE IF NOT EXISTS `digital_products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `badge` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `price_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'one_time',
  `demo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buy_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `digital_products_category_id_foreign` (`category_id`),
  CONSTRAINT `digital_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `digital_products`
INSERT INTO `digital_products` (`id`, `category_id`, `title`, `slug`, `badge`, `tagline`, `description`, `features`, `price`, `price_type`, `demo_url`, `buy_url`, `thumbnail`, `is_featured`, `order`, `created_at`, `updated_at`) VALUES
(1, 5, 'Sistem Aplikasi Administrasi Desa Digital (Smart Village)', 'sistem-aplikasi-administrasi-desa-digital', 'Smart Village', 'Platform Digitalisasi Surat Desa, Data Kependudukan & Portal Publik', 'Aplikasi web siap pakai untuk kantor desa yang membutuhkan sistem cetak surat otomatis, verifikasi QR code, dan portal informasi publik.', '[\"Modul Cetak Surat Otomatis 30+ Jenis Surat Desa\",\"Otentikasi Tanda Tangan Digital QR Code\",\"Database Kependudukan & Statistik RT\\/RW\",\"Support SQLite untuk Server Desa & MySQL Online\"]', 1990000, 'one_time', 'https://berandadigital.net', 'https://wa.me/6289695249089?text=Halo%20Beranda%20Digital,%20saya%20tertarik%20membeli%20Aplikasi%20Desa%20Digital', '/preview/screencapture-berandadigital-net-order-2026-08-19-17_52_40.png', 1, 1, '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(2, 6, 'Enterprise Starter Kit Laravel 13 & Tailwind v4', 'enterprise-starter-kit-laravel-13', 'Boilerplate Script', 'Arsitektur Boilerplate Siap Pakai dengan Dark/Light Mode & RBAC', 'Boilerplate terlengkap untuk startup dan pengembang software. Dilengkapi sistem autentikasi, manajemen pengguna, log audit, dan tema ganda.', '[\"Laravel 13 & PHP 8.4 Support Out of The Box\",\"Dukungan SQLite (Dev) & MySQL (Production)\",\"Fitur Dual Theme: Light & Dark Mode Persisted\",\"Role & Permission Management bawaan\",\"Clean Architecture Standard\"]', 499000, 'one_time', 'https://berandadigital.net', 'https://wa.me/6289695249089?text=Halo%20Beranda%20Digital,%20saya%20tertarik%20membeli%20Laravel%20Starter%20Kit', '/preview/screencapture-berandadigital-net-2026-08-19-17_31_05.png', 1, 2, '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(3, 7, 'Jasa Pembuatan Video Ucapan & Profil Digital', 'jasa-pembuatan-video-ucapan-profil-digital', 'Media Studio', 'Layanan Pembuatan Video Profil & Ucapan Hari Besar', 'Layanan pembuatan video profil perusahaan, instansi, dan ucapan hari raya dengan animasi modern.', '[\"Animasi HD 1080p \\/ 4K Modern\",\"Custom Voiceover & Backsound Lisensi Resmi\",\"Revisi Hingga Puas & Format Siap Sosial Media\",\"Pengerjaan Cepat 1-3 Hari\"]', 750000, 'one_time', 'https://berandadigital.net', 'https://wa.me/6289695249089?text=Halo%20Beranda%20Digital,%20saya%20tertarik%20membeli%20Jasa%20Video', '/preview/screencapture-berandadigital-net-video-ucapan-2026-08-19-17_54_48.png', 1, 3, '2026-08-27 02:27:25', '2026-08-27 02:27:25');

-- --------------------------------------------------------
-- Struktur dari tabel `trainings`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `trainings`;
CREATE TABLE IF NOT EXISTS `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `level` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'All Levels',
  `duration` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_audience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `syllabus` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`syllabus`)),
  `price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `trainings`
INSERT INTO `trainings` (`id`, `title`, `slug`, `level`, `duration`, `target_audience`, `summary`, `syllabus`, `price`, `thumbnail`, `is_featured`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Lecturer Development Program: Artificial Intelligence & Vibe Coding', 'lecturer-development-program-ai-vibe-coding', 'Executive & Dosen', '1 Hari Workshop Intensif', 'Dosen, Akademisi & Pengajar Perguruan Tinggi', 'Pelatihan Pemanfaatan Artificial Intelligence (AI) untuk pembuatan aplikasi praktis dan profesional tanpa coding, khusus bagi Dosen Politeknik Akamigas Palembang.', '[\"Pengenalan Konsep Vibe Coding & Generative AI\",\"Pembuatan Prototype Aplikasi Tanpa Baris Kode\",\"Pemanfaatan AI dalam Inovasi Pembelajaran Perguruan Tinggi\",\"Studi Kasus Otomasi Administrasi Akademik\"]', 1500000, '/preview/screencapture-berandadigital-test-trainer-2026-08-19-17_49_10.png', 1, 1, '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(2, 'Pelatihan Augmented Reality (AR) & Koding untuk Media Edukasi Interaktif', 'pelatihan-augmented-reality-ar-dan-koding', 'Guru & Praktisi Pendidikan', '1 Hari Workshop', 'Guru SD, SMP, SMA & Pengembang Media Pembelajaran', 'Pelatihan pembuatan aplikasi 3D Augmented Reality untuk visualisasi materi pelajaran interaktif di kelas.', '[\"Dasar 3D Modeling & AR Marker\",\"Pengenalan Software AR Creator\",\"Integrasi AR dengan Buku Pelajaran\",\"Publishing Aplikasi AR ke Smartphone\"]', 1200000, '/images/Flyer-AR-New-1-scaled.jpg', 1, 2, '2026-08-27 02:27:25', '2026-08-27 02:27:25');

-- --------------------------------------------------------
-- Struktur dari tabel `galleries`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'workshop',
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `galleries`
INSERT INTO `galleries` (`id`, `title`, `event_name`, `location`, `event_date`, `category`, `image_path`, `description`, `is_featured`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Tampilan Beranda Website Resmi Beranda Teknologi Digital', 'Original Web Preview', 'berandadigital.net', '2026-08-19 00:00:00', 'preview', '/preview/screencapture-berandadigital-net-2026-08-19-17_31_05.png', 'Tampilan asli beranda utama website Beranda Teknologi Digital.', 1, 1, '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(2, 'Keynote Speaker: Insight Talks Vol. 3 Palembang (Komdigi RI & Media Indonesia)', 'Insight Talks Vol. 3 Palembang', 'Hotel Harper Palembang', '2026-04-14 00:00:00', 'keynote', '/images/Insight-Talks-Komdigi.jpeg', 'Septa Ryan Hidayat (CEO Beranda Teknologi Digital) menjadi narasumber bersama Plt. Direktur Komdigi RI dan Direktur Media Indonesia.', 1, 2, '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(3, 'Halaman Layanan Jasa & Paket Pembuatan Aplikasi', 'Original Services Preview', 'berandadigital.net/layanan', '2026-08-19 00:00:00', 'preview', '/preview/screencapture-berandadigital-net-layanan-2026-08-19-17_52_22.png', 'Tampilan halaman layanan jasa pembuatan website, mobile app, dan sistem informasi.', 1, 3, '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(4, 'Halaman Profil Perusahaan & Bio Direktur Utama Septa Ryan Hidayat', 'Original Profile Preview', 'berandadigital.net/profile', '2026-08-19 00:00:00', 'preview', '/preview/screencapture-berandadigital-net-profile-2026-08-19-17_53_14.png', 'Tampilan halaman profil resmi CV. Beranda Teknologi Digital.', 1, 4, '2026-08-27 02:27:25', '2026-08-27 02:27:25');

-- --------------------------------------------------------
-- Struktur dari tabel `posts`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','published') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_category_id_foreign` (`category_id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Struktur dari tabel `inquiries`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `inquiries`;
CREATE TABLE IF NOT EXISTS `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `inquiries`
INSERT INTO `inquiries` (`id`, `name`, `email`, `phone`, `subject`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'Budi Santoso', 'budi@techcorp.id', '081299887766', 'Permintaan Penawaran Aplikasi Mobile & ERP', 'Halo Pak Septa Ryan & Tim Beranda Digital, kami berencana membangun aplikasi mobile dan ERP manufaktur. Mohon informasi jadwal diskusi.', 0, '2026-08-27 02:27:25', '2026-08-27 02:27:25');

-- --------------------------------------------------------
-- Struktur dari tabel `settings`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `settings`
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `label`, `type`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'CV. Beranda Teknologi Digital', 'general', 'Nama Perusahaan', 'text', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(2, 'site_tagline', 'Jasa Pembuatan Website, Sistem Informasi, Aplikasi Android/iOS & AI Solution', 'general', 'Tagline Utama', 'text', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(3, 'hero_tagline', 'Akselerasi Bisnis Anda Dengan Software & AI Solution Modern', 'hero', 'Tagline Hero', 'text', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(4, 'hero_description', 'Mitra transformasi digital terdepan di Indonesia. Kami menghadirkan jasa pengembangan aplikasi web enterprise, aplikasi mobile Android/iOS, solusi AI privat, serta penyelenggaraan pelatihan & workshop IT profesional.', 'hero', 'Deskripsi Hero', 'textarea', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(5, 'trainer_name', 'Septa Ryan Hidayat, S.Kom', 'trainer', 'Nama Trainer / Speaker', 'text', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(6, 'trainer_title', 'Direktur Utama CV. Beranda Teknologi Digital, Software Architect & AI Speaker', 'trainer', 'Gelar / Jabatan', 'text', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(7, 'trainer_bio', 'Direktur Utama & Lead Software Architect di CV. Beranda Teknologi Digital. Dewan Pakar IGI Ogan Ilir, Narasumber Komdigi & Media Indonesia, serta Trainer Nasional di bidang Vibe Coding, AI RAG Document, dan Pengembangan Aplikasi Web/Mobile.', 'trainer', 'Bio Trainer', 'textarea', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(8, 'trainer_avatar', '/images/Insight-Talks-Komdigi.jpeg', 'trainer', 'Foto Profile Trainer', 'text', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(9, 'trainer_stats_years', '8+', 'trainer', 'Pengalaman Tahun', 'text', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(10, 'trainer_stats_events', '85+', 'trainer', 'Workshop & Seminar', 'text', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(11, 'trainer_stats_alumni', '5,000+', 'trainer', 'Peserta Pelatihan', 'text', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(12, 'contact_email', 'info@berandadigital.net', 'contact', 'Email Resmi', 'text', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(13, 'contact_phone', '+62 896-9524-9089', 'contact', 'WhatsApp Utama', 'text', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(14, 'contact_phone_sec', '+62 811-7448-447', 'contact', 'WhatsApp Sekunder', 'text', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(15, 'contact_address', 'CV. Beranda Teknologi Digital Hub - Ogan Ilir & Palembang, Sumatra Selatan, Indonesia', 'contact', 'Alamat Kantor', 'textarea', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(16, 'social_linkedin', 'https://linkedin.com/company/berandadigital', 'social', 'LinkedIn', 'text', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(17, 'social_github', 'https://github.com/septaryanhidayat/btd', 'social', 'GitHub', 'text', '2026-08-27 02:27:25', '2026-08-27 02:27:25'),
(18, 'social_instagram', 'https://www.instagram.com/bteknologi_digital', 'social', 'Instagram', 'text', '2026-08-27 02:27:25', '2026-08-27 02:27:25');

-- --------------------------------------------------------
-- Struktur dari tabel `sessions`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data untuk tabel `sessions`
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('30irFFIasRbFqmCEO9KLf5CYln9z0OmOHVclw4y1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJlR2kwZlp3ZVp1ZlNITVpiVkZxNjRqbW9FNHdsZVdwYlJhSFRmNUttIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2JlcmFuZGFkaWdpdGFsLnRlc3QiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1787798545),
('nR1qH7injcsNc3WD3OnPZjnjbePdolPe7KOyPSHd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.29.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJVYVZUN3JiMTkwd0UzUHB2R0FnQzVxZW9XSGFxYUc0eW9jRmFPZkhvIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2JlcmFuZGFkaWdpdGFsLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1787801749),
('Ef9bfaXCRl8uTEyBqD9M6s7qFiamlAnnXSXkXXq5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.30.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJMNUpVOGIwZnZzdFRmZEFNZFdLQndWWXVacDdBbXB1ZTVQZE9lSHdsIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2JlcmFuZGFkaWdpdGFsLnRlc3RcLz9oZXJkPXByZXZpZXciLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1787802629),
('Qt3NY3Sh1pOCVqZFJfLSooogvJI7Io5T2Pi4a4Nk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJOWVpCeFRvU0drTmQ0T0p3bk9wdXY1NHRKUGpxbmRXUmtOTDdWc2hHIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2JlcmFuZGFkaWdpdGFsLnRlc3RcL3BvcnRmb2xpbyIsInJvdXRlIjoicHJvamVjdHMuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1787802768),
('RkRWF8sDMBzmAevpfRzEdsqVaOJCO7PSg7488e6M', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJybktlbWN4UE5VZHlkc2hueGpNQ05BWDVFR1lQUDR5TmpPckRkanFwIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2JlcmFuZGFkaWdpdGFsLnRlc3RcL3NlcnZpY2VzIiwicm91dGUiOiJzZXJ2aWNlcyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1787802768),
('z3LrPOTlAMQ2CGpHINbScFGuyCc2EryYfRc1f0V0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI4emNvZjczRFJSY1JXV0plQ3ZJZUdXUHRkaHQ5SEIzeFdNYmpMN3lBIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2JlcmFuZGFkaWdpdGFsLnRlc3QiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1787807441),
('QGTfha9whNeZW04et0aref7vVeXS2NRYK8YkKMGL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiIzaWRpdkdaMHVKUWJBUUZVT28xOFdjNXNkOXpFMXZHYlY1dDlOdWZSIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2JlcmFuZGFkaWdpdGFsLnRlc3QiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1787811967),
('O5HLVmew9jDv0RxHPYu3Q9TPCXXdXnR5YbBRAdHI', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJzSWNvV09lQUFJWEx0bUtzQjg3VUU5aTlPWFhqY0lOY0x4S0pmREtNIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2JlcmFuZGFkaWdpdGFsLnRlc3QiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=', 1787814333);

-- --------------------------------------------------------
-- Struktur dari tabel `cache`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Struktur dari tabel `cache_locks`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Struktur dari tabel `jobs`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
