<?php

namespace App\Http\Controllers;
use App\IkatanDinasModel;
use Illuminate\Http\Request;

class IkatanDinasController extends Controller
{
    public function store(Request $request){
        $request->validate( [
            'peserta' => 'required',	  
            'vendor' => 'required',	  
            'tglPelaksanaan' => 'required',	  
            'tglBerakhir' => 'required',	  
            'durasi' => 'required',	  
            'training' => 'required',	  
        ]);
        
        $valid = [
            'peserta' => $request->peserta,	  
            'vendor' => $request->vendor,	  
            'tglPelaksanaan' => $request->tglPelaksanaan,	  
            'tglBerakhir' => $request->tglBerakhir,	  
            'durasi' => $request->durasi,	  
            'training' => $request->training,	  
            'biaya' => $request->biaya,	  
        ];
        IkatanDinasModel::create($valid);
            
        return redirect()->route('realization')->with('message','Data added successfully.'); 
    }
    public function update(Request $request, $idIkatanDinas){
        $d = IkatanDinasModel::find($idIkatanDinas);
        $d->peserta = $request->peserta;
        $d->vendor = $request->vendor;
        $d->tglPelaksanaan = $request->tglPelaksanaan;
        $d->tglBerakhir = $request->tglBerakhir;
        $d->durasi = $request->durasi;
        $d->training = $request->training;
        $d->biaya = $request->biaya;
        $d->save();
        return redirect()->route('realization')->with('message','Data updated successfully.');
    }
    public function destroy($idIkatanDinas)
    {
        IkatanDinasModel::find($idIkatanDinas)->delete();
        return redirect()->route('realization')->with('message','Data deleted successfully');
    }
}
