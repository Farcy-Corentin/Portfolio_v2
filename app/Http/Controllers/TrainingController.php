<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class TrainingController extends Controller
{
    public function getTraining(): View|Factory
    {
        $trainings = Training::all();
        return view('trainings', compact('trainings'));
    }
}
