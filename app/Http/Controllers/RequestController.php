<?php

namespace App\Http\Controllers;

use App\Models\PetSittingRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        $requests = PetSittingRequest::whereIn('pet_id', auth()->user()->pets()->pluck('id'))
                    ->whereNotIn('status', ['accepted', 'declined'])
                    ->get();

        return view('requests.index', compact('requests'));
    }
    public function accept(Request $httpRequest, PetSittingRequest $request)
    {
        $request->update(['status' => 'accepted']);
        $request->pet->update(['available_for_sitting' => false]);

        return redirect()->route('requests.index')->with('success', 'Request accepted successfully.');
    }
    public function decline(Request $httpRequest, PetSittingRequest $request)
    {
        $request->update(['status' => 'declined']);
        $request->pet->update(['available_for_sitting' => true]);

        return redirect()->route('requests.index')->with('success', 'Request declined successfully.');
    }
}
