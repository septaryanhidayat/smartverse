@extends('admin.layouts.app')

@section('title', 'Edit Dokumentasi: ' . $gallery->title)

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-[#07153f]">Edit Dokumentasi Event</h1>
            <p class="text-xs text-slate-500">Perbarui rincian dan foto: <strong>{{ $gallery->title }}</strong></p>
        </div>
        <a href="{{ route('admin.galleries.index') }}" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-all">
            &larr; Kembali ke Daftar
        </a>
    </div>

    <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div class="space-y-1.5 md:col-span-2">
                <label class="block text-xs font-bold text-[#07153f]">Judul Kegiatan / Sesi *</label>
                <input type="text" name="title" required value="{{ old('title', $gallery->title) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-[#07153f]">Kategori Acara *</label>
                <select name="category" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none">
                    <option value="Workshop IT" {{ old('category', $gallery->category) == 'Workshop IT' ? 'selected' : '' }}>Workshop IT</option>
                    <option value="Keynote Speaker" {{ old('category', $gallery->category) == 'Keynote Speaker' ? 'selected' : '' }}>Keynote Speaker</option>
                    <option value="Corporate Training" {{ old('category', $gallery->category) == 'Corporate Training' ? 'selected' : '' }}>Corporate Training</option>
                    <option value="Seminar Kampus" {{ old('category', $gallery->category) == 'Seminar Kampus' ? 'selected' : '' }}>Seminar Kampus</option>
                </select>
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-[#07153f]">Lokasi Acara</label>
                <input type="text" name="location" value="{{ old('location', $gallery->location) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-[#07153f]">Nama Event Spesifik</label>
                <input type="text" name="event_name" value="{{ old('event_name', $gallery->event_name) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-[#07153f]">Tanggal Kegiatan</label>
                <input type="date" name="event_date" value="{{ old('event_date', optional($gallery->event_date)->format('Y-m-d')) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
            </div>

            <!-- FOTO DOKUMENTASI (UPLOAD FILE & PREVIEW) -->
            <div class="space-y-1.5 md:col-span-2">
                <label class="block text-xs font-bold text-[#07153f]">File Foto Dokumentasi *</label>
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-200">
                    <img id="gallery_preview" src="{{ $gallery->image_path ?? '/images/Insight-Talks-Komdigi.jpeg' }}" alt="Preview Foto" class="w-28 h-20 rounded-xl object-cover border-2 border-white shadow-sm shrink-0 bg-slate-200" />
                    <div class="space-y-2 flex-1">
                        <input type="file" name="image_file" accept="image/*" onchange="previewImage(this, 'gallery_preview')" class="block w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-extrabold file:bg-[#3E5CE7] file:text-white hover:file:bg-blue-700 cursor-pointer shadow-sm" />
                        <div class="flex items-center gap-2">
                            <span class="text-[11px] text-slate-400">Atau path/URL:</span>
                            <input type="text" name="image_path" value="{{ old('image_path', $gallery->image_path) }}" class="flex-1 px-3 py-1.5 rounded-lg border border-slate-200 text-[11px] mono text-slate-600 focus:outline-none" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-1.5 md:col-span-2">
                <label class="block text-xs font-bold text-[#07153f]">Deskripsi Singkat Dokumentasi</label>
                <textarea name="description" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none">{{ old('description', $gallery->description) }}</textarea>
            </div>

            <div class="flex items-center gap-6 md:col-span-2 pt-2">
                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-[#07153f]">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $gallery->is_featured) ? 'checked' : '' }} class="rounded text-[#3E5CE7]" />
                    <span>Tampilkan di Galeri Utama (Featured)</span>
                </label>
            </div>

        </div>

        <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
            <a href="{{ route('admin.galleries.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-bold text-xs uppercase shadow-md transition-all">
                Perbarui Dokumentasi &rarr;
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
