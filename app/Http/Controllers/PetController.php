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

    public function filter(Request $request): View
{
    $query = Pet::query();

    if ($request->has('species')) {
        $query->whereIn('species', $request->input('species'));
    }

    // You can add more filters as needed

    $pets = $query->with('user')->latest()->get();

    return view('pets.show', ['pets' => $pets]);
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
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Validate image file type and size
            // 'question' => ['required', 'string', 'max:255'],
        ]);

        // Store the image in the storage/app/public directory
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $validated['image'] = $imagePath;
        }

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

    public function filterAnimals(Request $request)
{
    $query = Pet::query();

    if ($request->has('species')) {
        $query->whereIn('species', $request->input('species'));
    }

    $animals = $query->get();

    return view('pets.show', compact('animals'));
}
}
