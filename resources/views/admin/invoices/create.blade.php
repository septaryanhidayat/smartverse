@extends('admin.layouts.app')

@section('title', 'Buat Invoice Baru')

@section('content')
<div class="max-w-5xl mx-auto space-y-6" x-data="{
    status: 'paid',
    items: [
        { description: 'Pelunasan Pembuatan Website & Aplikasi', amount: 3000000 }
    ],
    transactions: [
        { date: '{{ date('d/m/Y') }}', payment_method: 'ShopeePay', transaction_id: '', amount: 3000000 }
    ],
    paid_amount: 3000000,
    
    // Status watcher for auto description prefix
    onStatusChange() {
        if (this.items.length > 0) {
            let desc = this.items[0].description;
            // Clean existing prefix
            desc = desc.replace(/^(Pelunasan|DP \(Down Payment\)|Tagihan)\s+/i, '');
            if (this.status === 'paid') {
                this.items[0].description = 'Pelunasan ' + desc;
            } else if (this.status === 'partial') {
                this.items[0].description = 'DP (Down Payment) ' + desc;
            } else if (this.status === 'unpaid') {
                this.items[0].description = 'Tagihan ' + desc;
            }
        }
    },

    addItem() {
        this.items.push({ description: '', amount: 0 });
    },
    removeItem(index) {
        if (this.items.length > 1) {
            this.items.splice(index, 1);
        }
    },
    
    addTransaction() {
        this.transactions.push({ 
            date: '{{ date('d/m/Y') }}', 
            payment_method: 'Transfer Bank', 
            transaction_id: '', 
            amount: 0 
        });
    },
    removeTransaction(index) {
        this.transactions.splice(index, 1);
    },

    get totalAmount() {
        return this.items.reduce((sum, item) => sum + (parseFloat(item.amount) || 0), 0);
    },
    get totalTransactions() {
        return this.transactions.reduce((sum, t) => sum + (parseFloat(t.amount) || 0), 0);
    },
    get remainingAmount() {
        let diff = this.totalAmount - (parseFloat(this.paid_amount) || 0);
        return diff > 0 ? diff : 0;
    },
    syncPaidFromTransactions() {
        this.paid_amount = this.totalTransactions;
    },
    formatRupiah(num) {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(num || 0);
    }
}">
    
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-[#071330] flex items-center gap-2.5">
                <span>🧾</span>
                <span>Buat Faktur / Invoice Baru</span>
            </h1>
            <p class="text-xs text-slate-500 font-medium mt-1">
                Kustomisasi rincian pesanan multi-item, riwayat pembayaran terpisah, dan template ATTN otomatis.
            </p>
        </div>
        <a href="{{ route('admin.invoices.index') }}" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-all">
            &larr; Kembali ke Daftar
        </a>
    </div>

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

    <form action="{{ route('admin.invoices.store') }}" method="POST" class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm space-y-8">
        @csrf

        <!-- Section 1: Data Identitas Invoice -->
        <div class="space-y-4">
            <h2 class="text-sm font-extrabold text-[#071330] uppercase tracking-wider pb-2 border-b border-slate-100 flex items-center justify-between">
                <span>1. Informasi Identitas Invoice & Klien</span>
                <span class="text-xs font-bold text-slate-400 normal-case">Nomor otomatis berlanjut</span>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <!-- Nomor Invoice -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Nomor Invoice *</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 font-mono text-xs font-bold">#</span>
                        <input type="text" name="invoice_number" required value="{{ old('invoice_number', $nextNumber) }}" class="w-full pl-8 pr-4 py-2.5 rounded-xl border border-slate-200 text-xs font-mono font-bold text-[#071330] bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>
                </div>

                <!-- Tanggal Invoice -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Tanggal Terbit (Invoice Date) *</label>
                    <input type="date" name="invoice_date" required value="{{ old('invoice_date', date('Y-m-d')) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                </div>

                <!-- Jatuh Tempo -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Jatuh Tempo (Due Date)</label>
                    <input type="date" name="due_date" value="{{ old('due_date', date('Y-m-d')) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                </div>

                <!-- Status Pembayaran (Reactive) -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Status Pembayaran *</label>
                    <select name="status" x-model="status" @change="onStatusChange()" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs font-bold focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" :class="{
                        'bg-emerald-50 text-emerald-800 border-emerald-300': status === 'paid',
                        'bg-amber-50 text-amber-800 border-amber-300': status === 'partial',
                        'bg-rose-50 text-rose-800 border-rose-300': status === 'unpaid',
                        'bg-slate-50 text-slate-700': status === 'cancelled'
                    }">
                        <option value="paid">🟢 Lunas (PAID) &rarr; Deskripsi: Pelunasan ...</option>
                        <option value="partial">🟡 Sebagian / DP (PARTIAL) &rarr; Deskripsi: DP ...</option>
                        <option value="unpaid">🔴 Belum Dibayar (UNPAID) &rarr; Deskripsi: Tagihan ...</option>
                        <option value="cancelled">⚪ Dibatalkan (CANCELLED)</option>
                    </select>
                </div>

                <!-- Tipe Klien -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Tipe Klien *</label>
                    <select name="client_type" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none">
                        <option value="Personal">Personal / Perorangan</option>
                        <option value="Perusahaan / PT / CV">Perusahaan / Korporasi</option>
                        <option value="Instansi Pemerintah / BUMN">Instansi Pemerintah / BUMN</option>
                        <option value="Institusi Pendidikan">Institusi Pendidikan / Sekolah / Kampus</option>
                    </select>
                </div>

                <!-- Nama Instansi / Klien -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Nama Klien / Instansi *</label>
                    <input type="text" name="client_name" required placeholder="Contoh: APPI Sumsel / PT Maju" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#269DB9] focus:outline-none" />
                </div>

                <!-- Email Klien (Otomatis Kirim) -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Email Klien (Opsional)</label>
                    <input type="email" name="client_email" placeholder="klien@instansi.com" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#269DB9] focus:outline-none" />
                    <label class="inline-flex items-center gap-1.5 mt-1 cursor-pointer">
                        <input type="checkbox" name="send_email_now" value="1" checked class="rounded text-[#269DB9] focus:ring-[#269DB9]">
                        <span class="text-[11px] text-slate-500 font-medium">Kirimkan invoice otomatis ke email klien jika diisi</span>
                    </label>
                </div>

                <!-- Template ATTN (User hanya isi nama saja) -->
                <div class="space-y-1.5 md:col-span-2">
                    <label class="block text-xs font-bold text-[#071330]">
                        ATTN / Kontak Penerima (Otomatis diberi awalan "ATTN : ")
                    </label>
                    <div class="flex items-center">
                        <span class="inline-flex items-center px-4 py-2.5 rounded-l-xl border border-r-0 border-slate-200 bg-slate-100 text-slate-700 font-extrabold text-xs whitespace-nowrap shrink-0 select-none">
                            ATTN:
                        </span>
                        <input type="text" name="client_attn" placeholder="Pak Wardoyo (cukup ketik nama saja)" class="w-full px-4 py-2.5 rounded-r-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-medium" />
                    </div>
                    <span class="text-[11px] text-slate-400">Di cetak faktur otomatis tampil: <strong>ATTN: [Nama yang Anda ketik]</strong></span>
                </div>

                <!-- Alamat Klien -->
                <div class="space-y-1.5 md:col-span-3">
                    <label class="block text-xs font-bold text-[#071330]">Alamat Klien / Kota</label>
                    <input type="text" name="client_address" placeholder="Contoh: Banyuasin, Sumsel" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                </div>
            </div>
        </div>

        <!-- Section 2: Multi-Item Layanan & Pesanan -->
        <div class="space-y-4 pt-4 border-t border-slate-100">
            <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                <div>
                    <h2 class="text-sm font-extrabold text-[#071330] uppercase tracking-wider">
                        2. Rincian Item Layanan / Pesanan (Bisa Lebih Dari 1 Item)
                    </h2>
                    <p class="text-xs text-slate-500 font-medium mt-0.5">Tambah baris bila ada beberapa produk atau layanan dalam 1 invoice</p>
                </div>
                <button type="button" @click="addItem()" class="px-3 py-1.5 rounded-lg bg-blue-50 hover:bg-blue-100 text-[#3E5CE7] font-bold text-xs flex items-center gap-1.5 transition-all border border-blue-200">
                    <span>+ Tambah Item Layanan</span>
                </button>
            </div>

            <!-- Dynamic Items Rows -->
            <div class="space-y-3">
                <template x-for="(item, index) in items" :key="index">
                    <div class="p-4 rounded-2xl border border-slate-200 bg-slate-50/50 flex flex-col md:flex-row items-start gap-3">
                        <div class="w-7 h-7 rounded-lg bg-[#071330] text-white flex items-center justify-center font-bold text-xs shrink-0 mt-1" x-text="index + 1"></div>
                        
                        <!-- Deskripsi Item -->
                        <div class="flex-1 w-full space-y-1">
                            <div class="flex items-center justify-between">
                                <label class="block text-[10px] font-extrabold uppercase text-slate-500">Deskripsi Item / Layanan</label>
                                <button type="button" @click="item.description = (item.description ? item.description + '\n• ' : '• ')" class="text-[10px] text-blue-600 hover:text-blue-800 font-bold flex items-center gap-1 hover:underline">
                                    <span>+ Sisipkan Poin (•)</span>
                                </button>
                            </div>
                            <textarea :name="'items[' + index + '][description]'" x-model="item.description" rows="3" required placeholder="Tuliskan nama layanan atau rincian poin (gunakan simbol • atau enter untuk baris ke bawah)..." class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-medium leading-relaxed resize-y"></textarea>
                        </div>

                        <!-- Nominal Item -->
                        <div class="w-full md:w-56 space-y-1">
                            <label class="block text-[10px] font-extrabold uppercase text-slate-500">Nominal (Rp)</label>
                            <input type="number" :name="'items[' + index + '][amount]'" x-model.number="item.amount" required min="0" step="1000" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-xs font-mono font-bold text-[#071330] focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none text-right" />
                        </div>

                        <!-- Hapus Button -->
                        <div class="shrink-0 md:pt-6">
                            <button type="button" @click="removeItem(index)" x-show="items.length > 1" class="p-2 rounded-lg text-rose-500 hover:bg-rose-100 transition-colors" title="Hapus baris item">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Subtotal & Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-2">
                <!-- Total Nilai Pesanan -->
                <div class="p-4 rounded-2xl bg-blue-50/60 border border-blue-200 space-y-1">
                    <span class="text-[10px] font-extrabold uppercase tracking-wider text-blue-700">Total Tagihan (Total)</span>
                    <div class="text-lg font-black text-[#071330] mono" x-text="formatRupiah(totalAmount)"></div>
                </div>

                <!-- Input Terbayar -->
                <div class="p-4 rounded-2xl bg-emerald-50/60 border border-emerald-200 space-y-1.5">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-extrabold uppercase tracking-wider text-emerald-800">Terbayar (Paid Amount) *</span>
                        <button type="button" @click="syncPaidFromTransactions()" class="text-[10px] text-emerald-700 hover:underline font-bold">
                            Hitung dari Riwayat &darr;
                        </button>
                    </div>
                    <input type="number" name="paid_amount" x-model.number="paid_amount" required min="0" class="w-full px-3 py-1.5 rounded-xl border border-emerald-300 bg-white text-xs font-mono font-bold text-emerald-900 focus:ring-2 focus:ring-emerald-500 focus:outline-none" />
                </div>

                <!-- Sisa Pembayaran Otomatis -->
                <div class="p-4 rounded-2xl bg-amber-50/60 border border-amber-200 space-y-1">
                    <span class="text-[10px] font-extrabold uppercase tracking-wider text-amber-800">Sisa Pembayaran (Remaining)</span>
                    <div class="text-lg font-black text-amber-900 mono" x-text="formatRupiah(remainingAmount)"></div>
                </div>
            </div>
        </div>

        <!-- Section 3: Riwayat Transaksi Terpisah (Tabel Bawah Faktur) -->
        <div class="space-y-4 pt-4 border-t border-slate-100">
            <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                <div>
                    <h2 class="text-sm font-extrabold text-[#071330] uppercase tracking-wider">
                        3. Riwayat Transaksi Pembayaran (Tabel Bawah Invoice)
                    </h2>
                    <p class="text-xs text-slate-500 font-medium mt-0.5">Isian terpisah: Tanggal, Channel Bayar, Nomor/ID Transaksi, dan Nominal</p>
                </div>
                <button type="button" @click="addTransaction()" class="px-3 py-1.5 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-bold text-xs flex items-center gap-1.5 transition-all border border-emerald-200">
                    <span>+ Tambah Baris Pembayaran</span>
                </button>
            </div>

            <!-- Dynamic Transaction Rows -->
            <div class="space-y-3">
                <template x-for="(t, tIndex) in transactions" :key="tIndex">
                    <div class="p-4 rounded-2xl border border-slate-200 bg-slate-50/50 grid grid-cols-1 md:grid-cols-12 gap-3 items-center">
                        
                        <!-- Tanggal Transaksi -->
                        <div class="md:col-span-3 space-y-1">
                            <label class="block text-[10px] font-extrabold uppercase text-slate-500">Tanggal Transaksi</label>
                            <input type="text" :name="'transactions[' + tIndex + '][date]'" x-model="t.date" required placeholder="DD/MM/YYYY" class="w-full px-3 py-2 rounded-xl border border-slate-200 bg-white text-xs font-mono focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                        </div>

                        <!-- Channel Pembayaran -->
                        <div class="md:col-span-3 space-y-1">
                            <label class="block text-[10px] font-extrabold uppercase text-slate-500">Channel / Metode</label>
                            <input type="text" :name="'transactions[' + tIndex + '][payment_method]'" x-model="t.payment_method" required placeholder="ShopeePay / Bank Mandiri / QRIS" class="w-full px-3 py-2 rounded-xl border border-slate-200 bg-white text-xs font-bold text-slate-800 focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                        </div>

                        <!-- Nomor / ID Transaksi -->
                        <div class="md:col-span-3 space-y-1">
                            <label class="block text-[10px] font-extrabold uppercase text-slate-500">Nomor / ID Transaksi</label>
                            <input type="text" :name="'transactions[' + tIndex + '][transaction_id]'" x-model="t.transaction_id" placeholder="Contoh: UWSK6XWZ6WF5..." class="w-full px-3 py-2 rounded-xl border border-slate-200 bg-white text-xs font-mono focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                        </div>

                        <!-- Nominal Bayar -->
                        <div class="md:col-span-2 space-y-1">
                            <label class="block text-[10px] font-extrabold uppercase text-slate-500">Nominal (Rp)</label>
                            <input type="number" :name="'transactions[' + tIndex + '][amount]'" x-model.number="t.amount" required min="0" step="1000" class="w-full px-3 py-2 rounded-xl border border-slate-200 bg-white text-xs font-mono font-bold text-right text-emerald-800 focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                        </div>

                        <!-- Tombol Hapus -->
                        <div class="md:col-span-1 md:pt-4 text-right">
                            <button type="button" @click="removeTransaction(tIndex)" x-show="transactions.length > 1" class="p-2 rounded-lg text-rose-500 hover:bg-rose-100 transition-colors" title="Hapus transaksi">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Notes -->
            <div class="space-y-1.5 pt-2">
                <label class="block text-xs font-bold text-[#071330]">Catatan Tambahan / Ucapan Terima Kasih</label>
                <textarea name="notes" rows="2" placeholder="Terima kasih atas kerja sama dan kepercayaan Anda bersama CV. Beranda Teknologi Digital." class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none">{{ old('notes', 'Terima kasih atas kerja sama dan kepercayaan Anda bersama CV. Beranda Teknologi Digital.') }}</textarea>
            </div>
        </div>

        <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
            <a href="{{ route('admin.invoices.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs">
                Batal
            </a>
            <button type="submit" class="px-8 py-3.5 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-extrabold text-xs uppercase tracking-wider shadow-lg hover:shadow-blue-600/30 transition-all flex items-center gap-2">
                <span>Simpan & Terbitkan Invoice &rarr;</span>
            </button>
        </div>

    </form>
</div>
@endsection
