@extends('errors.layout')

@section('title', '419 - Sesi Kedaluwarsa')
@section('badge', 'Status 419 - Session Expired')
@section('heading', 'Sesi Akses Telah Berakhir')

@section('illustration')
<div class="relative anim-float">
    <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-3xl bg-indigo-50 dark:bg-indigo-950/60 border border-indigo-200/80 dark:border-indigo-800 flex items-center justify-center text-5xl sm:text-6xl shadow-inner text-indigo-500">
        ⏱️
    </div>
    <span class="absolute -top-2 -right-2 px-2.5 py-0.5 rounded-full bg-indigo-600 text-white text-[10px] font-black mono shadow-md">
        419
    </span>
</div>
@endsection

@section('message')
<p>
    Sesi keamanan halaman telah berakhir karena formulir atau halaman tidak aktif dalam beberapa waktu.
</p>
<p class="text-xs text-slate-500 dark:text-slate-400">
    Silakan muat ulang (refresh) halaman ini untuk memperbarui token keamanan dan melanjutkan kembali aktivitas Anda.
</p>
@endsection
