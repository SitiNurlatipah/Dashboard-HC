<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTraineeModel;
use App\TrainingRealization;

class DataTraineeController extends Controller
{
    
    public function store(Request $request){
        // $request->validate( [	       
        //     'user_id' => 'required',	       
        //     'training_id' => 'required',	       
        // ]);
        
        // $valid = [
        //     'post_test' => $request->post_test,
        //     'evaluasi_1' => $request->evaluasi_1,
        //     'evaluasi_2' => $request->evaluasi_2,
        //     'evaluasi_3' => $request->evaluasi_3,
        //     'evaluasi_4' => $request->evaluasi_4,
        //     'evaluasi_5' => $request->evaluasi_5,
        //     'evaluasi_6' => $request->evaluasi_6,
        //     'evaluasi_7' => $request->evaluasi_7,
        //     'evaluasi_8' => $request->evaluasi_8,
        //     'user_id' => $request->user_id,
        //     'training_id' => $request->training_id,
        //     'assesment_before' => $request->assesment_before,
        //     'assesment_target' => $request->assesment_target,
        //     'assesment_actual' => $request->assesment_actual,
        //     'komentar' => $request->komentar,
            
            
        // ];
        // DataTraineeModel::create($valid);
        
        
        $trainee = [
            $training_id =  $request->input('training_id'),
            $user_id =  $request->input('user_id', [])
        ];

        foreach ($user_id as $index => $user) {
            $trainee = [
                "training_id" => $training_id,
                "user_id" => $user_id[$index],
            ];
        }
        DataTraineeModel::create($trainee);
        return redirect()->route('realization')->with('message','Data added successfully.');
    }
    public function update(Request $request, $idTrainee){
        $trainee = DataTraineeModel::find($idTrainee);
        $trainee->post_test = $request->post_test;
        $trainee->user_id = $request->user_id;
        $trainee->training_id = $request->training_id;
        $trainee->assesment_before = $request->assesment_before;
        $trainee->assesment_target = $request->assesment_target;
        $trainee->assesment_actual = $request->assesment_actual;
        $trainee->komentar = $request->komentar;
        $trainee->evaluasi_1 = $request->evaluasi_1;
        $trainee->evaluasi_2 = $request->evaluasi_2;
        $trainee->evaluasi_3 = $request->evaluasi_3;
        $trainee->evaluasi_4 = $request->evaluasi_4;
        $trainee->evaluasi_5 = $request->evaluasi_5;
        $trainee->evaluasi_6 = $request->evaluasi_6;
        $trainee->evaluasi_7 = $request->evaluasi_7;
        $trainee->evaluasi_8 = $request->evaluasi_8;
        $trainee->save();
        return redirect()->route('realization')->with('message','Data updated successfully.');
	}
    public function destroy($idTrainee)
    {
        DataTraineeModel::find($idTrainee)->delete();
        // $data->delete();
        return redirect()->route('realization')->with('message','Data deleted successfully');
    }
}
