@extends('errors.layout')

@section('title', '403 - Akses Dibatasi')
@section('badge', 'Status 403 - Access Restricted')
@section('heading', 'Akses Halaman Dibatasi')

@section('illustration')
<div class="relative anim-float">
    <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-3xl bg-rose-50 dark:bg-rose-950/60 border border-rose-200/80 dark:border-rose-800 flex items-center justify-center text-5xl sm:text-6xl shadow-inner text-rose-500">
        🔒
    </div>
    <span class="absolute -top-2 -right-2 px-2.5 py-0.5 rounded-full bg-rose-600 text-white text-[10px] font-black mono shadow-md">
        403
    </span>
</div>
@endsection

@section('message')
<p>
    Anda tidak memiliki hak otorisasi atau izin untuk mengakses direktori atau data pada halaman ini.
</p>
<p class="text-xs text-slate-500 dark:text-slate-400">
    Jika Anda pengelola resmi sistem ini, pastikan Anda telah masuk (login) menggunakan akun administrator yang memiliki hak akses memadai.
</p>
@endsection
