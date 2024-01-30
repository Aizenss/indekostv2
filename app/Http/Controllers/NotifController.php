<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifController extends Controller
{
    //
    public function update(Request $request)
    {
        if(Auth::user()->role == 'user')
        {
            $noReadTrackings = Notifikasi::where('status', 'no read')->get();

            // Update status to 'read'
            foreach ($noReadTrackings as $tracking) {
                $tracking->update(['status' => 'read']);
            }
        } elseif (Auth::user()->role == 'owner') {
            $noReadTrackings = Notifikasi::where('status_owner', 'no read')->get();
            // Update status to 'read'
            foreach ($noReadTrackings as $tracking) {
                $tracking->update(['status_owner' => 'read']);
            }
        }

        return redirect()->back();
        // return response()->json([
        //     'message' => 'All no read trackings have been updated to read status.',
        //     'updated_count' => $noReadTrackings->count(),
        // ]);
    }
}
