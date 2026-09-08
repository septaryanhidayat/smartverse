<!-- SMARTSYNTH PROMOTIONAL LANDING PARTIAL -->
<div class="space-y-16">

    <!-- Value Proposition Banner with Live Tool Callout -->
    <div class="p-8 sm:p-10 rounded-3xl bg-gradient-to-br from-indigo-950 via-[#07153f] to-slate-950 text-white border border-indigo-500/40 shadow-2xl relative overflow-hidden">
        <div class="absolute -top-20 -right-20 w-80 h-80 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="relative z-10 space-y-6">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-cyan-500/20 border border-cyan-400/30 text-cyan-300 text-xs font-mono font-bold uppercase tracking-wider">
                    <span>🔬 SCIENTIFIC AI & IMAGE FORENSICS LAB</span>
                </div>
                <a href="{{ asset('forensic/index.html') }}" 
                   target="_blank" 
                   class="px-6 py-3 rounded-xl font-black text-xs uppercase tracking-wider text-slate-900 bg-cyan-400 hover:bg-cyan-300 shadow-lg shadow-cyan-400/30 hover:scale-105 active:scale-95 transition-all flex items-center gap-2">
                    <span>Luncurkan Lab Forensik Online</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <div class="max-w-3xl space-y-3">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-white leading-tight">
                    SmartSynth: <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-indigo-300 to-purple-400">Uji Keaslian Foto Digital Secara Saintifik Berstandar Meja Redaksi</span>
                </h2>
                <p class="text-xs sm:text-sm text-slate-300 leading-relaxed font-normal">
                    Patahkan manipulasi foto dan deepfake AI di meja redaksi. Sistem pengujian berlapis yang membuktikan keaslian gambar melalui analisis biner perangkat keras kamera, kriptografi sertifikat C2PA, matriks kompresi piksel ELA 80%, hingga artefak dekonvolusi 2D FFT Spektrogram Frekuensi.
                </p>
            </div>

            <div class="pt-2 grid grid-cols-2 sm:grid-cols-4 gap-3 text-xs">
                <div class="p-3 rounded-xl bg-white/5 border border-white/10 text-cyan-300 font-semibold text-center">
                    🔍 EXIF Biner & GPS Scanner
                </div>
                <div class="p-3 rounded-xl bg-white/5 border border-white/10 text-purple-300 font-semibold text-center">
                    📜 Kriptografi C2PA 2.4
                </div>
                <div class="p-3 rounded-xl bg-white/5 border border-white/10 text-amber-300 font-semibold text-center">
                    🔬 Real ELA 80% Differential
                </div>
                <div class="p-3 rounded-xl bg-white/5 border border-white/10 text-emerald-300 font-semibold text-center">
                    🌐 2D FFT Spectrogram
                </div>
            </div>
        </div>
    </div>

    <!-- 4 Layers Deep-Dive Breakdown -->
    <div class="space-y-8">
        <div class="text-center sm:text-left space-y-2">
            <span class="text-xs font-black uppercase tracking-widest text-indigo-600 dark:text-indigo-400">METODOLOGI 4 LAPIS PEMBUKTIAN</span>
            <h3 class="text-2xl sm:text-3xl font-black text-[#07153f] dark:text-white">
                Bagaimana SmartSynth Membongkar Manipulasi Foto & Generative AI
            </h3>
            <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300">
                Alur investigasi saintifik bertingkat yang tidak dapat dikelabui oleh screenshot, crop, maupun kompresi media sosial.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Lapis 1 -->
            <div class="p-7 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:border-cyan-400 transition-all space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-cyan-100 dark:bg-cyan-950/70 text-cyan-600 dark:text-cyan-400 flex items-center justify-center text-xl font-black shadow-inner">
                        1
                    </div>
                    <div>
                        <span class="text-[10px] font-mono font-bold uppercase tracking-wider text-cyan-600 dark:text-cyan-400">Lapis Pertama</span>
                        <h4 class="text-lg font-bold text-[#07153f] dark:text-white">EXIF Binary & Sensor Header Scanner</h4>
                    </div>
                </div>
                <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                    Membaca struktur biner mentah (*ArrayBuffer*) dari file foto. Membedah tag TIFF sensor optik fisik (Make, Model Kamera, Lensa, ISO, Shutter Speed, Aperture, Flash) dan koordinat GPS. Sekaligus mendeteksi teks chunk tersembunyi (*Software: Midjourney / DALL-E / Stable Diffusion / ComfyUI parameters*) yang otomatis mengidentifikasi gambar sebagai sintetis AI.
                </p>
                <div class="p-3 rounded-xl bg-slate-50 dark:bg-slate-800/80 border border-slate-200/60 dark:border-slate-700 text-xs text-slate-600 dark:text-slate-300 space-y-1">
                    <div class="font-semibold text-[#07153f] dark:text-white">Target Deteksi:</div>
                    <div>• Sensor optik HP/Kamera fisik asli vs File buatan software.</div>
                    <div>• Deteksi status EXIF Stripped bila foto dikirim lewat WhatsApp/Telegram.</div>
                </div>
            </div>

            <!-- Lapis 2 -->
            <div class="p-7 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:border-purple-400 transition-all space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-purple-100 dark:bg-purple-950/70 text-purple-600 dark:text-purple-400 flex items-center justify-center text-xl font-black shadow-inner">
                        2
                    </div>
                    <div>
                        <span class="text-[10px] font-mono font-bold uppercase tracking-wider text-purple-600 dark:text-purple-400">Lapis Kedua</span>
                        <h4 class="text-lg font-bold text-[#07153f] dark:text-white">Kriptografi C2PA 2.4 (Content Credentials)</h4>
                    </div>
                </div>
                <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                    Standar internasional perlindungan konten digital (Coalition for Content Provenance and Authenticity). SmartSynth memindai kotak biner JUMBF (`jumb` dan `c2pa`) untuk memverifikasi sertifikat kriptografi tanda tangan digital resmi dari penerbit (OpenAI ChatGPT DALL-E 3, Adobe Firefly, Google SynthID).
                </p>
                <div class="p-3 rounded-xl bg-slate-50 dark:bg-slate-800/80 border border-slate-200/60 dark:border-slate-700 text-xs text-slate-600 dark:text-slate-300 space-y-1">
                    <div class="font-semibold text-[#07153f] dark:text-white">Target Deteksi:</div>
                    <div>• Manifest legal tanda tangan digital: <code>c2pa.created (Text-to-Image)</code>.</div>
                    <div>• Riwayat rantai suntingan gambar yang sah secara hukum pembuktian.</div>
                </div>
            </div>

            <!-- Lapis 3 -->
            <div class="p-7 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:border-amber-400 transition-all space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-amber-100 dark:bg-amber-950/70 text-amber-600 dark:text-amber-400 flex items-center justify-center text-xl font-black shadow-inner">
                        3
                    </div>
                    <div>
                        <span class="text-[10px] font-mono font-bold uppercase tracking-wider text-amber-600 dark:text-amber-400">Lapis Ketiga</span>
                        <h4 class="text-lg font-bold text-[#07153f] dark:text-white">Real Error Level Analysis (Real ELA 80%)</h4>
                    </div>
                </div>
                <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                    Uji forensik piksel nyata berbasis kompresi differensial: Kanvas gambar dikompresi ulang secara matematis pada rasio 80% JPEG standar. Sistem kemudian menghitung selisih absolut setiap piksel <code>|original - compressed| * multiplier</code>. Area yang dimanipulasi atau ditempel dari sumber lain akan memendarkan tingkat error yang kontras dengan latar belakang foto.
                </p>
                <div class="p-3 rounded-xl bg-slate-50 dark:bg-slate-800/80 border border-slate-200/60 dark:border-slate-700 text-xs text-slate-600 dark:text-slate-300 space-y-1">
                    <div class="font-semibold text-[#07153f] dark:text-white">Target Deteksi:</div>
                    <div>• Deteksi tempelan wajah, objek palsu, clonestamp, dan photoshop visual.</div>
                    <div>• Perbedaan tingkat degradasi kompresi blok DCT 8x8 piksel.</div>
                </div>
            </div>

            <!-- Lapis 4 -->
            <div class="p-7 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl hover:border-emerald-400 transition-all space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-emerald-100 dark:bg-emerald-950/70 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-xl font-black shadow-inner">
                        4
                    </div>
                    <div>
                        <span class="text-[10px] font-mono font-bold uppercase tracking-wider text-emerald-600 dark:text-emerald-400">Lapis Keempat</span>
                        <h4 class="text-lg font-bold text-[#07153f] dark:text-white">2D FFT (Fast Fourier Transform) Spektrogram</h4>
                    </div>
                </div>
                <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                    Analisis spektrum frekuensi 2 dimensi tingkat lanjut. Model AI Generatif (Generative Adversarial Networks & Latent Diffusion Models) menggunakan lapisan upsampling konvolusi yang meninggalkan cacat matematis berupa pola kisi periodik (*deconvolution checkerboard artifacts*). Pola kisi simetris di luar titik pusat (DC) membuktikan gambar diciptakan oleh AI.
                </p>
                <div class="p-3 rounded-xl bg-slate-50 dark:bg-slate-800/80 border border-slate-200/60 dark:border-slate-700 text-xs text-slate-600 dark:text-slate-300 space-y-1">
                    <div class="font-semibold text-[#07153f] dark:text-white">Target Deteksi:</div>
                    <div>• Sidik jari matematis arsitektur Neural Network yang tidak terlihat mata manusia.</div>
                    <div>• Tetap dapat terdeteksi meskipun foto telah melalui kompresi WhatsApp.</div>
                </div>
            </div>

        </div>
    </div>

    <!-- SOP Berita Acara Generator Section -->
    <div class="p-8 sm:p-10 rounded-3xl bg-slate-900 text-white border border-slate-800 shadow-2xl space-y-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 pb-6 border-b border-white/10">
            <div class="space-y-2">
                <span class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-400 text-xs font-mono font-bold">
                    📋 OUTPUT STANDAR MEJA REDAKSI & HUKUM
                </span>
                <h3 class="text-xl sm:text-2xl font-black text-white">
                    Generator Berita Acara Forensik Digital Resmi
                </h3>
                <p class="text-xs sm:text-sm text-slate-400 max-w-2xl leading-relaxed">
                    Setelah pengujian selesai, SmartSynth secara otomatis merangkum temuan menjadi dokumen formal Berita Acara yang dapat langsung dicetak PDF atau dijadikan lampiran audit rapat redaksi.
                </p>
            </div>
            <a href="{{ asset('forensic/index.html') }}" 
               target="_blank" 
               class="px-6 py-3.5 rounded-xl font-bold text-xs uppercase tracking-wider bg-white text-slate-900 hover:bg-slate-200 transition-all text-center shrink-0">
                Uji Coba Sekarang &rarr;
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
            <div class="p-4 rounded-xl bg-white/5 border border-white/10 space-y-2">
                <span class="text-cyan-400 font-bold block">1. Nomor Registrasi & Metadata</span>
                <p class="text-slate-300 text-[11px]">Nomor berkas unik, tanggal & jam uji, identitas analis pemeriksa, serta hash SHA-256 berkas foto asli.</p>
            </div>
            <div class="p-4 rounded-xl bg-white/5 border border-white/10 space-y-2">
                <span class="text-purple-400 font-bold block">2. Matriks Pengujian 4 Lapis</span>
                <p class="text-slate-300 text-[11px]">Tabel komparasi status EXIF, manifest C2PA JUMBF, tingkat pendaran ELA, dan anomali spektrum 2D FFT.</p>
            </div>
            <div class="p-4 rounded-xl bg-white/5 border border-white/10 space-y-2">
                <span class="text-emerald-400 font-bold block">3. Rekomendasi Tindakan Redaksi</span>
                <p class="text-slate-300 text-[11px]">Skor probabilitas AI (0-100%) dan vonis status rekomendasi: Layak Terbit, Ditolak Hoaks, atau Investigasi Lanjutan.</p>
            </div>
        </div>
    </div>

    <!-- 3 Implementation Editions -->
    <div class="space-y-6">
        <div class="text-center max-w-2xl mx-auto space-y-2">
            <span class="text-xs font-black uppercase tracking-widest text-indigo-600 dark:text-indigo-400">SKEMA IMPLEMENTASI FORENSIK DIGITAL</span>
            <h3 class="text-2xl sm:text-3xl font-black text-[#07153f] dark:text-white">
                Pilihan Skema Implementasi SmartSynth
            </h3>
            <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300">
                Pilihan integrasi fleksibel untuk meja redaksi media massa, instansi hukum, tim verifikasi fakta, dan korporat.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Tier 1 -->
            <div class="p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm space-y-5 flex flex-col justify-between">
                <div class="space-y-3">
                    <span class="px-2.5 py-1 rounded-md bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs">Edisi 1: Standalone Lab</span>
                    <h4 class="text-xl font-bold text-[#07153f] dark:text-white">Web Lab &amp; Berita Acara</h4>
                    <div class="text-base font-black text-indigo-600 dark:text-cyan-400">Lisensi Mandiri Tim Redaksi</div>
                    <p class="text-xs text-slate-500">Antarmuka lab forensik web lengkap siap pakai untuk verifikasi manual foto harian wartawan &amp; editor foto.</p>
                    <ul class="text-xs space-y-2 pt-2 border-t border-slate-100 dark:border-slate-800 text-slate-600 dark:text-slate-300">
                        <li>✓ 4 Lapis Pengujian (EXIF, C2PA, ELA, 2D FFT)</li>
                        <li>✓ Generator Dokumen Berita Acara Resmi (PDF)</li>
                        <li>✓ Berjalan di Browser Modern Tanpa Install Software</li>
                        <li>✓ Panduan Lengkap SOP Verifikasi Foto Jurnalistik</li>
                    </ul>
                </div>
                <a href="https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20konsultasi%20SmartSynth%20Edisi%20Standalone%20Lab" 
                   target="_blank" class="w-full py-2.5 rounded-xl border border-indigo-600 text-indigo-600 hover:bg-indigo-600 hover:text-white text-xs font-bold text-center transition-all">
                    Minta Penawaran Standalone &rarr;
                </a>
            </div>

            <!-- Tier 2 (Featured) -->
            <div class="p-7 rounded-3xl bg-gradient-to-b from-indigo-50 via-white to-cyan-50/50 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 border-2 border-indigo-600 shadow-xl space-y-5 flex flex-col justify-between relative">
                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-indigo-600 text-white font-black text-[10px] uppercase tracking-wider shadow-md">
                    🔥 REKOMENDASI MEDIA &amp; REDAKSI
                </div>
                <div class="space-y-3 pt-2">
                    <span class="px-2.5 py-1 rounded-md bg-indigo-100 text-indigo-800 font-bold text-xs">Edisi 2: Turnkey Newsroom</span>
                    <h4 class="text-2xl font-black text-[#07153f] dark:text-white">Lab Dedicated + Training</h4>
                    <div class="text-base font-black text-indigo-600 dark:text-cyan-400">Turnkey Appliance + Cloud / On-Prem</div>
                    <p class="text-xs text-slate-600 dark:text-slate-300">Instalasi dedicated di infrastruktur perusahaan Anda, disertai sesi pelatihan investigasi forensik untuk jurnalis.</p>
                    <ul class="text-xs space-y-2 pt-2 border-t border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-200 font-medium">
                        <li>✓ Semua Fasilitas Edisi Standalone Lab</li>
                        <li>✓ <strong>Dedicated Private Cloud / On-Premise Server</strong></li>
                        <li>✓ <strong>Workshop &amp; Pelatihan Sertifikasi Analis Forensik</strong></li>
                        <li>✓ Custom Header Berita Acara dengan Logo Media Anda</li>
                        <li>✓ Pembaruan Pattern Model Deepfake AI Terbaru 1 Tahun</li>
                    </ul>
                </div>
                <a href="https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20konsultasi%20SmartSynth%20Edisi%20Turnkey%20Newsroom" 
                   target="_blank" class="w-full py-3 rounded-xl bg-gradient-to-r from-indigo-600 to-cyan-600 hover:from-indigo-700 hover:to-cyan-700 text-white font-black text-xs uppercase tracking-wider text-center shadow-lg shadow-indigo-500/30 transition-all">
                    Konsultasi Turnkey Redaksi &rarr;
                </a>
            </div>

            <!-- Tier 3 -->
            <div class="p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm space-y-5 flex flex-col justify-between">
                <div class="space-y-3">
                    <span class="px-2.5 py-1 rounded-md bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs">Edisi 3: Enterprise</span>
                    <h4 class="text-xl font-bold text-[#07153f] dark:text-white">API &amp; Automated Pipeline</h4>
                    <div class="text-base font-black text-indigo-600 dark:text-cyan-400">High-Throughput Batch Engine</div>
                    <p class="text-xs text-slate-500">Integrasikan mesin analisis forensik langsung ke CMS penerbitan berita atau sistem KYC/KYB korporasi.</p>
                    <ul class="text-xs space-y-2 pt-2 border-t border-slate-100 dark:border-slate-800 text-slate-600 dark:text-slate-300">
                        <li>✓ RESTful API &amp; Webhook Real-time Verification</li>
                        <li>✓ Batch Ingestion Processing untuk Puluhan Ribu Foto</li>
                        <li>✓ Auto-Flagging Foto Suspect AI sebelum Publish di CMS</li>
                        <li>✓ Integrasi Kriptografi C2PA Content Credentials Signing</li>
                        <li>✓ SLA Teknis 24/7 &amp; Dedicated Solutions Engineer</li>
                    </ul>
                </div>
                <a href="https://wa.me/6289695249089?text=Halo%20SmartVerse,%20saya%20tertarik%20konsultasi%20SmartSynth%20Edisi%20Enterprise%20API" 
                   target="_blank" class="w-full py-2.5 rounded-xl border border-indigo-600 text-indigo-600 hover:bg-indigo-600 hover:text-white text-xs font-bold text-center transition-all">
                    Hubungi Enterprise Architect &rarr;
                </a>
            </div>

        </div>
    </div>

</div>
