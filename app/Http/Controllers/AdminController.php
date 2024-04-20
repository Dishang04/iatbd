<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showUsers(Request $request)
    {
        $search = $request->input('search');
        
        $usersQuery = User::query();

        if ($search) {
            $usersQuery->where('name', 'LIKE', '%' . $search . '%');
        }

        $users = $usersQuery->where('blocked', false)->where('admin', false)->get();
        $blockedUsers = User::where('blocked', true)->get();

        return view('admin.adminPage', compact('users', 'blockedUsers'));
    }


    public function blockUser(User $user)
    {
        $user->update(['blocked' => true]);
        return redirect()->back()->with('success', 'User blocked successfully.');
    }

    public function unblockUser(User $user)
    {
        $user->update(['blocked' => false]);

        return redirect()->back()->with('success', 'User unblocked successfully.');
    }
}