<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->merge(['admin' => '0']);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required','string','max:10'],
            'address' => ['required','string','max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'sitterChoice' => ['required', 'string'],
            'admin' => ['string', 'in: 0'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file(key: 'image')->store(path: 'images', options: 'public');
        }

        // if($request->has('image')){
        //     $imagePath = $request->file(key: 'image')->store(path: 'images', options: 'public');
        //     $validated['image'] = $imagePath;
        // }

        $user = User::create([
            'name' => $request->name,
            'phone'=> $request->phone,
            'address'=> $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'sitter' => $request->input('sitterChoice') === 'sitter',
            'admin' => $request->admin,
            'image' => $imagePath,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
