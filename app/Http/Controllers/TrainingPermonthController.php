<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainingPermonthController extends Controller
{
    public function index(){
        return view('pages.training.training-permonth.index');
     }
}
