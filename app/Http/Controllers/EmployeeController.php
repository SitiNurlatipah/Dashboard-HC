<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeModel;
use App\GetoModel;
use App\ToModel;
use App\RealModel;
use Redirect,Response;
use DB;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function indexEmployee(){
		$real=RealModel::all();
		$geto = GetoModel::join('real_employees','real_employees.idReal','=','geto_employees.realemployee')
				->orderBy('dateBulan', 'DESC')
				->get();
		$to = ToModel::join('real_employees','real_employees.idReal','=','to_employees.realemployee_id')
				->orderBy('dateBulan', 'DESC')
				->get();
		
		$getoKaryawan = GetoModel::join('real_employees','real_employees.idReal','=','geto_employees.realemployee')
					->select(DB::raw("CAST(AVG((intGetoKaryawan/realTotal)*100) as int) as getoKaryawan"))
                    ->GroupBy(DB::raw("year(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
                    ->pluck('getoKaryawan');
        $bulanGeto=GetoModel::join('real_employees','real_employees.idReal','=','geto_employees.realemployee')
					->select(DB::raw("year(dateBulan) as bulanGeto"))
					->GroupBy(DB::raw("year(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
					->pluck('bulanGeto');
        $total_to = ToModel::join('real_employees','real_employees.idReal','=','to_employees.realemployee_id')
					->select(DB::raw("CAST(SUM(intTotal) as int) as total_to"))
                    ->GroupBy(DB::raw("year(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
                    ->pluck('total_to');
        $bulanTo=ToModel::join('real_employees','real_employees.idReal','=','to_employees.realemployee_id')
					->select(DB::raw("year(dateBulan) as bulanTo"))
					->GroupBy(DB::raw("year(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
					->pluck('bulanTo');		
		$toOutsource = ToModel::join('real_employees','real_employees.idReal','=','to_employees.realemployee_id')
					->select(DB::raw("CAST(SUM(intToOutsource) as int) as toEmployee"))
                    ->GroupBy(DB::raw("year(dateBulan)")) 
					->orderBy('dateBulan', 'ASC')
                    ->pluck('toEmployee');
		$toKontrak = ToModel::join('real_employees','real_employees.idReal','=','to_employees.realemployee_id')
					->select(DB::raw("CAST(SUM(intToKontrak) as int) as toKontrak"))
                    ->GroupBy(DB::raw("year(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
                    ->pluck('toKontrak');
		
        	
        return view('pages.management-employee.index',compact(
		'bulanGeto','bulanTo', 'toKontrak','toOutsource','getoKaryawan','real'),[
		'getos'=>$geto,'tos'=>$to
		]);
	}
	
	
    public function filter(Request $request)
    {
	   $real=RealModel::all();
       $start_date = $request->input('start_date');
       $end_date = $request->input('end_date');
	   $geto=GetoModel::join('real_employees','real_employees.idReal','=','geto_employees.realemployee')
	   ->where('dateBulan','>=',$start_date)
	   ->where('dateBulan','<=',$end_date)
	   ->get(); 
	   $to=ToModel::join('real_employees','real_employees.idReal','=','to_employees.realemployee_id')
	   ->where('dateBulan','>=',$start_date)
	   ->where('dateBulan','<=',$end_date)
	   ->get();
	   $getoKaryawan = GetoModel::join('real_employees','real_employees.idReal','=','geto_employees.realemployee')
					->select(DB::raw("CAST(AVG((intGetoKaryawan/realTotal)*100) as int) as getoKaryawan"))
                    ->GroupBy(DB::raw("year(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
                    ->pluck('getoKaryawan');
        $bulanGeto=GetoModel::join('real_employees','real_employees.idReal','=','geto_employees.realemployee')
					->select(DB::raw("year(dateBulan) as bulanGeto"))
					->GroupBy(DB::raw("year(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
					->pluck('bulanGeto');
        $total_to = ToModel::join('real_employees','real_employees.idReal','=','to_employees.realemployee_id')
					->select(DB::raw("CAST(SUM(intTotal) as int) as total_to"))
                    ->GroupBy(DB::raw("year(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
                    ->pluck('total_to');
        $bulanTo=ToModel::join('real_employees','real_employees.idReal','=','to_employees.realemployee_id')
					->select(DB::raw("year(dateBulan) as bulanTo"))
					->GroupBy(DB::raw("year(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
					->pluck('bulanTo');		
		$toOutsource = ToModel::join('real_employees','real_employees.idReal','=','to_employees.realemployee_id')
					->select(DB::raw("CAST(SUM(intToOutsource) as int) as toEmployee"))
                    ->GroupBy(DB::raw("year(dateBulan)")) 
					->orderBy('dateBulan', 'ASC')
                    ->pluck('toEmployee');
		$toKontrak = ToModel::join('real_employees','real_employees.idReal','=','to_employees.realemployee_id')
					->select(DB::raw("CAST(SUM(intToKontrak) as int) as toKontrak"))
                    ->GroupBy(DB::raw("year(dateBulan)"))
					->orderBy('dateBulan', 'ASC')
                    ->pluck('toKontrak');
		
        return view('pages.management-employee.index',compact(
		'bulanGeto','bulanTo', 'toKontrak','toOutsource','getoKaryawan','real'),[
		'getos'=>$geto,'tos'=>$to
		]);
    }   
    
	//geto 
	public function employeeFilterGeto(Request $request)
    {
       $start_date = $request->input('start_date');
       $end_date = $request->input('end_date');
	   $query=GetoModel::where('dateBulan','>=',$start_date)
	   ->where('dateBulan','<=',$end_date)
	   ->get();
	   dd($query);
	//    return redirect()->route('employee');
 
    //    return EmployeeModel::whereBetween('created_at',[$start_date,$end_date])->get();

    }   
	public function storeGeto(Request $request)
	{
    $request->validate( [
		'intTotal' => 'required',
		'intGetoKaryawan' => 'required',
		'intGetoKontrak' => 'required',
		'intGetoOutsource' => 'required',
		'realemployee' => 'required',
		// 'dateBulan' => 'required',			
				
	]);
	$validation = [
		'intTotal'=>$request->intTotal,
		'intGetoKaryawan'=>$request->intGetoKaryawan,
		'intGetoKontrak'=>$request->intGetoKontrak,
		'intGetoOutsource'=>$request->intGetoOutsource,
		'realemployee'=>$request->realemployee,
		// 'dateBulan'=>$request->dateBulan,
		
	];
	GetoModel::create($validation);
	return redirect()->route('employee')->with('message','Data added successfully.');
	
	}
	public function updateGeto(Request $request, $idGeto){
        $geto = GetoModel::find($idGeto);
        $geto->intTotal = $request->intTotal;
        $geto->intGetoKaryawan = $request->intGetoKaryawan;
        $geto->intGetoOutsource = $request->intGetoOutsource;
        $geto->intGetoKontrak = $request->intGetoKontrak;
        $geto->realemployee = $request->realemployee;
        $geto->save();
        return redirect()->route('employee')->with('message','Data updated successfully.');
	}
	public function destroyGeto($idGeto)
    {
        GetoModel::find($idGeto)->delete();
        // $data->delete();
        return redirect()->route('employee')->with('message','Data deleted successfully');
    }

	//To
	public function employeeFilterTo(Request $request)
    {
       $start_date = $request->input('start_date');
       $end_date = $request->input('end_date');
	   $query=ToModel::where('dateBulan','>=',$start_date)
	   ->where('dateBulan','<=',$end_date)
	   ->get();
	   dd($query);
	//    return redirect()->route('employee');
 
    //    return EmployeeModel::whereBetween('created_at',[$start_date,$end_date])->get();

    }   
	public function storeTo(Request $request)
	{
    $request->validate( [
		'intTotal' => 'required',
		'intToKaryawan' => 'required',
		'intToKontrak' => 'required',
		'intToOutsource' => 'required',
		'realemployee_id' => 'required',			
			
	]);
	$confirm = [
		'intTotal'=>$request->intTotal,
		'intToKaryawan'=>$request->intToKaryawan,
		'intToKontrak'=>$request->intToKontrak,
		'intToOutsource'=>$request->intToOutsource,
		'realemployee_id'=>$request->realemployee_id,
		
	];
	ToModel::create($confirm);
	return redirect()->route('employee')->with('message','Data added successfully.');
	
	}
	public function updateTo(Request $request, $idTo){
        $to = ToModel::find($idTo);
        $to->intTotal = $request->intTotal;
        $to->intToKaryawan = $request->intToKaryawan;
        $to->intToOutsource = $request->intToOutsource;
        $to->intToKontrak = $request->intToKontrak;
        $to->realemployee_id = $request->realemployee_id;
        $to->save();
        return redirect()->route('employee')->with('message','Data updated successfully.');
	}
	public function destroyTo($idTo)
    {
        ToModel::find($idTo)->delete();
        // $data->delete();
        return redirect()->route('employee')->with('message','Data deleted successfully');
    }
}