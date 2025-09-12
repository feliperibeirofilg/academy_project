<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{

    public function create(){
        return view('trainings.create');
    }

    public function store(Request $request, Profile $profile){
        $validateData = $request->validate([
            'training' => 'required|string|max:255',
        ]);

        $profile = Auth::user();

        $profile->trainings()->create($validateData);

        return redirect()->route('trainings.index')->with('success', 'Treino adicionado');
    }

    public function index(){

        $profile = Auth::user();
        $userTrainings = $profile->trainings()->latest()->get();

        return view ('trainings.show', ['allTrainings' => $userTrainings]);
    }
}
