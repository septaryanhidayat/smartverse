@extends('admin.layouts.app')

@section('title', 'Edit Proyek: ' . $project->title)

@section('content')
<div class="max-w-5xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-[#07153f]">Edit Proyek</h1>
            <p class="text-xs text-slate-500">Perbarui rincian dan foto portofolio: <strong>{{ $project->title }}</strong></p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-all">
            &larr; Kembali ke Daftar
        </a>
    </div>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm space-y-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div class="space-y-1.5 md:col-span-2">
                <label class="block text-xs font-bold text-[#07153f]">Judul Proyek *</label>
                <input type="text" name="title" required value="{{ old('title', $project->title) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-[#07153f]">Kategori Proyek</label>
                <select name="category_id" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none">
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $project->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-[#07153f]">Nama Klien / Instansi</label>
                <input type="text" name="client_name" value="{{ old('client_name', $project->client_name) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
            </div>

            <!-- FOTO THUMBNAIL (UPLOAD FILE & PREVIEW) -->
            <div class="space-y-1.5 md:col-span-2">
                <label class="block text-xs font-bold text-[#07153f]">Foto Sampul / Thumbnail Proyek</label>
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-200">
                    <img id="thumb_preview" src="{{ $project->thumbnail ?? '/btd/sekolah.png' }}" alt="Preview Thumbnail" class="w-28 h-20 rounded-xl object-cover border-2 border-white shadow-sm shrink-0 bg-slate-200" />
                    <div class="space-y-2 flex-1">
                        <div class="flex items-center gap-3">
                            <input type="file" name="thumbnail_file" accept="image/*" onchange="previewImage(this, 'thumb_preview')" class="block w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-extrabold file:bg-[#3E5CE7] file:text-white hover:file:bg-blue-700 cursor-pointer shadow-sm" />
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-[11px] text-slate-400">Atau path/URL:</span>
                            <input type="text" name="thumbnail" value="{{ old('thumbnail', $project->thumbnail) }}" class="flex-1 px-3 py-1.5 rounded-lg border border-slate-200 text-[11px] mono text-slate-600 focus:outline-none" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- FOTO GALERI SLIDER (MULTI-UPLOAD & PREVIEW) -->
            <div class="space-y-1.5 md:col-span-2">
                <label class="block text-xs font-bold text-[#07153f]">Galeri Screenshot Tambahan (Slider Foto saat Proyek Diklik)</label>
                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                        <input type="file" name="gallery_files[]" multiple accept="image/*" class="block w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-extrabold file:bg-emerald-600 file:text-white hover:file:bg-emerald-700 cursor-pointer shadow-sm" />
                    </div>
                    <p class="text-[11px] text-slate-500">
                        📸 <strong>Pilih File Langsung:</strong> Upload file gambar baru dari laptop/komputer Anda untuk ditambahkan ke slider modal.
                    </p>

                    @php
                        $galleryText = '';
                        if (!empty($project->gallery) && is_array($project->gallery)) {
                            $lines = [];
                            foreach ($project->gallery as $item) {
                                if (is_string($item)) {
                                    $lines[] = $item;
                                } elseif (is_array($item)) {
                                    $parts = [$item['url'] ?? ''];
                                    if (!empty($item['title'])) $parts[] = $item['title'];
                                    if (!empty($item['type'])) $parts[] = $item['type'];
                                    if (!empty($item['caption'])) $parts[] = $item['caption'];
                                    $lines[] = implode(' | ', $parts);
                                }
                            }
                            $galleryText = implode("\n", $lines);
                        }
                    @endphp

                    <div class="pt-2 border-t border-slate-200">
                        <label class="block text-[11px] font-bold text-slate-600 mb-1">Daftar Foto Slider Tersimpan / Manual:</label>
                        <textarea name="gallery_raw" rows="4" placeholder="Format: Path Gambar | Judul Layar | Tipe (web/mobile) | Keterangan" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs mono focus:outline-none">{{ old('gallery_raw', $galleryText) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="space-y-1.5 md:col-span-2">
                <label class="block text-xs font-bold text-[#07153f]">Ringkasan Singkat Proyek</label>
                <textarea name="summary" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none">{{ old('summary', $project->summary) }}</textarea>
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-[#07153f]">Tantangan (Challenge)</label>
                <textarea name="challenge" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none">{{ old('challenge', $project->challenge) }}</textarea>
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-[#07153f]">Solusi (Solution)</label>
                <textarea name="solution" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none">{{ old('solution', $project->solution) }}</textarea>
            </div>

            <div class="space-y-1.5 md:col-span-2">
                <label class="block text-xs font-bold text-[#07153f]">Tech Stack (Pisahkan dengan Koma)</label>
                <input type="text" name="tech_stack_raw" value="{{ old('tech_stack_raw', is_array($project->tech_stack) ? implode(', ', $project->tech_stack) : '') }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-[#07153f]">Tipe Tampilan Aplikasi (Aspect Ratio Slider)</label>
                <select name="app_type" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none">
                    <option value="web" {{ old('app_type', $project->app_type) == 'web' ? 'selected' : '' }}>🖥️ Web Desktop / SaaS (Landscape 16:9)</option>
                    <option value="mobile" {{ old('app_type', $project->app_type) == 'mobile' ? 'selected' : '' }}>📱 Mobile App (Portrait 9:16)</option>
                    <option value="both" {{ old('app_type', $project->app_type) == 'both' ? 'selected' : '' }}>💻📱 Hybrid / Responsif</option>
                </select>
            </div>

            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-[#07153f]">Badge Status / Keunggulan</label>
                <input type="text" name="status_badge" placeholder="Contoh: 🟢 Siap Diimplementasi" value="{{ old('status_badge', $project->status_badge) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
            </div>

            <div class="space-y-1.5 md:col-span-2">
                <label class="block text-xs font-bold text-[#07153f]">Poin Fitur Utama (Satu baris satu poin fitur)</label>
                <textarea name="features_raw" rows="3" placeholder="Contoh:&#10;Otomasi cetak 30+ surat desa ber-QR code&#10;Database kependudukan & sensus RT/RW&#10;Notifikasi otomatis via WhatsApp" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none">{{ old('features_raw', is_array($project->features) ? implode("\n", $project->features) : '') }}</textarea>
                <span class="text-[11px] text-slate-400">Poin-poin ini akan ditampilkan dengan ikon centang hijau (✓) pada kartu depan produk.</span>
            </div>

            <div class="space-y-1.5 md:col-span-2">
                <label class="block text-xs font-bold text-[#07153f]">URL / Link Proyek (Opsional)</label>
                <input type="url" name="project_url" value="{{ old('project_url', $project->project_url) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
            </div>

            <div class="flex items-center gap-6 md:col-span-2 pt-2">
                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-[#07153f]">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }} class="rounded text-[#3E5CE7]" />
                    <span>Tampilkan sebagai Proyek Unggulan di Beranda (Featured)</span>
                </label>
            </div>

        </div>

        <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
            <a href="{{ route('admin.projects.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-bold text-xs uppercase shadow-md transition-all">
                Perbarui Proyek &rarr;
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
