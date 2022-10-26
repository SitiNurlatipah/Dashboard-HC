<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HrgaModel;
use Carbon\Carbon;
use App\TrainingRealization;
use App\DataTraineeModel;
use App\UserModel;
use DB;

class HrgaIssuesController extends Controller
{
    public function index(){
        // $todayDate = Carbon::now();
        // dd($todayDate);
        $hrga_issues=HrgaModel::all();
        $rata = DataTraineeModel::selectRaw('data_trainees.training_id, avg(evaluasi_1+evaluasi_2) as rata2')
                     ->join('training_realizations','data_trainees.training_id','=','id')
                     ->groupBy('training_id')
                     ->get();
        return view('pages.hrga-issues.index',compact('hrga_issues','rata'));
    }
    public function store(Request $request){
        $hrga_issues = new HrgaModel;
        $hrga_issues->namaKegiatan=$request->input('namaKegiatan');
        $hrga_issues->tempat=$request->input('tempat');
        $hrga_issues->tanggal=$request->input('tanggal');
        // dd($hrga_issues->namaKegiatan);
        $hrga_issues->save();
    }
    public function update(Request $request,$id){
        $hrga_issues = HrgaModel::find($id);        
        $hrga_issues->namaKegiatan=$request->input('namaKegiatan');
        $hrga_issues->tempat=$request->input('tempat');
        $hrga_issues->tanggal=$request->input('tanggal');
        $hrga_issues->save();
        
    }
    // public function filter(Request $request){
            
    // }
}
