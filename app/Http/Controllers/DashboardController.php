<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kos;
use App\Models\User;
use App\Models\Kamar;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        $grafikDataCollection = [];

        for ($month = 1; $month <= 5; $month++) {
            $date = Carbon::createFromDate($currentYear, $currentMonth, 1);
            $yearMonth = $date->isoFormat('MMMM');

            $color = ($month == $currentMonth) ? 'blue' : 'green';

            $grafikData = Transaksi::whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->pluck('nominal_admin')->sum();
            $grafikData3 = Kamar::whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)->count();
            $grafikData4 = Kos::whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)->count();


            $grafikDataCollection[] = [
                'year' => $currentYear,
                'month' => $yearMonth,
                'color' => $color,
                'data' => $grafikData,
                'data3' => $grafikData3,
                'data4' => $grafikData4,
            ];

            $currentMonth++;
            if ($currentMonth > 12) {
                $currentMonth = 1;
                $currentYear++;
            }
        }

        $data = array_values($grafikDataCollection);


        $owner = User::where('role', 'owner')->count();
        $kos = Kos::count();
        $kos = Kos::count();
        $kamar = Kamar::count();

        // dd($data);

        return view('admin.dashboardadmin', compact('data', 'owner', 'kos', 'kamar'));
    }
}
