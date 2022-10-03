<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrainingTotalPerMonth;
use DB;
class TrainingPermonthController extends Controller
{
    public function index(){
        $trainingTotals = TrainingTotalPerMonth::all();
        $internal = TrainingTotalPerMonth::select(DB::raw("CAST(SUM(intInternal)as int) as internal"))
                    ->GroupBy(DB::raw("year(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
                    ->pluck('internal');
        $external = TrainingTotalPerMonth::select(DB::raw("CAST(SUM(intExternal)as int) as external"))
                    ->GroupBy(DB::raw("year(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
                    ->pluck('external');
        $inhouse = TrainingTotalPerMonth::select(DB::raw("CAST(SUM(intInHouse)as int) as inhouse"))
                    ->GroupBy(DB::raw("year(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
                    ->pluck('inhouse');
        $tahun=TrainingTotalPerMonth::select(DB::raw("year(dateBulan) as tahun"))
                    ->GroupBy(DB::raw("year(dateBulan)"))
                    ->orderBy('dateBulan', 'asc')
                    ->pluck('tahun');
        return view('pages.training.training-permonth.index',compact('trainingTotals','internal',
        'external','inhouse','tahun'
        ));
     }
     public function store(Request $request){
        $request->validate( [
            
            'intInternal' => 'required',
            'intExternal' => 'required',
            'intInHouse' => 'required',
            'dateBulan' => 'required',			
                        
        ]);
        
        $valid = [
            'intInternal' => $request->intInternal,
            'intExternal' => $request->intExternal,
            'intInHouse' => $request->intInHouse,
            'dateBulan' => $request->dateBulan,
        ];
        TrainingTotalPerMonth::create($valid);
            
        return redirect()->route('training')->with('message','Data added successfully.'); 
    }
    public function update(Request $request, $idTrainingTotalPerMonth){
        $total = TrainingTotalPerMonth::find($idTrainingTotalPerMonth);
        $total->intInternal = $request->intInternal;
        $total->intExternal = $request->intExternal;
        $total->intInHouse = $request->intInHouse;
        $total->dateBulan = $request->dateBulan;
        $total->save();
        return redirect()->route('training')->with('message','Data updated successfully.');
	}
    public function destroy($idTrainingTotalPerMonth)
    {
        TrainingTotalPerMonth::find($idTrainingTotalPerMonth)->delete();
        // $data->delete();
        return redirect()->route('training')->with('message','Data deleted successfully');
    }
    public function filter(Request $request){
        $trainingTotals = TrainingTotalPerMonth::whereYear('dateBulan',$request->year)
               ->get();
        $internal = TrainingTotalPerMonth::select(DB::raw("CAST(SUM(intInternal)as int) as internal"))
                    ->GroupBy(DB::raw("year(dateBulan)"))
                    ->orderBy('dateBulan', 'ASC')
                    ->pluck('internal');
        $external = TrainingTotalPerMonth::select(DB::raw("CAST(SUM(intExternal)as int) as intExternal"))
                    ->GroupBy(DB::raw("year(dateBulan)"))
                    ->orderBy('dateBulan', 'ASC')
                    ->pluck('external');
        $inhouse = TrainingTotalPerMonth::select(DB::raw("CAST(SUM(intInHouse)as int) as intInHouse"))
                    ->GroupBy(DB::raw("year(dateBulan)"))
                    ->orderBy('dateBulan', 'ASC')
                    ->pluck('inhouse');
        $tahun=TrainingTotalPerMonth::select(DB::raw("year(dateBulan) as tahun"))
                    ->GroupBy(DB::raw("year(dateBulan)"))
                    ->orderBy('dateBulan', 'asc')
                    ->pluck('tahun');

        return view('pages.training.training-permonth.index',compact('trainingTotals','internal',
        'external','inhouse','tahun'));
    }
}
