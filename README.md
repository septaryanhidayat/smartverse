# SmartVerse (smartverse.id)
> **Umbrella Brand Ekosistem Produk Digital Terpadu & AI Solutions**

SmartVerse adalah platform portal payung (*umbrella brand*) yang menaungi 5 lini produk digital unggulan berbasis teknologi modern Laravel 13 dan PHP 8.4, melayani kebutuhan transformasi digital sektor media, pendidikan, SDM korporasi, otomatisasi konten kreatif AI, serta forensik digital saintifik.

---

## 🚀 5 Produk Digital Utama SmartVerse

1. **SmartNews (Platform Media Online & Portal Berita Modern)**
   - Standar regulasi Dewan Pers & Pedoman Pemberitaan Media Siber.
   - Sistem redaksi multi-role (Reporter, Editor, Redaktur, Pemred).
   - Core Web Vitals optimized, skor SEO 95+, PWA & AMP, loading super cepat.
   - Manajemen slot iklan mandiri & integrasi Google AdSense.

2. **SmartEdu (All-in-One Educational ERP Sekolah Islam Terpadu)**
   - Ekosistem ERP terpadu untuk yayasan dan sekolah multi-unit (TK, SD, SMP, SMA/SMK).
   - Modul khusus Tahfidz Quran, mutabaah yaumiyah, dan setoran hafalan.
   - Billing SPP otomatis berbasis Virtual Account (VA) & notifikasi WhatsApp Gateway.
   - Portal orang tua / aplikasi wali santri & e-Raport digital terintegrasi.

3. **SmartFeed (Studio Visual AI & Otomasi Konten Promosi Media Sosial)**
   - Studio kreatif AI pengubah ide promosi menjadi banner visual resolusi tinggi (Feed & Story).
   - Smart Copywriter berbasis formula psikologi penjualan (AIDA/PAS) dan hook viral.
   - Kalender konten dan penjadwalan publikasi otomatis multi-platform.
   - Export format siap unggah untuk UMKM, startup, dan agensi.

4. **SmartSDM (Aplikasi Mobile HRIS Presensi Wajah Liveness & Anti-Fake GPS)**
   - Presensi biometrik wajah dengan teknologi *Liveness Detection* (anti-foto, anti-topeng).
   - Proteksi ketat *Geofencing* akurat & *Anti-Mock Location* (anti-fake GPS).
   - Pengajuan cuti, izin, sakit, lembur dengan workflow approval berjenjang.
   - Perhitungan otomatis absensi, slip gaji PDF, aplikasi mobile Android & web dashboard admin.

5. **SmartSynth (Lab Forensik Konten AI & Cek Fakta Visual Digital)**
   - **Lapis 1: EXIF Biner Scanner** — Membaca byte biner (*ArrayBuffer*) untuk sensor kamera, GPS, XMP, dan software AI marker.
   - **Lapis 2: Kriptografi C2PA 2.4** — Deteksi kotak biner JUMBF untuk verifikasi *Content Credentials* resmi penerbit (OpenAI, Adobe).
   - **Lapis 3: Real Error Level Analysis (ELA 80%)** — Kompresi matematis differensial mendeteksi anomali editan dan sambungan objek.
   - **Lapis 4: 2D FFT (Fast Fourier Transform) Spektrogram** — Spektrum frekuensi deteksi pola *checkerboard artifacts* khas generator AI difusi/GAN.
   - **Berita Acara SOP Redaksi Resmi** — Ekspor instan dokumen audit forensik siap cetak PDF untuk standar meja redaksi.

---

## 🛠️ Stack Teknologi

- **Backend Framework**: Laravel 13.23.0
- **Runtime**: PHP 8.4.25
- **Frontend & Styling**: Tailwind CSS, Vanilla JS, Blade Templates
- **Bundler & Build Tool**: Vite 8.1.5
- **Database**: SQLite (Local Dev) & MySQL/MariaDB (Production Ready)
- **Database Dump**: `database/berandad_db_btd.sql`

---

## ⚙️ Instalasi & Menjalankan Aplikasi

### 1. Klon Repositori & Install Dependensi
```bash
git clone https://github.com/septaryanhidayat/smartverse.git
cd smartverse
composer install
npm install
```

### 2. Konfigurasi Environment
```bash
cp .env.example .env
php artisan key:generate
php artisan storage:link
```

### 3. Menggunakan Database Terbaru (Dump SQL)
Jalankan skrip import otomatis untuk memuat data kategori, post artikel, proyek portofolio, invoice, galeri, serta 5 produk digital unggulan dari `database/berandad_db_btd.sql`:
```bash
php import_btd.php
```

Atau menggunakan migration & seeder bawaan:
```bash
php artisan migrate --seed
```

### 4. Build Aset & Jalankan Server
```bash
npm run build
php artisan serve
```
Akses website melalui browser di `http://localhost:8000` atau `http://smartverse.test` (jika menggunakan Laravel Herd).

---

## 🔬 Akses Langsung Lab Forensik SmartSynth
Tools forensik interaktif dapat diakses langsung pada:
- **URL**: `http://smartverse.test/forensic/index.html` atau melalui menu produk `/products/smartsynth-lab-forensik-ai`.

---

## 📄 Lisensi
Hak Cipta © 2026 **SmartVerse (smartverse.id)**. Seluruh hak cipta dilindungi undang-undang.
