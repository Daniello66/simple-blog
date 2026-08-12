<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    /**
     * Cargar la página de registro.
     *
     * @return View
     * @author Daniel Beltrán
     */
    public function create(): View {
        return view('auth.register');
    }

    /**
     * Registrar un nuevo usuario.
     *
     * @param Request $request Contenido de la petición.
     * @throws ValidationException
     * @return RedirectResponse
     * @author Daniel Beltrán
     */
    public function store(Request $request): RedirectResponse {
        $request->validate([
            'name'     => ['required', 'string', 'max:60'],
            'surname'  => ['required', 'string', 'max:60'],
            'email'    => ['required', 'string', 'lowercase', 'email', 'max:100', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        $user = User::create([
            'name'     => $request->name,
            'surname'  => $request->surname,
            'email'    => $request->email,
            'password' => $request->password
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
