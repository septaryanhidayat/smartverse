@extends('errors.layout')

@section('title', '500 - Terjadi Kendala Sistem')
@section('badge', 'Status 500 - Server Optimization')
@section('heading', 'Terjadi Kendala Teknis')

@section('illustration')
<div class="relative anim-float">
    <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-3xl bg-amber-50 dark:bg-amber-950/60 border border-amber-200/80 dark:border-amber-800 flex items-center justify-center text-5xl sm:text-6xl shadow-inner text-amber-500">
        ⚙️
    </div>
    <span class="absolute -top-2 -right-2 px-2.5 py-0.5 rounded-full bg-red-500 text-white text-[10px] font-black mono shadow-md">
        500
    </span>
</div>
@endsection

@section('message')
<p class="font-medium text-slate-700 dark:text-slate-200">
    Maaf atas ketidaknyamanannya. Server kami sedang mengalami sedikit kendala pemrosesan data atau sedang dalam penyesuaian berkala.
</p>
<p class="text-xs text-slate-500 dark:text-slate-400">
    Untuk menjaga keamanan sistem informasi, detail teknis dan kode pemrograman tidak ditampilkan ke publik. Tim teknis kami telah menerima notifikasi perbaikan.
</p>
@endsection
