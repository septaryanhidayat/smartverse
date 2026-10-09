@extends('admin.layouts.app')

@section('title', 'Editor SOP & Panduan Order Klien - ' . ($settings['company_legal_name'] ?? ($settings['company_name'] ?? 'SmartVerse')))

@section('content')
<style>
    /* Styling Khusus Lembar Dokumen & Editor WYSIWYG */
    #editableCanvas, .doc-preview-canvas {
        font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        font-size: 12.5px;
        line-height: 1.65;
        text-align: justify !important;
        text-justify: inter-word !important;
        color: #22282a;
    }
    #editableCanvas p, 
    #editableCanvas li {
        text-align: justify !important;
        text-justify: inter-word !important;
        line-height: 1.65;
    }

    .label-desktop {
        display: inline;
    }
    .label-mobile {
        display: none;
    }
    @media (max-width: 768px) {
        .label-desktop {
            display: none !important;
        }
        .label-mobile {
            display: inline !important;
        }
    }
    
    /* Intro Box */
    #editableCanvas .doc-intro-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-left: 3.5px solid #269DB9;
        border-radius: 8px;
        padding: 12px 16px;
        margin-bottom: 22px;
        font-size: 12px;
        color: #334155;
        line-height: 1.6;
        text-align: justify !important;
        text-justify: inter-word !important;
    }
    #editableCanvas .doc-intro-box strong {
        color: #0f172a;
    }

    /* 6 Steps Container & Cards */
    #editableCanvas .steps-container {
        display: flex;
        flex-direction: column;
        gap: 14px;
        margin-bottom: 24px;
        position: relative;
        z-index: 10;
    }
    #editableCanvas .step-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 14px 18px;
        margin-bottom: 14px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.02);
    }
    #editableCanvas .step-header {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 8px;
    }
    #editableCanvas .step-num {
        width: 24px;
        height: 24px;
        border-radius: 6px;
        background: #f0f9fb;
        border: 1.5px solid #269DB9;
        color: #269DB9;
        font-weight: 900;
        font-size: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    #editableCanvas .step-title {
        font-size: 13.5px;
        font-weight: 800;
        color: #1e293b;
        letter-spacing: -0.2px;
    }
    #editableCanvas .step-body {
        color: #475569;
        font-size: 12px;
        line-height: 1.6;
        padding-left: 34px;
        text-align: justify !important;
        text-justify: inter-word !important;
    }
    #editableCanvas .step-body p {
        margin-bottom: 6px;
    }
    #editableCanvas .step-bullets {
        margin: 6px 0;
        padding-left: 18px;
        list-style-type: disc;
    }
    #editableCanvas .step-bullets li {
        margin-bottom: 4px;
        color: #334155;
        text-align: justify !important;
        text-justify: inter-word !important;
    }
    #editableCanvas .step-badge-mini {
        display: inline-block;
        font-size: 10.5px;
        font-weight: 700;
        color: #0284c7;
        background: #e0f2fe;
        padding: 1px 7px;
        border-radius: 4px;
        margin-right: 4px;
    }

    /* Lampiran Surat */
    #editableCanvas .lampiran-section {
        background: #ffffff;
        border: 1px solid #dcebf0;
        border-radius: 10px;
        padding: 20px 22px;
        margin-top: 24px;
        margin-bottom: 24px;
        position: relative;
        z-index: 10;
        box-shadow: 0 1px 3px rgba(0,0,0,0.02);
    }
    #editableCanvas .lampiran-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 10px;
        font-weight: 800;
        color: #0d9488;
        background: #f0fdfa;
        border: 1px solid #99f6e4;
        padding: 3px 10px;
        border-radius: 9999px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
    }
    #editableCanvas .lampiran-title {
        font-size: 15px;
        font-weight: 900;
        color: #0f172a;
        letter-spacing: -0.3px;
        margin-bottom: 4px;
    }
    #editableCanvas .lampiran-desc {
        font-size: 12px;
        color: #64748b;
        line-height: 1.5;
        margin-bottom: 14px;
        text-align: justify !important;
    }
    #editableCanvas .lampiran-notes-box {
        background: #fffbeb;
        border: 1px solid #fef3c7;
        border-left: 3.5px solid #f59e0b;
        border-radius: 8px;
        padding: 11px 16px;
        margin-bottom: 18px;
        font-size: 11.5px;
        color: #92400e;
        line-height: 1.55;
    }
    #editableCanvas .lampiran-notes-box .notes-title {
        font-size: 11.5px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        margin-bottom: 4px;
        color: #b45309;
    }
    #editableCanvas .lampiran-notes-box ol {
        padding-left: 18px;
        margin: 4px 0 0 0;
    }
    #editableCanvas .lampiran-notes-box li {
        margin-bottom: 4px;
        text-align: justify !important;
    }
    #editableCanvas .letters-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }
    #editableCanvas .letter-card {
        background: #ffffff;
        border: 1.5px solid #cbd5e1;
        border-radius: 8px;
        padding: 22px 26px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.03);
        position: relative;
        margin-bottom: 20px;
    }
    #editableCanvas .letter-card-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 12px;
        margin-bottom: 14px;
        border-bottom: 1px dashed #e2e8f0;
        flex-wrap: wrap;
        gap: 8px;
    }
    #editableCanvas .letter-card-title {
        font-size: 12.5px;
        font-weight: 800;
        color: #1e293b;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    #editableCanvas .btn-copy-letter {
        background: #f1f5f9;
        border: 1px solid #cbd5e1;
        color: #334155;
        font-size: 11px;
        font-weight: 700;
        padding: 5px 12px;
        border-radius: 6px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    #editableCanvas .letter-paper {
        font-size: 11.5px;
        color: #1e293b;
        line-height: 1.65;
        background: #fafbfd;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        padding: 20px 24px;
        text-align: justify !important;
        text-justify: inter-word !important;
    }
    #editableCanvas .letter-kop-simulated {
        text-align: center !important;
        padding-bottom: 8px;
        margin-bottom: 14px;
        border-bottom: 3px double #334155;
    }
    #editableCanvas .kop-text-main {
        font-size: 13.5px;
        font-weight: 900;
        letter-spacing: 1px;
        color: #0f172a;
        text-transform: uppercase;
        text-align: center !important;
    }
    #editableCanvas .kop-text-sub {
        font-size: 10.5px;
        color: #64748b;
        font-weight: 500;
        text-align: center !important;
    }
    #editableCanvas .letter-meta-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 14px;
        font-size: 11.5px;
    }
    #editableCanvas .letter-table {
        width: 100%;
        margin: 10px 0 14px 0;
        border-collapse: collapse;
        font-size: 11.5px;
    }
    #editableCanvas .letter-table td {
        padding: 3px 6px;
        vertical-align: top;
        border: none !important;
    }
    #editableCanvas .letter-field {
        background: #fef08a;
        padding: 1px 5px;
        border-radius: 3px;
        font-weight: 700;
        color: #854d0e;
        font-size: 11px;
    }
    #editableCanvas .letter-sign-block {
        margin-top: 24px;
        display: flex;
        justify-content: flex-end;
        text-align: right !important;
    }
    #editableCanvas .letter-sign-inner {
        display: inline-block;
        text-align: center !important;
        min-width: 200px;
    }
    #editableCanvas .letter-sign-title {
        font-weight: 700;
        margin-bottom: 4px;
    }
    #editableCanvas .letter-sign-space {
        height: 55px;
    }
    #editableCanvas .letter-sign-name {
        font-weight: 900;
        text-decoration: underline;
        color: #0f172a;
    }
    #editableCanvas .letter-sign-meta {
        font-size: 10.5px;
        color: #64748b;
    }

    /* Word Toolbar & Table Support */
    #editableCanvas table:not(.letter-table) {
        width: 100%;
        border-collapse: collapse;
        margin: 12px 0;
    }
    #editableCanvas table:not(.letter-table) th,
    #editableCanvas table:not(.letter-table) td {
        border: 1px solid #cbd5e1;
        padding: 8px 12px;
        text-align: left;
    }
    #editableCanvas table:not(.letter-table) th {
        background: #f1f5f9;
        font-weight: 700;
    }
</style>
<div class="space-y-6 pb-12" x-data="orderGuideAdmin({ activeTab: '{{ request('tab', 'editor') }}' })">

    <!-- Flash Alert Success Notification -->
    @if(session('success'))
        <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs sm:text-sm font-bold flex items-center justify-between shadow-xs">
            <div class="flex items-center gap-2.5">
                <span class="w-6 h-6 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xs">✓</span>
                <span>{{ session('success') }}</span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900 font-bold">&times;</button>
        </div>
    @endif

    <!-- Header & Action Button -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1.5">
                <span class="px-2.5 py-0.5 rounded-full bg-teal-50 text-[#0d9488] border border-teal-200/80 text-[10px] font-extrabold uppercase tracking-wider">
                    Client Onboarding & Sales SOP
                </span>
                <span class="text-slate-300 text-xs">•</span>
                <span class="text-slate-500 text-xs font-semibold">Word Editor & Dokumen Resmi</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#071330] tracking-tight">
                SOP & Panduan Pemesanan Web/App
            </h1>
            <p class="text-xs sm:text-sm text-slate-600 font-medium mt-0.5 max-w-3xl">
                Edit dan kelola dokumen resmi panduan pemesanan dengan toolbar Microsoft Word lengkap (termasuk perataan rata penuh / justify, tipografi, tabel, dan contoh surat). Perubahan akan otomatis tayang di halaman publik klien.
            </p>
        </div>

        <div class="flex items-center gap-2.5 shrink-0 flex-wrap">
            <a href="{{ $publicUrl }}" target="_blank" 
               class="px-4 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 font-bold text-xs uppercase tracking-wider shadow-xs hover:bg-slate-50 active:scale-95 transition-all flex items-center gap-2">
                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                <span>Buka Halaman Klien</span>
            </a>

            <button type="button" @click="saveDocument()"
                    style="background-color: #059669 !important; color: #ffffff !important;"
                    class="px-5 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider shadow-sm hover:brightness-110 active:scale-95 transition-all flex items-center gap-2">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
                <span style="color: #ffffff !important; font-weight: 800;">Simpan Perubahan</span>
            </button>
        </div>
    </div>

    <!-- Navigation Tabs: Editor vs Pratinjau & Bagikan -->
    <div class="flex items-center gap-2 border-b border-slate-200 pb-px">
        <button @click="activeTab = 'editor'" 
                :class="activeTab === 'editor' ? 'border-teal-600 text-teal-700 bg-white font-extrabold shadow-xs' : 'border-transparent text-slate-500 hover:text-slate-700 bg-transparent font-bold'"
                class="px-5 py-3 rounded-t-xl border-b-2 text-xs flex items-center gap-2 transition-all">
            <span>✍️ Editor Word Dokumen</span>
            @if($isCustomized)
                <span class="px-1.5 py-0.5 rounded text-[9px] bg-amber-100 text-amber-800 font-extrabold">Kustom</span>
            @else
                <span class="px-1.5 py-0.5 rounded text-[9px] bg-slate-100 text-slate-600 font-extrabold">Default</span>
            @endif
        </button>

        <button @click="activeTab = 'share'" 
                :class="activeTab === 'share' ? 'border-teal-600 text-teal-700 bg-white font-extrabold shadow-xs' : 'border-transparent text-slate-500 hover:text-slate-700 bg-transparent font-bold'"
                class="px-5 py-3 rounded-t-xl border-b-2 text-xs flex items-center gap-2 transition-all">
            <span>👁️ Pratinjau & Bagikan ke Klien</span>
        </button>
    </div>

    <!-- TAB 1: WORD-LIKE WYSIWYG EDITOR -->
    <div x-show="activeTab === 'editor'" class="space-y-4">

        <!-- Info Bar Status Editor -->
        <div class="p-3.5 rounded-xl bg-blue-50/80 border border-blue-200 text-blue-900 text-xs flex items-center justify-between flex-wrap gap-2">
            <div class="flex items-center gap-2">
                <span class="text-blue-600 font-bold">ℹ️ Info Editor:</span>
                <span>Klik langsung pada teks di lembar A4 untuk mengetik, mengedit, atau menambahkan materi. Semua format penulisan disetel <strong>Rata Penuh (Justify)</strong> agar rapi dan simetris.</span>
            </div>
            <div class="flex items-center gap-2">
                <form action="{{ route('admin.order-guide.reset') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengembalikan seluruh isi dokumen ke format standar awal? Perubahan editan Anda akan digantikan dengan template default.');">
                    @csrf
                    <button type="submit" class="px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-rose-600 hover:bg-rose-50 text-[11px] font-bold transition-all flex items-center gap-1 shadow-xs">
                        <span>🔄 Reset ke Default Standar</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- THE WORD-LIKE RIBBON TOOLBAR -->
        <div class="bg-white border border-slate-300 rounded-2xl shadow-sm sticky top-16 z-30 overflow-x-auto">
            
            <div class="p-2 sm:p-2.5 flex items-center gap-1 sm:gap-2 flex-wrap text-xs text-slate-700 select-none">

                <!-- Kelompok 1: Riwayat & Clear Format -->
                <div class="flex items-center bg-slate-50 p-1 rounded-lg border border-slate-200">
                    <button type="button" onclick="formatDoc('undo')" class="p-1.5 rounded hover:bg-white hover:text-teal-600 transition-colors" title="Batal (Ctrl+Z)">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a5 5 0 015 5v2M3 10l6 6m-6-6l6-6"/></svg>
                    </button>
                    <button type="button" onclick="formatDoc('redo')" class="p-1.5 rounded hover:bg-white hover:text-teal-600 transition-colors" title="Ulangi (Ctrl+Y)">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10H11a5 5 0 00-5 5v2m15-7l-6 6m6-6l-6-6"/></svg>
                    </button>
                    <button type="button" onclick="formatDoc('removeFormat')" class="p-1.5 rounded hover:bg-white hover:text-rose-600 transition-colors" title="Hapus Format / Bersihkan Gaya">
                        <span class="text-xs font-bold">🧹</span>
                    </button>
                </div>

                <!-- Kelompok 2: Font & Gaya Huruf -->
                <div class="flex items-center gap-1 bg-slate-50 p-1 rounded-lg border border-slate-200">
                    <!-- Font Family -->
                    <select onchange="formatDoc('fontName', this.value)" class="bg-white border border-slate-200 text-slate-700 text-xs rounded px-2 py-1 focus:outline-none font-medium">
                        <option value="'Plus Jakarta Sans', sans-serif">Plus Jakarta Sans (Default BTD)</option>
                        <option value="Arial, sans-serif">Arial</option>
                        <option value="'Times New Roman', serif">Times New Roman</option>
                        <option value="Georgia, serif">Georgia</option>
                        <option value="Tahoma, sans-serif">Tahoma</option>
                        <option value="'Courier New', monospace">Courier New</option>
                    </select>

                    <!-- Format Block (P, H1, H2, H3) -->
                    <select onchange="formatDoc('formatBlock', this.value)" class="bg-white border border-slate-200 text-slate-700 text-xs rounded px-2 py-1 focus:outline-none font-bold">
                        <option value="<p>">Paragraf (P)</option>
                        <option value="<h1>">Judul 1 (H1)</option>
                        <option value="<h2>">Judul 2 (H2)</option>
                        <option value="<h3>">Subjudul (H3)</option>
                        <option value="<blockquote>">Kutipan (Quote)</option>
                    </select>

                    <!-- Font Size -->
                    <select onchange="formatDoc('fontSize', this.value)" class="bg-white border border-slate-200 text-slate-700 text-xs rounded px-1.5 py-1 focus:outline-none font-mono font-bold">
                        <option value="2">Kecil (10px)</option>
                        <option value="3" selected>Normal (12px)</option>
                        <option value="4">Sedang (14px)</option>
                        <option value="5">Besar (18px)</option>
                        <option value="6">Sangat Besar (24px)</option>
                    </select>
                </div>

                <!-- Kelompok 3: Penekanan Huruf (Bold, Italic, Underline, Strikethrough) -->
                <div class="flex items-center bg-slate-50 p-1 rounded-lg border border-slate-200">
                    <button type="button" onclick="formatDoc('bold')" class="px-2 py-1 rounded hover:bg-white hover:text-teal-600 font-extrabold text-xs" title="Tebal (Bold)">
                        B
                    </button>
                    <button type="button" onclick="formatDoc('italic')" class="px-2 py-1 rounded hover:bg-white hover:text-teal-600 italic font-bold text-xs" title="Miring (Italic)">
                        I
                    </button>
                    <button type="button" onclick="formatDoc('underline')" class="px-2 py-1 rounded hover:bg-white hover:text-teal-600 underline font-bold text-xs" title="Garis Bawah (Underline)">
                        U
                    </button>
                    <button type="button" onclick="formatDoc('strikeThrough')" class="px-2 py-1 rounded hover:bg-white hover:text-teal-600 line-through font-bold text-xs" title="Coret (Strikethrough)">
                        S
                    </button>
                    <button type="button" onclick="formatDoc('subscript')" class="px-1.5 py-1 rounded hover:bg-white hover:text-teal-600 text-[10px] font-bold" title="Subscript (X₂)">
                        X₂
                    </button>
                    <button type="button" onclick="formatDoc('superscript')" class="px-1.5 py-1 rounded hover:bg-white hover:text-teal-600 text-[10px] font-bold" title="Superscript (X²)">
                        X²
                    </button>
                </div>

                <!-- Kelompok 4: Pewarnaan (Teks & Stabilo) -->
                <div class="flex items-center gap-1 bg-slate-50 p-1 rounded-lg border border-slate-200">
                    <!-- Text Color Picker -->
                    <label class="flex items-center gap-1 px-1.5 py-1 rounded hover:bg-white cursor-pointer" title="Warna Huruf">
                        <span class="font-extrabold text-xs" style="color: #ef4444; border-bottom: 2px solid #ef4444;">A</span>
                        <input type="color" onchange="formatDoc('foreColor', this.value)" class="w-4 h-4 p-0 border-0 bg-transparent cursor-pointer">
                    </label>

                    <!-- Text Highlight Color Picker -->
                    <label class="flex items-center gap-1 px-1.5 py-1 rounded hover:bg-white cursor-pointer" title="Warna Stabilo Latar">
                        <span class="font-extrabold text-xs bg-amber-200 px-1 rounded">H</span>
                        <input type="color" value="#fef08a" onchange="formatDoc('hiliteColor', this.value)" class="w-4 h-4 p-0 border-0 bg-transparent cursor-pointer">
                    </label>
                </div>

                <!-- Kelompok 5: Perataan Paragraf (Word Alignment - Focus Justify) -->
                <div class="flex items-center bg-slate-50 p-1 rounded-lg border border-slate-200">
                    <button type="button" onclick="formatDoc('justifyLeft')" class="p-1.5 rounded hover:bg-white hover:text-teal-600" title="Rata Kiri (Align Left)">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h10M4 18h16"/></svg>
                    </button>
                    <button type="button" onclick="formatDoc('justifyCenter')" class="p-1.5 rounded hover:bg-white hover:text-teal-600" title="Rata Tengah (Align Center)">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M7 12h10M4 18h16"/></svg>
                    </button>
                    <button type="button" onclick="formatDoc('justifyRight')" class="p-1.5 rounded hover:bg-white hover:text-teal-600" title="Rata Kanan (Align Right)">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M10 12h10M4 18h16"/></svg>
                    </button>
                    <!-- Rata Penuh / Justify (Default BTD) -->
                    <button type="button" onclick="formatDoc('justifyFull')" class="p-1.5 rounded bg-teal-100 text-teal-800 font-extrabold border border-teal-300" title="RATA PENUH / JUSTIFY (Rata Kanan-Kiri Rapi)">
                        <svg class="w-4 h-4 text-teal-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>

                <!-- Kelompok 6: Daftar & Indentasi -->
                <div class="flex items-center bg-slate-50 p-1 rounded-lg border border-slate-200">
                    <button type="button" onclick="formatDoc('insertUnorderedList')" class="p-1.5 rounded hover:bg-white hover:text-teal-600" title="Daftar Poin (Bulleted List)">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h.01M8 6h12M4 12h.01M8 12h12M4 18h.01M8 18h12"/></svg>
                    </button>
                    <button type="button" onclick="formatDoc('insertOrderedList')" class="p-1.5 rounded hover:bg-white hover:text-teal-600 font-mono font-bold text-xs" title="Daftar Angka (Numbered List)">
                        1. 2.
                    </button>
                    <button type="button" onclick="formatDoc('outdent')" class="p-1.5 rounded hover:bg-white hover:text-teal-600" title="Kurangi Indentasi">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"/></svg>
                    </button>
                    <button type="button" onclick="formatDoc('indent')" class="p-1.5 rounded hover:bg-white hover:text-teal-600" title="Tambah Indentasi">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"/></svg>
                    </button>
                </div>

                <!-- Kelompok 7: Sisipkan Objek (Tabel, Garis, Link) -->
                <div class="flex items-center gap-1 bg-slate-50 p-1 rounded-lg border border-slate-200">
                    <button type="button" onclick="insertTablePrompt()" class="px-2 py-1 rounded hover:bg-white hover:text-teal-600 font-bold text-xs flex items-center gap-1" title="Sisipkan Tabel Rapi">
                        <span>📊 Tabel</span>
                    </button>
                    <button type="button" onclick="formatDoc('insertHorizontalRule')" class="px-1.5 py-1 rounded hover:bg-white hover:text-teal-600 font-bold text-xs" title="Sisipkan Garis Pembatas (HR)">
                        &mdash;
                    </button>
                    <button type="button" onclick="insertLinkPrompt()" class="p-1.5 rounded hover:bg-white hover:text-teal-600" title="Sisipkan Tautan Link">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                    </button>
                    <button type="button" onclick="formatDoc('unlink')" class="p-1.5 rounded hover:bg-white hover:text-rose-600" title="Hapus Tautan">
                        <span class="text-xs font-bold text-rose-500">🚫</span>
                    </button>
                </div>

                <!-- Kelompok 8: Tampilan & Aksi Simpan -->
                <div class="flex items-center gap-2 ml-auto">
                    <button type="button" @click="toggleHtmlMode()" 
                            class="px-2.5 py-1.5 rounded-lg border border-slate-200 text-[11px] font-bold text-slate-600 hover:bg-slate-100 flex items-center gap-1">
                        <span x-text="htmlMode ? '👁️ Mode Visual' : '&lt;/&gt; Mode HTML'"></span>
                    </button>

                    <button type="button" @click="saveDocument()" 
                            style="background-color: #059669 !important; color: #ffffff !important;"
                            class="px-4 py-1.5 rounded-lg font-extrabold text-xs uppercase tracking-wider shadow-sm hover:brightness-110 flex items-center gap-1.5 transition-all">
                        <span style="color:#fff;">💾 Simpan</span>
                    </button>
                </div>

            </div>
        </div>

        <!-- FORM SUBMIT EDITOR -->
        <form id="orderGuideForm" action="{{ route('admin.order-guide.update') }}" method="POST">
            @csrf
            <input type="hidden" name="order_guide_content" id="orderGuideContentInput">

            <!-- HTML Raw Source Editor (Toggled in HTML Mode) -->
            <div x-show="htmlMode" class="bg-white rounded-2xl border border-slate-300 p-4 shadow-sm">
                <div class="text-xs font-bold text-slate-700 mb-2 flex items-center justify-between">
                    <span>Source Code HTML Dokumen (Mode Lanjutan):</span>
                    <span class="text-[11px] text-slate-400">Tekan 'Mode Visual' untuk kembali ke pratinjau lembar A4</span>
                </div>
                <textarea id="rawHtmlTextarea" rows="22" class="w-full font-mono text-xs p-3 bg-slate-900 text-slate-100 rounded-xl border border-slate-700 focus:outline-none"></textarea>
            </div>

            <!-- LIVE EDITABLE A4 PAPER CANVAS -->
            <div x-show="!htmlMode" class="bg-slate-200/60 p-3 sm:p-8 rounded-2xl flex justify-center">

                <!-- The Printable Document Sheet Wrapper (Matching Public View 1:1) -->
                <div class="w-full max-w-[840px] bg-white rounded-lg shadow-xl p-6 sm:p-12 relative overflow-hidden text-slate-800" 
                     style="font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size: 12.5px; line-height: 1.65; text-align: justify; text-justify: inter-word;">

                    <!-- Watermark Samar (Subtle Background) -->
                    <div style="position: absolute; inset: 0; pointer-events: none; display: flex; align-items: center; justify-content: center; overflow: hidden; z-index: 0; user-select: none;">
                        <div style="opacity: 0.038; transform: rotate(-25deg); text-align: center; user-select: none;">
                            <img src="{{ asset(\App\Models\Setting::getValue('site_logo', 'images/smartverse/logo-smartverse.webp')) }}" alt="" style="width: 280px; height: auto; margin: 0 auto 12px auto; filter: grayscale(100%);">
                            <div style="font-size: 24px; font-weight: 900; letter-spacing: 4px; text-transform: uppercase; color: #0f172a;">{{ strtoupper($settings['company_legal_name'] ?? ($settings['company_name'] ?? 'SMARTVERSE (SMARTVERSE.ID)')) }}</div>
                            <div style="font-size: 13px; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; color: #269DB9; margin-top: 4px;">OFFICIAL SOP &amp; ORDER GUIDE</div>
                        </div>
                    </div>

                    <!-- Diagonal Ribbon -->
                    <div class="absolute top-0 right-0 w-32 h-32 overflow-hidden pointer-events-none z-10">
                        <div class="text-[10px] font-black tracking-widest text-white uppercase text-center transform rotate-45 relative top-6 -right-3 w-40 py-1 bg-gradient-to-r from-teal-500 to-teal-700 shadow-md">
                            OFFICIAL SOP
                        </div>
                    </div>

                    <!-- Kop Surat Resmi (Static Header) -->
                    <div class="flex justify-between items-start border-b-2 border-slate-200 pb-5 mb-5 relative z-10">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset(\App\Models\Setting::getValue('site_logo', 'images/smartverse/logo-smartverse.webp')) }}" alt="Logo" class="h-14 w-auto object-contain">
                        </div>
                        <div class="text-right text-xs text-slate-600 leading-snug">
                            <div class="text-base font-black text-slate-900 mb-0.5">{{ $settings['company_legal_name'] ?? ($settings['company_name'] ?? 'SmartVerse (smartverse.id)') }}</div>
                            <div>Jl. Sarjana Blok A No. 25 Timbangan</div>
                            <div>{{ $settings['company_address_line2'] ?? 'Sumatera Selatan, Indonesia' }}</div>
                            <div class="text-teal-600 font-bold mt-0.5">{{ $settings['contact_email'] ?? 'info@smartverse.id' }}</div>
                            <div class="font-bold text-slate-700">{{ $settings['contact_phone'] ?? '0896 9524 9089' }}</div>
                        </div>
                    </div>

                    <!-- Document Title & Invoiced Info Row -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pb-4 mb-5 border-b border-slate-200 relative z-10">
                        <div>
                            <h2 class="text-lg font-black text-slate-900 tracking-tight uppercase">
                                PANDUAN & ALUR PEMESANAN <span class="text-teal-600">WEBSITE / APLIKASI</span>
                            </h2>
                            <div class="text-xs text-slate-600 mt-1">
                                <span class="font-bold text-slate-800">Nomor Dokumen:</span> SOP-SMARTVERSE/WEB-APP/{{ date('Y') }}
                            </div>
                            <div class="text-xs text-slate-600">
                                <span class="font-bold text-slate-800">Status:</span> Standar Operasional Prosedur Resmi
                            </div>
                        </div>
                        <div class="border-l-2 border-teal-600 pl-3">
                            <div class="text-[10px] font-extrabold uppercase text-slate-400">Ditujukan Kepada</div>
                            <div class="inline-block text-[10px] font-bold text-teal-700 bg-teal-50 border border-teal-200 px-2 py-0.5 rounded uppercase mt-0.5">Calon Klien & Mitra</div>
                            <div class="text-xs font-bold text-slate-900 mt-1">Institusi, Sekolah, Yayasan & Pelaku Bisnis</div>
                            <div class="text-[11px] text-slate-500">Panduan persyaratan legalitas domain, pembayaran DP, hingga serah terima.</div>
                        </div>
                    </div>

                    <!-- EDITABLE BODY CONTENT CONTAINER (Full Word Style Contenteditable) -->
                    <div id="editableCanvas" 
                         contenteditable="true" 
                         spellcheck="false"
                         class="outline-none focus:ring-2 focus:ring-teal-400/40 rounded-lg p-2 min-h-[500px] transition-all relative z-10"
                         style="text-align: justify !important; text-justify: inter-word !important; line-height: 1.65;">
                        {!! $documentContent !!}
                    </div>

                    <!-- Static Payment Box & QR Footer Preview -->
                    <div class="mt-8 pt-4 border-t border-slate-200 text-xs text-slate-500 flex items-center justify-between relative z-10">
                        <div>
                            <div class="font-bold text-slate-800">{{ $settings['company_legal_name'] ?? ($settings['company_name'] ?? 'SmartVerse (smartverse.id)') }}</div>
                            <a href="https://{{ $settings['site_website'] ?? 'smartverse.id' }}" class="text-teal-600 font-bold" target="_blank">{{ $settings['site_website'] ?? 'smartverse.id' }}</a>
                            <div class="text-[10px] text-slate-400 mt-1">Dokumen ini sah dan diterbitkan resmi melalui sistem komputerisasi {{ $settings['company_name'] ?? 'SmartVerse' }}.</div>
                        </div>
                        <div class="text-right">
                            <span class="inline-block px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 border border-emerald-200 text-[9px] font-bold uppercase">
                                ✓ Verified SOP
                            </span>
                            <div class="text-[10px] text-slate-400 mt-1">Indonesia</div>
                        </div>
                    </div>

                </div>

            </div>
        </form>

    </div>

    <!-- TAB 2: PRATINJAU & BAGIKAN KE KLIEN -->
    <div x-show="activeTab === 'share'" class="space-y-6">

        <!-- Quick Share Toolbar & WhatsApp Helper Card -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
            
            <!-- Kolom 1 & 2: Quick Share & Teks WhatsApp Siap Kirim -->
            <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200/80 p-5 sm:p-6 shadow-xs space-y-4">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-teal-50 border border-teal-200 text-teal-600 flex items-center justify-center font-bold text-sm">
                            🔗
                        </div>
                        <div>
                            <h2 class="text-sm font-extrabold text-slate-800">Tautan Dokumen Siap Kirim ke Klien</h2>
                            <p class="text-[11px] text-slate-500">Klien dapat membuka dokumen ini langsung tanpa perlu login akun.</p>
                        </div>
                    </div>
                    <span class="px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 text-[10px] font-extrabold border border-emerald-200">
                        Aktif & Siap Pakai
                    </span>
                </div>

                <!-- Input Bar Tautan -->
                <div class="flex items-center gap-2">
                    <div class="relative flex-1">
                        <input type="text" readonly value="{{ $publicUrl }}" id="publicUrlInput"
                               class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs text-slate-700 font-mono font-bold select-all focus:outline-hidden focus:ring-2 focus:ring-teal-500/20">
                    </div>
                    <button @click="copyLink('{{ $publicUrl }}')" 
                            class="px-4 py-2.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white font-bold text-xs shrink-0 transition-all flex items-center gap-1.5 shadow-xs">
                        <span>📋 Salin Link</span>
                    </button>
                </div>

                <!-- Helper Box WhatsApp -->
                <div class="pt-2">
                    <div class="flex items-center justify-between mb-2">
                        <label class="text-xs font-bold text-slate-700 flex items-center gap-1.5">
                            <span class="text-emerald-500">💬</span> Template Pesan WhatsApp Siap Kirim
                        </label>
                        <button @click="copyWaText()" class="text-[11px] font-bold text-teal-600 hover:text-teal-800 transition-colors">
                            Salin Teks Pesan
                        </button>
                    </div>
                    <textarea id="waTextarea" rows="4" readonly
                              class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-xs text-slate-600 leading-relaxed font-sans focus:outline-hidden resize-none">{{ $waMessage }}</textarea>
                    
                    <div class="flex items-center justify-between pt-2">
                        <p class="text-[11px] text-slate-400 italic">
                            Tip: Salin teks di atas dan kirimkan langsung saat calon klien berkonsultasi via WhatsApp.
                        </p>
                        <a href="https://wa.me/?text={{ $encodedWaMessage }}" target="_blank" 
                           class="px-3 py-1.5 rounded-lg bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-bold hover:bg-emerald-100 transition-all inline-flex items-center gap-1">
                            Buka WhatsApp Web &rarr;
                        </a>
                    </div>
                </div>

                <!-- Lampiran Format Surat Permohonan & Surat Kuasa Quick Actions -->
                <div class="pt-3 border-t border-slate-100 flex items-center justify-between flex-wrap gap-2">
                    <div class="flex items-center gap-1.5 text-xs text-slate-700 font-bold">
                        <span class="text-teal-600">📄</span> Contoh Format Surat Legalitas (.sch.id):
                    </div>
                    <div class="flex items-center gap-2">
                        <button @click="copyLetter('permohonan')" class="px-2.5 py-1.5 rounded-lg bg-slate-100 hover:bg-teal-50 hover:text-teal-700 text-slate-700 text-[11px] font-bold border border-slate-200 transition-all">
                            📋 Salin Format Permohonan
                        </button>
                        <button @click="copyLetter('kuasa')" class="px-2.5 py-1.5 rounded-lg bg-slate-100 hover:bg-teal-50 hover:text-teal-700 text-slate-700 text-[11px] font-bold border border-slate-200 transition-all">
                            📋 Salin Format Surat Kuasa
                        </button>
                    </div>
                </div>
            </div>

            <!-- Kolom 3: Validasi QR Code Digital Card -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-5 sm:p-6 shadow-xs flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="px-2 py-0.5 rounded bg-blue-50 text-blue-700 text-[10px] font-extrabold border border-blue-200">
                            QR DIGITAL VERIFICATION
                        </span>
                    </div>
                    <h2 class="text-sm font-extrabold text-slate-800 mb-1">QR Code Validasi Dokumen</h2>
                    <p class="text-[11px] text-slate-500 mb-4">
                        QR code ini tercetak otomatis di lembar dokumen untuk membuktikan keaslian SOP langsung di server {{ $settings['company_name'] ?? 'SmartVerse' }}.
                    </p>

                    <div class="flex items-center justify-center p-3 bg-slate-50 rounded-xl border border-slate-200/60 mb-4">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&margin=2&color=000000&data={{ urlencode($publicUrl) }}" 
                             alt="QR Code Panduan Pemesanan" 
                             class="w-32 h-32 object-contain rounded-lg shadow-xs bg-white p-1">
                    </div>
                </div>

                <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                    <span class="text-slate-500 font-medium">Resolusi: 180x180 px</span>
                    <a href="{{ $publicUrl }}" target="_blank" class="font-bold text-teal-600 hover:text-teal-800">
                        Uji Scan &rarr;
                    </a>
                </div>
            </div>

        </div>

        <!-- Live Preview Container of the Official Document -->
        <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-xs">
            <div class="px-6 py-4 bg-slate-50/80 border-b border-slate-200/80 flex items-center justify-between flex-wrap gap-2">
                <div class="flex items-center gap-2.5">
                    <span class="w-3 h-3 rounded-full bg-emerald-500 inline-block"></span>
                    <span class="text-xs font-bold text-slate-700 uppercase tracking-wider">Pratinjau Lembar Dokumen Resmi (Live Preview)</span>
                </div>
                <div class="flex items-center gap-2 text-xs text-slate-500">
                    <span>Format: Kertas A4 Standar</span>
                    <span>•</span>
                    <a href="{{ $publicUrl }}" target="_blank" class="text-teal-600 hover:text-teal-800 font-bold flex items-center gap-1">
                        Buka Fullscreen &rarr;
                    </a>
                </div>
            </div>

            <!-- Document Iframe Preview -->
            <div class="p-2 sm:p-6 bg-slate-100/70 flex justify-center">
                <iframe src="{{ $publicUrl }}" 
                        class="w-full max-w-[880px] h-[1050px] border border-slate-300 rounded-xl shadow-lg bg-white"
                        title="Pratinjau Dokumen SOP Panduan Pemesanan"></iframe>
            </div>
        </div>

    </div>

</div>

<!-- Alpine.js & Word Editor Scripts -->
<script>
    function orderGuideAdmin(initial) {
        return {
            activeTab: initial.activeTab || 'editor',
            htmlMode: false,
            toggleHtmlMode() {
                const canvas = document.getElementById('editableCanvas');
                const raw = document.getElementById('rawHtmlTextarea');
                if (!this.htmlMode) {
                    raw.value = canvas.innerHTML;
                    this.htmlMode = true;
                } else {
                    canvas.innerHTML = raw.value;
                    this.htmlMode = false;
                }
            },
            saveDocument() {
                const canvas = document.getElementById('editableCanvas');
                const raw = document.getElementById('rawHtmlTextarea');
                const hiddenInput = document.getElementById('orderGuideContentInput');
                const form = document.getElementById('orderGuideForm');

                if (this.htmlMode) {
                    hiddenInput.value = raw.value;
                } else {
                    hiddenInput.value = canvas.innerHTML;
                }

                form.submit();
            },
            copyLink(url) {
                if (navigator.clipboard && window.isSecureContext) {
                    navigator.clipboard.writeText(url).then(() => {
                        alert('✓ Tautan dokumen berhasil disalin ke clipboard:\n' + url);
                    }).catch(() => {
                        this.fallbackCopy(url);
                    });
                } else {
                    this.fallbackCopy(url);
                }
            },
            copyWaText() {
                const el = document.getElementById('waTextarea');
                if (el) {
                    el.select();
                    document.execCommand('copy');
                    alert('✓ Template teks pesan WhatsApp berhasil disalin! Anda tinggal paste di WhatsApp klien.');
                }
            },
            copyLetter(type) {
                let text = '';
                let title = '';
                if (type === 'permohonan') {
                    title = 'Format Surat Permohonan Domain .sch.id';
                    text = `KOP SURAT RESMI SEKOLAH\nAlamat Lengkap Sekolah, Telepon, Email, Website Resmi\n========================================================================\n\nNomor    : [Nomor Surat dari Sekolah]               [Kota], [Tanggal Bulan Tahun]\nHal      : Permohonan Pendaftaran Domain sch.id\nLampiran : 1 berkas\n\nKepada Yth.\nPANDI – Pengelola Nama Domain Internet Indonesia\nDi Gedung Arthaloka Lantai 11, Jalan Jenderal Sudirman No. 2, Jakarta Pusat\n\nDengan Hormat,\n\nYang bertanda tangan di bawah ini:\nNama    : [Nama Kepala Sekolah]\nNIP     : [NIP Kepala Sekolah / - jika non-PNS]\nJabatan : Kepala Sekolah [Nama Sekolah]\n\nBermaksud mengajukan permohonan pendaftaran domain [namadomain.sch.id] untuk keperluan pembuatan website sekolah [Nama Sekolah] [Nama Kota], sebagai persyaratan terlampir.\n\nDemikian permohonan ini kami sampaikan, atas kerja sama dan terkabulnya permohonan ini, kami sampaikan terima kasih.\n\n\nHormat Kami,\nKepala Sekolah [Nama Sekolah]\n\n\n(Tanda Tangan & Cap Stempel Basah Sekolah)\n\n\n[Nama Lengkap Kepala Sekolah]\nNIP. [NIP Kepala Sekolah]`;
                } else {
                    title = 'Format Surat Kuasa Domain .sch.id';
                    text = `KOP SURAT RESMI SEKOLAH\nAlamat Lengkap Sekolah, Telepon, Email, Website Resmi\n========================================================================\n\nSURAT KUASA\nNO: [Nomor Surat Kuasa dari Sekolah]\n\nKepada Yth.\nPANDI – Pengelola Nama Domain Internet Indonesia\nDi Gedung Arthaloka Lantai 11, Jalan Jenderal Sudirman No. 2, Jakarta Pusat\n\nDengan Hormat,\n\nYang bertanda tangan di bawah ini:\nNama    : [Nama Kepala Sekolah]\nNIP     : [NIP Kepala Sekolah / - jika non-PNS]\nJabatan : Kepala Sekolah [Nama Sekolah]\n\nDengan ini memberi kuasa kepada:\nNama    : [Nama yang Diberi Kuasa / Septa Ryan Hidayat - Tim {{ $settings['company_legal_name'] ?? ($settings['company_name'] ?? 'SmartVerse') }}]\nNo KTP  : [Nomor KTP yang Diberi Kuasa]\n\nSebagai penanggung jawab untuk pendaftaran dan pengelolaan domain [namadomain.sch.id] untuk keperluan pembuatan website sekolah [Nama Sekolah] [Nama Kota].\n\nDemikian surat permohonan ini kami sampaikan, atas kerja samanya, kami sampaikan terima kasih.\n\n\n[Kota], [Tanggal Bulan Tahun]\nKepala Sekolah [Nama Sekolah]\n\n\n(Tanda Tangan & Cap Stempel Basah Sekolah)\n\n\n[Nama Lengkap Kepala Sekolah]\nNIP. [NIP Kepala Sekolah]`;
                }

                if (navigator.clipboard && window.isSecureContext) {
                    navigator.clipboard.writeText(text).then(() => {
                        alert('✓ ' + title + ' berhasil disalin ke clipboard! Anda tinggal paste di Word atau WhatsApp.');
                    }).catch(() => {
                        this.fallbackCopy(text);
                    });
                } else {
                    this.fallbackCopy(text);
                }
            },
            fallbackCopy(text) {
                const input = document.getElementById('publicUrlInput');
                if (input) {
                    input.select();
                    document.execCommand('copy');
                    alert('✓ Tautan berhasil disalin:\n' + text);
                } else {
                    prompt('Salin tautan dokumen ini:', text);
                }
            }
        };
    }

    // Word Formatting Commands
    function formatDoc(cmd, val = null) {
        document.getElementById('editableCanvas').focus();
        document.execCommand(cmd, false, val);
    }

    // Insert Hyperlink Helper
    function insertLinkPrompt() {
        const url = prompt('Masukkan URL tautan (contoh: https://domain.sch.id):', 'https://');
        if (url && url !== 'https://') {
            formatDoc('createLink', url);
        }
    }

    // Insert Table Helper
    function insertTablePrompt() {
        const rows = parseInt(prompt('Jumlah baris tabel:', '3'), 10) || 3;
        const cols = parseInt(prompt('Jumlah kolom tabel:', '2'), 10) || 2;
        
        let html = '<table style="width:100%; border-collapse:collapse; margin:12px 0; border:1px solid #cbd5e1; font-size:12px;"><tbody>';
        for (let r = 0; r < rows; r++) {
            html += '<tr>';
            for (let c = 0; c < cols; c++) {
                if (r === 0) {
                    html += '<th style="border:1px solid #cbd5e1; padding:8px 10px; background:#f1f5f9; font-weight:bold; text-align:left;">Header ' + (c + 1) + '</th>';
                } else {
                    html += '<td style="border:1px solid #cbd5e1; padding:8px 10px; text-align:justify;">Teks kolom ' + (c + 1) + '</td>';
                }
            }
            html += '</tr>';
        }
        html += '</tbody></table><p><br></p>';

        document.getElementById('editableCanvas').focus();
        document.execCommand('insertHTML', false, html);
    }
</script>
@endsection
