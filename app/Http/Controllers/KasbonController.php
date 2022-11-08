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
        
        $valid = [
            'costcenter_id' => $request->costcenter_id,
            'total' => $request->total,
            
        ];
        KasbonModel::create($valid);
            
        return redirect()->route('realization')->with('message','Data added successfully.'); 
    }
    public function update(Request $request, $idKasbon){
        $k = KasbonModel::find($idKasbon);
        $k->costcenter_id = $request->costcenter_id;
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
