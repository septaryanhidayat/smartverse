<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice #{{ $invoice->invoice_number }}</title>
</head>
<body style="font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #f1f5f9; margin: 0; padding: 30px 15px; color: #22282a; line-height: 1.6;">

    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.06); border: 1px solid #e2e8f0;">
        <!-- Header -->
        <tr>
            <td style="background-color: #22282a; padding: 25px 30px; text-align: center;">
                <h2 style="color: #ffffff; margin: 0; font-size: 20px; font-weight: 800; letter-spacing: 0.5px;">
                    {{ $settings['company_legal_name'] ?? 'CV. Beranda Teknologi Digital' }}
                </h2>
                <div style="color: #cbd5e1; font-size: 12px; margin-top: 5px;">
                    Jl. Sarjana, Timbangan, Ogan Ilir, Sumatera Selatan, Indonesia
                </div>
                <div style="color: #269DB9; font-size: 12px; margin-top: 4px; font-weight: 600;">
                    Software House &bull; Mobile Apps &bull; AI Solutions
                </div>
            </td>
        </tr>

        <!-- Body Content -->
        <tr>
            <td style="padding: 30px;">
                <p style="font-size: 15px; margin-top: 0; color: #22282a;">
                    Yth. <strong>{{ $invoice->client_name }}</strong>,
                </p>
                @if($invoice->client_attn && $invoice->client_attn !== $invoice->client_name)
                    <p style="font-size: 13px; color: #64748b; margin-top: -8px;">
                        {{ $invoice->client_attn }}
                    </p>
                @endif
                <p style="font-size: 13.5px; color: #475569; margin-bottom: 24px;">
                    Berikut kami sampaikan dokumen invoice resmi <strong>#{{ $invoice->invoice_number }}</strong> terkait layanan pengembangan teknologi yang telah diterbitkan oleh CV. Beranda Teknologi Digital.
                </p>

                <!-- Invoice Summary Card -->
                <table width="100%" cellpadding="12" cellspacing="0" style="background-color: #f0f9fb; border: 1px solid #bee3eb; border-radius: 8px; margin-bottom: 24px;">
                    <tr>
                        <td style="font-size: 13px; color: #64748b; border-bottom: 1px solid #dcebf0;">Nomor Invoice:</td>
                        <td align="right" style="font-size: 14px; font-weight: 800; color: #269DB9; border-bottom: 1px solid #dcebf0;">
                            #{{ $invoice->invoice_number }}
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 13px; color: #64748b; border-bottom: 1px solid #dcebf0;">Tanggal Terbit:</td>
                        <td align="right" style="font-size: 13px; font-weight: 700; color: #22282a; border-bottom: 1px solid #dcebf0;">
                            {{ optional($invoice->invoice_date)->format('d/m/Y') }}
                        </td>
                    </tr>
                    @if($invoice->due_date)
                        <tr>
                            <td style="font-size: 13px; color: #64748b; border-bottom: 1px solid #dcebf0;">Jatuh Tempo:</td>
                            <td align="right" style="font-size: 13px; font-weight: 700; color: #22282a; border-bottom: 1px solid #dcebf0;">
                                {{ optional($invoice->due_date)->format('d/m/Y') }}
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td style="font-size: 13px; color: #64748b; border-bottom: 1px solid #dcebf0;">Status Pembayaran:</td>
                        <td align="right" style="font-size: 12px; font-weight: 800; border-bottom: 1px solid #dcebf0;">
                            @if($invoice->status === 'paid')
                                <span style="background-color: #ecfdf5; color: #047857; padding: 3px 10px; border-radius: 20px;">LUNAS (PAID)</span>
                            @elseif($invoice->status === 'partial')
                                <span style="background-color: #fffbeb; color: #b45309; padding: 3px 10px; border-radius: 20px;">SEBAGIAN (PARTIAL)</span>
                            @else
                                <span style="background-color: #fef2f2; color: #b91c1c; padding: 3px 10px; border-radius: 20px;">BELUM LUNAS (UNPAID)</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 14px; font-weight: 800; color: #22282a;">Total Tagihan:</td>
                        <td align="right" style="font-size: 16px; font-weight: 900; color: #269DB9;">
                            Rp {{ number_format($invoice->total_amount, 2, ',', '.') }}
                        </td>
                    </tr>
                </table>

                <!-- Items Breakdown -->
                <div style="font-size: 13px; font-weight: 800; color: #22282a; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px;">
                    Rincian Layanan:
                </div>
                <table width="100%" cellpadding="8" cellspacing="0" style="border-collapse: collapse; margin-bottom: 24px; font-size: 12.5px;">
                    @if(is_array($invoice->items) && count($invoice->items) > 0)
                        @foreach($invoice->items as $item)
                            <tr style="border-bottom: 1px solid #e2e8f0;">
                                <td style="color: #334155; padding: 8px 0;">{{ $item['description'] ?? '-' }}</td>
                                <td align="right" style="font-weight: 700; color: #22282a; padding: 8px 0; white-space: nowrap;">
                                    Rp {{ number_format($item['amount'] ?? 0, 2, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr style="border-bottom: 1px solid #e2e8f0;">
                            <td style="color: #334155; padding: 8px 0;">Pelunasan Pembuatan Aplikasi</td>
                            <td align="right" style="font-weight: 700; color: #22282a; padding: 8px 0;">
                                Rp {{ number_format($invoice->total_amount, 2, ',', '.') }}
                            </td>
                        </tr>
                    @endif
                </table>

                <!-- Payment Note & Transfer Channels -->
                @if($invoice->status === 'paid')
                    <!-- Tampilan Khusus Invoice LUNAS: Rekening & E-Wallet Disembunyikan Sesuai Permintaan -->
                    <div style="background-color: #ecfdf5; border-left: 4px solid #10b981; padding: 14px 18px; border-radius: 8px; margin-bottom: 25px; font-size: 12.5px; color: #065f46; line-height: 1.5;">
                        <div style="font-weight: 800; color: #047857; margin-bottom: 4px; font-size: 13.5px;">
                            ✓ STATUS: TAGIHAN TELAH LUNAS (PAID)
                        </div>
                        <div>
                            Terima kasih atas pembayaran penuh yang telah Anda lakukan. Dokumen invoice ini merupakan bukti transaksi yang sah dari <strong>{{ $settings['company_legal_name'] ?? 'CV. Beranda Teknologi Digital' }}</strong>.
                        </div>
                    </div>
                @else
                    <!-- Tampilan Invoice Belum Lunas / Baru DP: Symmetrical Official Bank & E-Wallet Grid -->
                    <div style="background-color: #f8fafc; border: 1px solid #e2e8f0; border-left: 4px solid #269DB9; padding: 16px 18px; border-radius: 8px; margin-bottom: 25px; font-size: 12px; color: #334155; line-height: 1.5;">
                        <div style="font-weight: 800; color: #0f172a; margin-bottom: 4px; font-size: 13px;">
                            💳 Channel Pembayaran & Transfer Resmi:
                        </div>
                        @if(!empty($invoice->notes))
                            <div style="margin-bottom: 6px; font-weight: 600; color: #1e293b;">{{ $invoice->notes }}</div>
                        @endif
                        <div style="margin-bottom: 12px; color: #64748b; font-size: 11.5px;">
                            Pembayaran dapat ditransfer ke salah satu rekening atau e-wallet resmi berikut:
                        </div>

                        <!-- 4 Bank Resmi: Grid Simetris 2 Kolom dengan Logo & Tombol Salin -->
                        <table width="100%" cellpadding="0" cellspacing="6" style="border-collapse: separate; margin-bottom: 8px;">
                            <tr>
                                <!-- BSI -->
                                <td width="50%" style="background-color: #ffffff; border: 1px solid #cbd5e1; border-radius: 6px; padding: 8px 10px; vertical-align: middle;">
                                    <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                        <tr>
                                            <td width="48" style="vertical-align: middle;">
                                                <img src="{{ asset('images/banks/bsi.png') }}" alt="BSI" height="18" style="max-height: 18px; max-width: 46px; display: block; border: 0;" />
                                            </td>
                                            <td style="vertical-align: middle; padding-left: 6px;">
                                                <div style="font-size: 9px; font-weight: 800; color: #269DB9; text-transform: uppercase;">BSI</div>
                                                <div style="font-family: monospace; font-size: 12px; font-weight: bold; color: #0f172a;">8926301510</div>
                                            </td>
                                            <td align="right" style="vertical-align: middle;">
                                                <a href="{{ route('invoices.verify', ['invoice_number' => $invoice->invoice_number, 'copy' => '8926301510']) }}" target="_blank" style="background-color: #f1f5f9; color: #334155; border: 1px solid #cbd5e1; padding: 4px 7px; border-radius: 4px; text-decoration: none; font-size: 10px; font-weight: 700; display: inline-block; white-space: nowrap;">📋 Salin</a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <!-- BRI -->
                                <td width="50%" style="background-color: #ffffff; border: 1px solid #cbd5e1; border-radius: 6px; padding: 8px 10px; vertical-align: middle;">
                                    <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                        <tr>
                                            <td width="48" style="vertical-align: middle;">
                                                <img src="{{ asset('images/banks/bri.png') }}" alt="BRI" height="18" style="max-height: 18px; max-width: 46px; display: block; border: 0;" />
                                            </td>
                                            <td style="vertical-align: middle; padding-left: 6px;">
                                                <div style="font-size: 9px; font-weight: 800; color: #269DB9; text-transform: uppercase;">BRI</div>
                                                <div style="font-family: monospace; font-size: 12px; font-weight: bold; color: #0f172a;">563701043113533</div>
                                            </td>
                                            <td align="right" style="vertical-align: middle;">
                                                <a href="{{ route('invoices.verify', ['invoice_number' => $invoice->invoice_number, 'copy' => '563701043113533']) }}" target="_blank" style="background-color: #f1f5f9; color: #334155; border: 1px solid #cbd5e1; padding: 4px 7px; border-radius: 4px; text-decoration: none; font-size: 10px; font-weight: 700; display: inline-block; white-space: nowrap;">📋 Salin</a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <!-- Bank Jago Syariah -->
                                <td width="50%" style="background-color: #ffffff; border: 1px solid #cbd5e1; border-radius: 6px; padding: 8px 10px; vertical-align: middle;">
                                    <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                        <tr>
                                            <td width="52" style="vertical-align: middle;">
                                                <img src="{{ asset('images/banks/jago.png') }}" alt="Bank Jago Syariah" height="18" style="max-height: 18px; max-width: 50px; display: block; border: 0;" />
                                            </td>
                                            <td style="vertical-align: middle; padding-left: 6px;">
                                                <div style="font-size: 8.5px; font-weight: 800; color: #269DB9; text-transform: uppercase;">Bank Jago Syariah</div>
                                                <div style="font-family: monospace; font-size: 12px; font-weight: bold; color: #0f172a;">504724018833</div>
                                            </td>
                                            <td align="right" style="vertical-align: middle;">
                                                <a href="{{ route('invoices.verify', ['invoice_number' => $invoice->invoice_number, 'copy' => '504724018833']) }}" target="_blank" style="background-color: #f1f5f9; color: #334155; border: 1px solid #cbd5e1; padding: 4px 7px; border-radius: 4px; text-decoration: none; font-size: 10px; font-weight: 700; display: inline-block; white-space: nowrap;">📋 Salin</a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <!-- SeaBank -->
                                <td width="50%" style="background-color: #ffffff; border: 1px solid #cbd5e1; border-radius: 6px; padding: 8px 10px; vertical-align: middle;">
                                    <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                        <tr>
                                            <td width="48" style="vertical-align: middle;">
                                                <img src="{{ asset('images/banks/seabank.png') }}" alt="SeaBank" height="18" style="max-height: 18px; max-width: 46px; display: block; border: 0;" />
                                            </td>
                                            <td style="vertical-align: middle; padding-left: 6px;">
                                                <div style="font-size: 9px; font-weight: 800; color: #269DB9; text-transform: uppercase;">SeaBank</div>
                                                <div style="font-family: monospace; font-size: 12px; font-weight: bold; color: #0f172a;">901020639279</div>
                                            </td>
                                            <td align="right" style="vertical-align: middle;">
                                                <a href="{{ route('invoices.verify', ['invoice_number' => $invoice->invoice_number, 'copy' => '901020639279']) }}" target="_blank" style="background-color: #f1f5f9; color: #334155; border: 1px solid #cbd5e1; padding: 4px 7px; border-radius: 4px; text-decoration: none; font-size: 10px; font-weight: 700; display: inline-block; white-space: nowrap;">📋 Salin</a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <!-- E-Wallet: ShopeePay / DANA / OVO / GoPay -->
                        <div style="background-color: #ffffff; border: 1px solid #cbd5e1; border-radius: 6px; padding: 8px 12px; margin-bottom: 8px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                <tr>
                                    <td style="vertical-align: middle;">
                                        <div style="display: inline-block; margin-right: 8px; vertical-align: middle;">
                                            <img src="{{ asset('images/banks/shopeepay.png') }}" alt="ShopeePay" height="15" style="max-height: 15px; max-width: 38px; display: inline-block; vertical-align: middle; margin-right: 4px; border: 0;" />
                                            <img src="{{ asset('images/banks/dana.png') }}" alt="DANA" height="15" style="max-height: 15px; max-width: 38px; display: inline-block; vertical-align: middle; margin-right: 4px; border: 0;" />
                                            <img src="{{ asset('images/banks/ovo.png') }}" alt="OVO" height="15" style="max-height: 15px; max-width: 38px; display: inline-block; vertical-align: middle; margin-right: 4px; border: 0;" />
                                            <img src="{{ asset('images/banks/gopay.png') }}" alt="GoPay" height="15" style="max-height: 15px; max-width: 38px; display: inline-block; vertical-align: middle; border: 0;" />
                                        </div>
                                        <div style="display: inline-block; vertical-align: middle;">
                                            <div style="font-size: 9px; font-weight: 700; color: #64748b;">E-Wallet (ShopeePay/DANA/OVO/GoPay)</div>
                                            <div style="font-family: monospace; font-size: 12px; font-weight: bold; color: #0f172a;">085267774878</div>
                                        </div>
                                    </td>
                                    <td align="right" style="vertical-align: middle;">
                                        <a href="{{ route('invoices.verify', ['invoice_number' => $invoice->invoice_number, 'copy' => '085267774878']) }}" target="_blank" style="background-color: #f1f5f9; color: #334155; border: 1px solid #cbd5e1; padding: 4px 7px; border-radius: 4px; text-decoration: none; font-size: 10px; font-weight: 700; display: inline-block; white-space: nowrap;">📋 Salin</a>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div style="font-size: 11px; color: #64748b; border-top: 1px dashed #cbd5e1; padding-top: 6px; margin-top: 6px;">
                            Semua a.n. <strong style="color: #0f172a;">Septa Ryan Hidayat</strong> &bull; Konfirmasi WA ke <strong>{{ $settings['contact_phone'] ?? '0896 9524 9089' }}</strong>
                        </div>
                    </div>
                @endif

                <!-- Action Button -->
                <div style="text-align: center; margin: 30px 0 10px 0;">
                    <a href="{{ route('invoices.verify', $invoice->invoice_number) }}" target="_blank" style="display: inline-block; background-color: #269DB9; color: #ffffff; text-decoration: none; font-weight: 800; font-size: 14px; padding: 14px 28px; border-radius: 8px; box-shadow: 0 4px 10px rgba(38,157,185,0.3);">
                        📄 Buka / Cetak Invoice Resmi Online &rarr;
                    </a>
                </div>
            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td style="background-color: #f8fafc; padding: 20px 30px; text-align: center; font-size: 11px; color: #94a3b8; border-top: 1px solid #e2e8f0;">
                <div style="font-weight: 700; color: #475569; margin-bottom: 4px;">
                    {{ $settings['company_legal_name'] ?? 'CV. Beranda Teknologi Digital' }}
                </div>
                <div>
                    Jl. Sarjana, Timbangan, Ogan Ilir, Sumatera Selatan, Indonesia
                </div>
                <div style="margin-top: 4px;">
                    Website: <a href="https://www.berandadigital.net" style="color: #269DB9; text-decoration: none;">www.berandadigital.net</a> &bull; Email: info@berandadigital.net
                </div>
            </td>
        </tr>
    </table>

</body>
</html>
