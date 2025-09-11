<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Train;
use App\Http\Models\Profile;

class TrainController extends Controller
{

    public function create(){
        return view('trains.create');
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'training' => 'required|string|max:255',
            'weighy' => 'required|string|max:20',
            'date' => 'required|date'
        ]);

        $profile = Auth::profile();

        $user->posts()->create($validateData);

        return view('#');
    }
}
