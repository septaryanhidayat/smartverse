@extends('layouts.app')

@section('title', 'Insights & Blog Teknologi - CV. Beranda Teknologi Digital')

@section('content')
<!-- SECTION: BLOG & NEWS (FlyMotion Style with Watermark & Search) -->
<section class="py-20 bg-white transition-colors duration-300 relative overflow-hidden">
    
    <!-- Watermark "Blog" -->
    <div class="absolute top-6 left-1/2 -translate-x-1/2 text-8xl sm:text-9xl font-black text-slate-100/70 pointer-events-none select-none tracking-wider -z-0">
        Blog
    </div>

    <!-- Floating Shapes -->
    <div class="absolute top-20 left-12 text-[#fe6000]/40 text-4xl font-black pointer-events-none select-none anim-logo-top">✦</div>
    <div class="absolute bottom-20 right-12 text-[#3E5CE7]/30 text-5xl font-black pointer-events-none select-none anim-logo-bottom">~ ~ ~</div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
        
        <!-- Header -->
        <div class="text-center space-y-3 max-w-2xl mx-auto">
            <span class="px-4 py-1.5 rounded-full bg-blue-50 dark:bg-blue-950 text-[#3E5CE7] dark:text-blue-400 font-bold text-xs uppercase tracking-wider">
                Blog / News
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-[#07153f] dark:text-white">Insights & Tech Blog</h1>
            <p class="text-base text-slate-600 dark:text-slate-300 leading-relaxed font-medium">
                Wawasan seputar pengembangan software Laravel 13, kecerdasan buatan AI, optimasi sistem informasi, dan strategi bisnis digital.
            </p>
        </div>

        <!-- Search Bar -->
        <div class="max-w-md mx-auto">
            <form action="{{ route('blog.index') }}" method="GET" class="flex gap-2">
                <input type="text" 
                       name="q" 
                       value="{{ request('q') }}" 
                       placeholder="Cari artikel teknologi..." 
                       class="flex-1 px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-white text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                <button type="submit" 
                        style="background-color: #3E5CE7 !important; color: #ffffff !important;"
                        class="px-6 py-3 rounded-xl font-bold text-xs uppercase shadow-md transition-all">
                    <span style="color: #ffffff !important;">Cari</span>
                </button>
            </form>
        </div>

        <!-- Blog Posts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <article class="bg-white dark:bg-slate-800/90 rounded-3xl overflow-hidden border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="relative aspect-video overflow-hidden bg-slate-100 dark:bg-slate-900 border-b border-slate-200 dark:border-slate-700">
                            <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500" />
                            <div class="absolute top-3 left-3">
                                <span class="px-2.5 py-1 rounded-full bg-white/90 dark:bg-slate-900/90 backdrop-blur-md text-[#3E5CE7] dark:text-blue-400 font-bold text-[10px] shadow-xs">
                                    {{ $post->category?->name ?? 'Teknologi' }}
                                </span>
                            </div>
                        </div>

                        <div class="p-6 space-y-3">
                            <span class="text-[11px] text-[#fe6000] font-bold block">
                                📅 {{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}
                            </span>
                            <h2 class="text-base font-bold text-[#07153f] dark:text-white group-hover:text-[#3E5CE7] transition-colors line-clamp-2">
                                {{ $post->title }}
                            </h2>
                            <p class="text-xs text-slate-600 dark:text-slate-300 line-clamp-3 leading-relaxed">
                                {{ $post->excerpt }}
                            </p>
                        </div>
                    </div>

                    <div class="p-6 pt-0 border-t border-slate-100 dark:border-slate-700 flex items-center justify-between text-xs mt-4">
                        <span class="font-semibold text-slate-500 dark:text-slate-400">Oleh {{ $post->author?->name ?? 'Tim Beranda Digital' }}</span>
                        <a href="{{ route('blog.show', $post->slug) }}" class="font-bold text-[#3E5CE7] dark:text-blue-400 hover:underline">
                            Baca Artikel &rarr;
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center py-12 text-slate-500 font-medium">
                    Tidak ditemukan artikel yang sesuai.
                </div>
            @endforelse
        </div>

        <div class="pt-6">
            {{ $posts->links() }}
        </div>
    </div>
</section>

<!-- SECTION: LET'S WORK TOGETHER BANNER -->
<section class="py-16 bg-[#f8faff] dark:bg-slate-900/50 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div style="background-color: #07153f !important; color: #ffffff !important;" 
             class="rounded-3xl p-8 sm:p-14 text-center text-white space-y-6 shadow-2xl relative overflow-hidden border border-slate-800">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white" style="color: #ffffff !important;">
                Let's Work Together
            </h2>
            <p class="text-slate-200 text-xs sm:text-base leading-relaxed max-w-2xl mx-auto font-medium" style="color: #e2e8f0 !important;">
                Konsultasikan rencana pembuatan website, aplikasi mobile Flutter, sistem informasi, atau pelatihan IT bersama CV. Beranda Teknologi Digital.
            </p>
            <div class="pt-4">
                <a href="https://wa.me/6289695249089" target="_blank" 
                   style="background: #ffffff !important; color: #07153f !important;"
                   class="px-8 py-4 rounded-xl font-bold text-xs sm:text-sm shadow-xl inline-flex items-center gap-2 transition-all hover:scale-105">
                    <span style="color: #07153f !important;" class="font-extrabold">💬 Hubungi Tim Kami (WhatsApp)</span> &rarr;
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
