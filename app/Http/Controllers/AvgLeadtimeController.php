<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AvdLeadtimeRecruitment;

class AvgLeadtimeController extends Controller
{
    public function index(){
        $avg = AvdLeadtimeRecruitment::all();
        return view('pages.avg-leadtime-recruitment.index',
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
        $avg->intStdPermanent = $request->intMppPermanent;
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
        $avg->dateBulan = $request->dateBulan;
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
