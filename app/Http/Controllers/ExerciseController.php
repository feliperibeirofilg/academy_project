<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Profile;
use App\Models\Exercise;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    public function create(){
        return view('exercise.create');
    }

    public function store(Request $request, Training $training){

        $validatedData = $request->validate([
        'exercise_name' => 'required|string|max:255',
        'series'        => 'required|string',
        'repetitions'   => 'required|string',
        'weight'        => 'required|string',
        'date'          => 'required|date',
        ]);

        dd($validatedData);

        $exercise = Exercise::firstOrCreate(
            ['exercise_name' => $validatedData['exercise_name']]
        );
        
        $training->exercises()->attach($exercise->id, [
            'series' => $validatedData['series'],
            'repetitions' => $validatedData['repetitions'],
            'weight' => $validatedData['weight'],
            'date' => $validatedData['date'],
        ]);
        
        return redirect()->route('exercise.show', $training->id)
                         ->with('success', 'Treino adicionado');
    }

    public function show(Exercise $exercise){

        return view ('exercise.show', ['exercise => $exercise']);
    }

     public function index()
    {
        // 1. Busca todos os exercícios do banco de dados
        $exercises = Exercise::all();

        // 2. Retorna a view e passa a lista de exercícios para ela
        return view('exercise.index', ['exercises' => $exercises]);
    }

}
