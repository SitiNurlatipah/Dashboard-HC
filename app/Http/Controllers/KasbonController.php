<?php

namespace App\Http\Controllers;
use App\KasbonModel;
use Illuminate\Http\Request;

class KasbonController extends Controller
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
        $data = [];
        for ($i = 0; $i < count($request->costcenter_id); $i++) {
            $data[] = [
                'bulan' => $bulan,
                'costcenter_id' => $request->costcenter_id[$i],
                'total' => $request->total[$i],
            ];
        }
        KasbonModel::insert($data);
            
        return redirect()->route('realization')->with('message','Data added successfully.'); 
    }
    public function update(Request $request, $idKasbon){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $k = KasbonModel::find($idKasbon);
        $k->costcenter_id = $request->costcenter_id;
        $k->bulan = $bulan;
        $k->total = $request->total;
        $k->save();
        return redirect()->route('realization')->with('message','Data updated successfully.');
    }
    public function destroy($idKasbon)
    {
        KasbonModel::find($idKasbon)->delete();
        // $data->delete();
        return redirect()->route('realization')->with('message','Data deleted successfully');
    }
}
