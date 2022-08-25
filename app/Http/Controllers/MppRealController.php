<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MppVsRealModel;


class MppRealController extends Controller
{
    public function index(){
        $dataEmployee = EmployeeModel::all();
        return view('pages.mpp-vs-realization.index',['employees' => $dataEmployee]);
     }
}
