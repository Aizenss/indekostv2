<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function buat(Request $request)
    {
        $user_id = Auth::user()->id;
        $kost_request =  $request->kos_id;
        $kost_id = Kos::find($kost_request);

        $validatedData = $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'ulasan' => 'required|string|min:3|max:255',
        ], [
            'rating.required' => 'Rating harus diisi.',
            'rating.numeric' => 'Rating harus berupa angka.',
            'rating.min' => 'Rating minimal adalah 1.',
            'rating.max' => 'Rating maksimal adalah 5.',
            'ulasan.required' => 'Ulasan harus diisi.',
            'ulasan.string' => 'Ulasan harus berupa teks.',
            'ulasan.min' => 'Ulasan harus memiliki paling sedikit 3 karakter.',
            'ulasan.max' => 'Ulasan tidak boleh lebih dari 255 karakter.',
        ]);

        ulasan::create([
            'user_id' => $user_id,
            'kost_id' => $kost_id->id,
            'rating' => $request->rating,
            'ulasan' => $request->ulasan
        ]);

        return redirect()->back();
    }
}
