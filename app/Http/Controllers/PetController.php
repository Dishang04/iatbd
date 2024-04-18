<?php

namespace App\Http\Controllers;

use App\Models\Pet;
// use App\Notifications\PetSittingInterest;
use App\Models\PetSittingRequest;
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
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            // 'question' => ['required', 'string', 'max:255'],
        ]);

        if($request->has('image')){
            $imagePath = $request->file(key: 'image')->store(path: 'images', options: 'public');
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

    public function sitRequest(Pet $pet): RedirectResponse
    {
        $request = new PetSittingRequest([
            'pet_id' => $pet->id,
            'sitter_id' => auth()->id(),
            'status' => 'pending',
        ]);
        $request->save();

        $pet->update(['available_for_sitting' => false]);

        return redirect()->route('pets.show', $pet)->with('success', 'Your request has been sent to the pet owner.');
    }

    public function decline(Request $httpRequest, PetSittingRequest $request)
    {
        $request->update(['status' => 'declined']);
        $pet = $request->pet;
        $pet->update(['available_for_sitting' => true]);

        return redirect()->route('requests.index')->with('success', 'Request declined successfully.'); 
    }
}