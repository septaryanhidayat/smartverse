-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 08, 2026 at 02:52 PM
-- Server version: 11.4.13-MariaDB
-- PHP Version: 8.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berandad_db_btd`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('cv-beranda-teknologi-digital-cache-435c540d563e551ff7ed29901352fbd445b375fb', 'i:1;', 1788409012),
('cv-beranda-teknologi-digital-cache-435c540d563e551ff7ed29901352fbd445b375fb:timer', 'i:1788409012;', 1788409012),
('cv-beranda-teknologi-digital-cache-7c3be30e9b2c2352d1af865165ebb6fd5b74522a', 'i:1;', 1788155116),
('cv-beranda-teknologi-digital-cache-7c3be30e9b2c2352d1af865165ebb6fd5b74522a:timer', 'i:1788155116;', 1788155116),
('cv-beranda-teknologi-digital-cache-7df4ac778749793042733d352db866eeedf57993', 'i:1;', 1788853686),
('cv-beranda-teknologi-digital-cache-7df4ac778749793042733d352db866eeedf57993:timer', 'i:1788853686;', 1788853686),
('cv-beranda-teknologi-digital-cache-cb3a2e97b43b227513e3c0d04ef75a7227c26f2d', 'i:1;', 1788232146),
('cv-beranda-teknologi-digital-cache-cb3a2e97b43b227513e3c0d04ef75a7227c26f2d:timer', 'i:1788232146;', 1788232146),
('cv-beranda-teknologi-digital-cache-da4b9237bacccdf19c0760cab7aec4a8359010b0', 'i:8;', 1788860822),
('cv-beranda-teknologi-digital-cache-da4b9237bacccdf19c0760cab7aec4a8359010b0:timer', 'i:1788860822;', 1788860822),
('cv-beranda-teknologi-digital-cache-web_settings_global', 'a:59:{s:9:\"site_name\";s:29:\"CV. Beranda Teknologi Digital\";s:12:\"site_tagline\";s:76:\"Jasa Pembuatan Website, Sistem Informasi, Aplikasi Android/iOS & AI Solution\";s:12:\"hero_tagline\";s:59:\"Akselerasi Bisnis Anda Dengan Software & AI Solution Modern\";s:16:\"hero_description\";s:216:\"Mitra transformasi digital terdepan di Indonesia. Kami menghadirkan jasa pengembangan aplikasi web enterprise, aplikasi mobile Android/iOS, solusi AI privat, serta penyelenggaraan pelatihan & workshop IT profesional.\";s:12:\"trainer_name\";s:18:\"Septa Ryan Hidayat\";s:13:\"trainer_title\";s:77:\"Direktur Utama CV. Beranda Teknologi Digital, Software Architect & AI Speaker\";s:11:\"trainer_bio\";s:240:\"Direktur Utama & Lead Software Architect di CV. Beranda Teknologi Digital. Dewan Pakar IGI Ogan Ilir, Narasumber Komdigi & Media Indonesia, serta Trainer Nasional di bidang Vibe Coding, AI RAG Document, dan Pengembangan Aplikasi Web/Mobile.\";s:14:\"trainer_avatar\";s:34:\"/images/Insight-Talks-Komdigi.jpeg\";s:19:\"trainer_stats_years\";s:2:\"8+\";s:20:\"trainer_stats_events\";s:3:\"85+\";s:20:\"trainer_stats_alumni\";s:6:\"5,000+\";s:13:\"contact_email\";s:23:\"info@berandadigital.net\";s:13:\"contact_phone\";s:17:\"+62 896-9524-9089\";s:17:\"contact_phone_sec\";s:16:\"+62 811-7448-447\";s:15:\"contact_address\";s:93:\"Jalan Sarjana Kel. Timbangan Blok A No. 15, Indralaya Utara, Kab. Ogan Ilir, Sumatera Selatan\";s:15:\"social_linkedin\";s:43:\"https://linkedin.com/company/berandadigital\";s:13:\"social_github\";s:39:\"https://github.com/septaryanhidayat/btd\";s:16:\"social_instagram\";s:44:\"https://www.instagram.com/bteknologi_digital\";s:18:\"company_legal_name\";s:29:\"CV. Beranda Teknologi Digital\";s:11:\"company_ahu\";s:31:\"AHU-0003819-AH.01.14 Tahun 2022\";s:12:\"company_npwp\";s:20:\"63.100.018.9-312.000\";s:15:\"company_notaris\";s:79:\"Juwairiyah Handayani, S.H., M.Kn (Salinan Akta No. 01 Tanggal 29 Desember 2021)\";s:16:\"company_lkpp_url\";s:72:\"https://e-katalog.lkpp.go.id/katalog/produk/detail/48939397?type=regency\";s:24:\"contact_phone_wa_profile\";s:14:\"0896 9524 9089\";s:11:\"company_nib\";s:26:\"1203000102148 / KBLI 62019\";s:19:\"company_lkpp_status\";s:36:\"Terdaftar Resmi di E-Katalog LKPP RI\";s:13:\"stats_clients\";s:4:\"150+\";s:14:\"stats_projects\";s:3:\"85+\";s:18:\"stats_satisfaction\";s:5:\"99.8%\";s:16:\"stats_experience\";s:6:\"8+ Thn\";s:12:\"cta_headline\";s:19:\"Let\'s Work Together\";s:15:\"cta_description\";s:234:\"Revolusi Teknologi mengubah aspek kehidupan kita, dan struktur masyarakat itu sendiri. Konsultasikan rencana pembuatan website perusahaan, aplikasi mobile app, sistem informasi, atau pelatihan IT bersama CV. Beranda Teknologi Digital.\";s:19:\"theme_primary_color\";s:7:\"#0aabae\";s:24:\"theme_primary_color_text\";s:7:\"#0aabae\";s:18:\"theme_accent_color\";s:7:\"#fe6000\";s:23:\"theme_accent_color_text\";s:7:\"#fe6000\";s:13:\"theme_bg_soft\";s:7:\"#f4f7fe\";s:18:\"theme_bg_soft_text\";s:7:\"#f4f7fe\";s:13:\"stats_reviews\";s:3:\"85+\";s:10:\"site_title\";s:29:\"CV. Beranda Teknologi Digital\";s:16:\"site_description\";s:175:\"CV. Beranda Teknologi Digital adalah agensi teknologi digital modern di Indonesia. Jasa pembuatan website, aplikasi Android/iOS, solusi AI privat, dan workshop IT profesional.\";s:10:\"hero_badge\";s:42:\"Digital Agency & Software House Terpercaya\";s:12:\"hero_title_1\";s:11:\"CV. Beranda\";s:12:\"hero_title_2\";s:17:\"Teknologi Digital\";s:21:\"portfolio_description\";s:252:\"Eksplorasi portofolio proyek dan sistem informasi enterprise inovatif yang kami rancang dan kembangkan untuk berbagai instansi pemerintah, institusi pendidikan, dan perusahaan nasional. Klik foto portofolio untuk melihat galeri tampilan layar aplikasi.\";s:12:\"company_name\";s:29:\"CV. Beranda Teknologi Digital\";s:21:\"company_address_line1\";s:33:\"Jl. Sarjana, Timbangan, Ogan Ilir\";s:21:\"company_address_line2\";s:27:\"Sumatera Selatan, Indonesia\";s:19:\"company_postal_code\";s:5:\"30862\";s:12:\"site_website\";s:22:\"www.berandadigital.net\";s:15:\"company_address\";s:55:\"Jalan Sarjana Blok A No. 25 Timbangan, Ogan Ilir, 30862\";s:11:\"about_badge\";s:8:\"About us\";s:11:\"about_title\";s:52:\"We develop digital strategies products and services.\";s:17:\"about_description\";s:323:\"CV. Beranda Teknologi Digital adalah Digital Creative Agency & Software House terpercaya yang mempunyai pengalaman pembuatan ratusan website bisnis, sistem informasi instansi, dan toko online secara elegan dan profesional. Kami hadir dengan desain website yang mengikuti tren terkini, user friendly, dan mudah dioperasikan.\";s:17:\"about_button_text\";s:21:\"Pelajari Selengkapnya\";s:16:\"about_button_url\";s:9:\"/services\";s:11:\"about_image\";s:42:\"/uploads/settings/1788110563_sdWzPzpF.webp\";s:10:\"hero_image\";s:42:\"/uploads/settings/1788112390_UwpvtmaQ.webp\";s:8:\"og_image\";s:42:\"/uploads/settings/1788112520_ATEH7Bt9.webp\";}', 1788589570);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'project',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Website & System Information', 'website-system-info', 'project', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(2, 'Mobile App (Android & iOS)', 'mobile-app-android-ios', 'project', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(3, 'AI & Intelligent Automation', 'ai-automation', 'project', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(4, 'School & Smart Village', 'school-smart-village', 'project', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(5, 'SaaS Platform', 'saas-platform', 'product', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(6, 'Enterprise Script', 'enterprise-script', 'product', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(7, 'AI Suite & Chatbot', 'ai-suite', 'product', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(8, 'Workshop & Keynote Event', 'workshop-keynote-event', 'post', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(9, 'Teknologi & Vibe Coding', 'teknologi-vibe-coding', 'post', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(10, 'AI & Machine Learning', 'ai-machine-learning', 'post', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(11, 'Website Enterprise', 'website-enterprise', 'project', '2026-08-30 12:10:32', '2026-08-30 12:10:32'),
(12, 'Aplikasi Mobile', 'aplikasi-mobile', 'project', '2026-08-30 12:10:32', '2026-08-30 12:10:32'),
(13, 'Sistem Informasi', 'sistem-informasi', 'project', '2026-08-30 12:10:32', '2026-08-30 12:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `digital_products`
--

CREATE TABLE `digital_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `badge` varchar(100) DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `price_type` varchar(255) NOT NULL DEFAULT 'one_time',
  `demo_url` varchar(255) DEFAULT NULL,
  `buy_url` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `digital_products`
--

INSERT INTO `digital_products` (`id`, `category_id`, `title`, `slug`, `badge`, `tagline`, `description`, `features`, `price`, `price_type`, `demo_url`, `buy_url`, `thumbnail`, `is_featured`, `order`, `created_at`, `updated_at`) VALUES
(1, 5, 'Sistem Aplikasi Administrasi Desa Digital (Smart Village)', 'sistem-aplikasi-administrasi-desa-digital', 'Smart Village', 'Platform Digitalisasi Surat Desa, Data Kependudukan & Portal Publik', 'Aplikasi web siap pakai untuk kantor desa yang membutuhkan sistem cetak surat otomatis, verifikasi QR code, dan portal informasi publik.', '[\"Modul Cetak Surat Otomatis 30+ Jenis Surat Desa\",\"Otentikasi Tanda Tangan Digital QR Code\",\"Database Kependudukan & Statistik RT\\/RW\",\"Support SQLite untuk Server Desa & MySQL Online\"]', 1990000.00, 'one_time', 'https://berandadigital.net', 'https://wa.me/6289695249089?text=Halo%20Beranda%20Digital,%20saya%20tertarik%20membeli%20Aplikasi%20Desa%20Digital', '/images/products/smart-village-mockup.jpg', 1, 1, '2026-08-19 10:57:35', '2026-08-30 11:56:44'),
(2, 6, 'Enterprise Starter Kit Laravel 13 & Tailwind v4', 'enterprise-starter-kit-laravel-13', 'Boilerplate Script', 'Arsitektur Boilerplate Siap Pakai dengan Dark/Light Mode & RBAC', 'Boilerplate terlengkap untuk startup dan pengembang software. Dilengkapi sistem autentikasi, manajemen pengguna, log audit, dan tema ganda.', '[\"Laravel 13 & PHP 8.4 Support Out of The Box\",\"Dukungan SQLite (Dev) & MySQL (Production)\",\"Fitur Dual Theme: Light & Dark Mode Persisted\",\"Role & Permission Management bawaan\",\"Clean Architecture Standard\"]', 499000.00, 'one_time', 'https://berandadigital.net', 'https://wa.me/6289695249089?text=Halo%20Beranda%20Digital,%20saya%20tertarik%20membeli%20Laravel%20Starter%20Kit', '/images/products/enterprise-web-mockup.jpg', 1, 2, '2026-08-19 10:57:35', '2026-08-30 11:56:44'),
(3, 7, 'Jasa Pembuatan Video Ucapan & Profil Digital', 'jasa-pembuatan-video-ucapan-profil-digital', 'Media Studio', 'Layanan Pembuatan Video Profil & Ucapan Hari Besar', 'Layanan pembuatan video profil perusahaan, instansi, dan ucapan hari raya dengan animasi modern.', '[\"Animasi HD 1080p \\/ 4K Modern\",\"Custom Voiceover & Backsound Lisensi Resmi\",\"Revisi Hingga Puas & Format Siap Sosial Media\",\"Pengerjaan Cepat 1-3 Hari\"]', 750000.00, 'one_time', 'https://berandadigital.net', 'https://wa.me/6289695249089?text=Halo%20Beranda%20Digital,%20saya%20tertarik%20membeli%20Jasa%20Video', '/images/products/school-portal-mockup.jpg', 1, 3, '2026-08-19 10:57:35', '2026-08-30 11:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `category` varchar(100) NOT NULL DEFAULT 'workshop',
  `image_path` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `event_name`, `location`, `event_date`, `category`, `image_path`, `description`, `is_featured`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Tampilan Beranda Website Resmi Beranda Teknologi Digital', 'Original Web Preview', 'berandadigital.net', '2026-08-19', 'preview', '/preview/screencapture-berandadigital-net-2026-08-19-17_31_05.png', 'Tampilan asli beranda utama website Beranda Teknologi Digital.', 1, 1, '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(2, 'Keynote Speaker: Insight Talks Vol. 3 Palembang (Komdigi RI & Media Indonesia)', 'Insight Talks Vol. 3 Palembang', 'Hotel Harper Palembang', '2026-04-14', 'keynote', '/images/Insight-Talks-Komdigi.jpeg', 'Septa Ryan Hidayat (CEO Beranda Teknologi Digital) menjadi narasumber bersama Plt. Direktur Komdigi RI dan Direktur Media Indonesia.', 1, 2, '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(3, 'Halaman Layanan Jasa & Paket Pembuatan Aplikasi', 'Original Services Preview', 'berandadigital.net/layanan', '2026-08-19', 'preview', '/preview/screencapture-berandadigital-net-layanan-2026-08-19-17_52_22.png', 'Tampilan halaman layanan jasa pembuatan website, mobile app, dan sistem informasi.', 1, 3, '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(4, 'Halaman Profil Perusahaan & Bio Direktur Utama Septa Ryan Hidayat', 'Original Profile Preview', 'berandadigital.net/profile', '2026-08-19', 'preview', '/preview/screencapture-berandadigital-net-profile-2026-08-19-17_53_14.png', 'Tampilan halaman profil resmi CV. Beranda Teknologi Digital.', 1, 4, '2026-08-19 10:57:35', '2026-08-19 10:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `invoice_date` date NOT NULL,
  `due_date` date DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'paid',
  `client_type` varchar(255) NOT NULL DEFAULT 'Personal',
  `client_name` varchar(255) NOT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `client_attn` varchar(255) DEFAULT NULL,
  `client_address` text DEFAULT NULL,
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`items`)),
  `total_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `paid_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `remaining_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `transactions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`transactions`)),
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_number`, `invoice_date`, `due_date`, `status`, `client_type`, `client_name`, `client_email`, `client_attn`, `client_address`, `items`, `total_amount`, `paid_amount`, `remaining_amount`, `transactions`, `notes`, `created_at`, `updated_at`) VALUES
(1, '1675516', '2026-07-30', '2026-07-30', 'paid', 'Personal', 'Ibu Silvi Aryanti', NULL, 'ATTN: Ibu Silvi Aryanti', 'Palembang, Indonesia', '[{\"description\":\"Pelunasan Pembuatan Aplikasi https://sa-badmintonapp.com\",\"amount\":3000000}]', 3000000.00, 3000000.00, 0.00, '[{\"date\":\"20/07/2026\",\"payment_method\":\"ShopeePay\",\"transaction_id\":\"UWSK6XWZ6WF5OTDOV2CS61J4QDIKA\",\"amount\":1500000},{\"date\":\"30/07/2026\",\"payment_method\":\"ShopeePay\",\"transaction_id\":\"UWSMKOFZT6TTMFZKXI5FNEJJCD6QA\",\"amount\":1500000}]', 'Terima kasih atas kerja sama dan kepercayaan Anda bersama CV. Beranda Teknologi Digital.', '2026-08-30 15:15:13', '2026-08-30 15:15:13'),
(3, '1675518', '2026-09-03', '2026-09-03', 'unpaid', 'Institusi Pendidikan', 'Pimpinan Ponpes Raudhatul Ulum', NULL, 'ATTN: Pimpinan Ponpes Raudhatul Ulum', 'Desa Sakatiga Kecamatan Indralaya, Ogan Ilir', '[{\"description\":\"Pengerjaan desain website resmi untuk Ponpes Raudhatul Ulum dengan rincian layanan mencakup :    \\u2022 Desain dan Pembuatan Website   \\u2022 Migrasi Domain   \\u2022 Sewa Hosting (Masa aktif 1 tahun)   \\u2022 Instalasi Keamanan SSL (Secure Socket Layer)   \\u2022 Lisensi Theme & Widget Premium   \\u2022 Biaya Perawatan (Maintenance) selama 1 tahun\",\"amount\":3000000}]', 3000000.00, 0.00, 3000000.00, '[{\"date\":\"-\",\"payment_method\":\"-\",\"transaction_id\":\"-\",\"amount\":0}]', 'Terima kasih atas kerja sama dan kepercayaan Anda bersama CV. Beranda Teknologi Digital.', '2026-09-03 04:20:52', '2026-09-03 04:38:57'),
(4, '1675519', '2026-09-08', '2026-09-11', 'unpaid', 'Personal', 'APPSI Kabupaten Banyuasin', NULL, 'ATTN: Pak Wardoyo, S.I.Kom.', 'Banyuasin, Sumsel', '[{\"description\":\"Tagihan Pembuatan Website https:\\/\\/appsiba.or.id & Aplikasi Administrasi APPI Banyuasin\",\"amount\":5000000}]', 5000000.00, 0.00, 5000000.00, '[{\"date\":\"-\",\"payment_method\":\"-\",\"transaction_id\":\"-\",\"amount\":0}]', 'Terima kasih atas kerja sama dan kepercayaan Anda bersama CV. Beranda Teknologi Digital.', '2026-09-08 07:49:43', '2026-09-08 09:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '0001_01_01_000003_create_beranda_tables', 1),
(5, '2026_08_19_000004_create_products_trainings_galleries_table', 1),
(6, '2026_08_30_000005_add_slider_and_details_to_projects_table', 2),
(7, '2026_08_30_000001_create_invoices_table', 3),
(8, '2026_08_30_000002_add_avatar_to_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `body` longtext NOT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'published',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `thumbnail`, `excerpt`, `body`, `status`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 'Webinar Online : Masjid Go Digital', 'webinar-masjid-go-digital-6a858c1f6b1a7', '/images/Masjid-GO-1.png', '\nAssalamualaikum Warahmatullah,\n\n\n\nBeranda Teknologi Digital proudly present :\n\n...', '<!-- wp:paragraph -->\n<p>Assalamualaikum Warahmatullah,</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Beranda Teknologi Digital proudly present :</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong>MASJID GO DIGITAL : Pelatihan Online Pembuatan Website Masjid Gratis!</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Agenda ini terbuka untuk masyarakat Umum dan bersifat <strong>GRATIS</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Catat informasi pentingnya :<br>Hari/Tanggal : Sabtu, 23 April 2022<br>Pukul : 09.00 WIB s/d selesai<br>Media : Grup Telegram dan Zoom Meeting</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong>Link Pendaftaran : <a href=\"http://s.id/MasjidGoDigital\" target=\"_blank\" aria-label=\"undefined (opens in a new tab)\" rel=\"noreferrer noopener\">s.id/MasjidGoDigital</a></strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Kami tunggu kehadiran Anda.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Terimakasih</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>__________________<br>Informasi lebih lanjut :<br>email : bteknologi.digital@gmail.com<br>instagram :&nbsp;<a href=\"https://www.instagram.com/bteknologi.digital/\">@bteknologi.digital</a><br>WhatsApp : 0811 7448 447</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong>www.berandadigital.net</strong></p>\n<!-- /wp:paragraph -->', 'published', '2022-04-13 03:33:04', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(2, 10, 1, 'Augmented Reality for Education', 'augmentedreality-6a858c1f6bfc7', '/images/WhatsApp-Image-2022-08-30-at-08.46.40.jpeg', '\nTerbuka untuk Umum 🔊\n\n\n\nAugmented Reality for Education\n\n\n...', '<!-- wp:paragraph -->\n<p>Terbuka untuk Umum 🔊</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Augmented Reality for Education</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Hallo Sobat Ralenta dimanapun kalian berada 📸</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Ralenta Learning Center kali ini akan mengadakan Pelatihan Pembuatan Media Pembelajaran menggunakan \"Augmented Reality \"</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Nah disini kita akan mempelajari cara membuat Media Pembelajaran yang dapat menggabungkan benda maya dua dimensi dan ataupun tiga dimensi ke dalam sebuah<br>lingkungan nyata lalu memproyeksikan benda-benda maya tersebut secara realitas dalam waktu nyata.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Dengan mengikuti Pelatihan ini, kamu tidak perlu mengeluarkan uang sampai Jutaan loh 😱</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Hanya dengan Rp. 100.000 (Offline) dan Rp. 75.000 (Online) saja kamu sudah bisa mendapatkan ilmu esklusif langsung dari Pemateri, Sertifikat, Snack, dan juga Bonus berupa :</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:list -->\n<ul><li>Video Tutorial tentang AR</li><li>Template PPT untuk Media Pembelajaran</li><li>Free Konsultasi selama 3 hari bersama pembicara</li></ul>\n<!-- /wp:list -->\n\n<!-- wp:paragraph -->\n<p>🧑🏻‍🏫 Pembicara :<br>Septa Ryan Hidayat</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:list -->\n<ul><li>Project Manager CV. Beranda Teknologi Digital</li><li>Web &amp; Android Delevoper</li><li>Trainer Nasional RLC</li></ul>\n<!-- /wp:list -->\n\n<!-- wp:paragraph -->\n<p>📆 Sabtu, 10 September 2022<br>⏰ 08.30 - 11.30<br>🏠 Aula SD IT Robbani Ogan Ilir (offline)<br>💻 Zoom (Online)</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Pendaftaran :<br></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Kuota Terbatas Loh, jangan lewatkan kesempatan Emas ini 😱</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Ada pertanyaan ? Chat mimin aja yaa<br><a href=\"http://wa.me/628117448480\" data-type=\"URL\" data-id=\"wa.me/628117448480\" target=\"_blank\" rel=\"noreferrer noopener\">wa.me/628117448480</a></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Presented by Ralenta Learning Center</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Suported by :</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:list -->\n<ul><li>CV. Beranda Teknologi Digital</li><li>SIT Robbani Ogan Ilir</li></ul>\n<!-- /wp:list -->', 'published', '2022-09-05 02:45:35', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(3, 8, 1, 'Perpanjangan Pendaftaran Augmented Reality for Education', 'perpanjangan-pendaftaran-augmented-reality-for-education-6a858c1f6cc0d', '/images/Flyer-AR-New-1-scaled.jpg', '\nPerpanjangan Pendaftaran....\n\n\n\nPelatihan diubah menjadi hari Sabtu, 17 September 2022...', '<!-- wp:paragraph -->\n<p>Perpanjangan Pendaftaran....</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Pelatihan diubah menjadi hari <strong>Sabtu, 17 September 2022</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Ralenta Learning Center kali ini akan mengadakan <em>Pelatihan Pembuatan Media Pembelajaran menggunakan \"Augmented Reality \"</em></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Nah disini kita akan mempelajari cara membuat Media Pembelajaran yang dapat menggabungkan benda maya dua dimensi dan ataupun tiga dimensi ke dalam sebuah<br />lingkungan nyata lalu memproyeksikan benda-benda maya tersebut secara realitas dalam waktu nyata.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Dengan mengikuti Pelatihan ini, kamu tidak perlu mengeluarkan uang sampai Jutaan loh 😱</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Hanya dengan Rp. 100.000 (Offline) dan Rp. 75.000 (Online) saja kamu sudah bisa mendapatkan ilmu esklusif langsung dari Pemateri, Sertifikat, Snack, dan juga Bonus berupa :</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:list -->\n<ul>\n<li>Video Tutorial tentang AR</li>\n<li>Template PPT untuk Media Pembelajaran</li>\n<li>Free Konsultasi selama 3 hari bersama pembicara</li>\n</ul>\n<!-- /wp:list -->\n\n<!-- wp:paragraph -->\n<p>🧑🏻‍🏫 Pembicara :<br />Septa Ryan Hidayat</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:list -->\n<ul>\n<li>Project Manager CV. Beranda Teknologi Digital</li>\n<li>Web &amp; Android Delevoper</li>\n<li>Trainer Nasional RLC</li>\n</ul>\n<!-- /wp:list -->\n\n<!-- wp:paragraph -->\n<p>📆 Sabtu, 17 September 2022<br />⏰ 08.30 - 11.30<br />🏠 Aula SD IT Robbani Ogan Ilir (offline)<br />💻 Zoom (Online)</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Pendaftaran :<br /></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Kuota Terbatas Loh, jangan lewatkan kesempatan Emas ini 😱</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Ada pertanyaan ? Chat mimin aja yaa<br /><a href=\"http://wa.me/628117448480\" target=\"_blank\" rel=\"noreferrer noopener\" data-type=\"URL\" data-id=\"wa.me/628117448480\">wa.me/628117448480</a></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Presented by Ralenta Learning Center</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Suported by :</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:list -->\n<ul>\n<li>CV. Beranda Teknologi Digital</li>\n<li>SIT Robbani Ogan Ilir</li>\n</ul>\n<!-- /wp:list -->', 'published', '2022-09-13 04:56:07', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(4, 10, 1, 'Mari Ikuti Training for Trainer \"Coding for Kids\" Tahun 2023', 'tft-codingforkids2023-6a858c1f6d80b', '/images/Flyer-Coding-for-Kids-3.png', '...', '<img class=\"aligncenter wp-image-2582 size-large\" src=\"http://berandadigital.net/wp-content/uploads/2023/06/Flyer-Coding-for-Kids-3-1024x1024.png\" alt=\"\" width=\"1024\" height=\"1024\" />\n\nDi era digital saat ini, Coding memiliki pengaruh besar di masa depan, bahkan banyak jenis pekerjaan yang baru yang membutuhkan kemampuan coding.\n\nMengenalkan dasar coding yang mudah dipelajari oleh anak-anak sehingga mereka mampu untuk membuat membuat karya digital berupa story, animasi, hingga game.\n\n<strong>Beranda Teknologi Digital</strong> bekerjasama dengan <strong>SIT Robbani Ogan Ilir</strong> mengadakan :\n\n<strong>Training for Trainer</strong>\n<strong>\"Coding for Kids 2023\"</strong>\n<em>Pelatihan Coding for Kids Gratis untuk Guru SIT Robbani Ogan Ilir</em>\n\n<strong>Apa yang akan di pelajari pada materi ini ?</strong>\n1️⃣ Apa itu Coding\n2️⃣ Coding untuk Tenaga Pengajar\n3️⃣ Praktik Penggunaan Program Coding for Kids\n\n<strong>Siapa Pemateri dalam Kegiatan ini ?</strong>\n🧑🏻‍🏫 Septa Ryan Hidayat\n▶️ Project Manager CV Beranda Teknologi Digital\n▶️ Software Engineer\n\n<strong>Kapan Pelaksanaannya?</strong>\n📆 Sabtu, 5 Agustus 2023\n🕗 08.00 - 12.00 WIB\n🛜 Aula SIT Robbani Ogan Ilir\n\n<strong>🔊 Coming Soon</strong>\nKelas terbuka untuk Umum Training for Trainer Coding For Kids (Offline dan Online)\n\n▶️ Pelaksanaan Bulan September\n▶️ Investasi hanya 149k\n▶️ Fasilitas Sertifikat, Modul Pembelajaran, etc\n\nAyo Booking Seat dari Sekarang juga\n<strong>Kuota Terbatas !!!</strong>\n\nKonsultasi Gratis, hubungi kami ⬇️\nPusat Informasi:\n▶️ WhatsApp : 082373222040\n▶️ Email : info@berandadigital.net', 'published', '2023-06-27 11:11:59', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(5, 8, 1, 'Pelatihan Coding for Kids, belajar Coding mudah dan menyenangkan', 'coding4kids2023-6a858c1f6e3ce', '/images/FlyerCoding-for-Kids2023-scaled.jpg', '...', '<img class=\"aligncenter wp-image-2612 size-full\" src=\"http://berandadigital.net/wp-content/uploads/2023/09/FlyerCoding-for-Kids2023-scaled.jpg\" alt=\"\" width=\"2048\" height=\"2048\" />\n\nUndangan Mengikuti Pelatihan Coding for Kids 2023\n\nHello Sobat Ralenta! Mari tingkatkan skill digital kamu dengan belajar coding yang mudah dan menyenangjan bersama Ralenta Learning Center\n\n🗓️ Schedule :\nPendaftaran : 29 Agustus - 15 September 2023\nTraining : 16 September 2023\n\nNarasumber:\n🧑🏻‍🏫 Septa Ryan Hidayat\n▶️ Project Manager CV Beranda Teknologi Digital\n▶️ Software Engineer\n▶️ Trainer RLC\n\nKapan Pelaksanaan?\n📆 Sabtu, 16 September 2023\n🕗 08.00 - 11.30 WIB\n🛜 Aula SIT Robbani Ogan Ilir\n\n📌 Syarat dan Ketentuan :\n1. Mengisi form pendaftran pada link s.id/coding4kids-rlc\n2. Membayar biaya pendafaran senilai Rp. 149. 000\n3. Konfirmasi ke WhatsApp 082181898916\n\n✨ Benefit:\n1. Sertifikat\n2. Ilmu yang bermanfaat\n3. Snack\n4. Belajar Coding Mudah dan Menyenangkan\n5. Ruang Training ber-AC\n6. Networking\n7. Reward untuk peserta terbaik\n\nAyo Booking Seat dari Sekarang juga\nKUOTA TERBATAS hanya untuk 30 orang!\n-----------------------------------------------\nInfo lebih lanjut hubungi nomor berikut 082181898916 (Admin RLC)\n\n#codingforkids\n#pelatihancodingmudah\n#semuabisacoding', 'published', '2023-09-01 14:19:51', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(6, 10, 1, 'Pelatihan Website Desa dan Aplikasi Administrasi Surat Sesa Senuro Timur', 'pelatihan-website-desa-dan-aplikasi-administrasi-surat-sesa-senuro-timur-6a858c1f6f0ec', '/images/495965916_995856726093998_1582227333173346053_n.jpg', '\nTelah dilaksanakan Pelatihan Website Desa dan Aplikasi Administrasi S...', '<div class=\"xdj266r x14z9mp xat24cr x1lziwak x1vvkbs x126k92a\">\n<div dir=\"auto\"><span style=\"font-size: 16px;\">Telah dilaksanakan Pelatihan Website Desa dan Aplikasi Administrasi Surat Desa Senuro Timur Kab. Ogan Ilir pada hari Rabu, 07 Mei 2025. Pertemuan ini dihadiri oleh Kepala Desa, Pendamping Desa dan Operator Desa yang akan mengelola Website Desa dan Aplikasi Administrasi Surat Desa.</span></div>\n</div>\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\n<div dir=\"auto\">Harapannya Website dan Aplikasi yang Beranda Teknologi Digital telah buat dapat dipergunakan dengan maksimal agar terciptanya layanan dan informasi Desa berbasis Digital.</div>\n</div>\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\n<div dir=\"auto\"><span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/websitedesa?__eep__=6&amp;__cft__[0]=AZYXWTE31wqBSh-iX6QPLKCx0frm2MDDJK-PXfWBKn0xH5nK5mFKW0IOkZzi583N4e6TfGmJFOk3yDYn5r6lxuEsBP1fkGgmUd6iph3zW_7Ylp4kmPPgfLNUXHVWtQIuFM_DZ2eXxVw9jKhkHiz6O9b1BoTD6m8SmzybWkCPJhWMgR55_Q2aS3WdcdWiio-N9bI&amp;__tn__=*NK-R\">#websitedesa</a></span></div>\n<div dir=\"auto\"><span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/berandateknologidigital?__eep__=6&amp;__cft__[0]=AZYXWTE31wqBSh-iX6QPLKCx0frm2MDDJK-PXfWBKn0xH5nK5mFKW0IOkZzi583N4e6TfGmJFOk3yDYn5r6lxuEsBP1fkGgmUd6iph3zW_7Ylp4kmPPgfLNUXHVWtQIuFM_DZ2eXxVw9jKhkHiz6O9b1BoTD6m8SmzybWkCPJhWMgR55_Q2aS3WdcdWiio-N9bI&amp;__tn__=*NK-R\">#berandateknologidigital</a></span></div>\n</div>', 'published', '2025-05-08 10:26:55', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(7, 8, 1, 'Menciptakan Chatbot AI Sederhana dan Personal dengan Phyton: Tanpa API OpenAI, Sesuai Kebutuhan', 'menciptakan-chatbot-ai-sederhana-dan-personal-dengan-phyton-tanpa-api-openai-sesuai-kebutuhan-6a858c1f6fd0e', '/images/486603910_961047622908242_7404185485069841584_n.jpg', 'Apakah Bapak dan ibu tertarik untuk membuat chatbot AI yang dapat menjawab pertanyaan sesuai kebutuhan spesifik Bapak dan ibu, tanpa bergantung pada API eksternal seperti OpenAI?...', 'Apakah Bapak dan ibu tertarik untuk membuat chatbot AI yang dapat menjawab pertanyaan sesuai kebutuhan spesifik Bapak dan ibu, tanpa bergantung pada API eksternal seperti OpenAI?<br class=\"html-br\" />Ini kesempatan bagi Bapak dan ibu!<br class=\"html-br\" /><br class=\"html-br\" />Ikuti Workshop Online intensif dari IGI Kabupaten Ogan Ilir, bekerjasama dengan Beranda Teknologi Digital:<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5c/1/16/1f5d3.png\" alt=\"🗓\" width=\"16\" height=\"16\" /></span> Tanggal: 17-19 Februari 2025<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t34/1/16/23f0.png\" alt=\"⏰\" width=\"16\" height=\"16\" /></span> Waktu: 19:00 WIB<br class=\"html-br\" />Klik untuk mendaftar: <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2FChatbotIGIOI%3Ffbclid%3DIwZXh0bgNhZW0CMTAAYnJpZBExUGk3TW9BS1Zwd1paNVROZ3NydGMGYXBwX2lkEDIyMjAzOTE3ODgyMDA4OTIAAR7DN3IGTtLxqmNeck2LPvjywWfXkVs32OTkzZpCGEwQ7JPQZwEp3k5JklsSJA_aem_nhkESo_24GSHSqOFNbIUlg&amp;h=AT66RBQCCqjZa0N0gKRnkexB13synld9dYTBwXRxMQOHgUWDeMTyCSTO5JtutsYqhjbBTCn9SvIWVjTmgJrW85anOsC2XWIjba_NFSrccb-4fZjBnqIVtR89Oo11D8b0tHQvJFO95SuP6VycCW-y6IStbpTipw&amp;__tn__=-UK*F&amp;c[0]=AT7W_veyLyAIA2cmnU-IbTNcsu3CYgWG8IuyvtmjdhEU2KoAKQCBUDP9LLQUZ1POSReZR_RDl4yfwyxpIC5hmxBd1oAFZcCVImoyGzvWSFripzAql2q2M9La6lKps-mhW4vo0yNJsf_zZvrM6YKG--a5o2D2Po60rPuGd4RmR_P4X9g7dEFL6BXiYIUmec2xaglePFNwIiFCo44niykvl22a\" target=\"_blank\" rel=\"nofollow noopener noreferrer\">https://bit.ly/ChatbotIGIOI</a></span><br class=\"html-br\" />Biaya Pendaftaran<br class=\"html-br\" />Anggota IGI= Rp. 50.000<br class=\"html-br\" />Umum=Rp.100.000<br class=\"html-br\" /><br class=\"html-br\" />Rekening:<br class=\"html-br\" />17101000722<br class=\"html-br\" />BSB an. Septy Liana<br class=\"html-br\" /><br class=\"html-br\" />Fasilitas Peserta:<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" alt=\"✔\" width=\"16\" height=\"16\" /></span>E-Sertifikat 32 JP<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" alt=\"✔\" width=\"16\" height=\"16\" /></span>Materi Lengkap<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" alt=\"✔\" width=\"16\" height=\"16\" /></span>Pendampingan Intensif<br class=\"html-br\" /><br class=\"html-br\" />Gabung di pelatihan eksklusif ini dan pelajari cara membangun \"chatbot AI mandiri\" yang dapat disesuaikan dengan topik dan bidang yang Bapak dan ibu pilih! Bapak dan ibu bisa mengontrol sepenuhnya nama, data, dan jawaban chatbot Bapak dan ibu, tanpa harus menggunakan API berbayar atau platform eksternal.<br class=\"html-br\" /><br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tad/1/16/1f511.png\" alt=\"🔑\" width=\"16\" height=\"16\" /></span> Apa yang akan Bapak dan ibu pelajari?<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" alt=\"✔️\" width=\"16\" height=\"16\" /></span> Pengenalan Chatbot AI dan penerapannya di berbagai bidang<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" alt=\"✔️\" width=\"16\" height=\"16\" /></span> Cara membangun chatbot mandiri tanpa menggunakan API eksternal<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" alt=\"✔️\" width=\"16\" height=\"16\" /></span> Kustomisasi database pertanyaan dan jawaban sesuai topik<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" alt=\"✔️\" width=\"16\" height=\"16\" /></span> Teknik dan tools pengembangan chatbot yang efisien dan bebas biaya<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" alt=\"✔️\" width=\"16\" height=\"16\" /></span> Implementasi dan pengujian untuk memastikan kualitas jawaban yang akurat dan responsif<br class=\"html-br\" /><br class=\"html-br\" />Pelatihan ini akan dipandu langsung oleh Bapak Septa Ryan Hidayat, Software Engineer dan Project Manager di <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://l.facebook.com/l.php?u=http%3A%2F%2Fberandadigital.net%2F%3Ffbclid%3DIwZXh0bgNhZW0CMTAAYnJpZBExUGk3TW9BS1Zwd1paNVROZ3NydGMGYXBwX2lkEDIyMjAzOTE3ODgyMDA4OTIAAR6ojz4XsnlBOo0VkruySq206j5s0LO_PMA0V3DAeyY00NgLI6h66X44CsUGXw_aem_jzvTZ2QQWP2j65w-X7D44g&amp;h=AT7BJBhIo_LG3hNo0pp-hC-1aUWZ1P9BiZ5XxGgrun7SUSOT_TdULLkWSN27sfDbof_gaoDeYe9BfQcuwCo1u-yFpRBJ-DQqGvL0BVZPBxmFnxOCSKfpS5ibGPJWfcoEiQQkxaLiZKDgmEgJQFto0AiFdc5imQ&amp;__tn__=-UK*F&amp;c[0]=AT7W_veyLyAIA2cmnU-IbTNcsu3CYgWG8IuyvtmjdhEU2KoAKQCBUDP9LLQUZ1POSReZR_RDl4yfwyxpIC5hmxBd1oAFZcCVImoyGzvWSFripzAql2q2M9La6lKps-mhW4vo0yNJsf_zZvrM6YKG--a5o2D2Po60rPuGd4RmR_P4X9g7dEFL6BXiYIUmec2xaglePFNwIiFCo44niykvl22a\" target=\"_blank\" rel=\"nofollow noopener noreferrer\">berandadigital.net.</a></span><br class=\"html-br\" /><br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/te0/1/16/1f31f.png\" alt=\"🌟\" width=\"16\" height=\"16\" /></span> Jangan lewatkan kesempatan ini untuk mengeksplorasi teknologi AI dengan cara yang baru dan inovatif!<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\" alt=\"👉\" width=\"16\" height=\"16\" /></span> Daftar sekarang dan siapkan diri untuk belajar cara menciptakan chatbot AI yang sepenuhnya personal! <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://bit.ly/ChatbotIGIOI?fbclid=IwZXh0bgNhZW0CMTAAYnJpZBExUGk3TW9BS1Zwd1paNVROZ3NydGMGYXBwX2lkEDIyMjAzOTE3ODgyMDA4OTIAAR5qjt38xr6EiHmfOBWQcE3HDjVnr4fcbD4mwiHG9g3QWEl2VREOJreF9x9b3A_aem_PIcGE7uqnDmbJEYUcrej5g\" target=\"_blank\" rel=\"nofollow noopener noreferrer\">https://bit.ly/ChatbotIGIOI</a></span><br class=\"html-br\" /><br class=\"html-br\" /><span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xzsf02u x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/chatbotai?__eep__=6&amp;__cft__[0]=AZYz2oYrLeujvDNSvKYn5oKFoHgUqsTA7UsP3-ELjT2yTA0T2XmliW_GdWVbPXe-XoY8LVR_xSWA1Ce9ry6vtgq1POhLbV1yAOnjgxhT4Wx98K_IhyoGpgAyyFq_ktBjVwgF3SML9eVnxJ87QoqaD4o2BVPNKZ7RAgDC4C-yByUKDdUgxDLNqFnkLMT5P2frdaY&amp;__tn__=*NK*F\">#ChatbotAI</a></span> <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xzsf02u x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/pelatihanai?__eep__=6&amp;__cft__[0]=AZYz2oYrLeujvDNSvKYn5oKFoHgUqsTA7UsP3-ELjT2yTA0T2XmliW_GdWVbPXe-XoY8LVR_xSWA1Ce9ry6vtgq1POhLbV1yAOnjgxhT4Wx98K_IhyoGpgAyyFq_ktBjVwgF3SML9eVnxJ87QoqaD4o2BVPNKZ7RAgDC4C-yByUKDdUgxDLNqFnkLMT5P2frdaY&amp;__tn__=*NK*F\">#PelatihanAI</a></span> <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xzsf02u x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/teknologi?__eep__=6&amp;__cft__[0]=AZYz2oYrLeujvDNSvKYn5oKFoHgUqsTA7UsP3-ELjT2yTA0T2XmliW_GdWVbPXe-XoY8LVR_xSWA1Ce9ry6vtgq1POhLbV1yAOnjgxhT4Wx98K_IhyoGpgAyyFq_ktBjVwgF3SML9eVnxJ87QoqaD4o2BVPNKZ7RAgDC4C-yByUKDdUgxDLNqFnkLMT5P2frdaY&amp;__tn__=*NK*F\">#Teknologi</a></span> <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xzsf02u x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/pengembanganchatbot?__eep__=6&amp;__cft__[0]=AZYz2oYrLeujvDNSvKYn5oKFoHgUqsTA7UsP3-ELjT2yTA0T2XmliW_GdWVbPXe-XoY8LVR_xSWA1Ce9ry6vtgq1POhLbV1yAOnjgxhT4Wx98K_IhyoGpgAyyFq_ktBjVwgF3SML9eVnxJ87QoqaD4o2BVPNKZ7RAgDC4C-yByUKDdUgxDLNqFnkLMT5P2frdaY&amp;__tn__=*NK*F\">#PengembanganChatbot</a></span> <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xzsf02u x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/ai?__eep__=6&amp;__cft__[0]=AZYz2oYrLeujvDNSvKYn5oKFoHgUqsTA7UsP3-ELjT2yTA0T2XmliW_GdWVbPXe-XoY8LVR_xSWA1Ce9ry6vtgq1POhLbV1yAOnjgxhT4Wx98K_IhyoGpgAyyFq_ktBjVwgF3SML9eVnxJ87QoqaD4o2BVPNKZ7RAgDC4C-yByUKDdUgxDLNqFnkLMT5P2frdaY&amp;__tn__=*NK*F\">#AI</a></span> <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xzsf02u x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/innovation?__eep__=6&amp;__cft__[0]=AZYz2oYrLeujvDNSvKYn5oKFoHgUqsTA7UsP3-ELjT2yTA0T2XmliW_GdWVbPXe-XoY8LVR_xSWA1Ce9ry6vtgq1POhLbV1yAOnjgxhT4Wx98K_IhyoGpgAyyFq_ktBjVwgF3SML9eVnxJ87QoqaD4o2BVPNKZ7RAgDC4C-yByUKDdUgxDLNqFnkLMT5P2frdaY&amp;__tn__=*NK*F\">#Innovation</a></span> <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xzsf02u x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/belajarai?__eep__=6&amp;__cft__[0]=AZYz2oYrLeujvDNSvKYn5oKFoHgUqsTA7UsP3-ELjT2yTA0T2XmliW_GdWVbPXe-XoY8LVR_xSWA1Ce9ry6vtgq1POhLbV1yAOnjgxhT4Wx98K_IhyoGpgAyyFq_ktBjVwgF3SML9eVnxJ87QoqaD4o2BVPNKZ7RAgDC4C-yByUKDdUgxDLNqFnkLMT5P2frdaY&amp;__tn__=*NK*F\">#BelajarAI</a></span>', 'published', '2025-02-05 10:31:55', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(8, 10, 1, 'Online Training of Trainer Coding for Kids', 'online-training-of-trainer-coding-for-kids-6a858c1f70938', '/images/485185738_958093913203613_4067422706425259653_n.jpg', 'Hallo Bapak Ibu Guru dan orang tua di seluruh Indonesia, ingin menjadi pelatih bagi murid-murid atau anak sendiri agar memiliki kemampuan coding?...', 'Hallo Bapak Ibu Guru dan orang tua di seluruh Indonesia, ingin menjadi pelatih bagi murid-murid atau anak sendiri agar memiliki kemampuan coding?<br class=\"html-br\" /><br class=\"html-br\" />Pelatihan ini mengenalkan dasar _coding_ yang mudah dipelajari oleh anak-anak sehingga mereka mampu untuk membuat karya digital berupa *_story, animasi, hingga game._*. Sangat bermanfaat bagi orang tua atau guru _Pembina Ekstrakurikuler TIK/ Digital_.<br class=\"html-br\" /><br class=\"html-br\" />**Ikatan Guru Indonesia Kabupaten Ogan Ilir** bekerja sama dengan **Beranda Teknologi Digital** mengadakan :<br class=\"html-br\" /><br class=\"html-br\" />_Training of Trainer_<br class=\"html-br\" />*_Coding for Kids 2023_*<br class=\"html-br\" /><br class=\"html-br\" />*Apa yang akan di pelajari pada materi ini ?*<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t7a/1/16/31_20e3.png\" alt=\"1️⃣\" width=\"16\" height=\"16\" /></span> Apa itu _Coding_<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t99/1/16/32_20e3.png\" alt=\"2️⃣\" width=\"16\" height=\"16\" /></span> _Coding_ untuk Tenaga Pengajar<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb8/1/16/33_20e3.png\" alt=\"3️⃣\" width=\"16\" height=\"16\" /></span> Praktik Penggunaan Program _Coding for Kids_<br class=\"html-br\" /><br class=\"html-br\" />*Siapa Pemateri dalam Kegiatan ini ?*<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8a/1/16/1f9d1_1f3fb_200d_1f3eb.png\" alt=\"🧑🏻‍🏫\" width=\"16\" height=\"16\" /></span> *Septa Ryan Hidayat*<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t40/1/16/25b6.png\" alt=\"▶️\" width=\"16\" height=\"16\" /></span> _Project Manager CV Beranda Teknologi Digital_<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t40/1/16/25b6.png\" alt=\"▶️\" width=\"16\" height=\"16\" /></span> _Software Engineer_<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t40/1/16/25b6.png\" alt=\"▶️\" width=\"16\" height=\"16\" /></span> _Dewan Pakar IGI Ogan Ilir_<br class=\"html-br\" /><br class=\"html-br\" />*Kapan Pelaksanaan?*<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tff/1/16/1f4c6.png\" alt=\"📆\" width=\"16\" height=\"16\" /></span> Sabtu - Selasa, 28-31 Oktober 2023<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tcd/1/16/1f6dc.png\" alt=\"🛜\" width=\"16\" height=\"16\" /></span> Grup Telegram<br class=\"html-br\" /><br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t3e/1/16/1f50a.png\" alt=\"🔊\" width=\"16\" height=\"16\" /></span> _*Kelas terbuka untuk Guru dan Umum* Training for Trainer *Coding For Kids*_<br class=\"html-br\" /><br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t40/1/16/25b6.png\" alt=\"▶️\" width=\"16\" height=\"16\" /></span> Investasi hanya *35k* untuk anggota IGI dan *50k* untuk non anggota IGI.<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t40/1/16/25b6.png\" alt=\"▶️\" width=\"16\" height=\"16\" /></span> Fasilitas _Sertifikat, Modul Pembelajaran, etc_<br class=\"html-br\" /><br class=\"html-br\" />Ayo *_Booking Seat_* dari Sekarang juga<br class=\"html-br\" />*Kuota Terbatas !!!*<br class=\"html-br\" /><br class=\"html-br\" />_Pendaftaran_, hubungi <span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t20/1/16/2b07.png\" alt=\"⬇️\" width=\"16\" height=\"16\" /></span><br class=\"html-br\" />*Pusat Informasi:*<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t40/1/16/25b6.png\" alt=\"▶️\" width=\"16\" height=\"16\" /></span> <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"http://s.id/Coding4KidsIGI?fbclid=IwZXh0bgNhZW0CMTAAYnJpZBExUGk3TW9BS1Zwd1paNVROZ3NydGMGYXBwX2lkEDIyMjAzOTE3ODgyMDA4OTIAAR55FaTnf5wRhVcvZ8jYSE3pe4VZHkTKmp2dS1-dKhG6YP05BBjpl-BHuN8Kdg_aem_5QJay6VpgTN7ZiA7iq985A\" target=\"_blank\" rel=\"nofollow noopener noreferrer\">s.id/Coding4KidsIGI</a></span><br class=\"html-br\" /><br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t40/1/16/25b6.png\" alt=\"▶️\" width=\"16\" height=\"16\" /></span> Email :<br class=\"html-br\" />info@berandadigital.net<br class=\"html-br\" /><br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t40/1/16/25b6.png\" alt=\"▶️\" width=\"16\" height=\"16\" /></span> Website :<br class=\"html-br\" /><span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"http://www.berandadigital.net/?fbclid=IwZXh0bgNhZW0CMTAAYnJpZBExUGk3TW9BS1Zwd1paNVROZ3NydGMGYXBwX2lkEDIyMjAzOTE3ODgyMDA4OTIAAR7DN3IGTtLxqmNeck2LPvjywWfXkVs32OTkzZpCGEwQ7JPQZwEp3k5JklsSJA_aem_nhkESo_24GSHSqOFNbIUlg\" target=\"_blank\" rel=\"nofollow noopener noreferrer\">www.berandadigital.net</a></span><br class=\"html-br\" /><span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"http://www.igi-oi.com/?fbclid=IwZXh0bgNhZW0CMTAAYnJpZBExUGk3TW9BS1Zwd1paNVROZ3NydGMGYXBwX2lkEDIyMjAzOTE3ODgyMDA4OTIAAR7r63VKkcRG8LAJ6zeArvU3_Oobabe0hbQXv2WpM_iRUBpeyD_5axjZHjmnRQ_aem_jDgOSiC9rMOywP3xS2_toA\" target=\"_blank\" rel=\"nofollow noopener noreferrer\">www.igi-oi.com</a></span>', 'published', '2023-10-26 10:33:59', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(9, 8, 1, 'Optimalisasi Peran Guru, Tenaga Kependidikan, dan Tim Kreatif, melalui pemanfaatan AI dan Coding SIT Robbani Ogan Ilir', 'optimalisasi-peran-guru-tenaga-kependidikan-dan-tim-kreatif-melalui-pemanfaatan-ai-dan-coding-sit-robbani-ogan-ilir-6a858c1f71569', '/images/561378805_1119891467023856_3474954454940095689_n.jpg', '\n\n\n\n\n\n\n...', '<div>\n<div>\n<div class=\"x1yztbdb x1n2onr6 xh8yej3 x1ja2u2z\">\n<div class=\"x1n2onr6 x1ja2u2z\">\n<div>\n<div>\n<div class=\"x1a2a7pz\" aria-posinset=\"8\">\n<div class=\"x78zum5 xdt5ytf\" data-virtualized=\"false\">\n<div class=\"x9f619 x1n2onr6 x1ja2u2z\">\n<div class=\"html-div xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x78zum5 x1n2onr6 xh8yej3\">\n<div class=\"x1n2onr6 x1ja2u2z x1jx94hy xw5cjc7 x1dmpuos x1vsv7so xau1kf4 x9f619 xh8yej3 x6ikm8r x10wlt62 xquyuld\">\n<div>\n<div class=\"html-div xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl\">\n<div class=\"html-div xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl\">\n<div class=\"html-div xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl\">\n<div class=\"html-div xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl\">\n<div class=\"html-div xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl\" dir=\"auto\">\n<div class=\"html-div xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl\" data-ad-rendering-role=\"story_message\">\n<div class=\"x1l90r2v x1iorvi4 x1g0dm76 xpdmqnj\" data-ad-comet-preview=\"message\" data-ad-preview=\"message\">\n<div class=\"x78zum5 xdt5ytf xz62fqu x16ldp7u\">\n<div class=\"xu06os2 x1ok221b\">\n<div class=\"html-div xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl\">\n<div class=\"xdj266r x14z9mp xat24cr x1lziwak x1vvkbs x126k92a\">\n<div dir=\"auto\">Saatnya Upgrade Skill, Belajar Bareng, berkembang bareng!</div>\n</div>\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\n<div dir=\"auto\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t69/1/16/1f331.png\" alt=\"🌱\" width=\"16\" height=\"16\" /></span> PELATIHAN CODING DAN AI</div>\n<div dir=\"auto\">Optimalisasi Peran Guru, Tenaga Kependidikan, dan Tim Kreatif, melalui pemanfaatan AI dan Coding</div>\n</div>\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\n<div dir=\"auto\">SIT Robbani Ogan Ilir Bersama Beranda Teknologi Digital ngajak kamu untuk belajar cara cerdas dengan bantuan teknologi dan pastinya ini bermanfaat banget untuk mendukung profesimu</div>\n</div>\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\n<div dir=\"auto\">Bersama :</div>\n<div dir=\"auto\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ta/1/16/1f464.png\" alt=\"👤\" width=\"16\" height=\"16\" /></span>Septa Ryan Hidayat (Direktur Utama CV. Beranda Teknologi Digital, Kepala Bidang IT Yayasan Generasi Robbani)</div>\n</div>\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\n<div dir=\"auto\">Insya Allah akan dilaksanakan pada:</div>\n<div dir=\"auto\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5c/1/16/1f5d3.png\" alt=\"🗓\" width=\"16\" height=\"16\" /></span> Hari, tanggal : Sabtu, 18 Oktober 2025</div>\n<div dir=\"auto\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb0/1/16/1f558.png\" alt=\"🕘\" width=\"16\" height=\"16\" /></span> Waktu : 07.30 - 12.00 WIB</div>\n<div dir=\"auto\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t28/1/16/1f3eb.png\" alt=\"🏫\" width=\"16\" height=\"16\" /></span> Tempat : Aula SDIT Robbani</div>\n</div>\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\n<div dir=\"auto\">Note:</div>\n<div dir=\"auto\">- Membawa Laptop/Tablet + Charger masing-masing</div>\n<div dir=\"auto\">- membawa terminal jika diperlukan</div>\n</div>\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\n<div dir=\"auto\"><span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/coding?__eep__=6&amp;__cft__[0]=AZaF0c5RUSN6F1TdESPZB9h5Pe0zZ6mvbpwlJnAlTeJrROnfaVFP9R-ZUPoSYYJzjKgm_pdBUcpXmRyhL7--F0s2tlo9rIjoF4Ow1HZ-Qm0VX6H1cL6nKNg8Ktbwghebohs3FvYIBdXfAf_ta47HaYByOeGKEhdqrEs7akiI7DsAq3GRukLLqFFZ-ZlWjrHBMUc&amp;__tn__=*NK-R\">#Coding</a></span>&amp;AI <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/sitrobbani?__eep__=6&amp;__cft__[0]=AZaF0c5RUSN6F1TdESPZB9h5Pe0zZ6mvbpwlJnAlTeJrROnfaVFP9R-ZUPoSYYJzjKgm_pdBUcpXmRyhL7--F0s2tlo9rIjoF4Ow1HZ-Qm0VX6H1cL6nKNg8Ktbwghebohs3FvYIBdXfAf_ta47HaYByOeGKEhdqrEs7akiI7DsAq3GRukLLqFFZ-ZlWjrHBMUc&amp;__tn__=*NK-R\">#SITRobbani</a></span> <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/berandateknologidigital?__eep__=6&amp;__cft__[0]=AZaF0c5RUSN6F1TdESPZB9h5Pe0zZ6mvbpwlJnAlTeJrROnfaVFP9R-ZUPoSYYJzjKgm_pdBUcpXmRyhL7--F0s2tlo9rIjoF4Ow1HZ-Qm0VX6H1cL6nKNg8Ktbwghebohs3FvYIBdXfAf_ta47HaYByOeGKEhdqrEs7akiI7DsAq3GRukLLqFFZ-ZlWjrHBMUc&amp;__tn__=*NK-R\">#berandateknologidigital</a></span> <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/sekolahdigital?__eep__=6&amp;__cft__[0]=AZaF0c5RUSN6F1TdESPZB9h5Pe0zZ6mvbpwlJnAlTeJrROnfaVFP9R-ZUPoSYYJzjKgm_pdBUcpXmRyhL7--F0s2tlo9rIjoF4Ow1HZ-Qm0VX6H1cL6nKNg8Ktbwghebohs3FvYIBdXfAf_ta47HaYByOeGKEhdqrEs7akiI7DsAq3GRukLLqFFZ-ZlWjrHBMUc&amp;__tn__=*NK-R\">#SekolahDigital</a></span></div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>', 'published', '2025-10-10 10:20:08', '2026-08-19 10:57:35', '2026-08-19 10:57:35');
INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `thumbnail`, `excerpt`, `body`, `status`, `published_at`, `created_at`, `updated_at`) VALUES
(10, 10, 1, 'Inovasi Pembelajaran berbasis Koding dan AI dalam kerangka penguatan kelembagaan sekolah untuk tenaga pendidik di satuan SD dan SMP di Kab. OKU Timur', 'inovasi-pembelajaran-berbasis-koding-dan-ai-dalam-kerangka-penguatan-kelembagaan-sekolah-untuk-tenaga-pendidik-di-satuan-sd-dan-smp-di-kab-oku-timur-6a858c1f721d7', '/images/545410148_1090108853335451_8582489098678183559_n.jpg', 'Dinas Pendidikan OKU Timur dan Beranda Teknologi Digital bekerjasama Mengadakan Pelatihan Coding &amp; AIPelatihan ini memiliki tema yai...', 'Dinas Pendidikan OKU Timur dan Beranda Teknologi Digital bekerjasama Mengadakan Pelatihan Coding &amp; AI<br class=\"html-br\" /><br class=\"html-br\" />Pelatihan ini memiliki tema yaitu Inovasi Pembelajaran berbasis Koding dan AI dalam kerangka penguatan kelembagaan sekolah untuk tenaga pendidik di satuan SD dan SMP di Kab. OKU Timur.<br class=\"html-br\" /><br class=\"html-br\" />Dengan Narasumber:<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ta/1/16/1f464.png\" alt=\"👤\" width=\"16\" height=\"16\" /></span>Septa Ryan Hidayat (Direktur Utama CV. Beranda Teknologi Digital)<br class=\"html-br\" /><br class=\"html-br\" />Insya Allah akan dilaksanakan pada:<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t5c/1/16/1f5d3.png\" alt=\"🗓️\" width=\"16\" height=\"16\" /></span> Hari, tanggal : Kamis, 11 September 2025<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb0/1/16/1f558.png\" alt=\"🕘\" width=\"16\" height=\"16\" /></span> Waktu : 09.00 - 16.00 WIB<br class=\"html-br\" /><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t28/1/16/1f3eb.png\" alt=\"🏫\" width=\"16\" height=\"16\" /></span> Tempat : Hotel Majestic Palembang<br class=\"html-br\" /><br class=\"html-br\" />Belajar Coding?<br class=\"html-br\" />Asyik dan Menyenangkan<br class=\"html-br\" /><br class=\"html-br\" /><span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xzsf02u x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/coding?__eep__=6&amp;__tn__=*NK*F\">#Coding</a></span>&amp;AI<br class=\"html-br\" /><span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xzsf02u x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/berandateknologidigital?__eep__=6&amp;__tn__=*NK*F\">#berandateknologidigital</a></span>', 'published', '2025-09-07 10:24:37', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(11, 8, 1, 'Memasuki Era Baru: The Era of Vibe Coding!', 'memasuki-era-baru-the-era-of-vibe-coding-6a858c1f72e0e', '/images/631476506_1210308331315502_7735877304621369529_n.jpg', '\nTeknologi AI kini bukan lagi sekadar wacana, melainkan alat nyata unt...', '<div class=\"xdj266r x14z9mp xat24cr x1lziwak x1vvkbs x126k92a\">\n<div dir=\"auto\"><span style=\"font-size: 16px;\">Teknologi AI kini bukan lagi sekadar wacana, melainkan alat nyata untuk menciptakan solusi digital tanpa harus mahir menulis baris kode.</span></div>\n</div>\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\n<div dir=\"auto\"></div>\n<div dir=\"auto\">Kami dari CV. Beranda Teknologi Digital merasa terhormat mendapatkan kesempatan untuk berbagi ilmu di Politeknik Akamigas Palembang.</div>\n</div>\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\n<div dir=\"auto\"></div>\n<div dir=\"auto\">Direktur Utama kami, Septa Ryan Hidayat, akan mengupas tuntas bagaimana pemanfaatan AI dapat mengakselerasi pengembangan aplikasi pembelajaran dan manajemen informasi secara efisien.</div>\n</div>\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\n<div dir=\"auto\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t2d/1/16/1f4cd.png\" alt=\"📍\" width=\"16\" height=\"16\" /></span> Lokasi: Politeknik Akamigas Palembang</div>\n<div dir=\"auto\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t7e/1/16/1f4c5.png\" alt=\"📅\" width=\"16\" height=\"16\" /></span> Waktu: Rabu, 11 Februari 2026</div>\n<div dir=\"auto\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t2f/1/16/1f557.png\" alt=\"🕗\" width=\"16\" height=\"16\" /></span> Jam: 08.30 WIB - Selesai</div>\n</div>\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\n<div dir=\"auto\">Mari kita eksplorasi bersama bagaimana AI memudahkan pekerjaan kita di masa depan.</div>\n</div>\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\n<div dir=\"auto\"><span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/berandateknologidigital?__eep__=6&amp;__cft__[0]=AZY4ERumgpjI0wSZ3BWW4UT56-iZUr6cczqgke3-A1T5Lu3_qxTTs_jQxGKBSIvxeCHpIGeiI8NlL_VS_Go5pUtgYntX4QMFLgYKHRnLScwf_tnl71hGASJW3J7kTYzoo-YhD8lqC8iQ4sEq7cMMnjGJEidbrl38-lMT5Fe7MOedSorre4gwdbVv_zhPpyGkSqc&amp;__tn__=*NK-R\">#BerandaTeknologiDigital</a></span> <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/digitaltransformation?__eep__=6&amp;__cft__[0]=AZY4ERumgpjI0wSZ3BWW4UT56-iZUr6cczqgke3-A1T5Lu3_qxTTs_jQxGKBSIvxeCHpIGeiI8NlL_VS_Go5pUtgYntX4QMFLgYKHRnLScwf_tnl71hGASJW3J7kTYzoo-YhD8lqC8iQ4sEq7cMMnjGJEidbrl38-lMT5Fe7MOedSorre4gwdbVv_zhPpyGkSqc&amp;__tn__=*NK-R\">#DigitalTransformation</a></span> <span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/politeknikakamigaspalembang?__eep__=6&amp;__cft__[0]=AZY4ERumgpjI0wSZ3BWW4UT56-iZUr6cczqgke3-A1T5Lu3_qxTTs_jQxGKBSIvxeCHpIGeiI8NlL_VS_Go5pUtgYntX4QMFLgYKHRnLScwf_tnl71hGASJW3J7kTYzoo-YhD8lqC8iQ4sEq7cMMnjGJEidbrl38-lMT5Fe7MOedSorre4gwdbVv_zhPpyGkSqc&amp;__tn__=*NK-R\">#PoliteknikAkamigasPalembang</a></span></div>\n</div>', 'published', '2026-02-09 10:39:15', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(12, 10, 1, 'Lecturer Development Program 2026', 'lecturer-development-program-2026-6a858c1f73ab0', '/images/626271180_17940187239113665_1282635413631214268_n.jpg', '\nPelatihan Pemanfaatan Artificial Intelligence (AI) untuk pembuatan aplikasi yang praktis dan profesi...', '<div class=\"xdj266r x14z9mp xat24cr x1lziwak x1vvkbs x126k92a\">\n<div dir=\"auto\">Pelatihan Pemanfaatan Artificial Intelligence (AI) untuk pembuatan aplikasi yang praktis dan profesional tanpa coding, khusus bagi Dosen Politeknik Akamigas Palembang.</div>\n</div>\n<div class=\"x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a\">\n<div dir=\"auto\">Mendorong inovasi pembelajaran, meningkatkan kompetensi digital, dan menjawab tantangan pendidikan di era transformasi teknologi.</div>\n<div dir=\"auto\">.</div>\n<div dir=\"auto\"><span class=\"html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od\"><img class=\"xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tc6/1/16/1f680.png\" alt=\"🚀\" width=\"16\" height=\"16\" /></span> Upgrade skill dosen, wujudkan pembelajaran masa depan</div>\n<div dir=\"auto\">.</div>\n<div dir=\"auto\"><span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/ldp?__eep__=6&amp;__cft__[0]=AZYocO_fHVbADi5fj3DjttY1dyLQXU8W0Y2mHvJ-qn-_jPT6HYJEAiIM0pevFQkpWeFfobAuJdMokJ2W019jgGZUpl0BftucAEzZgcwxRIJRgt2iiVBENy1PDfSmXRS526D37DuSRSQg_YMmPNh0eN6SE7i8qaI2c1RFZOXSFceG4lt4BvIrUxwCOSHtV_rp49k&amp;__tn__=*NK-R\">#ldp</a></span></div>\n<div dir=\"auto\"><span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/akamigaspalembang?__eep__=6&amp;__cft__[0]=AZYocO_fHVbADi5fj3DjttY1dyLQXU8W0Y2mHvJ-qn-_jPT6HYJEAiIM0pevFQkpWeFfobAuJdMokJ2W019jgGZUpl0BftucAEzZgcwxRIJRgt2iiVBENy1PDfSmXRS526D37DuSRSQg_YMmPNh0eN6SE7i8qaI2c1RFZOXSFceG4lt4BvIrUxwCOSHtV_rp49k&amp;__tn__=*NK-R\">#akamigaspalembang</a></span></div>\n<div dir=\"auto\"><span class=\"html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs\"><a class=\"x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f\" tabindex=\"0\" role=\"link\" href=\"https://www.facebook.com/hashtag/ai?__eep__=6&amp;__cft__[0]=AZYocO_fHVbADi5fj3DjttY1dyLQXU8W0Y2mHvJ-qn-_jPT6HYJEAiIM0pevFQkpWeFfobAuJdMokJ2W019jgGZUpl0BftucAEzZgcwxRIJRgt2iiVBENy1PDfSmXRS526D37DuSRSQg_YMmPNh0eN6SE7i8qaI2c1RFZOXSFceG4lt4BvIrUxwCOSHtV_rp49k&amp;__tn__=*NK-R\">#ai</a></span></div>\n</div>', 'published', '2026-02-07 10:59:23', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(13, 8, 1, 'Insight Talks Bersama Kementerian Komdigi dan Media Indonesia Vol. 3 Palembang', 'insight-talks-vol-3-palembang-6a858c1f74682', '/images/Insight-Talks-Komdigi.jpeg', 'Halo Sobat Komdigi! 👋\nSetelah sukses di Aceh dan NTB, rangkaian Insight Talks kini hadir di Kota Palembang! Bersama Kementerian Komunikasi dan Digital RI (Komdigi) dan Media Indone...', 'Halo Sobat Komdigi! 👋\nSetelah sukses di Aceh dan NTB, rangkaian Insight Talks kini hadir di Kota Palembang! Bersama Kementerian Komunikasi dan Digital RI (Komdigi) dan Media Indonesia, kita akan mengupas tuntas tantangan dan peluang di era teknologi saat ini.\n\nDengan tema \"Literasi Media: Cerdas di Era Kecerdasan Artifisial\", acara ini bertujuan untuk memperkuat kemampuan literasi digital masyarakat dalam mendeteksi disinformasi serta memanfaatkan AI secara bijak.\n\n📌 Detail Acara:\n🗓 Hari/Tanggal: Selasa, 14 April 2026\n📍 Lokasi: Hotel Harper Palembang\n\n🎤 Keynote Speech :\n* Farida Dewi Maharani (Plt. Direktur Ekosistem Media Komdigi)\n\n👥 Narasumber &amp; Workshop :\n* Rosarita Niken Widiastuti (Ketua Komisi Kemitraan, Hubungan Antar Lembaga, &amp; Infrastruktur Dewan Pers)\n* Abdul Kohar (Direktur Pemberitaan Media Indonesia)\n* Septa Ryan Hidayat (CEO Beranda Teknologi Digital, Pemerhati AI)\n\n🎁 Benefit : E-Certificate, Makan Siang, &amp; Doorprise Menarik!\n\nMari kita bangun ketahanan informasi nasional dengan menjadi pengguna teknologi yang cerdas dan kritis. Sampai jumpa di Palembang!\n\n#Komdigi #MediaIndonesia #InsightTalks #LiterasiDigital #ArtificialIntelligence #PalembangEvent #CerdasBer-AI', 'published', '2026-04-13 09:00:12', '2026-08-19 10:57:35', '2026-08-19 10:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `summary` text DEFAULT NULL,
  `challenge` text DEFAULT NULL,
  `solution` text DEFAULT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `app_type` varchar(50) NOT NULL DEFAULT 'web',
  `status_badge` varchar(100) DEFAULT NULL,
  `tech_stack` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tech_stack`)),
  `client_name` varchar(255) DEFAULT NULL,
  `project_url` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `gallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gallery`)),
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `category_id`, `title`, `slug`, `summary`, `challenge`, `solution`, `features`, `app_type`, `status_badge`, `tech_stack`, `client_name`, `project_url`, `thumbnail`, `gallery`, `is_featured`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Website Enterprise & Portal Company Profile', 'portal-layanan-pembuatan-website-enterprise', 'Solusi website korporat berkecepatan tinggi dengan desain modern bento grid, CMS fleksibel, dan optimasi SEO Google standar industri.', 'Kebutuhan website bisnis modern dengan desain cepat, optimasi kecepatan, dan keamanan data.', 'Arsitektur website Laravel 13 & PHP 8.4 terhubung dengan CMS admin instan dan integrasi WhatsApp.', NULL, 'web', NULL, '[\"Laravel 13\",\"PHP 8.4\",\"MySQL\",\"Tailwind CSS\",\"Alpine.js\"]', 'CV. Beranda Teknologi Digital', 'https://berandadigital.net', '/images/products/enterprise-web-mockup.jpg', '[\"\\/preview\\/screencapture-berandadigital-net-2026-08-19-17_31_05.png\"]', 1, 1, '2026-08-19 10:57:35', '2026-08-30 11:56:44'),
(2, 2, 'Portal Sekolah, E-Learning & PPDB Online Terpadu', 'jasa-pembuatan-aplikasi-mobile-android-ios', 'Sistem informasi akademik all-in-one untuk registrasi siswa baru (PPDB Online), pengumuman kelulusan, dan raport digital terintegrasi WhatsApp.', 'Pengembangan aplikasi mobile dua platform (Android & iOS) sering memakan waktu dan biaya tinggi.', 'Solusi Flutter tunggal terhubung ke backend Laravel dengan fitur offline-first dan geolokalasi.', NULL, 'web', NULL, '[\"Flutter\",\"RESTful API\",\"Laravel\",\"Firebase FCM\"]', 'Lembaga Pendidikan & Sekolah Mitra', 'https://berandadigital.net', '/images/products/school-portal-mockup.jpg', '[\"\\/preview\\/screencapture-berandadigital-net-layanan-2026-08-19-17_52_22.png\"]', 1, 2, '2026-08-19 10:57:35', '2026-08-30 11:56:44'),
(3, 4, 'Sistem Informasi Desa Digital (Smart Village)', 'sistem-informasi-administrasi-surating-desa-digital', 'Platform digitalisasi desa untuk cetak mandiri 30+ surat resmi desa, otentikasi tanda tangan QR Code, dan database kependudukan terpadu.', 'Pelayanan pengurusan surat administrasi desa membutuhkan waktu lama karena pencatatan arsip fisik yang manual.', 'Beranda Teknologi Digital membangun portal web desa responsif terhubung dengan generator surat otomatis berbasis QR Code verifikasi.', NULL, 'web', NULL, '[\"Laravel 13\",\"PHP 8.4\",\"MySQL\",\"Tailwind CSS\"]', 'Pemerintah Desa Senuro Timur, Ogan Ilir', 'https://berandadigital.net', '/images/products/smart-village-mockup.jpg', '[\"\\/images\\/surat.png\",\"\\/images\\/ss-asalam.png\"]', 1, 3, '2026-08-19 10:57:35', '2026-08-30 11:56:44'),
(4, 1, 'Jasa Pembuatan Website & Campaign Digital Publik / Leader', 'jasa-pembuatan-website-campaign-digital', 'Platform portal informasi, video profil, dan campaign digital publik dengan sistem interaktif.', 'Membangun branding publik yang transparan dan cepat diakses oleh seluruh lapisan masyarakat.', 'Portal web responsif dengan integrasi galeri video, jadwal kegiatan, dan form aspirasi.', NULL, 'web', NULL, '[\"Laravel\",\"Tailwind CSS\",\"MySQL\"]', 'Public Leader & Agency Partner', 'https://berandadigital.net', '/preview/screencapture-berandadigital-net-jasa-website-caleg-2026-08-19-17_54_34.png', NULL, 0, 4, '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(5, 4, 'Website SMAIT Ishlahul Ummah Prabumulih', 'website-smait-ishlahul-ummah-prabumulih', 'Website profil institusi pendidikan Islam terpadu dengan portal berita sekolah, data guru berprestasi, dan agenda kegiatan terpadu.', 'Kebutuhan media informasi resmi sekolah yang kredibel untuk publikasi prestasi dan pengumuman bagi orang tua siswa.', 'Beranda Digital merancang website responsif dan cepat dengan dashboard publikasi berita dan integrasi media sosial sekolah.', '[\"Profil sekolah lengkap & struktur tenaga pengajar\",\"Portal publikasi berita, artikel, dan galeri kegiatan\",\"Desain modern, mobile-friendly, dan teroptimasi SEO\"]', 'web', '🟢 Terimplementasi', '[\"WordPress \\/ Laravel\",\"PHP\",\"Tailwind CSS\",\"MySQL\"]', 'SMAIT Ishlahul Ummah Prabumulih', 'https://smaitishumpbm.sch.id', '/uploads/projects/1788232356_01WDK7Ti.webp', '[{\"url\":\"\\/uploads\\/projects\\/1788232355_V5LsQpKT.webp\",\"title\":\"Screenshot 2026-09-01 101147\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788232355_fXZ65HqH.webp\",\"title\":\"Screenshot 2026-09-01 101133\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788232355_rxSnA2Dq.webp\",\"title\":\"Screenshot 2026-09-01 101106\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788232356_ZmwaQxcN.webp\",\"title\":\"Screenshot 2026-09-01 101050\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788232356_PreElVsP.webp\",\"title\":\"Screenshot 2026-09-01 101030\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788232356_2BrFaBZD.webp\",\"title\":\"Screenshot 2026-09-01 101012\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788232356_vWVf1YrY.webp\",\"title\":\"Screenshot 2026-09-01 100954\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788232356_8YKKZswN.webp\",\"title\":\"Screenshot 2026-09-01 100930\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"}]', 0, 0, '2026-08-30 12:10:32', '2026-09-01 03:13:58'),
(6, 11, 'Lembaga Sosial Dompet Sosial Robbani Peduli (DSRP)', 'website-dompet-sosial-robbani-peduli', 'Portal filantropi dan lembaga amil zakat untuk penyaluran bantuan, donasi online, dan laporan transparansi program sosial.', 'Memfasilitasi donatur untuk menyalurkan infaq, shadaqah, dan zakat secara digital dengan transparansi rekap dana.', 'Pengembangan portal donasi terintegrasi dengan penghitungan kalkulator zakat dan laporan audit bantuan.', '[\"Kalkulator zakat & kanal donasi program kemanusiaan\",\"Laporan real-time perolehan dana & transparansi penyaluran\",\"Integrasi notifikasi konfirmasi donasi via WhatsApp\"]', 'web', '🟢 Terimplementasi', '[\"Laravel\",\"PHP\",\"MySQL\",\"Tailwind CSS\"]', 'Dompet Sosial Robbani Peduli (DSRP)', 'https://dsrp.or.id', '/uploads/projects/1788233617_XoRcruMU.webp', '[{\"url\":\"\\/uploads\\/projects\\/1788233617_0CqXRNSt.webp\",\"title\":\"Screenshot 2026-09-01 103143\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788233617_1me9Cc9m.webp\",\"title\":\"Screenshot 2026-09-01 103111\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788233617_Uju2ueZh.webp\",\"title\":\"Screenshot 2026-09-01 103100\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788233617_1jz4QRZR.webp\",\"title\":\"Screenshot 2026-09-01 103043\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788233617_QhrOa9qO.webp\",\"title\":\"Screenshot 2026-09-01 103014\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788233617_gfPyGSEl.webp\",\"title\":\"Screenshot 2026-09-01 103001\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"}]', 0, 0, '2026-08-30 12:10:32', '2026-09-01 03:34:59'),
(7, 11, 'Toko Online robbanimart.com', 'website-toko-online-robbanimart', 'Platform toko online e-commerce minimarket syariah untuk penyediaan produk halal, kebutuhan harian, dan sembako terjangkau.', 'Digitalisasi katalog penjualan toko fisik agar anggota koperasi dan masyarakat dapat berbelanja secara daring.', 'Website e-commerce katalog produk dengan sistem keranjang belanja praktis dan konfirmasi pesanan via WhatsApp.', '[\"Katalog produk halal terorganisir per kategori\",\"Sistem keranjang belanja & hitung ongkos kirim instan\",\"Checkout cepat terhubung langsung ke kasir WhatsApp\"]', 'web', '🟢 Terimplementasi', '[\"Laravel\",\"MySQL\",\"Tailwind CSS\",\"WhatsApp API\"]', 'KPSR Robbani', 'https://robbanimart.com', '/uploads/projects/1788233849_iOaPaVJD.webp', '[{\"url\":\"\\/uploads\\/projects\\/1788233849_2h99vYIg.webp\",\"title\":\"Screenshot 2026-09-01 103618\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788233849_R9LBm6P1.webp\",\"title\":\"Screenshot 2026-09-01 103600\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"}]', 0, 0, '2026-08-30 12:10:32', '2026-09-01 03:40:33'),
(8, 11, 'Website PPDB SIT As Salaam Jayapura Papua', 'website-ppdb-sit-as-salaam-jayapura-papua', 'Sistem portal pendaftaran peserta didik baru (PPDB Online) multi-jenjang dari PAUD IT, SD IT, hingga SMP IT As Salaam Boarding School di Jayapura, Papua.', 'Pendaftaran calon siswa baru dari berbagai distrik di Papua membutuhkan sistem online yang mudah diakses tanpa kendala jaringan.', 'Aplikasi web PPDB mandiri dengan alur bertahap, upload berkas persyaratan, dan cetak bukti registrasi PDF otomatis.', '[\"Multi-jenjang: PAUD IT, SD IT, dan SMP IT Boarding School\",\"Pendaftaran gelombang online dengan verifikasi administrasi\",\"Cetak nomor ujian dan kartu pendaftaran resmi ber-barcode\"]', 'web', '🟢 Terimplementasi', '[\"Laravel\",\"PHP\",\"MySQL\",\"PDF Engine\"]', 'Yayasan As-Salam Papua (Jayapura)', 'https://ppdb.sit-assalaamjayapura.sch.id/', '/uploads/projects/1788233986_PMwz4EBr.webp', '[{\"url\":\"\\/uploads\\/projects\\/1788233985_8iG8KUjV.webp\",\"title\":\"Screenshot 2026-09-01 103905\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788233985_mhjwxmfU.webp\",\"title\":\"Screenshot 2026-09-01 103845\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788233985_0AHT1GQD.webp\",\"title\":\"Screenshot 2026-09-01 103832\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788233986_OclqZbcu.webp\",\"title\":\"Screenshot 2026-09-01 103817\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"}]', 0, 0, '2026-08-30 12:10:32', '2026-09-01 03:39:46'),
(9, 11, 'Website Kampus Sehat Universitas Sriwijaya', 'website-kampus-sehat-universitas-sriwijaya', 'Portal program edukasi kesehatan kampus dan inisiatif Germas bagi sivitas akademika Universitas Sriwijaya.', 'Sosialisasi program kesehatan, perilaku hidup sehat, dan publikasi agenda rektorat bidang kesehatan mahasiswa.', 'Website portal resmi Kampus Sehat Unsri dengan sambutan rektorat, artikel gizi/kesehatan, dan info layanan klinik.', '[\"Sambutan pimpinan rektorat & panduan gaya hidup sehat\",\"Koleksi artikel kesehatan, video edukasi, dan webinar\",\"Direktori layanan fasilitas kesehatan kampus Unsri\"]', 'web', '🟢 Terimplementasi', '[\"Laravel\",\"MySQL\",\"Tailwind CSS\"]', 'Universitas Sriwijaya (Unsri)', 'https://berandadigital.net', '/uploads/projects/1788234333_S5hHH4sS.webp', '[{\"url\":\"\\/uploads\\/projects\\/1788234332_v9W02GC4.webp\",\"title\":\"Screenshot 2026-09-01 104435\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788234332_CSM5UuT8.webp\",\"title\":\"Screenshot 2026-09-01 104422\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788234332_wqjnOaOu.webp\",\"title\":\"Screenshot 2026-09-01 104409\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788234333_9shtMdPo.webp\",\"title\":\"Screenshot 2026-09-01 104349\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788234333_g4J7ea8t.webp\",\"title\":\"Screenshot 2026-09-01 104331\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788234333_c1EWgk9y.webp\",\"title\":\"Screenshot 2026-09-01 104307\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788234333_lbKcXI1Y.webp\",\"title\":\"Screenshot 2026-09-01 104251\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788234333_a3X1X0Bl.webp\",\"title\":\"Screenshot 2026-09-01 104237\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788234333_fpJZfDzq.webp\",\"title\":\"Screenshot 2026-09-01 104224\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788234333_WSG9g0EE.webp\",\"title\":\"Screenshot 2026-09-01 104208\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788234333_SZ70I8JG.webp\",\"title\":\"Screenshot 2026-09-01 104149\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"},{\"url\":\"\\/uploads\\/projects\\/1788234333_K3qDztsq.webp\",\"title\":\"Screenshot 2026-09-01 104110\",\"type\":\"web\",\"caption\":\"Screenshot Aplikasi\"}]', 1, 0, '2026-08-30 12:10:32', '2026-09-01 03:45:33'),
(10, 11, 'Website Ikatan Guru Indonesia (IGI) Ogan Ilir', 'website-ikatan-guru-indonesia-ogan-ilir', 'Portal organisasi resmi Ikatan Guru Indonesia daerah Ogan Ilir untuk pendaftaran anggota guru dan publikasi workshop peningkatan kompetensi.', 'Pendataan anggota guru di seluruh kecamatan dan penyebaran informasi sertifikasi serta pelatihan IT pendidik.', 'Website organisasi guru dengan sistem pendaftaran keanggotaan, agenda seminar pendidikan, dan unduh sertifikat.', '[\"Pendaftaran dan validasi kartu tanda anggota (KTA) digital\",\"Informasi agenda seminar, workshop IT & pelatihan kurikulum\",\"Galeri dokumentasi kegiatan guru se-Kabupaten Ogan Ilir\"]', 'web', '🟢 Terimplementasi', '[\"Laravel\",\"MySQL\",\"Tailwind CSS\"]', 'IGI Ogan Ilir', 'https://berandadigital.net', '/images/portofolio-web-1.webp', '[{\"url\":\"\\/images\\/portofolio-web-1.webp\",\"title\":\"Portal Informasi IGI Ogan Ilir\",\"type\":\"web\",\"caption\":\"Publikasi kegiatan guru dan workshop pendidikan\"}]', 0, 10, '2026-08-30 12:10:32', '2026-08-30 12:10:32'),
(11, 12, 'Aplikasi Mobile Absensi Pegawai (Siabs BTD)', 'aplikasi-mobile-absensi-pegawai-siabs', 'Aplikasi mobile Android untuk pencatatan kehadiran karyawan berbasis jam kerja nyata, deteksi waktu presisi, dan rekapan kehadiran bulanan.', 'Pencatatan absensi manual sering rentan manipulasi dan menyulitkan rekapitulasi penggajian HRD.', 'Aplikasi Android native/Flutter dengan tombol one-tap absen masuk & absen pulang serta dashboard rekap status bulanan.', '[\"Absen masuk & absen pulang cepat dalam hitungan detik\",\"Rekapitulasi bulanan: jumlah Hadir, Izin, Sakit, dan Terlambat\",\"Riwayat log absensi realtime tersinkronisasi ke database\"]', 'mobile', '📱 Mobile App', '[\"Flutter\",\"Android Native\",\"REST API\",\"MySQL\"]', 'CV. Beranda Teknologi Digital & Mitra Bisnis', 'https://berandadigital.net', '/images/products/enterprise-web-mockup.jpg', '[{\"url\":\"\\/images\\/products\\/enterprise-web-mockup.jpg\",\"title\":\"Antarmuka Siabs Mobile App\",\"type\":\"mobile\",\"caption\":\"Tampilan tombol absen masuk, absen pulang, dan indikator kehadiran\"}]', 0, 11, '2026-08-30 12:10:32', '2026-08-30 12:10:32'),
(12, 12, 'Aplikasi Mobile ARSI App (Robbani Student Info)', 'aplikasi-mobile-arsi-student-information', 'Aplikasi mobile Android untuk portal informasi siswa, jadwal kelas, tabungan siswa, dan pembayaran SPP sekolah secara digital.', 'Orang tua siswa kesulitan memantau perkembangan nilai, absensi, dan tagihan SPP anak di sekolah.', 'Aplikasi mobile terpadu dengan autentikasi akun wali murid, notifikasi tagihan SPP, dan rincian tabungan sekolah.', '[\"Informasi jadwal pelajaran & kalender akademik terpadu\",\"Cek status pembayaran SPP bulanan & riwayat transaksi\",\"Modul pemantauan saldo tabungan siswa di sekolah\"]', 'mobile', '📱 Mobile App', '[\"Flutter \\/ Android\",\"PHP Backend\",\"MySQL\"]', 'SIT Robbani Ogan Ilir', 'https://berandadigital.net', '/btd/sekolah.png', '[{\"url\":\"\\/btd\\/sekolah.png\",\"title\":\"Tampilan Menu Utama ARSI App\",\"type\":\"mobile\",\"caption\":\"Menu pembayaran SPP, tabungan, jadwal dan presensi siswa\"}]', 0, 12, '2026-08-30 12:10:32', '2026-08-30 12:10:32'),
(13, 12, 'Aplikasi Mobile Pembelajaran Penjas (Bola Voli)', 'aplikasi-mobile-pembelajaran-penjas-voli', 'Aplikasi mobile Android interaktif untuk media pembelajaran dan instrumen pengukuran teknik passing atas & passing bawah olahraga bola voli.', 'Pembelajaran gerak dan tes kemampuan olahraga membutuhkan panduan visual serta instrumen hitung skor yang baku.', 'Aplikasi Android berbasis multimedia interaktif dengan modul panduan gerakan, petunjuk pengukuran, dan kalkulator skor tes.', '[\"Modul instruksi teknik passing atas dan passing bawah voli\",\"Instrumen tes digital dengan penghitungan skor terstandar\",\"Buku pedoman guru dan instrumen penilaian siswa otomatis\"]', 'mobile', '📱 Mobile App', '[\"Android Native \\/ Flutter\",\"SQLite\",\"Multimedia\"]', 'Dosen & Tim Penjas Universitas Sriwijaya', 'https://berandadigital.net', '/images/volley.png', '[{\"url\":\"\\/images\\/volley.png\",\"title\":\"Menu Pengukuran Passing Olahraga Bola Voli\",\"type\":\"mobile\",\"caption\":\"Instrumen pengukuran passing atas dan passing bawah voli\"}]', 0, 13, '2026-08-30 12:10:32', '2026-08-30 12:10:32'),
(14, 13, 'Sistem Informasi E-Klinik & Rekam Medis (EMR)', 'sistem-informasi-e-klinik-rekam-medis', 'Sistem informasi manajemen klinik terintegrasi untuk pendaftaran pasien online, jadwal praktek dokter, rekam medis elektronik (EMR), dan payment gateway QRIS.', 'Manajemen antrean pasien klinik dan peralihan dari rekam medis kertas menuju standar Rekam Medis Elektronik (RME) Kementerian Kesehatan.', 'Sistem E-Klinik modular lengkap dengan portal pasien, integrasi rekam medis dokter, kasir apotek, dan laporan pendapatan.', '[\"Booking jadwal dokter online & antrean poli terpadu\",\"Rekam Medis Elektronik (EMR \\/ RME) terstandar Kemenkes\",\"Integrasi kasir pembayaran digital QRIS, VA, dan e-wallet\",\"Laporan inventori obat apotek & analitik kunjungan pasien\"]', 'web', '🏥 Solusi E-Klinik', '[\"Laravel 13\",\"MySQL\",\"Tailwind CSS\",\"Payment Gateway\"]', 'Fasilitas Kesehatan & Klinik Mitra', 'https://berandadigital.net', '/images/Portofolio-sim.webp', '[{\"url\":\"\\/images\\/Portofolio-sim.webp\",\"title\":\"Dashboard Pelayanan Poliklinik & Rawat Inap\",\"type\":\"web\",\"caption\":\"Pilihan poli klinik, UGD, dan monitoring pasien\"}]', 0, 14, '2026-08-30 12:10:32', '2026-08-30 12:10:32'),
(15, 13, 'Pengembangan Media Virtual Reality (VR) & Augmented Reality', 'virtual-reality-augmented-reality-learning', 'Solusi media imersif berbasis Virtual Reality (VR) dan Augmented Reality (AR) untuk simulasi praktikum, edukasi visual, dan promosi 3D interaktif.', 'Pembelajaran sains dan simulasi peralatan mahal sulit dilakukan tanpa laboratorium fisik canggih.', 'Aplikasi simulasi 3D dan virtual reality yang dapat dijalankan melalui headset VR maupun smartphone.', '[\"Simulasi objek 3D interaktif 360 derajat\",\"Kompatibel dengan headset VR dan mobile smartphone\",\"Meningkatkan retensi pemahaman belajar hingga 80%\"]', 'web', '🥽 Immersive Tech', '[\"Unity 3D\",\"WebXR\",\"Blender\",\"C#\"]', 'Lembaga Pendidikan & Mitra Riset', 'https://berandadigital.net', '/btd/VR.png', '[{\"url\":\"\\/btd\\/VR.png\",\"title\":\"Simulasi Interaktif Virtual Reality\",\"type\":\"web\",\"caption\":\"Pengembangan konten 3D interaktif dan simulasi imersif\"}]', 0, 15, '2026-08-30 12:10:32', '2026-08-30 12:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('00TBNPy0cTRxEp8UMs0Bx0auUJn5VuxdHCx3Iccl', NULL, '182.9.193.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJHVFBpc1RoU2dHTDVKR3Brc0k1MEI5YjNDdFNneDVMSGE2dnJ5emtnIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877751),
('05Ag28vjfbuypdluuuQ3558YFsR15wW14tha99EG', NULL, '36.77.214.142', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJJa3FVOEpkSzdCbFhoOW5TbHBPQkM4cHBZUExXa0pwQktZQTNmTUNJIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877000),
('1JmN0ry7wmIyxABQ4k4RMeaTOriXw96Uwed5xad4', NULL, '49.13.136.104', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.0 Safari/537.36', 'eyJfdG9rZW4iOiJWTERPSWdtOEl0cXZmYUtDZk1yRERrMmF4eFVTU3hPV2VIcWVLdFphIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788855864),
('1TBGxQjj6Y13X7khLLDcNA96NlhISEsGoDFWjTQe', NULL, '118.137.151.65', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/30.0 Chrome/143.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiIzY0k3d2hBbEZDdWR6Z3ZZamNkWUtlQnlpd1draDFRUHdHZ2d4TXR3IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877978),
('1UJWsKVppXXHvmHzOPRYqsa2HkxkY5iAcjv77qTa', NULL, '43.135.134.127', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'eyJfdG9rZW4iOiJRNmRUcW9lV0dlZ0pJWHBjWVZzRk1sV2p0eG5QSG9aSzN0M0YxeHJ3IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788852816),
('2CRr5fh5ulIMXo0LDH2FghYIiHKagYv6j0ZNwmzb', NULL, '119.28.177.175', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'eyJfdG9rZW4iOiJSSE80TWlNQVZJZ3Q4cElrZ3U1enFTaEpYcHJUbGZQVDZob25HUlYzIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuYmVyYW5kYWRpZ2l0YWwubmV0Iiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1788857614),
('2iOk81xxm62scnBrT7tJREGPZo1VibC8QPTE3qvr', NULL, '138.128.153.41', 'hostio-bot/0.1 (+https://github.com/airyland/host.io; contact=i@mao.li)', 'eyJfdG9rZW4iOiJiNWJoejlYS1VxT1JLNzk0bHZFUHc2QlFzT2s4elhXdUVFTkZmdmV2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788872778),
('3AaXzNbzbOhYPxC8asAzK3VKuulgdwZJ8gLIXQsR', NULL, '165.99.194.215', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJ2ZW11aTF5cDJGTFhVemV6YXFlVUxKUXJrelBhME1kZXZtNnJQUXVsIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788875027),
('3gOHmOkJvMX15TodZVCt0sdOrxpm8PSJlK3F5kIy', NULL, '36.85.218.61', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.0.1 Mobile/15E148 Safari/604.1', 'eyJfdG9rZW4iOiJOT3JPUDRaQjZ4REw4UVgzUUZIYTl6NmwwMFlNT242MnhDdUY0dHJBIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788874187),
('3KOCNR9OG2fiYtNTHVTSlKpSPci06OsrET9cCRXl', NULL, '36.84.34.95', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJqZGh1WWJKWXBOWUJoY05Kb21wNkZSQVhGRXY3aU1vdWFoUmxCZVpOIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877603),
('3vcnbxnGJ3YFvW5DODgQUNlkxa4K5a8Nsc2vFprN', NULL, '114.10.156.44', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJqcW1sRElFbjc0aGU5bXgwZUZ3MzNhSEdWQUZTOWlmYnN4SDhmcUIxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788868430),
('4VqbrsC8sf8lQUrrHynqb6bXsEylOx18eKkEZb0S', NULL, '112.215.230.17', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiI5Zk9FZkhJMEVvYzVSUkJFV09IV2pueDRIRHZHQ25GQUh6dWxQUU5uIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788874942),
('55Eo3SqLev4U8RXuPtsNdZ5pq5w6VcDgAK4p7crW', NULL, '46.225.64.189', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.0 Safari/537.36', 'eyJfdG9rZW4iOiJHODc4T2d4Qno5a2lRWFdSQVU0c003Mm9ndU5JVXVoSkRyMjB6TGU1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877451),
('5q8Lf1yNHbGj4W3pzPGgOAT36UnhbMBlCjbAsVGo', NULL, '103.83.93.245', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJ6WlJSS3VhMk9IejNISHFoWW9BY0ZlRWE1blp6WTRXdzA4aW9OMnZQIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788875460),
('83LbCRjOz6zEJ6IePEpA3LiDZMRH053SggfRVa7s', NULL, '154.28.229.161', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJxYXNNMUJqaGFLWVRTOTBiZFFEYkxZV0hxNktJQ1RQVjdlUlYyazZiIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877916),
('8oDi2ZmyZrROvBl9UVdegdxdrEV4liG31MIBEAE7', NULL, '116.203.78.154', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.0 Safari/537.36', 'eyJfdG9rZW4iOiJyRkJPVFRqTGl3WHRRdHhERXBTczhTRmxaeXlqMzVCd3FkcjNEWkZMIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788852261),
('9a8zVT9pKxbXWRpevI1ICQD8LYgHGG1goOdixeqi', NULL, '66.249.66.43', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'eyJfdG9rZW4iOiJUUGoyQVRNM0sxQVBKRFJSREhRdTR5NG9VVzlpYVJJZmNUbFA0V3ZSIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788866388),
('9nxjXAAtWjgO6t8xSW1pJRoImW1R8QwrjopW65Ia', NULL, '114.10.153.242', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJLSjdvYlNKTEQ5a0JNdXhjU1RZVWZMaEVJTm41bmFXc1BHbDRxTndHIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788876909),
('aiQlJVTxid09bWkgig2fnIDllTpgPpTOuDmppBDP', NULL, '99.110.186.252', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJUaUxBczBpZmtGM0V6QlRaVWhzWlpkTlZ1R25kRXYyQUxFSWg0akhtIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788849121),
('Ay1wcfGAQpDUBCV6SGgGaNQgkXDpXPlCosA37Rmq', NULL, '116.203.239.26', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.0 Safari/537.36', 'eyJfdG9rZW4iOiJaczBWOHRCS1dlZkkxYXhTOHJWT2s0c1FEUFF3eDFqSFZNVHBOdU9BIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788873052),
('AYwRNfvhU2MZsNt49sn0rEIViewepFIJ9M2pq7RB', NULL, '45.41.128.230', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJxcmNXOTFvNzV4WTEycHBKSk0zaHVuN3hFNmlaU3ozVjVPWDliUjRNIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788868353),
('B5GRYqVP4kVz2zRIeLONGwG0aY5iZgpBXqHPOg5a', NULL, '103.144.18.27', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJiM2R3RDNWcG1OSnZiajBsbWRwUGlkVk43Y2UwMWVQQ2xGanBNV3psIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788876928),
('c8GqSIjnIbHUvuNZOaQQVl9WPmW6kiCz6Arif0JN', NULL, '103.3.221.54', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJFZ3RjcmV2SU9KZUEwNUVlME5lZEFaVExDTU5UeHdMb3JEWEt1YXdxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788875073),
('caqTSuwiWBjg2gNg42Nyz0H1Gy3X77IQzrcn0qMy', NULL, '36.71.84.190', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJHWTBJT3BHcHdVOTVSQ1NISm9GUGhjaHpkN01wdVpoYVRlaWZ4NW5VIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXRcL2ludm9pY2VzXC8xNjc1NTE5XC9wcmludCIsInJvdXRlIjoiaW52b2ljZXMucHVibGljLXByaW50In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwidXJsIjp7ImludGVuZGVkIjoiaHR0cHM6XC9cL2JlcmFuZGFkaWdpdGFsLm5ldFwvYWRtaW5cL2ludm9pY2VzIn19', 1788860424),
('CrvsoquwDw1ULdbRLtxy7WsHsfUJLiJLfUMkVLAP', NULL, '43.160.219.206', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'eyJfdG9rZW4iOiJKaUhtYlJQVlUzM3Y2Y3ladU1Va2JvMnJabENqRnY4TFpzdTRiWkFqIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788871009),
('cv1moeXoP0h3izioo8dNDVL83NpNV9wTzRZK30vZ', NULL, '114.10.18.27', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiIyUkNuckRzNE16bHRUOE5Ub2FNYzZiY0x5ZWVUTm1pdDVNWm1IbkpyIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877968),
('cVkY2Wcn5iFgM1otM5fj5xYUNPUl6U9TIMHoyDfi', NULL, '182.10.98.139', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJ4SlUweEM3ZlZ3MlJQWjlQMTJZclBOcVFnTTFmNVliamEycHkzaVc5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788878550),
('dGFAXH27xafySpRQX5nAbWAc0aA38Ecx4yeoOees', NULL, '182.8.249.114', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/152.0.7977.64 Mobile/15E148 Safari/604.1', 'eyJfdG9rZW4iOiJWeW92emlLYllTNmFocWJvR1N2TGN4aGQ5THN1TjZsTXlRS1pJc21OIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788875678),
('DJ4tR9wx8vMTek3leJSb20lFwrXt3NCGCEp7wMHW', NULL, '182.9.1.207', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJMVVNlTGVjMFJhcjNxbDJFQWdheVFIZWNLczl6RWhwcHpZYUU0ODF5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877080),
('ebFV1nH4XwqSvvAOaCPYQwifjLN1M3NTsIgYlKG7', NULL, '182.9.2.249', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJlbElCQU9UWDVnb29DSWhSZE5oYW5JU0xWbGdta3BZOHVsaFlhYjdLIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788875512),
('edqgMGu2CrZsONkMX1DkXaiVj9KBcVOgTZ0aZZAO', NULL, '78.47.205.130', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.0 Safari/537.36', 'eyJfdG9rZW4iOiJQc2xGVXV5eWg4S0hjSVAwMlNVOVVsQ05veDd0cXhlbUN3MVFzenpGIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788862257),
('EdR8vMEmfByeLqHOGVHGacctDwFsteJc3L9lEYVS', NULL, '103.146.185.66', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJoMTZmNVBzUXBTalJkdExhNzRsY0gzWWZsSFk4Tkdsd01TQnRVVHBsIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877646),
('EjEqyhWaXjNtoS5YPoKJ2w5lxtKn7b6wKAYBQWki', NULL, '91.99.17.185', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.0 Safari/537.36', 'eyJfdG9rZW4iOiJWdG5HQk9YbW9rWldVRFZxRFJ1M1VVYVk4TDlYUXN4S3FpU05BdVQ1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788866651),
('EWhMlWzCdKXChwpinGG6SemgTAJboAN7vmHb40AC', NULL, '182.1.135.28', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.5 Mobile/15E148 Safari/604.1', 'eyJfdG9rZW4iOiJ5bmFoZ2psQkpXWVluc2JRM3U0eWkxSUp4N2s5d0lHZmloR3dHYlVKIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788878960),
('Ey2bk50hzN6WY8bAIYGAprDjsHsLY1aZYy8DuFn4', NULL, '114.10.27.230', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJVUW5PRm9pMHNnT2REMDNEbEZaekZOY0JLaldVdHdsNHpuZ0p3cmhjIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788875825),
('F5gVrxhhEdyrqNAh81ghSip5WjDB8Vdoh6c5IXjP', NULL, '103.110.9.228', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJDZkJ5NzNRNlp1SkszcUhlTWpUZk1KRFZ3N1M2WHA2TVdZZnlGT3FMIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788874863),
('FXq8hDP6aEbwUwk9qjxSIv8TT4SMMksyGuZK22tf', NULL, '202.65.238.230', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'eyJfdG9rZW4iOiJFM1k0dDA0R1VYNm0yMXR3TElLbFUzSWg4Unl3RHZvdjk2VW5vZ1FmIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788879008),
('g8UipVSXgc1ZElJIyARndNRk1h0e74tBQG9Ha9GO', NULL, '182.10.100.225', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiI3YndBd2pBa05zOHJUdFdLbVVld0xJQlRkMllIaG9rRFRJZ3dzOVh1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877922),
('gb8v0tYjV7iUDOUwIL67fQT7IOQPxsrpXyMeF79o', NULL, '82.158.130.36', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJzRjZQM3h0YzRsWmEwMDRqbGVqTTRpM0k5QnhKbFRxbmpJbDFDak9uIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877776),
('Gp7k780ol8GgrXKjdZh37YZHr22qK2z85msDwXGn', NULL, '114.8.199.13', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJzM2FWRnNZUWZBdzBxZlFSVUpBaUhHVVQzRm1uSHUxdldqakJJY3o1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788876189),
('h0GKZhcXUFUcNMCH5TxiOdwPxbxxBljsfnuvheK2', NULL, '180.244.133.118', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJZQVhxRm9WTnc0UkROczhhUFhrTkp5VHZwMFRnSW5JUlpnd2tJUnlRIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788875523),
('HiCTKe64Ji6Dz0u9RK413JU3r60ZCnW2cJ9YWmNv', NULL, '182.7.5.202', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/153.0.8010.24 Mobile/15E148 Safari/604.1', 'eyJfdG9rZW4iOiI1ZzVpdkdmYndQeDJXRFFLSzZaZWJKWTRFdWlNNnhaa1FBdVZzc1ZTIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788878845),
('hY9xyDjVBzJgN1sTiQvZtKtEaKsf10H0l2ZO7gjD', NULL, '52.167.144.206', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'eyJfdG9rZW4iOiJNRWZGZWZNTmN0RVM4WEMyZkRGZDNsZGQ5WUpoajNpVjIyWVUyZjByIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXRcL3Byb2R1Y3RzIiwicm91dGUiOiJwcm9kdWN0cy5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1788856746),
('i2eUWO6yaZdkT7Pw1mhfk7LjikBULkvIQm1Jnmpp', NULL, '216.73.216.61', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; ClaudeBot/1.0; +claudebot@anthropic.com)', 'eyJfdG9rZW4iOiJsUEJhNWtmcFltenVlR3lUOWtxemFnZ1pnejNhYTloQ0RmSUNyYnhSIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788861912),
('Ids5Ol1M4MsdntOGrTJT4byQabMlaUGOvR39T0u6', NULL, '103.159.96.174', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJyWGFGU1AwUk9ZR3dZWkVlSkRFcXZ2ZmtZOXJ1TUV1MDJjTW5DMjJpIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877411),
('Iv1qDMRreQA3ULoMjnaSyRDwMv4EUF8NaZXyckbI', NULL, '116.202.9.136', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.0 Safari/537.36', 'eyJfdG9rZW4iOiJJaDkxMFdkd0lBRmtTWVpyeERNbHZWQzBnYjFvTVl1WVozdFZIa3EyIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788859460),
('IvGapVrm0KKXnDmr6VlxsMUw7Y4u3pxEV8ue9QK5', NULL, '104.251.240.196', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36 Edg/152.0.0.0', 'eyJfdG9rZW4iOiIzbnRLZE1melJCV3AwSFlsc1pyaUNiU1NxZjFKMUpRNVlRNzFiWldwIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788849121),
('J533uxBR6HuFCm4UNRFCeEtZ11esnhKzpyxATbxU', NULL, '157.97.126.157', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJOdTRtZTlLWDZCa29Cd2lEZXdEQXhHMTdxRkNIc0tHem5RT2NOMWFvIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788866331),
('kD4sHEFkTiUnPAg0NwjvXPTc289fRn3skoGYNgHM', NULL, '112.78.132.183', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiIwUE1aUXMxTU9NZVMyOU9tdUtNU2V5Rm1ISTRJMGpoUjZHR1ExblRPIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788875375),
('KIr0ADgcpBegn8KKHHyh2fLEr5rhRKR2HwXtrAHo', NULL, '108.6.216.7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJYcVlRa0RlZGxiZWxYdWJ1UEVabUVmSTNtZVhZQnY3bU1RenFxWW1tIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788849122),
('lA8SqZDOCpR5vT96HpIJWk8HQO5BZXXCeFPZAvfi', NULL, '104.237.242.179', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJCN1RQNFBmTFhGUTFxbkduTzJpdnFzUE4xUEEzMVNXQzMxRWU5TEFuIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788851504),
('mEngg3sYsuclY2JMWDbCcgkFl9OxxNzS7uS6J19M', NULL, '103.147.8.120', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Mobile Safari/537.36 OPR/101.0.0.0', 'eyJfdG9rZW4iOiJoNWM5YXNWdlNQM1ZLMmdIYVFMcXRTeWxrZmszcmptUmhGZWhpMHAzIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788875809),
('mgJ8NXzXzgzfyOFo7DasrO6BxjxemLHMjIUgLDwu', NULL, '114.119.157.103', 'Mozilla/5.0 (Linux; Android 7.0;) AppleWebKit/537.36 (HTML, like Gecko) Mobile Safari/537.36 (compatible; PetalBot;+https://webmaster.petalsearch.com/site/petalbot)', 'eyJfdG9rZW4iOiJDRUpFYjV3VEFVZXA0ZFp1WDBpUEpYc1NHVlJpMzhQdlJPZ1pPcElNIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXRcL2Jsb2dcL3BlbGF0aWhhbi13ZWJzaXRlLWRlc2EtZGFuLWFwbGlrYXNpLWFkbWluaXN0cmFzaS1zdXJhdC1zZXNhLXNlbnVyby10aW11ci02YTg1OGMxZjZmMGVjIiwicm91dGUiOiJibG9nLnNob3cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788860025),
('nbBtdNDqP5FwehetX6mp9hhm9SxzeHitXix6E7XB', NULL, '91.99.160.109', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJWdmwwZTlKa3duaWtqUDBPeXBOS2xBSVpJY1NDNVpTdE1YTGJGbm55IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788872777),
('Nm75BtF4n0Nb0y7fLnPgoX2PwqmBINRU1sCRRsiP', NULL, '103.132.40.71', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJPMkhaQ0lMdmtyNHlBQjkzdXhPZkNHZEsyRUh0M0MyY2xyd2ltQzZ0IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788878579),
('NOvjClastqeG53Y3MU4qU6NUjzv2O959pK4HXjao', NULL, '180.245.117.135', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJldjB4T3E3TlNxUzdVN3dhNFV1UHloZ3lKN1l2WEg0QW5YektjTGtJIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877037),
('NQbQHvp5tOLcGAHJoXMsF81GCiXzENYBppXCalnK', NULL, '36.71.84.190', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJhbkJEQUQ4WXh4UklNZGZpQ2RlbUtvM1k4Zzl1WGs4RXZ3UnZBWEpVIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXRcL2ludm9pY2VzXC8xNjc1NTE5XC9wcmludCIsInJvdXRlIjoiaW52b2ljZXMucHVibGljLXByaW50In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1788864547),
('NYXVj576AKwFNqvslgMEkSLhjMnhkPVrExQqgbmQ', NULL, '36.71.84.190', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJ3VEZBVDZuMXVpMWdmVlNCVFVxbExzblNMVzM3c2RZUTQ3ODlsWUNqIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXRcL2ludm9pY2VzXC8xNjc1NTE5XC92ZXJpZnkiLCJyb3V0ZSI6Imludm9pY2VzLnZlcmlmeSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1788864607),
('o3oPwnN1pJ2g1EDEvouhomqHmIr1bmpxTXMohiAb', NULL, '52.167.144.206', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'eyJfdG9rZW4iOiJ2UmxPT3l1b09KUHpmYlpEZ3pHYVJmek5kcFIxTnJiMzZwanA3cmd6IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXRcL2Jsb2ciLCJyb3V0ZSI6ImJsb2cuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788856747),
('O8AC3RKILhQhR7bzwKobAwZk7gMsKMsrLlF4cjI2', NULL, '119.235.221.131', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJjUUpSVWMxUnJUMmFrWkhIeWpnbWNhdkNZWjNCZ084ZW5vV3p6YThMIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788876135),
('On7frhieMMV2eIUq3fMUW5duUsXcwR2e7Du8RIcL', NULL, '140.213.232.78', 'Mozilla/5.0 (Linux; Android 8.1.0; vivo 1820) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJ6YnBZZGtVYTNCWm8xcVgxOFFBR0xETFpVbHV4b1RFMEMzZ3JLNjgxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788876968),
('OzjA3ysP1MHq81ave5LBXKpLn47qqjOO8GmNXblG', NULL, '103.131.18.5', 'Mozilla/5.0 (Linux; Android 8.1.0; CPH1803) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJ3aGtIVGNpcjFnRmZ6b2xKRnRPQXd1ampCNzgxNTJlNkZndlJmWVhJIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788878612),
('p0ecp95gXAQJ3XNYCUrUFUNSadN92NUCZQJICP1W', NULL, '171.96.154.52', 'moodle-deploy-check/1.5.0 (+authorized-security-audit)', 'eyJfdG9rZW4iOiJ5R0FtM3JESElQM2ZsTHVSZ28wellKallKNVhNdmdyZzhHUEZjc3lIIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788876065),
('P3lsc1lCTl4t9eRQinrqXvYWsM5H8CiYXOvR2x37', NULL, '203.189.75.131', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJHbWh4QmtNaTNPTEhoMFV3ak9JeFdoZVhldEZvUGRhaHVrM3lkbkxWIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788871048),
('p6lh79nowkFCNOMBlQkfmku8DgpySMfI2pPUPCMJ', NULL, '103.131.71.169', 'Mozilla/5.0 (compatible; coccocbot-web/1.0; +http://help.coccoc.com/searchengine)', 'eyJfdG9rZW4iOiIxeEdDc3kyUEhhTWNsMXJVNklDcjlieEFtb0JvenVQb0NvVWhwSlRDIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788850986),
('PaWPoDmY0j0sS2KNDhOXor9GmFkF4ytax2NWOrMu', NULL, '103.52.69.209', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJzajFDZTdtbkJqOG05VDdPdzBER3dxV0xqQ3pQdEM2dFdIbGlqUzNDIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788874489),
('PhYQ5CNoTjUrAE4mzx43F1h44Pf8YrtoiwuqhAsU', 2, '36.71.84.190', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJOU25EN0FMM1B4ZUN3NUdiR3FuUlppVVM2bms4RnNYYmFhMnZIdnpOIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6Mn0=', 1788860970),
('PWU6IdfkGU2lnCTlk3GgIjukxxgG1BpcFVWXtNRk', NULL, '103.133.62.42', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJpcHAyZlJUY1c4OWEwMWM2MFNIZEtnWThHOHNlYWZueHNyVDV3Y2g1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788875818),
('q7PMQ8PX127GfBUvQAZC8123zV3BuFpoxSPBBQt1', NULL, '114.10.129.87', 'Mozilla/5.0 (Android 11; Mobile; rv:155.0) Gecko/155.0 Firefox/155.0', 'eyJfdG9rZW4iOiIzM1A2NGZ4bVNWc2c5b2FlVllVSVFvbGtFRHdQTG9teUV5RnpQSVpwIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788876921),
('QEe5NsalylApgLI0sRZYw5mn4Myx4oK2yLkCaLfV', NULL, '182.9.2.77', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiI5VXlPaElyM1RRdlpLUnRXSGEzdEFXemlLRjRCWlRjaVFFZXA3dXZsIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877596),
('qfQI24UJBUjNfJVSsCvu1N4ksxjSsSom8e5gGgCK', NULL, '157.66.41.25', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJPVjFHZDBRUkxDWUJVT2VLN1lydkdHZW9kb3VXUVVHbTFFaHk4b2x0IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788875465),
('qrftafCec9O5eJh9Da3zxCzxV7pzXQAnlifppf1B', NULL, '203.83.39.11', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJmWkhJWU8wNjd0NzRITjJVeDdEVXV5MkNPQ2VWYjl5dVQ2bm5QU3J6IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788878068),
('QuG0q5vJoeoK9t5vNSJ7Y5898NAuegOpZsZbrnbt', NULL, '36.71.84.190', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJnUzh1NUROVHl2YkFrbHJHYmNpSUpaWlVPNVZMRHVxR2EwT1R5ckd1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXRcL3BvcnRmb2xpb1wvd2Vic2l0ZS1zbWFpdC1pc2hsYWh1bC11bW1haC1wcmFidW11bGloIiwicm91dGUiOiJwcm9qZWN0cy5zaG93In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1788864910),
('rJGcrI3v9pedFLpt6jbcWfHKVpMhpsCCrOsqsiZF', NULL, '103.25.192.98', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJSUEV1TGlON29uNm9ZTjVzR09BMVVmYkd5WVNIM0x1aUF6WFFocnhSIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXRcL2FkbWluIiwicm91dGUiOiJhZG1pbi5kYXNoYm9hcmQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788852826),
('RJzQnbc0mBumJVdEhXHpFn2cltj6xCqqqjGy9wEm', NULL, '180.252.42.136', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJmMmVic0ZDemNSV0swclJpazN5Qjc0WFRtbWZzMElWYUNva2x5T0Y4IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788878733),
('rVESFuH4jJW3X9HGNO16WVaH23T5fyL4XbJiA4Ky', NULL, '124.158.184.50', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJFSVFnb0VyWEUxNnRudEZ1Tnk4QVY2ZHQydEM5bU1qclFWQ2RjQ0xiIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877893),
('rWFWYOkwCULVind4gh94DMSVDHuESVpKAFCaIJtj', NULL, '182.6.68.31', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJNaHBUYW5DbTd1NEhkRVBvZkkwY1dPU2tDQjdxS0FnSG1uekZyRHBBIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877930),
('sf4UIhlafJKs7c1nbLLvUluyLEWZlikWi46XGUTE', NULL, '157.20.144.150', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJFd1NVbmNiZjBqT2VKU0V0cUdEdnNTTVM5NW1rNmxrYnBhS2pqNjFEIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788875820),
('T2rIjgi5XaLq7vgHpTEuoFJuGofSGsZaREOHEmzl', NULL, '182.1.234.198', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJBd0lhNGxiZFY0RFljdEZzODlmenNuT2tzSDBaQURPSHM3MkhXTGd3IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788878209),
('t8yewhIINlhWuKbMfrkBuKn9ikeu4rlwhtjp9ugf', NULL, '103.138.49.31', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJKbFhERTc1U00xN3Y4QWV3SHdtbmlqVWVEc2JUcEczR3JDR3J5NFl3IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877745),
('tN42WzKX9WS5xW53ioFpNMe7orMcBSXJEpLvyDzz', NULL, '182.2.6.179', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJXUmpSTGNzZzdkOW5pUGxYMTlFWjBHVzVUNkpUdHh4MGRlM2RzTXVRIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877611),
('TPCiM8dzmFk2AEVyn1mYQOcNI7Xj8UmOkcz0gBos', NULL, '114.10.31.72', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiIxUUh1T2JZY1REZTZGTE85M0tvdmVyVWQxMlc3UHhleHBROE1CWExvIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788876376),
('vjcCXqJuchwJbAVbljsnGj0JOuSsD2f1eBrLcwW9', NULL, '114.10.10.10', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJZWEY3bDJkcEdybjlYTXNtMWNKTkVrOEVob1R4ZWJzZVUxNmlabXJVIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877872),
('VOwWUxkHQzvO5wz0uK0nIV1MyZ5wz4ZpQixIvB0G', NULL, '182.6.45.58', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJOdUp0dlhWUmNuaEtnM09wZFNzWWo0TUVqZ0o5TExaelVET01HZ0lVIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788878741),
('w5R4CtslojQvTkkYLgl2uSmjFQruiF3BDkHcr5ix', NULL, '36.71.84.190', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJSSGRwWUpoQmVhcHlxUkpPSjF2S0dBemowMDVMY0I1ZjQ2RUJ4d05yIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXRcL2ludm9pY2VzXC8xNjc1NTE5XC92ZXJpZnkiLCJyb3V0ZSI6Imludm9pY2VzLnZlcmlmeSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1788864547),
('wGCMJCiFs3e7kIn9qMScAKktmIyPwwkMwupruAv9', NULL, '182.2.83.11', 'Mozilla/5.0 (Linux; Android 11; SAMSUNG SM-A032F Build/RP1A.201005.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 SamsungBrowser/7.4 Chrome/151.0.7922.199 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJ4aUVkbFZFM0NHUE1vcWlCM0pUZllHWkNIQ29OdmZHTm5sUkhBNDNUIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788874916),
('wxmItfFpxoQZB7QiDzaN3iMwiuM1bYjVlM0Sl77s', NULL, '114.125.2.10', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJ2Q0w2MFpkbDU3Tnp1a1VOeEI3OVlCSWh5TlBkYjVsdVR3aXV0S2kwIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXRcL2FkbWluIiwicm91dGUiOiJhZG1pbi5kYXNoYm9hcmQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788852830),
('xG87tBPcSb7Yc18pv5ZeTRV3Dl1mJFLTAzHtAUOm', NULL, '38.46.214.186', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJsZzZYZndNOFNYZHMyb1BBN0JEYTVuekhBaGpFS0trNFpRRHZ6RDV2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877725),
('Xr1ydSN9qMRStFa41szvyTW2Szg9K8hsKCWDYORi', NULL, '68.23.149.173', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0', 'eyJfdG9rZW4iOiJEc2FQSDdFYU5ZemhKWHJGY2Rra21adHJiU1JWZnJPUmpNblFtQWc4IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788849121),
('xukdgbOZmh6MhANTzduNoTegVZ63awbVaw1heeEy', NULL, '210.87.93.74', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJlZWxFYlpPTnRJYVRaTG9yU2hXWk9aRjg2bVRPb2tCMkZidTI0Q1NQIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877603),
('xVsKnv6Q9ocNMN7GClRnPWcWBGeynMC7lPFLFlyx', NULL, '103.247.13.190', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/30.0 Chrome/143.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJZYnRFVkNURmdZYmkzNHZUb3c2WkRzNldSZ3VsUndsMjVYdDR2TXR5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788878389),
('yOCKnfl19mktGZNpTIyY4zSYYTUy2A4puTl10uFQ', NULL, '188.245.123.211', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.0 Safari/537.36', 'eyJfdG9rZW4iOiJ3Q2VVcEpiTjVtYnMxcnlKUDB0MkU2WEJVRlhVREFmeXczbVBGUGRZIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788870269),
('Yr2Col9JD7ZnGEOcOEZRYELqUPVESkoHVh4su5Tt', NULL, '172.225.78.198', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.6.1 Mobile/15E148 Safari/604.1', 'eyJfdG9rZW4iOiJWMlAxWGdjdWVpbzhHNVFPR0hENDJ6SHZYVE1HTlBKWThSZ1J3eVczIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788878451),
('yRRP6fQVMCAPCLnLzoEvsCk05R9GoeQ46pHbKwqe', NULL, '114.10.82.56', 'Mozilla/5.0 (Linux; Android 12; V2236 Build/SP1A.210812.003) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.7049.79 Mobile Safari/537.36 XiaoMi/MiuiBrowser/14.62.0-gn', 'eyJfdG9rZW4iOiJvekVyVFlXYWdhaDRsSzhpT3BPWDMxR1h1OUhrazEySzJMdUlkTHVMIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877377),
('Yv2SA1z7x5kh98GRdfLNUuRXWR7GseoHCwS8cAqj', NULL, '115.178.236.58', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJkazZWMWRtc21rTE5HMFBRSTRUU2Znd2ttaHljSFBCbkxPcEJ1WlYyIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877310),
('Z5BE6oX0ZoEwoOZr0YlvT1wNYhCdO7CJlotABtmR', NULL, '180.248.167.160', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Mobile Safari/537.36', 'eyJfdG9rZW4iOiJueXcyRVM2ZkdoWVpkN1FxYXJDdVB4QmdqWjlXZmxOa2dZUk5hT05sIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788875085),
('z8jbhg0Z4F9b72y0XQJbBT5AFGsO8mj1ZAIDMHQq', NULL, '99.140.157.126', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJjeTRaSGtFdmtxTEdxNHNJdGdQajF3b3RSaVdMakl1bEhnTjV2QVdsIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788849122),
('zHmJOpEe6dr9cZmkVT8wG7ufEpurfHCgB1iCDh56', NULL, '147.45.69.206', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0 Safari/537.36', 'eyJfdG9rZW4iOiJabGI5VFpwYmJZZFU5Qzc0S0YxclNMZFNOWnVCb00xMzBNbmVpcGUxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788877670),
('zVxNhIaJ0mDdl7sNAnAwk3Gb5QnfTqJ3rDM9mTtY', NULL, '140.213.140.140', 'Mozilla/5.0 (Android 10; Mobile; rv:156.0) Gecko/156.0 Firefox/156.0', 'eyJfdG9rZW4iOiJ1QWhicVRHUUxKMmJneURXTXh6ZFF3ZHVLeFRydU9iRk9tWFRBOXY2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9iZXJhbmRhZGlnaXRhbC5uZXQiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1788878266);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `group` varchar(255) NOT NULL DEFAULT 'general',
  `label` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `group`, `label`, `type`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'CV. Beranda Teknologi Digital', 'general', 'Nama Perusahaan', 'text', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(2, 'site_tagline', 'Jasa Pembuatan Website, Sistem Informasi, Aplikasi Android/iOS & AI Solution', 'general', 'Tagline Utama', 'text', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(3, 'hero_tagline', 'Akselerasi Bisnis Anda Dengan Software & AI Solution Modern', 'hero', 'Tagline Hero', 'text', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(4, 'hero_description', 'Mitra transformasi digital terdepan di Indonesia. Kami menghadirkan jasa pengembangan aplikasi web enterprise, aplikasi mobile Android/iOS, solusi AI privat, serta penyelenggaraan pelatihan & workshop IT profesional.', 'hero', 'Deskripsi Hero', 'textarea', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(5, 'trainer_name', 'Septa Ryan Hidayat', 'trainer', 'Nama Trainer / Speaker', 'text', '2026-08-19 10:57:35', '2026-08-30 15:28:41'),
(6, 'trainer_title', 'Direktur Utama CV. Beranda Teknologi Digital, Software Architect & AI Speaker', 'trainer', 'Gelar / Jabatan', 'text', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(7, 'trainer_bio', 'Direktur Utama & Lead Software Architect di CV. Beranda Teknologi Digital. Dewan Pakar IGI Ogan Ilir, Narasumber Komdigi & Media Indonesia, serta Trainer Nasional di bidang Vibe Coding, AI RAG Document, dan Pengembangan Aplikasi Web/Mobile.', 'trainer', 'Bio Trainer', 'textarea', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(8, 'trainer_avatar', '/images/Insight-Talks-Komdigi.jpeg', 'trainer', 'Foto Profile Trainer', 'text', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(9, 'trainer_stats_years', '8+', 'trainer', 'Pengalaman Tahun', 'text', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(10, 'trainer_stats_events', '85+', 'trainer', 'Workshop & Seminar', 'text', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(11, 'trainer_stats_alumni', '5,000+', 'trainer', 'Peserta Pelatihan', 'text', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(12, 'contact_email', 'info@berandadigital.net', 'contact', 'Email Resmi', 'text', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(13, 'contact_phone', '+62 896-9524-9089', 'contact', 'WhatsApp Utama', 'text', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(14, 'contact_phone_sec', '+62 811-7448-447', 'contact', 'WhatsApp Sekunder', 'text', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(15, 'contact_address', 'Jalan Sarjana Kel. Timbangan Blok A No. 15, Indralaya Utara, Kab. Ogan Ilir, Sumatera Selatan', 'contact', 'Alamat Kantor Resmi', 'textarea', '2026-08-19 10:57:35', '2026-08-30 12:10:32'),
(16, 'social_linkedin', 'https://linkedin.com/company/berandadigital', 'social', 'LinkedIn', 'text', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(17, 'social_github', 'https://github.com/septaryanhidayat/btd', 'social', 'GitHub', 'text', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(18, 'social_instagram', 'https://www.instagram.com/bteknologi_digital', 'social', 'Instagram', 'text', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(19, 'company_legal_name', 'CV. Beranda Teknologi Digital', 'general', 'Nama Badan Usaha', 'text', '2026-08-30 12:10:32', '2026-08-30 12:10:32'),
(20, 'company_ahu', 'AHU-0003819-AH.01.14 Tahun 2022', 'general', 'SK Kemenkumham', 'text', '2026-08-30 12:10:32', '2026-08-30 12:10:32'),
(21, 'company_npwp', '63.100.018.9-312.000', 'general', 'NPWP Perusahaan', 'text', '2026-08-30 12:10:32', '2026-08-30 12:10:32'),
(22, 'company_notaris', 'Juwairiyah Handayani, S.H., M.Kn (Salinan Akta No. 01 Tanggal 29 Desember 2021)', 'general', 'Notaris Pendirian', 'text', '2026-08-30 12:10:32', '2026-08-30 12:10:32'),
(23, 'company_lkpp_url', 'https://e-katalog.lkpp.go.id/katalog/produk/detail/48939397?type=regency', 'general', 'URL E-Katalog LKPP RI', 'text', '2026-08-30 12:10:32', '2026-08-30 12:10:32'),
(24, 'contact_phone_wa_profile', '0896 9524 9089', 'contact', 'WhatsApp Resmi Profile', 'text', '2026-08-30 12:10:32', '2026-08-30 13:16:06'),
(25, 'company_nib', '1203000102148 / KBLI 62019', 'legal', 'Nomor Induk Berusaha (NIB)', 'text', '2026-08-30 13:25:38', '2026-08-30 13:25:38'),
(26, 'company_lkpp_status', 'Terdaftar Resmi di E-Katalog LKPP RI', 'legal', 'Status LKPP RI', 'text', '2026-08-30 13:25:38', '2026-08-30 13:25:38'),
(27, 'stats_clients', '150+', 'stats', 'Statistik Klien Puas', 'text', '2026-08-30 13:25:38', '2026-08-30 13:25:38'),
(28, 'stats_projects', '85+', 'stats', 'Statistik Sistem Selesai', 'text', '2026-08-30 13:25:38', '2026-08-30 13:25:38'),
(29, 'stats_satisfaction', '99.8%', 'stats', 'Statistik Kepuasan Client', 'text', '2026-08-30 13:25:38', '2026-08-30 13:25:38'),
(30, 'stats_experience', '8+ Thn', 'stats', 'Statistik Pengalaman', 'text', '2026-08-30 13:25:38', '2026-08-30 13:25:38'),
(31, 'cta_headline', 'Let\'s Work Together', 'general', 'Headline CTA Bawah', 'text', '2026-08-30 13:25:38', '2026-08-30 13:25:38'),
(32, 'cta_description', 'Revolusi Teknologi mengubah aspek kehidupan kita, dan struktur masyarakat itu sendiri. Konsultasikan rencana pembuatan website perusahaan, aplikasi mobile app, sistem informasi, atau pelatihan IT bersama CV. Beranda Teknologi Digital.', 'general', 'Deskripsi CTA Bawah', 'textarea', '2026-08-30 13:25:38', '2026-09-01 03:54:13'),
(33, 'theme_primary_color', '#0aabae', 'general', NULL, 'text', '2026-08-30 15:28:41', '2026-08-30 15:28:41'),
(34, 'theme_primary_color_text', '#0aabae', 'general', NULL, 'text', '2026-08-30 15:28:41', '2026-08-30 15:28:41'),
(35, 'theme_accent_color', '#fe6000', 'general', NULL, 'text', '2026-08-30 15:28:41', '2026-08-30 15:28:41'),
(36, 'theme_accent_color_text', '#fe6000', 'general', NULL, 'text', '2026-08-30 15:28:41', '2026-08-30 15:28:41'),
(37, 'theme_bg_soft', '#f4f7fe', 'general', NULL, 'text', '2026-08-30 15:28:41', '2026-08-30 15:28:41'),
(38, 'theme_bg_soft_text', '#f4f7fe', 'general', NULL, 'text', '2026-08-30 15:28:41', '2026-08-30 15:28:41'),
(39, 'stats_reviews', '85+', 'general', NULL, 'text', '2026-08-30 15:28:41', '2026-08-30 15:28:41'),
(40, 'site_title', 'CV. Beranda Teknologi Digital', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-08-30 15:38:56'),
(41, 'site_description', 'CV. Beranda Teknologi Digital adalah agensi teknologi digital modern di Indonesia. Jasa pembuatan website, aplikasi Android/iOS, solusi AI privat, dan workshop IT profesional.', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-08-30 15:38:56'),
(42, 'hero_badge', 'Digital Agency & Software House Terpercaya', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-08-30 15:38:56'),
(43, 'hero_title_1', 'CV. Beranda', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-09-01 03:52:38'),
(44, 'hero_title_2', 'Teknologi Digital', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-09-01 03:52:15'),
(45, 'portfolio_description', 'Eksplorasi portofolio proyek dan sistem informasi enterprise inovatif yang kami rancang dan kembangkan untuk berbagai instansi pemerintah, institusi pendidikan, dan perusahaan nasional. Klik foto portofolio untuk melihat galeri tampilan layar aplikasi.', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-08-30 15:38:56'),
(46, 'company_name', 'CV. Beranda Teknologi Digital', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-08-30 15:38:56'),
(47, 'company_address_line1', 'Jl. Sarjana, Timbangan, Ogan Ilir', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-08-30 15:38:56'),
(48, 'company_address_line2', 'Sumatera Selatan, Indonesia', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-08-30 15:38:56'),
(49, 'company_postal_code', '30862', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-08-30 15:38:56'),
(50, 'site_website', 'www.berandadigital.net', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-08-30 15:38:56'),
(51, 'company_address', 'Jalan Sarjana Blok A No. 25 Timbangan, Ogan Ilir, 30862', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-08-30 15:38:56'),
(52, 'about_badge', 'About us', 'general', NULL, 'text', '2026-08-30 17:21:17', '2026-08-30 17:21:17'),
(53, 'about_title', 'We develop digital strategies products and services.', 'general', NULL, 'text', '2026-08-30 17:21:17', '2026-08-30 17:21:17'),
(54, 'about_description', 'CV. Beranda Teknologi Digital adalah Digital Creative Agency & Software House terpercaya yang mempunyai pengalaman pembuatan ratusan website bisnis, sistem informasi instansi, dan toko online secara elegan dan profesional. Kami hadir dengan desain website yang mengikuti tren terkini, user friendly, dan mudah dioperasikan.', 'general', NULL, 'text', '2026-08-30 17:21:17', '2026-09-01 03:54:13'),
(55, 'about_button_text', 'Pelajari Selengkapnya', 'general', NULL, 'text', '2026-08-30 17:21:17', '2026-08-30 17:21:17'),
(56, 'about_button_url', '/services', 'general', NULL, 'text', '2026-08-30 17:21:17', '2026-08-30 17:21:17'),
(57, 'about_image', '/uploads/settings/1788110563_sdWzPzpF.webp', 'general', NULL, 'text', '2026-08-30 17:21:17', '2026-08-30 17:22:44'),
(58, 'hero_image', '/uploads/settings/1788112390_UwpvtmaQ.webp', 'general', NULL, 'text', '2026-08-30 17:53:10', '2026-08-30 17:53:10'),
(59, 'og_image', '/uploads/settings/1788112520_ATEH7Bt9.webp', 'general', NULL, 'text', '2026-08-30 17:55:20', '2026-08-30 17:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `level` varchar(100) NOT NULL DEFAULT 'All Levels',
  `duration` varchar(100) DEFAULT NULL,
  `target_audience` varchar(255) DEFAULT NULL,
  `summary` text NOT NULL,
  `syllabus` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`syllabus`)),
  `price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `thumbnail` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `title`, `slug`, `level`, `duration`, `target_audience`, `summary`, `syllabus`, `price`, `thumbnail`, `is_featured`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Lecturer Development Program: Artificial Intelligence & Vibe Coding', 'lecturer-development-program-ai-vibe-coding', 'Executive & Dosen', '1 Hari Workshop Intensif', 'Dosen, Akademisi & Pengajar Perguruan Tinggi', 'Pelatihan Pemanfaatan Artificial Intelligence (AI) untuk pembuatan aplikasi praktis dan profesional tanpa coding, khusus bagi Dosen Politeknik Akamigas Palembang.', '[\"Pengenalan Konsep Vibe Coding & Generative AI\",\"Pembuatan Prototype Aplikasi Tanpa Baris Kode\",\"Pemanfaatan AI dalam Inovasi Pembelajaran Perguruan Tinggi\",\"Studi Kasus Otomasi Administrasi Akademik\"]', 1500000.00, '/preview/screencapture-berandadigital-test-trainer-2026-08-19-17_49_10.png', 1, 1, '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(2, 'Pelatihan Augmented Reality (AR) & Koding untuk Media Edukasi Interaktif', 'pelatihan-augmented-reality-ar-dan-koding', 'Guru & Praktisi Pendidikan', '1 Hari Workshop', 'Guru SD, SMP, SMA & Pengembang Media Pembelajaran', 'Pelatihan pembuatan aplikasi 3D Augmented Reality untuk visualisasi materi pelajaran interaktif di kelas.', '[\"Dasar 3D Modeling & AR Marker\",\"Pengenalan Software AR Creator\",\"Integrasi AR dengan Buku Pelajaran\",\"Publishing Aplikasi AR ke Smartphone\"]', 1200000.00, '/images/Flyer-AR-New-1-scaled.jpg', 1, 2, '2026-08-19 10:57:35', '2026-08-19 10:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Septa Ryan Hidayat', 'admin@berandadigital.net', NULL, NULL, '$2y$12$unVblkDB1bH3PS.nSBaL9u4JvOtzXb4fDbohI3bVrZqKkvBNqVNeu', 'rWk4JgrNXBmHdLXFjt77DC3k020kZySkXxlK9qHvh6r4iYdopDHBXb1gYB9g', '2026-08-19 10:57:35', '2026-08-30 15:27:27'),
(2, 'Admin BTD', 'info@berandadigital.net', '/uploads/avatars/1788105011_oYWYrCqZ.webp', NULL, '$2y$12$NB250se90qzUykOLnG//GuRy006OXsSY0rTuU.Hb/KnJz98jNDitO', 'G52qAk3LwxbZh5lpR1YG2IznHdgLJ5YCPTqoYhvEOTzhJu631AqRxafbtBkW', '2026-08-30 13:24:51', '2026-09-01 03:56:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `digital_products`
--
ALTER TABLE `digital_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `digital_products_slug_unique` (`slug`),
  ADD KEY `digital_products_category_id_foreign` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_invoice_number_unique` (`invoice_number`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_slug_unique` (`slug`),
  ADD KEY `projects_category_id_foreign` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trainings_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `digital_products`
--
ALTER TABLE `digital_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `digital_products`
--
ALTER TABLE `digital_products`
  ADD CONSTRAINT `digital_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
