<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DomainRenewal;
use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class AdminDomainRenewalController extends Controller
{
    /**
     * Self-healing database check to ensure zero-terminal deployment on cPanel
     */
    protected function ensureTableExists(): void
    {
        if (!Schema::hasTable('domain_renewals')) {
            Schema::create('domain_renewals', function (Blueprint $table) {
                $table->id();
                $table->string('domain_name');
                $table->string('provider'); // Rumahweb, IDwebhost, Spaceship, Porkbun, GoDaddy, Webnesia, etc.
                $table->string('service_type')->default('domain'); // domain, hosting, vps, combo, ssl
                $table->date('registration_date')->nullable();
                $table->date('expiry_date');
                $table->decimal('renewal_price', 15, 2)->default(0);
                $table->string('currency', 10)->default('IDR');
                $table->string('billing_cycle')->default('yearly'); // monthly, yearly, 2_years, 3_years
                $table->boolean('auto_renew')->default(false);
                $table->text('nameservers')->nullable();
                $table->string('client_name')->nullable();
                $table->string('client_whatsapp')->nullable();
                $table->string('login_url')->nullable();
                $table->string('status')->default('active'); // active, expiring_soon, expired, transferred
                $table->text('notes')->nullable();
                $table->unsignedBigInteger('created_by')->nullable();
                $table->timestamps();

                $table->index('expiry_date');
                $table->index('provider');
                $table->index('service_type');
                $table->index('status');
            });
        }

        // Seed representative sample data if empty so user has immediate visual clarity
        if (DomainRenewal::count() === 0) {
            $samples = [
                [
                    'domain_name' => 'sa-badmintonapp.com',
                    'provider' => 'Spaceship',
                    'service_type' => 'domain',
                    'registration_date' => Carbon::now()->subYears(1)->format('Y-m-d'),
                    'expiry_date' => Carbon::today()->addDays(5)->format('Y-m-d'), // Kritis (5 Hari)
                    'renewal_price' => 155000,
                    'currency' => 'IDR',
                    'billing_cycle' => 'yearly',
                    'auto_renew' => false,
                    'nameservers' => 'ns1.spaceship.com, ns2.spaceship.com',
                    'client_name' => 'PB. Samudra Arena',
                    'client_whatsapp' => '089695249089',
                    'login_url' => 'https://www.spaceship.com/application/domains/',
                    'status' => 'expiring_soon',
                    'notes' => 'Domain sistem manajemen lapangan badminton. Harus segera diperpanjang sebelum masa tenggang!',
                ],
                [
                    'domain_name' => 'yayasaninsancita.sch.id',
                    'provider' => 'Webnesia',
                    'service_type' => 'combo',
                    'registration_date' => Carbon::now()->subYears(1)->format('Y-m-d'),
                    'expiry_date' => Carbon::today()->addDays(21)->format('Y-m-d'), // Segera Expired (21 Hari)
                    'renewal_price' => 450000,
                    'currency' => 'IDR',
                    'billing_cycle' => 'yearly',
                    'auto_renew' => false,
                    'nameservers' => 'ns1.webnesia.co.id, ns2.webnesia.co.id',
                    'client_name' => 'Yayasan Insan Cita Mandiri',
                    'client_whatsapp' => '081234567890',
                    'login_url' => 'https://client.webnesia.co.id/',
                    'status' => 'active',
                    'notes' => 'Paket Domain .SCH.ID + Cloud SSD Hosting cPanel 2GB.',
                ],
                [
                    'domain_name' => 'smartverse.id',
                    'provider' => 'Rumahweb',
                    'service_type' => 'domain',
                    'registration_date' => Carbon::now()->subYears(2)->format('Y-m-d'),
                    'expiry_date' => Carbon::today()->addDays(320)->format('Y-m-d'),
                    'renewal_price' => 195000,
                    'currency' => 'IDR',
                    'billing_cycle' => 'yearly',
                    'auto_renew' => true,
                    'nameservers' => 'cloe.ns.cloudflare.com, plato.ns.cloudflare.com',
                    'client_name' => 'Internal BTD (Corporate)',
                    'client_whatsapp' => '089695249089',
                    'login_url' => 'https://clientzone.rumahweb.com/',
                    'status' => 'active',
                    'notes' => 'Domain corporate resmi Beranda Digital. DNS diarahkan ke Cloudflare Enterprise Proxy.',
                ],
                [
                    'domain_name' => 'smartdesa-oganilir.go.id',
                    'provider' => 'IDwebhost',
                    'service_type' => 'hosting',
                    'registration_date' => Carbon::now()->subMonths(6)->format('Y-m-d'),
                    'expiry_date' => Carbon::today()->addDays(48)->format('Y-m-d'),
                    'renewal_price' => 650000,
                    'currency' => 'IDR',
                    'billing_cycle' => 'yearly',
                    'auto_renew' => false,
                    'nameservers' => 'ns1.idwebhost.id, ns2.idwebhost.id',
                    'client_name' => 'Pemerintah Desa Ogan Ilir',
                    'client_whatsapp' => '082188991122',
                    'login_url' => 'https://member.idwebhost.com/',
                    'status' => 'active',
                    'notes' => 'Cloud Hosting Paket Bisnis untuk Sistem Pelayanan Warga.',
                ],
                [
                    'domain_name' => 'clouddev-hub.org',
                    'provider' => 'Porkbun',
                    'service_type' => 'domain',
                    'registration_date' => Carbon::now()->subMonths(10)->format('Y-m-d'),
                    'expiry_date' => Carbon::today()->addDays(75)->format('Y-m-d'),
                    'renewal_price' => 10.50,
                    'currency' => 'USD',
                    'billing_cycle' => 'yearly',
                    'auto_renew' => true,
                    'nameservers' => 'curt.ns.cloudflare.com, daisy.ns.cloudflare.com',
                    'client_name' => 'Riset Internal BTD',
                    'client_whatsapp' => null,
                    'login_url' => 'https://porkbun.com/account/domains',
                    'status' => 'active',
                    'notes' => 'Domain riset webhook & cloud services sandbox.',
                ],
                [
                    'domain_name' => 'sumsel-digitalschool.com',
                    'provider' => 'GoDaddy',
                    'service_type' => 'domain',
                    'registration_date' => Carbon::now()->subYears(1)->format('Y-m-d'),
                    'expiry_date' => Carbon::today()->subDays(3)->format('Y-m-d'), // Contoh Sudah Kedaluwarsa (-3 Hari)
                    'renewal_price' => 240000,
                    'currency' => 'IDR',
                    'billing_cycle' => 'yearly',
                    'auto_renew' => false,
                    'nameservers' => 'ns1.domaincontrol.com, ns2.domaincontrol.com',
                    'client_name' => 'SMK Bina Digital',
                    'client_whatsapp' => '081377889900',
                    'login_url' => 'https://dcc.godaddy.com/control/',
                    'status' => 'expired',
                    'notes' => 'Kedaluwarsa 3 hari lalu. Masih dalam Grace Period 30 hari tanpa penalti.',
                ],
            ];

            foreach ($samples as $sample) {
                DomainRenewal::create($sample);
            }
        }
    }

    public function index(Request $request)
    {
        $this->ensureTableExists();

        $today = Carbon::today()->format('Y-m-d');
        $in7Days = Carbon::today()->addDays(7)->format('Y-m-d');
        $in30Days = Carbon::today()->addDays(30)->format('Y-m-d');

        // Global KPI Counters
        $totalCount = DomainRenewal::count();
        $criticalCount = DomainRenewal::where('expiry_date', '>=', $today)
            ->where('expiry_date', '<=', $in7Days)
            ->count();
        $warningCount = DomainRenewal::where('expiry_date', '>', $in7Days)
            ->where('expiry_date', '<=', $in30Days)
            ->count();
        $expiredCount = DomainRenewal::where('expiry_date', '<', $today)
            ->count();
        $safeCount = DomainRenewal::where('expiry_date', '>', $in30Days)
            ->count();

        // Estimated Renewal Costs
        $totalCostIDR = DomainRenewal::where('currency', 'IDR')->sum('renewal_price');
        $totalCostUSD = DomainRenewal::where('currency', 'USD')->sum('renewal_price');

        // Distinct Providers for Filter Chips
        $providers = DomainRenewal::select('provider')
            ->distinct()
            ->orderBy('provider')
            ->pluck('provider');

        // Build Query with Filters
        $query = DomainRenewal::query();

        // Search Filter
        if ($request->filled('search')) {
            $term = '%' . trim($request->search) . '%';
            $query->where(function ($q) use ($term) {
                $q->where('domain_name', 'like', $term)
                  ->orWhere('client_name', 'like', $term)
                  ->orWhere('notes', 'like', $term);
            });
        }

        // Provider Filter
        if ($request->filled('provider') && $request->provider !== 'all') {
            $query->where('provider', $request->provider);
        }

        // Urgency / Status Filter Tab
        $tab = $request->get('tab', 'all');
        if ($tab === 'critical') {
            $query->where('expiry_date', '>=', $today)
                  ->where('expiry_date', '<=', $in7Days);
        } elseif ($tab === 'warning') {
            $query->where('expiry_date', '>', $in7Days)
                  ->where('expiry_date', '<=', $in30Days);
        } elseif ($tab === 'expired') {
            $query->where('expiry_date', '<', $today);
        } elseif ($tab === 'safe') {
            $query->where('expiry_date', '>', $in30Days);
        } elseif ($tab === 'hosting') {
            $query->whereIn('service_type', ['hosting', 'vps', 'combo']);
        }

        // Default Sort: Expiry date ascending (most urgent first)
        $domains = $query->orderBy('expiry_date', 'asc')->paginate(15)->withQueryString();

        return view('admin.domain_renewals.index', compact(
            'domains',
            'totalCount',
            'criticalCount',
            'warningCount',
            'expiredCount',
            'safeCount',
            'totalCostIDR',
            'totalCostUSD',
            'providers',
            'tab'
        ));
    }

    public function store(Request $request)
    {
        $this->ensureTableExists();

        $validated = $request->validate([
            'domain_name' => 'required|string|max:255',
            'provider' => 'required|string|max:100',
            'service_type' => 'required|in:domain,hosting,vps,combo,ssl',
            'registration_date' => 'nullable|date',
            'expiry_date' => 'required|date',
            'renewal_price' => 'required|numeric|min:0',
            'currency' => 'required|in:IDR,USD',
            'billing_cycle' => 'required|in:monthly,yearly,2_years,3_years',
            'auto_renew' => 'nullable|boolean',
            'nameservers' => 'nullable|string',
            'client_name' => 'nullable|string|max:255',
            'client_whatsapp' => 'nullable|string|max:50',
            'login_url' => 'nullable|url|max:255',
            'notes' => 'nullable|string',
        ]);

        $validated['auto_renew'] = $request->boolean('auto_renew');
        $validated['created_by'] = Auth::id();

        // Calculate initial status
        $today = Carbon::today()->format('Y-m-d');
        if ($validated['expiry_date'] < $today) {
            $validated['status'] = 'expired';
        } elseif ($validated['expiry_date'] <= Carbon::today()->addDays(30)->format('Y-m-d')) {
            $validated['status'] = 'expiring_soon';
        } else {
            $validated['status'] = 'active';
        }

        DomainRenewal::create($validated);

        return redirect()->route('admin.domain-renewals.index')
            ->with('success', "Aset {$validated['domain_name']} di {$validated['provider']} berhasil ditambahkan ke daftar pelacak!");
    }

    public function update(Request $request, $id)
    {
        $this->ensureTableExists();
        $domain = DomainRenewal::findOrFail($id);

        $validated = $request->validate([
            'domain_name' => 'required|string|max:255',
            'provider' => 'required|string|max:100',
            'service_type' => 'required|in:domain,hosting,vps,combo,ssl',
            'registration_date' => 'nullable|date',
            'expiry_date' => 'required|date',
            'renewal_price' => 'required|numeric|min:0',
            'currency' => 'required|in:IDR,USD',
            'billing_cycle' => 'required|in:monthly,yearly,2_years,3_years',
            'auto_renew' => 'nullable|boolean',
            'nameservers' => 'nullable|string',
            'client_name' => 'nullable|string|max:255',
            'client_whatsapp' => 'nullable|string|max:50',
            'login_url' => 'nullable|url|max:255',
            'notes' => 'nullable|string',
        ]);

        $validated['auto_renew'] = $request->boolean('auto_renew');

        // Auto update status based on date
        $today = Carbon::today()->format('Y-m-d');
        if ($validated['expiry_date'] < $today) {
            $validated['status'] = 'expired';
        } elseif ($validated['expiry_date'] <= Carbon::today()->addDays(30)->format('Y-m-d')) {
            $validated['status'] = 'expiring_soon';
        } else {
            $validated['status'] = 'active';
        }

        $domain->update($validated);

        return redirect()->route('admin.domain-renewals.index')
            ->with('success', "Data aset {$domain->domain_name} berhasil diperbarui!");
    }

    /**
     * 1-Click quick action to extend domain expiry by 1 year
     */
    public function renewOneYear($id)
    {
        $this->ensureTableExists();
        $domain = DomainRenewal::findOrFail($id);

        $oldExpiry = Carbon::parse($domain->expiry_date);
        
        // If already expired, add 1 year from today; otherwise add 1 year from current expiry
        $newExpiry = $oldExpiry->isPast() 
            ? Carbon::today()->addYear() 
            : $oldExpiry->copy()->addYear();

        $domain->update([
            'expiry_date' => $newExpiry->format('Y-m-d'),
            'status' => 'active',
        ]);

        return redirect()->route('admin.domain-renewals.index')
            ->with('success', "Layanan {$domain->domain_name} berhasil diperpanjang 1 tahun! Tanggal kedaluwarsa baru: " . $newExpiry->translatedFormat('d F Y'));
    }

    public function destroy($id)
    {
        $this->ensureTableExists();
        $domain = DomainRenewal::findOrFail($id);
        $name = $domain->domain_name;
        $domain->delete();

        return redirect()->route('admin.domain-renewals.index')
            ->with('success', "Aset domain {$name} berhasil dihapus dari sistem pelacak.");
    }
}
