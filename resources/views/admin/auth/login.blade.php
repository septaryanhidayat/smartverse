<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Administrator - CV. Beranda Teknologi Digital</title>
    
    @php
        $siteFavicon = \App\Models\Setting::where('key', 'site_favicon')->value('value') ?? 'favicon.png';
    @endphp
    <!-- Favicon & App Icons -->
    <link rel="icon" type="image/png" href="{{ asset($siteFavicon) }}">
    <link rel="shortcut icon" href="{{ asset($siteFavicon) }}">
    <link rel="apple-touch-icon" href="{{ asset($siteFavicon) }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (Compiled & CDN Fallback) -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-DI5lHB4f.css') }}">
    <link rel="stylesheet" href="/build/assets/app-DI5lHB4f.css">
    <script src="https://cdn.tailwindcss.com"></script>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(base_path('public/build/manifest.json')) || file_exists(base_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body, button, input, select, textarea {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
        }
        .mono {
            font-family: 'JetBrains Mono', monospace !important;
        }
    </style>
</head>
<body class="min-h-screen bg-[#071330] flex items-center justify-center p-4 relative overflow-hidden text-slate-800 selection:bg-[#3E5CE7] selection:text-white"
      x-data="{ showPass: false }">

    <!-- Background Atmospheric Glows -->
    <div class="absolute -top-40 -left-40 w-[30rem] h-[30rem] bg-blue-600/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-40 -right-40 w-[30rem] h-[30rem] bg-[#fe6000]/15 rounded-full blur-3xl pointer-events-none"></div>
    
    <!-- Grid Pattern Overlay -->
    <div class="absolute inset-0 opacity-[0.07] pointer-events-none" style="background-image: radial-gradient(#3E5CE7 1px, transparent 1px); background-size: 28px 28px;"></div>

    <div class="w-full max-w-md relative z-10 space-y-6">
        
        <!-- Login Card -->
        <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-2xl border border-slate-100 space-y-7">
            
            <!-- Logo & Title -->
            <div class="text-center space-y-3">
                <a href="{{ route('home') }}" class="inline-block hover:scale-105 transition-transform" title="CV. Beranda Teknologi Digital">
                    <img src="{{ asset('images/Logo-BTD.png') }}" alt="CV. Beranda Teknologi Digital" class="h-16 sm:h-20 w-auto mx-auto object-contain drop-shadow-xs" />
                </a>
                <div class="space-y-1">
                    <h1 class="text-xl font-extrabold text-[#071330] tracking-tight">Portal CMS Administrator</h1>
                    <p class="text-xs text-slate-500 font-medium">CV. Beranda Teknologi Digital &bull; Masuk untuk mengelola sistem</p>
                </div>
            </div>

            <!-- Error Alerts -->
            @if ($errors->any())
                <div class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold space-y-1">
                    @foreach ($errors->all() as $error)
                        <div class="flex items-center gap-2">
                            <span>⚠️</span>
                            <span>{{ $error }}</span>
                        </div>
                    @endforeach
                </div>
            @endif

            @if (session('status'))
                <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-center gap-2">
                    <span>✓</span>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <!-- Form (Empty by default, no prefilled values) -->
            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Email Input -->
                <div class="space-y-1.5">
                    <label for="email" class="block text-xs font-bold text-[#071330]">
                        Email Administrator
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                        </span>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}"
                               required 
                               autocomplete="email"
                               placeholder="Masukkan email Anda" 
                               class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:border-[#3E5CE7] focus:outline-none transition-all placeholder:text-slate-400" />
                    </div>
                </div>

                <!-- Password Input -->
                <div class="space-y-1.5">
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-xs font-bold text-[#071330]">
                            Kata Sandi
                        </label>
                        <button type="button" 
                                @click="showPass = !showPass" 
                                class="text-[11px] font-bold text-[#3E5CE7] hover:underline focus:outline-none" 
                                x-text="showPass ? 'Sembunyikan' : 'Tampilkan'">
                        </button>
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </span>
                        <input :type="showPass ? 'text' : 'password'" 
                               id="password" 
                               name="password" 
                               required 
                               autocomplete="current-password"
                               placeholder="Masukkan kata sandi" 
                               class="w-full pl-10 pr-10 py-3 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:border-[#3E5CE7] focus:outline-none transition-all placeholder:text-slate-400" />
                    </div>
                </div>

                <!-- Remember Me & Back Link -->
                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center gap-2 cursor-pointer text-slate-600 font-medium select-none">
                        <input type="checkbox" name="remember" class="rounded border-slate-300 text-[#3E5CE7] focus:ring-[#3E5CE7]" />
                        <span>Ingat Saya</span>
                    </label>
                    <a href="{{ route('home') }}" class="font-bold text-slate-500 hover:text-[#3E5CE7] transition-colors">
                        &larr; Ke Halaman Depan
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-3.5 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-extrabold text-xs uppercase tracking-wider shadow-lg hover:shadow-blue-600/30 transition-all flex items-center justify-center gap-2">
                    <span>Masuk ke Dashboard</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </form>

        </div>

        <!-- Footer Notice -->
        <div class="text-center text-xs text-slate-400">
            &copy; {{ date('Y') }} <strong>CV. Beranda Teknologi Digital</strong> &bull; All Rights Reserved.
        </div>

    </div>

</body>
</html>
