<?php

if (!function_exists('app') || !app()) {
    require_once __DIR__ . '/../../vendor/autoload.php';
    $app = require __DIR__ . '/../../bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->bootstrap();
}

use App\Models\Category;
use App\Models\Project;
use App\Models\Setting;

// Ensure Categories exist
$catWeb = Category::firstOrCreate(['slug' => 'website-enterprise'], [
    'name' => 'Website Enterprise',
    'type' => 'project'
]);

$catMobile = Category::firstOrCreate(['slug' => 'aplikasi-mobile'], [
    'name' => 'Aplikasi Mobile',
    'type' => 'project'
]);

$catSistem = Category::firstOrCreate(['slug' => 'sistem-informasi'], [
    'name' => 'Sistem Informasi',
    'type' => 'project'
]);

// Update settings with authentic company profile data
Setting::updateOrCreate(['key' => 'company_legal_name'], [
    'key' => 'company_legal_name',
    'value' => 'CV. Beranda Teknologi Digital',
    'group' => 'general',
    'label' => 'Nama Badan Usaha',
    'type' => 'text'
]);

Setting::updateOrCreate(['key' => 'company_ahu'], [
    'key' => 'company_ahu',
    'value' => 'AHU-0003819-AH.01.14 Tahun 2022',
    'group' => 'general',
    'label' => 'SK Kemenkumham',
    'type' => 'text'
]);

Setting::updateOrCreate(['key' => 'company_npwp'], [
    'key' => 'company_npwp',
    'value' => '63.100.018.9-312.000',
    'group' => 'general',
    'label' => 'NPWP Perusahaan',
    'type' => 'text'
]);

Setting::updateOrCreate(['key' => 'company_notaris'], [
    'key' => 'company_notaris',
    'value' => 'Juwairiyah Handayani, S.H., M.Kn (Salinan Akta No. 01 Tanggal 29 Desember 2021)',
    'group' => 'general',
    'label' => 'Notaris Pendirian',
    'type' => 'text'
]);

Setting::updateOrCreate(['key' => 'company_lkpp_url'], [
    'key' => 'company_lkpp_url',
    'value' => 'https://e-katalog.lkpp.go.id/katalog/produk/detail/48939397?type=regency',
    'group' => 'general',
    'label' => 'URL E-Katalog LKPP RI',
    'type' => 'text'
]);

Setting::updateOrCreate(['key' => 'contact_phone_wa_profile'], [
    'key' => 'contact_phone_wa_profile',
    'value' => '0896 9524 9089',
    'group' => 'contact',
    'label' => 'WhatsApp Resmi Profile',
    'type' => 'text'
]);

Setting::updateOrCreate(['key' => 'contact_address'], [
    'key' => 'contact_address',
    'value' => 'Jalan Sarjana Kel. Timbangan Blok A No. 15, Indralaya Utara, Kab. Ogan Ilir, Sumatera Selatan',
    'group' => 'contact',
    'label' => 'Alamat Kantor Resmi',
    'type' => 'textarea'
]);

// Populate Authentic Projects from BTD PDF
$projectsData = [
    [
        'title' => 'Website SMAIT Ishlahul Ummah Prabumulih',
        'slug' => 'website-smait-ishlahul-ummah-prabumulih',
        'category_id' => $catWeb->id,
        'summary' => 'Website profil institusi pendidikan Islam terpadu dengan portal berita sekolah, data guru berprestasi, dan agenda kegiatan terpadu.',
        'challenge' => 'Kebutuhan media informasi resmi sekolah yang kredibel untuk publikasi prestasi dan pengumuman bagi orang tua siswa.',
        'solution' => 'Beranda Digital merancang website responsif dan cepat dengan dashboard publikasi berita dan integrasi media sosial sekolah.',
        'features' => [
            'Profil sekolah lengkap & struktur tenaga pengajar',
            'Portal publikasi berita, artikel, dan galeri kegiatan',
            'Desain modern, mobile-friendly, dan teroptimasi SEO'
        ],
        'app_type' => 'web',
        'status_badge' => '🟢 Terimplementasi',
        'tech_stack' => ['WordPress / Laravel', 'PHP', 'Tailwind CSS', 'MySQL'],
        'client_name' => 'SMAIT Ishlahul Ummah Prabumulih',
        'project_url' => 'https://berandadigital.net',
        'thumbnail' => '/images/products/enterprise-web-mockup.jpg',
        'gallery' => [
            [
                'url' => '/images/products/enterprise-web-mockup.jpg',
                'title' => 'Halaman Depan & Profil SMAIT Ishlahul Ummah',
                'type' => 'web',
                'caption' => 'Antarmuka profil sekolah modern dan pengumuman siswa'
            ],
            [
                'url' => '/images/portofolio-web-1.webp',
                'title' => 'Tata Letak Responsif & Berita',
                'type' => 'web',
                'caption' => 'Katalog pengumuman agenda dan artikel guru'
            ]
        ],
        'is_featured' => false,
        'order' => 5,
    ],
    [
        'title' => 'Website Dompet Sosial Robbani Peduli (DSRP)',
        'slug' => 'website-dompet-sosial-robbani-peduli',
        'category_id' => $catWeb->id,
        'summary' => 'Portal filantropi dan lembaga amil zakat untuk penyaluran bantuan, donasi online, dan laporan transparansi program sosial.',
        'challenge' => 'Memfasilitasi donatur untuk menyalurkan infaq, shadaqah, dan zakat secara digital dengan transparansi rekap dana.',
        'solution' => 'Pengembangan portal donasi terintegrasi dengan penghitungan kalkulator zakat dan laporan audit bantuan.',
        'features' => [
            'Kalkulator zakat & kanal donasi program kemanusiaan',
            'Laporan real-time perolehan dana & transparansi penyaluran',
            'Integrasi notifikasi konfirmasi donasi via WhatsApp'
        ],
        'app_type' => 'web',
        'status_badge' => '🟢 Terimplementasi',
        'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'Tailwind CSS'],
        'client_name' => 'Dompet Sosial Robbani Peduli (DSRP)',
        'project_url' => 'https://berandadigital.net',
        'thumbnail' => '/images/portofolio-web-1.webp',
        'gallery' => [
            [
                'url' => '/images/portofolio-web-1.webp',
                'title' => 'Portal Program Donasi DSRP',
                'type' => 'web',
                'caption' => 'Tampilan kampanye program peduli sosial dan zakat'
            ]
        ],
        'is_featured' => false,
        'order' => 6,
    ],
    [
        'title' => 'Website Toko Online robbanimart.com',
        'slug' => 'website-toko-online-robbanimart',
        'category_id' => $catWeb->id,
        'summary' => 'Platform toko online e-commerce minimarket syariah untuk penyediaan produk halal, kebutuhan harian, dan sembako terjangkau.',
        'challenge' => 'Digitalisasi katalog penjualan toko fisik agar anggota koperasi dan masyarakat dapat berbelanja secara daring.',
        'solution' => 'Website e-commerce katalog produk dengan sistem keranjang belanja praktis dan konfirmasi pesanan via WhatsApp.',
        'features' => [
            'Katalog produk halal terorganisir per kategori',
            'Sistem keranjang belanja & hitung ongkos kirim instan',
            'Checkout cepat terhubung langsung ke kasir WhatsApp'
        ],
        'app_type' => 'web',
        'status_badge' => '🟢 Terimplementasi',
        'tech_stack' => ['Laravel', 'MySQL', 'Tailwind CSS', 'WhatsApp API'],
        'client_name' => 'Koperasi Konsumen Pegawai Robbani',
        'project_url' => 'https://berandadigital.net',
        'thumbnail' => '/images/portofolio-web-1.webp',
        'gallery' => [
            [
                'url' => '/images/portofolio-web-1.webp',
                'title' => 'Katalog Produk Robbanimart',
                'type' => 'web',
                'caption' => 'Etalase produk halal dan sembako online'
            ]
        ],
        'is_featured' => false,
        'order' => 7,
    ],
    [
        'title' => 'Website PPDB SIT As Salaam Jayapura Papua',
        'slug' => 'website-ppdb-sit-as-salaam-jayapura-papua',
        'category_id' => $catWeb->id,
        'summary' => 'Sistem portal pendaftaran peserta didik baru (PPDB Online) multi-jenjang dari PAUD IT, SD IT, hingga SMP IT As Salaam Boarding School di Jayapura, Papua.',
        'challenge' => 'Pendaftaran calon siswa baru dari berbagai distrik di Papua membutuhkan sistem online yang mudah diakses tanpa kendala jaringan.',
        'solution' => 'Aplikasi web PPDB mandiri dengan alur bertahap, upload berkas persyaratan, dan cetak bukti registrasi PDF otomatis.',
        'features' => [
            'Multi-jenjang: PAUD IT, SD IT, dan SMP IT Boarding School',
            'Pendaftaran gelombang online dengan verifikasi administrasi',
            'Cetak nomor ujian dan kartu pendaftaran resmi ber-barcode'
        ],
        'app_type' => 'web',
        'status_badge' => '🟢 Terimplementasi',
        'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'PDF Engine'],
        'client_name' => 'Yayasan As-Salam Papua (Jayapura)',
        'project_url' => 'https://berandadigital.net',
        'thumbnail' => '/images/ppdb.png',
        'gallery' => [
            [
                'url' => '/images/ppdb.png',
                'title' => 'Portal Pendaftaran PPDB SIT As-Salaam Papua',
                'type' => 'web',
                'caption' => 'Pilihan jenjang PAUD, SD, dan SMP Boarding School Jayapura'
            ],
            [
                'url' => '/images/ss-asalam.png',
                'title' => 'Dashboard Verifikasi Berkas Calon Siswa',
                'type' => 'web',
                'caption' => 'Manajemen data pendaftaran panitia PPDB'
            ]
        ],
        'is_featured' => false,
        'order' => 8,
    ],
    [
        'title' => 'Website Kampus Sehat Universitas Sriwijaya',
        'slug' => 'website-kampus-sehat-universitas-sriwijaya',
        'category_id' => $catWeb->id,
        'summary' => 'Portal program edukasi kesehatan kampus dan inisiatif Germas bagi sivitas akademika Universitas Sriwijaya.',
        'challenge' => 'Sosialisasi program kesehatan, perilaku hidup sehat, dan publikasi agenda rektorat bidang kesehatan mahasiswa.',
        'solution' => 'Website portal resmi Kampus Sehat Unsri dengan sambutan rektorat, artikel gizi/kesehatan, dan info layanan klinik.',
        'features' => [
            'Sambutan pimpinan rektorat & panduan gaya hidup sehat',
            'Koleksi artikel kesehatan, video edukasi, dan webinar',
            'Direktori layanan fasilitas kesehatan kampus Unsri'
        ],
        'app_type' => 'web',
        'status_badge' => '🟢 Terimplementasi',
        'tech_stack' => ['Laravel', 'MySQL', 'Tailwind CSS'],
        'client_name' => 'Universitas Sriwijaya (Unsri)',
        'project_url' => 'https://berandadigital.net',
        'thumbnail' => '/images/portofolio-web-1.webp',
        'gallery' => [
            [
                'url' => '/images/portofolio-web-1.webp',
                'title' => 'Portal Kampus Sehat Unsri',
                'type' => 'web',
                'caption' => 'Edukasi kesehatan sivitas akademika Universitas Sriwijaya'
            ]
        ],
        'is_featured' => false,
        'order' => 9,
    ],
    [
        'title' => 'Website Ikatan Guru Indonesia (IGI) Ogan Ilir',
        'slug' => 'website-ikatan-guru-indonesia-ogan-ilir',
        'category_id' => $catWeb->id,
        'summary' => 'Portal organisasi resmi Ikatan Guru Indonesia daerah Ogan Ilir untuk pendaftaran anggota guru dan publikasi workshop peningkatan kompetensi.',
        'challenge' => 'Pendataan anggota guru di seluruh kecamatan dan penyebaran informasi sertifikasi serta pelatihan IT pendidik.',
        'solution' => 'Website organisasi guru dengan sistem pendaftaran keanggotaan, agenda seminar pendidikan, dan unduh sertifikat.',
        'features' => [
            'Pendaftaran dan validasi kartu tanda anggota (KTA) digital',
            'Informasi agenda seminar, workshop IT & pelatihan kurikulum',
            'Galeri dokumentasi kegiatan guru se-Kabupaten Ogan Ilir'
        ],
        'app_type' => 'web',
        'status_badge' => '🟢 Terimplementasi',
        'tech_stack' => ['Laravel', 'MySQL', 'Tailwind CSS'],
        'client_name' => 'IGI Ogan Ilir',
        'project_url' => 'https://berandadigital.net',
        'thumbnail' => '/images/portofolio-web-1.webp',
        'gallery' => [
            [
                'url' => '/images/portofolio-web-1.webp',
                'title' => 'Portal Informasi IGI Ogan Ilir',
                'type' => 'web',
                'caption' => 'Publikasi kegiatan guru dan workshop pendidikan'
            ]
        ],
        'is_featured' => false,
        'order' => 10,
    ],
    [
        'title' => 'Aplikasi Mobile Absensi Pegawai (Siabs BTD)',
        'slug' => 'aplikasi-mobile-absensi-pegawai-siabs',
        'category_id' => $catMobile->id,
        'summary' => 'Aplikasi mobile Android untuk pencatatan kehadiran karyawan berbasis jam kerja nyata, deteksi waktu presisi, dan rekapan kehadiran bulanan.',
        'challenge' => 'Pencatatan absensi manual sering rentan manipulasi dan menyulitkan rekapitulasi penggajian HRD.',
        'solution' => 'Aplikasi Android native/Flutter dengan tombol one-tap absen masuk & absen pulang serta dashboard rekap status bulanan.',
        'features' => [
            'Absen masuk & absen pulang cepat dalam hitungan detik',
            'Rekapitulasi bulanan: jumlah Hadir, Izin, Sakit, dan Terlambat',
            'Riwayat log absensi realtime tersinkronisasi ke database'
        ],
        'app_type' => 'mobile',
        'status_badge' => '📱 Mobile App',
        'tech_stack' => ['Flutter', 'Android Native', 'REST API', 'MySQL'],
        'client_name' => 'CV. Beranda Teknologi Digital & Mitra Bisnis',
        'project_url' => 'https://berandadigital.net',
        'thumbnail' => '/images/products/enterprise-web-mockup.jpg',
        'gallery' => [
            [
                'url' => '/images/products/enterprise-web-mockup.jpg',
                'title' => 'Antarmuka Siabs Mobile App',
                'type' => 'mobile',
                'caption' => 'Tampilan tombol absen masuk, absen pulang, dan indikator kehadiran'
            ]
        ],
        'is_featured' => false,
        'order' => 11,
    ],
    [
        'title' => 'Aplikasi Mobile ARSI App (Robbani Student Info)',
        'slug' => 'aplikasi-mobile-arsi-student-information',
        'category_id' => $catMobile->id,
        'summary' => 'Aplikasi mobile Android untuk portal informasi siswa, jadwal kelas, tabungan siswa, dan pembayaran SPP sekolah secara digital.',
        'challenge' => 'Orang tua siswa kesulitan memantau perkembangan nilai, absensi, dan tagihan SPP anak di sekolah.',
        'solution' => 'Aplikasi mobile terpadu dengan autentikasi akun wali murid, notifikasi tagihan SPP, dan rincian tabungan sekolah.',
        'features' => [
            'Informasi jadwal pelajaran & kalender akademik terpadu',
            'Cek status pembayaran SPP bulanan & riwayat transaksi',
            'Modul pemantauan saldo tabungan siswa di sekolah'
        ],
        'app_type' => 'mobile',
        'status_badge' => '📱 Mobile App',
        'tech_stack' => ['Flutter / Android', 'PHP Backend', 'MySQL'],
        'client_name' => 'SIT Robbani Ogan Ilir',
        'project_url' => 'https://berandadigital.net',
        'thumbnail' => '/btd/sekolah.png',
        'gallery' => [
            [
                'url' => '/btd/sekolah.png',
                'title' => 'Tampilan Menu Utama ARSI App',
                'type' => 'mobile',
                'caption' => 'Menu pembayaran SPP, tabungan, jadwal dan presensi siswa'
            ]
        ],
        'is_featured' => false,
        'order' => 12,
    ],
    [
        'title' => 'Aplikasi Mobile Pembelajaran Penjas (Bola Voli)',
        'slug' => 'aplikasi-mobile-pembelajaran-penjas-voli',
        'category_id' => $catMobile->id,
        'summary' => 'Aplikasi mobile Android interaktif untuk media pembelajaran dan instrumen pengukuran teknik passing atas & passing bawah olahraga bola voli.',
        'challenge' => 'Pembelajaran gerak dan tes kemampuan olahraga membutuhkan panduan visual serta instrumen hitung skor yang baku.',
        'solution' => 'Aplikasi Android berbasis multimedia interaktif dengan modul panduan gerakan, petunjuk pengukuran, dan kalkulator skor tes.',
        'features' => [
            'Modul instruksi teknik passing atas dan passing bawah voli',
            'Instrumen tes digital dengan penghitungan skor terstandar',
            'Buku pedoman guru dan instrumen penilaian siswa otomatis'
        ],
        'app_type' => 'mobile',
        'status_badge' => '📱 Mobile App',
        'tech_stack' => ['Android Native / Flutter', 'SQLite', 'Multimedia'],
        'client_name' => 'Dosen & Tim Penjas Universitas Sriwijaya',
        'project_url' => 'https://berandadigital.net',
        'thumbnail' => '/images/volley.png',
        'gallery' => [
            [
                'url' => '/images/volley.png',
                'title' => 'Menu Pengukuran Passing Olahraga Bola Voli',
                'type' => 'mobile',
                'caption' => 'Instrumen pengukuran passing atas dan passing bawah voli'
            ]
        ],
        'is_featured' => false,
        'order' => 13,
    ],
    [
        'title' => 'Sistem Informasi E-Klinik & Rekam Medis (EMR)',
        'slug' => 'sistem-informasi-e-klinik-rekam-medis',
        'category_id' => $catSistem->id,
        'summary' => 'Sistem informasi manajemen klinik terintegrasi untuk pendaftaran pasien online, jadwal praktek dokter, rekam medis elektronik (EMR), dan payment gateway QRIS.',
        'challenge' => 'Manajemen antrean pasien klinik dan peralihan dari rekam medis kertas menuju standar Rekam Medis Elektronik (RME) Kementerian Kesehatan.',
        'solution' => 'Sistem E-Klinik modular lengkap dengan portal pasien, integrasi rekam medis dokter, kasir apotek, dan laporan pendapatan.',
        'features' => [
            'Booking jadwal dokter online & antrean poli terpadu',
            'Rekam Medis Elektronik (EMR / RME) terstandar Kemenkes',
            'Integrasi kasir pembayaran digital QRIS, VA, dan e-wallet',
            'Laporan inventori obat apotek & analitik kunjungan pasien'
        ],
        'app_type' => 'web',
        'status_badge' => '🏥 Solusi E-Klinik',
        'tech_stack' => ['Laravel 13', 'MySQL', 'Tailwind CSS', 'Payment Gateway'],
        'client_name' => 'Fasilitas Kesehatan & Klinik Mitra',
        'project_url' => 'https://berandadigital.net',
        'thumbnail' => '/images/Portofolio-sim.webp',
        'gallery' => [
            [
                'url' => '/images/Portofolio-sim.webp',
                'title' => 'Dashboard Pelayanan Poliklinik & Rawat Inap',
                'type' => 'web',
                'caption' => 'Pilihan poli klinik, UGD, dan monitoring pasien'
            ]
        ],
        'is_featured' => false,
        'order' => 14,
    ],
    [
        'title' => 'Pengembangan Media Virtual Reality (VR) & Augmented Reality',
        'slug' => 'virtual-reality-augmented-reality-learning',
        'category_id' => $catSistem->id,
        'summary' => 'Solusi media imersif berbasis Virtual Reality (VR) dan Augmented Reality (AR) untuk simulasi praktikum, edukasi visual, dan promosi 3D interaktif.',
        'challenge' => 'Pembelajaran sains dan simulasi peralatan mahal sulit dilakukan tanpa laboratorium fisik canggih.',
        'solution' => 'Aplikasi simulasi 3D dan virtual reality yang dapat dijalankan melalui headset VR maupun smartphone.',
        'features' => [
            'Simulasi objek 3D interaktif 360 derajat',
            'Kompatibel dengan headset VR dan mobile smartphone',
            'Meningkatkan retensi pemahaman belajar hingga 80%'
        ],
        'app_type' => 'web',
        'status_badge' => '🥽 Immersive Tech',
        'tech_stack' => ['Unity 3D', 'WebXR', 'Blender', 'C#'],
        'client_name' => 'Lembaga Pendidikan & Mitra Riset',
        'project_url' => 'https://berandadigital.net',
        'thumbnail' => '/btd/VR.png',
        'gallery' => [
            [
                'url' => '/btd/VR.png',
                'title' => 'Simulasi Interaktif Virtual Reality',
                'type' => 'web',
                'caption' => 'Pengembangan konten 3D interaktif dan simulasi imersif'
            ]
        ],
        'is_featured' => false,
        'order' => 15,
    ]
];

foreach ($projectsData as $p) {
    Project::updateOrCreate(['slug' => $p['slug']], $p);
}

echo "Successfully populated " . count($projectsData) . " authentic projects and legal settings from BTD profile!\n";
echo "Total projects in database: " . Project::count() . "\n";
