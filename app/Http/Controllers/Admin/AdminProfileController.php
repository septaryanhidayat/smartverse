<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class AdminProfileController extends Controller
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
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $this->ensureAvatarColumnExists();
        /** @var User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'new_password' => 'nullable|min:6|confirmed',
            'avatar_file' => 'nullable|image|max:25600',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if ($request->hasFile('avatar_file')) {
            $path = UploadHelper::upload($request->file('avatar_file'), 'avatars');
            if ($path) {
                $user->avatar = $path;
            }
        }

        if (!empty($validated['new_password'])) {
            $user->password = $validated['new_password'];
        }

        $user->save();

        return redirect()->route('admin.profile.index')->with('success', 'Profil dan foto akun administrator berhasil diperbarui.');
    }
}
