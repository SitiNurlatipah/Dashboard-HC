<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductivityController extends Controller
{
    public function index(){
        return view('pages.productivity.index');
     }
}
