<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AvdLeadtimeRecruitment;
use DB;
class AvgLeadtimeController extends Controller
{
    public function index(){
        $avg = AvdLeadtimeRecruitment::all();
        $rataPermanent = AvdLeadtimeRecruitment::select(DB::raw("CAST(avg(intPermanent1+intPermanent2+intPermanent3+intPermanent4+intPermanent5) as float) as rataPermanent"))
                    ->GroupBy(DB::raw("year(dateBulanAvg)"))
					->orderBy('dateBulanAvg', 'ASC')
                    ->pluck('rataPermanent');
        $rataContract = AvdLeadtimeRecruitment::select(DB::raw("CAST(avg(intContract) as float) as rataContract"))
                    ->GroupBy(DB::raw("year(dateBulanAvg)"))
					->orderBy('dateBulanAvg', 'ASC')
                    ->pluck('rataContract');
        $rataJobSupply = AvdLeadtimeRecruitment::select(DB::raw("CAST(avg(intJobSupply) as float) as rataJobSupply"))
                    ->GroupBy(DB::raw("year(dateBulanAvg)"))
					->orderBy('dateBulanAvg', 'ASC')
                    ->pluck('rataJobSupply');
        $rataInternship = AvdLeadtimeRecruitment::select(DB::raw("CAST(avg(intInternship) as float) as rataInternship"))
                    ->GroupBy(DB::raw("year(dateBulanAvg)"))
					->orderBy('dateBulanAvg', 'ASC')
                    ->pluck('rataInternship');
        $tahun=AvdLeadtimeRecruitment::select(DB::raw("year(dateBulanAvg) as tahun"))
        ->GroupBy(DB::raw("year(dateBulanAvg)"))
        ->orderBy('dateBulanAvg', 'ASC')
        ->pluck('tahun');
        return view('pages.avg-leadtime-recruitment.index', compact('rataPermanent','rataContract','rataJobSupply','rataInternship','tahun'),
        ['avg_recruitments'=>$avg]
        );
     }
    public function store(Request $request){
        $request->validate( [
            
            'intStdPermanent' => 'required',
            'intPermanent1' => 'required',
            'intPermanent2' => 'required',
            'intPermanent3' => 'required',
            'intPermanent4' => 'required',
            'intPermanent5' => 'required',
            'intStdContract' => 'required',
            'intContract' => 'required',
            'intStdJobSupply' => 'required',
            'intJobSupply' => 'required',
            'intInternship' => 'required',
            'intStdInternship' => 'required',
            'dateBulanAvg' => 'required',			
                        
        ]);
        
        $valid = [
            'intStdPermanent' => $request->intStdPermanent,
            'intPermanent1' => $request->intPermanent1,
            'intPermanent2' => $request->intPermanent2,
            'intPermanent3' => $request->intPermanent3,
            'intPermanent4' => $request->intPermanent4,
            'intPermanent5' => $request->intPermanent5,
            'intStdContract' => $request->intStdContract,
            'intContract' => $request->intContract,
            'intStdJobSupply' => $request->intStdJobSupply,
            'intJobSupply' => $request->intJobSupply,
            'intInternship' => $request->intInternship,
            'intStdInternship' => $request->intStdInternship,
            'dateBulanAvg' => $request->dateBulanAvg
            
        ];
        AvdLeadtimeRecruitment::create($valid);
            
        return redirect()->route('avg')->with('message','Data added successfully.'); 
    }
    public function update(Request $request, $idAvg){
        $avg = AvdLeadtimeRecruitment::find($idAvg);
        $avg->intStdPermanent = $request->intStdPermanent;
        $avg->intPermanent1 = $request->intPermanent1;
        $avg->intPermanent1 = $request->intPermanent2;
        $avg->intPermanent3 = $request->intPermanent3;
        $avg->intPermanent4 = $request->intPermanent4;
        $avg->intPermanent5 = $request->intPermanent5;
        $avg->intStdContract = $request->intStdContract;
        $avg->intContract = $request->intContract;
        $avg->intStdJobSupply = $request->intStdJobSupply;
        $avg->intJobSupply = $request->intJobSupply;
        $avg->intStdInternship = $request->intStdInternship;
        $avg->intInternship = $request->intInternship;
        $avg->dateBulanAvg = $request->dateBulanAvg;
        $avg->save();
        return redirect()->route('avg')->with('message','Data updated successfully.');
	}
    public function destroy($idAvg)
    {
        AvdLeadtimeRecruitment::find($idAvg)->delete();
        // $data->delete();
        return redirect()->route('avg')->with('message','Data deleted successfully');
    }
}
