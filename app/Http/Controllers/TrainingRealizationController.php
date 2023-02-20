<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrainingRealization;
use App\DataTraineeModel;
use App\UserModel;
use App\KasbonModel;
use App\CostCenterModel;
use App\IkatanDinasModel;
use App\LearningHoursTrainingModel;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Builder;

class TrainingRealizationController extends Controller
{
    public function index(){
        // $realisasi = TrainingRealization::all();
        $futureTasks = TrainingRealization::whereDate('dateTanggalMulai', '>=', Carbon::now())
        ->orderBy('dateTanggalMulai', 'asc')
        ->get();
        $pastTasks = TrainingRealization::whereDate('dateTanggalMulai', '<', Carbon::now())
        ->orderBy('dateTanggalMulai', 'desc')
        ->get();
        $training_realizations = $futureTasks->merge($pastTasks);
        $trainees=DataTraineeModel::leftJoin('training_realizations','training_realizations.id','=','data_trainees.training_id')
        ->leftJoin('users','users.txtNik','=','data_trainees.user_id')
        ->orderBy('post_test', 'desc')
        ->get();
        
        $rata = DataTraineeModel::leftjoin('training_realizations','training_realizations.id','=','data_trainees.training_id')
                     ->selectRaw('data_trainees.training_id,training_realizations.txtTrainingName, avg(evaluasi_1+evaluasi_2+evaluasi_3+evaluasi_4+evaluasi_5+evaluasi_6+evaluasi_7+evaluasi_8) as rata2')
                     ->groupBy('training_id')
                     ->orderBy('training_id', 'desc')
                     ->get();
        $users=UserModel::all();
        $dinas=IkatanDinasModel::all();
        $kasbon=KasbonModel::join('cost_centers','cost_centers.id','=','costcenter_kasbon.costcenter_id')
                            ->orderBy('costcenter_id', 'asc')
                            ->get();
        $costcenter=CostCenterModel::all();
        $learninghours=LearningHoursTrainingModel::all();
        return view('pages.training.training-realization.index',
        compact('training_realizations','trainees','users','rata','kasbon','costcenter','dinas','learninghours'));
        // return view('pages.training.training-realization.index',
        // ['training_realizations'=>$realisasi]);
     }
     public function store(Request $request){
        $request->validate( [
            'intTotalParticipant' => 'required',
            'intTotalCost' => 'required',
            
            'txtPelaksanaan' => 'required',
            'txtMedia' => 'required',
            'txtTrainingName' => 'required',
            
            'txtTrainingType' => 'required',
            'txtStatus' => 'required',
            'txtTrainer' => 'required',
            
            'timeDurationStart' => 'required',
            'timeDurationEnd' => 'required',
            'timeDurationTotal' => 'required',
            
            'dateTanggalMulai' => 'required',			
                        
        ]);
        
        $valid = [
            'intTotalParticipant' => $request->intTotalParticipant,
            'intTotalCost' => $request->intTotalCost,
            'costSnack' => $request->costSnack,
            'statusPembayaran' => $request->statusPembayaran,
            'txtPelaksanaan' => $request->txtPelaksanaan,
            'txtMedia' => $request->txtMedia,
            'txtTrainingName' => $request->txtTrainingName,
            'lokasi' => $request->lokasi,
            'txtTrainingType' => $request->txtTrainingType,
            'txtStatus' => $request->txtStatus,
            'txtTrainer' => $request->txtTrainer,
            'timeDurationStart' => $request->timeDurationStart,
            'timeDurationEnd' => $request->timeDurationEnd,
            'timeDurationTotal' => $request->timeDurationTotal,
            'dateTanggalMulai' => $request->dateTanggalMulai,
            'tanggalSelesai' => $request->tanggalSelesai,
            'sertifikat' => $request->sertifikat,
            
        ];
        TrainingRealization::create($valid);
            
        return redirect()->route('realization')->with('message','Data added successfully.'); 
    }
    public function update(Request $request, $id){
        $realisasi = TrainingRealization::find($id);
        $realisasi->intTotalParticipant = $request->intTotalParticipant;
        $realisasi->intTotalCost = $request->intTotalCost;
        $realisasi->costSnack = $request->costSnack;
        $realisasi->statusPembayaran = $request->statusPembayaran;
        $realisasi->lokasi = $request->lokasi;
        $realisasi->txtPelaksanaan = $request->txtPelaksanaan;
        $realisasi->txtMedia = $request->txtMedia;
        $realisasi->txtTrainingName = $request->txtTrainingName;
        $realisasi->txtTrainingType = $request->txtTrainingType;
        $realisasi->txtStatus = $request->txtStatus;
        $realisasi->txtTrainer = $request->txtTrainer;
        $realisasi->timeDurationStart = $request->timeDurationStart;
        $realisasi->timeDurationEnd = $request->timeDurationEnd;
        $realisasi->timeDurationTotal = $request->timeDurationTotal;
        $realisasi->dateTanggalMulai = $request->dateTanggalMulai;
        $realisasi->tanggalSelesai = $request->tanggalSelesai;
        $realisasi->sertifikat = $request->sertifikat;
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
