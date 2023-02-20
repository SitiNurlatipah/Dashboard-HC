<?php

namespace App\Http\Controllers;
use App\LearningHoursTrainingModel;
use Illuminate\Http\Request;

class LearningHoursController extends Controller
{
    public function store(Request $request){
        $request->validate( [
            'costcenter_id' => 'required',	  
        ]);
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $valid = [
            'bulan' => $bulan,	  
            'durasigol_1' => $request->durasigol_1,	  
            'durasigol_2' => $request->durasigol_2,	  
            'durasigol_3' => $request->durasigol_3,	  
            'durasigol_4' => $request->durasigol_4,	  
            'durasigol_5' => $request->durasigol_5,	  
            'durasigol_6' => $request->durasigol_6,	  
            'pesertagol_1' => $request->pesertagol_1,	  
            'pesertagol_2' => $request->pesertagol_2,	  
            'pesertagol_3' => $request->pesertagol_3,	  
            'pesertagol_4' => $request->pesertagol_4,	  
            'pesertagol_5' => $request->pesertagol_5,	  
            'pesertagol_6' => $request->pesertagol_6,	  
        ];
        LearningHoursTrainingModel::insert($data);
            
        return redirect()->route('realization')->with('message','Data added successfully.'); 
    }
    public function update(Request $request, $id_learninghours){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $learning = LearningHoursTrainingModel::find($id_learninghours);
        $learning->bulan = $bulan;
        $learning->bulan = $bulan;
        $learning->total = $request->total;
        $learning->save();
        return redirect()->route('realization')->with('message','Data updated successfully.');
    }
    public function destroy($id_learninghours)
    {
        LearningHoursTrainingModel::find($id_learninghours)->delete();
        // $data->delete();
        return redirect()->route('realization')->with('message','Data deleted successfully');
    }
}
