<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FooterController extends Controller
{
    public function index()
    {
        $footer = Footer::first(); // Assuming you want to edit the first footer, you can adjust this as needed

        return view('admin.footer', compact('footer'));
    }


    public function edit()
    {
        $user = Auth::user();
        $footer = Footer::first();
        if ($footer) {
            return view('layout.footer', ['footer' => $footer]);
        } else {
            return redirect()->back()->with('error', 'Footer not found');
        }
    }


    public function tambah()
    {
        return view('admin.footer');
    }

    public function update(Request $request, Footer $footer)

    {
        $request->validate([
            'kalimat' => 'required|min:10',
            'alamat' => 'required|min:10',
            'email' => 'required|email|ends_with:@gmail.com',
            'nomorhp' => 'required|numeric|digits_between:10,13',
            'linkinsta' => 'required|url',
            'linkyt' => 'required|url',
            'linktwitter' => 'required|url',
        ], [
            'kalimat.required' => 'Kalimat minimal 10 karakter',
            'alamat.required' => 'Alamat minimal 10 karakter',
            'email.required' => 'Email harus lengkap',
            'email.email' => 'Format email tidak valid',
            'email.ends_with' => 'Email harus berakhiran @gmail.com',
            'nomorhp.required' => 'Nomor Handphone harus diisi',
            'nomorhp.numeric' => 'Nomor Handphone harus berupa angka',
            'nomorhp.digits_between' => 'Nomor Handphone harus terdiri antara 10 sampai 13 digit',
            'linkinsta.required' => 'Harus di isi',
            'linkinsta.url' => 'Masukkan link Instagram yang sesuai',
            'linktwitter.required' => 'Harus di isi',
            'linktwitter.url' => 'Masukkan link Twitter yang sesuai',
            'linkyt.required' => 'Harus di isi',
            'linkyt.url' => 'Masukkan link Youtube yang sesuai',
        ]);

        $footer->update($request->all());

        return redirect()->route('admin.footer')->with('success', 'Footer berhasil diperbarui.');
    }
}
