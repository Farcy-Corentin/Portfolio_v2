<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function getTraining()
    {
        $trainings = Training::all();
        return view('trainings', compact('trainings'));
    }
}
