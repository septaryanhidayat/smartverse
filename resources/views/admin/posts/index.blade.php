@extends('admin.layouts.app')

@section('title', 'Kelola Artikel Blog & Berita')

@section('content')
<div class="space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#07153f]">📰 Artikel Blog & Berita</h1>
            <p class="text-xs text-slate-500">Tulis dan kelola artikel wawasan teknologi dan berita perusahaan.</p>
        </div>
        <a href="{{ route('admin.posts.create') }}" class="px-5 py-2.5 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-bold text-xs uppercase shadow-md transition-all flex items-center gap-2">
            <span>+ Tulis Artikel Baru</span>
        </a>
    </div>

    <!-- Posts Table -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-slate-400 font-extrabold uppercase tracking-wider">
                        <th class="py-4 px-6">Thumbnail</th>
                        <th class="py-4 px-6">Judul Artikel</th>
                        <th class="py-4 px-6">Kategori</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Tanggal Rilis</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                    @forelse($posts as $post)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="py-4 px-6">
                                <div class="w-16 h-10 rounded-lg overflow-hidden bg-slate-100 border border-slate-200">
                                    <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" class="w-full h-full object-cover" />
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-900 text-xs">{{ $post->title }}</div>
                                <div class="text-[10px] text-slate-400 font-mono">{{ $post->slug }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-1 rounded-full bg-blue-50 text-[#3E5CE7] font-bold text-[10px]">
                                    {{ $post->category?->name ?? 'Teknologi' }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                @if($post->status === 'published')
                                    <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-extrabold text-[10px]">
                                        PUBLISHED
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 font-extrabold text-[10px]">
                                        DRAFT
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-slate-500 font-mono text-[11px]">
                                {{ $post->published_at ? $post->published_at->format('d M Y') : '-' }}
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="px-3 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold transition-all">
                                    Edit
                                </a>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus artikel ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-600 font-bold transition-all">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-400">
                                Belum ada artikel blog.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $posts->links() }}
        </div>
    </div>

</div>
@endsection
