<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\Kamar;
use App\Models\ulasan;
use Illuminate\Http\Request;

class DetailKostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Kos $kos)
    {
        $totalRating = 0;
        $numberOfRatings = count($kos->ulasan);

        foreach ($kos->ulasan as $rating) {
            $totalRating += $rating->rating;
        }

        $averageRating = $numberOfRatings > 0 ? number_format(round($totalRating / $numberOfRatings, 2), 1, '.', ',') : 0;

        $ratings = ulasan::where('kost_id', $kos->id)->get();
        $kamars = Kamar::where('kos_id', $kos->id)->paginate(6);
        return view('user.detailkost', compact('kos', 'kamars', 'ratings', 'averageRating', 'numberOfRatings' ));
    }
}
