<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae (CV) - {{ $profile->full_name }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Google Fonts Inter & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Outfit:wght@600;700;800;900&display=swap" rel="stylesheet">

    <style>
        /* CSS Reset & Print Variables */
        :root {
            --primary: #07153f;
            --accent: #2563eb;
            --accent-orange: #fe6000;
            --text-main: #0f172a;
            --text-muted: #475569;
            --border-color: #cbd5e1;
            --bg-card: #f8fafc;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            color: var(--text-main);
            background-color: #e2e8f0;
            line-height: 1.45;
            font-size: 11pt;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        h1, h2, h3, h4, .font-heading {
            font-family: 'Outfit', 'Inter', sans-serif;
        }

        /* Screen Wrapper */
        .screen-container {
            max-width: 210mm;
            margin: 20px auto 40px auto;
            background: #ffffff;
            padding: 16mm 18mm;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }

        /* Floating Top Toolbar for Screen */
        .floating-toolbar {
            position: sticky;
            top: 10px;
            z-index: 100;
            max-width: 210mm;
            margin: 0 auto 15px auto;
            background: #07153f;
            color: #ffffff;
            padding: 10px 18px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 10px 20px rgba(7, 21, 63, 0.25);
            font-size: 13px;
        }

        .btn-print {
            background: #2563eb;
            color: #ffffff;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 12px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.2s;
        }

        .btn-print:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        .btn-back {
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 600;
            font-size: 12px;
        }

        .btn-back:hover {
            color: #ffffff;
        }

        /* ══════════════════════════════════════════════════════════════
           OFFICIAL RESUME HEADER (KOP)
           ══════════════════════════════════════════════════════════════ */
        .cv-header {
            display: grid;
            grid-template-columns: 85px 1fr 100px;
            gap: 16px;
            align-items: center;
            border-bottom: 2.5px solid var(--primary);
            padding-bottom: 14px;
            margin-bottom: 14px;
        }

        .header-avatar {
            width: 85px;
            height: 85px;
            border-radius: 12px;
            object-fit: cover;
            border: 2px solid var(--primary);
        }

        .header-info h1 {
            font-size: 19pt;
            font-weight: 900;
            color: var(--primary);
            letter-spacing: -0.5px;
            line-height: 1.1;
            text-transform: uppercase;
        }

        .header-info .cv-title {
            font-size: 10.5pt;
            font-weight: 700;
            color: var(--accent);
            margin-top: 2px;
            line-height: 1.25;
        }

        .header-info .cv-headline {
            font-size: 9pt;
            font-weight: 600;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .header-info .cv-contact-row {
            display: flex;
            flex-wrap: wrap;
            gap: 6px 12px;
            margin-top: 6px;
            font-size: 8pt;
            color: var(--text-main);
            font-weight: 500;
        }

        .header-info .cv-contact-row span {
            display: inline-flex;
            align-items: center;
            gap: 3px;
        }

        .header-qr {
            text-align: center;
        }

        .qr-image {
            width: 78px;
            height: 78px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 2px;
            background: #fff;
        }

        .qr-label {
            font-size: 6.5pt;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            margin-top: 2px;
            display: block;
            line-height: 1.1;
        }

        /* ══════════════════════════════════════════════════════════════
           SECTIONS & TYPOGRAPHY
           ══════════════════════════════════════════════════════════════ */
        .section-block {
            margin-bottom: 14px;
            page-break-inside: avoid;
        }

        .section-title {
            font-size: 10.5pt;
            font-weight: 800;
            color: var(--primary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1.5px solid #e2e8f0;
            padding-bottom: 3px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .section-title::before {
            content: "";
            display: inline-block;
            width: 4px;
            height: 13px;
            background: var(--accent);
            border-radius: 2px;
        }

        .summary-text {
            font-size: 8.8pt;
            line-height: 1.45;
            color: var(--text-main);
            text-align: justify;
        }

        /* Items List (Leadership, Speaker, Projects) */
        .cv-item {
            margin-bottom: 7px;
            page-break-inside: avoid;
        }

        .cv-item-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            gap: 8px;
        }

        .cv-item-title {
            font-size: 9.5pt;
            font-weight: 700;
            color: var(--primary);
        }

        .cv-item-badge {
            font-size: 7.5pt;
            font-weight: 700;
            color: #ffffff;
            background: var(--primary);
            padding: 1px 6px;
            border-radius: 4px;
            white-space: nowrap;
        }

        .cv-item-meta {
            font-size: 8pt;
            color: var(--accent);
            font-weight: 600;
            margin-bottom: 2px;
        }

        .cv-item-desc {
            font-size: 8.5pt;
            color: var(--text-muted);
            line-height: 1.35;
            text-align: justify;
        }

        .cv-item-url {
            font-size: 7.5pt;
            color: var(--accent);
            font-family: monospace;
            text-decoration: none;
            display: inline-block;
            margin-top: 1px;
        }

        /* 2-Column Grid for Compact Sections */
        .grid-2col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px 14px;
        }

        /* Skills Pill Container */
        .skills-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 8px;
        }

        .skill-box {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 6px 8px;
        }

        .skill-box-title {
            font-size: 8pt;
            font-weight: 800;
            color: var(--primary);
            text-transform: uppercase;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .skill-items {
            font-size: 8pt;
            color: var(--text-main);
            line-height: 1.35;
        }

        /* Certifications List */
        .cert-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 5px 8px;
            margin-bottom: 5px;
            page-break-inside: avoid;
        }

        .cert-card-title {
            font-size: 8.8pt;
            font-weight: 700;
            color: var(--primary);
        }

        .cert-card-meta {
            font-size: 7.5pt;
            color: var(--accent);
            font-weight: 600;
        }

        .cert-card-desc {
            font-size: 7.8pt;
            color: var(--text-muted);
            line-height: 1.25;
            margin-top: 1px;
        }

        /* ══════════════════════════════════════════════════════════════
           APPENDIX: LAMPIRAN FLYER & DOKUMENTASI KEGIATAN
           ══════════════════════════════════════════════════════════════ */
        .appendix-page {
            page-break-before: always;
            margin-top: 20px;
            padding-top: 10px;
        }

        .appendix-header {
            border-bottom: 2px solid var(--primary);
            padding-bottom: 8px;
            margin-bottom: 14px;
        }

        .appendix-header h2 {
            font-size: 13pt;
            font-weight: 900;
            color: var(--primary);
            text-transform: uppercase;
        }

        .appendix-header p {
            font-size: 8.5pt;
            color: var(--text-muted);
        }

        .flyers-print-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .flyer-print-card {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            overflow: hidden;
            background: #ffffff;
            page-break-inside: avoid;
            margin-bottom: 8px;
        }

        .flyer-print-img {
            width: 100%;
            height: 145px;
            object-fit: cover;
            display: block;
            border-bottom: 1px solid var(--border-color);
        }

        .flyer-print-caption {
            padding: 6px 8px;
        }

        .flyer-print-caption .caption-tag {
            font-size: 7pt;
            font-weight: 700;
            color: var(--accent);
            text-transform: uppercase;
        }

        .flyer-print-caption .caption-title {
            font-size: 8pt;
            font-weight: 700;
            color: var(--primary);
            line-height: 1.2;
            margin-top: 1px;
        }

        /* Footer Stamp */
        .cv-footer-stamp {
            margin-top: 16px;
            padding-top: 8px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 7.5pt;
            color: var(--text-muted);
        }

        /* ══════════════════════════════════════════════════════════════
           PRINT MEDIA QUERIES (A4 EXACT)
           ══════════════════════════════════════════════════════════════ */
        @media print {
            @page {
                size: A4 portrait;
                margin: 12mm 14mm;
            }

            body {
                background: #ffffff !important;
                color: #000000 !important;
                font-size: 9pt;
            }

            .floating-toolbar {
                display: none !important;
            }

            .screen-container {
                max-width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                box-shadow: none !important;
                border-radius: 0 !important;
            }

            a {
                text-decoration: none !important;
                color: inherit !important;
            }

            .appendix-page {
                page-break-before: always !important;
            }

            .section-block {
                page-break-inside: avoid;
            }
        }
    </style>
</head>
<body>

    <!-- SCREEN TOP FLOATING TOOLBAR -->
    <div class="floating-toolbar">
        <div>
            <strong style="color: #67e8f9;">Dokumen Siap Cetak (A4 Standard)</strong>
            <span style="font-size: 11px; opacity: 0.8; margin-left: 8px;">Tips: Pilih ukuran kertas A4 &amp; centang "Background graphics" saat print.</span>
        </div>
        <div style="display: flex; align-items: center; gap: 12px;">
            <a href="{{ route('cv.show') }}" class="btn-back">&larr; Kembali ke Tampilan Web</a>
            <button onclick="window.print()" class="btn-print">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                Cetak Dokumen Sekarang (PDF)
            </button>
        </div>
    </div>

    <!-- MAIN RESUME DOCUMENT -->
    <div class="screen-container">

        <!-- ══════════════════════════════════════════════════════════════
             HEADER / KOP RESMI RESUME
             ══════════════════════════════════════════════════════════════ -->
        <header class="cv-header">
            <img src="{{ asset($profile->avatar_path ?? 'images/smartverse/ryan-trainer-hero.webp') }}" 
                 alt="{{ $profile->full_name }}" 
                 class="header-avatar" />

            <div class="header-info">
                <h1>{{ $profile->full_name }}</h1>
                <div class="cv-title">{{ $profile->title }}</div>
                <div class="cv-headline">{{ $profile->headline }}</div>

                <div class="cv-contact-row">
                    <span>✉ {{ $profile->email }}</span>
                    <span>☎ {{ $profile->phone }}</span>
                    <span>🌐 {{ $profile->website_1 }}</span>
                    <span>🏢 {{ $profile->website_2 }}</span>
                    <span>🐙 {{ $profile->github }}</span>
                    <span>📍 {{ $profile->city }}</span>
                </div>
            </div>

            @if($profile->print_config['show_contact_qr'] ?? true)
                <div class="header-qr">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&margin=2&color=000000&data={{ urlencode($docUrl) }}" 
                         alt="QR Verifikasi" 
                         class="qr-image" />
                    <span class="qr-label">Verifikasi Asli</span>
                </div>
            @endif
        </header>

        <!-- ══════════════════════════════════════════════════════════════
             SECTION 1: RINGKASAN PROFIL (ABOUT ME)
             ══════════════════════════════════════════════════════════════ -->
        <section class="section-block">
            <h2 class="section-title">Ringkasan Profil (About Me)</h2>
            <p class="summary-text">
                {{ $profile->about_me }}
            </p>
        </section>

        <!-- ══════════════════════════════════════════════════════════════
             SECTION 2: PROFESSIONAL AFFILIATION & LEADERSHIP
             ══════════════════════════════════════════════════════════════ -->
        <section class="section-block">
            <h2 class="section-title">Professional Affiliation &amp; Leadership</h2>
            <div class="grid-2col">
                @foreach($profile->affiliations ?? [] as $aff)
                    <div class="cv-item">
                        <div class="cv-item-header">
                            <span class="cv-item-title">{{ $aff['role'] ?? '' }}</span>
                            @if(!empty($aff['period']))
                                <span class="cv-item-badge">{{ $aff['period'] }}</span>
                            @endif
                        </div>
                        <div class="cv-item-meta">{{ $aff['organization'] ?? '' }}</div>
                        <div class="cv-item-desc">{{ $aff['description'] ?? '' }}</div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- ══════════════════════════════════════════════════════════════
             SECTION 3: KEYNOTE SPEAKER & EXPERT TRAINING EXPERIENCE
             ══════════════════════════════════════════════════════════════ -->
        <section class="section-block">
            <h2 class="section-title">Keynote Speaker &amp; Expert Training Experience</h2>
            @foreach($speakers as $spk)
                <div class="cv-item">
                    <div class="cv-item-header">
                        <span class="cv-item-title">• {{ $spk->title }}</span>
                        <span class="cv-item-badge">{{ $spk->year }}</span>
                    </div>
                    <div class="cv-item-meta">
                        {{ $spk->organizer ? $spk->organizer : '' }}
                        {{ $spk->location ? ' • ' . $spk->location : '' }}
                    </div>
                    <div class="cv-item-desc">{{ $spk->description }}</div>
                </div>
            @endforeach
        </section>

        <!-- ══════════════════════════════════════════════════════════════
             SECTION 4: SOFTWARE ENGINEERING & RELEVANT PROJECTS
             ══════════════════════════════════════════════════════════════ -->
        @if($profile->print_config['show_projects'] ?? true)
            <section class="section-block">
                <h2 class="section-title">Software Engineering &amp; Relevant Projects</h2>
                <div class="grid-2col">
                    @foreach($projects as $prj)
                        <div class="cv-item">
                            <div class="cv-item-header">
                                <span class="cv-item-title">{{ $prj->title }}</span>
                                <span style="font-size: 7pt; font-weight: 700; color: #475569;">{{ $prj->year }}</span>
                            </div>
                            <div class="cv-item-meta">
                                [{{ $prj->category ?? 'Software' }}] 
                                {{ $prj->organizer ? '&bull; ' . $prj->organizer : '' }}
                            </div>
                            <div class="cv-item-desc">{{ $prj->description }}</div>
                            @if($prj->url)
                                <a href="{{ $prj->url }}" class="cv-item-url">{{ preg_replace('#^https?://#', '', $prj->url) }}</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <!-- ══════════════════════════════════════════════════════════════
             SECTION 5: PROFESSIONAL CERTIFICATIONS
             ══════════════════════════════════════════════════════════════ -->
        @if($profile->print_config['show_certifications'] ?? true)
            <section class="section-block">
                <h2 class="section-title">Professional Certifications &amp; Core Competencies</h2>
                <div class="grid-2col">
                    @foreach($profile->certifications ?? [] as $cert)
                        <div class="cert-card">
                            <div class="cv-item-header">
                                <span class="cert-card-title">{{ $cert['name'] ?? '' }}</span>
                                <span class="cert-card-meta">{{ $cert['issuer'] ?? '' }} ({{ $cert['year'] ?? '' }})</span>
                            </div>
                            <div class="cert-card-desc">{{ $cert['description'] ?? '' }}</div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <!-- ══════════════════════════════════════════════════════════════
             SECTION 6: CORE TECHNICAL SKILLS
             ══════════════════════════════════════════════════════════════ -->
        <section class="section-block">
            <h2 class="section-title">Core Technical Skills</h2>
            <div class="skills-grid">
                @foreach($profile->skills ?? [] as $sk)
                    <div class="skill-box">
                        <div class="skill-box-title">{{ $sk['category'] ?? '' }}</div>
                        <div class="skill-items">
                            {{ is_array($sk['items'] ?? null) ? implode(' • ', $sk['items']) : '' }}
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- ══════════════════════════════════════════════════════════════
             SECTION 7: LAMPIRAN BUKTI FLYER & DOKUMENTASI KEGIATAN
             ══════════════════════════════════════════════════════════════ -->
        @if(($profile->print_config['show_flyers_appendix'] ?? true) && $flyersForAppendix->isNotEmpty())
            <div class="appendix-page">
                <div class="appendix-header">
                    <h2>Lampiran Bukti Dokumentasi &amp; Flyer Resmi Kegiatan</h2>
                    <p>Dokumentasi otentik kegiatan pelatihan, keynote speaker, dan sertifikasi narasumber resmi.</p>
                </div>

                <div class="flyers-print-grid">
                    @foreach($flyersForAppendix as $fl)
                        <div class="flyer-print-card">
                            <img src="{{ asset($fl->flyer_path) }}" alt="{{ $fl->title }}" class="flyer-print-img" />
                            <div class="flyer-print-caption">
                                <div class="caption-tag">{{ $fl->organizer ?? 'Kegiatan' }} &bull; {{ $fl->year }}</div>
                                <div class="caption-title">{{ $fl->title }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- DOCUMENT FOOTER STAMP -->
        <footer class="cv-footer-stamp">
            <div>
                <span>Dicetak otomatis dari portal resmi SmartVerse (smartverse.id) &bull; {{ date('d F Y') }}</span>
            </div>
            <div>
                <span>Verifikasi Dokumen: <a href="{{ $docUrl }}" style="color: #2563eb;">{{ $docUrl }}</a></span>
            </div>
        </footer>

    </div>

</body>
</html>
