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
        //total
        $ytd= RealModel::select(DB::raw("year(dateBulan)as year, max(realTotal) as ytd "))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytd');
        $mtd= RealModel::select(DB::raw("realTotal as ytd "))
        ->whereYear('dateBulan', '=', Carbon::now())
        ->GroupBy(DB::raw("(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytd');
        $ytdmtd = $ytd->merge($mtd);
        //permanent
        $ytdPermanent= RealModel::select(DB::raw("year(dateBulan)as year, max(realPermanent) as ytdPermanent "))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdPermanent');
        $mtdPermanent= RealModel::select(DB::raw("realPermanent as ytdPermanent "))
        ->whereYear('dateBulan', '=', Carbon::now())
        ->GroupBy(DB::raw("(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdPermanent');
        $ytdmtdPermanent = $ytdPermanent->merge($mtdPermanent);
        //contract
        $ytdContract= RealModel::select(DB::raw("year(dateBulan)as year, max(realContract) as ytdContract "))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdContract');
        $mtdContract= RealModel::select(DB::raw("realContract as ytdContract "))
        ->whereYear('dateBulan', '=', Carbon::now())
        ->GroupBy(DB::raw("(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdContract');
        $ytdmtdContract = $ytdContract->merge($mtdContract);
        //jobsupply
        $ytdJobsupply= RealModel::select(DB::raw("year(dateBulan)as year, max(realJobSupply) as ytdJobsupply "))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdJobsupply');
        $mtdJobsupply= RealModel::select(DB::raw("realJobSupply as ytdJobsupply "))
        ->whereYear('dateBulan', '=', Carbon::now())
        ->GroupBy(DB::raw("(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdJobsupply');
        $ytdmtdJobsupply = $ytdJobsupply->merge($mtdJobsupply);
        //bulan
        $bulanMtd=RealModel::select(DB::raw("(DATE_FORMAT(dateBulan,'%M-%Y')) as bulan"))
        ->GroupBy(DB::raw("(DATE_FORMAT(dateBulan,'%M-%Y'))"))
        ->whereYear('dateBulan', '=', Carbon::now())
        ->orderBy('dateBulan', 'asc')
        ->pluck('bulan');
        $bulanYtd=RealModel::select(DB::raw("(DATE_FORMAT(dateBulan,'%Y')) as bulan"))
        ->GroupBy(DB::raw("(DATE_FORMAT(dateBulan,'%Y'))"))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->orderBy('dateBulan', 'asc')
        ->pluck('bulan');
        $bulanytdmtd = $bulanYtd->merge($bulanMtd);
        // dd($bulanytdmtd);
        
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
        'total','real','mpp_employee','permanenMpp','contractMpp','jobsupplyMpp','totalMpp','ytdmtd','bulanytdmtd','ytdmtdJobsupply','ytdmtdPermanent','ytdmtdContract')
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
