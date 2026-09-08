#!/bin/bash
# ══════════════════════════════════════════════════════════════
# DEPLOY SCRIPT - CV. Beranda Teknologi Digital
# Jalankan di cPanel Terminal: bash deploy.sh
# ══════════════════════════════════════════════════════════════

set -e

REPO_PATH="/home/berandad/repositories/btd"
DEPLOY_PATH="/home/berandad/public_html"

echo "═══════════════════════════════════════════════"
echo "🚀 DEPLOY: Beranda Teknologi Digital"
echo "═══════════════════════════════════════════════"

# Step 1: Pull latest dari GitHub
echo ""
echo "📥 [1/5] Pulling latest from GitHub..."
cd "$REPO_PATH"
git fetch origin master
git reset --hard origin/master
echo "✅ Pull selesai: $(git log -1 --oneline)"

# Step 2: Copy semua file ke public_html
echo ""
echo "📂 [2/5] Copying files to public_html..."
/bin/cp -R "$REPO_PATH"/* "$DEPLOY_PATH/"
/bin/cp -R "$REPO_PATH"/public/* "$DEPLOY_PATH/" 2>/dev/null || true
/bin/cp "$REPO_PATH/.htaccess" "$DEPLOY_PATH/" 2>/dev/null || true
/bin/cp "$REPO_PATH/index.php" "$DEPLOY_PATH/" 2>/dev/null || true
echo "✅ Files copied"

# Step 3: Clear Laravel caches
echo ""
echo "🧹 [3/5] Clearing Laravel caches..."
cd "$DEPLOY_PATH"
php artisan optimize:clear 2>/dev/null || echo "⚠️ optimize:clear skipped"
php artisan view:clear 2>/dev/null || echo "⚠️ view:clear skipped"
php artisan config:clear 2>/dev/null || echo "⚠️ config:clear skipped"
echo "✅ Caches cleared"

# Step 4: Set permissions
echo ""
echo "🔒 [4/5] Setting permissions..."
chmod -R 755 "$DEPLOY_PATH/storage" 2>/dev/null || true
chmod -R 755 "$DEPLOY_PATH/bootstrap/cache" 2>/dev/null || true
echo "✅ Permissions set"

# Step 5: Verify
echo ""
echo "✅ [5/5] Verifying deployment..."
echo "   Commit: $(cd $REPO_PATH && git log -1 --oneline)"
echo "   Date:   $(date)"
echo ""
echo "═══════════════════════════════════════════════"
echo "🎉 DEPLOY SELESAI! Website sudah live."
echo "═══════════════════════════════════════════════"
