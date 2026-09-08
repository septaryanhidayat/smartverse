@extends('layouts.app')

@section('title', 'Layanan Jasa Pembuatan Website & Aplikasi - CV. Beranda Teknologi Digital')

@section('content')
<!-- SECTION 1: HERO HEADER (FlyMotion Service Hero with Illustration) -->
<section class="relative pt-6 sm:pt-10 md:pt-14 pb-14 sm:pb-18 md:pb-24 lg:pt-16 lg:pb-24 overflow-hidden bg-flymotion-hero transition-colors duration-300">
    
    <!-- Organic Background Accents -->
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-blue-200/40 rounded-full blur-3xl pointer-events-none anim-logo-object"></div>
    <div class="absolute top-1/2 -left-20 w-80 h-80 bg-orange-100/40 rounded-full blur-3xl pointer-events-none anim-logo-bottom"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            
            <!-- Left: Typography & CTAs -->
            <div class="lg:col-span-7 space-y-4 sm:space-y-6 text-center lg:text-left">
                <div class="flex items-center justify-center lg:justify-start gap-3">
                    <span class="w-8 h-1 bg-[#3E5CE7] rounded-full"></span>
                    <span class="text-xs sm:text-sm font-bold tracking-wider uppercase text-[#3E5CE7]">Service</span>
                </div>

                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight text-[#07153f] dark:text-white leading-[1.2]">
                    Jasa Pembuatan <br class="hidden sm:inline" />
                    <span class="text-[#3E5CE7] dark:text-blue-400">Website & Aplikasi</span>
                </h1>

                <p class="text-xs sm:text-sm md:text-base text-slate-600 dark:text-slate-300 max-w-xl mx-auto lg:mx-0 leading-relaxed font-medium">
                    Anda ingin membuat website & aplikasi? Kami menyediakan solusi digital lengkap dengan tampilan desain yang menarik, user-friendly, responsive mobile, didukung dengan teknologi framework modern Laravel 13, Flutter, dan integrasi Artificial Intelligence.
                </p>

                <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3">
                    <a href="{{ route('contact') }}" 
                       class="w-full sm:w-auto px-7 py-3.5 sm:px-8 sm:py-4 rounded-xl font-bold text-xs sm:text-sm uppercase tracking-wider shadow-lg shadow-orange-500/25 active:scale-98 transition-all text-center border border-orange-400/50"
                       style="background: linear-gradient(135deg, #fe6000 0%, #ff7a29 100%) !important; color: #ffffff !important;">
                        <span class="font-bold" style="color: #ffffff !important;">Konsultasi Proyek &rarr;</span>
                    </a>
                    <a href="{{ route('projects.index') }}" 
                       class="w-full sm:w-auto px-6 py-3.5 sm:px-7 sm:py-4 rounded-xl font-bold text-xs uppercase tracking-wider shadow-md active:scale-98 transition-all text-center border border-blue-400/40"
                       style="background: #3E5CE7 !important; color: #ffffff !important;">
                        <span class="font-bold" style="color: #ffffff !important;">Lihat Portofolio</span>
                    </a>
                </div>
            </div>

            <!-- Right: Hero Vector Illustration Showcase -->
            <div class="lg:col-span-5 flex justify-center relative">
                <div class="relative w-full max-w-md">
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-3xl border border-slate-200 dark:border-slate-700 shadow-xl relative anim-logo-top">
                        <div class="aspect-video rounded-2xl overflow-hidden bg-slate-50 dark:bg-slate-900 p-2 flex items-center justify-center">
                            <img src="/images/Ilustrasi-Homepage-1-1.png" alt="Service Showcase" class="w-full h-full object-contain" />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 2: WHAT WE DO (FlyMotion 10-Card Specialty Grid) -->
<section class="py-20 bg-white dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800 transition-colors duration-300 relative overflow-hidden">
    
    <!-- Watermark "Service" -->
    <div class="absolute top-6 left-1/2 -translate-x-1/2 text-8xl sm:text-9xl font-black text-slate-100/60 dark:text-slate-800/25 pointer-events-none select-none tracking-wider -z-0">
        Service
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16 relative z-10">
        
        <!-- Header -->
        <div class="text-center space-y-3">
            <span class="px-4 py-1.5 rounded-full bg-orange-50 dark:bg-orange-950/60 text-[#fe6000] font-bold text-xs uppercase tracking-wider">
                Our Service
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#07153f] dark:text-white">What We Do</h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Info -->
            <div class="lg:col-span-5 space-y-5">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#fe6000] rounded-full"></span>
                    <span class="text-xs font-bold uppercase tracking-wider text-[#fe6000]">WHAT WE DO</span>
                </div>
                <h3 class="text-3xl font-extrabold text-[#07153f] dark:text-white">
                    Apa yang Kami Kerjakan ?
                </h3>
                <p class="text-base text-slate-600 dark:text-slate-300 leading-relaxed font-medium">
                    Setiap tim designer & developer kami memiliki pengalaman dan sertifikasi resmi yang berkaitan dengan keahlian mereka untuk memberikan hasil yang maksimal. Tim Designer memiliki keahlian dalam pembuatan User-Interface & User-Experience (UI/UX) modern.
                </p>
                <div class="pt-2 text-2xl font-black text-[#fe6000] anim-logo-bottom">~ ~ ~</div>
            </div>

            <!-- Right 10 Pastel Cards Grid -->
            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-5">
                
                <!-- 1. Pembuatan Website -->
                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 space-y-2.5 text-center sm:text-left">
                    <div class="w-12 h-12 rounded-2xl bg-orange-100 dark:bg-orange-950 text-[#fe6000] flex items-center justify-center text-2xl font-bold mx-auto sm:mx-0 shadow-xs">
                        🏢
                    </div>
                    <h4 class="text-base font-bold text-[#07153f] dark:text-white">Pembuatan Website Enterprise</h4>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                        Website profil perusahaan, portal berita, dan company profile yang elegan, cepat, dan teroptimasi SEO Google.
                    </p>
                </div>

                <!-- 2. Aplikasi Android & iOS -->
                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 space-y-2.5 text-center sm:text-left">
                    <div class="w-12 h-12 rounded-2xl bg-blue-100 dark:bg-blue-950 text-[#3E5CE7] flex items-center justify-center text-2xl font-bold mx-auto sm:mx-0 shadow-xs">
                        📱
                    </div>
                    <h4 class="text-base font-bold text-[#07153f] dark:text-white">Aplikasi Android & iOS (Flutter)</h4>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                        Pengembangan aplikasi mobile native & multiplatform untuk absensi, layanan warga, e-commerce, dan sistem sekolah.
                    </p>
                </div>

                <!-- 3. Sistem Informasi Instansi -->
                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 space-y-2.5 text-center sm:text-left">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 dark:bg-emerald-950 text-emerald-600 flex items-center justify-center text-2xl font-bold mx-auto sm:mx-0 shadow-xs">
                        ⚙️
                    </div>
                    <h4 class="text-base font-bold text-[#07153f] dark:text-white">Sistem Informasi Manajemen</h4>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                        Digitalisasi alur administrasi instansi, database kependudukan desa, SIM sekolah, dan ERP terpadu.
                    </p>
                </div>

                <!-- 4. Virtual Reality & Augmented Reality -->
                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 space-y-2.5 text-center sm:text-left">
                    <div class="w-12 h-12 rounded-2xl bg-purple-100 dark:bg-purple-950 text-purple-600 flex items-center justify-center text-2xl font-bold mx-auto sm:mx-0 shadow-xs">
                        🥽
                    </div>
                    <h4 class="text-base font-bold text-[#07153f] dark:text-white">Virtual & Augmented Reality (VR/AR)</h4>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                        Media imersif 3D untuk simulasi praktikum laboratorium, visualisasi arsitektur, dan pameran virtual.
                    </p>
                </div>

                <!-- 5. Desain Grafis & Branding -->
                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 space-y-2.5 text-center sm:text-left">
                    <div class="w-12 h-12 rounded-2xl bg-pink-100 dark:bg-pink-950 text-pink-600 flex items-center justify-center text-2xl font-bold mx-auto sm:mx-0 shadow-xs">
                        🎨
                    </div>
                    <h4 class="text-base font-bold text-[#07153f] dark:text-white">Desain Grafis & Brand Identity</h4>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                        Pembuatan logo vektor profesional, brand guideline, banner promosi, brosur, dan perlengkapan stationery.
                    </p>
                </div>

                <!-- 6. Video Editing & Multimedia -->
                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 space-y-2.5 text-center sm:text-left">
                    <div class="w-12 h-12 rounded-2xl bg-amber-100 dark:bg-amber-950 text-amber-600 flex items-center justify-center text-2xl font-bold mx-auto sm:mx-0 shadow-xs">
                        🎬
                    </div>
                    <h4 class="text-base font-bold text-[#07153f] dark:text-white">Video Editing & Motion Graphic</h4>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                        Editing video profil perusahaan, video animasi edukasi, teaser produk, serta konten reels/TikTok berkualitas tinggi.
                    </p>
                </div>

                <!-- 7. Jasa Kelola Sosial Media -->
                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 space-y-2.5 text-center sm:text-left">
                    <div class="w-12 h-12 rounded-2xl bg-cyan-100 dark:bg-cyan-950 text-cyan-600 flex items-center justify-center text-2xl font-bold mx-auto sm:mx-0 shadow-xs">
                        💬
                    </div>
                    <h4 class="text-base font-bold text-[#07153f] dark:text-white">Jasa Kelola Media Sosial</h4>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                        Pengelolaan Instagram, Facebook, dan TikTok: riset konten, copywriting persuasif, dan posting terjadwal.
                    </p>
                </div>

                <!-- 8. Media Pembelajaran Interaktif -->
                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 space-y-2.5 text-center sm:text-left">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-100 dark:bg-indigo-950 text-indigo-600 flex items-center justify-center text-2xl font-bold mx-auto sm:mx-0 shadow-xs">
                        📚
                    </div>
                    <h4 class="text-base font-bold text-[#07153f] dark:text-white">Media Pembelajaran Interaktif</h4>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                        Software multimedia edukasi untuk dosen, guru, dan sekolah guna meningkatkan daya serap peserta didik.
                    </p>
                </div>

                <!-- 9. Digital Invitation -->
                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 space-y-2.5 text-center sm:text-left">
                    <div class="w-12 h-12 rounded-2xl bg-rose-100 dark:bg-rose-950 text-rose-600 flex items-center justify-center text-2xl font-bold mx-auto sm:mx-0 shadow-xs">
                        💌
                    </div>
                    <h4 class="text-base font-bold text-[#07153f] dark:text-white">Undangan Digital (Digital Invitation)</h4>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                        Website undangan pernikahan, seminar, dan wisuda eksklusif dengan buku tamu, RSVP online, dan navigasi peta.
                    </p>
                </div>

                <!-- 10. Jasa Narasumber & Trainer IT -->
                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl border border-slate-200 dark:border-slate-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 space-y-2.5 text-center sm:text-left">
                    <div class="w-12 h-12 rounded-2xl bg-teal-100 dark:bg-teal-950 text-teal-600 flex items-center justify-center text-2xl font-bold mx-auto sm:mx-0 shadow-xs">
                        🎙️
                    </div>
                    <h4 class="text-base font-bold text-[#07153f] dark:text-white">Jasa Narasumber & Trainer IT</h4>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                        Instruktur workshop, narasumber seminar nasional AI & Coding, serta pendampingan sertifikasi kompetensi digital.
                    </p>
                </div>

            </div>

        </div>

    </div>
</section>

<!-- SECTION 3: ESTIMATOR CALLOUT BANNER (Replaces rigid price tier with interactive estimator link) -->
<section class="py-16 sm:py-20 bg-slate-50 dark:bg-slate-950 border-t border-slate-200 dark:border-slate-800 transition-colors duration-300 relative overflow-hidden">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div style="background-color: #07153f !important; color: #ffffff !important;" 
             class="text-white rounded-3xl p-8 sm:p-12 border border-slate-800 shadow-2xl space-y-8 text-center max-w-4xl mx-auto">
            
            <div class="space-y-3">
                <span style="background-color: #fe6000 !important; color: #ffffff !important;" 
                      class="px-4 py-1.5 rounded-full font-extrabold text-xs uppercase tracking-wider shadow-xs inline-block">
                    🧮 SIMULASI ANGGARAN FLEKSIBEL
                </span>
                <h2 class="text-2xl sm:text-4xl font-extrabold leading-tight" style="color: #ffffff !important;">
                    Sesuaikan Kebutuhan Sistem dengan Anggaran Anda
                </h2>
                <p class="text-xs sm:text-sm text-slate-300 leading-relaxed max-w-2xl mx-auto font-medium">
                    Tidak ada biaya kaku. Kami menyediakan kalkulator estimasi interaktif dengan beragam opsi modul (website, aplikasi mobile, SIM instansi, payment gateway, dan AI) agar Anda dapat menyesuaikan investasi sesuai kebutuhan riil.
                </p>
            </div>

            <div class="flex flex-wrap items-center justify-center gap-4 pt-2">
                <a href="{{ route('home') }}#kalkulator" 
                   style="background-color: #fe6000 !important; color: #ffffff !important;"
                   class="px-8 py-4 rounded-xl font-black text-xs sm:text-sm uppercase tracking-wider shadow-lg shadow-orange-500/30 hover:brightness-110 active:scale-98 transition-all inline-flex items-center gap-2">
                    <span style="color: #ffffff !important;">📊 Hitung di Kalkulator Digital</span>
                    <span style="color: #ffffff !important;">&rarr;</span>
                </a>
                <a href="https://wa.me/6289695249089" 
                   target="_blank" 
                   class="px-7 py-4 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold text-xs uppercase tracking-wider border border-white/20 transition-all inline-flex items-center gap-2">
                    <span style="color: #ffffff !important;">💬 Diskusi Langsung via WA</span>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 4: CONTACT / INQUIRY ("Punya Proyek di pikiran Anda ?") -->
<section class="py-20 bg-white dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800 transition-colors duration-300 relative overflow-hidden">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <div class="lg:col-span-5 space-y-6">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-1 bg-[#fe6000] rounded-full"></span>
                    <span class="text-sm font-bold tracking-wider uppercase text-[#fe6000]">Client / Contact</span>
                </div>
                
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#07153f] dark:text-white leading-tight">
                    Punya Proyek di pikiran Anda ?
                </h2>
                
                <p class="text-base text-slate-600 dark:text-slate-300 leading-relaxed font-medium">
                    Mari kita bicarakan. Tim kami terdiri dari web designer dan web developer professional yang sudah berpengalaman memberikan hasil terbaik. Dengan konsep engaging design untuk hasil website yang optimal untuk bisnis Anda.
                </p>

                <!-- Value Proposition Badges to perfectly balance the right column -->
                <div class="space-y-3 pt-2">
                    <div class="p-4 rounded-2xl bg-[#f8faff] dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 flex items-start gap-3.5">
                        <span class="w-8 h-8 rounded-xl bg-emerald-100 dark:bg-emerald-950/70 text-emerald-600 dark:text-emerald-400 font-black text-sm flex items-center justify-center shrink-0">
                            🛡️
                        </span>
                        <div>
                            <h4 class="text-xs font-bold text-[#07153f] dark:text-white">Garansi 100% Proyek Tepat Waktu & SPK Resmi</h4>
                            <p class="text-[11px] text-slate-600 dark:text-slate-300 mt-0.5">Dilindungi perjanjian kerja resmi berbadan hukum CV dan jaminan maintenance purna-jual.</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-[#f8faff] dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 flex items-start gap-3.5">
                        <span class="w-8 h-8 rounded-xl bg-blue-100 dark:bg-blue-950/70 text-[#3E5CE7] dark:text-blue-400 font-black text-sm flex items-center justify-center shrink-0">
                            📐
                        </span>
                        <div>
                            <h4 class="text-xs font-bold text-[#07153f] dark:text-white">Konsultasi & Blueprint Arsitektur Gratis</h4>
                            <p class="text-[11px] text-slate-600 dark:text-slate-300 mt-0.5">Diskusi mendalam mengenai alur kerja organisasi dan pemetaan modul tanpa biaya awal.</p>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-[#f8faff] dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 flex items-start gap-3.5">
                        <span class="w-8 h-8 rounded-xl bg-orange-100 dark:bg-orange-950/70 text-[#fe6000] font-black text-sm flex items-center justify-center shrink-0">
                            ⚡
                        </span>
                        <div>
                            <h4 class="text-xs font-bold text-[#07153f] dark:text-white">Infrastruktur Cloud High-Speed</h4>
                            <p class="text-[11px] text-slate-600 dark:text-slate-300 mt-0.5">Termasuk domain resmi 1 tahun, SSL grade A+, dan optimasi kecepatan akses.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7 bg-white dark:bg-slate-800 p-8 rounded-3xl border border-slate-200 dark:border-slate-700 shadow-2xl space-y-6">
                <div>
                    <h3 class="text-xl font-extrabold text-[#07153f] dark:text-white">Dapatkan Penawaran</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Isi form di bawah ini untuk konsultasi dan penawaran harga resmi.</p>
                </div>

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <input type="text" name="name" required placeholder="Nama Lengkap" class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900 text-slate-800 dark:text-white text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>
                    <div>
                        <input type="email" name="email" required placeholder="Alamat Email" class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900 text-slate-800 dark:text-white text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>
                    <div>
                        <input type="text" name="subject" placeholder="Ide Proyek / Sistem yang Ingin Dibuat" class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900 text-slate-800 dark:text-white text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>
                    <div>
                        <textarea name="message" rows="4" required placeholder="Deskripsi Kebutuhan atau Catatan Anggaran" class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900 text-slate-800 dark:text-white text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none"></textarea>
                    </div>
                    <button type="submit" 
                            style="background-color: #fe6000 !important; color: #ffffff !important;"
                            class="w-full py-4 rounded-xl font-black text-xs uppercase tracking-wider shadow-md hover:brightness-110 transition-all">
                        <span style="color: #ffffff !important;">Kirim Pesan Penawaran &rarr;</span>
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 5: CLIENT SECTION (Marquee: 2-Row Opposite Motion) -->
<section class="py-16 bg-[#f8faff] dark:bg-slate-950 overflow-hidden border-t border-slate-100 dark:border-slate-800 marquee-pause relative">
    
    <div class="absolute top-4 left-1/2 -translate-x-1/2 text-8xl font-black text-slate-200/30 dark:text-slate-800/20 pointer-events-none select-none tracking-wider -z-0">
        Client
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 text-center relative z-10">
        <h2 class="text-3xl font-extrabold text-[#07153f] dark:text-white">Client & Partner Kami</h2>
        
        <p class="text-xs font-bold uppercase tracking-wider text-[#64748B] dark:text-slate-400 mono">
            Dipercaya Oleh Instansi Pemerintah, Perguruan Tinggi & Perusahaan Mitra
        </p>

        <!-- Marquee Text List (Rich Multi-Client Marquee Track) -->
        <div class="space-y-4 pt-4">
            <!-- Row 1 (Track 1: Bergerak dari Kiri ke Kanan) -->
            <div class="relative w-full overflow-hidden marquee-mask">
                <div class="marquee-track marquee-ltr items-center gap-3 sm:gap-4">
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Kementerian Komunikasi dan Digital RI (Komdigi)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        New Zealand BodyTalk Alliance (Selandia Baru)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Universitas Sriwijaya (Unsri)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Politeknik Akamigas Palembang
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Dinas Koperasi Kab. Ogan Ilir
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Master Your Muscles (Kuala Lumpur, Malaysia)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Pemerintah Desa Senuro Timur Ogan Ilir
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Ikatan Guru Indonesia (IGI) Ogan Ilir
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        PT. Duta Solusi Rumput Palembang
                    </div>

                    <!-- Repeat for seamless loop -->
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Kementerian Komunikasi dan Digital RI (Komdigi)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        New Zealand BodyTalk Alliance (Selandia Baru)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Universitas Sriwijaya (Unsri)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Politeknik Akamigas Palembang
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Dinas Koperasi Kab. Ogan Ilir
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Master Your Muscles (Kuala Lumpur, Malaysia)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Pemerintah Desa Senuro Timur Ogan Ilir
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Ikatan Guru Indonesia (IGI) Ogan Ilir
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        PT. Duta Solusi Rumput Palembang
                    </div>
                </div>
            </div>

            <!-- Row 2 (Track 2: Bergerak dari Kanan ke Kiri) -->
            <div class="relative w-full overflow-hidden marquee-mask">
                <div class="marquee-track marquee-rtl items-center gap-3 sm:gap-4">
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Yayasan As-Salam Jayapura, Papua
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        SIT Robbani Ogan Ilir
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Dompet Sosial Robbani (DSRP)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        SMAIT Ishlahul Ummah Prabumulih
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        SMAIT Raudhatul Ulum
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Yayasan Pendidikan Islam Ash-Shaff
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Ralenta Learning Center
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Koperasi Pegawai Robbani
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Penerbit Laya Aksara Jaya
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Portal Berita Kabar32.com
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Iin's Cake (Katalog Kuliner & UMKM)
                    </div>

                    <!-- Repeat for seamless loop -->
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Yayasan As-Salam Jayapura, Papua
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        SIT Robbani Ogan Ilir
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Dompet Sosial Robbani (DSRP)
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        SMAIT Ishlahul Ummah Prabumulih
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        SMAIT Raudhatul Ulum
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Yayasan Pendidikan Islam Ash-Shaff
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Ralenta Learning Center
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Koperasi Pegawai Robbani
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Penerbit Laya Aksara Jaya
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Portal Berita Kabar32.com
                    </div>
                    <div class="h-11 px-5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl flex items-center justify-center shrink-0 font-bold text-xs text-[#07153f] dark:text-slate-200 shadow-2xs">
                        Iin's Cake (Katalog Kuliner & UMKM)
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
