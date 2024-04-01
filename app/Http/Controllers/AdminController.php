<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function adminPage()
    // {
    //     return view('admin.adminPage');
    // }

    // public function deleteUser(User $user)
    // {
    //     $user->delete();
    //     return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    // }

    public function deleteUser(User $user)
    {
        // Delete the user
        $user->delete();

        // Redirect back or to any other page
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    // public function showUsers()
    // {
    //     $users = User::all();
    //     return view('admin.users', compact('users'));
    // }
    public function showUsers()
    {
        $users = User::all();
        return view('admin.adminPage', ['users' => $users]);
    }


    public function blockUser(User $user)
    {
        $user->update(['blocked' => true]); // Assuming 'blocked' is a boolean field in the users table
        return redirect()->back()->with('success', 'User blocked successfully.');
    }


    // public function unblockUser(User $user)
    // {
    //     // Logic to unblock the user
    // }
}
