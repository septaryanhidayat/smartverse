<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminOrderGuideController extends Controller
{
    /**
     * Tampilkan halaman Dokumen SOP & Panduan Pemesanan di dashboard Admin
     * lengkap dengan toolbar pengolah kata (Word-like Editor), pratinjau live, dan aksi bagikan.
     */
    public function index(Request $request)
    {
        $settings = Setting::all()->keyBy('key')->map(fn($s) => $s->value);
        $publicUrl = route('order-guide.show');
        
        // Template pesan WhatsApp ramah untuk calon klien
        $companyName = $settings['company_name'] ?? 'SmartVerse';
        $companyLegal = $settings['company_legal_name'] ?? ($settings['company_name'] ?? 'SmartVerse (smartverse.id)');
        $waMessage = "Halo Bapak/Ibu,\n\nTerima kasih atas ketertarikan Anda untuk bekerja sama dalam pembuatan website / sistem digital dengan {$companyLegal}.\n\nBerikut kami lampirkan dokumen resmi Panduan & SOP Alur Pemesanan kami (termasuk persyaratan legalitas domain, rekening resmi, contoh surat, dan tahapan pengerjaan):\n👉 {$publicUrl}\n\nJika ada pertanyaan lebih lanjut, silakan hubungi kami kembali. Terima kasih!";

        $encodedWaMessage = urlencode($waMessage);

        $customContent = $settings['order_guide_content'] ?? null;
        $isCustomized = !empty($customContent);
        $documentContent = $customContent ?: $this->getDefaultContent($settings);

        return view('admin.order_guide.index', compact(
            'settings', 
            'publicUrl', 
            'waMessage', 
            'encodedWaMessage', 
            'documentContent', 
            'isCustomized'
        ));
    }

    /**
     * Simpan pembaruan isi konten dokumen yang diedit admin via Word Toolbar.
     */
    public function update(Request $request)
    {
        $request->validate([
            'order_guide_content' => 'required|string',
        ]);

        Setting::updateOrCreate(
            ['key' => 'order_guide_content'],
            ['value' => $request->order_guide_content]
        );

        return redirect()->route('admin.order-guide.index', ['tab' => 'editor'])
            ->with('success', 'Isi dokumen panduan pemesanan berhasil disimpan! Perubahan langsung tayang di halaman publik.');
    }

    /**
     * Reset isi konten dokumen kembali ke format default bawaan resmi.
     */
    public function reset(Request $request)
    {
        Setting::where('key', 'order_guide_content')->delete();

        return redirect()->route('admin.order-guide.index')
            ->with('success', 'Isi dokumen berhasil dikembalikan ke format default standar resmi.');
    }

    /**
     * Konten HTML default berformat rata penuh (justify) yang rapi.
     */
    public function getDefaultContent(array|\Illuminate\Support\Collection $settings = []): string
    {
        if ($settings instanceof \Illuminate\Support\Collection) {
            $settings = $settings->toArray();
        }

        $companyLegal = $settings['company_legal_name'] ?? ($settings['company_name'] ?? 'SmartVerse (smartverse.id)');
        $rawPhone = $settings['contact_phone'] ?? '0896 9524 9089';
        $cleanPhone = str_replace('-', ' ', $rawPhone);
        $formattedPhone = trim(preg_replace('/\s+/', ' ', $cleanPhone));

        return <<<HTML
<!-- Kata Pengantar / Intro Box -->
<div class="doc-intro-box" style="text-align: justify; text-justify: inter-word;">
    Terima kasih telah mempercayakan pembuatan website & aplikasi instansi/bisnis Anda kepada <strong>{$companyLegal}</strong>. Agar proses pengerjaan berjalan dengan cepat, terstruktur, aman, dan lancar, berikut adalah tahapan dan standar operasional pemesanannya:
</div>

<!-- 6 Tahapan Pemesanan Lengkap -->
<div class="steps-container">

    <!-- Tahap 1 -->
    <div class="step-card">
        <div class="step-header">
            <div class="step-num">1</div>
            <div class="step-title">Persyaratan Awal & Dokumen Legalitas Domain</div>
        </div>
        <div class="step-body" style="text-align: justify; text-justify: inter-word;">
            <p>
                Domain resmi Indonesia memerlukan berkas legalitas sesuai ketentuan PANDI (Pengelola Nama Domain Internet Indonesia). Mohon siapkan softcopy (scan atau foto jelas dokumen asli):
            </p>
            <ul class="step-bullets">
                <li>
                    <span class="step-badge-mini">Sekolah (.sch.id)</span>
                    <strong>KTP Kepala Sekolah / Pejabat yang ditunjuk</strong> dan <strong>SK Pendirian Sekolah / Izin Operasional Sekolah</strong>.
                </li>
                <li>
                    <span class="step-badge-mini">Kampus (.ac.id)</span>
                    <strong>KTP Pimpinan / Pejabat Kampus</strong> dan <strong>SK Pendirian PT dari Kemenristekdikti / SK Izin Operasional</strong>.
                </li>
                <li>
                    <span class="step-badge-mini">Yayasan (.or.id)</span>
                    <strong>KTP Pimpinan Yayasan</strong> dan <strong>Akta Notaris / SK Kemenkumham Pendirian Yayasan</strong>.
                </li>
                <li>
                    <span class="step-badge-mini">Perusahaan (.co.id)</span>
                    <strong>KTP Penanggung Jawab</strong>, <strong>NIB / SIUP</strong>, dan <strong>Akta Pendirian Perusahaan</strong>.
                </li>
                <li>
                    <span class="step-badge-mini">Komersial / Umum (.com / .id / .my.id)</span>
                    <strong>KTP Penanggung Jawab</strong> (pendaftaran instan tanpa persyaratan berkas tambahan).
                </li>
            </ul>

            <div style="margin-top: 10px; padding: 9px 13px; background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 6px; font-size: 11.5px; color: #166534; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px;">
                <span><strong>💡 Butuh contoh surat resmi?</strong> Disediakan format Surat Permohonan & Surat Kuasa domain .sch.id yang siap diedit & disalin di bagian lampiran bawah.</span>
                <a href="#lampiran-surat" style="color: #0d9488; font-weight: 800; text-decoration: none; background: #ffffff; padding: 3px 10px; border-radius: 4px; border: 1px solid #99f6e4; font-size: 11px;">Lihat Contoh Surat &darr;</a>
            </div>
        </div>
    </div>

    <!-- Tahap 2 -->
    <div class="step-card">
        <div class="step-header">
            <div class="step-num">2</div>
            <div class="step-title">Penentuan & Verifikasi Nama Domain</div>
        </div>
        <div class="step-body" style="text-align: justify; text-justify: inter-word;">
            <p>
                Silakan tentukan nama domain website/aplikasi yang diinginkan (contoh: <em>yayasanrabbani.sch.id</em>, <em>smpitishumpbm.sch.id</em>, atau <em>namabisnis.com</em>), serta siapkan 1-2 nama alternatif jika domain utama sudah terpakai.
            </p>
            <p>
                Tim kami akan melakukan pengecekan ketersediaan domain (WHOIS check). Jika nama tersebut tersedia, domain akan langsung didaftarkan resmi menggunakan dokumen legalitas instansi Anda dan dikonfigurasi ke Cloud Server / Hosting berkecepatan tinggi dengan sertifikat keamanan SSL 256-bit.
            </p>
        </div>
    </div>

    <!-- Tahap 3 -->
    <div class="step-card">
        <div class="step-header">
            <div class="step-num">3</div>
            <div class="step-title">Mekanisme Pembayaran Uang Muka (Down Payment 50%)</div>
        </div>
        <div class="step-body" style="text-align: justify; text-justify: inter-word;">
            <p>
                Untuk memulai proses pengerjaan (termasuk sewa domain resmi, sewa cloud hosting/server, instalasi SSL, konfigurasi database, lisensi komponen, dan alokasi tim developer), klien membayarkan Down Payment (DP) sebesar <strong>50%</strong> dari total nilai tagihan / kesepakatan penawaran.
            </p>
            <p>
                Klien akan menerima <strong>Invoice Resmi {$companyLegal}</strong> berstatus "PARTIAL" yang dilengkapi QR Code validasi digital. Bukti transfer mohon dikonfirmasikan melalui WhatsApp ke <strong>{$formattedPhone}</strong>.
            </p>
        </div>
    </div>

    <!-- Tahap 4 -->
    <div class="step-card">
        <div class="step-header">
            <div class="step-num">4</div>
            <div class="step-title">Pengiriman Materi, Aset Visual, Foto, dan Dokumentasi</div>
        </div>
        <div class="step-body" style="text-align: justify; text-justify: inter-word;">
            <p>
                Setelah pembayaran DP diselesaikan, klien dapat mengirimkan bahan atau materi untuk diinput ke dalam website / aplikasi (dapat dikirim via WhatsApp, Email, atau tautan Google Drive), meliputi:
            </p>
            <ul class="step-bullets">
                <li><strong>Logo Resmi Institusi / Perusahaan:</strong> Kualitas resolusi tinggi (format PNG transparan, SVG, atau Vector).</li>
                <li><strong>Profil Lengkap:</strong> Visi, Misi, Sejarah Singkat, Struktur Organisasi, serta Sambutan Pimpinan / Kepala Instansi.</li>
                <li><strong>Foto & Dokumentasi Kegiatan:</strong> Foto gedung kantor/kampus/sekolah, sarana prasarana, fasilitas penunjang, kegiatan operasional/belajar mengajar, serta prestasi.</li>
                <li><strong>Data Kontak Resmi:</strong> Alamat lengkap, nomor telepon, nomor WhatsApp resmi, email institusi, tautan media sosial, serta titik lokasi Google Maps.</li>
                <li><strong>(Opsional) Referensi & Preferensi Khusus:</strong> Tautan referensi website yang disukai dari segi tata letak, warna, atau fitur khusus yang diinginkan.</li>
            </ul>
        </div>
    </div>

    <!-- Tahap 5 -->
    <div class="step-card">
        <div class="step-header">
            <div class="step-num">5</div>
            <div class="step-title">Proses Pengerjaan, Lisensi Theme/Widget Premium & Review (Revisi)</div>
        </div>
        <div class="step-body" style="text-align: justify; text-justify: inter-word;">
            <p>
                Tim kami akan mendesain UI/UX modern, merancang arsitektur sistem responsif (ramah smartphone & desktop), serta menginstal Lisensi Theme & Widget/Plugin Premium berbayar.
            </p>
            <p>
                <strong>Estimasi Waktu Pengerjaan:</strong> 7 - 14 hari kerja setelah bahan-bahan yang dibutuhkan dikirimkan lengkap oleh klien.
            </p>
            <p>
                <strong>Sesi Review & Garansi Revisi:</strong> Klien diberikan tautan live staging untuk memeriksa dan mencoba website secara langsung. Klien berhak mengajukan penyesuaian konten dan tampilan hingga disetujui (sesuai ruang lingkup kesepakatan awal) sebelum situs diluncurkan secara publik.
            </p>
        </div>
    </div>

    <!-- Tahap 6 -->
    <div class="step-card">
        <div class="step-header">
            <div class="step-num">6</div>
            <div class="step-title">Pelunasan 50%, Serah Terima (Handover) & Garansi Maintenance 1 Tahun</div>
        </div>
        <div class="step-body" style="text-align: justify; text-justify: inter-word;">
            <p>
                Setelah website selesai dikerjakan, direview, dan dinyatakan tuntas/disetujui oleh klien, klien melakukan pembayaran pelunasan sisa tagihan sebesar <strong>50%</strong>. Invoice resmi akan diperbarui statusnya menjadi <strong>LUNAS (PAID)</strong>.
            </p>
            <p>
                <strong>Serah Terima Hak Akses Penuh:</strong> Klien akan menerima seluruh kredensial akses (Akun Administrator CMS, akses email resmi domain, panduan operasional berupa video atau buku manual).
            </p>
            <p>
                <strong>Layanan Maintenance & Garansi Resmi 1 Tahun Dimulai:</strong> Mencakup dukungan teknis jika terjadi kendala server/domain, pembaruan keamanan sistem, backup berkala, serta konsultasi teknis gratis selama 1 tahun penuh.
            </p>
        </div>
    </div>

</div>

<!-- LAMPIRAN CONTOH FORMAT: SURAT PERMOHONAN & SURAT KUASA DOMAIN (.SCH.ID / LEMBAGA) -->
<div class="lampiran-section" id="lampiran-surat">
    <div class="lampiran-badge">
        <span>📄 LAMPIRAN RESMI DOKUMEN</span>
    </div>
    <div class="lampiran-title">Contoh Format Surat Permohonan & Surat Kuasa Domain (.sch.id)</div>
    <div class="lampiran-desc">
        Format standar yang disyaratkan oleh PANDI (Pengelola Nama Domain Internet Indonesia) untuk pendaftaran nama domain institusi sekolah / madrasah / pesantren.
    </div>

    <!-- Box Petunjuk & Keterangan Pengisian -->
    <div class="lampiran-notes-box">
        <div class="notes-title">📌 KETERANGAN & PANDUAN PENGISIAN:</div>
        <ol>
            <li>Silakan edit dan sesuaikan data di dalam tanda kurung siku <span class="letter-field">[ ... ]</span> dengan identitas resmi sekolah/institusi Anda.</li>
            <li>Surat wajib dicetak menggunakan <strong>KOP Resmi Sekolah</strong>, ditandatangani oleh Kepala Sekolah / Pejabat berwenang, dan <strong>dibubuhi cap stempel basah sekolah</strong>.</li>
            <li>Khusus untuk surat kuasa, lampirkan <strong>scan/foto KTP Kepala Sekolah</strong> dan <strong>KTP penerima kuasa</strong> yang masih berlaku.</li>
        </ol>
    </div>

    <div class="letters-grid">

        <!-- Contoh Surat 1: Permohonan Domain sch.id -->
        <div class="letter-card">
            <div class="letter-card-toolbar" contenteditable="false">
                <div class="letter-card-title">
                    <span>1. Contoh Surat Permohonan Pendaftaran Domain .sch.id</span>
                </div>
                <button type="button" onclick="copyLetterTemplate('rawLetterPermohonan', 'Format Surat Permohonan berhasil disalin ke clipboard!')" class="btn-copy-letter">
                    📋 <span class="label-desktop">Salin Teks Format Surat</span><span class="label-mobile">Salin Format</span>
                </button>
            </div>

            <div class="letter-paper">
                <div class="letter-kop-simulated">
                    <div class="kop-text-main">KOP SURAT RESMI SEKOLAH</div>
                    <div class="kop-text-sub">Alamat Lengkap Sekolah &bull; Telepon: (0711) xxxxxx &bull; Email: sekolah@domain.sch.id &bull; NPSN: xxxxxxxx</div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px; flex-wrap: wrap;">
                    <div style="line-height: 1.5;">
                        <div><strong>Nomor</strong> : <span class="letter-field">420/123/SMP-BTD/2026</span></div>
                        <div><strong>Hal</strong> : Permohonan Pendaftaran Domain sch.id</div>
                        <div><strong>Lampiran</strong> : 1 berkas</div>
                    </div>
                    <div style="text-align: right; line-height: 1.5;">
                        <span class="letter-field">Palembang, 23 September 2026</span>
                    </div>
                </div>

                <div style="margin-bottom: 12px; line-height: 1.5;">
                    <div>Kepada Yth.</div>
                    <div><strong>PANDI – Pengelola Nama Domain Internet Indonesia</strong></div>
                    <div>Di Gedung Arthaloka Lantai 11, Jalan Jenderal Sudirman No. 2, Jakarta Pusat</div>
                </div>

                <div style="margin-bottom: 10px;">
                    Dengan Hormat,
                </div>

                <div style="margin-bottom: 10px;">
                    Yang bertanda tangan di bawah ini:
                </div>

                <table style="margin-left: 12px; margin-bottom: 12px; border-collapse: collapse; font-size: 11.5px;">
                    <tr>
                        <td style="width: 90px; padding: 2px 0;"><strong>Nama</strong></td>
                        <td style="width: 15px; padding: 2px 0;">:</td>
                        <td style="padding: 2px 0;"><span class="letter-field">Drs. H. Ahmad Fauzi, M.Pd.</span></td>
                    </tr>
                    <tr>
                        <td style="padding: 2px 0;"><strong>NIP</strong></td>
                        <td style="padding: 2px 0;">:</td>
                        <td style="padding: 2px 0;"><span class="letter-field">19750512 200003 1 002</span> <em>(atau - jika sekolah swasta)</em></td>
                    </tr>
                    <tr>
                        <td style="padding: 2px 0;"><strong>Jabatan</strong></td>
                        <td style="padding: 2px 0;">:</td>
                        <td style="padding: 2px 0;">Kepala Sekolah <span class="letter-field">SMP Negeri 1 Unggulan</span></td>
                    </tr>
                </table>

                <p style="margin-bottom: 10px; text-align: justify; text-justify: inter-word;">
                    Bermaksud mengajukan permohonan pendaftaran domain <strong class="letter-field">smpn1unggulan.sch.id</strong> untuk keperluan pembuatan dan pengelolaan website resmi sekolah <span class="letter-field">SMP Negeri 1 Unggulan Kota Palembang</span>, sebagai persyaratan terlampir.
                </p>

                <p style="margin-bottom: 16px; text-align: justify; text-justify: inter-word;">
                    Demikian permohonan ini kami sampaikan, atas kerja sama dan terkabulnya permohonan ini, kami sampaikan terima kasih.
                </p>

                <div class="letter-sign-block">
                    <div class="letter-sign-inner">
                        <div>Hormat Kami,</div>
                        <div>Kepala Sekolah <span class="letter-field">SMP Negeri 1 Unggulan</span></div>
                        <div class="letter-sign-space">
                            (Tanda Tangan & Cap Stempel Basah Sekolah)
                        </div>
                        <div><strong class="letter-field">Drs. H. Ahmad Fauzi, M.Pd.</strong></div>
                        <div>NIP. <span class="letter-field">19750512 200003 1 002</span></div>
                    </div>
                </div>
            </div>

            <!-- Hidden Plaintext for Copying -->
            <textarea id="rawLetterPermohonan" style="display:none;">KOP SURAT RESMI SEKOLAH
Alamat Lengkap Sekolah, Telepon, Email, Website Resmi
========================================================================

Nomor    : [Nomor Surat dari Sekolah]               [Kota], [Tanggal Bulan Tahun]
Hal      : Permohonan Pendaftaran Domain sch.id
Lampiran : 1 berkas

Kepada Yth.
PANDI – Pengelola Nama Domain Internet Indonesia
Di Gedung Arthaloka Lantai 11, Jalan Jenderal Sudirman No. 2, Jakarta Pusat

Dengan Hormat, 

Yang bertanda tangan di bawah ini:
Nama    : [Nama Kepala Sekolah]
NIP     : [NIP Kepala Sekolah / - jika non-PNS]
Jabatan : Kepala Sekolah [Nama Sekolah]

Bermaksud mengajukan permohonan pendaftaran domain [namadomain.sch.id] untuk keperluan pembuatan website sekolah [Nama Sekolah] [Nama Kota], sebagai persyaratan terlampir.

Demikian permohonan ini kami sampaikan, atas kerja sama dan terkabulnya permohonan ini, kami sampaikan terima kasih.


Hormat Kami,
Kepala Sekolah [Nama Sekolah]


(Tanda Tangan & Cap Stempel Basah Sekolah)


[Nama Lengkap Kepala Sekolah]
NIP. [NIP Kepala Sekolah]</textarea>
        </div>

        <!-- Contoh Surat 2: Surat Kuasa Pendaftaran & Pengelolaan Domain -->
        <div class="letter-card">
            <div class="letter-card-toolbar" contenteditable="false">
                <div class="letter-card-title">
                    <span>2. Contoh Surat Kuasa Pendaftaran & Pengelolaan Domain .sch.id</span>
                </div>
                <button type="button" onclick="copyLetterTemplate('rawLetterKuasa', 'Format Surat Kuasa berhasil disalin ke clipboard!')" class="btn-copy-letter">
                    📋 <span class="label-desktop">Salin Teks Format Surat Kuasa</span><span class="label-mobile">Salin Format</span>
                </button>
            </div>

            <div class="letter-paper">
                <div class="letter-kop-simulated">
                    <div class="kop-text-main">KOP SURAT RESMI SEKOLAH</div>
                    <div class="kop-text-sub">Alamat Lengkap Sekolah &bull; Telepon: (0711) xxxxxx &bull; Email: sekolah@domain.sch.id &bull; NPSN: xxxxxxxx</div>
                </div>

                <div style="text-align: center; margin-bottom: 14px;">
                    <div style="font-size: 13.5px; font-weight: 900; letter-spacing: 0.5px; text-decoration: underline;">SURAT KUASA</div>
                    <div style="font-size: 11px; color: #475569;">NOMOR: <span class="letter-field">420/124/SK-SMP/2026</span></div>
                </div>

                <div style="margin-bottom: 12px; line-height: 1.5;">
                    <div>Kepada Yth.</div>
                    <div><strong>PANDI – Pengelola Nama Domain Internet Indonesia</strong></div>
                    <div>Di Gedung Arthaloka Lantai 11, Jalan Jenderal Sudirman No. 2, Jakarta Pusat</div>
                </div>

                <div style="margin-bottom: 10px;">
                    Dengan Hormat,
                </div>

                <div style="margin-bottom: 10px;">
                    Yang bertanda tangan di bawah ini:
                </div>

                <table style="margin-left: 12px; margin-bottom: 10px; border-collapse: collapse; font-size: 11.5px;">
                    <tr>
                        <td style="width: 90px; padding: 2px 0;"><strong>Nama</strong></td>
                        <td style="width: 15px; padding: 2px 0;">:</td>
                        <td style="padding: 2px 0;"><span class="letter-field">Drs. H. Ahmad Fauzi, M.Pd.</span></td>
                    </tr>
                    <tr>
                        <td style="padding: 2px 0;"><strong>NIP</strong></td>
                        <td style="padding: 2px 0;">:</td>
                        <td style="padding: 2px 0;"><span class="letter-field">19750512 200003 1 002</span> <em>(atau - jika sekolah swasta)</em></td>
                    </tr>
                    <tr>
                        <td style="padding: 2px 0;"><strong>Jabatan</strong></td>
                        <td style="padding: 2px 0;">:</td>
                        <td style="padding: 2px 0;">Kepala Sekolah <span class="letter-field">SMP Negeri 1 Unggulan</span></td>
                    </tr>
                </table>

                <div style="margin-bottom: 10px;">
                    Dengan ini memberi kuasa penuh kepada:
                </div>

                <table style="margin-left: 12px; margin-bottom: 12px; border-collapse: collapse; font-size: 11.5px;">
                    <tr>
                        <td style="width: 90px; padding: 2px 0;"><strong>Nama</strong></td>
                        <td style="width: 15px; padding: 2px 0;">:</td>
                        <td style="padding: 2px 0;"><span class="letter-field">Septa Ryan Hidayat ({$companyLegal})</span></td>
                    </tr>
                    <tr>
                        <td style="padding: 2px 0;"><strong>No. KTP</strong></td>
                        <td style="padding: 2px 0;">:</td>
                        <td style="padding: 2px 0;"><span class="letter-field">16710xxxxxxxxxxx</span></td>
                    </tr>
                </table>

                <p style="margin-bottom: 10px; text-align: justify; text-justify: inter-word;">
                    Sebagai penanggung jawab untuk pendaftaran, konfigurasi DNS/Server, dan pengelolaan domain <strong class="letter-field">smpn1unggulan.sch.id</strong> untuk keperluan pembuatan website sekolah <span class="letter-field">SMP Negeri 1 Unggulan Kota Palembang</span>.
                </p>

                <p style="margin-bottom: 16px; text-align: justify; text-justify: inter-word;">
                    Demikian surat kuasa ini kami buat dengan sebenarnya, atas kerja samanya, kami sampaikan terima kasih.
                </p>

                <div class="letter-sign-block">
                    <div class="letter-sign-inner">
                        <div><span class="letter-field">Palembang, 23 September 2026</span></div>
                        <div>Kepala Sekolah <span class="letter-field">SMP Negeri 1 Unggulan</span></div>
                        <div class="letter-sign-space">
                            (Tanda Tangan & Cap Stempel Basah Sekolah)
                        </div>
                        <div><strong class="letter-field">Drs. H. Ahmad Fauzi, M.Pd.</strong></div>
                        <div>NIP. <span class="letter-field">19750512 200003 1 002</span></div>
                    </div>
                </div>
            </div>

            <!-- Hidden Plaintext for Copying -->
            <textarea id="rawLetterKuasa" style="display:none;">KOP SURAT RESMI SEKOLAH
Alamat Lengkap Sekolah, Telepon, Email, Website Resmi
========================================================================

SURAT KUASA
NO: [Nomor Surat Kuasa dari Sekolah]

Kepada Yth.
PANDI – Pengelola Nama Domain Internet Indonesia
Di Gedung Arthaloka Lantai 11, Jalan Jenderal Sudirman No. 2, Jakarta Pusat

Dengan Hormat, 

Yang bertanda tangan di bawah ini:
Nama    : [Nama Kepala Sekolah]
NIP     : [NIP Kepala Sekolah / - jika non-PNS]
Jabatan : Kepala Sekolah [Nama Sekolah]

Dengan ini memberi kuasa kepada:
Nama    : [Nama yang Diberi Kuasa / Septa Ryan Hidayat - Tim {$companyLegal}]
No KTP  : [Nomor KTP yang Diberi Kuasa]

Sebagai penanggung jawab untuk pendaftaran dan pengelolaan domain [namadomain.sch.id] untuk keperluan pembuatan website sekolah [Nama Sekolah] [Nama Kota].

Demikian permohonan ini kami sampaikan, atas kerja samanya, kami sampaikan terima kasih.


[Kota], [Tanggal Bulan Tahun]
Kepala Sekolah [Nama Sekolah]


(Tanda Tangan & Cap Stempel Basah Sekolah)


[Nama Lengkap Kepala Sekolah]
NIP. [NIP Kepala Sekolah]</textarea>
        </div>

    </div>
</div>
HTML;
    }
}
