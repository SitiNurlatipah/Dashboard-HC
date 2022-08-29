<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeModel;
use App\GetoModel;
use App\ToModel;
use Redirect,Response;
use DB;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function indexEmployee(){
		
		$dataEmployee = EmployeeModel::orderBy('dateTglInput', 'DESC')->get();
		$geto = GetoModel::orderBy('dateTglInput', 'DESC')->get();
		$to = ToModel::orderBy('dateTglInput', 'DESC')->get();
		$jumlah_employee = EmployeeModel::select(DB::raw("CAST(SUM(intJumlahEmployee) as int) as jumlah_employee"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('jumlah_employee');
		$karyawan = EmployeeModel::select(DB::raw("CAST(SUM(intKaryawan) as int) as karyawan"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('karyawan');
		$outsource = EmployeeModel::select(DB::raw("CAST(SUM(intOutsource) as int) as outsource"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('outsource');
		$kontrak = EmployeeModel::select(DB::raw("CAST(SUM(intContract) as int) as kontrak"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('kontrak');
        $bulan=EmployeeModel::select(DB::raw("MONTHNAME(dateTglInput) as bulan"))
					->GroupBy(DB::raw("MONTHNAME(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
					->pluck('bulan');
		$total_geto = GetoModel::select(DB::raw("CAST(SUM(intTotal) as int) as total_geto"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('total_geto');
		$getoKaryawan = GetoModel::select(DB::raw("CAST(SUM(intGetoKaryawan) as int) as getoKaryawan"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('getoKaryawan');
		$getoKontrak = GetoModel::select(DB::raw("CAST(SUM(intGetoKontark) as int) as getoKontrak"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('getoKontrak');
		$getoOutsource = GetoModel::select(DB::raw("CAST(SUM(intGetoOutsource) as int) as getoOutsource"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('getoOutsource');
        $bulanGeto=GetoModel::select(DB::raw("MONTHNAME(dateTglInput) as bulanGeto"))
					->GroupBy(DB::raw("MONTHNAME(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
					->pluck('bulanGeto');
		$total_to = ToModel::select(DB::raw("CAST(SUM(intTotal) as int) as total_to"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('total_to');
        $bulanTo=ToModel::select(DB::raw("MONTHNAME(dateTglInput) as bulanTo"))
					->GroupBy(DB::raw("MONTHNAME(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
					->pluck('bulanTo');		
		$toOutsource = ToModel::select(DB::raw("CAST(SUM(intToOutsource) as int) as toEmployee"))
                    ->GroupBy(DB::raw("Month(dateTglInput)")) 
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('toEmployee');
		$toKontrak = ToModel::select(DB::raw("CAST(SUM(intToKontrak) as int) as toKontrak"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('toKontrak');
		$toKaryawan = ToModel::select(DB::raw("CAST(SUM(intToKaryawan) as int) as toKaryawan"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('toKaryawan');
        	
        return view('pages.management-employee.index',compact('jumlah_employee','bulan',
		'total_geto','bulanGeto','total_to','bulanTo','toKaryawan',
		'toKontrak','toOutsource','getoKaryawan','getoKontrak','getoOutsource','karyawan','kontrak','outsource'),[
		'employees' => $dataEmployee,'getos'=>$geto,'tos'=>$to
		]);
	}
	public function chart(){
		$jumlah_employee = EmployeeModel::select(DB::raw("CAST(SUM(intJumlahEmployee) as int) as jumlah_employee"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
                    ->pluck('jumlah_employee');
        $bulan=EmployeeModel::select(DB::raw("MONTHNAME(dateTglInput) as bulan"))
					->GroupBy(DB::raw("MONTHNAME(dateTglInput)"))
					->pluck('bulan');
		return view('pages.management-employee.chart',compact('jumlah_employee','bulan'));
	}
	
    public function filter(Request $request)
    {
       $start_date = $request->input('start_date');
       $end_date = $request->input('end_date');
	   $dataEmployee=EmployeeModel::where('dateTglInput','>=',$start_date)
	   ->where('dateTglInput','<=',$end_date)
	   ->get();
	   $geto=GetoModel::where('dateTglInput','>=',$start_date)
	   ->where('dateTglInput','<=',$end_date)
	   ->get(); 
	   $to=ToModel::where('dateTglInput','>=',$start_date)
	   ->where('dateTglInput','<=',$end_date)
	   ->get();
	   $jumlah_employee = EmployeeModel::select(DB::raw("CAST(SUM(intJumlahEmployee) as int) as jumlah_employee"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('jumlah_employee');
		$karyawan = EmployeeModel::select(DB::raw("CAST(SUM(intKaryawan) as int) as karyawan"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('karyawan');
		$outsource = EmployeeModel::select(DB::raw("CAST(SUM(intOutsource) as int) as outsource"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('outsource');
		$kontrak = EmployeeModel::select(DB::raw("CAST(SUM(intContract) as int) as kontrak"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('kontrak');
        $bulan=EmployeeModel::select(DB::raw("MONTHNAME(dateTglInput) as bulan"))
					->GroupBy(DB::raw("MONTHNAME(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
					->pluck('bulan');
		$total_geto = GetoModel::select(DB::raw("CAST(SUM(intTotal) as int) as total_geto"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('total_geto');
		$getoKaryawan = GetoModel::select(DB::raw("CAST(SUM(intGetoKaryawan) as int) as getoKaryawan"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('getoKaryawan');
		$getoKontrak = GetoModel::select(DB::raw("CAST(SUM(intGetoKontark) as int) as getoKontrak"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('getoKontrak');
		$getoOutsource = GetoModel::select(DB::raw("CAST(SUM(intGetoOutsource) as int) as getoOutsource"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('getoOutsource');
        $bulanGeto=GetoModel::select(DB::raw("MONTHNAME(dateTglInput) as bulanGeto"))
					->GroupBy(DB::raw("MONTHNAME(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
					->pluck('bulanGeto');
		$total_to = ToModel::select(DB::raw("CAST(SUM(intTotal) as int) as total_to"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('total_to');
        $bulanTo=ToModel::select(DB::raw("MONTHNAME(dateTglInput) as bulanTo"))
					->GroupBy(DB::raw("MONTHNAME(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
					->pluck('bulanTo');		
		$toOutsource = ToModel::select(DB::raw("CAST(SUM(intToOutsource) as int) as toEmployee"))
                    ->GroupBy(DB::raw("Month(dateTglInput)")) 
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('toEmployee');
		$toKontrak = ToModel::select(DB::raw("CAST(SUM(intToKontrak) as int) as toKontrak"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('toKontrak');
		$toKaryawan = ToModel::select(DB::raw("CAST(SUM(intToKaryawan) as int) as toKaryawan"))
                    ->GroupBy(DB::raw("Month(dateTglInput)"))
					->orderBy('dateTglInput', 'ASC')
                    ->pluck('toKaryawan');
	   return view('pages.management-employee.index',compact('jumlah_employee','bulan',
	   'total_geto','bulanGeto','total_to','bulanTo','toKaryawan',
	   'toKontrak','toOutsource','getoKaryawan','getoKontrak','getoOutsource','karyawan','kontrak','outsource'),[
		'employees' => $dataEmployee,'getos'=>$geto,'tos'=>$to
		]);
    //    return EmployeeModel::whereBetween('dateTglInp',[$start_date,$end_date])->get();

    }   
    public function store(Request $request)
	{
		
        $request->validate( [
			'intJumlahEmployee' => 'required',
			'intKaryawan' => 'required',
			'intContract' => 'required',
			'intOutsource' => 'required',
			'dateTglInput' => 'required',			
					
		]);

		$valid = [
			'intJumlahEmployee'=>$request->intJumlahEmployee,
			'intKaryawan'=>$request->intKaryawan,
			'intContract'=>$request->intContract,
			'intOutsource'=>$request->intOutsource,
			
			'dateTglInput'=>date('d-m-Y', ($request->dateTglInput)),
		];
		EmployeeModel::create($valid);
		return redirect()->route('employee')->with('message','Data Employee added successfully.');
	}
	public function update(Request $request, $id){
        $dataEmployee = EmployeeModel::find($id);
        $dataEmployee->intJumlahEmployee = $request->intJumlahEmployee;
        $dataEmployee->intKaryawan = $request->intKaryawan;
        $dataEmployee->intContract = $request->intContract;
        
        $dataEmployee->dateTglInput = $request->dateTglInput;
        $dataEmployee->save();
        return redirect()->route('employee')->with('message','Data updated successfully.');
	}
	public function destroy($id)
    {
        EmployeeModel::find($id)->delete();
        // $data->delete();
        return redirect()->route('employee')->with('message','Data deleted successfully');
    }

	//geto 
	public function employeeFilterGeto(Request $request)
    {
       $start_date = $request->input('start_date');
       $end_date = $request->input('end_date');
	   $query=GetoModel::where('dateTglInput','>=',$start_date)
	   ->where('dateTglInput','<=',$end_date)
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
		'intGetoKontark' => 'required',
		'intGetoOutsource' => 'required',
		'dateTglInput' => 'required',			
				
	]);
	$validation = [
		'intTotal'=>$request->intTotal,
		'intGetoKaryawan'=>$request->intGetoKaryawan,
		'intGetoKontark'=>$request->intGetoKontark,
		'intGetoOutsource'=>$request->intGetoOutsource,
		'dateTglInput'=>$request->dateTglInput,
		
	];
	GetoModel::create($validation);
	return redirect()->route('employee')->with('message','Data GETO Employee added successfully.');
	
	}
	public function updateGeto(Request $request, $id){
        $geto = GetoModel::find($id);
        $geto->intTotal = $request->intTotal;
        $geto->intGetoKaryawan = $request->intGetoKaryawan;
        $geto->intGetoOutsource = $request->intGetoOutsource;
        $geto->intGetoKontark = $request->intGetoKontark;
        
        $geto->dateTglInput = $request->dateTglInput;
        $geto->save();
        return redirect()->route('employee')->with('message','Data GETO Employee updated successfully.');
	}
	public function destroyGeto($id)
    {
        GetoModel::find($id)->delete();
        // $data->delete();
        return redirect()->route('employee')->with('message','Data deleted successfully');
    }

	//To
	public function employeeFilterTo(Request $request)
    {
       $start_date = $request->input('start_date');
       $end_date = $request->input('end_date');
	   $query=ToModel::where('dateTglInput','>=',$start_date)
	   ->where('dateTglInput','<=',$end_date)
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
		'dateTglInput' => 'required',			
			
	]);
	$confirm = [
		'intTotal'=>$request->intTotal,
		'intToKaryawan'=>$request->intToKaryawan,
		'intToKontrak'=>$request->intToKontrak,
		'intToOutsource'=>$request->intToOutsource,
		'dateTglInput'=>$request->dateTglInput,
		
	];
	ToModel::create($confirm);
	return redirect()->route('employee')->with('message','Data GETO Employee added successfully.');
	
	}
	public function updateTo(Request $request, $id){
        $to = ToModel::find($id);
        $to->intTotal = $request->intTotal;
        $to->intToKaryawan = $request->intToKaryawan;
        $to->intToOutsource = $request->intToOutsource;
        $to->intToKontrak = $request->intToKontrak;
        
        $to->dateTglInput = $request->dateTglInput;
        $to->save();
        return redirect()->route('employee')->with('message','Data TO Employee updated successfully.');
	}
	public function destroyTo($id)
    {
        ToModel::find($id)->delete();
        // $data->delete();
        return redirect()->route('employee')->with('message','Data deleted successfully');
    }
}