<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MppVsRealModel;
class HrgaIssuesController extends Controller
{
    public function index(){
        
            $mpp = MppVsRealModel::all();
        
        return view('pages.hrga-issues.index',compact('mpp'));
     }
    public function filter(Request $request){
            
            $mpp = MppVsRealModel::whereYear('dateBulan',$request->year)
                   ->get();
        
        return view('pages.hrga-issues.index',compact('mpp'));
     }
}
