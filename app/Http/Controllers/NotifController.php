<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\Tracking;
use Illuminate\Http\Request;

class NotifController extends Controller
{
    //
    public function update(Request $request)
    {
        // Fetch all no read tracking records
        $noReadTrackings = Notifikasi::where('status', 'no read')->get();

        // Update status to 'read'
        foreach ($noReadTrackings as $tracking) {
            $tracking->update(['status' => 'read']);
        }

        return redirect()->back();
        // return response()->json([
        //     'message' => 'All no read trackings have been updated to read status.',
        //     'updated_count' => $noReadTrackings->count(),
        // ]);
    }
}
