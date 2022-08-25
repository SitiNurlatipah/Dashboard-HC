<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dataTotalEmployee;
use DB;

class DataTotalEmployeeController extends Controller
{
    public function index(){
        $totalEmployee=dataTotalEmployee::orderBy('dateBulan', 'DESC')->get();
        $total = dataTotalEmployee::select(DB::raw("CAST(SUM(intTotal) as int) as total"))
                    ->GroupBy(DB::raw("Month(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
                    ->pluck('total');
		$permanent = dataTotalEmployee::select(DB::raw("CAST(SUM(intPermanen) as int) as permanent"))
                    ->GroupBy(DB::raw("Month(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
                    ->pluck('permanent');
		$contract = dataTotalEmployee::select(DB::raw("CAST(SUM(intContract) as int) as contract"))
                    ->GroupBy(DB::raw("Month(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
                    ->pluck('contract');
		$jobsupply = dataTotalEmployee::select(DB::raw("CAST(SUM(intJobSupply) as int) as jobsupply"))
                    ->GroupBy(DB::raw("Month(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
                    ->pluck('jobsupply');
        $bulan=dataTotalEmployee::select(DB::raw("MONTHNAME(dateBulan) as bulan"))
					->GroupBy(DB::raw("MONTHNAME(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
					->pluck('bulan');
        return view('pages.data-trend-total-employees.index', compact('total','permanent',
        'contract','jobsupply','bulan'),
        ['data_total_employee'=>$totalEmployee]);
     }
    public function store(Request $request){
         
         $request->validate( [
             'intTotal' => 'required',
             'intPermanen' => 'required',
             'intContract' => 'required',
             'intJobSupply' => 'required',
             'dateBulan' => 'required',			
             			
         ]);
 
         $valid = [
             'intTotal'=>$request->intTotal,
             'intPermanen'=>$request->intPermanen,
             'intContract'=>$request->intContract,
             'intJobSupply'=>$request->intJobSupply,
             'txtBulanInput'=>$request->txtBulanInput,
             'dateBulan'=>$request->dateBulan,
         ];
         dataTotalEmployee::create($valid);
         return redirect()->route('total')->with('message','Data Employee added successfully.');
     }
    public function update(Request $request, $id){
        $totalEmployee = dataTotalEmployee::find($id);
        $totalEmployee->intTotal = $request->intTotal;
        $totalEmployee->intPermanen = $request->intPermanen;
        $totalEmployee->intContract = $request->intContract;
        $totalEmployee->intJobSupply = $request->intJobSupply;
        $totalEmployee->dateBulan = $request->dateBulan;
        $totalEmployee->save();
        return redirect()->route('total')->with('message','Data updated successfully.');
	}
    public function destroy($id)
    {
        dataTotalEmployee::find($id)->delete();
        // $data->delete();
        return redirect()->route('total')->with('message','Data deleted successfully');
    }
}
