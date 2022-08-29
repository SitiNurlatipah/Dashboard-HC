<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productivity;
use App\HumanCost;

class ProductivityController extends Controller
{
    public function index(){
        $productivity=Productivity::orderBy('dateBulan', 'DESC')->get();
        $humancost=HumanCost::orderBy('dateBulan', 'DESC')->get();

        return view('pages.productivity.index',[
            'productivity_manpower'=>$productivity,'productivity_humancost'=>$humancost
        ]);
    }
    public function store(Request $request){
        $request->validate( [
            'intTotal' => 'required',
            'intPermanen' => 'required',
            'intContract' => 'required',
            'intOutputPlan' => 'required',
            'intOutputActual' => 'required',
            'dateBulan' => 'required',			
                        
        ]);
        
        $valid = [
            'intTotal'=>$request->intTotal,
            'intPermanen'=>$request->intPermanen,
            'intContract'=>$request->intContract,
            'intOutputPlan'=>$request->intOutputPlan,
            'intOutputActual'=>$request->intOutputActual,
            'dateBulan'=>$request->dateBulan,
        ];
        Productivity::create($valid);
            
        return redirect()->route('productivity')->with('message','Data added successfully.'); 
    }
    public function update(Request $request, $id){
        $productivity = Productivity::find($id);
        $productivity->intTotal = $request->intTotal;
        $productivity->intPermanen = $request->intPermanen;
        $productivity->intContract = $request->intContract;
        $productivity->intOutputPlan = $request->intOutputPlan;
        $productivity->intOutputActual = $request->intOutputActual;
        $productivity->dateBulan = $request->dateBulan;
        $productivity->save();
        return redirect()->route('productivity')->with('message','Data updated successfully.');
	}
    public function destroy($id)
    {
        Productivity::find($id)->delete();
        // $data->delete();
        return redirect()->route('productivity')->with('message','Data deleted successfully');
    }
    public function storeHumancost(Request $request){
        $request->validate( [
            'intCostPlan' => 'required',
            'intCostActual' => 'required',
            'dateBulan' => 'required',			
                        
        ]);
        
        $valid = [
            'intCostPlan'=>$request->intCostPlan,
            'intCostActual'=>$request->intCostActual,
            'dateBulan'=>$request->dateBulan,
        ];
        
        HumanCost::create($valid);
            
        return redirect()->route('productivity')->with('message','Data added successfully.'); 
    }
    public function updateHumancost(Request $request, $id){
        $humancost = HumanCost::find($id);
        $humancost->intCostPlan = $request->intCostPlan;
        $humancost->intCostActual = $request->intCostActual;
        $humancost->dateBulan = $request->dateBulan;
        $humancost->save();
        return redirect()->route('productivity')->with('message','Data updated successfully.');
	}
    public function destroyHumancost($id)
    {
        HumanCost::find($id)->delete();
        // $data->delete();
        return redirect()->route('productivity')->with('message','Data deleted successfully');
    }
}
