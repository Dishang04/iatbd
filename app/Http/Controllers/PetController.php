<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('pets.index', [
            'pets'=> Pet::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'species' => ['required','string','max:10'],
            'when' => ['required','date'],
            'hourlyRate' => ['required', 'string'],
            'durationHours' => ['required', 'integer', 'max:255'],
            'details' => [''],
            // 'question' => ['required', 'string', 'max:255'],
        ]);

        $request->user()->pets()->create($validated);
        return redirect()->route('pets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(): View
    {
        $pets = Pet::all();
        return view('pets.show', compact('pets'));
    }

    public function information(Pet $id): View
    {
        return view('pets.information')->with('pet', $id);    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        //
    }
}
