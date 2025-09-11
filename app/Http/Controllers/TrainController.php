<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Train;
use App\Http\Models\Profile;
use App\Http\Controllers\Auth;

class TrainController extends Controller
{

    public function create(){
        return view('trains.create');
    }

    public function store(Request $request, Profile $profile){
        $validateData = $request->validate([
            'training' => 'required|string|max:255',
            'weighy' => 'required|string|max:20',
            'date' => 'required|date'
        ]);

        $profile = Auth::user();

        $profile->trains()->create($validateData);

        return redirect()->route('trains.index')->with('success', 'Treino adicionado');
    }

    public function index(){

        $profile = Auth::user();
        $userTrains = $profile->trains()->latest()->get();

        return view ('trains.show', ['allTrains' => $userTrains]);
    }
}
