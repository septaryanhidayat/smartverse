@extends('errors.layout')

@section('title', '404 - Halaman Tidak Ditemukan')
@section('badge', 'Error 404 - Page Not Found')
@section('heading', 'Halaman Tidak Ditemukan')

@section('illustration')
<div class="relative anim-float">
    <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-3xl bg-blue-50 dark:bg-blue-950/60 border border-blue-200/80 dark:border-blue-800 flex items-center justify-center text-5xl sm:text-6xl shadow-inner">
        🔍
    </div>
    <span class="absolute -top-2 -right-2 px-2.5 py-0.5 rounded-full bg-[#fe6000] text-white text-[10px] font-black mono shadow-md">
        404
    </span>
</div>
@endsection

@section('message')
<p>
    Maaf, tautan atau halaman yang Anda tuju tidak ditemukan, telah dipindahkan, atau alamat URL yang dimasukkan kurang tepat.
</p>
<p class="text-xs text-slate-500 dark:text-slate-400">
    Silakan kembali ke halaman utama kami atau gunakan tautan bantuan di bawah jika Anda memerlukan panduan navigasi.
</p>
@endsection
