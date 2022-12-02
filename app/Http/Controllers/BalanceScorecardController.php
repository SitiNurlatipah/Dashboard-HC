<?php

namespace App\Http\Controllers;
use App\BalanceScorecardModel;

use Illuminate\Http\Request;

class BalanceScorecardController extends Controller
{
    public function index(){
        $balancescorecard=BalanceScorecardModel::all();
    return view('pages.balance-scorecard.index',compact('balancescorecard'));
    }
    public function store(Request $request){
        $request->validate( [
            
            'netSales' => 'required',
            'hrCost' => 'required',
            'employee' => 'required',
            'gp' => 'required',			
            'op' => 'required',			
            'bulan' => 'required',			
            'kpiType' => 'required',			
                        
        ]);
        
        $valid = [
            'netSales' => $request->netSales,
            'hrCost' => $request->hrCost,
            'employee' => $request->employee,
            'gp' => $request->gp,
            'op' => $request->op,
            'bulan' => $request->bulan,
            'kpiType' => $request->kpiType,
        ];
        BalanceScorecardModel::create($valid);
            
        return redirect()->route('balance')->with('message','Data added successfully.'); 
    }
    public function update(Request $request, $id){
        $total = BalanceScorecardModel::find($id);
        $total->intInternal = $request->intInternal;
        $total->intExternal = $request->intExternal;
        $total->intInHouse = $request->intInHouse;
        $total->dateBulan = $request->dateBulan;
        $total->save();
        return redirect()->route('balance')->with('message','Data updated successfully.');
	}
    public function destroy($id)
    {
        BalanceScorecardModel::find($id)->delete();
        // $data->delete();
        return redirect()->route('balance')->with('message','Data deleted successfully');
    }
}
