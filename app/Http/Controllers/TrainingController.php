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

    public function show($id){
        return route('exercise.show');
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

        $training = $profile->trainings()->create($validateData);

<<<<<<< HEAD
        return redirect()->route('training.show', $training->id)
                     ->with('success', 'Treino adicionado com !');    }
=======
        return redirect()->route('trainings.index', $training->id)
                        ->with('success', 'Treino iniciado! Agora adicione os exercícios.');
    }
    public function show(Training $training)
    {
        
        return view('trainings.show', ['training' => $training]);
    }
>>>>>>> 49d25473a5d882f7948d163a3d381ef93a7818dd

    public function index(){

        $profile = Auth::user();
        $userTrainings = $profile->trainings()->latest()->get();

<<<<<<< HEAD
        return view('trainings.index', ['trainings' => $userTrainings]);    }
=======
        return view ('trainings.index', ['trainings' => $userTrainings]);
    }
>>>>>>> 49d25473a5d882f7948d163a3d381ef93a7818dd
}
