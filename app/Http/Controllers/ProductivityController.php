<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productivity;
use App\HumanCost;
use App\Growth;
use DB;

class ProductivityController extends Controller
{
    public function index(){
        $productivity=Productivity::orderBy('dateBulan', 'DESC')->get();
        $humancost=HumanCost::orderBy('dateBulanCost', 'DESC')->get();
        $growth=Growth::
        leftJoin('productivity_manpowers','productivity_growths.manpower_id','=','productivity_manpowers.id')
        ->leftJoin('productivity_humancosts','productivity_growths.humancost_id','=','productivity_humancosts.id')
        ->orderBy('dateBulanGrowth', 'ASC')
        ->get();
        
        $productiv = Productivity::select(DB::raw("CAST(SUM((intOutputActual/intTotal)*1000) as int) as productiv"))
                    ->GroupBy(DB::raw("Month(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
                    ->pluck('productiv');
        $manpower = Productivity::select(DB::raw("CAST(SUM(intTotal) as int) as manpower"))
                    ->GroupBy(DB::raw("Month(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
                    ->pluck('manpower');
        $actual = Productivity::select(DB::raw("CAST(SUM(intOutputActual*1000) as int) as actual"))
                    ->GroupBy(DB::raw("Month(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
                    ->pluck('actual');
        $costProduct = HumanCost::select(DB::raw("CAST(SUM(intCostActual/(intOutputActual*1000)) as int) as costProduct"))
                    ->GroupBy(DB::raw("Month(dateBulanCost)"))
					->orderBy('dateBulanCost', 'ASC')
                    ->pluck('costProduct');
        $costActual = HumanCost::select(DB::raw("CAST(SUM(intCostActual) as int) as costActual"))
                    ->GroupBy(DB::raw("Month(dateBulanCost)"))
					->orderBy('dateBulanCost', 'ASC')
                    ->pluck('costActual');
        $coba = Growth::leftJoin('productivity_manpowers','productivity_growths.manpower_id','=','productivity_manpowers.id')
                    ->select(DB::raw("CAST(SUM(intOutputActual) as int) as coba"))
                    ->GroupBy(DB::raw("Month(dateBulanGrowth)"))
					->orderBy('dateBulan', 'ASC')
                    ->pluck('coba');
        $bulan=Productivity::select(DB::raw("MONTHNAME(dateBulan) as bulan"))
                    ->GroupBy(DB::raw("MONTHNAME(dateBulan)"))
                    ->orderBy('dateBulan', 'ASC')
                    ->pluck('bulan');
        $bulanCost=HumanCost::select(DB::raw("MONTHNAME(dateBulanCost) as bulanCost"))
                    ->GroupBy(DB::raw("MONTHNAME(dateBulanCost)"))
                    ->orderBy('dateBulanCost', 'ASC')
                    ->pluck('bulanCost');
        
        return view('pages.productivity.index',compact('productiv','bulan','manpower','actual','costProduct','costActual','bulanCost','coba'),[
            'productivity_manpowers'=>$productivity,'productivity_humancosts'=>$humancost,'productivity_growths'=>$growth
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
    public function storeGrowth(Request $request){
        $request->validate( [
            'dateBulanGrowth' => 'required',			
              'manpower_id'=>'required',         
              'humancost_id'=>'required'          
        ]);
        
        $valid = [
            'dateBulanGrowth'=>$request->dateBulanGrowth,
            'manpower_id'=>$request->manpower_id,
            'humancost_id'=>$request->humancost_id

        ];
        Growth::create($valid);
            
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
            'intOutputPlan' => 'required',
            'intOutputActual' => 'required',
            'dateBulanCost' => 'required',			
                        
        ]);
        
        $valid = [
            'intCostPlan'=>$request->intCostPlan,
            'intCostActual'=>$request->intCostActual,
            'intOutputPlan'=>$request->intOutputPlan,
            'intOutputActual'=>$request->intOutputActual,
            'dateBulanCost'=>$request->dateBulanCost,
        ];
        
        HumanCost::create($valid);
            
        return redirect()->route('productivity')->with('message','Data added successfully.'); 
    }
    public function updateHumancost(Request $request, $id){
        $humancost = HumanCost::find($id);
        $humancost->intCostPlan = $request->intCostPlan;
        $humancost->intCostActual = $request->intCostActual;
        $humancost->intOutputPlan = $request->intOutputPlan;
        $humancost->intOutputActual = $request->intOutputActual;
        $humancost->dateBulanCost = $request->dateBulanCost;
        $humancost->save();
        return redirect()->route('productivity')->with('message','Data updated successfully.');
	}
    public function destroyHumancost($id)
    {
        HumanCost::find($id)->delete();
        // $data->delete();
        return redirect()->route('productivity')->with('message','Data deleted successfully');
    }
    public function destroyGrowth($idGrowth)
    {
        Growth::find($idGrowth)->delete();
        // $data->delete();
        return redirect()->route('productivity')->with('message','Data deleted successfully');
    }
}
