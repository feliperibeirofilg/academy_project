<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Train;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended(route('trainings.create'))
            ->with('success', 'Bem-vindo(a) de volta');
        }
        
        return back()->withErrors([
            'email' => 'As Credenciais fornecidas não correspondem aos nossos registros'
        ])->onlyInput('email');
    
    }

    public function logout(Request $request){
        Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        
            return redirect()->route('loginForm')->with('success', 'Sessão encerrada com sucesso!');;
    }
}
