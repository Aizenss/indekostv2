<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;

class ListKosController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('cari');
        $ketentuan = $request->jenis_kost;
        $harga = $request->harga;
        $rating = $request->rating;

        $kost = Kos::where('status', 'setuju')
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
                })
                ->withCount(['ulasan as jumlah_ulasan_rating_5' => function ($subQuery) {
                    $subQuery->where('rating', 5);
                }])
                ->orderByDesc('jumlah_ulasan_rating_5');
            })
            ->when($rating == '4', function ($query) {
                $query->whereHas('ulasan', function ($subQuery) {
                    $subQuery->where('rating', 4);
                })
                ->withCount(['ulasan as jumlah_ulasan_rating_4' => function ($subQuery) {
                    $subQuery->where('rating', 4);
                }])
                ->orderByDesc('jumlah_ulasan_rating_4');
            })
            ->when($rating == '3', function ($query) {
                $query->whereHas('ulasan', function ($subQuery) {
                    $subQuery->where('rating', 3);
                })
                ->withCount(['ulasan as jumlah_ulasan_rating_3' => function ($subQuery) {
                    $subQuery->where('rating', 3);
                }])
                ->orderByDesc('jumlah_ulasan_rating_3');
            })
            ->paginate(5);
        return view('user.listkost', compact('kost', 'keyword', 'harga', 'ketentuan', 'rating'));
    }
}
