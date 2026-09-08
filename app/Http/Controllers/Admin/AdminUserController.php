<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class AdminUserController extends Controller
{
    private function ensureAvatarColumnExists(): void
    {
        if (!Schema::hasColumn('users', 'avatar')) {
            try {
                Schema::table('users', function ($table) {
                    $table->string('avatar')->nullable()->after('email');
                });
            } catch (\Throwable $e) {
                // Ignore if already exists
            }
        }
    }

    public function index()
    {
        $this->ensureAvatarColumnExists();
        $users = User::latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $this->ensureAvatarColumnExists();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'avatar_file' => 'nullable|image|max:25600',
        ]);

        $avatarPath = null;
        if ($request->hasFile('avatar_file')) {
            $avatarPath = UploadHelper::upload($request->file('avatar_file'), 'avatars');
        }

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'avatar' => $avatarPath,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User / Administrator baru berhasil ditambahkan.');
    }

    public function update(Request $request, User $user)
    {
        $this->ensureAvatarColumnExists();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'avatar_file' => 'nullable|image|max:25600',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if ($request->hasFile('avatar_file')) {
            $avatarPath = UploadHelper::upload($request->file('avatar_file'), 'avatars');
            if ($avatarPath) {
                $user->avatar = $avatarPath;
            }
        }

        if (!empty($validated['password'])) {
            $user->password = $validated['password'];
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', "Data user '{$user->name}' berhasil diperbarui.");
    }

    public function destroy(User $user)
    {
        if ($user->id === Auth::id()) {
            return redirect()->route('admin.users.index')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri yang sedang aktif digunakan.');
        }

        if (User::count() <= 1) {
            return redirect()->route('admin.users.index')->with('error', 'Tidak dapat menghapus user karena ini adalah satu-satunya akun administrator yang tersisa.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User administrator berhasil dihapus.');
    }
}
