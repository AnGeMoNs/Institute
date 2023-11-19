<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Administradores;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login() {
        return view("login");
    }

    public function logins(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        $credentials = [
            'Nombre_A' => $request->username, 
            'password' => $request->password
        ];

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('menu.web');
        } else {
            $userExists = Administradores::where('Nombre_A', $request->username)->exists();

            if ($userExists) {
                return back()->withErrors(['password' => 'La contraseña proporcionada es incorrecta.']);
            } else {
                return back()->withErrors(['username' => 'El nombre de usuario no existe.']);
            }
        }
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.web');
    }
}
