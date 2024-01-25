<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kamar;
use Illuminate\Http\Request;

class KelolaOwnerController extends Controller
{
    public function index()
    {
        $owners = auth()->user();

        $owners = User::where('id', '!=',  $owners->id)
            ->where('role',  'owner')
            ->get();
        return view('admin.kelolaowner', compact('owners'));
    }



    public function show(User $owner)
    {
        $owner = User::find($owner);

        if (!$owner) {
            return redirect()->route('owner.show')->with('error', 'User tidak ditemukan');
        }
        return view('owner.show', ['user' => $owner]);
    }
    public function delete(User $owner)
    {
        // Add validation or authorization checks as needed

        // Perform the delete action
        $owner->delete();

        // Redirect back to the owner list with a success message
        return redirect()->route('kelola-admin')->with('success', 'Owner deleted successfully');
    }
}
