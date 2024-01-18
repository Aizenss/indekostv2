<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kos;
use App\Models\Kamar;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\PendapatanOwnerChart;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    //
    public function index()
    {
        $login = Auth::user();
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        $grafikDataCollection = [];

        for ($month = 1; $month <= 5; $month++) {
            $date = Carbon::createFromDate($currentYear, $currentMonth, 1);
            $yearMonth = $date->isoFormat('MMMM');

            $color = ($month == $currentMonth) ? 'blue' : 'green';

            $grafikData = Transaksi::whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->where('owner_id', $login->id)
                ->pluck('nominal_owner')
                ->sum();

            $grafikData2 = Kamar::whereHas('kos', function ($query) use ($login) {
                $query->where('owner_id', $login->id);
            })
                ->whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->where('status', 'paid')
                ->count();

            // dd($grafikData2);

            $grafikDataCollection[] = [
                'year' => $currentYear,
                'month' => $yearMonth,
                'color' => $color,
                'data' => $grafikData,
                'data2' => $grafikData2,
            ];

            // "$grafikData";

            $currentMonth++;
            if ($currentMonth > 12) {
                $currentMonth = 1;
                $currentYear++;
            }
        }

        $data = array_values($grafikDataCollection);

        $kos = Kos::where('owner_id', $login->id)->count();
        $kamar = Kamar::where('status', 'paid')->count();


        return view('owner.dashboard', compact('data', 'kos', 'kamar'));
    }
}
