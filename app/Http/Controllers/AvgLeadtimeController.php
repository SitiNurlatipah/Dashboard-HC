<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvgLeadtimeController extends Controller
{
    public function index(){
        return view('pages.avg-leadtime-recruitment.index');
     }
}
