<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrainingRealization;

class TrainingRealizationController extends Controller
{
    public function index(){
        $realisasi = TrainingRealization::all();
        return view('pages.training.training-realization.index',
        ['training_realizations'=>$realisasi]);
     }
     public function store(Request $request){
        $request->validate( [
            'intTotalParticipant' => 'required',
            'intTotalCost' => 'required',
            'intSumOfSession' => 'required',
            'txtPelaksanaan' => 'required',
            'txtMedia' => 'required',
            'txtTrainingName' => 'required',
            'txtTrainee' => 'required',
            'txtFormUsulan' => 'required',
            'txtTrainingType' => 'required',
            'txtStatus' => 'required',
            'txtTrainer' => 'required',
            'txtReason' => 'required',
            'timeDurationStart' => 'required',
            'timeDurationEnd' => 'required',
            'timeDurationTotal' => 'required',
            'timeTrainingHour' => 'required',
            'dateTanggal' => 'required',			
                        
        ]);
        
        $valid = [
            'intTotalParticipant' => $request->intTotalParticipant,
            'intTotalCost' => $request->intTotalCost,
            'intSumOfSession' => $request->intSumOfSession,
            'txtPelaksanaan' => $request->txtPelaksanaan,
            'txtMedia' => $request->txtMedia,
            'txtTrainingName' => $request->txtTrainingName,
            'txtTrainee' => $request->txtTrainee,
            'txtFormUsulan' => $request->txtFormUsulan,
            'txtTrainingType' => $request->txtTrainingType,
            'txtStatus' => $request->txtStatus,
            'txtTrainer' => $request->txtTrainer,
            'txtReason' => $request->txtReason,
            'timeDurationStart' => $request->timeDurationStart,
            'timeDurationEnd' => $request->timeDurationEnd,
            'timeDurationTotal' => $request->timeDurationTotal,
            'timeTrainingHour' => $request->timeTrainingHour,
            'dateTanggal' => $request->dateTanggal,
            
        ];
        TrainingRealization::create($valid);
            
        return redirect()->route('realization')->with('message','Data added successfully.'); 
    }
    public function update(Request $request, $id){
        $realisasi = TrainingRealization::find($id);
        $realisasi->intTotalParticipant = $request->intTotalParticipant;
        $realisasi->intTotalCost = $request->intTotalCost;
        $realisasi->intSumOfSession = $request->intSumOfSession;
        $realisasi->txtPelaksanaan = $request->txtPelaksanaan;
        $realisasi->txtMedia = $request->txtMedia;
        $realisasi->txtTrainingName = $request->txtTrainingName;
        $realisasi->txtTrainee = $request->txtTrainee;
        $realisasi->txtFormUsulan = $request->txtFormUsulan;
        $realisasi->txtTrainingType = $request->txtTrainingType;
        $realisasi->txtStatus = $request->txtStatus;
        $realisasi->txtTrainer = $request->txtTrainer;
        $realisasi->txtReason = $request->txtReason;
        $realisasi->timeDurationStart = $request->timeDurationStart;
        $realisasi->timeDurationEnd = $request->timeDurationEnd;
        $realisasi->timeDurationTotal = $request->timeDurationTotal;
        $realisasi->timeTrainingHour = $request->timeTrainingHour;
        $realisasi->dateTanggal = $request->dateTanggal;
        $realisasi->save();
        return redirect()->route('realization')->with('message','Data updated successfully.');
	}
    public function destroy($id)
    {
        TrainingRealization::find($id)->delete();
        // $data->delete();
        return redirect()->route('realization')->with('message','Data deleted successfully');
    }
}
