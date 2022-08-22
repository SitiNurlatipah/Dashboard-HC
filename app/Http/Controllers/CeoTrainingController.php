<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CeoTrainingController extends Controller
{
    public function index(){
        return view('pages.training.ceo-training.index');
     }
}
