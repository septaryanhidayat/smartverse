<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'title',
        'headline',
        'email',
        'phone',
        'website_1',
        'website_2',
        'github',
        'social',
        'city',
        'avatar_path',
        'about_me',
        'affiliations',
        'certifications',
        'skills',
        'stats',
        'print_config',
    ];

    protected $casts = [
        'affiliations' => 'array',
        'certifications' => 'array',
        'skills' => 'array',
        'stats' => 'array',
        'print_config' => 'array',
    ];

    public function activities()
    {
        return $this->hasMany(CvActivity::class, 'cv_profile_id')->orderBy('order')->orderBy('id', 'desc');
    }

    public function speakerActivities()
    {
        return $this->activities()->where('type', 'speaker');
    }

    public function projectActivities()
    {
        return $this->activities()->where('type', 'project');
    }

    /**
     * Get or create the primary CV Profile record
     */
    public static function current(): self
    {
        $profile = self::first();
        if (!$profile) {
            $profile = self::create([
                'full_name' => 'SEPTA RYAN HIDAYAT',
                'title' => 'Direktur Beranda Teknologi Digital & Founder SmartVerseID',
                'headline' => 'CEO | Founder & Software Architect | AI & Tech Educator',
                'email' => 'ryan@berandadigital.net',
                'phone' => '0852 6777 4878',
                'website_1' => 'www.smartverse.id',
                'website_2' => 'www.berandadigital.net',
                'github' => 'github.com/septaryanhidayat',
                'social' => '@septa_ryan',
                'city' => 'Palembang, Sumatera Selatan',
                'avatar_path' => '/images/smartverse/ryan-trainer-hero.webp',
                'about_me' => "Profesional Teknologi Informasi, Software Architect, dan AI Specialist dengan fokus pada pengembangan sistem, edukasi digital, dan implementasi Artificial Intelligence (AI). Founder SmartVerse (smartverse.id) dan Direktur Utama CV. Beranda Teknologi Digital yang berhasil merancang dan meluncurkan ekosistem produk digital nasional lintas sektor (EdTech, HRIS, Media, dan AI Multimedia Forensics). Memiliki kemampuan komunikasi publik dan kepakaran edukasi teknologi yang telah dipercaya oleh berbagai institusi strategis seperti Bank Indonesia, Kementerian Komdigi, Media Indonesia, dinas pendidikan, hingga perguruan tinggi.",
                'affiliations' => [
                    [
                        'role' => 'Direktur Utama (CEO)',
                        'organization' => 'CV. Beranda Teknologi Digital',
                        'period' => '2018 - Sekarang',
                        'description' => 'Memimpin arah strategis, inovasi teknologi, dan operasional bisnis perusahaan. Memanajemen tim dalam siklus pengembangan perangkat lunak (SDLC) serta manajemen proyek IT yang menghadirkan solusi digital bagi sektor bisnis lokal hingga internasional.',
                    ],
                    [
                        'role' => 'Founder & Chief Architect',
                        'organization' => 'SmartVerseID (smartverse.id)',
                        'period' => '2023 - Sekarang',
                        'description' => 'Menggagas dan membangun ekosistem produk digital terpadu (umbrella brand) yang menaungi 5 lini produk SaaS unggulan: SmartEdu (ERP Sekolah Terintegrasi & RAG AI), SmartSDM (Mobile HRIS Biometrik Liveness & Anti-Mock GPS), SmartSynth (Lab Forensik Konten AI & C2PA), SmartNews (CMS Media Standar Dewan Pers), dan SmartFeed (Studio Visual AI Marketing). Merancang arsitektur monolitik modern berbasis Laravel 13, PHP 8.4, dan React Native.',
                    ],
                    [
                        'role' => 'Dewan Pakar',
                        'organization' => 'Ikatan Guru Indonesia (IGI) Kabupaten Ogan Ilir',
                        'period' => '2022 - Sekarang',
                        'description' => 'Memberikan arahan strategis, wawasan kepakaran, dan pendampingan berkelanjutan terkait implementasi teknologi informasi, inovasi coding, dan digitalisasi pendidikan bagi ekosistem pengajar di tingkat daerah hingga nasional.',
                    ],
                    [
                        'role' => 'Sekretaris',
                        'organization' => 'Yayasan Generasi Robbani Sumatera Selatan',
                        'period' => '2020 - Sekarang',
                        'description' => 'Mengelola unit sekolah dari TK s/d SMA di Kabupaten Ogan Ilir dalam perumusan kebijakan kelembagaan, transformasi digital sekolah, dan tata kelola organisasi.',
                    ],
                ],
                'certifications' => [
                    [
                        'name' => 'Microsoft Certified: Azure AI Fundamentals',
                        'issuer' => 'Microsoft',
                        'year' => '2024',
                        'description' => 'Keahlian komprehensif dalam merancang dan mengimplementasikan beban kerja Artificial Intelligence (AI) dan Machine Learning pada komputasi awan Microsoft Azure.',
                    ],
                    [
                        'name' => 'Google Developer: Cloud Skill Badge - Machine Learning & Web Technologies',
                        'issuer' => 'Google Cloud',
                        'year' => '2024',
                        'description' => 'Kompetensi teknis dalam memadukan teknologi web modern dengan pemrosesan Machine Learning untuk aplikasi yang skalabel.',
                    ],
                    [
                        'name' => 'Red Hat Training & Certification: Enterprise Application Development & IT Infrastructure',
                        'issuer' => 'Red Hat',
                        'year' => '2023',
                        'description' => 'Lisensi standar industri untuk pengembangan aplikasi skala enterprise dan manajemen infrastruktur IT berbasis open-source.',
                    ],
                    [
                        'name' => 'Amazon Web Services (AWS) Certified Developer - Associate / Machine Learning',
                        'issuer' => 'Amazon Web Services',
                        'year' => '2024',
                        'description' => 'Kapabilitas dalam merancang, membangun, dan memelihara aplikasi cerdas berbasis cloud di ekosistem AWS (serverless, scalable architectures, dan integrasi ML).',
                    ],
                    [
                        'name' => 'Cybersecurity & Secure Coding Practitioner',
                        'issuer' => 'Cybersecurity Council',
                        'year' => '2024',
                        'description' => 'Menguasai prinsip-prinsip keamanan siber esensial dan forensik digital dalam SDLC, memastikan arsitektur pertahanan yang kuat terhadap kerentanan data.',
                    ],
                    [
                        'name' => 'Flutter Certified Developer',
                        'issuer' => 'Mobile Developer Association',
                        'year' => '2023',
                        'description' => 'Kemampuan spesifik dalam pengembangan aplikasi mobile lintas platform (cross-platform) berkinerja tinggi dengan UI/UX intuitif.',
                    ],
                ],
                'skills' => [
                    [
                        'category' => 'AI & Emerging Tech',
                        'items' => ['Python', 'Prompt Engineering', 'Retrieval-Augmented Generation (RAG)', 'AI Forensics (C2PA 2.4, 2D FFT, ELA)', 'Virtual Reality (VR)', 'Augmented Reality (AR)', 'LLM Integration'],
                    ],
                    [
                        'category' => 'Software Architecture & Web',
                        'items' => ['Laravel 13', 'PHP 8.4', 'RESTful API', 'Multi-Tenancy Architecture', 'JavaScript (ES6+)', 'Tailwind CSS', 'Alpine.js', 'MySQL', 'SQLite', 'WordPress', 'Git/GitHub'],
                    ],
                    [
                        'category' => 'Mobile Development',
                        'items' => ['React Native (Expo SDK 52)', 'Flutter', 'Android Studio', 'Biometric Liveness', 'Haversine Geofencing', 'Push Notification'],
                    ],
                ],
                'stats' => [
                    'years_exp' => '8+',
                    'events_count' => '65+',
                    'alumni_count' => '3,500+',
                    'projects_count' => '40+',
                ],
                'print_config' => [
                    'show_flyers_appendix' => true,
                    'show_contact_qr' => true,
                    'show_certifications' => true,
                    'show_projects' => true,
                    'watermark_text' => 'OFFICIAL RESUME - SEPTA RYAN HIDAYAT',
                ],
            ]);
        }

        return $profile;
    }
}
