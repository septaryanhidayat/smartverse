<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panduan & SOP Pemesanan Website / Aplikasi - {{ $settings['company_legal_name'] ?? ($settings['company_name'] ?? 'SmartVerse (smartverse.id)') }}</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/webp" href="{{ asset('images/smartverse/logo-smartverse.webp') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f1f5f9;
            color: #22282a;
            font-size: 12.5px;
            line-height: 1.55;
            overflow-x: hidden;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        /* Rata Penuh (Justify) & Penulisan Rapi Standar Dokumen Legal */
        .doc-page, .doc-dynamic-content {
            text-align: justify !important;
            text-justify: inter-word !important;
        }
        .doc-intro-box, 
        .step-body, 
        .step-body p, 
        .letter-paper, 
        .letter-paper p,
        .doc-dynamic-content p,
        .doc-dynamic-content div,
        .doc-dynamic-content li {
            text-align: justify !important;
            text-justify: inter-word !important;
            line-height: 1.65;
        }
        .step-bullets li {
            text-align: justify !important;
            text-justify: inter-word !important;
        }
        .letter-kop-simulated, .kop-text-main, .kop-text-sub {
            text-align: center !important;
        }
        .letter-sign-block, .letter-sign-inner {
            text-align: right !important;
        }

        .label-desktop {
            display: inline;
        }
        .label-mobile {
            display: none;
        }

        .mono {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
            font-variant-numeric: tabular-nums;
            font-feature-settings: "tnum" 1, "zero" 0;
            letter-spacing: 0.2px;
            font-weight: 700;
        }

        /* Screen Control Bar */
        .doc-screen-bar {
            background: #1e2638;
            color: white;
            padding: 12px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 4px 12px rgba(0,0,0,0.18);
        }
        .screen-bar-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .screen-bar-brand {
            font-size: 13.5px;
            font-weight: 800;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .screen-bar-tag {
            background: rgba(38, 157, 185, 0.2);
            border: 1px solid rgba(38, 157, 185, 0.5);
            color: #4cd7f5;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 2px 8px;
            border-radius: 9999px;
        }
        .screen-bar-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .btn-action {
            color: white;
            font-weight: 700;
            padding: 8px 16px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 12.5px;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            text-decoration: none;
            transition: all 0.2s;
        }
        .btn-print {
            background: linear-gradient(135deg, #269DB9 0%, #1f859d 100%);
            box-shadow: 0 2px 6px rgba(38, 157, 185, 0.35);
        }
        .btn-print:hover {
            background: linear-gradient(135deg, #1f859d 0%, #17687b 100%);
            transform: translateY(-1px);
        }
        .btn-wa {
            background: #10b981;
            color: white;
            box-shadow: 0 2px 6px rgba(16, 185, 129, 0.35);
        }
        .btn-wa:hover {
            background: #059669;
            transform: translateY(-1px);
        }
        .btn-copy {
            background: rgba(255,255,255,0.12);
            color: #e2e8f0;
            border: 1px solid rgba(255,255,255,0.2);
        }
        .btn-copy:hover {
            background: rgba(255,255,255,0.22);
            color: #ffffff;
        }
        .btn-admin {
            background: rgba(38, 157, 185, 0.25);
            color: #38bdf8;
            border: 1px solid rgba(56, 189, 248, 0.4);
        }
        .btn-admin:hover {
            background: rgba(38, 157, 185, 0.45);
        }

        /* Printable Document Sheet (A4 Proportions) */
        .doc-page {
            max-width: 840px;
            margin: 28px auto 45px auto;
            background: #ffffff;
            padding: 45px 55px 40px 55px;
            position: relative;
            border-radius: 8px;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.08), 0 8px 10px -6px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        /* Elegant Background Watermark */
        .watermark-overlay {
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .watermark-content {
            opacity: 0.038;
            transform: rotate(-25deg);
            text-align: center;
            user-select: none;
        }
        .watermark-logo {
            width: 320px;
            height: auto;
            margin-bottom: 12px;
            filter: grayscale(100%);
        }
        .watermark-text {
            font-size: 28px;
            font-weight: 900;
            letter-spacing: 5px;
            text-transform: uppercase;
            color: #0f172a;
            white-space: nowrap;
        }
        .watermark-subtext {
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #269DB9;
            margin-top: 4px;
        }

        /* Top Right Diagonal Ribbon Banner */
        .ribbon-wrapper {
            width: 140px;
            height: 140px;
            overflow: hidden;
            position: absolute;
            top: 0;
            right: 0;
            pointer-events: none;
            z-index: 20;
        }
        .ribbon {
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 2px;
            color: #ffffff;
            text-transform: uppercase;
            text-align: center;
            line-height: 28px;
            transform: rotate(45deg);
            position: relative;
            padding: 0;
            left: -4px;
            top: 26px;
            width: 185px;
            box-shadow: 0 3px 8px -2px rgba(0,0,0,0.25);
            background: linear-gradient(135deg, #269DB9 0%, #0d9488 100%);
        }

        /* Header Layout: Symmetrical Kop */
        .doc-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 24px;
            position: relative;
            z-index: 10;
        }
        .company-logo-area {
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .logo-img {
            height: 58px;
            width: auto;
            object-fit: contain;
        }
        
        /* Kop Surat Rata Kanan: Identik dengan Invoice */
        .company-meta-area {
            text-align: right;
            margin-left: auto;
            color: #555b5e;
            font-size: 12px;
            line-height: 1.5;
            max-width: 380px;
            padding-right: 15px;
        }
        .company-meta-area .company-name {
            font-size: 15.5px;
            font-weight: 800;
            color: #22282a;
            margin-bottom: 3px;
            letter-spacing: -0.2px;
            white-space: nowrap;
        }
        .company-meta-area .company-addr {
            color: #555b5e;
            font-size: 12px;
        }
        .company-meta-area .company-email {
            color: #269DB9;
            font-size: 12px;
            font-weight: 700;
            margin-top: 3px;
        }
        .company-meta-area .company-phone {
            color: #424444;
            font-size: 12px;
            font-weight: 600;
            margin-top: 1px;
        }

        /* Document Meta & Target Row (Balanced Left & Right) */
        .doc-info-row {
            display: grid;
            grid-template-columns: 1.25fr 1fr;
            gap: 24px;
            align-items: flex-start;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 2px solid #e2e8f0;
            position: relative;
            z-index: 10;
        }
        .doc-title-col h1 {
            font-size: 20px;
            font-weight: 900;
            color: #22282a;
            margin-bottom: 5px;
            letter-spacing: -0.4px;
            line-height: 1.25;
            text-transform: uppercase;
        }
        .doc-title-col h1 .highlight {
            color: #269DB9;
        }
        .doc-title-col .doc-meta-item {
            font-size: 12px;
            color: #555b5e;
            font-weight: 500;
            line-height: 1.45;
        }
        .doc-title-col .doc-meta-item span {
            color: #22282a;
            font-weight: 700;
        }
        .doc-target-col {
            font-size: 12px;
            line-height: 1.45;
            padding-left: 14px;
            border-left: 2px solid #269DB9;
        }
        .doc-target-col .title-label {
            font-size: 10px;
            font-weight: 800;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 2px;
        }
        .doc-target-col .target-badge {
            display: inline-block;
            font-size: 9.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #269DB9;
            background: #f0f9fb;
            border: 1px solid #bee3eb;
            padding: 1px 7px;
            border-radius: 4px;
            margin-bottom: 3px;
        }
        .doc-target-col .target-name {
            color: #0f172a;
            font-weight: 800;
            font-size: 13px;
        }
        .doc-target-col .target-desc {
            color: #475569;
            font-size: 11.5px;
        }

        /* Intro Banner */
        .doc-intro-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-left: 3.5px solid #269DB9;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 22px;
            font-size: 12px;
            color: #334155;
            line-height: 1.6;
            position: relative;
            z-index: 10;
        }
        .doc-intro-box strong {
            color: #0f172a;
        }

        /* 6 Main Steps Section */
        .steps-container {
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin-bottom: 24px;
            position: relative;
            z-index: 10;
        }
        .step-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 14px 18px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
            transition: border-color 0.2s;
        }
        .step-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }
        .step-num {
            width: 24px;
            height: 24px;
            border-radius: 6px;
            background: #f0f9fb;
            border: 1.5px solid #269DB9;
            color: #269DB9;
            font-weight: 900;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .step-title {
            font-size: 13.5px;
            font-weight: 800;
            color: #1e293b;
            letter-spacing: -0.2px;
        }
        .step-body {
            color: #475569;
            font-size: 12px;
            line-height: 1.6;
            padding-left: 34px;
        }
        .step-body p {
            margin-bottom: 6px;
        }
        .step-body p:last-child {
            margin-bottom: 0;
        }
        .step-bullets {
            margin: 6px 0;
            padding-left: 18px;
            list-style-type: disc;
        }
        .step-bullets li {
            margin-bottom: 4px;
            color: #334155;
        }
        .step-bullets li strong {
            color: #0f172a;
        }
        .step-badge-mini {
            display: inline-block;
            font-size: 10.5px;
            font-weight: 700;
            color: #0284c7;
            background: #e0f2fe;
            padding: 1px 7px;
            border-radius: 4px;
            margin-right: 4px;
        }

        /* Lampiran Surat Permohonan & Surat Kuasa */
        .lampiran-section {
            background: #ffffff;
            border: 1px solid #dcebf0;
            border-radius: 10px;
            padding: 20px 22px;
            margin-bottom: 24px;
            position: relative;
            z-index: 10;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }
        .lampiran-badge {
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
        .lampiran-title {
            font-size: 15px;
            font-weight: 900;
            color: #0f172a;
            letter-spacing: -0.3px;
            margin-bottom: 4px;
        }
        .lampiran-desc {
            font-size: 12px;
            color: #64748b;
            line-height: 1.5;
            margin-bottom: 14px;
        }
        .lampiran-notes-box {
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
        .lampiran-notes-box .notes-title {
            font-size: 11.5px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            margin-bottom: 4px;
            color: #b45309;
        }
        .lampiran-notes-box ol {
            padding-left: 18px;
            margin: 4px 0 0 0;
        }
        .lampiran-notes-box li {
            margin-bottom: 4px;
        }
        .letters-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .letter-card {
            background: #ffffff;
            border: 1.5px solid #cbd5e1;
            border-radius: 8px;
            padding: 22px 26px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.03);
            position: relative;
        }
        .letter-card-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 12px;
            margin-bottom: 14px;
            border-bottom: 1px dashed #e2e8f0;
            flex-wrap: wrap;
            gap: 8px;
        }
        .letter-card-title {
            font-size: 12.5px;
            font-weight: 800;
            color: #1e293b;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .btn-copy-letter {
            background: #f1f5f9;
            border: 1px solid #cbd5e1;
            color: #334155;
            font-size: 11px;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .btn-copy-letter:hover {
            background: #269DB9;
            color: #ffffff;
            border-color: #269DB9;
            transform: translateY(-1px);
        }
        .letter-paper {
            font-size: 11.5px;
            color: #1e293b;
            line-height: 1.65;
            background: #fafbfd;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 20px 24px;
        }
        .letter-kop-simulated {
            text-align: center;
            padding-bottom: 8px;
            margin-bottom: 14px;
            border-bottom: 3px double #334155;
        }
        .kop-text-main {
            font-size: 13.5px;
            font-weight: 900;
            letter-spacing: 1px;
            color: #0f172a;
            text-transform: uppercase;
        }
        .kop-text-sub {
            font-size: 10px;
            color: #64748b;
        }
        .letter-field {
            color: #0284c7;
            background: #f0f9ff;
            padding: 1px 5px;
            border-radius: 3px;
            font-weight: 700;
            border: 1px dashed #bae6fd;
        }
        .letter-sign-block {
            margin-top: 18px;
            display: flex;
            justify-content: flex-end;
            text-align: right;
        }
        .letter-sign-inner {
            display: inline-block;
            text-align: center;
            min-width: 220px;
            font-size: 11.5px;
        }
        .letter-sign-space {
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            font-size: 10px;
            font-style: italic;
        }

        /* Payment Instruction Box (Identik dengan Invoice) */
        .payment-box-full {
            width: 100%;
            background: #fbfdfe;
            border: 1px solid #e2e8f0;
            border-left: 3.5px solid #269DB9;
            border-radius: 8px;
            padding: 13px 18px;
            margin-bottom: 20px;
            position: relative;
            z-index: 10;
        }
        .payment-box-header {
            margin-bottom: 10px;
        }
        .payment-box-title {
            font-size: 11.5px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #22282a;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .payment-box-subtext {
            font-size: 11.5px;
            color: #64748b;
            line-height: 1.5;
        }
        .bank-accounts-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px 16px;
            margin: 10px 0 8px 0;
        }
        .bank-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 8px 14px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.02);
        }
        .bank-card-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .bank-logo-wrap {
            width: 52px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .bank-logo-img {
            max-width: 52px;
            max-height: 22px;
            object-fit: contain;
            display: block;
        }
        .bank-acc-info {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }
        .bank-acc-label {
            font-size: 9.5px;
            font-weight: 800;
            color: #269DB9;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }
        .bank-acc-num {
            font-size: 13px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: 0.4px;
            white-space: nowrap;
        }
        .ewallet-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 8px 14px;
            margin-top: 6px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.02);
        }
        .ewallet-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .ewallet-logos-row {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }
        .ewallet-logo-img {
            height: 15px;
            max-width: 48px;
            object-fit: contain;
            display: block;
        }
        .ewallet-acc-label {
            font-size: 10px;
            font-weight: 700;
            color: #64748b;
        }
        .ewallet-acc-num {
            font-size: 13px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: 0.4px;
        }
        .account-holder-line {
            font-size: 11px;
            color: #64748b;
            border-top: 1px dashed #cbd5e1;
            padding-top: 7px;
            margin-top: 9px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 6px;
        }

        /* Contact & Confirmation Grid */
        .contact-box-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 12px 14px;
            margin-bottom: 22px;
            position: relative;
            z-index: 10;
        }
        .contact-card-item {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }
        .contact-card-label {
            font-size: 9.5px;
            font-weight: 800;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }
        .contact-card-value {
            font-size: 11.5px;
            font-weight: 700;
            color: #0f172a;
            word-break: break-word;
        }
        .contact-card-value a {
            color: #269DB9;
            text-decoration: none;
        }
        .contact-card-value a:hover {
            text-decoration: underline;
        }

        /* Footer Container with QR Code (Identik dengan Invoice) */
        .doc-footer-container {
            margin-top: 15px;
            padding-top: 10px;
            position: relative;
            z-index: 10;
        }
        .doc-footer-row {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 24px;
        }
        .footer-left {
            flex: 1;
            color: #555b5e;
            font-size: 11.5px;
            line-height: 1.5;
        }
        .footer-left .company-name-bottom {
            font-weight: 800;
            color: #22282a;
            margin-bottom: 2px;
            font-size: 13px;
        }
        .footer-left .website-line a {
            color: #269DB9;
            text-decoration: none;
            font-weight: 700;
            font-size: 12px;
        }
        .footer-left .doc-legal-note {
            font-size: 10px;
            color: #94a3b8;
            margin-top: 6px;
            line-height: 1.4;
        }
        .footer-right-qr {
            flex-shrink: 0;
        }
        .qr-validation-card {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #ffffff;
            border: 1px solid #dcebf0;
            border-radius: 8px;
            padding: 8px 12px;
            box-shadow: 0 1px 3px rgba(38, 157, 185, 0.08);
            width: 320px;
        }
        .qr-img {
            width: 66px;
            height: 66px;
            object-fit: contain;
            display: block;
            border-radius: 4px;
            flex-shrink: 0;
        }
        .qr-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }
        .qr-status-tag {
            display: inline-block;
            font-size: 8.5px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 2px 6px;
            border-radius: 4px;
            width: fit-content;
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
        }
        .qr-title {
            font-size: 11px;
            font-weight: 800;
            color: #22282a;
        }
        .qr-desc {
            font-size: 9.5px;
            color: #64748b;
            line-height: 1.35;
        }
        .dotted-divider {
            border-top: 1.5px dotted #cbd5e1;
            margin: 12px 0 8px 0;
            width: 100%;
        }
        .country-bottom {
            text-align: right;
            color: #94a3b8;
            font-size: 11px;
            margin-top: 0;
        }

        /* Toast Notification */
        .toast-notif {
            position: fixed;
            bottom: 24px;
            right: 24px;
            background: #1e293b;
            color: #ffffff;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 12.5px;
            font-weight: 700;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.3);
            display: none;
            align-items: center;
            gap: 8px;
            z-index: 100;
        }

        /* Responsive Mobile Styles */
        @media screen and (max-width: 768px) {
            .label-desktop {
                display: none !important;
            }
            .label-mobile {
                display: inline !important;
            }
            
            /* Sticky Control Bar: Rapi, 1 Baris Horizontal, Tombol Singkat */
            .doc-screen-bar {
                flex-direction: row !important;
                justify-content: space-between !important;
                align-items: center !important;
                padding: 7px 10px !important;
                gap: 6px !important;
                min-height: 44px;
            }
            .screen-bar-left {
                gap: 6px !important;
                flex-shrink: 0;
            }
            .screen-bar-brand {
                display: none !important; /* Disembunyikan di mobile agar tombol muat 1 baris penuh tanpa terpotong */
            }
            .screen-bar-right {
                gap: 5px !important;
                flex-wrap: nowrap !important;
                justify-content: flex-end !important;
                flex-shrink: 0;
            }
            .btn-action {
                padding: 6px 8px !important;
                font-size: 11px !important;
                font-weight: 700 !important;
                border-radius: 6px !important;
                gap: 4px !important;
                white-space: nowrap !important;
            }

            /* Halaman Lembar Dokumen: Margin & Padding Presisi */
            .doc-page {
                margin: 8px 6px 24px 6px !important;
                padding: 18px 14px 20px 14px !important;
                border-radius: 8px;
            }

            /* Perataan Teks di Mobile: Rata Kiri Alami & Rapi (Menghilangkan Celah Spasi Menganga) */
            .doc-page, 
            .doc-dynamic-content,
            .doc-intro-box, 
            .step-body, 
            .step-body p, 
            .letter-paper, 
            .letter-paper p,
            .doc-dynamic-content p,
            .doc-dynamic-content div,
            .doc-dynamic-content li,
            .step-bullets li {
                text-align: left !important;
                text-justify: auto !important;
                word-break: break-word;
            }

            /* Header Kop Surat di Mobile */
            .doc-header {
                flex-direction: column !important;
                gap: 10px !important;
                align-items: flex-start !important;
                margin-bottom: 14px !important;
            }
            .logo-img {
                height: 44px !important;
            }
            .company-meta-area {
                text-align: left !important;
                margin-left: 0 !important;
                max-width: 100% !important;
                padding-right: 0 !important;
                font-size: 11px !important;
                line-height: 1.4 !important;
            }
            .company-meta-area .company-name {
                font-size: 13.5px !important;
                white-space: normal !important;
            }

            /* Baris Judul Dokumen & Target */
            .doc-info-row {
                grid-template-columns: 1fr !important;
                gap: 12px !important;
                margin-bottom: 14px !important;
                padding-bottom: 12px !important;
            }
            .doc-title-col h1 {
                font-size: 16px !important;
                line-height: 1.3 !important;
            }
            .doc-meta-item {
                font-size: 11px !important;
                line-height: 1.4 !important;
            }
            .doc-target-col {
                padding-left: 10px !important;
                border-left: 2.5px solid #269DB9 !important;
                font-size: 11px !important;
            }
            .doc-target-col .target-name {
                font-size: 12px !important;
            }

            /* Kotak Pengantar */
            .doc-intro-box {
                padding: 10px 12px !important;
                margin-bottom: 14px !important;
                font-size: 11.5px !important;
                line-height: 1.55 !important;
            }

            /* Kartu 6 Tahapan Pemesanan */
            .steps-container {
                gap: 10px !important;
                margin-bottom: 18px !important;
            }
            .step-card {
                padding: 12px 12px !important;
            }
            .step-header {
                gap: 8px !important;
                margin-bottom: 6px !important;
            }
            .step-num {
                width: 22px !important;
                height: 22px !important;
                font-size: 11px !important;
            }
            .step-title {
                font-size: 12.5px !important;
                line-height: 1.35 !important;
            }
            .step-body {
                padding-left: 0 !important; /* Hapus indent lebar di layar HP */
                font-size: 11.5px !important;
                line-height: 1.55 !important;
            }
            .step-bullets {
                padding-left: 16px !important;
                margin: 4px 0 !important;
            }
            .step-badge-mini {
                display: inline-block !important;
                margin-bottom: 2px !important;
                font-size: 10px !important;
                padding: 1px 6px !important;
            }

            /* Lampiran Contoh Surat */
            .lampiran-section {
                padding: 14px 12px !important;
                margin-bottom: 18px !important;
                border-radius: 8px !important;
            }
            .lampiran-title {
                font-size: 13.5px !important;
            }
            .lampiran-desc {
                font-size: 11px !important;
                margin-bottom: 10px !important;
            }
            .lampiran-notes-box {
                padding: 10px 12px !important;
                margin-bottom: 14px !important;
                font-size: 11px !important;
            }
            .lampiran-notes-box ol {
                padding-left: 14px !important;
            }
            .letter-card {
                padding: 14px 10px !important;
                border-radius: 8px !important;
                margin-bottom: 14px !important;
            }
            .letter-card-toolbar {
                padding-bottom: 8px !important;
                margin-bottom: 10px !important;
                gap: 6px !important;
            }
            .letter-card-title {
                font-size: 11.5px !important;
            }
            .btn-copy-letter {
                font-size: 10.5px !important;
                padding: 4px 8px !important;
            }
            .letter-paper {
                padding: 12px 8px !important;
                font-size: 10.5px !important;
                line-height: 1.5 !important;
            }
            .kop-text-main {
                font-size: 12px !important;
            }
            .kop-text-sub {
                font-size: 9.5px !important;
            }
            .letter-table {
                font-size: 10.5px !important;
            }
            .letter-table td:first-child {
                width: 65px !important; /* Agar tidak memakan ruang tabel di HP */
            }
            .letter-sign-block {
                margin-top: 16px !important;
            }
            .letter-sign-inner {
                min-width: 150px !important;
            }
            .letter-sign-space {
                height: 40px !important;
            }

            /* Kotak Saluran Pembayaran & Bank */
            .payment-box-full {
                padding: 14px 12px !important;
                margin-bottom: 18px !important;
            }
            .payment-box-title {
                font-size: 12px !important;
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 4px !important;
            }
            .payment-box-subtext {
                font-size: 11px !important;
            }
            .bank-accounts-grid {
                grid-template-columns: 1fr !important;
                gap: 8px !important;
            }
            .bank-card {
                padding: 8px 10px !important;
            }
            .bank-acc-num {
                font-size: 13px !important;
            }
            .ewallet-card {
                padding: 10px !important;
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 6px !important;
            }
            .ewallet-acc-num {
                font-size: 14px !important;
            }
            .account-holder-line {
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 3px !important;
                font-size: 10.5px !important;
            }

            /* Kontak Grid */
            .contact-box-grid {
                grid-template-columns: 1fr !important;
                gap: 8px !important;
                margin-bottom: 18px !important;
            }
            .contact-card-item {
                padding: 8px 10px !important;
            }

            /* Footer & QR Code */
            .doc-footer-container {
                padding-top: 14px !important;
            }
            .doc-footer-row {
                flex-direction: column !important;
                align-items: stretch !important;
                gap: 14px !important;
            }
            .qr-validation-card {
                width: 100% !important;
                padding: 10px !important;
            }
            .qr-img {
                width: 65px !important;
                height: 65px !important;
            }
            .qr-title {
                font-size: 11px !important;
            }
            .qr-desc {
                font-size: 9.5px !important;
            }
            .ribbon-wrapper {
                display: none !important;
            }
        }

        /* Print Media Styles: Clean, Crisp, Professional */
        @media print {
            body {
                background: #ffffff !important;
                color: #000000 !important;
            }
            .doc-screen-bar {
                display: none !important;
            }
            .toast-notif {
                display: none !important;
            }
            .doc-page {
                margin: 0 !important;
                padding: 20px 30px !important;
                box-shadow: none !important;
                border: none !important;
                border-radius: 0 !important;
                max-width: 100% !important;
                min-height: auto !important;
            }
            .step-card {
                box-shadow: none !important;
                border: 1px solid #cbd5e1 !important;
                page-break-inside: avoid !important;
            }
            .lampiran-section, .letter-card {
                page-break-inside: avoid !important;
                box-shadow: none !important;
            }
            .letter-card-toolbar {
                display: none !important;
            }
            .payment-box-full, .contact-box-grid, .doc-footer-container {
                page-break-inside: avoid !important;
            }
            @page {
                margin: 8mm 10mm;
                size: A4 portrait;
            }
        }
    </style>
</head>
<body>

@php
    // Clean and format phone number
    $rawPhone = $settings['contact_phone'] ?? '0896 9524 9089';
    $cleanPhone = str_replace('-', ' ', $rawPhone);
    $formattedPhone = trim(preg_replace('/\s+/', ' ', $cleanPhone));
    $rawWaPhone = preg_replace('/[^0-9]/', '', $rawPhone);
    if (str_starts_with($rawWaPhone, '0')) {
        $rawWaPhone = '62' . substr($rawWaPhone, 1);
    }

    // Guaranteed Logo Embedding via Base64 or Asset
    $logoRel = \App\Models\Setting::getValue('site_logo', 'images/smartverse/logo-smartverse.webp');
    $logoFile = public_path(ltrim($logoRel, '/'));
    if (!file_exists($logoFile)) {
        $logoFile = public_path('images/smartverse/logo-smartverse.webp');
    }
    if (!file_exists($logoFile)) {
        $logoFile = public_path('images/smartverse/logo-smartverse.jpg');
    }
    $logoSrc = asset('images/smartverse/logo-smartverse.webp');
    if (file_exists($logoFile)) {
        $content = @file_get_contents($logoFile);
        if ($content !== false) {
            $ext = strtolower(pathinfo($logoFile, PATHINFO_EXTENSION));
            $mime = $ext === 'png' ? 'image/png' : ($ext === 'webp' ? 'image/webp' : 'image/jpeg');
            $logoSrc = 'data:' . $mime . ';base64,' . base64_encode($content);
        }
    }

    // Helper closure for embedding official bank & e-wallet vector SVGs
    $getBankLogo = function($name) {
        $path = public_path("images/banks/{$name}.svg");
        if (file_exists($path)) {
            $svgContent = @file_get_contents($path);
            if ($svgContent !== false) {
                return 'data:image/svg+xml;base64,' . base64_encode($svgContent);
            }
        }
        return asset("images/banks/{$name}.svg");
    };

    // Public URL & WhatsApp Share Generator
    $companyName = $settings['company_name'] ?? 'SmartVerse';
    $companyLegal = $settings['company_legal_name'] ?? ($settings['company_name'] ?? 'SmartVerse (smartverse.id)');
    $docUrl = $publicUrl ?? url('/panduan-pemesanan');
    $shareWaText = urlencode("Halo Tim {$companyName}, saya ingin memesan website / solusi digital berdasarkan panduan resmi ini: {$docUrl}");
@endphp

    <!-- Screen Control Bar (Navigasi & Aksi Cepat) -->
    <div class="doc-screen-bar">
        <div class="screen-bar-left">
            @if(auth()->check())
                <a href="{{ route('admin.order-guide.index') }}" class="btn-action btn-admin" title="Kembali ke Dashboard Admin">
                    <span>&larr;</span>
                    <span class="label-desktop">Kembali ke Dashboard</span>
                    <span class="label-mobile">Admin</span>
                </a>
            @else
                <a href="{{ url('/') }}" class="btn-action btn-copy" title="Kembali ke Beranda Utama">
                    <span>&larr;</span>
                    <span class="label-desktop">Beranda Utama</span>
                    <span class="label-mobile">Beranda</span>
                </a>
            @endif
            <div class="screen-bar-brand">
                <span class="label-desktop">Panduan Pemesanan</span>
                <span class="screen-bar-tag">SOP RESMI</span>
            </div>
        </div>

        <div class="screen-bar-right">
            <button onclick="copyShareLink('{{ $docUrl }}')" class="btn-action btn-copy" title="Salin tautan dokumen">
                <span>📋</span>
                <span class="label-desktop">Salin Link</span>
                <span class="label-mobile">Salin</span>
            </button>
            <a href="https://wa.me/{{ $rawWaPhone }}?text={{ $shareWaText }}" target="_blank" class="btn-action btn-wa" title="Konsultasi langsung via WhatsApp">
                <span>💬</span>
                <span class="label-desktop">WhatsApp</span>
                <span class="label-mobile">WA</span>
            </a>
            <button onclick="window.print()" class="btn-action btn-print" title="Cetak atau Simpan PDF">
                <span>🖨️</span>
                <span class="label-desktop">Cetak PDF</span>
                <span class="label-mobile">PDF</span>
            </button>
        </div>
    </div>

    <!-- Main Printable Document Sheet (A4 Senada Invoice) -->
    <div class="doc-page">

        <!-- Background Watermark Samar Elegan -->
        <div class="watermark-overlay" aria-hidden="true">
            <div class="watermark-content">
                <img src="{{ $logoSrc }}" alt="" class="watermark-logo">
                <div class="watermark-text">{{ strtoupper($settings['company_legal_name'] ?? ($settings['company_name'] ?? 'SMARTVERSE (SMARTVERSE.ID)')) }}</div>
                <div class="watermark-subtext">OFFICIAL SOP & ORDER GUIDE</div>
            </div>
        </div>

        <!-- Top Right Diagonal Ribbon Banner -->
        <div class="ribbon-wrapper">
            <div class="ribbon">OFFICIAL SOP</div>
        </div>

        <!-- Header: Logo & Company Address (Symmetrical, Flush Right) -->
        <div class="doc-header">
            <div class="company-logo-area">
                <img src="{{ $logoSrc }}" alt="{{ $settings['company_name'] ?? 'SmartVerse' }}" class="logo-img" />
            </div>

            <!-- Kop Nama CV di Kanan Atas: Rapi & Senada Invoice -->
            <div class="company-meta-area">
                <div class="company-name">{{ $settings['company_legal_name'] ?? ($settings['company_name'] ?? 'SmartVerse (smartverse.id)') }}</div>
                <div class="company-addr">Jl. Sarjana Blok A No. 25 Timbangan</div>
                <div class="company-addr">{{ $settings['company_address_line2'] ?? 'Sumatera Selatan, Indonesia' }}</div>
                <div class="company-email">{{ $settings['contact_email'] ?? 'info@smartverse.id' }}</div>
                <div class="company-phone">{{ $formattedPhone }}</div>
            </div>
        </div>

        <!-- Document Meta & Target Target Row -->
        <div class="doc-info-row">
            <div class="doc-title-col">
                <h1>PANDUAN & ALUR PEMESANAN <span class="highlight">WEBSITE / APLIKASI</span></h1>
                <div class="doc-meta-item">
                    <span>Nomor Dokumen:</span> SOP-SMARTVERSE/WEB-APP/{{ date('Y') }}
                </div>
                <div class="doc-meta-item">
                    <span>Status Regulasi:</span> Standar Operasional Prosedur Resmi (Berlaku Aktif)
                </div>
                <div class="doc-meta-item">
                    <span>Penyedia Layanan:</span> {{ $settings['company_legal_name'] ?? ($settings['company_name'] ?? 'SmartVerse (smartverse.id)') }}
                </div>
            </div>

            <div class="doc-target-col">
                <div class="title-label">Ditujukan Kepada</div>
                <div class="target-badge">Calon Klien & Mitra</div>
                <div class="target-name">Institusi, Sekolah, Yayasan & Pelaku Bisnis</div>
                <div class="target-desc">Panduan resmi alur kerja, legalitas domain, pembayaran DP, hingga serah terima & garansi pengerjaan.</div>
            </div>
        </div>

        <!-- Dynamic Document Content (Rata Penuh & Terstruktur) -->
        <div class="doc-dynamic-content" style="text-align: justify; text-justify: inter-word;">
            {!! $documentContent !!}
        </div>

        <!-- Informasi Rekening & Saluran Transfer Resmi (Identik Format Invoice) -->
        <div class="payment-box-full">
            <div class="payment-box-header">
                <div class="payment-box-title">
                    <span>INFORMASI TUJUAN TRANSFER / SALURAN PEMBAYARAN RESMI</span>
                    <span style="font-size: 10px; color: #10b981; font-weight: 800;">✓ REKENING TERVERIFIKASI</span>
                </div>
                <div class="payment-box-subtext">
                    Pembayaran uang muka (DP) maupun pelunasan dapat ditransfer ke salah satu rekening bank atau e-wallet resmi berikut:
                </div>
            </div>

            <!-- Grid 4 Bank Resmi (2x2 Simetris Penuh Berlogo Resmi) -->
            <div class="bank-accounts-grid">
                <div class="bank-card">
                    <div class="bank-card-left">
                        <div class="bank-logo-wrap">
                            <img src="{{ $getBankLogo('bsi') }}" alt="BSI" class="bank-logo-img" />
                        </div>
                        <div class="bank-acc-info">
                            <span class="bank-acc-label">BSI (Bank Syariah Indonesia)</span>
                        </div>
                    </div>
                    <span class="mono bank-acc-num">8926301510</span>
                </div>
                <div class="bank-card">
                    <div class="bank-card-left">
                        <div class="bank-logo-wrap">
                            <img src="{{ $getBankLogo('bri') }}" alt="BRI" class="bank-logo-img" />
                        </div>
                        <div class="bank-acc-info">
                            <span class="bank-acc-label">BRI (Bank Rakyat Indonesia)</span>
                        </div>
                    </div>
                    <span class="mono bank-acc-num">563701043113533</span>
                </div>
                <div class="bank-card">
                    <div class="bank-card-left">
                        <div class="bank-logo-wrap">
                            <img src="{{ $getBankLogo('jago') }}" alt="Bank Jago Syariah" class="bank-logo-img" />
                        </div>
                        <div class="bank-acc-info">
                            <span class="bank-acc-label">Bank Jago Syariah</span>
                        </div>
                    </div>
                    <span class="mono bank-acc-num">504724018833</span>
                </div>
                <div class="bank-card">
                    <div class="bank-card-left">
                        <div class="bank-logo-wrap">
                            <img src="{{ $getBankLogo('seabank') }}" alt="SeaBank" class="bank-logo-img" />
                        </div>
                        <div class="bank-acc-info">
                            <span class="bank-acc-label">SeaBank</span>
                        </div>
                    </div>
                    <span class="mono bank-acc-num">901020639279</span>
                </div>
            </div>

            <!-- E-Wallet Resmi (ShopeePay, DANA, OVO, GoPay) Simetris Penuh -->
            <div class="ewallet-card">
                <div class="ewallet-left">
                    <div class="ewallet-logos-row">
                        <img src="{{ $getBankLogo('shopeepay') }}" alt="ShopeePay" class="ewallet-logo-img" />
                        <img src="{{ $getBankLogo('dana') }}" alt="DANA" class="ewallet-logo-img" />
                        <img src="{{ $getBankLogo('ovo') }}" alt="OVO" class="ewallet-logo-img" />
                        <img src="{{ $getBankLogo('gopay') }}" alt="GoPay" class="ewallet-logo-img" />
                    </div>
                    <div class="ewallet-acc-label">E-Wallet (ShopeePay / DANA / OVO / GoPay)</div>
                </div>
                <div class="mono ewallet-acc-num">085267774878</div>
            </div>

            <div class="account-holder-line">
                <span>Semua rekening & e-wallet resmi atas nama: <strong>Septa Ryan Hidayat</strong></span>
                <span>Konfirmasi Pembayaran WA: <strong>{{ $formattedPhone }}</strong></span>
            </div>
        </div>

        <!-- Kontak & Konfirmasi Card Grid -->
        <div class="contact-box-grid">
            <div class="contact-card-item">
                <div class="contact-card-label">WhatsApp Admin</div>
                <div class="contact-card-value">
                    <a href="https://wa.me/{{ $rawWaPhone }}" target="_blank">+{{ $rawWaPhone }}</a>
                </div>
            </div>
            <div class="contact-card-item">
                <div class="contact-card-label">Email Korespondensi</div>
                <div class="contact-card-value">
                    <a href="mailto:{{ $settings['contact_email'] ?? 'info@smartverse.id' }}">{{ $settings['contact_email'] ?? 'info@smartverse.id' }}</a>
                </div>
            </div>
            <div class="contact-card-item">
                <div class="contact-card-label">Website Resmi</div>
                <div class="contact-card-value">
                    <a href="https://{{ $settings['site_website'] ?? 'smartverse.id' }}" target="_blank">{{ $settings['site_website'] ?? 'smartverse.id' }}</a>
                </div>
            </div>
            <div class="contact-card-item">
                <div class="contact-card-label">Alamat Kantor</div>
                <div class="contact-card-value">
                    Jl. Sarjana Blok A No. 25 Timbangan, Ogan Ilir, Sumatera Selatan
                </div>
            </div>
        </div>

        <!-- Footer Notice with Digital QR Verification (Identik Invoice) -->
        <div class="doc-footer-container">
            <div class="doc-footer-row">
                <div class="footer-left">
                    <div class="company-name-bottom">{{ $settings['company_legal_name'] ?? ($settings['company_name'] ?? 'SmartVerse (smartverse.id)') }}</div>
                    <div class="website-line">
                        <a href="https://{{ $settings['site_website'] ?? 'smartverse.id' }}" target="_blank">{{ $settings['site_website'] ?? 'smartverse.id' }}</a>
                    </div>
                    <div class="doc-legal-note">
                        Dokumen ini diterbitkan resmi melalui sistem komputerisasi {{ $settings['company_name'] ?? 'SmartVerse' }} dan sah tanpa tanda tangan basah.
                    </div>
                </div>

                <div class="footer-right-qr">
                    <div class="qr-validation-card">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&margin=2&color=000000&data={{ urlencode($docUrl) }}" 
                             alt="QR Code Validasi Dokumen Panduan Pemesanan {{ $settings['company_name'] ?? 'SmartVerse' }}" 
                             class="qr-img" />
                        <div class="qr-info">
                            <span class="qr-status-tag">
                                ✓ DOKUMEN RESMI STANDAR
                            </span>
                            <div class="qr-title">Validasi Dokumen Digital</div>
                            <div class="qr-desc">Scan QR Code untuk verifikasi keaslian panduan pemesanan ini secara langsung di server resmi {{ $settings['company_legal_name'] ?? ($settings['company_name'] ?? 'SmartVerse (smartverse.id)') }}.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dotted-divider"></div>

            <div class="country-bottom">{{ $settings['company_country'] ?? 'Indonesia' }}</div>
        </div>

    </div>

    <!-- Toast Notification -->
    <div id="toastNotif" class="toast-notif">
        <span>✓</span> <span id="toastMsg">Tautan berhasil disalin ke clipboard!</span>
    </div>

    <script>
        function copyShareLink(url) {
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(url).then(function() {
                    showToast('Tautan dokumen berhasil disalin ke clipboard!');
                }).catch(function() {
                    fallbackCopy(url);
                });
            } else {
                fallbackCopy(url);
            }
        }

        function fallbackCopy(text) {
            var textArea = document.createElement("textarea");
            textArea.value = text;
            textArea.style.position = "fixed";
            textArea.style.left = "-999999px";
            textArea.style.top = "-999999px";
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            try {
                document.execCommand('copy');
                showToast('Tautan dokumen berhasil disalin ke clipboard!');
            } catch (err) {
                prompt("Salin tautan ini:", text);
            }
            document.body.removeChild(textArea);
        }

        function copyLetterTemplate(elementId, successMsg) {
            var el = document.getElementById(elementId);
            if (el) {
                var text = el.value;
                if (navigator.clipboard && window.isSecureContext) {
                    navigator.clipboard.writeText(text).then(function() {
                        showToast(successMsg || 'Format surat berhasil disalin ke clipboard!');
                    }).catch(function() {
                        fallbackCopy(text);
                    });
                } else {
                    fallbackCopy(text);
                }
            }
        }

        function showToast(msg) {
            var toast = document.getElementById('toastNotif');
            var msgEl = document.getElementById('toastMsg');
            if (toast && msgEl) {
                msgEl.innerText = msg;
                toast.style.display = 'inline-flex';
                setTimeout(function() {
                    toast.style.display = 'none';
                }, 3500);
            }
        }
    </script>
</body>
</html>
