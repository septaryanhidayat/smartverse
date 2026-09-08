@extends('layouts.app')

@section('title', $post->title . ' - Insights Beranda Digital')

@section('content')
<section class="py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-indigo-600 dark:text-indigo-400 hover:underline">
            &larr; Kembali ke Blog
        </a>

        <div class="space-y-4">
            <div class="flex items-center gap-3">
                <span class="px-3 py-1 rounded-full bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 text-xs font-bold">
                    {{ $post->category?->name ?? 'Teknologi' }}
                </span>
                <span class="text-xs text-slate-500">
                    Dipublikasikan {{ $post->published_at ? $post->published_at->format('d F Y') : $post->created_at->format('d F Y') }}
                </span>
            </div>

            <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 dark:text-white leading-tight">
                {{ $post->title }}
            </h1>
        </div>

        <div class="rounded-3xl overflow-hidden aspect-video shadow-xl bg-slate-200 dark:bg-slate-800">
            <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" class="w-full h-full object-cover" />
        </div>

        <div class="glass-card rounded-3xl p-8 sm:p-12 prose dark:prose-invert max-w-none text-slate-700 dark:text-slate-300 leading-relaxed space-y-4">
            {!! $post->body !!}
        </div>

        <!-- Related Posts -->
        @if($relatedPosts->isNotEmpty())
            <div class="space-y-6 pt-8 border-t border-slate-200 dark:border-slate-800">
                <h3 class="text-xl font-bold text-slate-900 dark:text-white">Artikel Terkait Lainnya</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    @foreach($relatedPosts as $rel)
                        <a href="{{ route('blog.show', $rel->slug) }}" class="glass-card rounded-2xl p-4 space-y-2 hover:border-indigo-500/50 transition-all block">
                            <h4 class="text-sm font-bold text-slate-900 dark:text-white line-clamp-2">{{ $rel->title }}</h4>
                            <p class="text-xs text-slate-500 line-clamp-2">{{ $rel->excerpt }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</section>
@endsection
