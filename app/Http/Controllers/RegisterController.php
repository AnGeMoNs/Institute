<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administradores;

class RegisterController extends Controller {
    public function register() {
        return view('register');
    }

    public function registers(Request $request) {
        $request->validate([
            'username' => 'required|unique:administradores,Nombre_A',
            'password' => 'required'
        ], [
            'username.unique' => 'El nombre de admins ya ha sido registrado, usa otro.'
        ]);
        

        $administrador = new Administradores();
        $administrador->Nombre_A = $request->username;
        $administrador->Contrasena = bcrypt($request->password);
        $administrador->save();

        return redirect()->route('login.web');
    }
}
