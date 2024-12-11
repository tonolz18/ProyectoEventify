<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'role' => ['required', 'in:User,Organizer'], // Validar el rol
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Asignar el rol basado en la selección
        $role = \App\Models\Role::where('name', $request->role)->first();
        if ($role) {
            $user->roles()->attach($role);
        } else {
            // En caso de error, asignar el rol de usuario como predeterminado
            $defaultRole = \App\Models\Role::where('name', 'User')->first();
            $user->roles()->attach($defaultRole);
        }

        event(new Registered($user));

        auth()->login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function create()
    {
        return view('auth.register');
    }
}

