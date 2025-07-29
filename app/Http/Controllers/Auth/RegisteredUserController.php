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
        $validationRules = [
            'name' => ['required', 'string', 'max:255'],
            'document' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'celular' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'departamento' => ['required', 'integer', 'exists:departamentos,id'],
            'ciudad' => ['required', 'integer', 'exists:ciudades,id'],
            'direccion' => ['required', 'string', 'max:255'],
            'fecha' => ['required', 'date', 'before_or_equal:2007-01-01'],
            'terminos' => ['required', 'accepted'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];

        // Si es Bogotá (ciudad_id = 107), agregar validaciones para localidad y barrio
        if ($request->ciudad == 107) {
            $validationRules['localidad'] = ['required', 'integer', 'exists:localidades,id'];
            $validationRules['barrio'] = ['required', 'integer', 'exists:barrios,id'];
        }

        $request->validate($validationRules);

        $userData = [
            'name' => $request->name,
            'document' => $request->document,
            'celular' => $request->celular,
            'departamento_id' => $request->departamento,
            'ciudad_id' => $request->ciudad,
            'direccion' => $request->direccion,
            'fecha_nacimiento' => $request->fecha,
            'puntos' => 0,
            'estado_id' => 1,
            'terminos' => $request->has('terminos') ? 1 : 0,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        // Si es Bogotá, agregar localidad y barrio
        if ($request->ciudad == 107) {
            $userData['localidad_id'] = $request->localidad;
            $userData['barrio_id'] = $request->barrio;
        }

        $user = User::create($userData);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}