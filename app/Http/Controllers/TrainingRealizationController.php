<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainingRealizationController extends Controller
{
    public function index(){
        return view('pages.training.training-realization.index');
     }
}
