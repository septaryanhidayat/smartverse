<!DOCTYPE html>
<html lang="id" class="min-h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pemberitahuan Sistem') - CV. Beranda Teknologi Digital</title>
    <link rel="icon" type="image/png" href="/images/Logo-BTD-Blue.png">
    
    <!-- Tailwind CSS CDN Fallback & Preconnect -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            blue: '#3E5CE7',
                            orange: '#fe6000',
                            navy: '#07153f',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@500;700&display=swap');
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }
        .mono {
            font-family: 'JetBrains Mono', monospace;
        }
        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(1deg); }
        }
        .anim-float {
            animation: floatSlow 5s ease-in-out infinite;
        }
    </style>
    <script>
        // Synchronize dark/light theme with local storage
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="min-h-screen bg-[#f4f7fe] dark:bg-[#070d1e] text-slate-800 dark:text-slate-100 flex flex-col justify-between transition-colors duration-300 antialiased selection:bg-[#3E5CE7] selection:text-white">

    <!-- Top Minimal Navigation -->
    <header class="w-full max-w-6xl mx-auto px-6 py-6 flex items-center justify-between z-20 shrink-0">
        <a href="/" class="flex items-center gap-3 group">
            <img src="/images/Logo-BTD.png" alt="CV. Beranda Teknologi Digital" class="h-10 w-auto object-contain dark:hidden transition-transform group-hover:scale-105" />
            <img src="/images/Logo-BTD-white.png" alt="CV. Beranda Teknologi Digital" class="h-10 w-auto object-contain hidden dark:block transition-transform group-hover:scale-105" />
        </a>

        <div class="flex items-center gap-3">
            <!-- Theme Toggle Button -->
            <button onclick="toggleTheme()" class="w-10 h-10 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-sm flex items-center justify-center text-base hover:scale-105 transition-all" title="Ganti Tema">
                <span class="dark:hidden">🌙</span>
                <span class="hidden dark:inline">☀️</span>
            </button>
            <a href="/" class="hidden sm:inline-flex items-center gap-2 px-4 py-2 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-xs font-bold text-slate-700 dark:text-slate-200 hover:text-[#3E5CE7] dark:hover:text-blue-400 shadow-sm transition-all">
                <span>&larr; Beranda</span>
            </a>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-1 flex items-center justify-center px-4 sm:px-6 py-8 relative">
        
        <!-- Background Ambient Glow -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[550px] h-[550px] bg-gradient-to-tr from-blue-500/15 to-orange-500/10 dark:from-blue-600/10 dark:to-orange-500/10 rounded-full blur-3xl pointer-events-none -z-0"></div>

        <div class="w-full max-w-xl bg-white/90 dark:bg-slate-900/90 backdrop-blur-xl border border-slate-200/80 dark:border-slate-800 rounded-3xl p-8 sm:p-12 shadow-2xl relative z-10 text-center space-y-6">
            
            <!-- Graphic Illustration / Icon Badge -->
            <div class="flex justify-center">
                @yield('illustration')
            </div>

            <!-- Error Code & Header -->
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 dark:bg-blue-950/60 border border-blue-200 dark:border-blue-800 text-[#3E5CE7] dark:text-blue-400 text-xs font-black mono uppercase tracking-wider">
                    <span>@yield('badge', 'Status Sistem')</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-black text-[#07153f] dark:text-white tracking-tight">
                    @yield('heading', 'Terjadi Kendala')
                </h1>
            </div>

            <!-- Safe Message (No code, friendly text) -->
            <div class="text-slate-600 dark:text-slate-300 text-xs sm:text-sm leading-relaxed max-w-md mx-auto space-y-3 font-normal">
                @yield('message')
            </div>

            <!-- Security & Production Notice Banner -->
            <div class="p-3.5 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-100 dark:border-slate-800 text-[11px] text-slate-500 dark:text-slate-400 flex items-center justify-center gap-2">
                <span>🛡️</span>
                <span>Mode Produksi Aktif: Data & sistem dilindungi secara aman.</span>
            </div>

            <!-- Action Buttons -->
            <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="/" class="w-full sm:w-auto px-6 py-3.5 rounded-2xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-extrabold text-xs uppercase tracking-wider shadow-lg shadow-blue-600/30 hover:scale-105 active:scale-95 transition-all inline-flex items-center justify-center gap-2">
                    <span>🏠 Kembali ke Beranda</span>
                </a>
                
                <a href="https://wa.me/6289695249089?text=Halo%20Admin%20Beranda%20Digital,%20saya%20mengalami%20kendala%20saat%20mengakses%20website" target="_blank" class="w-full sm:w-auto px-6 py-3.5 rounded-2xl bg-[#fe6000] hover:brightness-110 text-white font-extrabold text-xs uppercase tracking-wider shadow-lg shadow-orange-500/30 hover:scale-105 active:scale-95 transition-all inline-flex items-center justify-center gap-2">
                    <span>💬 Hubungi Tim BTD</span>
                </a>
            </div>

            <!-- Reload Option -->
            <div>
                <button onclick="window.location.reload()" class="text-xs text-slate-400 dark:text-slate-500 hover:text-slate-700 dark:hover:text-slate-300 font-semibold underline underline-offset-4 transition-colors">
                    🔄 Coba Muat Ulang Halaman
                </button>
            </div>

        </div>
    </main>

    <!-- Footer Copyright -->
    <footer class="py-6 text-center text-xs text-slate-400 dark:text-slate-500 z-10">
        <p>&copy; {{ date('Y') }} <strong>CV. Beranda Teknologi Digital</strong>. All rights reserved.</p>
        <p class="text-[10px] mt-1 font-mono text-slate-400/80">Ref ID: {{ strtoupper(substr(md5(url()->current() . microtime()), 0, 8)) }}</p>
    </footer>

    <script>
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
        }
    </script>
</body>
</html>
