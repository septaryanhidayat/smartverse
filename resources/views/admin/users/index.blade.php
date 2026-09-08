@extends('admin.layouts.app')

@section('title', 'Manajemen User & Administrator')

@section('content')
<div class="space-y-6" x-data="{
    isEdit: false,
    editId: null,
    editName: '',
    editEmail: '',
    editAvatar: '',
    updateUrl: '',
    startEdit(user) {
        this.isEdit = true;
        this.editId = user.id;
        this.editName = user.name;
        this.editEmail = user.email;
        this.editAvatar = user.avatar ? user.avatar : '';
        this.updateUrl = '/admin/users/' + user.id;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    },
    cancelEdit() {
        this.isEdit = false;
        this.editId = null;
        this.editName = '';
        this.editEmail = '';
        this.editAvatar = '';
    }
}">
    
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#071330] flex items-center gap-2.5">
                <span>👥</span>
                <span>Manajemen User Administrator</span>
            </h1>
            <p class="text-xs text-slate-500 font-medium mt-1">
                Kelola akun administrator, upload foto profil, ganti email login, dan reset kata sandi.
            </p>
        </div>
        <a href="{{ route('admin.profile.index') }}" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-all flex items-center gap-1.5 border border-slate-200">
            <span>👤 Profil Akun Saya</span>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left: Form Tambah / Edit User -->
        <div class="lg:col-span-5 bg-white p-6 sm:p-7 rounded-3xl border border-slate-200 shadow-sm space-y-5 sticky top-24">
            
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h2 class="text-sm font-extrabold text-[#071330] flex items-center gap-2">
                    <span x-text="isEdit ? '✏️ Edit User Administrator' : '+ Tambah Administrator Baru'"></span>
                </h2>
                <button x-show="isEdit" @click="cancelEdit()" type="button" class="text-xs text-slate-400 hover:text-slate-600 font-bold">
                    ✕ Batal
                </button>
            </div>

            @if ($errors->any())
                <div class="p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold space-y-1">
                    @foreach ($errors->all() as $error)
                        <div>⚠️ {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <!-- Create Form -->
            <form x-show="!isEdit" action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Nama Lengkap *</label>
                    <input type="text" name="name" required placeholder="Nama Administrator" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-medium" />
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Alamat Email Login *</label>
                    <input type="email" name="email" required placeholder="email@berandadigital.net" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-mono" />
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Kata Sandi *</label>
                    <input type="password" name="password" required placeholder="Minimal 6 karakter" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Foto Profil (Opsional)</label>
                    <input type="file" name="avatar_file" accept="image/*" class="block w-full text-xs text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-[11px] file:font-extrabold file:bg-blue-50 file:text-[#3E5CE7] hover:file:bg-blue-100 cursor-pointer" />
                </div>

                <button type="submit" class="w-full py-3 rounded-xl bg-[#3E5CE7] hover:bg-blue-700 text-white font-extrabold text-xs uppercase tracking-wider shadow-md hover:shadow-blue-600/30 transition-all flex items-center justify-center gap-2">
                    <span>+ Simpan Administrator Baru</span>
                </button>
            </form>

            <!-- Edit Form -->
            <form x-show="isEdit" :action="updateUrl" method="POST" enctype="multipart/form-data" class="space-y-4" style="display: none;">
                @csrf
                @method('PUT')
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Nama Lengkap *</label>
                    <input type="text" name="name" x-model="editName" required class="w-full px-4 py-2.5 rounded-xl border border-blue-400 bg-blue-50/20 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-bold" />
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Alamat Email Login *</label>
                    <input type="email" name="email" x-model="editEmail" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none font-mono" />
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Reset Kata Sandi Baru (Opsional)</label>
                    <input type="password" name="password" placeholder="Kosongkan jika tidak ingin diubah" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-[#3E5CE7] focus:outline-none" />
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#071330]">Ganti Foto Profil (Opsional)</label>
                    <input type="file" name="avatar_file" accept="image/*" class="block w-full text-xs text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-[11px] file:font-extrabold file:bg-blue-50 file:text-[#3E5CE7] hover:file:bg-blue-100 cursor-pointer" />
                </div>

                <div class="flex items-center gap-2 pt-1">
                    <button type="button" @click="cancelEdit()" class="flex-1 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-all">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-xs uppercase shadow-md transition-all">
                        Simpan Perubahan
                    </button>
                </div>
            </form>

        </div>

        <!-- Right: Table Daftar Users -->
        <div class="lg:col-span-7 bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-slate-50/80 border-b border-slate-200 text-slate-500 font-extrabold uppercase tracking-wider text-[10px]">
                            <th class="py-4 px-6">User</th>
                            <th class="py-4 px-4">Role</th>
                            <th class="py-4 px-4">Terdaftar</th>
                            <th class="py-4 px-6 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">
                        @foreach($users as $u)
                            <tr class="hover:bg-slate-50/80 transition-colors" :class="editId === {{ $u->id }} ? 'bg-blue-50/40' : ''">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl overflow-hidden bg-gradient-to-br from-[#071330] to-[#3E5CE7] text-white flex items-center justify-center font-black text-xs shrink-0 shadow-xs border border-slate-200">
                                            @if($u->avatar)
                                                <img src="{{ asset($u->avatar) }}" alt="{{ $u->name }}" class="w-full h-full object-cover" />
                                            @else
                                                <span>{{ strtoupper(substr($u->name, 0, 1)) }}</span>
                                            @endif
                                        </div>
                                        <div class="overflow-hidden">
                                            <div class="font-extrabold text-slate-900 text-xs flex items-center gap-1.5">
                                                <span>{{ $u->name }}</span>
                                                @if($u->id === Auth::id())
                                                    <span class="px-1.5 py-0.5 rounded-md bg-blue-100 text-[#3E5CE7] text-[9px] font-black">ANDA</span>
                                                @endif
                                            </div>
                                            <div class="text-[11px] text-slate-500 font-mono">{{ $u->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[10px] uppercase border border-emerald-200">
                                        Admin
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-slate-500 font-mono text-[11px]">
                                    {{ optional($u->created_at)->format('d M Y') }}
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <!-- Edit Button -->
                                        <button type="button" 
                                                @click="startEdit({ id: {{ $u->id }}, name: '{{ addslashes($u->name) }}', email: '{{ addslashes($u->email) }}', avatar: '{{ $u->avatar ? asset($u->avatar) : '' }}' })"
                                                class="px-3 py-1.5 rounded-lg bg-blue-50 hover:bg-blue-100 text-[#3E5CE7] font-bold text-xs transition-all flex items-center gap-1 border border-blue-200/60 shadow-2xs">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                            <span>Edit</span>
                                        </button>

                                        <!-- Delete Button (Disabled for self) -->
                                        @if($u->id !== Auth::id())
                                            <form action="{{ route('admin.users.destroy', $u->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus user {{ addslashes($u->name) }}?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-2.5 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-600 font-bold text-xs transition-all border border-rose-200/60 shadow-2xs">
                                                    Hapus
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-slate-100">
                {{ $users->links() }}
            </div>
        </div>

    </div>

</div>
@endsection
