@extends('admin.layouts.app')

@section('title', 'Pengaturan Akun & Profil Administrator')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-[#071330] flex items-center gap-2.5">
                <span>👤</span>
                <span>Pengaturan Akun Saya</span>
            </h1>
            <p class="text-xs text-slate-500 font-medium mt-1">
                Perbarui foto profil, nama lengkap, alamat email login, dan kata sandi akun Anda.
            </p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="px-4 py-2 rounded-xl bg-blue-50 hover:bg-blue-100 text-[#3E5CE7] font-bold text-xs transition-all flex items-center gap-1.5 border border-blue-200">
            <span>👥 Kelola Semua User &rarr;</span>
        </a>
    </div>

    <!-- Profile Form Card -->
    <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm space-y-8">
        
        @if ($errors->any())
            <div class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold space-y-1">
                @foreach ($errors->all() as $error)
                    <div class="flex items-center gap-2">
                        <span>⚠️</span>
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-7">
            @csrf
            @method('PUT')

            <!-- Avatar Upload & Identity Header -->
            <div class="flex flex-col sm:flex-row items-center gap-6 p-6 rounded-2xl bg-slate-50 border border-slate-200">
                <div class="relative group shrink-0">
                    <div class="w-24 h-24 rounded-2xl overflow-hidden bg-gradient-to-br from-[#071330] to-[#3E5CE7] text-white flex items-center justify-center font-black text-3xl shadow-md border-2 border-white">
                        <img id="avatar_preview" 
                             src="{{ $user->avatar ? asset($user->avatar) : '' }}" 
                             alt="{{ $user->name }}" 
                             class="w-full h-full object-cover {{ $user->avatar ? '' : 'hidden' }}" />
                        <span id="avatar_initial" class="{{ $user->avatar ? 'hidden' : '' }}">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </span>
                    </div>
                </div>

                <div class="space-y-2 text-center sm:text-left flex-1">
                    <div>
                        <h2 class="text-base font-extrabold text-[#071330]">{{ $user->name }}</h2>
                        <p class="text-xs text-slate-500 font-mono">{{ $user->email }}</p>
                    </div>
                    
                    <div class="space-y-1">
                        <label class="inline-block text-xs font-bold text-slate-700">Ganti Foto Profil (Avatar):</label>
                        <input type="file" name="avatar_file" accept="image/*" onchange="previewUserAvatar(this)" class="block w-full text-xs text-slate-500 file:mr-3 file:py-1.5 file:px-3.5 file:rounded-xl file:border-0 file:text-xs file:font-extrabold file:bg-[#3E5CE7] file:text-white hover:file:bg-blue-700 cursor-pointer" />
                        <span class="text-[11px] text-slate-400">Format: JPG, PNG, WebP. Maksimal 3MB.</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama -->
                <div class="space-y-1.5 md:col-span-2">
                    <label class="block text-xs font-bold text-[#071330]">Nama Lengkap Administrator *</label>
                    <input type="text" name="name" required value="{{ old('name', $user->name) }}" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-medium" />
                </div>

                <!-- Email -->
                <div class="space-y-1.5 md:col-span-2">
                    <label class="block text-xs font-bold text-[#071330]">Alamat Email Login *</label>
                    <input type="email" name="email" required value="{{ old('email', $user->email) }}" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-mono" />
                    <span class="text-[11px] text-slate-400">Email ini digunakan untuk masuk ke portal admin CMS.</span>
                </div>
            </div>

            <!-- Ganti Password Section -->
            <div class="pt-6 border-t border-slate-100 space-y-4">
                <div>
                    <h3 class="text-sm font-extrabold text-[#071330]">Ganti Kata Sandi (Opsional)</h3>
                    <p class="text-xs text-slate-400">Kosongkan jika Anda tidak ingin mengganti kata sandi saat ini.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-[#071330]">Kata Sandi Baru</label>
                        <input type="password" name="new_password" placeholder="Minimal 6 karakter" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-[#071330]">Konfirmasi Kata Sandi Baru</label>
                        <input type="password" name="new_password_confirmation" placeholder="Ulangi kata sandi baru" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end">
                <button type="submit" class="px-8 py-3.5 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-extrabold text-xs uppercase tracking-wider shadow-lg hover:shadow-blue-600/30 transition-all flex items-center gap-2">
                    <span>Simpan Perubahan Akun & Foto &rarr;</span>
                </button>
            </div>

        </form>

    </div>

</div>

<script>
function previewUserAvatar(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('avatar_preview');
            const initial = document.getElementById('avatar_initial');
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            if (initial) initial.classList.add('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
