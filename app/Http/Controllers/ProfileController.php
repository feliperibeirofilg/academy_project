<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Train;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function create(){
        return view('users.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:profiles|string',
            'password' => 'required|min:3'
        ]);

        Profile::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return view('auth.login');
    }

    

}
