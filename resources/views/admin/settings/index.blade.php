@extends('admin.layouts.app')

@section('title', 'Tema, SEO & Pengaturan Website')

@section('content')
<div class="space-y-8" x-data="{
    primaryColor: '{{ $settings['theme_primary_color']->value ?? '#3E5CE7' }}',
    accentColor: '{{ $settings['theme_accent_color']->value ?? '#fe6000' }}',
    bgSoft: '{{ $settings['theme_bg_soft']->value ?? '#f4f7fe' }}'
}">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#071330] flex items-center gap-2.5">
                <span>🎨</span>
                <span>Tema, Branding, SEO & Pengaturan Website</span>
            </h1>
            <p class="text-xs text-slate-500 font-medium mt-1">
                Kustomisasi teks dan foto Hero banner, upload Favicon & OG share sosial media, sinkronisasi logo invoice, dan konfigurasi SEO enterprise.
            </p>
        </div>
        <button type="submit" form="settingForm" class="px-6 py-3 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-extrabold text-xs uppercase tracking-wider shadow-md hover:shadow-blue-600/30 transition-all flex items-center gap-2">
            <span>💾 Simpan Semua Perubahan</span>
        </button>
    </div>

    @if(session('success'))
        <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold flex items-center gap-2">
            <span>✓</span>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <form id="settingForm" action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <!-- SECTION 1: IDENTITAS BRANDING, LOGO, FAVICON & OPEN GRAPH (OG) -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm space-y-6">
            <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-extrabold text-[#071330] flex items-center gap-2">
                        <span>🌟</span>
                        <span>Identitas Branding, Logo, Favicon & OG Media Sosial</span>
                    </h2>
                    <p class="text-xs text-slate-400 font-medium">Logo yang diupload di sini otomatis digunakan di website dan di cetak faktur invoice</p>
                </div>
                <span class="px-3 py-1 rounded-full bg-blue-50 text-[#3E5CE7] font-bold text-[10px]">SEO & Social Ready</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- 1. Logo Resmi -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <label class="block text-xs font-extrabold text-[#071330] uppercase tracking-wider">
                        Logo Resmi Perusahaan
                    </label>
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-xl border border-slate-300 bg-white p-1 flex items-center justify-center overflow-hidden shrink-0 shadow-xs">
                            <img id="preview_site_logo" src="{{ asset($settings['site_logo']->value ?? 'images/Logo-BTD.png') }}" alt="Logo Preview" class="max-w-full max-h-full object-contain" />
                        </div>
                        <div class="flex-1 min-w-0">
                            <input type="file" name="site_logo_file" accept="image/*" onchange="previewImage(this, 'preview_site_logo')" class="block w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-[11px] file:font-extrabold file:bg-blue-50 file:text-[#3E5CE7] hover:file:bg-blue-100" />
                        </div>
                    </div>
                    <p class="text-[11px] text-slate-500 font-medium">Otomatis tampil di Navbar, Footer, dan <strong>Cetak Faktur Invoice</strong> resmi.</p>
                </div>

                <!-- 2. Favicon Website -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <label class="block text-xs font-extrabold text-[#071330] uppercase tracking-wider">
                        Favicon Tab Browser (.png / .ico)
                    </label>
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-xl border border-slate-300 bg-white p-2 flex items-center justify-center overflow-hidden shrink-0 shadow-xs">
                            <img id="preview_site_favicon" src="{{ asset($settings['site_favicon']->value ?? 'favicon.png') }}" alt="Favicon Preview" class="max-w-full max-h-full object-contain" />
                        </div>
                        <div class="flex-1 min-w-0">
                            <input type="file" name="site_favicon_file" accept="image/png,image/x-icon,image/svg+xml" onchange="previewImage(this, 'preview_site_favicon')" class="block w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-[11px] file:font-extrabold file:bg-blue-50 file:text-[#3E5CE7] hover:file:bg-blue-100" />
                        </div>
                    </div>
                    <p class="text-[11px] text-slate-500 font-medium">Ikon kecil yang tampil pada tab peramban browser pengunjung.</p>
                </div>

                <!-- 3. OpenGraph (OG) Share Image -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <label class="block text-xs font-extrabold text-[#071330] uppercase tracking-wider">
                        Gambar Share WhatsApp & Medsos (OG Image)
                    </label>
                    <div class="flex items-center gap-4">
                        <div class="w-20 h-14 rounded-xl border border-slate-300 bg-white p-1 flex items-center justify-center overflow-hidden shrink-0 shadow-xs">
                            <img id="preview_og_image" src="{{ asset($settings['og_image']->value ?? $settings['site_logo']->value ?? 'images/Logo-BTD.png') }}" alt="OG Preview" class="max-w-full max-h-full object-contain" />
                        </div>
                        <div class="flex-1 min-w-0">
                            <input type="file" name="og_image_file" accept="image/*" onchange="previewImage(this, 'preview_og_image')" class="block w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-[11px] file:font-extrabold file:bg-blue-50 file:text-[#3E5CE7] hover:file:bg-blue-100" />
                        </div>
                    </div>
                    <p class="text-[11px] text-slate-500 font-medium">Banner pratinjau kartu saat link website dibagikan ke WhatsApp / medsos (1200x630px).</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-3 border-t border-slate-100">
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Judul Meta SEO Website (Site Meta Title) *</label>
                    <input type="text" name="site_title" value="{{ $settings['site_title']->value ?? 'CV. Beranda Teknologi Digital' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-medium" />
                    <span class="text-[11px] text-slate-400">Judul utama yang diindeks oleh Google Search.</span>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Tagline Utama Perusahaan</label>
                    <input type="text" name="site_tagline" value="{{ $settings['site_tagline']->value ?? 'Software House, Mobile App Flutter & Solusi AI' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-medium" />
                </div>

                <div class="space-y-1.5 md:col-span-2">
                    <label class="block text-xs font-bold text-[#071330]">Deskripsi Meta SEO & OpenGraph (Meta Description) *</label>
                    <textarea name="site_description" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none leading-relaxed">{{ $settings['site_description']->value ?? 'CV. Beranda Teknologi Digital adalah agensi teknologi digital modern di Indonesia. Jasa pembuatan website, aplikasi Android/iOS, solusi AI privat, dan workshop IT profesional.' }}</textarea>
                </div>
            </div>
        </div>

        <!-- SECTION 2: HERO BANNER (TEXT & FOTO HERO) -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm space-y-6">
            <div class="border-b border-slate-100 pb-3">
                <h2 class="text-base font-extrabold text-[#071330] flex items-center gap-2">
                    <span>🚀</span>
                    <span>Kustomisasi Hero Banner Utama & Portofolio</span>
                </h2>
                <p class="text-xs text-slate-400 font-medium">Ubah headline, deskripsi, dan foto hero banner di bagian paling atas halaman Beranda</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                
                <!-- Left: Texts Inputs -->
                <div class="lg:col-span-8 space-y-5">
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-[#071330]">Eyebrow Badge Hero (Teks Kecil di Atas Judul)</label>
                        <input type="text" name="hero_badge" value="{{ $settings['hero_badge']->value ?? 'Digital Agency & Software House Terpercaya' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-medium" />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-[#071330]">Judul Utama Baris 1 *</label>
                            <input type="text" name="hero_title_1" value="{{ $settings['hero_title_1']->value ?? 'Bangun Ekosistem Digital' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-bold text-[#071330]" />
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-[#071330]">Judul Utama Baris 2 (Warna Biru) *</label>
                            <input type="text" name="hero_title_2" value="{{ $settings['hero_title_2']->value ?? 'yang Berdampak Nyata' }}" class="w-full px-4 py-2.5 rounded-xl border border-blue-300 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-bold text-[#3E5CE7]" />
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-[#071330]">Deskripsi Panjang Hero *</label>
                        <textarea name="hero_description" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none leading-relaxed">{{ $settings['hero_description']->value ?? 'Kami mengintegrasikan solusi perangkat lunak mutakhir dan program edukasi untuk mentransformasi operasional bisnis Anda. Mulai dari perancangan web korporat, pengembangan aplikasi seluler, solusi otomasi cerdas, hingga penciptaan talenta digital profesional.' }}</textarea>
                    </div>

                    <div class="space-y-1.5 pt-2 border-t border-slate-100">
                        <label class="block text-xs font-bold text-[#071330]">
                            Deskripsi Pembuka Portofolio (Bersifat Umum untuk Koleksi Karya) *
                        </label>
                        <textarea name="portfolio_description" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none leading-relaxed">{{ $settings['portfolio_description']->value ?? 'Eksplorasi portofolio proyek dan sistem informasi enterprise inovatif yang kami rancang dan kembangkan untuk berbagai instansi pemerintah, institusi pendidikan, dan perusahaan nasional. Klik foto portofolio untuk melihat galeri tampilan layar aplikasi.' }}</textarea>
                        <span class="text-[11px] text-slate-400">Deskripsi ini menggantikan teks kaku lama agar fleksibel dan selalu relevan seiring bertambahnya jumlah proyek.</span>
                    </div>
                </div>

                <!-- Right: Foto Hero Upload & Preview -->
                <div class="lg:col-span-4 p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-4">
                    <label class="block text-xs font-extrabold text-[#071330] uppercase tracking-wider">
                        Foto / Visual Hero Banner
                    </label>

                    <div class="aspect-4/3 rounded-xl border-2 border-dashed border-slate-300 bg-white p-2 flex items-center justify-center overflow-hidden">
                        <img id="preview_hero_image" src="{{ asset($settings['hero_image']->value ?? 'images/hero-person-old.png') }}" alt="Hero Image Preview" class="max-w-full max-h-full object-contain drop-shadow-md" />
                    </div>

                    <div class="space-y-1.5">
                        <input type="file" name="hero_image_file" accept="image/*" onchange="previewImage(this, 'preview_hero_image')" class="block w-full text-xs text-slate-500 file:mr-2 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer" />
                        <p class="text-[11px] text-slate-400">Format PNG transparan atau ilustrasi landscape. Maks 3MB.</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- SECTION 2.5: SECTION ABOUT US (TENTANG KAMI & SHOWCASE ILUSTRASI) -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm space-y-6">
            <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-extrabold text-[#071330] flex items-center gap-2">
                        <span>🏢</span>
                        <span>Section Tentang Kami (About Us & Digital Strategies)</span>
                    </h2>
                    <p class="text-xs text-slate-400 font-medium">Kustomisasi judul, teks profil perusahaan, tombol aksi, dan gambar ilustrasi di homepage</p>
                </div>
                <span class="px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 font-bold text-[10px]">Homepage Section 4</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                
                <!-- Left: Texts Inputs -->
                <div class="lg:col-span-8 space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="space-y-1.5 sm:col-span-1">
                            <label class="block text-xs font-bold text-[#071330]">Badge Kategori</label>
                            <input type="text" name="about_badge" value="{{ $settings['about_badge']->value ?? 'About us' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-bold text-[#3E5CE7]" />
                        </div>
                        <div class="space-y-1.5 sm:col-span-2">
                            <label class="block text-xs font-bold text-[#071330]">Judul Utama Section *</label>
                            <input type="text" name="about_title" value="{{ $settings['about_title']->value ?? 'We develop digital strategies products and services.' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-black text-[#071330]" />
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-[#071330]">Deskripsi Panjang Profil Perusahaan *</label>
                        <textarea name="about_description" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none leading-relaxed">{{ $settings['about_description']->value ?? 'CV. Beranda Teknologi Digital adalah Digital Creative Agency & Software House terpercaya yang mempunyai pengalaman pembuatan puluhan website bisnis, sistem informasi instansi, dan toko online secara elegan dan profesional. Kami hadir dengan desain website yang mengikuti tren terkini, user friendly, dan mudah dioperasikan.' }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 border-t border-slate-100">
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-[#071330]">Teks Tombol Aksi</label>
                            <input type="text" name="about_button_text" value="{{ $settings['about_button_text']->value ?? 'Pelajari Selengkapnya' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-bold" />
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-[#071330]">URL / Link Tujuan Tombol</label>
                            <input type="text" name="about_button_url" value="{{ $settings['about_button_url']->value ?? '/services' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-mono focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                        </div>
                    </div>
                </div>

                <!-- Right: Foto / Ilustrasi Showcase -->
                <div class="lg:col-span-4 p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-4">
                    <label class="block text-xs font-extrabold text-[#071330] uppercase tracking-wider">
                        Gambar Ilustrasi Showcase
                    </label>

                    <div class="aspect-video rounded-xl border-2 border-dashed border-slate-300 bg-white p-2 flex items-center justify-center overflow-hidden">
                        <img id="preview_about_image" src="{{ asset($settings['about_image']->value ?? 'images/Ilustrasi-Homepage-1-1.png') }}" alt="About Image Preview" class="max-w-full max-h-full object-contain drop-shadow-md" />
                    </div>

                    <div class="space-y-1.5">
                        <input type="file" name="about_image_file" accept="image/*" onchange="previewImage(this, 'preview_about_image')" class="block w-full text-xs text-slate-500 file:mr-2 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer" />
                        <p class="text-[11px] text-slate-400">Otomatis dikonversi ke WebP &le; 100KB untuk menjaga kecepatan loading.</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- SECTION 2.6: SECTION CALL TO ACTION (BANNER AJAKAN KERJASAMA) -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm space-y-6">
            <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-extrabold text-[#071330] flex items-center gap-2">
                        <span>🤝</span>
                        <span>Section Banner Ajakan Kerjasama (Call to Action)</span>
                    </h2>
                    <p class="text-xs text-slate-400 font-medium">Kustomisasi judul ajakan, deskripsi konsultasi, dan nomor kontak di banner penutup</p>
                </div>
                <span class="px-3 py-1 rounded-full bg-orange-50 text-[#fe6000] font-bold text-[10px]">Homepage Penutup</span>
            </div>

            <div class="space-y-4">
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Judul Utama Ajakan (Headline CTA) *</label>
                    <input type="text" name="cta_headline" value="{{ $settings['cta_headline']->value ?? 'Let\'s Work Together' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#fe6000] focus:outline-none font-black text-[#071330]" />
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Deskripsi Panjang Ajakan Konsultasi *</label>
                    <textarea name="cta_description" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#fe6000] focus:outline-none leading-relaxed">{{ $settings['cta_description']->value ?? 'Revolusi Teknologi mengubah aspek kehidupan kita, dan struktur masyarakat itu sendiri. Konsultasikan rencana pembuatan website perusahaan, aplikasi mobile Flutter, sistem informasi, atau pelatihan IT bersama CV. Beranda Teknologi Digital.' }}</textarea>
                </div>
            </div>
        </div>

        <!-- SECTION 3: THEME COLOR SCHEME -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm space-y-6">
            <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-extrabold text-[#071330] flex items-center gap-2">
                        <span>🌈</span>
                        <span>Kustomisasi Skema Warna Tema Website</span>
                    </h2>
                    <p class="text-xs text-slate-400 font-medium">Pilih palet warna identitas website yang akan diterapkan secara global</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Primary Color -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <label class="block text-xs font-bold text-[#071330] uppercase tracking-wider">
                        Warna Utama (Primary Color)
                    </label>
                    <div class="flex items-center gap-3">
                        <input type="color" name="theme_primary_color" x-model="primaryColor" class="w-12 h-12 rounded-xl cursor-pointer border-0 p-0 bg-transparent" />
                        <div class="flex-1">
                            <input type="text" name="theme_primary_color_text" x-model="primaryColor" class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs font-mono font-bold focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                        </div>
                    </div>
                    <p class="text-[11px] text-slate-400">Digunakan untuk tombol utama, watermark, dan aksen navigasi.</p>
                </div>

                <!-- Accent Color -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <label class="block text-xs font-bold text-[#071330] uppercase tracking-wider">
                        Warna Aksen (Accent Orange)
                    </label>
                    <div class="flex items-center gap-3">
                        <input type="color" name="theme_accent_color" x-model="accentColor" class="w-12 h-12 rounded-xl cursor-pointer border-0 p-0 bg-transparent" />
                        <div class="flex-1">
                            <input type="text" name="theme_accent_color_text" x-model="accentColor" class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs font-mono font-bold focus:ring-2 focus:ring-[#fe6000] focus:outline-none" />
                        </div>
                    </div>
                    <p class="text-[11px] text-slate-400">Digunakan untuk badge penawaran, tombol oranye CTA, dan highlight.</p>
                </div>

                <!-- Soft BG -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <label class="block text-xs font-bold text-[#071330] uppercase tracking-wider">
                        Warna Background Lembut (Soft BG)
                    </label>
                    <div class="flex items-center gap-3">
                        <input type="color" name="theme_bg_soft" x-model="bgSoft" class="w-12 h-12 rounded-xl cursor-pointer border-0 p-0 bg-transparent" />
                        <div class="flex-1">
                            <input type="text" name="theme_bg_soft_text" x-model="bgSoft" class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs font-mono font-bold focus:ring-2 focus:ring-slate-400 focus:outline-none" />
                        </div>
                    </div>
                    <p class="text-[11px] text-slate-400">Digunakan untuk latar belakang section kartu dan perkiraan harga.</p>
                </div>
            </div>
        </div>

        <!-- SECTION 4: DATA IDENTITAS PERUSAHAAN & INVOICE -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm space-y-6">
            <div class="border-b border-slate-100 pb-3">
                <h2 class="text-base font-extrabold text-[#071330] flex items-center gap-2">
                    <span>🏢</span>
                    <span>Identitas Perusahaan & Format Cetak Faktur</span>
                </h2>
                <p class="text-xs text-slate-400 font-medium">Informasi resmi yang tercetak pada kop faktur/invoice klien dan legalitas website</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Nama Badan Usaha *</label>
                    <input type="text" name="company_name" value="{{ $settings['company_name']->value ?? 'CV. Beranda Teknologi Digital' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-bold" />
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Alamat Baris 1 (Faktur) *</label>
                    <input type="text" name="company_address_line1" value="{{ $settings['company_address_line1']->value ?? 'Jl. Sarjana, Timbangan, Ogan Ilir' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Alamat Baris 2 (Provinsi & Negara) *</label>
                    <input type="text" name="company_address_line2" value="{{ $settings['company_address_line2']->value ?? 'Sumatera Selatan, Indonesia' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Kode Pos *</label>
                    <input type="text" name="company_postal_code" value="{{ $settings['company_postal_code']->value ?? '30862' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-mono focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Alamat Website *</label>
                    <input type="text" name="site_website" value="{{ $settings['site_website']->value ?? 'www.berandadigital.net' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-mono focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Nomor Kontak / WhatsApp Tunggal *</label>
                    <input type="text" name="contact_phone" value="{{ $settings['contact_phone']->value ?? '089695249089' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-mono font-bold focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                </div>

                <div class="space-y-1.5 md:col-span-3">
                    <label class="block text-xs font-bold text-[#071330]">Alamat Lengkap Footer Faktur *</label>
                    <input type="text" name="company_address" value="{{ $settings['company_address']->value ?? 'Jalan Sarjana Blok A No. 25 Timbangan, Ogan Ilir, 30862' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                </div>
            </div>
        </div>

        <!-- Submit Button Bottom -->
        <div class="flex justify-end">
            <button type="submit" class="px-8 py-4 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-extrabold text-xs uppercase tracking-wider shadow-xl hover:shadow-blue-600/30 transition-all flex items-center gap-2">
                <span>💾 Simpan Semua Pengaturan & Warna Tema</span>
            </button>
        </div>

    </form>
</div>

<script>
function previewImage(input, previewId) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById(previewId).src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
