@extends('admin.layouts.app')

@section('title', 'Kelola Kategori Konten')

@section('content')
<div class="space-y-6" x-data="{ 
    isEdit: false, 
    editId: null, 
    editName: '', 
    editType: 'project', 
    updateUrl: '',
    startEdit(cat) {
        this.isEdit = true;
        this.editId = cat.id;
        this.editName = cat.name;
        this.editType = cat.type;
        this.updateUrl = '/admin/categories/' + cat.id;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    },
    cancelEdit() {
        this.isEdit = false;
        this.editId = null;
        this.editName = '';
        this.editType = 'project';
    }
}">
    
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#071330] flex items-center gap-2.5">
                <span>📂</span>
                <span>Kategori Konten</span>
            </h1>
            <p class="text-xs text-slate-500 font-medium mt-1">
                Kelola kategori pengelompokan untuk portofolio, produk digital, dan artikel blog beserta jumlah konten terkait.
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left Column: Form Tambah / Edit Kategori -->
        <div class="lg:col-span-4 bg-white p-6 sm:p-7 rounded-3xl border border-slate-200 shadow-sm space-y-5 sticky top-24">
            
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h2 class="text-sm font-extrabold text-[#071330] flex items-center gap-2">
                    <span x-text="isEdit ? '✏️ Edit Kategori' : '+ Tambah Kategori Baru'"></span>
                </h2>
                <button x-show="isEdit" @click="cancelEdit()" type="button" class="text-xs text-slate-400 hover:text-slate-600 font-bold">
                    ✕ Batal Edit
                </button>
            </div>
            
            <!-- Create Form -->
            <form x-show="!isEdit" action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Nama Kategori *</label>
                    <input type="text" name="name" required placeholder="Contoh: Mobile App Flutter" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none placeholder:text-slate-400" />
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Tipe Kategori *</label>
                    <select name="type" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none">
                        <option value="project">📁 Portofolio Proyek</option>
                        <option value="product">🛒 Produk Digital Store</option>
                        <option value="post">📰 Artikel Blog / Berita</option>
                    </select>
                </div>

                <button type="submit" class="w-full py-3 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-extrabold text-xs uppercase tracking-wider shadow-md hover:shadow-blue-600/30 transition-all flex items-center justify-center gap-2">
                    <span>Simpan Kategori Baru</span>
                    <span>&rarr;</span>
                </button>
            </form>

            <!-- Edit Form -->
            <form x-show="isEdit" :action="updateUrl" method="POST" class="space-y-4" style="display: none;">
                @csrf
                @method('PUT')
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Nama Kategori *</label>
                    <input type="text" name="name" x-model="editName" required class="w-full px-4 py-2.5 rounded-xl border border-blue-400 bg-blue-50/20 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-bold" />
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Tipe Kategori *</label>
                    <select name="type" x-model="editType" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none">
                        <option value="project">📁 Portofolio Proyek</option>
                        <option value="product">🛒 Produk Digital Store</option>
                        <option value="post">📰 Artikel Blog / Berita</option>
                    </select>
                </div>

                <div class="flex items-center gap-2 pt-1">
                    <button type="button" @click="cancelEdit()" class="flex-1 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-all">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-xs uppercase shadow-md transition-all">
                        Simpan Perubahan
                    </button>
                </div>
            </form>

        </div>

        <!-- Right Column: Table Daftar Kategori -->
        <div class="lg:col-span-8 bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-slate-50/80 border-b border-slate-200 text-slate-500 font-extrabold uppercase tracking-wider text-[10px]">
                            <th class="py-4 px-6">Nama Kategori</th>
                            <th class="py-4 px-4">Tipe Konten</th>
                            <th class="py-4 px-4">Jumlah Penggunaan</th>
                            <th class="py-4 px-6 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">
                        @forelse($categories as $cat)
                            @php
                                $itemCount = 0;
                                if ($cat->type === 'project') {
                                    $itemCount = $cat->projects_count;
                                    $label = 'Proyek';
                                } elseif ($cat->type === 'product') {
                                    $itemCount = $cat->digital_products_count;
                                    $label = 'Produk';
                                } else {
                                    $itemCount = $cat->posts_count;
                                    $label = 'Artikel';
                                }
                            @endphp
                            <tr class="hover:bg-slate-50/80 transition-colors" :class="editId === {{ $cat->id }} ? 'bg-blue-50/40' : ''">
                                <td class="py-4 px-6">
                                    <div class="font-extrabold text-slate-900 text-xs">{{ $cat->name }}</div>
                                    <div class="text-[10px] text-slate-400 font-mono">{{ $cat->slug }}</div>
                                </td>
                                <td class="py-4 px-4">
                                    @if($cat->type === 'project')
                                        <span class="px-2.5 py-1 rounded-full bg-blue-50 text-[#3E5CE7] font-bold text-[10px] uppercase border border-blue-200/60">
                                            📁 Project
                                        </span>
                                    @elseif($cat->type === 'product')
                                        <span class="px-2.5 py-1 rounded-full bg-orange-50 text-[#fe6000] font-bold text-[10px] uppercase border border-orange-200/60">
                                            🛒 Product
                                        </span>
                                    @else
                                        <span class="px-2.5 py-1 rounded-full bg-cyan-50 text-cyan-700 font-bold text-[10px] uppercase border border-cyan-200/60">
                                            📰 Article
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-4">
                                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-xl bg-slate-100 text-slate-700 font-bold text-xs">
                                        <span class="mono font-black {{ $itemCount > 0 ? 'text-[#071330]' : 'text-slate-400' }}">{{ $itemCount }}</span>
                                        <span class="text-[11px] font-normal text-slate-500">{{ $label }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <!-- Edit Button -->
                                        <button type="button" 
                                                @click="startEdit({ id: {{ $cat->id }}, name: '{{ addslashes($cat->name) }}', type: '{{ $cat->type }}' })"
                                                class="px-3 py-1.5 rounded-lg bg-blue-50 hover:bg-blue-100 text-[#3E5CE7] font-bold text-xs transition-all flex items-center gap-1 border border-blue-200/60 shadow-2xs">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                            <span>Edit</span>
                                        </button>

                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kategori {{ addslashes($cat->name) }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-600 font-bold text-xs transition-all flex items-center gap-1 border border-rose-200/60 shadow-2xs">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-12 text-center text-slate-400 space-y-2">
                                    <div class="text-2xl">📂</div>
                                    <p>Belum ada kategori yang dibuat.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-slate-100">
                {{ $categories->links() }}
            </div>
        </div>

    </div>

</div>
@endsection
