#!/bin/bash
# ==============================================================================
# SmartVerse (smartverse.id) - cPanel Deployment & Update Automation Script
# Repository Path : /home/pesonaas/repositories/smartverse
# Remote URL      : https://github.com/septaryanhidayat/smartverse.git
# Target PHP      : EA-PHP 8.4 (/usr/local/bin/ea-php84)
# ==============================================================================

set -e

REPO_DIR="/home/pesonaas/repositories/smartverse"
echo "=================================================================="
echo "🚀 Memulai Deployment / Sinkronisasi SmartVerse di cPanel"
echo "=================================================================="

# 1. Navigasi ke direktori repositori
if [ -d "$REPO_DIR" ]; then
    echo "📂 Masuk ke direktori repositori: $REPO_DIR"
    cd "$REPO_DIR"
else
    echo "⚠️ Direktori $REPO_DIR tidak ditemukan!"
    echo "Cloning repositori dari GitHub..."
    mkdir -p /home/pesonaas/repositories
    cd /home/pesonaas/repositories
    git clone https://github.com/septaryanhidayat/smartverse.git
    cd "$REPO_DIR"
fi

# 2. Deteksi binary PHP 8.4 di cPanel (karena terminal default seringkali PHP 8.1)
if [ -f "/usr/local/bin/ea-php84" ]; then
    PHP_BIN="/usr/local/bin/ea-php84"
elif [ -f "/opt/cpanel/ea-php84/root/usr/bin/php" ]; then
    PHP_BIN="/opt/cpanel/ea-php84/root/usr/bin/php"
elif command -v php84 &> /dev/null; then
    PHP_BIN="$(command -v php84)"
elif command -v php8.4 &> /dev/null; then
    PHP_BIN="$(command -v php8.4)"
else
    echo "⚠️ Binary ea-php84 tidak ditemukan di path default. Menggunakan $(which php)..."
    PHP_BIN="$(which php)"
fi

echo "🐘 Menggunakan PHP Binary: $PHP_BIN"
$PHP_BIN -v | head -n 1

# 3. Deteksi binary Composer
if [ -f "/usr/local/bin/composer" ]; then
    COMPOSER_BIN="/usr/local/bin/composer"
elif command -v composer &> /dev/null; then
    COMPOSER_BIN="$(command -v composer)"
elif [ -f "composer.phar" ]; then
    COMPOSER_BIN="composer.phar"
else
    echo "⬇️ Composer tidak ditemukan, mengunduh composer.phar..."
    $PHP_BIN -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    $PHP_BIN composer-setup.php --quiet
    $PHP_BIN -r "unlink('composer-setup.php');"
    COMPOSER_BIN="composer.phar"
fi

# 4. Sinkronisasi Git (Pull code terbaru)
echo "📥 Melakukan Git Pull dari origin main..."
git config --global --add safe.directory "$REPO_DIR" || true
git fetch origin main
git reset --hard origin/main

# 5. Konfigurasi file environment .env
if [ ! -f ".env" ]; then
    echo "📝 File .env belum ada. Menyalin dari .env.example..."
    cp .env.example .env
    $PHP_BIN artisan key:generate --force
    echo "⚠️ Harap sesuaikan kredensial database MySQL Anda di file .env!"
fi

# 6. Install dependensi Composer (Vendor) menggunakan PHP 8.4
echo "📦 Menginstal / Memperbarui dependensi Composer (folder vendor)..."
$PHP_BIN $COMPOSER_BIN install --no-dev --optimize-autoloader --no-interaction

# 7. Buat storage link
echo "🔗 Membuat storage link..."
$PHP_BIN artisan storage:link || true

# 8. Jalankan Database Migration
echo "🗄️ Menjalankan Database Migration..."
$PHP_BIN artisan migrate --force

# 9. Optimasi Cache Laravel
echo "⚡ Membersihkan & Mengoptimasi Cache..."
$PHP_BIN artisan optimize:clear
$PHP_BIN artisan config:cache
$PHP_BIN artisan route:cache
$PHP_BIN artisan view:cache

# 10. Atur Permission direktori
echo "🔒 Mengatur hak akses folder storage & bootstrap/cache..."
chmod -R 775 storage bootstrap/cache || true

echo "=================================================================="
echo "✅ DEPLOYMENT SMARTVERSE BERHASIL DILAKUKAN!"
echo "🌐 URL: https://smartverse.id (atau domain Anda)"
echo "=================================================================="
