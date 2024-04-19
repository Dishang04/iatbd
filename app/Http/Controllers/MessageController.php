<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Pet;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Pet $pet): View
    {
        return view('pets.messages', [
            'messages' => Message::where('pet_id', $pet->id)->with('user')->latest()->get(),
            'pet' => $pet,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
            'pet_id' => 'required',
        ]);
    
        if (!$validated['pet_id']) {
            return back()->withErrors(['pet_id' => 'Pet ID is required.'])->withInput();
        }
    
        $request->user()->messages()->create($validated);
        $pet = Pet::findOrFail($validated['pet_id']);
    
        return redirect()->route('messages.index', $pet);
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message): View
    {
        Gate::authorize('update', $message);
        $pet = $message->pet;

        return view('pets.edit', [
            'message' => $message,
            'pet' => $pet,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message): RedirectResponse
    {
        Gate::authorize('update', $message);
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $message->update($validated);
        $pet = $message->pet;

        return redirect()->route('messages.index', $pet);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message): RedirectResponse
    {
        Gate::authorize('delete', $message);
        $pet = $message->pet;
        $message->delete();

        return redirect()->route('messages.index', $pet);
    }
}