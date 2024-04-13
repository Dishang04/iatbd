<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Models\Pet;
use App\Notifications\PetSittingInterest;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        // Fetch notifications for the authenticated user
        $notifications = auth()->user()->unreadNotifications;

        // Mark notifications as read
        $notifications->markAsRead();

        // Return the view with notifications
        return view('notifications.index', compact('notifications'));
    }

    public function showPetSittingInterestForm($petId)
    {
        $pet = Pet::findOrFail($petId);
        return view('pets.sitting_interest_form', compact('pet'));
    }

    public function notifyPetOwner(Request $request, $petId)
    {
        $pet = Pet::findOrFail($petId);

        // Notify pet owner about interest in pet sitting
        $pet->user->notify(new PetSittingInterest(auth()->user(), $pet, $request->message));

        // Redirect back with a success message or perform any other action
        return redirect()->back()->with('success', 'Your interest in pet sitting has been notified to the pet owner.');
    }

    public function notifications()
{
    $user = Auth::user();
    $notifications = $user->unreadNotifications; // Fetch unread notifications for the authenticated user

    // dd($notifications);

    return view('notifications.index', compact('notifications'));
}
}
