@extends('layouts.app')

@section('title', $project->title . ' - Detail Portofolio Beranda Digital')

@section('content')
<section class="py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Breadcrumb & Title Header -->
        <div class="space-y-4">
            <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-indigo-600 dark:text-indigo-400 hover:underline">
                &larr; Kembali ke Portofolio
            </a>
            <div class="flex items-center gap-3">
                <span class="px-3 py-1 rounded-full bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 text-xs font-bold">
                    {{ $project->category?->name ?? 'Enterprise Proyek' }}
                </span>
                <span class="text-xs text-slate-500">Klien: {{ $project->client_name }}</span>
            </div>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 dark:text-white leading-tight">
                {{ $project->title }}
            </h1>
        </div>

        <!-- Featured Banner Image -->
        <div class="rounded-3xl overflow-hidden shadow-xl aspect-video bg-slate-200 dark:bg-slate-800">
            <img src="{{ asset($project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-full object-cover" />
        </div>

        <!-- Problem & Solution Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="glass-card rounded-3xl p-8 space-y-3">
                <h3 class="text-lg font-bold text-red-600 dark:text-red-400 flex items-center gap-2">
                    <span>⚠️ Tantangan & Masalah Klien</span>
                </h3>
                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">
                    {{ $project->challenge ?? 'Klien membutuhkan efisiensi sistem dan transformasi digital yang aman.' }}
                </p>
            </div>

            <div class="glass-card rounded-3xl p-8 space-y-3">
                <h3 class="text-lg font-bold text-emerald-600 dark:text-emerald-400 flex items-center gap-2">
                    <span>💡 Solusi Beranda Digital</span>
                </h3>
                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">
                    {{ $project->solution ?? 'Pengembangan platform berbasis teknologi modern dengan tingkat keamanan dan performa tinggi.' }}
                </p>
            </div>
        </div>

        <!-- Tech Stack Used -->
        @if($project->tech_stack)
            <div class="glass-card rounded-3xl p-8 space-y-4">
                <h3 class="text-lg font-bold text-slate-900 dark:text-white">Arsitektur & Tech Stack Perangkat Lunak</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($project->tech_stack as $tech)
                        <span class="px-3 py-1.5 rounded-xl bg-indigo-500/10 text-indigo-700 dark:text-indigo-300 font-mono text-xs font-semibold">
                            {{ is_array($tech) ? json_encode($tech) : $tech }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Screenshot Gallery Lightbox -->
        @if(!empty($project->gallery) && is_array($project->gallery))
            <div class="space-y-4">
                <h3 class="text-xl font-bold text-slate-900 dark:text-white">Tampilan & Screenshot Sistem</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach($project->gallery as $img)
                        @php
                            $imgUrl = is_array($img) ? ($img['url'] ?? '') : $img;
                            $imgTitle = is_array($img) ? ($img['title'] ?? 'Tampilan Sistem') : 'Tampilan Sistem';
                            $imgCaption = is_array($img) ? ($img['caption'] ?? '') : '';
                        @endphp
                        @if(!empty($imgUrl))
                            <div class="rounded-2xl overflow-hidden glass-card shadow-sm border border-slate-200/80 dark:border-slate-800 flex flex-col">
                                <div class="aspect-video overflow-hidden bg-slate-950">
                                    <img src="{{ asset($imgUrl) }}" alt="{{ $imgTitle }}" class="w-full h-full object-cover object-top hover:scale-105 transition-transform duration-500" />
                                </div>
                                @if(!empty($imgTitle) || !empty($imgCaption))
                                    <div class="p-4 bg-white dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800">
                                        @if(!empty($imgTitle))
                                            <div class="font-bold text-sm text-slate-900 dark:text-white leading-snug">{{ $imgTitle }}</div>
                                        @endif
                                        @if(!empty($imgCaption))
                                            <div class="text-xs text-slate-500 dark:text-slate-400 mt-1 leading-relaxed">{{ $imgCaption }}</div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Live Demo / Contact CTA -->
        <div class="glass-card rounded-3xl p-8 text-center space-y-4">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white">Tertarik Membangun Sistem Serupa?</h3>
            <p class="text-slate-600 dark:text-slate-400 text-sm">Konsultasikan ide perangkat lunak Anda bersama tim Beranda Digital.</p>
            <div class="flex items-center justify-center gap-4">
                @if($project->project_url)
                    <a href="{{ $project->project_url }}" target="_blank" class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs shadow-md">
                        Kunjungi Live Project Demo &rarr;
                    </a>
                @endif
                <a href="{{ route('contact') }}" class="px-6 py-3 rounded-xl glass-card text-slate-900 dark:text-white font-bold text-xs hover:bg-slate-200 dark:hover:bg-slate-800">
                    Hubungi Tim Kami
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
