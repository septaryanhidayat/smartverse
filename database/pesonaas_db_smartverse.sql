-- ========================================================
-- SmartVerse (smartverse.id) - Production MySQL Database Dump
-- Target Database: pesonaas_db_smartverse
-- Optimized for phpMyAdmin & cPanel MySQL Import
-- Generated on: 2026-10-09 13:24:42 UTC
-- ========================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

SET FOREIGN_KEY_CHECKS = 0;

-- --------------------------------------------------------
-- Table structure for `migrations`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `migrations`
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '0001_01_01_000003_create_beranda_tables', 1),
(5, '2026_08_19_000004_create_products_trainings_galleries_table', 1),
(6, '2026_08_30_000001_create_invoices_table', 1),
(7, '2026_08_30_000002_add_avatar_to_users_table', 1),
(8, '2026_08_30_000005_add_slider_and_details_to_projects_table', 1),
(9, '2026_09_08_081820_add_client_email_to_invoices_table', 1),
(10, '2026_09_10_000001_create_visitor_logs_table', 1),
(11, '2026_09_10_000002_create_financial_records_table', 1),
(12, '2026_09_10_000003_create_domain_renewals_table', 1),
(13, '2026_09_23_000001_make_settings_value_longtext', 1),
(14, '2026_10_09_000001_create_cv_system_tables', 1);

DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `password_reset_tokens`;
DROP TABLE IF EXISTS `sessions`;
DROP TABLE IF EXISTS `cache`;
DROP TABLE IF EXISTS `cache_locks`;
DROP TABLE IF EXISTS `jobs`;
DROP TABLE IF EXISTS `job_batches`;
DROP TABLE IF EXISTS `failed_jobs`;
DROP TABLE IF EXISTS `categories`;
DROP TABLE IF EXISTS `projects`;
DROP TABLE IF EXISTS `posts`;
DROP TABLE IF EXISTS `inquiries`;
DROP TABLE IF EXISTS `settings`;
DROP TABLE IF EXISTS `digital_products`;
DROP TABLE IF EXISTS `trainings`;
DROP TABLE IF EXISTS `galleries`;
DROP TABLE IF EXISTS `invoices`;
DROP TABLE IF EXISTS `visitor_logs`;
DROP TABLE IF EXISTS `financial_records`;
DROP TABLE IF EXISTS `domain_renewals`;
DROP TABLE IF EXISTS `cv_profiles`;
DROP TABLE IF EXISTS `cv_activities`;

-- --------------------------------------------------------
-- Database Schema Definition (DDL)
-- --------------------------------------------------------
create table `users` (`id` bigint unsigned not null auto_increment primary key, `name` varchar(255) not null, `email` varchar(255) not null, `email_verified_at` timestamp null, `password` varchar(255) not null, `remember_token` varchar(100) null, `created_at` timestamp null, `updated_at` timestamp null) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
alter table `users` add unique `users_email_unique`(`email`);
create table `password_reset_tokens` (`email` varchar(255) not null, `token` varchar(255) not null, `created_at` timestamp null, primary key (`email`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
create table `sessions` (`id` varchar(255) not null, `user_id` bigint unsigned null, `ip_address` varchar(45) null, `user_agent` text null, `payload` longtext not null, `last_activity` int not null, primary key (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
alter table `sessions` add index `sessions_user_id_index`(`user_id`);
alter table `sessions` add index `sessions_last_activity_index`(`last_activity`);
create table `cache` (`key` varchar(255) not null, `value` mediumtext not null, `expiration` bigint not null, primary key (`key`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
alter table `cache` add index `cache_expiration_index`(`expiration`);
create table `cache_locks` (`key` varchar(255) not null, `owner` varchar(255) not null, `expiration` bigint not null, primary key (`key`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
alter table `cache_locks` add index `cache_locks_expiration_index`(`expiration`);
create table `jobs` (`id` bigint unsigned not null auto_increment primary key, `queue` varchar(255) not null, `payload` longtext not null, `attempts` smallint unsigned not null, `reserved_at` int unsigned null, `available_at` int unsigned not null, `created_at` int unsigned not null) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
alter table `jobs` add index `jobs_queue_index`(`queue`);
create table `job_batches` (`id` varchar(255) not null, `name` varchar(255) not null, `total_jobs` int not null, `pending_jobs` int not null, `failed_jobs` int not null, `failed_job_ids` longtext not null, `options` mediumtext null, `cancelled_at` int null, `created_at` int not null, `finished_at` int null, primary key (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
create table `failed_jobs` (`id` bigint unsigned not null auto_increment primary key, `uuid` varchar(255) not null, `connection` varchar(255) not null, `queue` varchar(255) not null, `payload` longtext not null, `exception` longtext not null, `failed_at` timestamp not null default CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
alter table `failed_jobs` add index `failed_jobs_connection_queue_failed_at_index`(`connection`, `queue`, `failed_at`);
alter table `failed_jobs` add unique `failed_jobs_uuid_unique`(`uuid`);
create table `categories` (`id` bigint unsigned not null auto_increment primary key, `name` varchar(255) not null, `slug` varchar(255) not null, `type` varchar(255) not null default 'project', `created_at` timestamp null, `updated_at` timestamp null) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
alter table `categories` add unique `categories_slug_unique`(`slug`);
create table `projects` (`id` bigint unsigned not null auto_increment primary key, `category_id` bigint unsigned null, `title` varchar(255) not null, `slug` varchar(255) not null, `summary` text null, `challenge` text null, `solution` text null, `tech_stack` json null, `client_name` varchar(255) null, `project_url` varchar(255) null, `thumbnail` varchar(255) null, `gallery` json null, `is_featured` tinyint(1) not null default '0', `order` int not null default '0', `created_at` timestamp null, `updated_at` timestamp null) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
alter table `projects` add constraint `projects_category_id_foreign` foreign key (`category_id`) references `categories` (`id`) on delete set null;
alter table `projects` add unique `projects_slug_unique`(`slug`);
create table `posts` (`id` bigint unsigned not null auto_increment primary key, `category_id` bigint unsigned null, `user_id` bigint unsigned null, `title` varchar(255) not null, `slug` varchar(255) not null, `thumbnail` varchar(255) null, `excerpt` text null, `body` longtext not null, `status` enum('draft', 'published') not null default 'published', `published_at` timestamp null, `created_at` timestamp null, `updated_at` timestamp null) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
alter table `posts` add constraint `posts_category_id_foreign` foreign key (`category_id`) references `categories` (`id`) on delete set null;
alter table `posts` add constraint `posts_user_id_foreign` foreign key (`user_id`) references `users` (`id`) on delete set null;
alter table `posts` add unique `posts_slug_unique`(`slug`);
create table `inquiries` (`id` bigint unsigned not null auto_increment primary key, `name` varchar(255) not null, `email` varchar(255) not null, `phone` varchar(255) null, `subject` varchar(255) null, `message` text not null, `is_read` tinyint(1) not null default '0', `created_at` timestamp null, `updated_at` timestamp null) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
create table `settings` (`id` bigint unsigned not null auto_increment primary key, `key` varchar(255) not null, `value` text null, `group` varchar(255) not null default 'general', `label` varchar(255) null, `type` varchar(255) not null default 'text', `created_at` timestamp null, `updated_at` timestamp null) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
alter table `settings` add unique `settings_key_unique`(`key`);
create table `digital_products` (`id` bigint unsigned not null auto_increment primary key, `category_id` bigint unsigned null, `title` varchar(255) not null, `slug` varchar(255) not null, `badge` varchar(255) null, `tagline` varchar(255) null, `description` text not null, `features` json null, `price` decimal(12, 2) not null default '0', `price_type` varchar(255) not null default 'one_time', `demo_url` varchar(255) null, `buy_url` varchar(255) null, `thumbnail` varchar(255) null, `is_featured` tinyint(1) not null default '0', `order` int not null default '0', `created_at` timestamp null, `updated_at` timestamp null) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
alter table `digital_products` add constraint `digital_products_category_id_foreign` foreign key (`category_id`) references `categories` (`id`) on delete set null;
alter table `digital_products` add unique `digital_products_slug_unique`(`slug`);
create table `trainings` (`id` bigint unsigned not null auto_increment primary key, `title` varchar(255) not null, `slug` varchar(255) not null, `level` varchar(255) not null default 'All Levels', `duration` varchar(255) null, `target_audience` varchar(255) null, `summary` text not null, `syllabus` json null, `price` decimal(12, 2) not null default '0', `thumbnail` varchar(255) null, `is_featured` tinyint(1) not null default '0', `order` int not null default '0', `created_at` timestamp null, `updated_at` timestamp null) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
alter table `trainings` add unique `trainings_slug_unique`(`slug`);
create table `galleries` (`id` bigint unsigned not null auto_increment primary key, `title` varchar(255) not null, `event_name` varchar(255) null, `location` varchar(255) null, `event_date` date null, `category` varchar(255) not null default 'workshop', `image_path` varchar(255) not null, `description` text null, `is_featured` tinyint(1) not null default '0', `order` int not null default '0', `created_at` timestamp null, `updated_at` timestamp null) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
create table `invoices` (`id` bigint unsigned not null auto_increment primary key, `invoice_number` varchar(255) not null, `invoice_date` date not null, `due_date` date null, `status` varchar(255) not null default 'paid', `client_type` varchar(255) not null default 'Personal', `client_name` varchar(255) not null, `client_attn` varchar(255) null, `client_address` text null, `items` json null, `total_amount` decimal(15, 2) not null default '0', `paid_amount` decimal(15, 2) not null default '0', `remaining_amount` decimal(15, 2) not null default '0', `transactions` json null, `notes` text null, `created_at` timestamp null, `updated_at` timestamp null) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
alter table `invoices` add unique `invoices_invoice_number_unique`(`invoice_number`);
alter table `users` add `avatar` varchar(255) null after `email`;
alter table `projects` add `features` json null after `solution`;
alter table `projects` add `app_type` varchar(50) not null default 'web' after `features`;
alter table `projects` add `status_badge` varchar(100) null after `app_type`;
alter table `invoices` add `client_email` varchar(255) null after `client_name`;
create table `visitor_logs` (`id` bigint unsigned not null auto_increment primary key, `ip_address` varchar(45) not null, `session_id` varchar(100) null, `device_type` varchar(20) not null default 'Desktop', `browser` varchar(50) not null default 'Chrome', `os` varchar(50) not null default 'Windows', `url` varchar(500) not null, `page_title` varchar(255) not null default 'Beranda', `referer` text null, `traffic_source` varchar(100) not null default 'Langsung (Direct)', `country` varchar(100) not null default 'Indonesia', `city` varchar(100) not null default 'Palembang', `user_agent` text null, `created_at` timestamp null, `updated_at` timestamp null) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
alter table `visitor_logs` add index `visitor_logs_created_at_index`(`created_at`);
alter table `visitor_logs` add index `visitor_logs_ip_address_index`(`ip_address`);
alter table `visitor_logs` add index `visitor_logs_session_id_index`(`session_id`);
alter table `visitor_logs` add index `visitor_logs_device_type_index`(`device_type`);
alter table `visitor_logs` add index `visitor_logs_traffic_source_index`(`traffic_source`);
create table `financial_records` (`id` bigint unsigned not null auto_increment primary key, `type` enum('income', 'expense') not null default 'expense', `category` varchar(255) not null default 'other', `title` varchar(255) not null, `amount` decimal(15, 2) not null default '0', `transaction_date` date not null, `payment_method` varchar(255) not null default 'Transfer Bank', `reference_number` varchar(255) null, `invoice_id` bigint unsigned null, `notes` text null, `receipt_path` varchar(255) null, `created_by` bigint unsigned null, `created_at` timestamp null, `updated_at` timestamp null) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
alter table `financial_records` add index `financial_records_type_index`(`type`);
alter table `financial_records` add index `financial_records_category_index`(`category`);
alter table `financial_records` add index `financial_records_transaction_date_index`(`transaction_date`);
create table `domain_renewals` (`id` bigint unsigned not null auto_increment primary key, `domain_name` varchar(255) not null, `provider` varchar(255) not null, `service_type` varchar(255) not null default 'domain', `registration_date` date null, `expiry_date` date not null, `renewal_price` decimal(15, 2) not null default '0', `currency` varchar(10) not null default 'IDR', `billing_cycle` varchar(255) not null default 'yearly', `auto_renew` tinyint(1) not null default '0', `nameservers` text null, `client_name` varchar(255) null, `client_whatsapp` varchar(255) null, `login_url` varchar(255) null, `status` varchar(255) not null default 'active', `notes` text null, `created_by` bigint unsigned null, `created_at` timestamp null, `updated_at` timestamp null) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
alter table `domain_renewals` add index `domain_renewals_expiry_date_index`(`expiry_date`);
alter table `domain_renewals` add index `domain_renewals_provider_index`(`provider`);
alter table `domain_renewals` add index `domain_renewals_service_type_index`(`service_type`);
alter table `domain_renewals` add index `domain_renewals_status_index`(`status`);
create table `cv_profiles` (`id` bigint unsigned not null auto_increment primary key, `full_name` varchar(255) not null default 'SEPTA RYAN HIDAYAT', `title` varchar(255) not null default 'Direktur Beranda Teknologi Digital & Founder SmartVerseID', `headline` varchar(255) not null default 'CEO | Founder & Software Architect | AI & Tech Educator', `email` varchar(255) not null default 'ryan@berandadigital.net', `phone` varchar(255) not null default '0852 6777 4878', `website_1` varchar(255) null default 'www.smartverse.id', `website_2` varchar(255) null default 'www.berandadigital.net', `github` varchar(255) null default 'github.com/septaryanhidayat', `social` varchar(255) null default '@septa_ryan', `city` varchar(255) null default 'Palembang, Sumatera Selatan', `avatar_path` varchar(255) null default '/images/smartverse/ryan-trainer-hero.webp', `about_me` longtext null, `affiliations` json null, `certifications` json null, `skills` json null, `stats` json null, `print_config` json null, `created_at` timestamp null, `updated_at` timestamp null) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
create table `cv_activities` (`id` bigint unsigned not null auto_increment primary key, `cv_profile_id` bigint unsigned not null default '1', `type` varchar(50) not null default 'speaker', `title` varchar(255) not null, `category` varchar(100) null, `organizer` varchar(255) null, `year` varchar(50) null, `event_date` date null, `location` varchar(255) null, `url` varchar(255) null, `description` longtext null, `flyer_path` varchar(255) null, `pdf_path` varchar(255) null, `is_featured` tinyint(1) not null default '1', `show_in_print` tinyint(1) not null default '1', `order` int not null default '0', `created_at` timestamp null, `updated_at` timestamp null) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
alter table `cv_activities` add index `cv_activities_cv_profile_id_type_order_index`(`cv_profile_id`, `type`, `order`);

-- --------------------------------------------------------
-- Data Dumping (DML)
-- --------------------------------------------------------
-- Dumping data for table `users` (3 rows)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`) VALUES
(1, 'Septa Ryan Hidayat', 'admin@berandadigital.net', NULL, '$2y$12$rXQdelPTaS0nh5TXXvCEg.4sjyP.j3cwI09CRA.jCnDz7IT4kQRHi', 'rWk4JgrNXBmHdLXFjt77DC3k020kZySkXxlK9qHvh6r4iYdopDHBXb1gYB9g', '2026-08-19 10:57:35', '2026-09-09 19:00:18', NULL),
(2, 'Admin BTD', 'info@berandadigital.net', NULL, '$2y$12$NB250se90qzUykOLnG//GuRy006OXsSY0rTuU.Hb/KnJz98jNDitO', 'G52qAk3LwxbZh5lpR1YG2IznHdgLJ5YCPTqoYhvEOTzhJu631AqRxafbtBkW', '2026-08-30 13:24:51', '2026-09-01 03:56:00', '/uploads/avatars/1788105011_oYWYrCqZ.webp'),
(3, 'Administrator SmartVerse', 'info@smartverse.id', NULL, '$2y$12$FJCT1RFFhCHeB4gGCWMsZuBrJ5N9hogQ3YLlsT1MrE7R41roO8l3e', NULL, '2026-09-09 19:00:25', '2026-09-09 19:00:25', NULL);

-- Dumping data for table `categories` (13 rows)
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

-- Dumping data for table `projects` (15 rows)
INSERT INTO `projects` (`id`, `category_id`, `title`, `slug`, `summary`, `challenge`, `solution`, `tech_stack`, `client_name`, `project_url`, `thumbnail`, `gallery`, `is_featured`, `order`, `created_at`, `updated_at`, `features`, `app_type`, `status_badge`) VALUES
(1, 1, 'Website Enterprise & Portal Company Profile', 'portal-layanan-pembuatan-website-enterprise', 'Solusi website korporat berkecepatan tinggi dengan desain modern bento grid, CMS fleksibel, dan optimasi SEO Google standar industri.', 'Kebutuhan website bisnis modern dengan desain cepat, optimasi kecepatan, dan keamanan data.', 'Arsitektur website Laravel 13 & PHP 8.4 terhubung dengan CMS admin instan dan integrasi WhatsApp.', '["Laravel 13","PHP 8.4","MySQL","Tailwind CSS","Alpine.js"]', 'CV. Beranda Teknologi Digital', 'https://berandadigital.net', '/images/products/enterprise-web-mockup.webp', '["\/preview\/screencapture-berandadigital-net-2026-08-19-17_31_05.png"]', 0, 1, '2026-08-19 10:57:35', '2026-10-09 12:00:10', NULL, 'web', NULL),
(2, 2, 'Portal Sekolah, E-Learning & PPDB Online Terpadu', 'jasa-pembuatan-aplikasi-mobile-android-ios', 'Sistem informasi akademik all-in-one untuk registrasi siswa baru (PPDB Online), pengumuman kelulusan, dan raport digital terintegrasi WhatsApp.', 'Pengembangan aplikasi mobile dua platform (Android & iOS) sering memakan waktu dan biaya tinggi.', 'Solusi Flutter tunggal terhubung ke backend Laravel dengan fitur offline-first dan geolokalasi.', '["Flutter","RESTful API","Laravel","Firebase FCM"]', 'Lembaga Pendidikan & Sekolah Mitra', 'https://berandadigital.net', '/images/products/school-portal-mockup.webp', '["\/preview\/screencapture-berandadigital-net-layanan-2026-08-19-17_52_22.png"]', 0, 2, '2026-08-19 10:57:35', '2026-10-09 12:00:17', NULL, 'web', NULL),
(3, 4, 'Sistem Informasi Desa Digital (Smart Village)', 'sistem-informasi-administrasi-surating-desa-digital', 'Platform digitalisasi desa untuk cetak mandiri 30+ surat resmi desa, otentikasi tanda tangan QR Code, dan database kependudukan terpadu.', 'Pelayanan pengurusan surat administrasi desa membutuhkan waktu lama karena pencatatan arsip fisik yang manual.', 'Beranda Teknologi Digital membangun portal web desa responsif terhubung dengan generator surat otomatis berbasis QR Code verifikasi.', '["Laravel 13","PHP 8.4","MySQL","Tailwind CSS"]', 'Pemerintah Desa Senuro Timur, Ogan Ilir', 'https://berandadigital.net', '/images/products/smart-village-mockup.webp', '["\/images\/surat.png","\/images\/ss-asalam.png"]', 0, 3, '2026-08-19 10:57:35', '2026-10-09 12:00:23', NULL, 'web', NULL),
(4, 1, 'Jasa Pembuatan Website & Campaign Digital Publik / Leader', 'jasa-pembuatan-website-campaign-digital', 'Platform portal informasi, video profil, dan campaign digital publik dengan sistem interaktif.', 'Membangun branding publik yang transparan dan cepat diakses oleh seluruh lapisan masyarakat.', 'Portal web responsif dengan integrasi galeri video, jadwal kegiatan, dan form aspirasi.', '["Laravel","Tailwind CSS","MySQL"]', 'Public Leader & Agency Partner', 'https://berandadigital.net', '/preview/screencapture-berandadigital-net-jasa-website-caleg-2026-08-19-17_54_34.webp', NULL, 0, 4, '2026-08-19 10:57:35', '2026-09-08 15:27:04', NULL, 'web', NULL),
(5, 4, 'Website SMAIT Ishlahul Ummah Prabumulih', 'website-smait-ishlahul-ummah-prabumulih', 'Website profil institusi pendidikan Islam terpadu dengan portal berita sekolah, data guru berprestasi, dan agenda kegiatan terpadu.', 'Kebutuhan media informasi resmi sekolah yang kredibel untuk publikasi prestasi dan pengumuman bagi orang tua siswa.', 'Beranda Digital merancang website responsif dan cepat dengan dashboard publikasi berita dan integrasi media sosial sekolah.', '["WordPress \/ Laravel","PHP","Tailwind CSS","MySQL"]', 'SMAIT Ishlahul Ummah Prabumulih', 'https://smaitishumpbm.sch.id', '/uploads/projects/1788232356_01WDK7Ti.webp', '[{"url":"\/uploads\/projects\/1788232355_V5LsQpKT.webp","title":"Screenshot 2026-09-01 101147","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788232355_fXZ65HqH.webp","title":"Screenshot 2026-09-01 101133","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788232355_rxSnA2Dq.webp","title":"Screenshot 2026-09-01 101106","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788232356_ZmwaQxcN.webp","title":"Screenshot 2026-09-01 101050","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788232356_PreElVsP.webp","title":"Screenshot 2026-09-01 101030","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788232356_2BrFaBZD.webp","title":"Screenshot 2026-09-01 101012","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788232356_vWVf1YrY.webp","title":"Screenshot 2026-09-01 100954","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788232356_8YKKZswN.webp","title":"Screenshot 2026-09-01 100930","type":"web","caption":"Screenshot Aplikasi"}]', 1, 3, '2026-08-30 12:10:32', '2026-10-09 12:02:14', '["Profil sekolah lengkap & struktur tenaga pengajar","Portal publikasi berita, artikel, dan galeri kegiatan","Desain modern, mobile-friendly, dan teroptimasi SEO"]', 'web', '🟢 Terimplementasi'),
(6, 11, 'Lembaga Sosial Dompet Sosial Robbani Peduli (DSRP)', 'website-dompet-sosial-robbani-peduli', 'Portal filantropi dan lembaga amil zakat untuk penyaluran bantuan, donasi online, dan laporan transparansi program sosial.', 'Memfasilitasi donatur untuk menyalurkan infaq, shadaqah, dan zakat secara digital dengan transparansi rekap dana.', 'Pengembangan portal donasi terintegrasi dengan penghitungan kalkulator zakat dan laporan audit bantuan.', '["Laravel","PHP","MySQL","Tailwind CSS"]', 'Dompet Sosial Robbani Peduli (DSRP)', 'https://dsrp.or.id', '/uploads/projects/1788233617_XoRcruMU.webp', '[{"url":"\/uploads\/projects\/1788233617_0CqXRNSt.webp","title":"Screenshot 2026-09-01 103143","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788233617_1me9Cc9m.webp","title":"Screenshot 2026-09-01 103111","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788233617_Uju2ueZh.webp","title":"Screenshot 2026-09-01 103100","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788233617_1jz4QRZR.webp","title":"Screenshot 2026-09-01 103043","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788233617_QhrOa9qO.webp","title":"Screenshot 2026-09-01 103014","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788233617_gfPyGSEl.webp","title":"Screenshot 2026-09-01 103001","type":"web","caption":"Screenshot Aplikasi"}]', 1, 1, '2026-08-30 12:10:32', '2026-10-09 12:01:24', '["Kalkulator zakat & kanal donasi program kemanusiaan","Laporan real-time perolehan dana & transparansi penyaluran","Integrasi notifikasi konfirmasi donasi via WhatsApp"]', 'web', '🟢 Terimplementasi'),
(7, 11, 'Toko Online robbanimart.com', 'website-toko-online-robbanimart', 'Platform toko online e-commerce minimarket syariah untuk penyediaan produk halal, kebutuhan harian, dan sembako terjangkau.', 'Digitalisasi katalog penjualan toko fisik agar anggota koperasi dan masyarakat dapat berbelanja secara daring.', 'Website e-commerce katalog produk dengan sistem keranjang belanja praktis dan konfirmasi pesanan via WhatsApp.', '["Laravel","MySQL","Tailwind CSS","WhatsApp API"]', 'KPSR Robbani', 'https://robbanimart.com', '/uploads/projects/1788233849_iOaPaVJD.webp', '[{"url":"\/uploads\/projects\/1788233849_2h99vYIg.webp","title":"Screenshot 2026-09-01 103618","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788233849_R9LBm6P1.webp","title":"Screenshot 2026-09-01 103600","type":"web","caption":"Screenshot Aplikasi"}]', 0, 0, '2026-08-30 12:10:32', '2026-09-01 03:40:33', '["Katalog produk halal terorganisir per kategori","Sistem keranjang belanja & hitung ongkos kirim instan","Checkout cepat terhubung langsung ke kasir WhatsApp"]', 'web', '🟢 Terimplementasi'),
(8, 11, 'Website PPDB SIT As Salaam Jayapura Papua', 'website-ppdb-sit-as-salaam-jayapura-papua', 'Sistem portal pendaftaran peserta didik baru (PPDB Online) multi-jenjang dari PAUD IT, SD IT, hingga SMP IT As Salaam Boarding School di Jayapura, Papua.', 'Pendaftaran calon siswa baru dari berbagai distrik di Papua membutuhkan sistem online yang mudah diakses tanpa kendala jaringan.', 'Aplikasi web PPDB mandiri dengan alur bertahap, upload berkas persyaratan, dan cetak bukti registrasi PDF otomatis.', '["Laravel","PHP","MySQL","PDF Engine"]', 'Yayasan As-Salam Papua (Jayapura)', 'https://ppdb.sit-assalaamjayapura.sch.id/', '/uploads/projects/1788233986_PMwz4EBr.webp', '[{"url":"\/uploads\/projects\/1788233985_8iG8KUjV.webp","title":"Screenshot 2026-09-01 103905","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788233985_mhjwxmfU.webp","title":"Screenshot 2026-09-01 103845","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788233985_0AHT1GQD.webp","title":"Screenshot 2026-09-01 103832","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788233986_OclqZbcu.webp","title":"Screenshot 2026-09-01 103817","type":"web","caption":"Screenshot Aplikasi"}]', 1, 4, '2026-08-30 12:10:32', '2026-10-09 12:02:21', '["Multi-jenjang: PAUD IT, SD IT, dan SMP IT Boarding School","Pendaftaran gelombang online dengan verifikasi administrasi","Cetak nomor ujian dan kartu pendaftaran resmi ber-barcode"]', 'web', '🟢 Terimplementasi'),
(9, 11, 'Website Kampus Sehat Universitas Sriwijaya', 'website-kampus-sehat-universitas-sriwijaya', 'Portal program edukasi kesehatan kampus dan inisiatif Germas bagi sivitas akademika Universitas Sriwijaya.', 'Sosialisasi program kesehatan, perilaku hidup sehat, dan publikasi agenda rektorat bidang kesehatan mahasiswa.', 'Website portal resmi Kampus Sehat Unsri dengan sambutan rektorat, artikel gizi/kesehatan, dan info layanan klinik.', '["Laravel","MySQL","Tailwind CSS"]', 'Universitas Sriwijaya (Unsri)', 'https://berandadigital.net', '/uploads/projects/1788234333_S5hHH4sS.webp', '[{"url":"\/uploads\/projects\/1788234332_v9W02GC4.webp","title":"Screenshot 2026-09-01 104435","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788234332_CSM5UuT8.webp","title":"Screenshot 2026-09-01 104422","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788234332_wqjnOaOu.webp","title":"Screenshot 2026-09-01 104409","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788234333_9shtMdPo.webp","title":"Screenshot 2026-09-01 104349","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788234333_g4J7ea8t.webp","title":"Screenshot 2026-09-01 104331","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788234333_c1EWgk9y.webp","title":"Screenshot 2026-09-01 104307","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788234333_lbKcXI1Y.webp","title":"Screenshot 2026-09-01 104251","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788234333_a3X1X0Bl.webp","title":"Screenshot 2026-09-01 104237","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788234333_fpJZfDzq.webp","title":"Screenshot 2026-09-01 104224","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788234333_WSG9g0EE.webp","title":"Screenshot 2026-09-01 104208","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788234333_SZ70I8JG.webp","title":"Screenshot 2026-09-01 104149","type":"web","caption":"Screenshot Aplikasi"},{"url":"\/uploads\/projects\/1788234333_K3qDztsq.webp","title":"Screenshot 2026-09-01 104110","type":"web","caption":"Screenshot Aplikasi"}]', 1, 0, '2026-08-30 12:10:32', '2026-09-01 03:45:33', '["Sambutan pimpinan rektorat & panduan gaya hidup sehat","Koleksi artikel kesehatan, video edukasi, dan webinar","Direktori layanan fasilitas kesehatan kampus Unsri"]', 'web', '🟢 Terimplementasi'),
(10, 11, 'Website Ikatan Guru Indonesia (IGI) Ogan Ilir', 'website-ikatan-guru-indonesia-ogan-ilir', 'Portal organisasi resmi Ikatan Guru Indonesia daerah Ogan Ilir untuk pendaftaran anggota guru dan publikasi workshop peningkatan kompetensi.', 'Pendataan anggota guru di seluruh kecamatan dan penyebaran informasi sertifikasi serta pelatihan IT pendidik.', 'Website organisasi guru dengan sistem pendaftaran keanggotaan, agenda seminar pendidikan, dan unduh sertifikat.', '["Laravel","MySQL","Tailwind CSS"]', 'IGI Ogan Ilir', 'https://berandadigital.net', '/images/portofolio-web-1.webp', '[{"url":"\/images\/portofolio-web-1.webp","title":"Portal Informasi IGI Ogan Ilir","type":"web","caption":"Publikasi kegiatan guru dan workshop pendidikan"}]', 0, 10, '2026-08-30 12:10:32', '2026-08-30 12:10:32', '["Pendaftaran dan validasi kartu tanda anggota (KTA) digital","Informasi agenda seminar, workshop IT & pelatihan kurikulum","Galeri dokumentasi kegiatan guru se-Kabupaten Ogan Ilir"]', 'web', '🟢 Terimplementasi'),
(11, 12, 'Aplikasi Mobile Absensi Pegawai (Siabs BTD)', 'aplikasi-mobile-absensi-pegawai-siabs', 'Aplikasi mobile Android untuk pencatatan kehadiran karyawan berbasis jam kerja nyata, deteksi waktu presisi, dan rekapan kehadiran bulanan.', 'Pencatatan absensi manual sering rentan manipulasi dan menyulitkan rekapitulasi penggajian HRD.', 'Aplikasi Android native/Flutter dengan tombol one-tap absen masuk & absen pulang serta dashboard rekap status bulanan.', '["Flutter","Android Native","REST API","MySQL"]', 'CV. Beranda Teknologi Digital & Mitra Bisnis', 'https://berandadigital.net', '/images/products/enterprise-web-mockup.webp', '[{"url":"\/images\/products\/enterprise-web-mockup.webp","title":"Antarmuka Siabs Mobile App","type":"mobile","caption":"Tampilan tombol absen masuk, absen pulang, dan indikator kehadiran"}]', 0, 11, '2026-08-30 12:10:32', '2026-09-08 15:27:04', '["Absen masuk & absen pulang cepat dalam hitungan detik","Rekapitulasi bulanan: jumlah Hadir, Izin, Sakit, dan Terlambat","Riwayat log absensi realtime tersinkronisasi ke database"]', 'mobile', '📱 Mobile App'),
(12, 12, 'Aplikasi Mobile ARSI App (Robbani Student Info)', 'aplikasi-mobile-arsi-student-information', 'Aplikasi mobile Android untuk portal informasi siswa, jadwal kelas, tabungan siswa, dan pembayaran SPP sekolah secara digital.', 'Orang tua siswa kesulitan memantau perkembangan nilai, absensi, dan tagihan SPP anak di sekolah.', 'Aplikasi mobile terpadu dengan autentikasi akun wali murid, notifikasi tagihan SPP, dan rincian tabungan sekolah.', '["Flutter \/ Android","PHP Backend","MySQL"]', 'SIT Robbani Ogan Ilir', 'https://berandadigital.net', '/btd/sekolah.webp', '[{"url":"\/btd\/sekolah.webp","title":"Tampilan Menu Utama ARSI App","type":"mobile","caption":"Menu pembayaran SPP, tabungan, jadwal dan presensi siswa"}]', 0, 5, '2026-08-30 12:10:32', '2026-10-09 12:02:00', '["Informasi jadwal pelajaran & kalender akademik terpadu","Cek status pembayaran SPP bulanan & riwayat transaksi","Modul pemantauan saldo tabungan siswa di sekolah"]', 'mobile', '📱 Mobile App'),
(13, 12, 'Aplikasi Mobile Pembelajaran Penjas (Bola Voli)', 'aplikasi-mobile-pembelajaran-penjas-voli', 'Aplikasi mobile Android interaktif untuk media pembelajaran dan instrumen pengukuran teknik passing atas & passing bawah olahraga bola voli.', 'Pembelajaran gerak dan tes kemampuan olahraga membutuhkan panduan visual serta instrumen hitung skor yang baku.', 'Aplikasi Android berbasis multimedia interaktif dengan modul panduan gerakan, petunjuk pengukuran, dan kalkulator skor tes.', '["Android Native \/ Flutter","SQLite","Multimedia"]', 'Dosen & Tim Penjas Universitas Sriwijaya', 'https://berandadigital.net', '/images/volley.webp', '[{"url":"\/images\/volley.webp","title":"Menu Pengukuran Passing Olahraga Bola Voli","type":"mobile","caption":"Instrumen pengukuran passing atas dan passing bawah voli"}]', 1, 2, '2026-08-30 12:10:32', '2026-10-09 12:01:33', '["Modul instruksi teknik passing atas dan passing bawah voli","Instrumen tes digital dengan penghitungan skor terstandar","Buku pedoman guru dan instrumen penilaian siswa otomatis"]', 'mobile', '📱 Mobile App'),
(14, 13, 'Sistem Informasi E-Klinik & Rekam Medis (EMR)', 'sistem-informasi-e-klinik-rekam-medis', 'Sistem informasi manajemen klinik terintegrasi untuk pendaftaran pasien online, jadwal praktek dokter, rekam medis elektronik (EMR), dan payment gateway QRIS.', 'Manajemen antrean pasien klinik dan peralihan dari rekam medis kertas menuju standar Rekam Medis Elektronik (RME) Kementerian Kesehatan.', 'Sistem E-Klinik modular lengkap dengan portal pasien, integrasi rekam medis dokter, kasir apotek, dan laporan pendapatan.', '["Laravel 13","MySQL","Tailwind CSS","Payment Gateway"]', 'Fasilitas Kesehatan & Klinik Mitra', 'https://berandadigital.net', '/images/Portofolio-sim.webp', '[{"url":"\/images\/Portofolio-sim.webp","title":"Dashboard Pelayanan Poliklinik & Rawat Inap","type":"web","caption":"Pilihan poli klinik, UGD, dan monitoring pasien"}]', 0, 14, '2026-08-30 12:10:32', '2026-08-30 12:10:32', '["Booking jadwal dokter online & antrean poli terpadu","Rekam Medis Elektronik (EMR \/ RME) terstandar Kemenkes","Integrasi kasir pembayaran digital QRIS, VA, dan e-wallet","Laporan inventori obat apotek & analitik kunjungan pasien"]', 'web', '🏥 Solusi E-Klinik'),
(15, 13, 'Pengembangan Media Virtual Reality (VR) & Augmented Reality', 'virtual-reality-augmented-reality-learning', 'Solusi media imersif berbasis Virtual Reality (VR) dan Augmented Reality (AR) untuk simulasi praktikum, edukasi visual, dan promosi 3D interaktif.', 'Pembelajaran sains dan simulasi peralatan mahal sulit dilakukan tanpa laboratorium fisik canggih.', 'Aplikasi simulasi 3D dan virtual reality yang dapat dijalankan melalui headset VR maupun smartphone.', '["Unity 3D","WebXR","Blender","C#"]', 'Lembaga Pendidikan & Mitra Riset', 'https://berandadigital.net', '/btd/VR.webp', '[{"url":"\/btd\/VR.webp","title":"Simulasi Interaktif Virtual Reality","type":"web","caption":"Pengembangan konten 3D interaktif dan simulasi imersif"}]', 0, 15, '2026-08-30 12:10:32', '2026-09-08 15:27:04', '["Simulasi objek 3D interaktif 360 derajat","Kompatibel dengan headset VR dan mobile smartphone","Meningkatkan retensi pemahaman belajar hingga 80%"]', 'web', '🥽 Immersive Tech');

-- Dumping data for table `posts` (13 rows)
INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `thumbnail`, `excerpt`, `body`, `status`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 'Webinar Online : Masjid Go Digital', 'webinar-masjid-go-digital-6a858c1f6b1a7', '/images/Masjid-GO-1.webp', '
Assalamualaikum Warahmatullah,



Beranda Teknologi Digital proudly present :

...', '<!-- wp:paragraph -->
<p>Assalamualaikum Warahmatullah,</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Beranda Teknologi Digital proudly present :</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>MASJID GO DIGITAL : Pelatihan Online Pembuatan Website Masjid Gratis!</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Agenda ini terbuka untuk masyarakat Umum dan bersifat <strong>GRATIS</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Catat informasi pentingnya :<br>Hari/Tanggal : Sabtu, 23 April 2022<br>Pukul : 09.00 WIB s/d selesai<br>Media : Grup Telegram dan Zoom Meeting</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Link Pendaftaran : <a href="http://s.id/MasjidGoDigital" target="_blank" aria-label="undefined (opens in a new tab)" rel="noreferrer noopener">s.id/MasjidGoDigital</a></strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Kami tunggu kehadiran Anda.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Terimakasih</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>__________________<br>Informasi lebih lanjut :<br>email : bteknologi.digital@gmail.com<br>instagram :&nbsp;<a href="https://www.instagram.com/bteknologi.digital/">@bteknologi.digital</a><br>WhatsApp : 0811 7448 447</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>www.berandadigital.net</strong></p>
<!-- /wp:paragraph -->', 'published', '2022-04-13 03:33:04', '2026-08-19 10:57:35', '2026-09-08 15:27:03'),
(2, 10, 1, 'Augmented Reality for Education', 'augmentedreality-6a858c1f6bfc7', '/images/WhatsApp-Image-2022-08-30-at-08.46.40.webp', '
Terbuka untuk Umum 🔊



Augmented Reality for Education


...', '<!-- wp:paragraph -->
<p>Terbuka untuk Umum 🔊</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Augmented Reality for Education</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Hallo Sobat Ralenta dimanapun kalian berada 📸</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ralenta Learning Center kali ini akan mengadakan Pelatihan Pembuatan Media Pembelajaran menggunakan "Augmented Reality "</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Nah disini kita akan mempelajari cara membuat Media Pembelajaran yang dapat menggabungkan benda maya dua dimensi dan ataupun tiga dimensi ke dalam sebuah<br>lingkungan nyata lalu memproyeksikan benda-benda maya tersebut secara realitas dalam waktu nyata.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Dengan mengikuti Pelatihan ini, kamu tidak perlu mengeluarkan uang sampai Jutaan loh 😱</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Hanya dengan Rp. 100.000 (Offline) dan Rp. 75.000 (Online) saja kamu sudah bisa mendapatkan ilmu esklusif langsung dari Pemateri, Sertifikat, Snack, dan juga Bonus berupa :</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><li>Video Tutorial tentang AR</li><li>Template PPT untuk Media Pembelajaran</li><li>Free Konsultasi selama 3 hari bersama pembicara</li></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>🧑🏻‍🏫 Pembicara :<br>Septa Ryan Hidayat</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><li>Project Manager CV. Beranda Teknologi Digital</li><li>Web &amp; Android Delevoper</li><li>Trainer Nasional RLC</li></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>📆 Sabtu, 10 September 2022<br>⏰ 08.30 - 11.30<br>🏠 Aula SD IT Robbani Ogan Ilir (offline)<br>💻 Zoom (Online)</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Pendaftaran :<br></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Kuota Terbatas Loh, jangan lewatkan kesempatan Emas ini 😱</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ada pertanyaan ? Chat mimin aja yaa<br><a href="http://wa.me/628117448480" data-type="URL" data-id="wa.me/628117448480" target="_blank" rel="noreferrer noopener">wa.me/628117448480</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Presented by Ralenta Learning Center</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Suported by :</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><li>CV. Beranda Teknologi Digital</li><li>SIT Robbani Ogan Ilir</li></ul>
<!-- /wp:list -->', 'published', '2022-09-05 02:45:35', '2026-08-19 10:57:35', '2026-09-08 15:27:03'),
(3, 8, 1, 'Perpanjangan Pendaftaran Augmented Reality for Education', 'perpanjangan-pendaftaran-augmented-reality-for-education-6a858c1f6cc0d', '/images/Flyer-AR-New-1-scaled.webp', '
Perpanjangan Pendaftaran....



Pelatihan diubah menjadi hari Sabtu, 17 September 2022...', '<!-- wp:paragraph -->
<p>Perpanjangan Pendaftaran....</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Pelatihan diubah menjadi hari <strong>Sabtu, 17 September 2022</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ralenta Learning Center kali ini akan mengadakan <em>Pelatihan Pembuatan Media Pembelajaran menggunakan "Augmented Reality "</em></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Nah disini kita akan mempelajari cara membuat Media Pembelajaran yang dapat menggabungkan benda maya dua dimensi dan ataupun tiga dimensi ke dalam sebuah<br />lingkungan nyata lalu memproyeksikan benda-benda maya tersebut secara realitas dalam waktu nyata.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Dengan mengikuti Pelatihan ini, kamu tidak perlu mengeluarkan uang sampai Jutaan loh 😱</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Hanya dengan Rp. 100.000 (Offline) dan Rp. 75.000 (Online) saja kamu sudah bisa mendapatkan ilmu esklusif langsung dari Pemateri, Sertifikat, Snack, dan juga Bonus berupa :</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul>
<li>Video Tutorial tentang AR</li>
<li>Template PPT untuk Media Pembelajaran</li>
<li>Free Konsultasi selama 3 hari bersama pembicara</li>
</ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>🧑🏻‍🏫 Pembicara :<br />Septa Ryan Hidayat</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul>
<li>Project Manager CV. Beranda Teknologi Digital</li>
<li>Web &amp; Android Delevoper</li>
<li>Trainer Nasional RLC</li>
</ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>📆 Sabtu, 17 September 2022<br />⏰ 08.30 - 11.30<br />🏠 Aula SD IT Robbani Ogan Ilir (offline)<br />💻 Zoom (Online)</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Pendaftaran :<br /></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Kuota Terbatas Loh, jangan lewatkan kesempatan Emas ini 😱</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ada pertanyaan ? Chat mimin aja yaa<br /><a href="http://wa.me/628117448480" target="_blank" rel="noreferrer noopener" data-type="URL" data-id="wa.me/628117448480">wa.me/628117448480</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Presented by Ralenta Learning Center</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Suported by :</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul>
<li>CV. Beranda Teknologi Digital</li>
<li>SIT Robbani Ogan Ilir</li>
</ul>
<!-- /wp:list -->', 'published', '2022-09-13 04:56:07', '2026-08-19 10:57:35', '2026-09-08 15:27:03'),
(4, 10, 1, 'Mari Ikuti Training for Trainer "Coding for Kids" Tahun 2023', 'tft-codingforkids2023-6a858c1f6d80b', '/images/Flyer-Coding-for-Kids-3.webp', '...', '<img class="aligncenter wp-image-2582 size-large" src="http://berandadigital.net/wp-content/uploads/2023/06/Flyer-Coding-for-Kids-3-1024x1024.png" alt="" width="1024" height="1024" />

Di era digital saat ini, Coding memiliki pengaruh besar di masa depan, bahkan banyak jenis pekerjaan yang baru yang membutuhkan kemampuan coding.

Mengenalkan dasar coding yang mudah dipelajari oleh anak-anak sehingga mereka mampu untuk membuat membuat karya digital berupa story, animasi, hingga game.

<strong>Beranda Teknologi Digital</strong> bekerjasama dengan <strong>SIT Robbani Ogan Ilir</strong> mengadakan :

<strong>Training for Trainer</strong>
<strong>"Coding for Kids 2023"</strong>
<em>Pelatihan Coding for Kids Gratis untuk Guru SIT Robbani Ogan Ilir</em>

<strong>Apa yang akan di pelajari pada materi ini ?</strong>
1️⃣ Apa itu Coding
2️⃣ Coding untuk Tenaga Pengajar
3️⃣ Praktik Penggunaan Program Coding for Kids

<strong>Siapa Pemateri dalam Kegiatan ini ?</strong>
🧑🏻‍🏫 Septa Ryan Hidayat
▶️ Project Manager CV Beranda Teknologi Digital
▶️ Software Engineer

<strong>Kapan Pelaksanaannya?</strong>
📆 Sabtu, 5 Agustus 2023
🕗 08.00 - 12.00 WIB
🛜 Aula SIT Robbani Ogan Ilir

<strong>🔊 Coming Soon</strong>
Kelas terbuka untuk Umum Training for Trainer Coding For Kids (Offline dan Online)

▶️ Pelaksanaan Bulan September
▶️ Investasi hanya 149k
▶️ Fasilitas Sertifikat, Modul Pembelajaran, etc

Ayo Booking Seat dari Sekarang juga
<strong>Kuota Terbatas !!!</strong>

Konsultasi Gratis, hubungi kami ⬇️
Pusat Informasi:
▶️ WhatsApp : 082373222040
▶️ Email : info@berandadigital.net', 'published', '2023-06-27 11:11:59', '2026-08-19 10:57:35', '2026-09-08 15:27:03'),
(5, 8, 1, 'Pelatihan Coding for Kids, belajar Coding mudah dan menyenangkan', 'coding4kids2023-6a858c1f6e3ce', '/images/FlyerCoding-for-Kids2023-scaled.webp', '...', '<img class="aligncenter wp-image-2612 size-full" src="http://berandadigital.net/wp-content/uploads/2023/09/FlyerCoding-for-Kids2023-scaled.jpg" alt="" width="2048" height="2048" />

Undangan Mengikuti Pelatihan Coding for Kids 2023

Hello Sobat Ralenta! Mari tingkatkan skill digital kamu dengan belajar coding yang mudah dan menyenangjan bersama Ralenta Learning Center

🗓️ Schedule :
Pendaftaran : 29 Agustus - 15 September 2023
Training : 16 September 2023

Narasumber:
🧑🏻‍🏫 Septa Ryan Hidayat
▶️ Project Manager CV Beranda Teknologi Digital
▶️ Software Engineer
▶️ Trainer RLC

Kapan Pelaksanaan?
📆 Sabtu, 16 September 2023
🕗 08.00 - 11.30 WIB
🛜 Aula SIT Robbani Ogan Ilir

📌 Syarat dan Ketentuan :
1. Mengisi form pendaftran pada link s.id/coding4kids-rlc
2. Membayar biaya pendafaran senilai Rp. 149. 000
3. Konfirmasi ke WhatsApp 082181898916

✨ Benefit:
1. Sertifikat
2. Ilmu yang bermanfaat
3. Snack
4. Belajar Coding Mudah dan Menyenangkan
5. Ruang Training ber-AC
6. Networking
7. Reward untuk peserta terbaik

Ayo Booking Seat dari Sekarang juga
KUOTA TERBATAS hanya untuk 30 orang!
-----------------------------------------------
Info lebih lanjut hubungi nomor berikut 082181898916 (Admin RLC)

#codingforkids
#pelatihancodingmudah
#semuabisacoding', 'published', '2023-09-01 14:19:51', '2026-08-19 10:57:35', '2026-09-08 15:27:03'),
(6, 10, 1, 'Pelatihan Website Desa dan Aplikasi Administrasi Surat Sesa Senuro Timur', 'pelatihan-website-desa-dan-aplikasi-administrasi-surat-sesa-senuro-timur-6a858c1f6f0ec', '/images/495965916_995856726093998_1582227333173346053_n.webp', '
Telah dilaksanakan Pelatihan Website Desa dan Aplikasi Administrasi S...', '<div class="xdj266r x14z9mp xat24cr x1lziwak x1vvkbs x126k92a">
<div dir="auto"><span style="font-size: 16px;">Telah dilaksanakan Pelatihan Website Desa dan Aplikasi Administrasi Surat Desa Senuro Timur Kab. Ogan Ilir pada hari Rabu, 07 Mei 2025. Pertemuan ini dihadiri oleh Kepala Desa, Pendamping Desa dan Operator Desa yang akan mengelola Website Desa dan Aplikasi Administrasi Surat Desa.</span></div>
</div>
<div class="x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a">
<div dir="auto">Harapannya Website dan Aplikasi yang Beranda Teknologi Digital telah buat dapat dipergunakan dengan maksimal agar terciptanya layanan dan informasi Desa berbasis Digital.</div>
</div>
<div class="x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a">
<div dir="auto"><span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/websitedesa?__eep__=6&amp;__cft__[0]=AZYXWTE31wqBSh-iX6QPLKCx0frm2MDDJK-PXfWBKn0xH5nK5mFKW0IOkZzi583N4e6TfGmJFOk3yDYn5r6lxuEsBP1fkGgmUd6iph3zW_7Ylp4kmPPgfLNUXHVWtQIuFM_DZ2eXxVw9jKhkHiz6O9b1BoTD6m8SmzybWkCPJhWMgR55_Q2aS3WdcdWiio-N9bI&amp;__tn__=*NK-R">#websitedesa</a></span></div>
<div dir="auto"><span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/berandateknologidigital?__eep__=6&amp;__cft__[0]=AZYXWTE31wqBSh-iX6QPLKCx0frm2MDDJK-PXfWBKn0xH5nK5mFKW0IOkZzi583N4e6TfGmJFOk3yDYn5r6lxuEsBP1fkGgmUd6iph3zW_7Ylp4kmPPgfLNUXHVWtQIuFM_DZ2eXxVw9jKhkHiz6O9b1BoTD6m8SmzybWkCPJhWMgR55_Q2aS3WdcdWiio-N9bI&amp;__tn__=*NK-R">#berandateknologidigital</a></span></div>
</div>', 'published', '2025-05-08 10:26:55', '2026-08-19 10:57:35', '2026-09-08 15:27:03'),
(7, 8, 1, 'Menciptakan Chatbot AI Sederhana dan Personal dengan Phyton: Tanpa API OpenAI, Sesuai Kebutuhan', 'menciptakan-chatbot-ai-sederhana-dan-personal-dengan-phyton-tanpa-api-openai-sesuai-kebutuhan-6a858c1f6fd0e', '/images/486603910_961047622908242_7404185485069841584_n.webp', 'Apakah Bapak dan ibu tertarik untuk membuat chatbot AI yang dapat menjawab pertanyaan sesuai kebutuhan spesifik Bapak dan ibu, tanpa bergantung pada API eksternal seperti OpenAI?...', 'Apakah Bapak dan ibu tertarik untuk membuat chatbot AI yang dapat menjawab pertanyaan sesuai kebutuhan spesifik Bapak dan ibu, tanpa bergantung pada API eksternal seperti OpenAI?<br class="html-br" />Ini kesempatan bagi Bapak dan ibu!<br class="html-br" /><br class="html-br" />Ikuti Workshop Online intensif dari IGI Kabupaten Ogan Ilir, bekerjasama dengan Beranda Teknologi Digital:<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t5c/1/16/1f5d3.png" alt="🗓" width="16" height="16" /></span> Tanggal: 17-19 Februari 2025<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t34/1/16/23f0.png" alt="⏰" width="16" height="16" /></span> Waktu: 19:00 WIB<br class="html-br" />Klik untuk mendaftar: <span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f" tabindex="0" role="link" href="https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2FChatbotIGIOI%3Ffbclid%3DIwZXh0bgNhZW0CMTAAYnJpZBExUGk3TW9BS1Zwd1paNVROZ3NydGMGYXBwX2lkEDIyMjAzOTE3ODgyMDA4OTIAAR7DN3IGTtLxqmNeck2LPvjywWfXkVs32OTkzZpCGEwQ7JPQZwEp3k5JklsSJA_aem_nhkESo_24GSHSqOFNbIUlg&amp;h=AT66RBQCCqjZa0N0gKRnkexB13synld9dYTBwXRxMQOHgUWDeMTyCSTO5JtutsYqhjbBTCn9SvIWVjTmgJrW85anOsC2XWIjba_NFSrccb-4fZjBnqIVtR89Oo11D8b0tHQvJFO95SuP6VycCW-y6IStbpTipw&amp;__tn__=-UK*F&amp;c[0]=AT7W_veyLyAIA2cmnU-IbTNcsu3CYgWG8IuyvtmjdhEU2KoAKQCBUDP9LLQUZ1POSReZR_RDl4yfwyxpIC5hmxBd1oAFZcCVImoyGzvWSFripzAql2q2M9La6lKps-mhW4vo0yNJsf_zZvrM6YKG--a5o2D2Po60rPuGd4RmR_P4X9g7dEFL6BXiYIUmec2xaglePFNwIiFCo44niykvl22a" target="_blank" rel="nofollow noopener noreferrer">https://bit.ly/ChatbotIGIOI</a></span><br class="html-br" />Biaya Pendaftaran<br class="html-br" />Anggota IGI= Rp. 50.000<br class="html-br" />Umum=Rp.100.000<br class="html-br" /><br class="html-br" />Rekening:<br class="html-br" />17101000722<br class="html-br" />BSB an. Septy Liana<br class="html-br" /><br class="html-br" />Fasilitas Peserta:<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png" alt="✔" width="16" height="16" /></span>E-Sertifikat 32 JP<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png" alt="✔" width="16" height="16" /></span>Materi Lengkap<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png" alt="✔" width="16" height="16" /></span>Pendampingan Intensif<br class="html-br" /><br class="html-br" />Gabung di pelatihan eksklusif ini dan pelajari cara membangun "chatbot AI mandiri" yang dapat disesuaikan dengan topik dan bidang yang Bapak dan ibu pilih! Bapak dan ibu bisa mengontrol sepenuhnya nama, data, dan jawaban chatbot Bapak dan ibu, tanpa harus menggunakan API berbayar atau platform eksternal.<br class="html-br" /><br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/tad/1/16/1f511.png" alt="🔑" width="16" height="16" /></span> Apa yang akan Bapak dan ibu pelajari?<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png" alt="✔️" width="16" height="16" /></span> Pengenalan Chatbot AI dan penerapannya di berbagai bidang<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png" alt="✔️" width="16" height="16" /></span> Cara membangun chatbot mandiri tanpa menggunakan API eksternal<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png" alt="✔️" width="16" height="16" /></span> Kustomisasi database pertanyaan dan jawaban sesuai topik<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png" alt="✔️" width="16" height="16" /></span> Teknik dan tools pengembangan chatbot yang efisien dan bebas biaya<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png" alt="✔️" width="16" height="16" /></span> Implementasi dan pengujian untuk memastikan kualitas jawaban yang akurat dan responsif<br class="html-br" /><br class="html-br" />Pelatihan ini akan dipandu langsung oleh Bapak Septa Ryan Hidayat, Software Engineer dan Project Manager di <span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f" tabindex="0" role="link" href="https://l.facebook.com/l.php?u=http%3A%2F%2Fberandadigital.net%2F%3Ffbclid%3DIwZXh0bgNhZW0CMTAAYnJpZBExUGk3TW9BS1Zwd1paNVROZ3NydGMGYXBwX2lkEDIyMjAzOTE3ODgyMDA4OTIAAR6ojz4XsnlBOo0VkruySq206j5s0LO_PMA0V3DAeyY00NgLI6h66X44CsUGXw_aem_jzvTZ2QQWP2j65w-X7D44g&amp;h=AT7BJBhIo_LG3hNo0pp-hC-1aUWZ1P9BiZ5XxGgrun7SUSOT_TdULLkWSN27sfDbof_gaoDeYe9BfQcuwCo1u-yFpRBJ-DQqGvL0BVZPBxmFnxOCSKfpS5ibGPJWfcoEiQQkxaLiZKDgmEgJQFto0AiFdc5imQ&amp;__tn__=-UK*F&amp;c[0]=AT7W_veyLyAIA2cmnU-IbTNcsu3CYgWG8IuyvtmjdhEU2KoAKQCBUDP9LLQUZ1POSReZR_RDl4yfwyxpIC5hmxBd1oAFZcCVImoyGzvWSFripzAql2q2M9La6lKps-mhW4vo0yNJsf_zZvrM6YKG--a5o2D2Po60rPuGd4RmR_P4X9g7dEFL6BXiYIUmec2xaglePFNwIiFCo44niykvl22a" target="_blank" rel="nofollow noopener noreferrer">berandadigital.net.</a></span><br class="html-br" /><br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/te0/1/16/1f31f.png" alt="🌟" width="16" height="16" /></span> Jangan lewatkan kesempatan ini untuk mengeksplorasi teknologi AI dengan cara yang baru dan inovatif!<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png" alt="👉" width="16" height="16" /></span> Daftar sekarang dan siapkan diri untuk belajar cara menciptakan chatbot AI yang sepenuhnya personal! <span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f" tabindex="0" role="link" href="https://bit.ly/ChatbotIGIOI?fbclid=IwZXh0bgNhZW0CMTAAYnJpZBExUGk3TW9BS1Zwd1paNVROZ3NydGMGYXBwX2lkEDIyMjAzOTE3ODgyMDA4OTIAAR5qjt38xr6EiHmfOBWQcE3HDjVnr4fcbD4mwiHG9g3QWEl2VREOJreF9x9b3A_aem_PIcGE7uqnDmbJEYUcrej5g" target="_blank" rel="nofollow noopener noreferrer">https://bit.ly/ChatbotIGIOI</a></span><br class="html-br" /><br class="html-br" /><span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xzsf02u x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/chatbotai?__eep__=6&amp;__cft__[0]=AZYz2oYrLeujvDNSvKYn5oKFoHgUqsTA7UsP3-ELjT2yTA0T2XmliW_GdWVbPXe-XoY8LVR_xSWA1Ce9ry6vtgq1POhLbV1yAOnjgxhT4Wx98K_IhyoGpgAyyFq_ktBjVwgF3SML9eVnxJ87QoqaD4o2BVPNKZ7RAgDC4C-yByUKDdUgxDLNqFnkLMT5P2frdaY&amp;__tn__=*NK*F">#ChatbotAI</a></span> <span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xzsf02u x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/pelatihanai?__eep__=6&amp;__cft__[0]=AZYz2oYrLeujvDNSvKYn5oKFoHgUqsTA7UsP3-ELjT2yTA0T2XmliW_GdWVbPXe-XoY8LVR_xSWA1Ce9ry6vtgq1POhLbV1yAOnjgxhT4Wx98K_IhyoGpgAyyFq_ktBjVwgF3SML9eVnxJ87QoqaD4o2BVPNKZ7RAgDC4C-yByUKDdUgxDLNqFnkLMT5P2frdaY&amp;__tn__=*NK*F">#PelatihanAI</a></span> <span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xzsf02u x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/teknologi?__eep__=6&amp;__cft__[0]=AZYz2oYrLeujvDNSvKYn5oKFoHgUqsTA7UsP3-ELjT2yTA0T2XmliW_GdWVbPXe-XoY8LVR_xSWA1Ce9ry6vtgq1POhLbV1yAOnjgxhT4Wx98K_IhyoGpgAyyFq_ktBjVwgF3SML9eVnxJ87QoqaD4o2BVPNKZ7RAgDC4C-yByUKDdUgxDLNqFnkLMT5P2frdaY&amp;__tn__=*NK*F">#Teknologi</a></span> <span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xzsf02u x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/pengembanganchatbot?__eep__=6&amp;__cft__[0]=AZYz2oYrLeujvDNSvKYn5oKFoHgUqsTA7UsP3-ELjT2yTA0T2XmliW_GdWVbPXe-XoY8LVR_xSWA1Ce9ry6vtgq1POhLbV1yAOnjgxhT4Wx98K_IhyoGpgAyyFq_ktBjVwgF3SML9eVnxJ87QoqaD4o2BVPNKZ7RAgDC4C-yByUKDdUgxDLNqFnkLMT5P2frdaY&amp;__tn__=*NK*F">#PengembanganChatbot</a></span> <span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xzsf02u x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/ai?__eep__=6&amp;__cft__[0]=AZYz2oYrLeujvDNSvKYn5oKFoHgUqsTA7UsP3-ELjT2yTA0T2XmliW_GdWVbPXe-XoY8LVR_xSWA1Ce9ry6vtgq1POhLbV1yAOnjgxhT4Wx98K_IhyoGpgAyyFq_ktBjVwgF3SML9eVnxJ87QoqaD4o2BVPNKZ7RAgDC4C-yByUKDdUgxDLNqFnkLMT5P2frdaY&amp;__tn__=*NK*F">#AI</a></span> <span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xzsf02u x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/innovation?__eep__=6&amp;__cft__[0]=AZYz2oYrLeujvDNSvKYn5oKFoHgUqsTA7UsP3-ELjT2yTA0T2XmliW_GdWVbPXe-XoY8LVR_xSWA1Ce9ry6vtgq1POhLbV1yAOnjgxhT4Wx98K_IhyoGpgAyyFq_ktBjVwgF3SML9eVnxJ87QoqaD4o2BVPNKZ7RAgDC4C-yByUKDdUgxDLNqFnkLMT5P2frdaY&amp;__tn__=*NK*F">#Innovation</a></span> <span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xzsf02u x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/belajarai?__eep__=6&amp;__cft__[0]=AZYz2oYrLeujvDNSvKYn5oKFoHgUqsTA7UsP3-ELjT2yTA0T2XmliW_GdWVbPXe-XoY8LVR_xSWA1Ce9ry6vtgq1POhLbV1yAOnjgxhT4Wx98K_IhyoGpgAyyFq_ktBjVwgF3SML9eVnxJ87QoqaD4o2BVPNKZ7RAgDC4C-yByUKDdUgxDLNqFnkLMT5P2frdaY&amp;__tn__=*NK*F">#BelajarAI</a></span>', 'published', '2025-02-05 10:31:55', '2026-08-19 10:57:35', '2026-09-08 15:27:03'),
(8, 10, 1, 'Online Training of Trainer Coding for Kids', 'online-training-of-trainer-coding-for-kids-6a858c1f70938', '/images/485185738_958093913203613_4067422706425259653_n.webp', 'Hallo Bapak Ibu Guru dan orang tua di seluruh Indonesia, ingin menjadi pelatih bagi murid-murid atau anak sendiri agar memiliki kemampuan coding?...', 'Hallo Bapak Ibu Guru dan orang tua di seluruh Indonesia, ingin menjadi pelatih bagi murid-murid atau anak sendiri agar memiliki kemampuan coding?<br class="html-br" /><br class="html-br" />Pelatihan ini mengenalkan dasar _coding_ yang mudah dipelajari oleh anak-anak sehingga mereka mampu untuk membuat karya digital berupa *_story, animasi, hingga game._*. Sangat bermanfaat bagi orang tua atau guru _Pembina Ekstrakurikuler TIK/ Digital_.<br class="html-br" /><br class="html-br" />**Ikatan Guru Indonesia Kabupaten Ogan Ilir** bekerja sama dengan **Beranda Teknologi Digital** mengadakan :<br class="html-br" /><br class="html-br" />_Training of Trainer_<br class="html-br" />*_Coding for Kids 2023_*<br class="html-br" /><br class="html-br" />*Apa yang akan di pelajari pada materi ini ?*<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t7a/1/16/31_20e3.png" alt="1️⃣" width="16" height="16" /></span> Apa itu _Coding_<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t99/1/16/32_20e3.png" alt="2️⃣" width="16" height="16" /></span> _Coding_ untuk Tenaga Pengajar<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/tb8/1/16/33_20e3.png" alt="3️⃣" width="16" height="16" /></span> Praktik Penggunaan Program _Coding for Kids_<br class="html-br" /><br class="html-br" />*Siapa Pemateri dalam Kegiatan ini ?*<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t8a/1/16/1f9d1_1f3fb_200d_1f3eb.png" alt="🧑🏻‍🏫" width="16" height="16" /></span> *Septa Ryan Hidayat*<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t40/1/16/25b6.png" alt="▶️" width="16" height="16" /></span> _Project Manager CV Beranda Teknologi Digital_<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t40/1/16/25b6.png" alt="▶️" width="16" height="16" /></span> _Software Engineer_<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t40/1/16/25b6.png" alt="▶️" width="16" height="16" /></span> _Dewan Pakar IGI Ogan Ilir_<br class="html-br" /><br class="html-br" />*Kapan Pelaksanaan?*<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/tff/1/16/1f4c6.png" alt="📆" width="16" height="16" /></span> Sabtu - Selasa, 28-31 Oktober 2023<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/tcd/1/16/1f6dc.png" alt="🛜" width="16" height="16" /></span> Grup Telegram<br class="html-br" /><br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t3e/1/16/1f50a.png" alt="🔊" width="16" height="16" /></span> _*Kelas terbuka untuk Guru dan Umum* Training for Trainer *Coding For Kids*_<br class="html-br" /><br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t40/1/16/25b6.png" alt="▶️" width="16" height="16" /></span> Investasi hanya *35k* untuk anggota IGI dan *50k* untuk non anggota IGI.<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t40/1/16/25b6.png" alt="▶️" width="16" height="16" /></span> Fasilitas _Sertifikat, Modul Pembelajaran, etc_<br class="html-br" /><br class="html-br" />Ayo *_Booking Seat_* dari Sekarang juga<br class="html-br" />*Kuota Terbatas !!!*<br class="html-br" /><br class="html-br" />_Pendaftaran_, hubungi <span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t20/1/16/2b07.png" alt="⬇️" width="16" height="16" /></span><br class="html-br" />*Pusat Informasi:*<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t40/1/16/25b6.png" alt="▶️" width="16" height="16" /></span> <span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f" tabindex="0" role="link" href="http://s.id/Coding4KidsIGI?fbclid=IwZXh0bgNhZW0CMTAAYnJpZBExUGk3TW9BS1Zwd1paNVROZ3NydGMGYXBwX2lkEDIyMjAzOTE3ODgyMDA4OTIAAR55FaTnf5wRhVcvZ8jYSE3pe4VZHkTKmp2dS1-dKhG6YP05BBjpl-BHuN8Kdg_aem_5QJay6VpgTN7ZiA7iq985A" target="_blank" rel="nofollow noopener noreferrer">s.id/Coding4KidsIGI</a></span><br class="html-br" /><br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t40/1/16/25b6.png" alt="▶️" width="16" height="16" /></span> Email :<br class="html-br" />info@berandadigital.net<br class="html-br" /><br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t40/1/16/25b6.png" alt="▶️" width="16" height="16" /></span> Website :<br class="html-br" /><span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f" tabindex="0" role="link" href="http://www.berandadigital.net/?fbclid=IwZXh0bgNhZW0CMTAAYnJpZBExUGk3TW9BS1Zwd1paNVROZ3NydGMGYXBwX2lkEDIyMjAzOTE3ODgyMDA4OTIAAR7DN3IGTtLxqmNeck2LPvjywWfXkVs32OTkzZpCGEwQ7JPQZwEp3k5JklsSJA_aem_nhkESo_24GSHSqOFNbIUlg" target="_blank" rel="nofollow noopener noreferrer">www.berandadigital.net</a></span><br class="html-br" /><span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f" tabindex="0" role="link" href="http://www.igi-oi.com/?fbclid=IwZXh0bgNhZW0CMTAAYnJpZBExUGk3TW9BS1Zwd1paNVROZ3NydGMGYXBwX2lkEDIyMjAzOTE3ODgyMDA4OTIAAR7r63VKkcRG8LAJ6zeArvU3_Oobabe0hbQXv2WpM_iRUBpeyD_5axjZHjmnRQ_aem_jDgOSiC9rMOywP3xS2_toA" target="_blank" rel="nofollow noopener noreferrer">www.igi-oi.com</a></span>', 'published', '2023-10-26 10:33:59', '2026-08-19 10:57:35', '2026-09-08 15:27:03'),
(9, 8, 1, 'Optimalisasi Peran Guru, Tenaga Kependidikan, dan Tim Kreatif, melalui pemanfaatan AI dan Coding SIT Robbani Ogan Ilir', 'optimalisasi-peran-guru-tenaga-kependidikan-dan-tim-kreatif-melalui-pemanfaatan-ai-dan-coding-sit-robbani-ogan-ilir-6a858c1f71569', '/images/561378805_1119891467023856_3474954454940095689_n.webp', '






...', '<div>
<div>
<div class="x1yztbdb x1n2onr6 xh8yej3 x1ja2u2z">
<div class="x1n2onr6 x1ja2u2z">
<div>
<div>
<div class="x1a2a7pz" aria-posinset="8">
<div class="x78zum5 xdt5ytf" data-virtualized="false">
<div class="x9f619 x1n2onr6 x1ja2u2z">
<div class="html-div xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x78zum5 x1n2onr6 xh8yej3">
<div class="x1n2onr6 x1ja2u2z x1jx94hy xw5cjc7 x1dmpuos x1vsv7so xau1kf4 x9f619 xh8yej3 x6ikm8r x10wlt62 xquyuld">
<div>
<div class="html-div xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl">
<div class="html-div xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl">
<div class="html-div xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl">
<div class="html-div xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl">
<div class="html-div xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl" dir="auto">
<div class="html-div xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl" data-ad-rendering-role="story_message">
<div class="x1l90r2v x1iorvi4 x1g0dm76 xpdmqnj" data-ad-comet-preview="message" data-ad-preview="message">
<div class="x78zum5 xdt5ytf xz62fqu x16ldp7u">
<div class="xu06os2 x1ok221b">
<div class="html-div xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl">
<div class="xdj266r x14z9mp xat24cr x1lziwak x1vvkbs x126k92a">
<div dir="auto">Saatnya Upgrade Skill, Belajar Bareng, berkembang bareng!</div>
</div>
<div class="x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a">
<div dir="auto"><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t69/1/16/1f331.png" alt="🌱" width="16" height="16" /></span> PELATIHAN CODING DAN AI</div>
<div dir="auto">Optimalisasi Peran Guru, Tenaga Kependidikan, dan Tim Kreatif, melalui pemanfaatan AI dan Coding</div>
</div>
<div class="x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a">
<div dir="auto">SIT Robbani Ogan Ilir Bersama Beranda Teknologi Digital ngajak kamu untuk belajar cara cerdas dengan bantuan teknologi dan pastinya ini bermanfaat banget untuk mendukung profesimu</div>
</div>
<div class="x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a">
<div dir="auto">Bersama :</div>
<div dir="auto"><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/ta/1/16/1f464.png" alt="👤" width="16" height="16" /></span>Septa Ryan Hidayat (Direktur Utama CV. Beranda Teknologi Digital, Kepala Bidang IT Yayasan Generasi Robbani)</div>
</div>
<div class="x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a">
<div dir="auto">Insya Allah akan dilaksanakan pada:</div>
<div dir="auto"><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t5c/1/16/1f5d3.png" alt="🗓" width="16" height="16" /></span> Hari, tanggal : Sabtu, 18 Oktober 2025</div>
<div dir="auto"><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/tb0/1/16/1f558.png" alt="🕘" width="16" height="16" /></span> Waktu : 07.30 - 12.00 WIB</div>
<div dir="auto"><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t28/1/16/1f3eb.png" alt="🏫" width="16" height="16" /></span> Tempat : Aula SDIT Robbani</div>
</div>
<div class="x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a">
<div dir="auto">Note:</div>
<div dir="auto">- Membawa Laptop/Tablet + Charger masing-masing</div>
<div dir="auto">- membawa terminal jika diperlukan</div>
</div>
<div class="x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a">
<div dir="auto"><span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/coding?__eep__=6&amp;__cft__[0]=AZaF0c5RUSN6F1TdESPZB9h5Pe0zZ6mvbpwlJnAlTeJrROnfaVFP9R-ZUPoSYYJzjKgm_pdBUcpXmRyhL7--F0s2tlo9rIjoF4Ow1HZ-Qm0VX6H1cL6nKNg8Ktbwghebohs3FvYIBdXfAf_ta47HaYByOeGKEhdqrEs7akiI7DsAq3GRukLLqFFZ-ZlWjrHBMUc&amp;__tn__=*NK-R">#Coding</a></span>&amp;AI <span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/sitrobbani?__eep__=6&amp;__cft__[0]=AZaF0c5RUSN6F1TdESPZB9h5Pe0zZ6mvbpwlJnAlTeJrROnfaVFP9R-ZUPoSYYJzjKgm_pdBUcpXmRyhL7--F0s2tlo9rIjoF4Ow1HZ-Qm0VX6H1cL6nKNg8Ktbwghebohs3FvYIBdXfAf_ta47HaYByOeGKEhdqrEs7akiI7DsAq3GRukLLqFFZ-ZlWjrHBMUc&amp;__tn__=*NK-R">#SITRobbani</a></span> <span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/berandateknologidigital?__eep__=6&amp;__cft__[0]=AZaF0c5RUSN6F1TdESPZB9h5Pe0zZ6mvbpwlJnAlTeJrROnfaVFP9R-ZUPoSYYJzjKgm_pdBUcpXmRyhL7--F0s2tlo9rIjoF4Ow1HZ-Qm0VX6H1cL6nKNg8Ktbwghebohs3FvYIBdXfAf_ta47HaYByOeGKEhdqrEs7akiI7DsAq3GRukLLqFFZ-ZlWjrHBMUc&amp;__tn__=*NK-R">#berandateknologidigital</a></span> <span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/sekolahdigital?__eep__=6&amp;__cft__[0]=AZaF0c5RUSN6F1TdESPZB9h5Pe0zZ6mvbpwlJnAlTeJrROnfaVFP9R-ZUPoSYYJzjKgm_pdBUcpXmRyhL7--F0s2tlo9rIjoF4Ow1HZ-Qm0VX6H1cL6nKNg8Ktbwghebohs3FvYIBdXfAf_ta47HaYByOeGKEhdqrEs7akiI7DsAq3GRukLLqFFZ-ZlWjrHBMUc&amp;__tn__=*NK-R">#SekolahDigital</a></span></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>', 'published', '2025-10-10 10:20:08', '2026-08-19 10:57:35', '2026-09-08 15:27:03'),
(10, 10, 1, 'Inovasi Pembelajaran berbasis Koding dan AI dalam kerangka penguatan kelembagaan sekolah untuk tenaga pendidik di satuan SD dan SMP di Kab. OKU Timur', 'inovasi-pembelajaran-berbasis-koding-dan-ai-dalam-kerangka-penguatan-kelembagaan-sekolah-untuk-tenaga-pendidik-di-satuan-sd-dan-smp-di-kab-oku-timur-6a858c1f721d7', '/images/545410148_1090108853335451_8582489098678183559_n.webp', 'Dinas Pendidikan OKU Timur dan Beranda Teknologi Digital bekerjasama Mengadakan Pelatihan Coding &amp; AIPelatihan ini memiliki tema yai...', 'Dinas Pendidikan OKU Timur dan Beranda Teknologi Digital bekerjasama Mengadakan Pelatihan Coding &amp; AI<br class="html-br" /><br class="html-br" />Pelatihan ini memiliki tema yaitu Inovasi Pembelajaran berbasis Koding dan AI dalam kerangka penguatan kelembagaan sekolah untuk tenaga pendidik di satuan SD dan SMP di Kab. OKU Timur.<br class="html-br" /><br class="html-br" />Dengan Narasumber:<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/ta/1/16/1f464.png" alt="👤" width="16" height="16" /></span>Septa Ryan Hidayat (Direktur Utama CV. Beranda Teknologi Digital)<br class="html-br" /><br class="html-br" />Insya Allah akan dilaksanakan pada:<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t5c/1/16/1f5d3.png" alt="🗓️" width="16" height="16" /></span> Hari, tanggal : Kamis, 11 September 2025<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/tb0/1/16/1f558.png" alt="🕘" width="16" height="16" /></span> Waktu : 09.00 - 16.00 WIB<br class="html-br" /><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t28/1/16/1f3eb.png" alt="🏫" width="16" height="16" /></span> Tempat : Hotel Majestic Palembang<br class="html-br" /><br class="html-br" />Belajar Coding?<br class="html-br" />Asyik dan Menyenangkan<br class="html-br" /><br class="html-br" /><span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xzsf02u x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/coding?__eep__=6&amp;__tn__=*NK*F">#Coding</a></span>&amp;AI<br class="html-br" /><span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj xzsf02u x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/berandateknologidigital?__eep__=6&amp;__tn__=*NK*F">#berandateknologidigital</a></span>', 'published', '2025-09-07 10:24:37', '2026-08-19 10:57:35', '2026-09-08 15:27:03'),
(11, 8, 1, 'Memasuki Era Baru: The Era of Vibe Coding!', 'memasuki-era-baru-the-era-of-vibe-coding-6a858c1f72e0e', '/images/631476506_1210308331315502_7735877304621369529_n.webp', '
Teknologi AI kini bukan lagi sekadar wacana, melainkan alat nyata unt...', '<div class="xdj266r x14z9mp xat24cr x1lziwak x1vvkbs x126k92a">
<div dir="auto"><span style="font-size: 16px;">Teknologi AI kini bukan lagi sekadar wacana, melainkan alat nyata untuk menciptakan solusi digital tanpa harus mahir menulis baris kode.</span></div>
</div>
<div class="x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a">
<div dir="auto"></div>
<div dir="auto">Kami dari CV. Beranda Teknologi Digital merasa terhormat mendapatkan kesempatan untuk berbagi ilmu di Politeknik Akamigas Palembang.</div>
</div>
<div class="x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a">
<div dir="auto"></div>
<div dir="auto">Direktur Utama kami, Septa Ryan Hidayat, akan mengupas tuntas bagaimana pemanfaatan AI dapat mengakselerasi pengembangan aplikasi pembelajaran dan manajemen informasi secara efisien.</div>
</div>
<div class="x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a">
<div dir="auto"><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t2d/1/16/1f4cd.png" alt="📍" width="16" height="16" /></span> Lokasi: Politeknik Akamigas Palembang</div>
<div dir="auto"><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t7e/1/16/1f4c5.png" alt="📅" width="16" height="16" /></span> Waktu: Rabu, 11 Februari 2026</div>
<div dir="auto"><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t2f/1/16/1f557.png" alt="🕗" width="16" height="16" /></span> Jam: 08.30 WIB - Selesai</div>
</div>
<div class="x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a">
<div dir="auto">Mari kita eksplorasi bersama bagaimana AI memudahkan pekerjaan kita di masa depan.</div>
</div>
<div class="x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a">
<div dir="auto"><span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/berandateknologidigital?__eep__=6&amp;__cft__[0]=AZY4ERumgpjI0wSZ3BWW4UT56-iZUr6cczqgke3-A1T5Lu3_qxTTs_jQxGKBSIvxeCHpIGeiI8NlL_VS_Go5pUtgYntX4QMFLgYKHRnLScwf_tnl71hGASJW3J7kTYzoo-YhD8lqC8iQ4sEq7cMMnjGJEidbrl38-lMT5Fe7MOedSorre4gwdbVv_zhPpyGkSqc&amp;__tn__=*NK-R">#BerandaTeknologiDigital</a></span> <span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/digitaltransformation?__eep__=6&amp;__cft__[0]=AZY4ERumgpjI0wSZ3BWW4UT56-iZUr6cczqgke3-A1T5Lu3_qxTTs_jQxGKBSIvxeCHpIGeiI8NlL_VS_Go5pUtgYntX4QMFLgYKHRnLScwf_tnl71hGASJW3J7kTYzoo-YhD8lqC8iQ4sEq7cMMnjGJEidbrl38-lMT5Fe7MOedSorre4gwdbVv_zhPpyGkSqc&amp;__tn__=*NK-R">#DigitalTransformation</a></span> <span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/politeknikakamigaspalembang?__eep__=6&amp;__cft__[0]=AZY4ERumgpjI0wSZ3BWW4UT56-iZUr6cczqgke3-A1T5Lu3_qxTTs_jQxGKBSIvxeCHpIGeiI8NlL_VS_Go5pUtgYntX4QMFLgYKHRnLScwf_tnl71hGASJW3J7kTYzoo-YhD8lqC8iQ4sEq7cMMnjGJEidbrl38-lMT5Fe7MOedSorre4gwdbVv_zhPpyGkSqc&amp;__tn__=*NK-R">#PoliteknikAkamigasPalembang</a></span></div>
</div>', 'published', '2026-02-09 10:39:15', '2026-08-19 10:57:35', '2026-09-08 15:27:03'),
(12, 10, 1, 'Lecturer Development Program 2026', 'lecturer-development-program-2026-6a858c1f73ab0', '/images/626271180_17940187239113665_1282635413631214268_n.webp', '
Pelatihan Pemanfaatan Artificial Intelligence (AI) untuk pembuatan aplikasi yang praktis dan profesi...', '<div class="xdj266r x14z9mp xat24cr x1lziwak x1vvkbs x126k92a">
<div dir="auto">Pelatihan Pemanfaatan Artificial Intelligence (AI) untuk pembuatan aplikasi yang praktis dan profesional tanpa coding, khusus bagi Dosen Politeknik Akamigas Palembang.</div>
</div>
<div class="x14z9mp xat24cr x1lziwak x1vvkbs xtlvy1s x126k92a">
<div dir="auto">Mendorong inovasi pembelajaran, meningkatkan kompetensi digital, dan menjawab tantangan pendidikan di era transformasi teknologi.</div>
<div dir="auto">.</div>
<div dir="auto"><span class="html-span xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs x3nfvp2 x1j61x8r x1fcty0u xdj266r xat24cr xm2jcoa x1mpyi22 xxymvpz xlup9mm x1kky2od"><img class="xz74otr x15mokao x1ga7v0g x16uus16 xbiv7yw" src="https://static.xx.fbcdn.net/images/emoji.php/v9/tc6/1/16/1f680.png" alt="🚀" width="16" height="16" /></span> Upgrade skill dosen, wujudkan pembelajaran masa depan</div>
<div dir="auto">.</div>
<div dir="auto"><span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/ldp?__eep__=6&amp;__cft__[0]=AZYocO_fHVbADi5fj3DjttY1dyLQXU8W0Y2mHvJ-qn-_jPT6HYJEAiIM0pevFQkpWeFfobAuJdMokJ2W019jgGZUpl0BftucAEzZgcwxRIJRgt2iiVBENy1PDfSmXRS526D37DuSRSQg_YMmPNh0eN6SE7i8qaI2c1RFZOXSFceG4lt4BvIrUxwCOSHtV_rp49k&amp;__tn__=*NK-R">#ldp</a></span></div>
<div dir="auto"><span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/akamigaspalembang?__eep__=6&amp;__cft__[0]=AZYocO_fHVbADi5fj3DjttY1dyLQXU8W0Y2mHvJ-qn-_jPT6HYJEAiIM0pevFQkpWeFfobAuJdMokJ2W019jgGZUpl0BftucAEzZgcwxRIJRgt2iiVBENy1PDfSmXRS526D37DuSRSQg_YMmPNh0eN6SE7i8qaI2c1RFZOXSFceG4lt4BvIrUxwCOSHtV_rp49k&amp;__tn__=*NK-R">#akamigaspalembang</a></span></div>
<div dir="auto"><span class="html-span xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x1hl2dhg x16tdsg8 x1vvkbs"><a class="x1i10hfl xjbqb8w x1ejq31n x18oe1m7 x1sy0etr xstzfhl x972fbf x10w94by x1qhh985 x14e42zd x9f619 x1ypdohk xt0psk2 x3ct3a4 xdj266r x14z9mp xat24cr x1lziwak xexx8yu xyri2b x18d9i69 x1c1uobl x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz xkrqix3 x1sur9pj x1fey0fg x1s688f" tabindex="0" role="link" href="https://www.facebook.com/hashtag/ai?__eep__=6&amp;__cft__[0]=AZYocO_fHVbADi5fj3DjttY1dyLQXU8W0Y2mHvJ-qn-_jPT6HYJEAiIM0pevFQkpWeFfobAuJdMokJ2W019jgGZUpl0BftucAEzZgcwxRIJRgt2iiVBENy1PDfSmXRS526D37DuSRSQg_YMmPNh0eN6SE7i8qaI2c1RFZOXSFceG4lt4BvIrUxwCOSHtV_rp49k&amp;__tn__=*NK-R">#ai</a></span></div>
</div>', 'published', '2026-02-07 10:59:23', '2026-08-19 10:57:35', '2026-09-08 15:27:03'),
(13, 8, 1, 'Insight Talks Bersama Kementerian Komdigi dan Media Indonesia Vol. 3 Palembang', 'insight-talks-vol-3-palembang-6a858c1f74682', '/images/Insight-Talks-Komdigi.webp', 'Halo Sobat Komdigi! 👋
Setelah sukses di Aceh dan NTB, rangkaian Insight Talks kini hadir di Kota Palembang! Bersama Kementerian Komunikasi dan Digital RI (Komdigi) dan Media Indone...', 'Halo Sobat Komdigi! 👋
Setelah sukses di Aceh dan NTB, rangkaian Insight Talks kini hadir di Kota Palembang! Bersama Kementerian Komunikasi dan Digital RI (Komdigi) dan Media Indonesia, kita akan mengupas tuntas tantangan dan peluang di era teknologi saat ini.

Dengan tema "Literasi Media: Cerdas di Era Kecerdasan Artifisial", acara ini bertujuan untuk memperkuat kemampuan literasi digital masyarakat dalam mendeteksi disinformasi serta memanfaatkan AI secara bijak.

📌 Detail Acara:
🗓 Hari/Tanggal: Selasa, 14 April 2026
📍 Lokasi: Hotel Harper Palembang

🎤 Keynote Speech :
* Farida Dewi Maharani (Plt. Direktur Ekosistem Media Komdigi)

👥 Narasumber &amp; Workshop :
* Rosarita Niken Widiastuti (Ketua Komisi Kemitraan, Hubungan Antar Lembaga, &amp; Infrastruktur Dewan Pers)
* Abdul Kohar (Direktur Pemberitaan Media Indonesia)
* Septa Ryan Hidayat (CEO Beranda Teknologi Digital, Pemerhati AI)

🎁 Benefit : E-Certificate, Makan Siang, &amp; Doorprise Menarik!

Mari kita bangun ketahanan informasi nasional dengan menjadi pengguna teknologi yang cerdas dan kritis. Sampai jumpa di Palembang!

#Komdigi #MediaIndonesia #InsightTalks #LiterasiDigital #ArtificialIntelligence #PalembangEvent #CerdasBer-AI', 'published', '2026-04-13 09:00:12', '2026-08-19 10:57:35', '2026-09-08 15:27:03');

-- Dumping data for table `inquiries` (1 rows)
INSERT INTO `inquiries` (`id`, `name`, `email`, `phone`, `subject`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'Budi Santoso', 'budi@techcorp.id', NULL, 'Konsultasi Ekosistem Digital SmartVerse', 'Halo tim SmartVerse, kami tertarik untuk berdiskusi mengenai integrasi produk SmartEdu dan SmartSDM untuk lembaga pendidikan kami.', 0, '2026-09-08 14:51:52', '2026-09-08 14:51:52');

-- Dumping data for table `digital_products` (8 rows)
INSERT INTO `digital_products` (`id`, `category_id`, `title`, `slug`, `badge`, `tagline`, `description`, `features`, `price`, `price_type`, `demo_url`, `buy_url`, `thumbnail`, `is_featured`, `order`, `created_at`, `updated_at`) VALUES
(1, 5, 'SmartNews - Platform Media Online & Portal Berita Modern Berstandar Dewan Pers', 'smartnews-cms-portal-berita', 'Media & News', 'CMS Portal Berita Modern, Redaksi Multi-Role, SEO Score 95+ & Ready Monetisasi Ads', 'Platform portal berita dan sistem manajemen redaksi terlengkap yang dirancang memenuhi standar Dewan Pers. Dilengkapi fitur verifikasi wartawan, manajemen artikel, live report, analitik real-time, dan optimasi Core Web Vitals untuk pengalaman membaca super cepat.', '["Standar Jurnalistik & Regulasi Dewan Pers","Redaksi Multi-Role: Reporter, Editor, Redaktur, Pemred","Manajemen Iklan Mandiri & Google AdSense Ready","AMP & PWA Support, Kecepatan Loading < 1.2 Detik","Arsitektur Laravel Modern & Skalabilitas Tinggi"]', 4999000, 'one_time', 'https://smartnews.test', 'https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20dengan%20produk%20SmartNews', '/images/smartverse/mockup-smartnews.webp', 1, 1, '2026-09-08 14:57:45', '2026-09-08 15:44:40'),
(2, 5, 'SmartEdu - All-in-One Educational ERP Sekolah Islam Terpadu Multi-Unit', 'smartedu-ekosistem-sekolah-terpadu', 'Education ERP', 'Sistem Terintegrasi Akademik, Keuangan Syariah, Tahfidz & Portal Orang Tua Terpadu', 'Solusi ERP pendidikan modern untuk yayasan dan sekolah Islam terpadu jenjang KB, TK, SD, SMP, SMA/SMK. Mengintegrasikan pencatatan SPP virtual account, mutabaah yaumiyah & tahfidz Quran, e-Rapor, presensi guru/siswa, dan aplikasi wali santri secara real-time.', '["Manajemen Multi-Unit & Multi-Jenjang Sekolah (TK-SMA)","Modul Tahfidz Quran, Setoran Hafalan & Mutabaah","Billing Keuangan Otomatis, VA & Notifikasi WhatsApp Gateway","Aplikasi Mobile Wali Murid & Raport Digital","Dashboard Eksekutif Yayasan & Analitik Akademik"]', 12500000, 'one_time', 'https://smartverse.id/products/smartedu-ekosistem-sekolah-terpadu', 'https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20dengan%20produk%20SmartEdu', '/images/smartverse/mockup-smartedu.webp', 1, 2, '2026-09-08 14:57:45', '2026-09-08 15:44:40'),
(3, 7, 'SmartFeed - Studio Visual AI & Otomasi Konten Promosi Media Sosial', 'smartfeed-ai-visual-studio', 'AI Creative Suite', 'Generator Banner, Copywriting Viral & Penjadwalan Konten Otomatis Multi-Platform', 'Studio kreatif berbasis kecerdasan buatan (AI) yang mengubah ide produk menjadi visual iklan profesional, copy interaktif, dan kalender konten otomatis dalam hitungan detik. Menghemat biaya agensi dan meningkatkan konversi penjualan digital.', '["AI Visual Generator Resolusi Tinggi untuk Feed & Story","Smart Copywriter Berbasis Psikologi Penjualan & Hook Viral","Template Desain Modern Khusus Bisnis UMKM & Startup","Export Format PNG, JPG, dan Story Siap Unggah","Terintegrasi AI Forensik & Verifikasi Keaslian Konten"]', 2490000, 'one_time', 'https://smartverse.id/products/smartfeed-ai-visual-studio', 'https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20dengan%20produk%20SmartFeed', '/images/smartverse/mockup-smartfeed.webp', 1, 3, '2026-09-08 14:57:45', '2026-09-08 15:44:40'),
(4, 6, 'SmartSDM - Aplikasi Mobile HRIS Presensi Wajah Liveness & Anti-Fake GPS', 'smartsdm-mobile-hris-presensi', 'Mobile HRIS', 'Presensi Biometrik Wajah Liveness Detection, Geofencing Akurat & Payroll Otomatis', 'Aplikasi mobile HRIS enterprise untuk mengelola presensi karyawan, pengajuan cuti, izin, lembur, dan slip gaji secara transparan. Dilengkapi proteksi anti-mock location (anti-fake GPS) dan deteksi wajah liveness guna mencegah kecurangan presensi.', '["Face Recognition + Liveness Detection Anti-Foto\/Topeng","Geofencing Presensi Radius Akurat & Anti Fake GPS","Pengajuan Cuti, Izin, Sakit & Lembur Real-Time Approval","Perhitungan Payroll & Cetak Slip Gaji PDF Otomatis","Tersedia Aplikasi Mobile Android & Dashboard Web Admin"]', 6990000, 'one_time', 'https://smartverse.id/products/smartsdm-mobile-hris-presensi', 'https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20dengan%20produk%20SmartSDM', '/images/smartverse/mockup-smartsdm.webp', 1, 4, '2026-09-08 14:57:45', '2026-09-08 15:44:40'),
(5, 7, 'SmartSynth - Lab Forensik Konten AI & Cek Fakta Visual Digital', 'smartsynth-lab-forensik-ai', 'AI Forensics Lab', 'Uji Keaslian Foto Digital: EXIF Biner, C2PA 2.4, Real ELA 80% & 2D FFT Spektrogram', 'Sistem saintifik audit forensik gambar digital dan cek fakta visual. Menganalisis metadata EXIF biner, riwayat suntingan C2PA Cryptographic Provenance, kompresi Error Level Analysis (ELA) 80%, serta 2D FFT Spektrogram Frekuensi untuk mendeteksi sintesis generative AI dan manipulasi gambar.', '["EXIF Binary Parser: Kamera, GPS, Hex Dump & Thumbnail Hidden Marker","C2PA 2.4 Verification: Manifest Kriptografi JUMBF & Content Provenance","Real ELA (Error Level Analysis) 80% Kompresi Differensial","2D FFT Spektrogram Frekuensi: Deteksi Grid & Pola Resampling AI","Generator Berita Acara SOP Forensik Digital Resmi & Audit Trail"]', 8500000, 'one_time', 'https://smartverse.id/products/smartsynth-lab-forensik-ai', 'https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20dengan%20produk%20SmartSynth', '/images/smartverse/mockup-smartsynth.webp', 1, 5, '2026-09-08 14:57:45', '2026-09-08 15:44:40'),
(6, 5, 'Sistem Aplikasi Administrasi Desa Digital (Smart Village)', 'sistem-aplikasi-administrasi-desa-digital', 'Smart Village', 'Platform Digitalisasi Surat Desa, Data Kependudukan & Portal Publik', 'Aplikasi web siap pakai untuk kantor desa yang membutuhkan sistem cetak surat otomatis, verifikasi QR code, dan portal informasi publik.', '["Modul Cetak Surat Otomatis 30+ Jenis Surat Desa","Otentikasi Tanda Tangan Digital QR Code","Database Kependudukan & Statistik RT\/RW","Support SQLite untuk Server Desa & MySQL Online"]', 1990000, 'one_time', 'https://berandadigital.net', 'https://wa.me/6289695249089?text=Halo%20Beranda%20Digital,%20saya%20tertarik%20membeli%20Aplikasi%20Desa%20Digital', '/images/products/smart-village-mockup.webp', 1, 6, '2026-08-19 10:57:35', '2026-09-08 15:27:04'),
(7, 6, 'Enterprise Starter Kit Laravel 13 & Tailwind v4', 'enterprise-starter-kit-laravel-13', 'Boilerplate Script', 'Arsitektur Boilerplate Siap Pakai dengan Dark/Light Mode & RBAC', 'Boilerplate terlengkap untuk startup dan pengembang software. Dilengkapi sistem autentikasi, manajemen pengguna, log audit, dan tema ganda.', '["Laravel 13 & PHP 8.4 Support Out of The Box","Dukungan SQLite (Dev) & MySQL (Production)","Fitur Dual Theme: Light & Dark Mode Persisted","Role & Permission Management bawaan","Clean Architecture Standard"]', 499000, 'one_time', 'https://berandadigital.net', 'https://wa.me/6289695249089?text=Halo%20Beranda%20Digital,%20saya%20tertarik%20membeli%20Laravel%20Starter%20Kit', '/images/products/enterprise-web-mockup.webp', 1, 7, '2026-08-19 10:57:35', '2026-09-08 15:27:04'),
(8, 7, 'Jasa Pembuatan Video Ucapan & Profil Digital', 'jasa-pembuatan-video-ucapan-profil-digital', 'Media Studio', 'Layanan Pembuatan Video Profil & Ucapan Hari Besar', 'Layanan pembuatan video profil perusahaan, instansi, dan ucapan hari raya dengan animasi modern.', '["Animasi HD 1080p \/ 4K Modern","Custom Voiceover & Backsound Lisensi Resmi","Revisi Hingga Puas & Format Siap Sosial Media","Pengerjaan Cepat 1-3 Hari"]', 750000, 'one_time', 'https://berandadigital.net', 'https://wa.me/6289695249089?text=Halo%20Beranda%20Digital,%20saya%20tertarik%20membeli%20Jasa%20Video', '/images/products/school-portal-mockup.webp', 1, 8, '2026-08-19 10:57:35', '2026-09-08 15:27:04');

-- Dumping data for table `trainings` (2 rows)
INSERT INTO `trainings` (`id`, `title`, `slug`, `level`, `duration`, `target_audience`, `summary`, `syllabus`, `price`, `thumbnail`, `is_featured`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Lecturer Development Program: Artificial Intelligence & Vibe Coding', 'lecturer-development-program-ai-vibe-coding', 'Executive & Dosen', '1 Hari Workshop Intensif', 'Dosen, Akademisi & Pengajar Perguruan Tinggi', 'Pelatihan Pemanfaatan Artificial Intelligence (AI) untuk pembuatan aplikasi praktis dan profesional tanpa coding, khusus bagi Dosen Politeknik Akamigas Palembang.', '["Pengenalan Konsep Vibe Coding & Generative AI","Pembuatan Prototype Aplikasi Tanpa Baris Kode","Pemanfaatan AI dalam Inovasi Pembelajaran Perguruan Tinggi","Studi Kasus Otomasi Administrasi Akademik"]', 1500000, '/preview/screencapture-berandadigital-test-trainer-2026-08-19-17_49_10.webp', 1, 1, '2026-08-19 10:57:35', '2026-09-08 15:27:04'),
(2, 'Pelatihan Augmented Reality (AR) & Koding untuk Media Edukasi Interaktif', 'pelatihan-augmented-reality-ar-dan-koding', 'Guru & Praktisi Pendidikan', '1 Hari Workshop', 'Guru SD, SMP, SMA & Pengembang Media Pembelajaran', 'Pelatihan pembuatan aplikasi 3D Augmented Reality untuk visualisasi materi pelajaran interaktif di kelas.', '["Dasar 3D Modeling & AR Marker","Pengenalan Software AR Creator","Integrasi AR dengan Buku Pelajaran","Publishing Aplikasi AR ke Smartphone"]', 1200000, '/images/Flyer-AR-New-1-scaled.webp', 1, 2, '2026-08-19 10:57:35', '2026-09-08 15:27:04');

-- Dumping data for table `galleries` (4 rows)
INSERT INTO `galleries` (`id`, `title`, `event_name`, `location`, `event_date`, `category`, `image_path`, `description`, `is_featured`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Tampilan Beranda Website Resmi Beranda Teknologi Digital', 'Original Web Preview', 'berandadigital.net', '2026-08-19', 'preview', '/preview/screencapture-berandadigital-net-2026-08-19-17_31_05.webp', 'Tampilan asli beranda utama website Beranda Teknologi Digital.', 1, 1, '2026-08-19 10:57:35', '2026-09-08 15:27:04'),
(2, 'Keynote Speaker: Insight Talks Vol. 3 Palembang (Komdigi RI & Media Indonesia)', 'Insight Talks Vol. 3 Palembang', 'Hotel Harper Palembang', '2026-04-14', 'keynote', '/images/Insight-Talks-Komdigi.webp', 'Septa Ryan Hidayat (CEO Beranda Teknologi Digital) menjadi narasumber bersama Plt. Direktur Komdigi RI dan Direktur Media Indonesia.', 1, 2, '2026-08-19 10:57:35', '2026-09-08 15:27:04'),
(3, 'Halaman Layanan Jasa & Paket Pembuatan Aplikasi', 'Original Services Preview', 'berandadigital.net/layanan', '2026-08-19', 'preview', '/preview/screencapture-berandadigital-net-layanan-2026-08-19-17_52_22.webp', 'Tampilan halaman layanan jasa pembuatan website, mobile app, dan sistem informasi.', 1, 3, '2026-08-19 10:57:35', '2026-09-08 15:27:04'),
(4, 'Halaman Profil Perusahaan & Bio Direktur Utama Septa Ryan Hidayat', 'Original Profile Preview', 'berandadigital.net/profile', '2026-08-19', 'preview', '/preview/screencapture-berandadigital-net-profile-2026-08-19-17_53_14.webp', 'Tampilan halaman profil resmi CV. Beranda Teknologi Digital.', 1, 4, '2026-08-19 10:57:35', '2026-09-08 15:27:04');

-- Dumping data for table `invoices` (3 rows)
INSERT INTO `invoices` (`id`, `invoice_number`, `invoice_date`, `due_date`, `status`, `client_type`, `client_name`, `client_attn`, `client_address`, `items`, `total_amount`, `paid_amount`, `remaining_amount`, `transactions`, `notes`, `created_at`, `updated_at`, `client_email`) VALUES
(1, '1675516', '2026-07-30', '2026-07-30', 'paid', 'Personal', 'Ibu Silvi Aryanti', 'ATTN: Ibu Silvi Aryanti', 'Palembang, Indonesia', '[{"description":"Pelunasan Pembuatan Aplikasi https://sa-badmintonapp.com","amount":3000000}]', 3000000, 3000000, 0, '[{"date":"20/07/2026","payment_method":"ShopeePay","transaction_id":"UWSK6XWZ6WF5OTDOV2CS61J4QDIKA","amount":1500000},{"date":"30/07/2026","payment_method":"ShopeePay","transaction_id":"UWSMKOFZT6TTMFZKXI5FNEJJCD6QA","amount":1500000}]', 'Terima kasih atas kerja sama dan kepercayaan Anda bersama CV. Beranda Teknologi Digital.', '2026-08-30 15:15:13', '2026-08-30 15:15:13', NULL),
(3, '1675518', '2026-09-03', '2026-09-03', 'unpaid', 'Institusi Pendidikan', 'Pimpinan Ponpes Raudhatul Ulum', 'ATTN: Pimpinan Ponpes Raudhatul Ulum', 'Desa Sakatiga Kecamatan Indralaya, Ogan Ilir', '[{"description":"Pengerjaan desain website resmi untuk Ponpes Raudhatul Ulum dengan rincian layanan mencakup :    \u2022 Desain dan Pembuatan Website   \u2022 Migrasi Domain   \u2022 Sewa Hosting (Masa aktif 1 tahun)   \u2022 Instalasi Keamanan SSL (Secure Socket Layer)   \u2022 Lisensi Theme & Widget Premium   \u2022 Biaya Perawatan (Maintenance) selama 1 tahun","amount":3000000}]', 3000000, 0, 3000000, '[{"date":"-","payment_method":"-","transaction_id":"-","amount":0}]', 'Terima kasih atas kerja sama dan kepercayaan Anda bersama CV. Beranda Teknologi Digital.', '2026-09-03 04:20:52', '2026-09-03 04:38:57', NULL),
(4, '1675519', '2026-09-08', '2026-09-11', 'unpaid', 'Personal', 'APPSI Kabupaten Banyuasin', 'ATTN: Pak Wardoyo, S.I.Kom.', 'Banyuasin, Sumsel', '[{"description":"Tagihan Pembuatan Website https:\/\/appsiba.or.id & Aplikasi Administrasi APPI Banyuasin","amount":5000000}]', 5000000, 0, 5000000, '[{"date":"-","payment_method":"-","transaction_id":"-","amount":0}]', 'Terima kasih atas kerja sama dan kepercayaan Anda bersama CV. Beranda Teknologi Digital.', '2026-09-08 07:49:43', '2026-09-08 09:46:48', NULL);

-- Dumping data for table `financial_records` (9 rows)
INSERT INTO `financial_records` (`id`, `type`, `category`, `title`, `amount`, `transaction_date`, `payment_method`, `reference_number`, `invoice_id`, `notes`, `receipt_path`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'expense', 'server_hosting', 'Sewa Server Cloud VPS & Cadangan Backup Mingguan', 1450000, '2026-08-05 00:00:00', 'Transfer Bank Mandiri', 'SRV-VPS-202608', NULL, 'Infrastruktur cloud server hosting untuk sistem web klien enterprise & staging BTD.', NULL, NULL, '2026-09-09 18:48:29', '2026-09-09 18:48:29'),
(2, 'expense', 'ai_tools', 'Lisensi Anthropic Claude Pro & OpenAI API Suite', 650000, '2026-08-10 00:00:00', 'Kartu Kredit / Visa', 'AI-SUB-202608', NULL, 'Alat bantu otomatisasi coding, generator arsitektur database, dan riset AI RAG.', NULL, NULL, '2026-09-09 18:48:29', '2026-09-09 18:48:29'),
(3, 'income', 'maintenance', 'Retainer Maintenance Server & Keamanan Web Pemdes', 1500000, '2026-08-12 00:00:00', 'Transfer Bank Sumsel Babel', 'RET-DESA-08', NULL, 'Kontrak bulanan pemeliharaan sistem web desa, update konten, dan backup mingguan.', NULL, NULL, '2026-09-09 18:48:29', '2026-09-09 18:48:29'),
(4, 'expense', 'salary_honor', 'Honor Developer & Quality Assurance Modul Aplikasi', 2500000, '2026-08-15 00:00:00', 'Transfer Bank Mandiri', 'HNR-DEV-08', NULL, 'Kompensasi pengerjaan backend API dan pengujian fitur mobile Flutter.', NULL, NULL, '2026-09-09 18:48:29', '2026-09-09 18:48:29'),
(5, 'income', 'training_workshop', 'Honor Pemateri Workshop AI & Vibe Coding Komdigi', 3500000, '2026-08-25 00:00:00', 'Transfer Bank BNI', 'SPK-KMD-08', NULL, 'Narasumber pelatihan talenta digital kecerdasan buatan dan coding modern.', NULL, NULL, '2026-09-09 18:48:29', '2026-09-09 18:48:29'),
(6, 'expense', 'office_ops', 'Langganan Internet Dedicated Fiber & Listrik Kantor Hub', 850000, '2026-08-28 00:00:00', 'ShopeePay', 'OPS-NET-09', NULL, 'Konektivitas stabil untuk deploy web, build APK Android, dan komunikasi klien.', NULL, NULL, '2026-09-09 18:48:29', '2026-09-09 18:48:29'),
(7, 'expense', 'ai_tools', 'Lisensi Google Gemini Advanced & Midjourney Studio', 520000, '2026-09-03 00:00:00', 'Kartu Kredit / Visa', 'AI-SUB-202609', NULL, 'Kebutuhan pembuatan aset visual portofolio, copywriting, dan coding ideation.', NULL, NULL, '2026-09-09 18:48:29', '2026-09-09 18:48:29'),
(8, 'expense', 'transport_meeting', 'Transportasi & Konsumsi Presentasi Klien Instansi', 350000, '2026-09-06 00:00:00', 'Kas Tunai', 'TRP-MTG-09', NULL, 'Meeting koordinasi implementasi sistem informasi sekolah & yayasan mitra.', NULL, NULL, '2026-09-09 18:48:29', '2026-09-09 18:48:29'),
(9, 'income', 'project_invoice', 'Pembayaran Faktur #1675516 - Ibu Silvi Aryanti', 3000000, '2026-07-30 00:00:00', 'ShopeePay', 'INV-1675516', 1, 'Otomatis terintegrasi dari Modul Faktur & Invoice SmartVerse (PAID). Terima kasih atas kerja sama dan kepercayaan Anda bersama CV. Beranda Teknologi Digital.', NULL, 3, '2026-10-09 12:45:10', '2026-10-09 12:45:10');

-- Dumping data for table `domain_renewals` (6 rows)
INSERT INTO `domain_renewals` (`id`, `domain_name`, `provider`, `service_type`, `registration_date`, `expiry_date`, `renewal_price`, `currency`, `billing_cycle`, `auto_renew`, `nameservers`, `client_name`, `client_whatsapp`, `login_url`, `status`, `notes`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'sa-badmintonapp.com', 'Spaceship', 'domain', '2025-09-09 00:00:00', '2026-09-14 00:00:00', 155000, 'IDR', 'yearly', 0, 'ns1.spaceship.com, ns2.spaceship.com', 'PB. Samudra Arena', '089695249089', 'https://www.spaceship.com/application/domains/', 'expiring_soon', 'Domain sistem manajemen lapangan badminton. Harus segera diperpanjang sebelum masa tenggang!', NULL, '2026-09-09 18:48:29', '2026-09-09 18:48:29'),
(2, 'yayasaninsancita.sch.id', 'Webnesia', 'combo', '2025-09-09 00:00:00', '2026-09-30 00:00:00', 450000, 'IDR', 'yearly', 0, 'ns1.webnesia.co.id, ns2.webnesia.co.id', 'Yayasan Insan Cita Mandiri', '081234567890', 'https://client.webnesia.co.id/', 'active', 'Paket Domain .SCH.ID + Cloud SSD Hosting cPanel 2GB.', NULL, '2026-09-09 18:48:29', '2026-09-09 18:48:29'),
(3, 'smartverse.id', 'Rumahweb', 'domain', '2024-09-09 00:00:00', '2027-07-26 00:00:00', 195000, 'IDR', 'yearly', 1, 'cloe.ns.cloudflare.com, plato.ns.cloudflare.com', 'Internal BTD (Corporate)', '089695249089', 'https://clientzone.rumahweb.com/', 'active', 'Domain corporate resmi Beranda Digital. DNS diarahkan ke Cloudflare Enterprise Proxy.', NULL, '2026-09-09 18:48:29', '2026-09-09 18:48:29'),
(4, 'smartdesa-oganilir.go.id', 'IDwebhost', 'hosting', '2026-03-09 00:00:00', '2026-10-27 00:00:00', 650000, 'IDR', 'yearly', 0, 'ns1.idwebhost.id, ns2.idwebhost.id', 'Pemerintah Desa Ogan Ilir', '082188991122', 'https://member.idwebhost.com/', 'active', 'Cloud Hosting Paket Bisnis untuk Sistem Pelayanan Warga.', NULL, '2026-09-09 18:48:29', '2026-09-09 18:48:29'),
(5, 'clouddev-hub.org', 'Porkbun', 'domain', '2025-11-09 00:00:00', '2026-11-23 00:00:00', 10.5, 'USD', 'yearly', 1, 'curt.ns.cloudflare.com, daisy.ns.cloudflare.com', 'Riset Internal BTD', NULL, 'https://porkbun.com/account/domains', 'active', 'Domain riset webhook & cloud services sandbox.', NULL, '2026-09-09 18:48:29', '2026-09-09 18:48:29'),
(6, 'sumsel-digitalschool.com', 'GoDaddy', 'domain', '2025-09-09 00:00:00', '2026-09-06 00:00:00', 240000, 'IDR', 'yearly', 0, 'ns1.domaincontrol.com, ns2.domaincontrol.com', 'SMK Bina Digital', '081377889900', 'https://dcc.godaddy.com/control/', 'expired', 'Kedaluwarsa 3 hari lalu. Masih dalam Grace Period 30 hari tanpa penalti.', NULL, '2026-09-09 18:48:29', '2026-09-09 18:48:29');

-- Dumping data for table `settings` (63 rows)
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `label`, `type`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'SmartVerse', 'general', 'Nama Perusahaan', 'text', '2026-08-19 10:57:35', '2026-09-08 15:13:29'),
(2, 'site_tagline', 'Solusi Digital Enterprise & Transformasi Teknologi Terpadu - SmartVerse.id', 'general', 'Tagline Utama', 'text', '2026-08-19 10:57:35', '2026-09-08 15:53:14'),
(3, 'hero_tagline', 'Mitra Solusi Digital Enterprise & Transformasi Teknologi Terpadu', 'hero', 'Tagline Hero', 'text', '2026-08-19 10:57:35', '2026-09-08 15:53:14'),
(4, 'hero_description', 'Kami merancang, membangun, dan mengakselerasi ekosistem teknologi masa depan untuk korporasi, institusi, dan organisasi modern. Menghadirkan solusi rekayasa perangkat lunak enterprise, infrastruktur cloud andal, otomatisasi cerdas, hingga adopsi artificial intelligence yang berdampak nyata dan berdaya saing tinggi.', 'hero', 'Deskripsi Hero', 'textarea', '2026-08-19 10:57:35', '2026-09-08 15:53:14'),
(5, 'trainer_name', 'Septa Ryan Hidayat', 'trainer', 'Nama Trainer / Speaker', 'text', '2026-08-19 10:57:35', '2026-08-30 15:28:41'),
(6, 'trainer_title', 'Founder & Lead Technology Architect SmartVerse, AI Speaker', 'trainer', 'Gelar / Jabatan', 'text', '2026-08-19 10:57:35', '2026-09-08 15:13:29'),
(7, 'trainer_bio', 'Founder & Lead Technology Architect di SmartVerse. Dewan Pakar IGI Ogan Ilir, Narasumber Komdigi & Media Nasional, serta Trainer Nasional di bidang Vibe Coding, AI RAG Document, dan Pengembangan Aplikasi Web/Mobile Enterprise.', 'trainer', 'Bio Trainer', 'textarea', '2026-08-19 10:57:35', '2026-09-08 15:13:29'),
(8, 'trainer_avatar', '/images/smartverse/ryan-trainer-hero.webp', 'trainer', 'Foto Profile Trainer', 'text', '2026-08-19 10:57:35', '2026-10-09 12:24:18'),
(9, 'trainer_stats_years', '8+', 'trainer', 'Pengalaman Tahun', 'text', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(10, 'trainer_stats_events', '85+', 'trainer', 'Workshop & Seminar', 'text', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(11, 'trainer_stats_alumni', '5,000+', 'trainer', 'Peserta Pelatihan', 'text', '2026-08-19 10:57:35', '2026-08-19 10:57:35'),
(12, 'contact_email', 'info@smartverse.id', 'contact', 'Email Resmi', 'text', '2026-08-19 10:57:35', '2026-09-08 15:13:29'),
(13, 'contact_phone', '089695249089', 'contact', 'WhatsApp Utama', 'text', '2026-08-19 10:57:35', '2026-09-08 16:08:35'),
(15, 'contact_address', 'Palembang - Ogan Ilir, Sumatera Selatan, Indonesia', 'contact', 'Alamat Kantor Resmi', 'textarea', '2026-08-19 10:57:35', '2026-09-08 15:13:29'),
(18, 'social_instagram', 'https://instagram.com/smartverse.id', 'social', 'Instagram', 'text', '2026-08-19 10:57:35', '2026-09-08 15:13:29'),
(19, 'company_legal_name', 'SmartVerse (smartverse.id)', 'general', 'Nama Badan Usaha', 'text', '2026-08-30 12:10:32', '2026-09-08 15:14:21'),
(24, 'contact_phone_wa_profile', '0896 9524 9089', 'contact', 'WhatsApp Resmi Profile', 'text', '2026-08-30 12:10:32', '2026-09-08 16:08:35'),
(27, 'stats_clients', '150+', 'stats', 'Statistik Klien Puas', 'text', '2026-08-30 13:25:38', '2026-08-30 13:25:38'),
(28, 'stats_projects', '85+', 'stats', 'Statistik Sistem Selesai', 'text', '2026-08-30 13:25:38', '2026-08-30 13:25:38'),
(29, 'stats_satisfaction', '99.8%', 'stats', 'Statistik Kepuasan Client', 'text', '2026-08-30 13:25:38', '2026-08-30 13:25:38'),
(30, 'stats_experience', '8+ Thn', 'stats', 'Statistik Pengalaman', 'text', '2026-08-30 13:25:38', '2026-08-30 13:25:38'),
(31, 'cta_headline', 'Let''s Work Together', 'general', 'Headline CTA Bawah', 'text', '2026-08-30 13:25:38', '2026-08-30 13:25:38'),
(32, 'cta_description', 'Konsultasikan kebutuhan implementasi solusi digital enterprise dan transformasi teknologi terpadu bersama tim engineer dan konsultan kami.', 'general', 'Deskripsi CTA Bawah', 'textarea', '2026-08-30 13:25:38', '2026-09-08 15:53:14'),
(33, 'theme_primary_color', '#0aabae', 'general', NULL, 'text', '2026-08-30 15:28:41', '2026-08-30 15:28:41'),
(34, 'theme_primary_color_text', '#0aabae', 'general', NULL, 'text', '2026-08-30 15:28:41', '2026-08-30 15:28:41'),
(35, 'theme_accent_color', '#fe6000', 'general', NULL, 'text', '2026-08-30 15:28:41', '2026-08-30 15:28:41'),
(36, 'theme_accent_color_text', '#fe6000', 'general', NULL, 'text', '2026-08-30 15:28:41', '2026-08-30 15:28:41'),
(37, 'theme_bg_soft', '#f4f7fe', 'general', NULL, 'text', '2026-08-30 15:28:41', '2026-08-30 15:28:41'),
(38, 'theme_bg_soft_text', '#f4f7fe', 'general', NULL, 'text', '2026-08-30 15:28:41', '2026-08-30 15:28:41'),
(39, 'stats_reviews', '85+', 'general', NULL, 'text', '2026-08-30 15:28:41', '2026-08-30 15:28:41'),
(40, 'site_title', 'SmartVerse (smartverse.id) - Solusi Digital Enterprise & 5 Produk Unggulan', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-09-08 15:49:24'),
(41, 'site_description', 'SmartVerse (smartverse.id) adalah ekosistem teknologi dan rekayasa perangkat lunak enterprise di Indonesia yang menghadirkan 5 solusi produk unggulan: SmartNews (Portal Media Standar Dewan Pers), SmartEdu (Educational ERP Sekolah Islam Terpadu), SmartFeed (Studio Visual AI Instan), SmartSDM (Mobile HRIS Presensi Biometrik), dan SmartSynth (Lab Forensik Konten AI & Cek Fakta Visual).', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-09-08 15:49:24'),
(42, 'hero_badge', 'Enterprise Digital Agency & Technology Solution', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-09-08 15:49:24'),
(43, 'hero_title_1', 'Satu Ekosistem Cerdas,', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-09-08 15:13:29'),
(44, 'hero_title_2', '5 Kekuatan Transformasi Digital', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-09-08 15:13:29'),
(45, 'portfolio_description', 'Eksplorasi portofolio proyek dan sistem informasi enterprise inovatif yang kami rancang dan kembangkan untuk berbagai instansi pemerintah, institusi pendidikan, dan perusahaan nasional. Klik foto portofolio untuk melihat galeri tampilan layar aplikasi.', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-08-30 15:38:56'),
(46, 'company_name', 'SmartVerse', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-09-08 15:13:29'),
(47, 'company_address_line1', 'Jl. Sarjana, Timbangan, Ogan Ilir', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-08-30 15:38:56'),
(48, 'company_address_line2', 'Sumatera Selatan, Indonesia', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-08-30 15:38:56'),
(49, 'company_postal_code', '30862', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-08-30 15:38:56'),
(50, 'site_website', 'smartverse.id', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-09-08 15:13:29'),
(51, 'company_address', 'Jalan Sarjana Blok A No. 25 Timbangan, Ogan Ilir, 30862', 'general', NULL, 'text', '2026-08-30 15:38:56', '2026-08-30 15:38:56'),
(52, 'about_badge', 'TENTANG SMARTVERSE', 'general', NULL, 'text', '2026-08-30 17:21:17', '2026-09-08 15:13:29'),
(53, 'about_title', 'Ekosistem Solusi Teknologi & Rekayasa Perangkat Lunak Enterprise', 'general', NULL, 'text', '2026-08-30 17:21:17', '2026-09-08 15:49:24'),
(54, 'about_description', 'SmartVerse (smartverse.id) adalah ekosistem inovasi teknologi dan produk digital terintegrasi yang menghadirkan solusi perangkat lunak mutakhir untuk sektor media jurnalisme, institusi pendidikan Islam, manajemen SDM korporasi, otomatisasi konten visual AI, serta forensik digital saintifik. Didukung arsitektur software berstandar industri dan teknologi artificial intelligence modern.', 'general', NULL, 'text', '2026-08-30 17:21:17', '2026-09-08 15:49:24'),
(55, 'about_button_text', 'Pelajari Selengkapnya', 'general', NULL, 'text', '2026-08-30 17:21:17', '2026-08-30 17:21:17'),
(56, 'about_button_url', '/services', 'general', NULL, 'text', '2026-08-30 17:21:17', '2026-08-30 17:21:17'),
(57, 'about_image', '/uploads/settings/1788110563_sdWzPzpF.webp', 'general', NULL, 'text', '2026-08-30 17:21:17', '2026-08-30 17:22:44'),
(58, 'hero_image', '/uploads/settings/1791547813_hJIyE1figANbpPks.webp', 'general', NULL, 'text', '2026-08-30 17:53:10', '2026-10-09 12:10:13'),
(59, 'og_image', '/uploads/settings/1788112520_ATEH7Bt9.webp', 'general', NULL, 'text', '2026-08-30 17:55:20', '2026-08-30 17:55:20');
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `label`, `type`, `created_at`, `updated_at`) VALUES
(60, 'site_meta_title', 'SmartVerse (smartverse.id) - Solusi Digital Enterprise & 5 Produk Unggulan', 'general', NULL, 'text', NULL, '2026-09-08 15:49:24'),
(61, 'site_meta_description', 'SmartVerse adalah payung inovasi digital yang menaungi 5 produk unggulan: SmartNews, SmartEdu, SmartFeed, SmartSDM, dan SmartSynth. Sekali bayar untuk kepemilikan permanen.', 'general', NULL, 'text', NULL, '2026-09-08 15:13:29'),
(62, 'site_logo', '/images/smartverse/logo-smartverse.webp', 'general', NULL, 'text', NULL, '2026-09-08 15:27:04'),
(63, 'site_url', 'https://smartverse.id', 'general', NULL, 'text', NULL, '2026-09-08 15:13:29'),
(64, 'company_brand', 'SmartVerse', 'general', NULL, 'text', NULL, '2026-09-08 15:13:29'),
(65, 'contact_whatsapp', '089695249089', 'general', NULL, 'text', NULL, '2026-09-08 15:13:29'),
(66, 'social_facebook', 'https://www.facebook.com/profile.php?id=61593862816388', 'social', 'Facebook Page', 'text', NULL, '2026-09-08 16:08:35'),
(67, 'meta_keywords', 'smartverse, smartverse.id, smartnews, smartedu, smartfeed, smartsdm, smartsynth, produk digital indonesia, software house palembang, portal berita dewan pers, erp sekolah islam terpadu, hris presensi wajah liveness, studio visual ai, lab forensik ai', 'general', NULL, 'text', NULL, '2026-09-08 15:13:29'),
(68, 'visitor_offset', '153563', 'general', 'Offset Baseline Pengunjung (Branding Counter)', 'number', '2026-09-09 18:48:11', '2026-09-09 18:48:11'),
(69, 'client_partner_title', 'Client & Partner Kami', 'general', NULL, 'text', '2026-10-09 12:10:13', '2026-10-09 12:10:13'),
(70, 'client_partner_subtitle', 'Dipercaya Oleh Instansi Pemerintah, Perguruan Tinggi & Perusahaan Mitra', 'general', NULL, 'text', '2026-10-09 12:10:13', '2026-10-09 12:10:13'),
(71, 'client_partner_list_1', 'Kementerian Komunikasi dan Digital RI (Komdigi)
New Zealand BodyTalk Alliance (Selandia Baru)
Universitas Sriwijaya (Unsri)
Politeknik Akamigas Palembang
Dinas Koperasi Kab. Ogan Ilir
Master Your Muscles (Kuala Lumpur, Malaysia)
Pemerintah Desa Senuro Timur Ogan Ilir
Ikatan Guru Indonesia (IGI) Ogan Ilir
PT. Duta Solusi Rumput Palembang', 'general', NULL, 'text', '2026-10-09 12:10:13', '2026-10-09 12:10:13'),
(72, 'client_partner_list_2', 'Yayasan As-Salam Jayapura, Papua
SIT Robbani Ogan Ilir
Dompet Sosial Robbani (DSRP)
SMAIT Ishlahul Ummah Prabumulih
SMAIT Raudhatul Ulum
Yayasan Pendidikan Islam Ash-Shaff
Ralenta Learning Center
Koperasi Pegawai Robbani
Penerbit Laya Aksara Jaya
Portal Berita Kabar32.com
Iin''s Cake (Katalog Kuliner & UMKM)', 'general', NULL, 'text', '2026-10-09 12:10:13', '2026-10-09 12:10:13');

-- Dumping data for table `cv_profiles` (1 rows)
INSERT INTO `cv_profiles` (`id`, `full_name`, `title`, `headline`, `email`, `phone`, `website_1`, `website_2`, `github`, `social`, `city`, `avatar_path`, `about_me`, `affiliations`, `certifications`, `skills`, `stats`, `print_config`, `created_at`, `updated_at`) VALUES
(1, 'SEPTA RYAN HIDAYAT', 'Direktur Beranda Teknologi Digital & Founder SmartVerseID', 'CEO | Founder & Software Architect | AI & Tech Educator', 'ryan@berandadigital.net', '0852 6777 4878', 'www.smartverse.id', 'www.berandadigital.net', 'github.com/septaryanhidayat', '@septa_ryan', 'Palembang, Sumatera Selatan', '/images/smartverse/ryan-trainer-hero.webp', 'Profesional Teknologi Informasi, Software Architect, dan AI Specialist dengan fokus pada pengembangan sistem, edukasi digital, dan implementasi Artificial Intelligence (AI). Founder SmartVerse (smartverse.id) dan Direktur Utama CV. Beranda Teknologi Digital yang berhasil merancang dan meluncurkan ekosistem produk digital nasional lintas sektor (EdTech, HRIS, Media, dan AI Multimedia Forensics). Memiliki kemampuan komunikasi publik dan kepakaran edukasi teknologi yang telah dipercaya oleh berbagai institusi strategis seperti Bank Indonesia, Kementerian Komdigi, Media Indonesia, dinas pendidikan, hingga perguruan tinggi.', '[{"role":"Direktur Utama (CEO)","organization":"CV. Beranda Teknologi Digital","period":"2018 - Sekarang","description":"Memimpin arah strategis, inovasi teknologi, dan operasional bisnis perusahaan. Memanajemen tim dalam siklus pengembangan perangkat lunak (SDLC) serta manajemen proyek IT yang menghadirkan solusi digital bagi sektor bisnis lokal hingga internasional."},{"role":"Founder & Chief Architect","organization":"SmartVerseID (smartverse.id)","period":"2023 - Sekarang","description":"Menggagas dan membangun ekosistem produk digital terpadu (umbrella brand) yang menaungi 5 lini produk SaaS unggulan: SmartEdu (ERP Sekolah Terintegrasi & RAG AI), SmartSDM (Mobile HRIS Biometrik Liveness & Anti-Mock GPS), SmartSynth (Lab Forensik Konten AI & C2PA), SmartNews (CMS Media Standar Dewan Pers), dan SmartFeed (Studio Visual AI Marketing). Merancang arsitektur monolitik modern berbasis Laravel 13, PHP 8.4, dan React Native."},{"role":"Dewan Pakar","organization":"Ikatan Guru Indonesia (IGI) Kabupaten Ogan Ilir","period":"2022 - Sekarang","description":"Memberikan arahan strategis, wawasan kepakaran, dan pendampingan berkelanjutan terkait implementasi teknologi informasi, inovasi coding, dan digitalisasi pendidikan bagi ekosistem pengajar di tingkat daerah hingga nasional."},{"role":"Sekretaris","organization":"Yayasan Generasi Robbani Sumatera Selatan","period":"2020 - Sekarang","description":"Mengelola unit sekolah dari TK s\/d SMA di Kabupaten Ogan Ilir dalam perumusan kebijakan kelembagaan, transformasi digital sekolah, dan tata kelola organisasi."}]', '[{"name":"Microsoft Certified: Azure AI Fundamentals","issuer":"Microsoft","year":"2024","description":"Keahlian komprehensif dalam merancang dan mengimplementasikan beban kerja Artificial Intelligence (AI) dan Machine Learning pada komputasi awan Microsoft Azure."},{"name":"Google Developer: Cloud Skill Badge - Machine Learning & Web Technologies","issuer":"Google Cloud","year":"2024","description":"Kompetensi teknis dalam memadukan teknologi web modern dengan pemrosesan Machine Learning untuk aplikasi yang skalabel."},{"name":"Red Hat Training & Certification: Enterprise Application Development & IT Infrastructure","issuer":"Red Hat","year":"2023","description":"Lisensi standar industri untuk pengembangan aplikasi skala enterprise dan manajemen infrastruktur IT berbasis open-source."},{"name":"Amazon Web Services (AWS) Certified Developer - Associate \/ Machine Learning","issuer":"Amazon Web Services","year":"2024","description":"Kapabilitas dalam merancang, membangun, dan memelihara aplikasi cerdas berbasis cloud di ekosistem AWS (serverless, scalable architectures, dan integrasi ML)."},{"name":"Cybersecurity & Secure Coding Practitioner","issuer":"Cybersecurity Council","year":"2024","description":"Menguasai prinsip-prinsip keamanan siber esensial dan forensik digital dalam SDLC, memastikan arsitektur pertahanan yang kuat terhadap kerentanan data."},{"name":"Flutter Certified Developer","issuer":"Mobile Developer Association","year":"2023","description":"Kemampuan spesifik dalam pengembangan aplikasi mobile lintas platform (cross-platform) berkinerja tinggi dengan UI\/UX intuitif."}]', '[{"category":"AI & Emerging Tech","items":["Python","Prompt Engineering","Retrieval-Augmented Generation (RAG)","AI Forensics (C2PA 2.4, 2D FFT, ELA)","Virtual Reality (VR)","Augmented Reality (AR)","LLM Integration"]},{"category":"Software Architecture & Web","items":["Laravel 13","PHP 8.4","RESTful API","Multi-Tenancy Architecture","JavaScript (ES6+)","Tailwind CSS","Alpine.js","MySQL","SQLite","WordPress","Git\/GitHub"]},{"category":"Mobile Development","items":["React Native (Expo SDK 52)","Flutter","Android Studio","Biometric Liveness","Haversine Geofencing","Push Notification"]}]', '{"years_exp":"8+","events_count":"65+","alumni_count":"3,500+","projects_count":"40+"}', '{"show_flyers_appendix":true,"show_contact_qr":true,"show_certifications":true,"show_projects":true,"watermark_text":"OFFICIAL RESUME - SEPTA RYAN HIDAYAT"}', '2026-10-09 11:20:55', '2026-10-09 11:20:55');

-- Dumping data for table `cv_activities` (22 rows)
INSERT INTO `cv_activities` (`id`, `cv_profile_id`, `type`, `title`, `category`, `organizer`, `year`, `event_date`, `location`, `url`, `description`, `flyer_path`, `pdf_path`, `is_featured`, `show_in_print`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'speaker', 'Narasumber Utama, Kolaborasi Bank Indonesia (KPW BI Sulawesi Tenggara) & Media Indonesia', 'Keynote / Capacity Building', 'Bank Indonesia (KPW BI Sultra) & Media Indonesia', '2026', NULL, 'Aveta Hotel Malioboro, Yogyakarta', NULL, 'Mengisi agenda Capacity Building bertema "AI for Modern Journalism - Meningkatkan Kompetensi Wartawan dalam Pemanfaatan Artificial Intelligence untuk Jurnalisme yang Lebih Berkualitas, Efisien, dan Berdaya Saing" di Aveta Hotel Malioboro, Yogyakarta. Membekali puluhan jurnalis terkait etika AI, otomasi riset berita, verifikasi fakta visual, dan produktivitas ruang redaksi modern.', '/images/Insight-Talks-Komdigi.jpeg', NULL, 1, 1, 1, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(2, 1, 'speaker', 'Trainer Workshop Insight Talk bersama Kementerian Komdigi dan Media Indonesia', 'Workshop Jurnalistik & AI', 'Kementerian Komunikasi dan Digital RI (Komdigi) & Media Indonesia', '2026', NULL, 'Sumatera Selatan', NULL, 'Menjadi trainer di hadapan rekan-rekan jurnalis dan tim komdigi perwakilan se-Sumatera Selatan, membahas terkait pemanfaatan Tools AI dalam menunjang aktifitas sehari-hari terutama di dunia jurnalis.', '/images/Insight-Talks-Komdigi.jpeg', NULL, 1, 1, 2, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(3, 1, 'speaker', 'Trainer Utama, Politeknik Akamigas Palembang', 'Lecturer Development Program', 'Politeknik Akamigas Palembang', '2026', NULL, 'Kampus Akamigas, Palembang', NULL, 'Mengisi Lecturer Development Program bertema "Pelatihan Pemanfaatan AI untuk Pembuatan Aplikasi Praktis dan Profesional Tanpa Coding" bagi kalangan akademisi dan dosen teknik.', NULL, NULL, 1, 1, 3, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(4, 1, 'speaker', 'Narasumber Ahli, Dinas Pendidikan Kabupaten OKU Timur', 'Inovasi Pendidikan & AI', 'Dinas Pendidikan Kabupaten OKU Timur', '2025', NULL, 'OKU Timur, Sumatera Selatan', NULL, 'Mengisi agenda strategis pemerintah daerah bertema "Inovasi Pembelajaran Berbasis Coding dan AI dalam Kerangka Penguatan Kelembagaan Sekolah bagi Tenaga Pendidik".', NULL, NULL, 1, 1, 4, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(5, 1, 'speaker', 'Instruktur Teknologi Akademik, Universitas Sriwijaya (UNSRI)', 'Pelatihan Tata Kelola Kampus', 'Universitas Sriwijaya (UNSRI)', '2024', NULL, 'Indralaya / Palembang', NULL, 'Mengedukasi jajaran dosen dan tenaga kependidikan kampus melalui pelatihan manajerial tata kelola digital bertajuk "Managing and Documenting Files for Enhancing Work Effectiveness".', NULL, NULL, 1, 1, 5, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(6, 1, 'speaker', 'Pemateri Nasional Kolaborasi IGI Kabupaten Ogan Ilir', 'Pelatihan Daring Nasional', 'Ikatan Guru Indonesia (IGI) Kabupaten Ogan Ilir', '2022', NULL, 'Daring Nasional (2.200+ Pendidik)', NULL, 'Merancang dan memimpin pelatihan daring berskala masif untuk lebih dari 2.200 guru se-Indonesia dalam program "Satu Guru Satu Aplikasi Android", mendorong kemandirian pendidik menciptakan media pembelajaran interaktif.', NULL, NULL, 1, 1, 6, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(7, 1, 'project', 'SmartVerse.id - 5 Flagship SaaS Ecosystem', 'Proprietary SaaS Ecosystem', 'SmartVerseID & CV. Beranda Teknologi Digital', '2024 - 2026', NULL, 'Palembang & Nasional', 'https://smartverse.id', 'Menaungi 5 lini produk SaaS unggulan: SmartEdu (ERP Sekolah & RAG AI), SmartSDM (Mobile HRIS Biometrik Liveness & Anti-Mock GPS), SmartSynth (Lab Forensik Konten AI & C2PA), SmartNews (CMS Media Standar Dewan Pers), dan SmartFeed (Studio Visual AI Marketing). Berbasis Laravel 13, PHP 8.4, dan React Native.', '/images/smartverse/logo-smartverse.webp', NULL, 1, 1, 1, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(8, 1, 'project', 'SmartEdu SIT Robbani (Enterprise School ERP)', 'EdTech & School Management', 'SIT Robbani Ogan Ilir', '2023 - 2026', NULL, 'Ogan Ilir, Sumatera Selatan', 'https://sitrobbani.sch.id', 'Merancang arsitektur sistem informasi enterprise terpadu untuk SIT Robbani Ogan Ilir (23+ modul, SPMB Online 5-step smart wizard ber-auto-save, generator PDF 4-halaman siap cetak, e-SPP billing, raport digital JSIT, dan chatbot RAG AI cerdas).', '/images/smartverse/SmartEDU.webp', NULL, 1, 1, 2, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(9, 1, 'project', 'Pondok Pesantren Raudhatul Ulum Sakatiga', 'EdTech & Portal Pesantren', 'Ponpes Raudhatul Ulum Sakatiga', '2024 - 2026', NULL, 'Ogan Ilir, Sumatera Selatan', 'https://ppru.ac.id', 'Mengembangkan website resmi & portal informasi Ponpes Raudhatul Ulum Sakatiga (Laravel 13, Tailwind CSS v4, dynamic CMS beranda, portal PSB online, infaq/wakaf pembangunan, dan otomasi pengujian sistem dengan 58 Pest test suites).', NULL, NULL, 1, 1, 3, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(10, 1, 'project', 'Hinewai Skin & Beauty (Australia)', 'Global & International Projects', 'Hinewai Australia', '2023 - 2024', NULL, 'Australia', NULL, 'Merancang dan mengembangkan platform e-commerce premium untuk operasional penjualan produk kosmetik dan perawatan kulit di pasar Australia.', NULL, NULL, 1, 1, 4, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(11, 1, 'project', 'Buffalo Horn and E-Course (Australia)', 'Global & International Projects', 'Buffalo Horn Australia', '2023 - 2024', NULL, 'Australia', NULL, 'Mengembangkan platform e-commerce terintegrasi sekaligus sistem e-learning (kursus daring) untuk operasional komersial di Australia.', NULL, NULL, 1, 1, 5, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(12, 1, 'project', 'Master Your Muscles (Malaysia)', 'Global & International Projects', 'Master Your Muscles Kuala Lumpur', '2024', NULL, 'Kuala Lumpur, Malaysia', NULL, 'Mengembangkan platform e-commerce dan sistem pemesanan pelatihan bagi jaringan praktisi kesehatan internasional.', NULL, NULL, 1, 1, 6, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(13, 1, 'project', 'NZBodyTalk Alliance (Selandia Baru)', 'Global & International Projects', 'NZBodyTalk Alliance New Zealand', '2023', NULL, 'Selandia Baru (New Zealand)', NULL, 'Membangun sistem pendaftaran dan portal keanggotaan terintegrasi untuk aliansi komunitas praktisi BodyTalk di Selandia Baru.', NULL, NULL, 1, 1, 7, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(14, 1, 'project', 'Akselerasi Kesehatan Ibu & Anak (Magenta & Sekanak)', 'Health, Medical & Nutrition Tech', 'Tim Riset & Inovasi Kesehatan', '2023 - 2025', NULL, 'Palembang & Nasional', 'https://magenta.aplikasikesehatan.com', 'Mengembangkan aplikasi Magenta (Monitoring Status Gizi & Edukasi Anak Balita dengan kalkulasi skor WHO-Z berbasis cloud) dan Sekanak (Aplikasi Pemantauan gizi, riwayat imunisasi, dan morbiditas balita di sekanak.aplikasikesehatan.com).', NULL, NULL, 1, 1, 8, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(15, 1, 'project', 'Riset & Sistem Informasi Kesehatan (Kolaborasi FKM UNSRI)', 'Health, Medical & Nutrition Tech', 'Fakultas Kesehatan Masyarakat UNSRI', '2022 - 2024', NULL, 'Palembang', NULL, 'Merancang aplikasi DERI PTM untuk deteksi dini risiko Penyakit Tidak Menular, platform Lapor Vaksin Covid-19, serta Zikari (aplikasi pemantauan asupan gizi mahasiswa).', NULL, NULL, 1, 1, 9, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(16, 1, 'project', 'Aplikasi Penilaian Bulutangkis Unsri — SA''BAWA', 'EdTech & Gamifikasi Olahraga', 'Dosen Penjas FKIP Universitas Sriwijaya', '2024', NULL, 'Indralaya, Ogan Ilir', 'https://sa-badmintonapp.com', 'Membangun "SA''BAWA - Badminton Assessment WebApp" untuk digitalisasi pengolahan nilai ilmiah 4 teknik bulutangkis berbasis Laravel 13, Tailwind CSS, Alpine.js, kalkulasi norma otomatis, dan offline-first local storage persistence.', NULL, NULL, 1, 1, 10, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(17, 1, 'project', 'Portal Profil & Akademik SMPS & SMA IT Ishlahul Ummah Prabumulih', 'EdTech & School Management', 'Yayasan Ishlahul Ummah Prabumulih', '2024', NULL, 'Prabumulih, Sumatera Selatan', 'https://smpitishumpbm.sch.id', 'Membangun portal profil dan sistem informasi akademik SMP IT & SMA IT Ishum berstandar JSIT Indonesia (Laravel 13, Tailwind CSS v4, modul SPMB online, manajemen GTK, dan modul ajar siswa).', NULL, NULL, 1, 1, 11, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(18, 1, 'project', 'Sistem Informasi & Website PWI Kabupaten Banyuasin', 'Institutional & Association', 'Persatuan Wartawan Indonesia (PWI) Banyuasin', '2024', NULL, 'Banyuasin, Sumatera Selatan', 'https://pwiba.or.id', 'Membangun portal informasi dan sistem manajemen administrasi PWI Banyuasin: pemetaan wartawan berdasar tingkatan UKW (Muda, Madya, Utama), direktori media mitra, serta generator surat dinas otomatis (Surat Tugas, Audiensi) ber-KOP resmi.', NULL, NULL, 1, 1, 12, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(19, 1, 'project', 'Sistem Informasi Keanggotaan DPD APPSI Banyuasin', 'Institutional & Association', 'DPD APPSI Kab. Banyuasin', '2024', NULL, 'Banyuasin, Sumatera Selatan', 'https://appsiba.or.id', 'Mengembangkan portal resmi & pendaftaran keanggotaan Asosiasi Pedagang Pasar Seluruh Indonesia: direktori pedagang pasar tradisional multi-komoditas, registrasi online 1-click approval NPA, cetak KTA digital ber-QR, serta manajemen surat dinas TTE verifikasi QR.', NULL, NULL, 1, 1, 13, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(20, 1, 'project', 'Digitalisasi Pariwisata & Budaya Lubuk Linggau', 'Cultural Preservation & Tourism', 'Komunitas Budaya Jelajah Sejarah', '2023 - 2024', NULL, 'Lubuk Linggau, Sumatera Selatan', 'https://karitcaunpari.com', 'Membangun ekosistem digital untuk pelestarian sejarah lokal melalui platform Jelajah Sejarah Batu Urip (karitcaunpari.com) dan komunitas KAMSEDA SEYU (kamsedaseyu.com).', NULL, NULL, 1, 1, 14, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(21, 1, 'project', 'Sistem Manajemen Ziswaf & Kerelawanan (Dompet Sosial Robbani)', 'Social Enterprise & ZISWAF', 'Dompet Sosial Robbani (DSRP)', '2023 - 2025', NULL, 'Ogan Ilir, Sumatera Selatan', 'https://dsrp.or.id', 'Mengembangkan aplikasi operasional dan basis data relawan untuk lembaga Zakat, Infaq, Sadaqah, dan Waqf pada Dompet Sosial Robbani (dsrp.or.id).', NULL, NULL, 1, 1, 15, '2026-10-09 11:20:55', '2026-10-09 11:20:55'),
(22, 1, 'project', 'E-Kantin Assalaam Papua & Robbani Mart / Kursus', 'POS Cashless & E-Commerce', 'Assalaam Papua & Koperasi Robbani', '2023 - 2024', NULL, 'Jayapura, Papua & Ogan Ilir', 'https://assalaampapua.com/kantin', 'Merancang sistem kasir digital (POS) dan dompet santri non-tunai (cashless canteen) untuk ekosistem pesantren/sekolah Assalaam di Papua, platform e-commerce warung Robbani Mart, dan pendaftaran kursus robbanikursus.com.', NULL, NULL, 1, 1, 16, '2026-10-09 11:20:55', '2026-10-09 11:20:55');

-- Dumping data for table `visitor_logs` (59 rows)
INSERT INTO `visitor_logs` (`id`, `ip_address`, `session_id`, `device_type`, `browser`, `os`, `url`, `page_title`, `referer`, `traffic_source`, `country`, `city`, `user_agent`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'NIlPwuXsSIC6Nxot9T11n2CeUFy3kmabTcihWDdZ', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-09 18:58:44', '2026-09-09 18:58:44'),
(2, '127.0.0.1', 'GY5BFPAku4aCdQXghthmBv30xVAt9CvrnJLSBXjU', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', 'http://smartverse.test/admin/invoices', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-09 19:01:31', '2026-09-09 19:01:31'),
(3, '127.0.0.1', 'LkwOCxd7yhO4gSFBkWL7PVXbeZnclqEzfT99PbBN', 'Desktop', 'Chrome', 'Windows 10/11', '/?herd=preview', 'Beranda', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.30.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', '2026-09-11 14:01:56', '2026-09-11 14:01:56'),
(4, '127.0.0.1', 'qEDuS4BgUwmatE5Cml3rY4A5NHUhmVWow6B12M00', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-12 09:26:26', '2026-09-12 09:26:26'),
(5, '127.0.0.1', 'r1XGqn4TuqKEBN02JwZOe1Ai5xivqh39iQtoieNl', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 09:25:38', '2026-10-09 09:25:38'),
(6, '127.0.0.1', 'mNSxGNAc7M0YZcLwKDlUlAgDRxyaFbwcfPyRaYtI', 'Desktop', 'Chrome', 'Windows 10/11', '/?herd=preview', 'Beranda', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.30.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', '2026-10-09 09:25:38', '2026-10-09 09:25:38'),
(7, '127.0.0.1', 'CnRs4bkm9rR9f1IkphK9LphLAEFTIxSAF9tV5Tub', 'Desktop', 'Chrome', 'Windows', '/panduan-pemesanan', 'Panduan Pemesanan', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Symfony', '2026-10-09 10:25:50', '2026-10-09 10:25:50'),
(8, '127.0.0.1', 'kOkg8nbKrAbqp3OIdHPfIEjaOmNmtGwlbnjd4QiL', 'Desktop', 'Chrome', 'Windows', '/order-guide', 'Order Guide', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Symfony', '2026-10-09 10:25:55', '2026-10-09 10:25:55'),
(9, '127.0.0.1', 'cfF4iml48qkLYBKrUdcpov0pOC8QiG70fhDfnLcT', 'Desktop', 'Chrome', 'Windows', '/', 'Beranda', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Symfony', '2026-10-09 10:25:57', '2026-10-09 10:25:57'),
(10, '127.0.0.1', 'r1XGqn4TuqKEBN02JwZOe1Ai5xivqh39iQtoieNl', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 11:15:04', '2026-10-09 11:15:04'),
(11, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/panduan-pemesanan', 'Panduan Pemesanan', 'http://smartverse.test/admin/panduan-pemesanan', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 11:22:11', '2026-10-09 11:22:11'),
(12, '127.0.0.1', 'CwFNilz3OWyuNbduXpWx38dmNXTpQalcHUZnbcof', 'Desktop', 'Chrome', 'Windows', '/cv', 'Cv', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Symfony', '2026-10-09 11:28:29', '2026-10-09 11:28:29'),
(13, '127.0.0.1', 'EiOKSPkFSGDm02f7oNBaSbGFfV6VziAW4UoWhHOY', 'Desktop', 'Chrome', 'Windows', '/cv/print', 'Cv Print', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Symfony', '2026-10-09 11:28:30', '2026-10-09 11:28:30'),
(14, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', 'http://smartverse.test/admin/galleries', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 11:45:14', '2026-10-09 11:45:14'),
(15, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/products', 'Produk Digital Unggulan', 'http://smartverse.test/', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 11:46:34', '2026-10-09 11:46:34'),
(16, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/services', 'Layanan & Solusi Digital', 'http://smartverse.test/products', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 11:46:38', '2026-10-09 11:46:38'),
(17, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/portfolio', 'Portofolio Proyek', 'http://smartverse.test/services', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 11:48:13', '2026-10-09 11:48:13'),
(18, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/trainer', 'Trainer & Narasumber', 'http://smartverse.test/portfolio', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 11:49:17', '2026-10-09 11:49:17'),
(19, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', 'http://smartverse.test/trainer', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 11:49:21', '2026-10-09 11:49:21'),
(20, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', 'http://smartverse.test/trainer', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 11:54:01', '2026-10-09 11:54:01'),
(21, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', 'http://smartverse.test/trainer', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:00:55', '2026-10-09 12:00:55'),
(22, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', 'http://smartverse.test/trainer', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:01:04', '2026-10-09 12:01:04'),
(23, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', 'http://smartverse.test/trainer', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:02:27', '2026-10-09 12:02:27'),
(24, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/cv', 'Cv', 'http://smartverse.test/admin/cv', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:03:46', '2026-10-09 12:03:46'),
(25, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/cv/print', 'Cv Print', 'http://smartverse.test/admin/cv', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:04:01', '2026-10-09 12:04:01'),
(26, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', 'http://smartverse.test/trainer', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:05:36', '2026-10-09 12:05:36'),
(27, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/blog', 'Blog & Tech Insights', 'http://smartverse.test/', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:05:38', '2026-10-09 12:05:38'),
(28, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/trainer', 'Trainer & Narasumber', 'http://smartverse.test/blog', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:05:41', '2026-10-09 12:05:41'),
(29, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', 'http://smartverse.test/trainer', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:05:57', '2026-10-09 12:05:57'),
(30, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', 'http://smartverse.test/about', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:06:33', '2026-10-09 12:06:33'),
(31, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', 'http://smartverse.test/about', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:10:00', '2026-10-09 12:10:00'),
(32, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', 'http://smartverse.test/about', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:10:17', '2026-10-09 12:10:17'),
(33, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', 'http://smartverse.test/about', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:11:58', '2026-10-09 12:11:58'),
(34, '127.0.0.1', 'apnWdycppRiiRJckwiuGWPLPKae5x8YkdmNuVSNn', 'Desktop', 'Chrome', 'Windows', '/', 'Beranda', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Symfony', '2026-10-09 12:20:56', '2026-10-09 12:20:56'),
(35, '127.0.0.1', '1oZnG4caAxQKvjciQW6LcSz4HBEwfnUbIQNeGTbX', 'Desktop', 'Chrome', 'Windows', '/services', 'Layanan & Solusi Digital', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Symfony', '2026-10-09 12:20:56', '2026-10-09 12:20:56'),
(36, '127.0.0.1', 'apcIIEV4oGVDMiGc3S8irbJmyZbImMWlj1tG5Bxy', 'Desktop', 'Chrome', 'Windows', '/products', 'Produk Digital Unggulan', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Symfony', '2026-10-09 12:20:56', '2026-10-09 12:20:56'),
(37, '127.0.0.1', 'tD4yd2GGM8ipKllwzhhnnbWYcQtJgPXEaR5pVFgB', 'Desktop', 'Chrome', 'Windows', '/products?per_page=5', 'Produk Digital Unggulan', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Symfony', '2026-10-09 12:20:56', '2026-10-09 12:20:56'),
(38, '127.0.0.1', 'AGMrwsQZxP2hOR0tdNK7QOR8dRdewterALVFwnRn', 'Desktop', 'Chrome', 'Windows', '/blog', 'Blog & Tech Insights', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Symfony', '2026-10-09 12:20:56', '2026-10-09 12:20:56'),
(39, '127.0.0.1', '1wNISkVUs7kxhZLfDmq4bx6vyDZ2BXfZzeWRsDHB', 'Desktop', 'Chrome', 'Windows', '/blog?per_page=5', 'Blog & Tech Insights', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Symfony', '2026-10-09 12:20:56', '2026-10-09 12:20:56'),
(40, '127.0.0.1', 'oCnuCm2FPAczHqx1O56rUuYcz6BxiujILfPgM5J6', 'Desktop', 'Chrome', 'Windows', '/', 'Beranda', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Symfony', '2026-10-09 12:21:13', '2026-10-09 12:21:13'),
(41, '127.0.0.1', 'CUKRduQvrcTPtrBWFfuyQBXn5wPx7xcDPLu45EAF', 'Desktop', 'Chrome', 'Windows', '/services', 'Layanan & Solusi Digital', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Symfony', '2026-10-09 12:21:13', '2026-10-09 12:21:13'),
(42, '127.0.0.1', 'MImwpOWO0enfYeioCyiII0eiVABQv083axDnvKaY', 'Desktop', 'Chrome', 'Windows', '/products', 'Produk Digital Unggulan', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Symfony', '2026-10-09 12:21:13', '2026-10-09 12:21:13'),
(43, '127.0.0.1', '9nG3S3F0WGDI43R92XZdCn9B0QTRX5SxuZ1E9lkA', 'Desktop', 'Chrome', 'Windows', '/products?per_page=5', 'Produk Digital Unggulan', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Symfony', '2026-10-09 12:21:13', '2026-10-09 12:21:13'),
(44, '127.0.0.1', 'xXMKP7hSdTyrQFRwURiCEeUcFhuwCoK34oHgjYaC', 'Desktop', 'Chrome', 'Windows', '/projects', 'Projects', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Symfony', '2026-10-09 12:21:13', '2026-10-09 12:21:13'),
(45, '127.0.0.1', 'p1SkZfACbR86N69hH1pZ1lMMHIO2DBcUOu7v7H8A', 'Desktop', 'Chrome', 'Windows', '/projects?per_page=5', 'Projects', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Symfony', '2026-10-09 12:21:13', '2026-10-09 12:21:13'),
(46, '127.0.0.1', 'Kq9v9HgijkQ0KnvZL6GEnNaKFItFi2ZihGlXL8t0', 'Desktop', 'Chrome', 'Windows', '/blog', 'Blog & Tech Insights', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Symfony', '2026-10-09 12:21:13', '2026-10-09 12:21:13'),
(47, '127.0.0.1', 'a05AIe0FoJMr0PQIye9prYlZ849wLtqiYpcWUdwD', 'Desktop', 'Chrome', 'Windows', '/blog?per_page=5', 'Blog & Tech Insights', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Symfony', '2026-10-09 12:21:13', '2026-10-09 12:21:13'),
(48, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', 'http://smartverse.test/about', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:43:45', '2026-10-09 12:43:45'),
(49, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', 'http://smartverse.test/about', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:43:48', '2026-10-09 12:43:48'),
(50, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/panduan-pemesanan', 'Panduan Pemesanan', 'http://smartverse.test/admin/panduan-pemesanan', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:45:13', '2026-10-09 12:45:13');
INSERT INTO `visitor_logs` (`id`, `ip_address`, `session_id`, `device_type`, `browser`, `os`, `url`, `page_title`, `referer`, `traffic_source`, `country`, `city`, `user_agent`, `created_at`, `updated_at`) VALUES
(51, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/products', 'Produk Digital Unggulan', 'http://smartverse.test/', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:50:42', '2026-10-09 12:50:42'),
(52, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/services', 'Layanan & Solusi Digital', 'http://smartverse.test/products', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:50:48', '2026-10-09 12:50:48'),
(53, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/portfolio', 'Portofolio Proyek', 'http://smartverse.test/services', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:50:51', '2026-10-09 12:50:51'),
(54, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/trainer', 'Trainer & Narasumber', 'http://smartverse.test/portfolio', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:50:55', '2026-10-09 12:50:55'),
(55, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/blog', 'Blog & Tech Insights', 'http://smartverse.test/trainer', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:50:59', '2026-10-09 12:50:59'),
(56, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', 'http://smartverse.test/blog', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 12:51:03', '2026-10-09 12:51:03'),
(57, '127.0.0.1', 'FxZY0RUPfMPMdh3Fze5LFNcLWwhEiZTEbyZ9GyKS', 'Desktop', 'Chrome', 'Windows 10/11', '/cv', 'Cv', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 13:09:43', '2026-10-09 13:09:43'),
(58, '127.0.0.1', '7Chbuu9So0WKaa4Nxnf1PthQyxpRyukieyAsFYgC', 'Desktop', 'Chrome', 'Windows 10/11', '/cv/print', 'Cv Print', NULL, 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 13:10:44', '2026-10-09 13:10:44'),
(59, '127.0.0.1', '3gd6f8UmEwVidBgPH2gUiKAtApSibxfPs02mC9xt', 'Desktop', 'Chrome', 'Windows 10/11', '/', 'Beranda', 'http://smartverse.test/blog', 'Langsung (Direct)', 'Indonesia', 'Palembang', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', '2026-10-09 13:14:43', '2026-10-09 13:14:43');

SET FOREIGN_KEY_CHECKS = 1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;