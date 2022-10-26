<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrainingRealization;
use App\DataTraineeModel;
use App\UserModel;
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
                     ->selectRaw('data_trainees.training_id, avg(evaluasi_1+evaluasi_2) as rata2')
                     
                     ->groupBy('training_id')
                     ->get();
        // dd($rata);
        // $rata = DB::table('data_trainees')
        //              ->select(DB::raw('AVG(evaluasi_1+evaluasi_2+evaluasi_3) as rata2, training_id'))
        //              ->join('training_realizations','data_trainees.training_id','=','id')
        //              ->groupBy('id')
        //              ->orderBy('id')
        //              ->get();
        $users=UserModel::all();
        // $data = TrainingRealization::leftJoin('data_trainees','training_realizations.id','=','data_trainees.training_id')
        // ->where('training_realizations.id','data_trainees.training_id')
        // ->select(DB::raw("CAST(AVG(evaluasi_1+evaluasi_1) as int) as data"))
        // ->GroupBy(DB::raw("training_id"))
        // ->get();
        // dd($data);
        
        // $response = compact('tasks');
        return view('pages.training.training-realization.index',
        compact('training_realizations','trainees','users','rata'));
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
