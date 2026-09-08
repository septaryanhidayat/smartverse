<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Invoice #{{ $invoice->invoice_number }} - CV. Beranda Teknologi Digital</title>
    
    <!-- Google Fonts -->
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
        }
        .verify-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 12px 35px -5px rgba(34, 40, 42, 0.12), 0 4px 12px -2px rgba(34, 40, 42, 0.05);
            max-width: 580px;
            width: 100%;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }
        .verify-header {
            background: #22282a;
            color: white;
            padding: 24px;
            text-align: center;
            position: relative;
        }
        .logo-img {
            height: 48px;
            width: auto;
            object-fit: contain;
            margin-bottom: 12px;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
        }
        .verify-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
            padding: 6px 14px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-top: 4px;
        }
        .verify-content {
            padding: 28px 24px;
        }
        .invoice-hero {
            text-align: center;
            margin-bottom: 24px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
        }
        .invoice-num-title {
            font-size: 26px;
            font-weight: 800;
            color: #22282a;
            letter-spacing: -0.5px;
        }
        .invoice-num-highlight {
            color: #269DB9;
        }
        .invoice-status-pill {
            display: inline-block;
            margin-top: 8px;
            padding: 6px 16px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }
        .invoice-status-pill.paid {
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
        }
        .invoice-status-pill.unpaid {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }
        .invoice-status-pill.partial {
            background: #fffbeb;
            color: #b45309;
            border: 1px solid #fde68a;
        }

        /* Detail List */
        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 10px 0;
            border-bottom: 1px solid #f1f5f9;
            font-size: 13px;
        }
        .detail-label {
            color: #64748b;
            font-weight: 600;
            width: 40%;
        }
        .detail-value {
            color: #22282a;
            font-weight: 700;
            width: 60%;
            text-align: right;
        }
        .detail-value.mono {
            font-variant-numeric: tabular-nums;
        }

        /* Total Highlight Card */
        .total-card {
            background: #f0f9fb;
            border: 1.5px solid #bee3eb;
            border-radius: 10px;
            padding: 14px 18px;
            margin: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .total-card .label {
            font-size: 12px;
            font-weight: 800;
            color: #22282a;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .total-card .amount {
            font-size: 18px;
            font-weight: 800;
            color: #269DB9;
            font-variant-numeric: tabular-nums;
        }

        /* Actions Buttons */
        .action-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 24px;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 12px 18px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
        }
        .btn-primary {
            background: #269DB9;
            color: #ffffff;
            box-shadow: 0 3px 8px rgba(38, 157, 185, 0.3);
        }
        .btn-primary:hover {
            background: #1f859d;
        }
        .btn-secondary {
            background: #22282a;
            color: #ffffff;
        }
        .btn-secondary:hover {
            background: #15191b;
        }
        .btn-outline {
            background: #ffffff;
            color: #475569;
            border: 1px solid #cbd5e1;
        }
        .btn-outline:hover {
            background: #f8fafc;
            color: #22282a;
        }

        .verify-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 11px;
            color: #94a3b8;
        }

        /* Bank & E-Wallet Symmetrical Cards */
        .bank-grid-verify {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
            margin: 10px 0 8px 0;
        }
        @media (max-width: 480px) {
            .bank-grid-verify {
                grid-template-columns: 1fr;
            }
        }
        .bank-card-verify {
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 8px 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }
        .bank-card-left {
            display: flex;
            align-items: center;
            gap: 8px;
            min-width: 0;
        }
        .bank-logo-verify {
            width: 42px;
            height: 20px;
            object-fit: contain;
            flex-shrink: 0;
        }
        .bank-info-verify {
            line-height: 1.2;
            min-width: 0;
        }
        .bank-info-verify .name {
            font-size: 9.5px;
            font-weight: 800;
            color: #269DB9;
            text-transform: uppercase;
        }
        .bank-info-verify .num {
            font-size: 12px;
            font-weight: 800;
            color: #0f172a;
            white-space: nowrap;
        }
        .btn-copy {
            background: #f1f5f9;
            color: #334155;
            border: 1px solid #cbd5e1;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 10.5px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.15s;
            white-space: nowrap;
            flex-shrink: 0;
        }
        .btn-copy:hover {
            background: #269DB9;
            color: #ffffff;
            border-color: #269DB9;
        }
        .btn-copy.copied {
            background: #10b981 !important;
            color: #ffffff !important;
            border-color: #10b981 !important;
        }
        .ewallet-card-verify {
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 8px 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 8px;
        }
        .ewallet-left-verify {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 0;
            flex-wrap: wrap;
        }
        .ewallet-logos-row-verify {
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .ewallet-logo-verify {
            height: 14px;
            max-width: 38px;
            object-fit: contain;
        }
        .ewallet-info-verify {
            line-height: 1.2;
        }
        .ewallet-info-verify .name {
            font-size: 9.5px;
            font-weight: 700;
            color: #64748b;
        }
        .ewallet-info-verify .num {
            font-size: 12px;
            font-weight: 800;
            color: #0f172a;
        }
    </style>
</head>
<body>

@php
    $logoPath = public_path('images/Logo-BTD-white.png');
    if (!file_exists($logoPath)) {
        $logoPath = public_path('images/Logo-BTD.png');
    }
    $logoSrc = file_exists($logoPath) ? 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath)) : asset('images/Logo-BTD.png');

    // Helper for SVG base64
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
@endphp

    <div class="verify-card">
        <!-- Header -->
        <div class="verify-header">
            <img src="{{ $logoSrc }}" alt="CV. Beranda Teknologi Digital" class="logo-img" />
            <div>
                <span class="verify-badge">
                    <span>✓</span> Dokumen Terverifikasi Resmi
                </span>
            </div>
        </div>

        <!-- Content -->
        <div class="verify-content">
            <div class="invoice-hero">
                <div class="invoice-num-title">
                    Invoice <span class="invoice-num-highlight">#{{ $invoice->invoice_number }}</span>
                </div>
                @if($invoice->status === 'paid')
                    <div class="invoice-status-pill paid">✓ Lunas (Paid)</div>
                @elseif($invoice->status === 'partial')
                    <div class="invoice-status-pill partial">◐ Sebagian (Partial)</div>
                @elseif($invoice->status === 'cancelled')
                    <div class="invoice-status-pill" style="background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1;">✕ Batal (Void)</div>
                @else
                    <div class="invoice-status-pill unpaid">● Belum Lunas (Unpaid)</div>
                @endif
            </div>

            <div class="detail-row">
                <div class="detail-label">Penerbit Resmi</div>
                <div class="detail-value">{{ $settings['company_legal_name'] ?? 'CV. Beranda Teknologi Digital' }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Ditujukan Kepada</div>
                <div class="detail-value">
                    {{ $invoice->client_name }}
                    @if($invoice->client_attn && $invoice->client_attn !== $invoice->client_name)
                        <div style="font-size: 11.5px; color: #64748b; font-weight: normal;">
                            {{ str_starts_with(strtoupper(trim($invoice->client_attn)), 'ATTN') ? $invoice->client_attn : 'ATTN: ' . $invoice->client_attn }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Tanggal Terbit</div>
                <div class="detail-value">{{ optional($invoice->invoice_date)->format('d F Y') }}</div>
            </div>

            @if($invoice->due_date)
                <div class="detail-row">
                    <div class="detail-label">Jatuh Tempo</div>
                    <div class="detail-value">{{ optional($invoice->due_date)->format('d F Y') }}</div>
                </div>
            @endif

            <!-- Total Card -->
            <div class="total-card">
                <div class="label">Total Tagihan</div>
                <div class="amount">Rp {{ number_format($invoice->total_amount, 2, ',', '.') }}</div>
            </div>

            @if($invoice->remaining_amount > 0)
                <div class="detail-row" style="background: #fef2f2; padding: 8px 12px; border-radius: 6px; border: 1px solid #fecaca;">
                    <div class="detail-label" style="color: #b91c1c;">Sisa Tagihan</div>
                    <div class="detail-value mono" style="color: #b91c1c;">Rp {{ number_format($invoice->remaining_amount, 2, ',', '.') }}</div>
                </div>
            @endif

            <!-- Payment Channel Box / Paid Status Banner -->
            @if($invoice->status === 'paid')
                <div style="background: #ecfdf5; border: 1.5px solid #a7f3d0; border-radius: 12px; padding: 14px 16px; margin-top: 18px; text-align: left;">
                    <div style="font-weight: 800; color: #047857; font-size: 13px; display: flex; align-items: center; gap: 6px; margin-bottom: 4px;">
                        <span>✓</span> <span>TAGIHAN TELAH LUNAS (PAID)</span>
                    </div>
                    <div style="color: #065f46; font-size: 12px; line-height: 1.45;">
                        Terima kasih, seluruh pembayaran telah diterima dengan baik. Dokumen invoice ini merupakan bukti transaksi yang sah dari <strong>{{ $settings['company_legal_name'] ?? 'CV. Beranda Teknologi Digital' }}</strong>.
                    </div>
                </div>
            @else
                <div id="payment-channels" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 14px 16px; margin-top: 18px; text-align: left; font-size: 12px;">
                    <div style="font-weight: 800; color: #0f172a; margin-bottom: 4px; font-size: 12.5px; display: flex; align-items: center; gap: 6px;">
                        💳 <span>Channel Pembayaran & Transfer Resmi:</span>
                    </div>
                    <div style="color: #475569; font-size: 11.5px; margin-bottom: 8px;">
                        Pembayaran dapat ditransfer ke salah satu rekening bank atau e-wallet berikut:
                    </div>
                    
                    <!-- 4 Rekening Bank Resmi (Grid Simetris dengan Logo Resmi & Tombol Salin) -->
                    <div class="bank-grid-verify">
                        <!-- BSI -->
                        <div class="bank-card-verify">
                            <div class="bank-card-left">
                                <img src="{{ $getBankLogo('bsi') }}" alt="BSI" class="bank-logo-verify" />
                                <div class="bank-info-verify">
                                    <div class="name">BSI</div>
                                    <div class="mono num">8926301510</div>
                                </div>
                            </div>
                            <button type="button" onclick="copyAccount('8926301510', this)" class="btn-copy" title="Salin Nomor Rekening BSI">
                                📋 Salin
                            </button>
                        </div>

                        <!-- BRI -->
                        <div class="bank-card-verify">
                            <div class="bank-card-left">
                                <img src="{{ $getBankLogo('bri') }}" alt="BRI" class="bank-logo-verify" />
                                <div class="bank-info-verify">
                                    <div class="name">BRI</div>
                                    <div class="mono num">563701043113533</div>
                                </div>
                            </div>
                            <button type="button" onclick="copyAccount('563701043113533', this)" class="btn-copy" title="Salin Nomor Rekening BRI">
                                📋 Salin
                            </button>
                        </div>

                        <!-- Bank Jago Syariah -->
                        <div class="bank-card-verify">
                            <div class="bank-card-left">
                                <img src="{{ $getBankLogo('jago') }}" alt="Bank Jago Syariah" class="bank-logo-verify" />
                                <div class="bank-info-verify">
                                    <div class="name">Bank Jago Syariah</div>
                                    <div class="mono num">504724018833</div>
                                </div>
                            </div>
                            <button type="button" onclick="copyAccount('504724018833', this)" class="btn-copy" title="Salin Nomor Rekening Bank Jago Syariah">
                                📋 Salin
                            </button>
                        </div>

                        <!-- SeaBank -->
                        <div class="bank-card-verify">
                            <div class="bank-card-left">
                                <img src="{{ $getBankLogo('seabank') }}" alt="SeaBank" class="bank-logo-verify" />
                                <div class="bank-info-verify">
                                    <div class="name">SeaBank</div>
                                    <div class="mono num">901020639279</div>
                                </div>
                            </div>
                            <button type="button" onclick="copyAccount('901020639279', this)" class="btn-copy" title="Salin Nomor Rekening SeaBank">
                                📋 Salin
                            </button>
                        </div>
                    </div>

                    <!-- E-Wallet ShopeePay / DANA / OVO / GoPay -->
                    <div class="ewallet-card-verify">
                        <div class="ewallet-left-verify">
                            <div class="ewallet-logos-row-verify">
                                <img src="{{ $getBankLogo('shopeepay') }}" alt="ShopeePay" class="ewallet-logo-verify" />
                                <img src="{{ $getBankLogo('dana') }}" alt="DANA" class="ewallet-logo-verify" />
                                <img src="{{ $getBankLogo('ovo') }}" alt="OVO" class="ewallet-logo-verify" />
                                <img src="{{ $getBankLogo('gopay') }}" alt="GoPay" class="ewallet-logo-verify" />
                            </div>
                            <div class="ewallet-info-verify">
                                <div class="name">E-Wallet (ShopeePay/DANA/OVO/GoPay)</div>
                                <div class="mono num">085267774878</div>
                            </div>
                        </div>
                        <button type="button" onclick="copyAccount('085267774878', this)" class="btn-copy" title="Salin Nomor E-Wallet">
                            📋 Salin
                        </button>
                    </div>

                    <div style="font-size: 11px; color: #64748b; border-top: 1px dashed #cbd5e1; padding-top: 6px;">
                        Semua a.n. <strong style="color: #0f172a;">Septa Ryan Hidayat</strong>
                    </div>
                </div>
            @endif

            <!-- Action Buttons -->
            <div class="action-group">
                <a href="{{ route('invoices.public-print', $invoice->invoice_number) }}" target="_blank" class="btn btn-primary">
                    🖨️ Lihat / Cetak Invoice Asli
                </a>
                <a href="https://wa.me/6289695249089?text={{ urlencode('Halo CV. Beranda Teknologi Digital, saya ingin konfirmasi perihal Invoice #' . $invoice->invoice_number . ' atas nama ' . $invoice->client_name) }}" target="_blank" class="btn btn-secondary">
                    💬 Konfirmasi via WhatsApp
                </a>
                <a href="/" class="btn btn-outline">
                    🌐 Beranda CV. Beranda Teknologi Digital
                </a>
            </div>
        </div>
    </div>

    <div class="verify-footer">
        &copy; {{ date('Y') }} CV. Beranda Teknologi Digital &bull; Sistem Verifikasi Dokumen Digital
    </div>

    <!-- SweetAlert2 & 1-Click Clipboard Copy Handler -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function copyAccount(text, btn) {
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(() => showCopied(btn, text)).catch(() => fallbackCopy(text, btn));
            } else {
                fallbackCopy(text, btn);
            }
        }

        function fallbackCopy(text, btn) {
            const input = document.createElement('input');
            input.setAttribute('value', text);
            document.body.appendChild(input);
            input.select();
            document.execCommand('copy');
            document.body.removeChild(input);
            showCopied(btn, text);
        }

        function showCopied(btn, text) {
            if (btn) {
                const orig = btn.innerHTML;
                btn.innerHTML = '✓ Tersalin!';
                btn.classList.add('copied');
                setTimeout(() => {
                    btn.innerHTML = orig;
                    btn.classList.remove('copied');
                }, 2500);
            }
            if (window.Swal) {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Nomor ' + text + ' berhasil disalin!',
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true
                });
            }
        }

        // Auto copy if redirected with query param ?copy=...
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const copyVal = urlParams.get('copy');
            if (copyVal) {
                copyAccount(copyVal, null);
            }
        });
    </script>
</body>
</html>
