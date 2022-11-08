<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RealModel;
use App\MppModel;
use DB;
use Carbon\Carbon;


class MppRealController extends Controller
{
    public function index(){
        $real = RealModel::join('mpp_employees','mpp_employees.id','=','real_employees.mpp_tahun')
                ->orderBy('dateBulan', 'desc')
                ->get();
        
        $mpp_employee=MppModel::all();

        // $coba= RealModel::select(DB::raw("CAST(SUM(realPermanent)as int) as coba"))
        // ->whereYear('dateBulan', '=', Carbon::now())
        // ->GroupBy(DB::raw("month(dateBulan)"))
        // ->orderBy('dateBulan', 'ASC')
        // ->pluck('coba');
        // $coba2= RealModel::select(DB::raw("CAST(SUM(realPermanent)as int) as coba2"))
        // ->whereYear('dateBulan', '<', Carbon::now())
        // ->GroupBy(DB::raw("month(dateBulan)"))
        // ->orderBy('dateBulan', 'ASC')
        // ->pluck('coba2')
        // ->last();
        // $b=RealModel::select(DB::raw("MONTHNAME(dateBulan) as b"))
        // ->whereYear('dateBulan', '=', Carbon::now())
        // ->GroupBy(DB::raw("MONTHNAME(dateBulan)"))
        // ->orderBy('dateBulan', 'asc')
        // ->pluck('b');
        // $b1=RealModel::select(DB::raw("year(dateBulan) as b1"))
        // ->whereYear('dateBulan', '<', Carbon::now())
        // ->GroupBy(DB::raw("MONTHNAME(dateBulan)"))
        // ->orderBy('dateBulan', 'asc')
        // ->pluck('b1')
        // ->last();
        // $gabung= $coba2->merge($coba);
        // $bu= $b1->merge($b);
        $permanen = RealModel::select(DB::raw("CAST(SUM(realPermanent)as int) as permanen"))
                    ->GroupBy(DB::raw("(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
                    ->pluck('permanen');
        $contract = RealModel::select(DB::raw("CAST(SUM(realContract)as int) as contract"))
                    ->GroupBy(DB::raw("(dateBulan)"))
					->orderBy('dateBulan', 'asc')
                    ->pluck('contract');
        $jobsupply = RealModel::select(DB::raw("CAST(SUM(realJobSupply)as int) as jobsupply"))
                    ->GroupBy(DB::raw("(dateBulan)"))
					->orderBy('dateBulan', 'asc')
                    ->pluck('jobsupply');
        $total = RealModel::select(DB::raw("CAST(SUM(realTotal)as int) as total"))
                    ->GroupBy(DB::raw("(DATE_FORMAT(dateBulan,'%M-%Y'))"))
					->orderBy('dateBulan', 'DESC')
                    ->pluck('total');
        //mpp
        $permanenMpp = MppModel::select(DB::raw("CAST(SUM(mppPermanent)as int) as permanenMpp"))
                    ->GroupBy(DB::raw("tahun"))
					->orderBy('tahun', 'ASC')
                    ->pluck('permanenMpp');
        $contractMpp = MppModel::select(DB::raw("CAST(SUM(mppContract)as int) as contractMpp"))
                    ->GroupBy(DB::raw("tahun"))
					->orderBy('tahun', 'asc')
                    ->pluck('contractMpp');
        $jobsupplyMpp = MppModel::select(DB::raw("CAST(SUM(mppJobsupply)as int) as jobsupplyMpp"))
                    ->GroupBy(DB::raw("tahun"))
					->orderBy('tahun', 'asc')
                    ->pluck('jobsupplyMpp');
        $totalMpp = RealModel::join('mpp_employees','mpp_employees.id','=','real_employees.mpp_tahun')
                    ->select(DB::raw("CAST(SUM(mppTotal)as int) as totalMpp"))
                    ->GroupBy(DB::raw("(DATE_FORMAT(dateBulan,'%M-%Y'))"))
                    ->orderBy('dateBulan', 'DESC')
                    ->pluck('totalMpp');
        $bulan=RealModel::select(DB::raw("(DATE_FORMAT(dateBulan,'%M-%Y')) as bulan"))
        ->GroupBy(DB::raw("(DATE_FORMAT(dateBulan,'%M-%Y'))"))
        ->orderBy('dateBulan', 'asc')
        ->pluck('bulan');
        return view('pages.mpp-vs-realization.index',compact('bulan','permanen','contract','jobsupply',
        'total','real','mpp_employee','permanenMpp','contractMpp','jobsupplyMpp','totalMpp')
        // ['mpp_vs_realization' => $mppreal,$mpp2022]
        );
     }
     public function store(Request $request){
        $request->validate( [
            'realTotal' => 'required',
            'realPermanent' => 'required',
            'realContract' => 'required',
            'realJobSupply' => 'required',
            'mpp_tahun' => 'required',
            'dateBulan' => 'required',			
                        
        ]);
        
        $valid = [
            'realTotal'=> $request->realTotal,
            'mpp_tahun'=> $request->mpp_tahun,
            'realPermanent' => $request->realPermanent,
            'realContract' =>$request->realContract,
            'realJobSupply' => $request->realJobSupply,
            'intAdd' => $request->intAdd,
            'intReduce' => $request->intReduce,
            'txtMtdAdjusment' => $request->txtMtdAdjusment,
            'dateBulan' => $request->dateBulan,
        ];
        // dd($valid);
        $tambah=RealModel::create($valid);
        if($tambah){
            return redirect()->route('mppreal')->with('message','Data added successfully.'); 
        }else{
            return redirect()->route('mppreal')->with('message','Bermasalah.'); 
        }

    }
    public function update(Request $request, $idReal){
        $mppreal = RealModel::find($idReal);
        $mppreal->realTotal = $request->realTotal;
        $mppreal->realPermanent = $request->realPermanent;
        $mppreal->realContract = $request->realContract;
        $mppreal->realJobSupply = $request->realJobSupply;
        $mppreal->intAdd = $request->intAdd;
        $mppreal->intReduce = $request->intReduce;
        $mppreal->txtMtdAdjusment = $request->txtMtdAdjusment;
        $mppreal->dateBulan = $request->dateBulan;
        $mppreal->save();
        return redirect()->route('mppreal')->with('message','Data updated successfully.');
	}
    public function destroy($idReal)
    {
        RealModel::find($idReal)->delete();
        // $data->delete();
        return redirect()->route('mppreal')->with('message','Data deleted successfully');
    }
     public function storeMpp(Request $request){
        $request->validate( [
            'mppTotal' => 'required',
            'mppPermanent' => 'required',
            'mppContract' => 'required',
            'mppJobsupply' => 'required',
            'tahun' => 'required'        
        ]);
        
        $valid = [
            'mppTotal'=> $request->mppTotal,
            'mppPermanent' => $request->mppPermanent,
            'mppContract' =>$request->mppContract,
            'mppJobsupply' => $request->mppJobsupply,
            'tahun' => $request->tahun,
        ];
        MppModel::create($valid);
            
        return redirect()->route('mppreal')->with('message','Data added successfully.'); 
    }
    public function updateMpp(Request $request, $id){
        $mpp = MppModel::find($id);
        $mpp->realTotal = $request->realTotal;
        $mpp->realPermanent = $request->realPermanent;
        $mpp->realContract = $request->realContract;
        $mpp->realJobsupply = $request->realJobsupply;
        $mpp->tahun = $request->tahun;
        $mpp->save();
        return redirect()->route('mppreal')->with('message','Data updated successfully.');
	}
    public function destroyMpp($id)
    {
        MppModel::find($id)->delete();
        // $data->delete();
        return redirect()->route('mppreal')->with('message','Data deleted successfully');
    }
    public function filter(Request $request){
            
        $real = RealModel::whereYear('dateBulan',$request->year)
               ->get();
               $permanen = RealModel::select(DB::raw("CAST(SUM(realPermanent)as int) as permanen"))
               ->GroupBy(DB::raw("year(dateBulan)"))
               ->orderBy('dateBulan', 'ASC')
               ->pluck('permanen');
   $contract = RealModel::select(DB::raw("CAST(SUM(realContract)as int) as contract"))
               ->GroupBy(DB::raw("year(dateBulan)"))
               ->orderBy('dateBulan', 'asc')
               ->pluck('contract');
   $jobsupply = RealModel::select(DB::raw("CAST(SUM(realJobSupply)as int) as jobsupply"))
               ->GroupBy(DB::raw("year(dateBulan)"))
               ->orderBy('dateBulan', 'asc')
               ->pluck('jobsupply');
   $total = RealModel::select(DB::raw("CAST(SUM(realTotal)as int) as total"))
               ->GroupBy(DB::raw("year(dateBulan)"))
               ->orderBy('dateBulan', 'DESC')
               ->pluck('total');
   $bulan=RealModel::select(DB::raw("year(dateBulan) as bulan"))
   ->GroupBy(DB::raw("year(dateBulan)"))
   ->orderBy('dateBulan', 'asc')
   ->pluck('bulan');
            return view('pages.mpp-vs-realization.index',compact('bulan','permanen','contract','jobsupply','total','real'));
        }
}
