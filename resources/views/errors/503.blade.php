@extends('errors.layout')

@section('title', '503 - Pemeliharaan Sistem')
@section('badge', 'Status 503 - Maintenance Mode')
@section('heading', 'Sedang Dalam Pemeliharaan')

@section('illustration')
<div class="relative anim-float">
    <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-3xl bg-cyan-50 dark:bg-cyan-950/60 border border-cyan-200/80 dark:border-cyan-800 flex items-center justify-center text-5xl sm:text-6xl shadow-inner text-cyan-500">
        🚀
    </div>
    <span class="absolute -top-2 -right-2 px-2.5 py-0.5 rounded-full bg-cyan-600 text-white text-[10px] font-black mono shadow-md">
        503
    </span>
</div>
@endsection

@section('message')
<p>
    Layanan kami sedang dalam proses pembaruan fitur dan pemeliharaan server berkala guna meningkatkan performa dan keamanan sistem.
</p>
<p class="text-xs text-slate-500 dark:text-slate-400">
    Sistem akan segera kembali online dalam beberapa saat. Untuk kebutuhan mendesak, silakan hubungi tim kami via WhatsApp.
</p>
@endsection
