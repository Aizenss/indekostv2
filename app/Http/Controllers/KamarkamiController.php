<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;

class KamarkamiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('cari');
        $ketentuan = $request->jenis_kost;
        $harga = $request->harga;
        $rating = $request->rating;

        $kost = Kos::where('status', 'setuju')
            ->when($ketentuan == 'Laki-laki', function ($query) use ($request) {
                $query->where('ketentuan',  'Laki-laki');
            })
            ->when($ketentuan == 'Perempuan', function ($query) use ($request) {
                $query->where('ketentuan',  'Perempuan');
            })
            ->when($ketentuan == 'Campur', function ($query) use ($request) {
                $query->where('ketentuan',  'Campur');
            })
            ->when($harga == 'asc', function ($query) use ($request) {
                $query->orderBy('harga');
            })
            ->when($harga == 'desc', function ($query) use ($request) {
                $query->orderByDesc('harga');
            })
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('nama_kost', 'like', '%' . $keyword . '%');
            })
            ->when($rating == '5', function ($query) {
                $query->whereHas('ulasan', function ($subQuery) {
                    $subQuery->where('rating', 5);
            });
            })->paginate(5);
        return view('user.kamarkami', compact('kost', 'keyword', 'harga', 'ketentuan', 'rating'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
