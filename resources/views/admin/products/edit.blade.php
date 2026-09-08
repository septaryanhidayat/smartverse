@extends('admin.layouts.app')

@section('title', 'Edit Produk: ' . $product->title)

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-[#07153f]">Edit Produk Digital</h1>
            <p class="text-xs text-slate-500">Perbarui rincian dan foto: <strong>{{ $product->title }}</strong></p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-all">
            &larr; Kembali ke Daftar
        </a>
    </div>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div class="space-y-1.5 md:col-span-2">
                <label class="block text-xs font-bold text-[#07153f]">Nama Produk Digital *</label>
                <input type="text" name="title" required value="{{ old('title', $product->title) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#fe6000] focus:outline-none" />
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-[#07153f]">Kategori Produk</label>
                <select name="category_id" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#fe6000] focus:outline-none">
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-[#07153f]">Badge Label</label>
                <input type="text" name="badge" value="{{ old('badge', $product->badge) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#fe6000] focus:outline-none" />
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-[#07153f]">Harga (Rupiah) *</label>
                <input type="number" name="price" required value="{{ old('price', $product->price) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs mono font-bold focus:ring-2 focus:ring-[#fe6000] focus:outline-none" />
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-[#07153f]">Tagline Singkat</label>
                <input type="text" name="tagline" value="{{ old('tagline', $product->tagline) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#fe6000] focus:outline-none" />
            </div>

            <!-- FOTO THUMBNAIL (UPLOAD FILE & PREVIEW) -->
            <div class="space-y-1.5 md:col-span-2">
                <label class="block text-xs font-bold text-[#07153f]">Foto Mockup / Gambar Produk</label>
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-200">
                    <img id="product_thumb_preview" src="{{ $product->thumbnail ?? '/btd/0.png' }}" alt="Preview Thumbnail" class="w-28 h-20 rounded-xl object-cover border-2 border-white shadow-sm shrink-0 bg-slate-200" />
                    <div class="space-y-2 flex-1">
                        <input type="file" name="thumbnail_file" accept="image/*" onchange="previewImage(this, 'product_thumb_preview')" class="block w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-extrabold file:bg-[#fe6000] file:text-white hover:file:bg-[#e05400] cursor-pointer shadow-sm" />
                        <div class="flex items-center gap-2">
                            <span class="text-[11px] text-slate-400">Atau path/URL:</span>
                            <input type="text" name="thumbnail" value="{{ old('thumbnail', $product->thumbnail) }}" class="flex-1 px-3 py-1.5 rounded-lg border border-slate-200 text-[11px] mono text-slate-600 focus:outline-none" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-1.5 md:col-span-2">
                <label class="block text-xs font-bold text-[#07153f]">Deskripsi Produk *</label>
                <textarea name="description" required rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#fe6000] focus:outline-none">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="space-y-1.5 md:col-span-2">
                <label class="block text-xs font-bold text-[#07153f]">Daftar Fitur Unggulan (1 Baris = 1 Fitur)</label>
                <textarea name="features_raw" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#fe6000] focus:outline-none">{{ old('features_raw', is_array($product->features) ? implode("\n", $product->features) : '') }}</textarea>
            </div>

            <div class="space-y-1.5 md:col-span-2">
                <label class="block text-xs font-bold text-[#07153f]">URL Live Demo (Opsional)</label>
                <input type="url" name="demo_url" value="{{ old('demo_url', $product->demo_url) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#fe6000] focus:outline-none" />
            </div>

            <div class="flex items-center gap-6 md:col-span-2 pt-2">
                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-[#07153f]">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }} class="rounded text-[#fe6000]" />
                    <span>Tampilkan sebagai Produk Rekomendasi (Featured)</span>
                </label>
            </div>

        </div>

        <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
            <a href="{{ route('admin.products.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#fe6000] hover:bg-[#e05400] text-white font-bold text-xs uppercase shadow-md transition-all">
                Perbarui Produk &rarr;
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
