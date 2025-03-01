<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Providers\RouteServiceProvider;

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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'salaire_mensuel' => ['required', 'numeric', 'min:0'],
            'objectif_mensuel' => ['required', 'numeric', 'min:0'],
            'date_credit' => ['required', 'integer', 'min:1', 'max:31'],
        ]);
        
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'salaire_mensuel' => $request->salaire_mensuel,
            'date_credit' => $request->date_credit,
            'montant_restant' => $request->salaire_mensuel,
            'objectif_mensuel' => $request->objectif_mensuel,
            'salaire_sauve' => 0,
            'role' => 'user',
        ]);
        
        event(new Registered($user));

        // Auth::login($user);
        // if($user->isAdmin()){
        //     return redirect(route('admin', absolute: false));
        // }elseif($user->isUser()){
        //     return redirect(route('dashboard', absolute: false));
        // }

        return redirect(route('login', absolute: false));
    }
}
