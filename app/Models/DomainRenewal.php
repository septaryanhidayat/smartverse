<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainRenewal extends Model
{
    use HasFactory;

    protected $table = 'domain_renewals';

    protected $fillable = [
        'domain_name',
        'provider',
        'service_type',
        'registration_date',
        'expiry_date',
        'renewal_price',
        'currency',
        'billing_cycle',
        'auto_renew',
        'nameservers',
        'client_name',
        'client_whatsapp',
        'login_url',
        'status',
        'notes',
        'created_by',
    ];

    protected $casts = [
        'registration_date' => 'date',
        'expiry_date' => 'date',
        'renewal_price' => 'float',
        'auto_renew' => 'boolean',
    ];

    /**
     * Known provider portal login shortcuts
     */
    public static array $providerPortals = [
        'Spaceship' => 'https://www.spaceship.com/application/domains/',
        'Rumahweb' => 'https://clientzone.rumahweb.com/',
        'IDwebhost' => 'https://member.idwebhost.com/',
        'Porkbun' => 'https://porkbun.com/account/domains',
        'GoDaddy' => 'https://dcc.godaddy.com/control/',
        'Webnesia' => 'https://client.webnesia.co.id/',
        'Domainesia' => 'https://my.domainesia.com/',
        'Niagahoster' => 'https://panel.niagahoster.co.id/',
        'Cloudflare' => 'https://dash.cloudflare.com/',
        'Hostinger' => 'https://hpanel.hostinger.com/',
        'Dewabiz' => 'https://my.dewabiz.com/',
        'Jagoweb' => 'https://client.jagoweb.com/',
    ];

    /**
     * Compute remaining days until expiry.
     * Positive = future days remaining, 0 = today, Negative = expired days ago.
     */
    public function getDaysRemainingAttribute(): int
    {
        if (!$this->expiry_date) {
            return 0;
        }

        $today = Carbon::today();
        $expiry = Carbon::parse($this->expiry_date)->startOfDay();

        return (int) $today->diffInDays($expiry, false);
    }

    /**
     * Categorize urgency level:
     * - 'expired': days < 0
     * - 'critical': 0 <= days <= 7 (Immediate action needed)
     * - 'warning': 8 <= days <= 30 (Expiring within a month)
     * - 'safe': days > 30
     */
    public function getUrgencyLevelAttribute(): string
    {
        $days = $this->days_remaining;

        if ($days < 0) {
            return 'expired';
        }

        if ($days <= 7) {
            return 'critical';
        }

        if ($days <= 30) {
            return 'warning';
        }

        return 'safe';
    }

    /**
     * Human-friendly formatted price with currency
     */
    public function getFormattedPriceAttribute(): string
    {
        $currency = strtoupper($this->currency ?? 'IDR');
        $price = (float) $this->renewal_price;

        if ($currency === 'USD') {
            return '$ ' . number_format($price, 2, '.', ',');
        }

        return 'Rp ' . number_format($price, 0, ',', '.');
    }

    /**
     * Provider portal direct link
     */
    public function getPortalUrlAttribute(): string
    {
        if (!empty($this->login_url)) {
            return $this->login_url;
        }

        $provider = trim($this->provider);
        return self::$providerPortals[$provider] ?? 'https://www.google.com/search?q=' . urlencode($provider . ' login');
    }

    /**
     * Service type friendly label and badge
     */
    public function getServiceTypeLabelAttribute(): string
    {
        return match ($this->service_type) {
            'hosting' => 'Cloud Hosting',
            'vps' => 'Cloud VPS / Server',
            'combo' => 'Domain + Hosting',
            'ssl' => 'SSL Certificate',
            default => 'Domain TLD',
        };
    }

    /**
     * Pre-formatted WhatsApp reminder text for client
     */
    public function getWhatsappMessageAttribute(): string
    {
        $client = $this->client_name ?: 'Bapak/Ibu Klien';
        $domain = $this->domain_name;
        $service = $this->service_type_label;
        $expiryFormatted = Carbon::parse($this->expiry_date)->translatedFormat('d F Y');
        $days = $this->days_remaining;
        $price = $this->formatted_price;

        if ($days < 0) {
            $urgencyText = "telah melewati masa aktif sejak " . abs($days) . " hari yang lalu (" . $expiryFormatted . ")";
        } elseif ($days === 0) {
            $urgencyText = "berakhir HARI INI (" . $expiryFormatted . ")";
        } else {
            $urgencyText = "akan berakhir pada " . $expiryFormatted . " (" . $days . " hari lagi)";
        }

        return "Halo {$client},\n\n"
            . "Kami dari SmartVerse (smartverse.id) menginformasikan bahwa layanan *{$service}* untuk nama domain/sistem *{$domain}* {$urgencyText}.\n\n"
            . "📌 *Detail Perpanjangan:*\n"
            . "• Domain / Layanan: {$domain} ({$service})\n"
            . "• Tanggal Kedaluwarsa: {$expiryFormatted}\n"
            . "• Biaya Perpanjangan: {$price}\n"
            . "• Siklus Billing: " . ucfirst($this->billing_cycle) . "\n\n"
            . "Mohon konfirmasi kelanjutan perpanjangan agar nama domain dan akses sistem web tetap aktif tanpa kendala operasional.\n\n"
            . "Terima kasih,\n"
            . "*SmartVerse (smartverse.id)*\n"
            . "🌐 https://smartverse.id";
    }

    /**
     * Direct WhatsApp URL
     */
    public function getWhatsappUrlAttribute(): ?string
    {
        if (empty($this->client_whatsapp)) {
            return null;
        }

        $phone = preg_replace('/[^0-9]/', '', $this->client_whatsapp);
        if (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        }

        return 'https://wa.me/' . $phone . '?text=' . rawurlencode($this->whatsapp_message);
    }

    public static function ensureTableExists(): void
    {
        if (!\Illuminate\Support\Facades\Schema::hasTable('domain_renewals')) {
            \Illuminate\Support\Facades\Schema::create('domain_renewals', function (\Illuminate\Database\Schema\Blueprint $table) {
                $table->id();
                $table->string('domain_name');
                $table->string('provider')->default('Rumahweb');
                $table->string('service_type')->default('domain');
                $table->date('registration_date')->nullable();
                $table->date('expiry_date');
                $table->decimal('renewal_price', 15, 2)->default(0);
                $table->string('currency', 10)->default('IDR');
                $table->string('billing_cycle', 20)->default('yearly');
                $table->boolean('auto_renew')->default(false);
                $table->string('nameservers')->nullable();
                $table->string('client_name')->nullable();
                $table->string('client_whatsapp')->nullable();
                $table->string('login_url')->nullable();
                $table->string('status')->default('active');
                $table->text('notes')->nullable();
                $table->unsignedBigInteger('created_by')->nullable();
                $table->timestamps();

                $table->index(['expiry_date', 'status']);
                $table->index('domain_name');
            });
        }
    }
}
