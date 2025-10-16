<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Profile;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class TrainingController extends Controller
{

    public function create(){
        return view('trainings.create');
    }

    public function store(Request $request, Profile $profile){
        $allowedTrainings = [
            'Peito',
            'Costas',
            'Perna',
            'Biceps',
            'Triceps',
            'Ombro'
        ];
        $validateData = $request->validate([
            'training' => [
                'required',
                Rule::in($allowedTrainings)],
            'date' => 'required|date'
        ]);

        $profile = Auth::user();

        $profile->trainings()->create($validateData);

        return redirect()->route('trainings.index', $training->id)
                        ->with('success', 'Treino iniciado! Agora adicione os exercícios.');
    }
    public function show(Training $training)
    {
        
        return view('trainings.show', ['training' => $training]);
    }

    public function index(){

        $profile = Auth::user();
        $userTrainings = $profile->trainings()->latest()->get();

        return view ('trainings.index', ['trainings' => $userTrainings]);
    }
}
