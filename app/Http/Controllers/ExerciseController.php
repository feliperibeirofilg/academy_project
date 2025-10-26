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
        'name' => 'required|string|max:255',
        'series'        => 'required|string',
        'repetitions'   => 'required|string',
        'weight'        => 'required|string',
        
        ]);

        $exercise = Exercise::firstOrCreate(
            ['name' => $validatedData['name']]
        );
        
        $training->exercises()->attach($exercise->id, [
            'series' => $validatedData['series'],
            'repetitions' => $validatedData['repetitions'],
            'weight' => $validatedData['weight'], 
        ]);
        
        return redirect()->route('trainings.show', $training->id)
                         ->with('success', 'Exercicio adicionado');
    }

    public function show(Exercise $exercise){

        return view ('exercise.show', ['exercise => $exercise']);
    }

    public function index(){

        $profile = Auth::user();
        $trainings = $profile->trainings()->with('exercises')->get();
        $lastweight = $profile::findLast('weight');

        return view ('trainings.show', ['allTrainings' => $trainings]);
    }

}
