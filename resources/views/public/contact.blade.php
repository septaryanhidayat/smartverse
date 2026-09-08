@extends('layouts.app')

@section('title', 'Hubungi Kami & Konsultasi Anggaran - CV. Beranda Teknologi Digital')

@section('content')
<!-- SECTION: CONTACT & MODULAR ESTIMATOR -->
<section class="py-16 sm:py-20 bg-[#f8faff] dark:bg-slate-950 transition-colors duration-300 relative overflow-hidden" 
         x-data="{
            platform: 'company_profile',
            platformName: 'Website Company Profile',
            platformPrice: 2500000,
            
            design: 'standard',
            designName: 'Template Modern Responsif',
            designPrice: 0,

            server: 'cloud_ssd',
            serverName: 'Cloud SSD Hosting + Domain (1 Tahun)',
            serverPrice: 0,

            addonPayment: false,
            addonWhatsapp: false,
            addonRoles: false,
            addonAI: false,
            addonExport: false,
            addonSEO: false,

            hasCalculated: false,
            isCalculating: false,
            calculatedTotal: 0,
            calculatedMin: 0,
            calculatedMax: 0,
            selectedAddons: [],

            calculate() {
                this.isCalculating = true;
                setTimeout(() => {
                    let total = this.platformPrice + this.designPrice + this.serverPrice;
                    let list = [];
                    if (this.addonPayment) { total += 1000000; list.push('Payment Gateway QRIS/VA'); }
                    if (this.addonWhatsapp) { total += 850000; list.push('WhatsApp Gateway Otomatis'); }
                    if (this.addonRoles) { total += 750000; list.push('Multi-Role & Hak Akses'); }
                    if (this.addonAI) { total += 2000000; list.push('Integrasi AI Assistant'); }
                    if (this.addonExport) { total += 500000; list.push('Export Laporan Excel/PDF'); }
                    if (this.addonSEO) { total += 600000; list.push('SEO Advanced Google'); }

                    this.calculatedTotal = total;
                    this.calculatedMin = Math.round((total * 0.9) / 50000) * 50000;
                    this.calculatedMax = Math.round((total * 1.1) / 50000) * 50000;
                    this.selectedAddons = list;
                    this.isCalculating = false;
                    this.hasCalculated = true;
                }, 350);
            },

            formatRupiah(num) {
                return new Intl.NumberFormat('id-ID').format(num);
            },

            getSubjectText() {
                return 'Konsultasi: ' + this.platformName + (this.hasCalculated ? ' (Est: Rp ' + this.formatRupiah(this.calculatedTotal) + ')' : '');
            }
         }">
    
    <!-- Watermark "Contact" -->
    <div class="absolute top-6 left-1/2 -translate-x-1/2 text-8xl sm:text-9xl font-black text-slate-200/40 dark:text-slate-800/25 pointer-events-none select-none tracking-wider -z-0">
        Contact
    </div>

    <!-- Floating Decorative Shapes -->
    <div class="absolute top-20 right-10 text-[#fe6000]/40 text-4xl font-black pointer-events-none select-none anim-logo-top">~ ~ ~</div>
    <div class="absolute bottom-20 left-10 text-[#3E5CE7]/30 text-5xl font-black pointer-events-none select-none anim-logo-bottom">✦</div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-14 relative z-10">
        
        <!-- Header -->
        <div class="text-left space-y-3">
            <div class="flex items-center gap-3">
                <span class="w-8 h-1 bg-[#fe6000] rounded-full"></span>
                <span class="text-sm font-bold tracking-wider uppercase text-[#fe6000]">Client / Contact</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#07153f] dark:text-white">Hubungi Tim Beranda Digital</h1>
            <p class="text-xs sm:text-sm md:text-base text-slate-600 dark:text-slate-300 leading-relaxed max-w-2xl font-medium">
                Mari kita bicarakan ide digital Anda. Tim kami terdiri dari web designer dan software developer berpengalaman yang siap merancang solusi teknologi tepat guna sesuai kebutuhan instansi dan anggaran Anda.
            </p>
        </div>

        <!-- Contact Info Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="https://wa.me/6289695249089" target="_blank" class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all group flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-emerald-100 dark:bg-emerald-950 text-emerald-600 flex items-center justify-center font-bold text-2xl shrink-0">
                    💬
                </div>
                <div>
                    <h3 class="text-sm font-bold text-[#07153f] dark:text-white">WhatsApp Hotline</h3>
                    <p class="text-xs font-mono font-bold text-emerald-600 dark:text-emerald-400">0896 9524 9089</p>
                    <span class="text-[11px] text-slate-500 dark:text-slate-400 font-semibold">Respon Cepat Konsultasi &rarr;</span>
                </div>
            </a>

            <a href="mailto:info@berandadigital.net" class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all group flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-blue-100 dark:bg-blue-950 text-[#3E5CE7] flex items-center justify-center font-bold text-2xl shrink-0">
                    ✉️
                </div>
                <div>
                    <h3 class="text-sm font-bold text-[#07153f] dark:text-white">Email Resmi</h3>
                    <p class="text-xs font-mono font-bold text-[#3E5CE7] dark:text-blue-400">info@berandadigital.net</p>
                    <span class="text-[11px] text-slate-500 dark:text-slate-400 font-semibold">Pengajuan Proposal & SPK &rarr;</span>
                </div>
            </a>

            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-amber-100 dark:bg-amber-950 text-[#fe6000] flex items-center justify-center font-bold text-2xl shrink-0">
                    🏢
                </div>
                <div>
                    <h3 class="text-sm font-bold text-[#07153f] dark:text-white">CV. Beranda Teknologi Digital</h3>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-tight font-medium">Ogan Ilir & Palembang, Sumsel</p>
                    <span class="text-[11px] text-[#fe6000] font-bold">Sen - Sab (08.00 - 17.00 WIB)</span>
                </div>
            </div>
        </div>

        <!-- Standard Inclusions Banner (Always Included Free) -->
        <div style="background-color: #07153f !important; color: #ffffff !important;"
             class="rounded-2xl p-4 sm:p-5 shadow-xl border border-slate-800 text-center space-y-2.5">
            <div class="inline-flex items-center gap-2 text-xs font-bold text-amber-400 uppercase tracking-wider">
                <span>✨</span> <span>SEMUA PAKET SUDAH OTOMATIS TERMASUK FASILITAS LENGKAP (FREE):</span>
            </div>
            <div class="flex flex-wrap items-center justify-center gap-2 text-xs font-semibold">
                <span class="px-3 py-1 rounded-full bg-white/10 text-white border border-white/15">🌐 Free Domain 1 Tahun</span>
                <span class="px-3 py-1 rounded-full bg-white/10 text-white border border-white/15">⚡ Free Cloud SSD Hosting</span>
                <span class="px-3 py-1 rounded-full bg-white/10 text-white border border-white/15">🔒 Free SSL Let's Encrypt</span>
                <span class="px-3 py-1 rounded-full bg-white/10 text-white border border-white/15">🎨 Free Desain Logo Sistem</span>
                <span class="px-3 py-1 rounded-full bg-white/10 text-white border border-white/15">🔄 Revisi Sepuasnya Sampai Sesuai Keinginan</span>
                <span class="px-3 py-1 rounded-full bg-white/10 text-white border border-white/15">📱 Responsif Semua Device</span>
            </div>
        </div>

        <!-- Two Columns: Project Cost Estimator (Left) & Form Inquiry (Right) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left: Modular Estimator (No price until button pressed) -->
            <div class="lg:col-span-7 bg-white dark:bg-slate-900 p-6 sm:p-8 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-xl space-y-6">
                
                <div class="border-b border-slate-100 dark:border-slate-800 pb-3 flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-black text-[#07153f] dark:text-white">Kalkulator Simulasi Proyek</h2>
                        <p class="text-[11px] text-slate-500 dark:text-slate-400">Pilih kebutuhan sistem Anda di bawah ini:</p>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-orange-50 dark:bg-orange-950/60 text-[#fe6000] font-bold text-[10px]">
                        Included Free Facilities
                    </span>
                </div>

                <!-- 1. Platform Type -->
                <div class="space-y-2">
                    <label class="text-xs font-bold uppercase tracking-wider block text-[#07153f] dark:text-white">1. Pilih Kategori Solusi Digital:</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs">
                        <button type="button" 
                                @click="platform = 'company_profile'; platformName = 'Website Company Profile'; platformPrice = 2500000; hasCalculated = false"
                                :class="platform === 'company_profile' ? 'border-[#3E5CE7] bg-blue-50/70 dark:bg-blue-950/50 text-[#3E5CE7] font-bold' : 'border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200'"
                                class="p-3 rounded-xl border text-left transition-all">
                            <span class="font-extrabold block text-xs text-[#07153f] dark:text-white">Web Company Profile</span>
                            <span class="text-[10px] text-slate-500">Profil Usaha & Portofolio</span>
                        </button>

                        <button type="button" 
                                @click="platform = 'web_sekolah'; platformName = 'Website Sekolah / Kampus'; platformPrice = 3000000; hasCalculated = false"
                                :class="platform === 'web_sekolah' ? 'border-[#3E5CE7] bg-blue-50/70 dark:bg-blue-950/50 text-[#3E5CE7] font-bold' : 'border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200'"
                                class="p-3 rounded-xl border text-left transition-all">
                            <span class="font-extrabold block text-xs text-[#07153f] dark:text-white">Web Sekolah / PPDB</span>
                            <span class="text-[10px] text-slate-500">Portal Informasi & Pendaftaran</span>
                        </button>

                        <button type="button" 
                                @click="platform = 'sim_instansi'; platformName = 'Sistem Informasi Digital (Surat, Akademik, Absensi)'; platformPrice = 5500000; hasCalculated = false"
                                :class="platform === 'sim_instansi' ? 'border-[#3E5CE7] bg-blue-50/70 dark:bg-blue-950/50 text-[#3E5CE7] font-bold' : 'border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200'"
                                class="p-3 rounded-xl border text-left transition-all">
                            <span class="font-extrabold block text-xs text-[#07153f] dark:text-white">Sistem Informasi Digital</span>
                            <span class="text-[10px] text-slate-500">Surat, Akademik, Absensi</span>
                        </button>

                        <button type="button" 
                                @click="platform = 'mobile_flutter'; platformName = 'Aplikasi Mobile (Flutter)'; platformPrice = 5000000; hasCalculated = false"
                                :class="platform === 'mobile_flutter' ? 'border-[#3E5CE7] bg-blue-50/70 dark:bg-blue-950/50 text-[#3E5CE7] font-bold' : 'border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200'"
                                class="p-3 rounded-xl border text-left transition-all">
                            <span class="font-extrabold block text-xs text-[#07153f] dark:text-white">Aplikasi Mobile Flutter</span>
                            <span class="text-[10px] text-slate-500">Android & iOS Multiplatform</span>
                        </button>
                    </div>
                </div>

                <!-- 2. Addons -->
                <div class="space-y-2 pt-2 border-t border-slate-100 dark:border-slate-800">
                    <label class="text-xs font-bold uppercase tracking-wider block text-[#07153f] dark:text-white">2. Fitur Tambahan & Integrasi:</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs">
                        <label class="flex items-center gap-2 p-2.5 rounded-xl bg-slate-50 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 cursor-pointer">
                            <input type="checkbox" x-model="addonPayment" @change="hasCalculated = false" class="rounded text-[#fe6000]">
                            <span class="text-slate-700 dark:text-slate-200">Payment Gateway (QRIS/VA)</span>
                        </label>
                        <label class="flex items-center gap-2 p-2.5 rounded-xl bg-slate-50 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 cursor-pointer">
                            <input type="checkbox" x-model="addonWhatsapp" @change="hasCalculated = false" class="rounded text-[#fe6000]">
                            <span class="text-slate-700 dark:text-slate-200">WhatsApp Gateway Notif</span>
                        </label>
                        <label class="flex items-center gap-2 p-2.5 rounded-xl bg-slate-50 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 cursor-pointer">
                            <input type="checkbox" x-model="addonRoles" @change="hasCalculated = false" class="rounded text-[#fe6000]">
                            <span class="text-slate-700 dark:text-slate-200">Multi-Role & Hak Akses</span>
                        </label>
                        <label class="flex items-center gap-2 p-2.5 rounded-xl bg-slate-50 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 cursor-pointer">
                            <input type="checkbox" x-model="addonAI" @change="hasCalculated = false" class="rounded text-[#fe6000]">
                            <span class="text-slate-700 dark:text-slate-200">Engine AI Assistant</span>
                        </label>
                    </div>
                </div>

                <!-- Trigger Calculate -->
                <div class="pt-2">
                    <button type="button" 
                            @click="calculate()"
                            style="background-color: #fe6000 !important; color: #ffffff !important;"
                            class="w-full py-3.5 rounded-xl font-black text-xs uppercase tracking-wider shadow-md hover:brightness-110 active:scale-98 transition-all flex items-center justify-center gap-2">
                        <span x-show="!isCalculating">📊</span>
                        <span x-show="isCalculating" class="inline-block animate-spin">⏳</span>
                        <span x-text="isCalculating ? 'Menghitung Estimasi...' : 'Hitung Estimasi Biaya Sekarang'" style="color: #ffffff !important; font-weight: 900;"></span>
                    </button>
                </div>

                <!-- Result Box (Hidden Until Pressed) -->
                <div x-show="hasCalculated" 
                     x-transition
                     class="p-5 rounded-2xl bg-[#07153f] text-white space-y-3 shadow-xl border border-blue-900">
                    <div class="flex items-center justify-between text-xs text-slate-300">
                        <span>Hasil Perkiraan Anggaran:</span>
                        <span x-text="platformName" class="font-bold text-amber-400"></span>
                    </div>
                    <div class="text-3xl font-black mono text-emerald-400 flex items-baseline gap-1">
                        <span class="text-sm text-slate-400">Rp</span>
                        <span x-text="formatRupiah(calculatedTotal)"></span>
                    </div>
                    <div class="text-xs text-slate-300">
                        Rentang Estimasi: <strong class="text-white">Rp <span x-text="formatRupiah(calculatedMin)"></span> - Rp <span x-text="formatRupiah(calculatedMax)"></span></strong>
                    </div>
                    <p class="text-[10px] text-slate-400 pt-1 border-t border-white/10 leading-tight">
                        *Estimasi ini bersifat fleksibel dan dapat dinegosiasikan sesuai kebutuhan riil instansi Anda.
                    </p>
                </div>

            </div>

            <!-- Right: FlyMotion Inquiry Form ("Dapatkan Penawaran") -->
            <div class="lg:col-span-5 bg-white dark:bg-slate-900 p-6 sm:p-8 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-xl space-y-6">
                <div>
                    <h2 class="text-xl font-extrabold text-[#07153f] dark:text-white">Dapatkan Penawaran Resmi</h2>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Kirimkan rincian kebutuhan Anda untuk mendapatkan surat penawaran & proposal resmi.</p>
                </div>

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-[#07153f] dark:text-white">Nama Lengkap *</label>
                        <input type="text" name="name" required placeholder="Nama Lengkap / Instansi" class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-800 dark:text-white text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-[#07153f] dark:text-white">Email Aktif *</label>
                        <input type="email" name="email" required placeholder="alamat@instansi.com" class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-800 dark:text-white text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-[#07153f] dark:text-white">Nomor WhatsApp / HP *</label>
                        <input type="text" name="phone" required placeholder="08xxxxxxxxxx" class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-800 dark:text-white text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-[#07153f] dark:text-white">Topik Proyek / Sistem</label>
                        <input type="text" name="subject" x-bind:value="getSubjectText()" class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-800 dark:text-white text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-[#07153f] dark:text-white">Deskripsi Kebutuhan *</label>
                        <textarea name="message" rows="4" required placeholder="Jelaskan kebutuhan fitur atau batasan anggaran proyek Anda..." class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-800 dark:text-white text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none"></textarea>
                    </div>

                    <button type="submit" 
                            style="background-color: #fe6000 !important; color: #ffffff !important;"
                            class="w-full py-4 rounded-xl font-black text-xs uppercase tracking-wider shadow-md hover:brightness-110 transition-all">
                        <span style="color: #ffffff !important;">Kirim Permintaan Penawaran &rarr;</span>
                    </button>
                </form>
            </div>

        </div>

    </div>
</section>
@endsection
