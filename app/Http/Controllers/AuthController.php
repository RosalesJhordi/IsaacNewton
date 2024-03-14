<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginIndex(){
        return view('Auth.Login');
    }
    public function loginStore(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($request->only('email','password'), $request->remember)){
            return back()->with('mensaje','Credenciales Incorrectas');
        }
        return view('Index');
    }

    public function registroIndex(){
        return view('Auth.Registro');
    }

    public function registroStore(Request $request){
        $this->validate($request, [
            'nombres' => 'required',
            'apellidos' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'ciudad' => $request->ciudad,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        if(!auth()->attempt($request->only('email','password'), $request->remember)){
            return back()->with('mensaje','Credenciales Incorrectas');
        }
        return view('Index');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
