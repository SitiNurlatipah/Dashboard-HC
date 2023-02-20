<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrainingTotalPerMonth;
use App\TrainingRealization;
use Carbon\Carbon;
use DB;
class TrainingPermonthController extends Controller
{
    public function index(){
        $trainingTotals = TrainingTotalPerMonth::all();
        $trainingTot = TrainingRealization::all();
        //Type Training
        //CAST(SUM(intGetoKontrak) as int)
        $internalTahun = TrainingRealization::select(DB::raw("year(dateTanggalMulai) as year"),DB::raw('count(IF(txtTrainingType = "Internal",1,NULL)) as internal'))
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))  
        ->GroupBy('txtTrainingType')  
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('internal','year');
        $internalBulan = TrainingRealization::select(DB::raw("month(dateTanggalMulai) as month,year(dateTanggalMulai) as year"),DB::raw('count(IF(txtTrainingType = "Internal",1,NULL)) as internal'))
        ->GroupBy('month','year')
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('internal','month','year');
        $internalTraining = $internalTahun->merge($internalBulan);
        

        $externalTahun = TrainingRealization::select(DB::raw("year(dateTanggalMulai) as year"),DB::raw('count(IF(txtTrainingType = "External",1,NULL)) as external'))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))     
        ->orderBy('dateTanggalMulai', 'asc')   
        ->pluck('external','year');
        $externalBulan = TrainingRealization::select(DB::raw("month(dateTanggalMulai) as month,year(dateTanggalMulai) as year"),DB::raw('count(IF(txtTrainingType = "External",1,NULL)) as external'))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy('month','year')
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('external','month','year');
        $externalTraining = $externalTahun->merge($externalBulan);

        $inhouseTahun = TrainingRealization::select(DB::raw('year(dateTanggalMulai) as year, count(IF(txtTrainingType = "In House",1,NULL)) as inhouse'))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))
        ->orderBy('dateTanggalMulai', 'asc')        
        ->pluck('inhouse','year');
        $inhouseBulan = TrainingRealization::select(DB::raw('count(IF(txtTrainingType = "In House",1,NULL)) as inhouse, month(dateTanggalMulai) as month,year(dateTanggalMulai) as year'))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy('month','year')
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('inhouse','month','year');
        $inhouseTraining = $inhouseTahun->merge($inhouseBulan);
        
        $year=TrainingRealization::select(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%Y')) as tanggal,year(dateTanggalMulai) as year"))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('tanggal','year');
        $month=TrainingRealization::select(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%M %Y')) as tanggal,month(dateTanggalMulai) as month,year(dateTanggalMulai) as year"))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy('month','year')
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('tanggal','month','year');
        $bulan = $year->merge($month);
        // dd($bulan);
        //Pelaksanaan
        $OnlineTahun = TrainingRealization::select(DB::raw('count(IF(txtPelaksanaan = "Online",1,NULL)) as online, year(dateTanggalMulai) as year'))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))  
        ->orderBy('dateTanggalMulai', 'asc')      
        ->pluck('online');
        $OnlineBulan = TrainingRealization::select(DB::raw('count(IF(txtPelaksanaan = "Online",1,NULL)) as online,month(dateTanggalMulai) as month'))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%M-%Y'))"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('online','month','year');
        $OnlineTraining = $OnlineTahun->merge($OnlineBulan);

        $OfflineTahun = TrainingRealization::select(DB::raw('year(dateTanggalMulai) as year, count(IF(txtPelaksanaan = "Offline",1,NULL)) as offline'))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))  
        ->orderBy('dateTanggalMulai', 'asc')      
        ->pluck('offline');
        $OfflineBulan = TrainingRealization::select(DB::raw('count(IF(txtPelaksanaan = "Offline",1,NULL)) as offline,month(dateTanggalMulai) as month'))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%M-%Y'))"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('offline');
        $OfflineTraining = $OfflineTahun->merge($OfflineBulan);

        $BlendedTahun = TrainingRealization::select(DB::raw('year(dateTanggalMulai) as year, count(IF(txtPelaksanaan = "Blended",1,NULL)) as blended'))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)")) 
        ->orderBy('dateTanggalMulai', 'asc')       
        ->pluck('blended');
        $BlendedBulan = TrainingRealization::select(DB::raw('count(IF(txtPelaksanaan = "Blended",1,NULL)) as blended,month(dateTanggalMulai) as month'))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%M-%Y'))"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('blended');
        $BlendedTraining = $BlendedTahun->merge($BlendedBulan);
        //biaya
        $pendaftaranTahun = TrainingRealization::select(DB::raw("CAST(SUM(intTotalCost) as int) as daftar, year(dateTanggalMulai) as year"))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))        
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('daftar');
        $pendaftaranBulan = TrainingRealization::select(DB::raw("CAST(SUM(intTotalCost) as int) as daftar,month(dateTanggalMulai) as month"))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%M-%Y'))"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('daftar');
        $pendaftaranTraining = $pendaftaranTahun->merge($pendaftaranBulan);

        $snackTahun = TrainingRealization::select(DB::raw("year(dateTanggalMulai) as year, CAST(SUM(costSnack) as int) as snack"))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))        
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('snack');
        $snackBulan = TrainingRealization::select(DB::raw("month(dateTanggalMulai) as month, CAST(SUM(costSnack) as int) as snack"))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%M-%Y'))"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('snack');
        $snackTraining = $snackTahun->merge($snackBulan);
        $tahun=TrainingRealization::select(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%Y')) as tanggal"))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%Y'))"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('tanggal');
        $type=$internalTraining->merge($externalTraining);
        $ty=$type->merge($inhouseTraining);
        return view('pages.training.training-permonth.index',compact(
        'trainingTotals','month','internalBulan','externalBulan','inhouseBulan',
        'year','internalTahun','externalTahun','inhouseTahun',
        'bulan','internalTraining','externalTraining','inhouseTraining',
        'OnlineTraining','OfflineTraining','BlendedTraining',
        'pendaftaranTraining','snackTraining','ty'
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
