<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\PasswordUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd($request);
        $request->user()->update($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('success', 'profile berhasil di update');
    }

    /**
     * Delete the user's account.
     */
    public function passwordupdate(PasswordUpdateRequest $request): RedirectResponse
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'new_password_confirm' => 'required|same:new_password', // Perubahan pada baris ini
        ], [
            'old_password.required' => 'Password Lama harus diisi',
            'new_password.required' => 'Password Baru harus diisi',
            'new_password.min' => 'Password Baru minimal harus 8 karakter',
            'new_password_confirm.required' => 'Konfirmasi Password harus diisi',
            'new_password_confirm.same' => 'Konfirmasi Password tidak cocok dengan Password Baru',
        ]);

        if (!Hash::check($request->old_password, $request->user()->password)) {
            return redirect()->back()->with('error', 'Password lama tidak cocok');
        }

        $request->user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return Redirect::route('profile.edit')->with('success', 'Password berhasil diperbarui');
    }


    public function uploadfoto(Request $request)
    {
        $request->validate([
            'foto' => ['required','image', 'max:10000']
        ]);

        if ($request->file('foto')) {
            $file = $request->file('foto');
            $foto = date('YmdHi') . $file->getClientOriginalName();
            $pathFotoLama = public_path('profiles') . '/' . $request->user()->foto;
            if (file_exists($pathFotoLama) && $request->user()->foto != 'default.png') {
                unlink($pathFotoLama);
            }
            $file->move(public_path('profiles'), $foto);
        }

        $request->user()->update([
            'foto' => $foto
        ]);

        return Redirect::route('profile.edit')->with('success', 'foto profile berhasil di update');

    }
}
