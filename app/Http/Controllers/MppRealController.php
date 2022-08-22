<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MppRealController extends Controller
{
    public function index(){
        return view('pages.mpp-vs-realization.index');
     }
}
