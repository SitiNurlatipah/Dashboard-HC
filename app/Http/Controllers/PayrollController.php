<?php

namespace App\Http\Controllers;
use App\PayrollOvertimeModel;
use App\PayrollDepartmentModel;
use App\PayrollBeritaModel;
use App\PayrollTerlambatModel;
use App\PayrollKelahiranModel;
use App\PayrollDukacitaModel;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class PayrollController extends Controller
{
    public function index(){
        $department=PayrollDepartmentModel::all();
        $otdepartment=PayrollOvertimeModel::join('department','department.iddepartment','=','topten_overtime.id_department')
                ->orderBy('otweighthour', 'desc')
                ->whereMonth('bulan', '=', Carbon::now())
                ->get();
        $beritadepartment=PayrollBeritaModel::join('department','department.iddepartment','=','payroll_berita.id_department')
                ->orderBy('department', 'desc')
                ->whereMonth('bulan', '=', Carbon::now())
                ->get();
        $detailsterlambat=PayrollTerlambatModel::join('department','department.iddepartment','=','payroll_terlambat.id_department')
                ->orderBy('department', 'desc')
                ->whereMonth('bulan', '=', Carbon::now())
                ->get();
        $terlambat=PayrollDepartmentModel::join('payroll_terlambat','payroll_terlambat.id_department','=','department.iddepartment')
                ->select(DB::raw("department.*, bulan, sum(jumlahtelat) as telat"))
                ->groupBy('iddepartment')
                ->whereMonth('bulan', '=', Carbon::now())
                ->get();
        $detailskelahiran=PayrollKelahiranModel::join('department','department.iddepartment','=','payroll_kelahiran.id_department')
                ->orderBy('department', 'desc')
                ->whereMonth('bulan', '=', Carbon::now())
                ->get();
        $kelahiran=PayrollDepartmentModel::join('payroll_kelahiran','payroll_kelahiran.id_department','=','department.iddepartment')
                ->select(DB::raw("department.*, bulan, nama, count(nama) as jmlkelahiran"))
                ->groupBy('iddepartment')
                ->whereMonth('bulan', '=', Carbon::now())
                ->get();
        $detailsdukacita=PayrollDukacitaModel::join('department','department.iddepartment','=','payroll_dukacita.id_department')
                ->orderBy('department', 'desc')
                ->whereMonth('bulan', '=', Carbon::now())
                ->get();
        $dukacita=PayrollDepartmentModel::join('payroll_dukacita','payroll_dukacita.id_department','=','department.iddepartment')
                ->select(DB::raw("department.*, bulan,nama, count(nama) as jmldukacita"))
                ->groupBy('iddepartment')
                ->whereMonth('bulan', '=', Carbon::now())
                ->get();
        $darr=PayrollDepartmentModel::join('payroll_dukacita','payroll_dukacita.id_department','=','department.iddepartment')
                ->select(DB::raw("department.*, bulan,nama, count(nama) as jmldukacita"))
                ->groupBy('id_department')
                ->whereMonth('bulan', '=', Carbon::now())
                ->get();
        // dd($darr);
        return view('pages.payroll.index',compact('otdepartment','department','beritadepartment','terlambat','detailsterlambat',
        'kelahiran','detailskelahiran','dukacita','detailsdukacita'
        ));
    }
    public function filter(Request $request)
    {
        $monthrequest = $request->input('bulan');
        $department=PayrollDepartmentModel::all();
        $otdepartment=PayrollOvertimeModel::join('department','department.iddepartment','=','topten_overtime.id_department')
                ->orderBy('otweighthour', 'desc')
                ->where('bulan', 'like', $monthrequest.'%')
                ->get();
        return view('pages.payroll.index',compact('otdepartment','department'
            ));    
    }
    public function storeOvertime(Request $request){
        $validatedData = $request->validate([
            'nama.*' => 'required',
            'nik.*' => 'required',
            'otweighthour.*' => 'required',
            'id_department' => 'required',
            'bulan' => 'required',
        ]);
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        
        $id_department = $request->input('id_department');
        $data = [];
        for ($i = 0; $i < count($request->nama); $i++) {
            $data[] = [
                'bulan' => $bulan,
                'id_department' => $id_department,
                'nama' => $request->nama[$i],
                'nik' => $request->nik[$i],
                'otweighthour' => $request->otweighthour[$i],
            ];
        }
        // dd($data);
        PayrollOvertimeModel::insert($data);
            
        return redirect()->route('payroll')->with('message','Data added successfully.'); 
    }
    
    public function updateOvertime(Request $request,$idtop_ot){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $overtime = PayrollOvertimeModel::find($idtop_ot);        
        $overtime->bulan=$bulan;
        $overtime->id_department=$request->id_department;
        $overtime->nama=$request->nama;
        $overtime->nik=$request->nik;
        $overtime->otweighthour=$request->otweighthour;
        $overtime->save();
        return redirect()->route('payroll')->with('message','Data updated successfully.');
    }
    public function destroyOvertime($idtop_ot)
    {
        PayrollOvertimeModel::find($idtop_ot)->delete();
        // $data->delete();
        return redirect()->route('payroll')->with('message','Data deleted successfully');
    }
    public function storeKelahiran(Request $request){
        $validatedData = $request->validate([
            'nama.*' => 'required',
            'keterangan.*' => 'required',
            'id_department' => 'required',
            'bulan' => 'required',
        ]);
        $month = $request->input('bulan');
        // Memecah bulan dan tahun dari input form
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        
        // $bulan = $request->input('bulan');
        $id_department = $request->input('id_department');
        $data = [];
        for ($i = 0; $i < count($request->nama); $i++) {
            $data[] = [
                'bulan' => $bulan,
                'id_department' => $id_department,
                'nama' => $request->nama[$i],
                'keterangan' => $request->keterangan[$i],
            ];
        }
        // dd($data);
        PayrollKelahiranModel::insert($data);
            
        return redirect()->route('payroll')->with('message','Data added successfully.'); 
    }
    
    public function updateKelahiran(Request $request,$id_kelahiran){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $kelahiran = PayrollKelahiranModel::find($id_kelahiran);        
        $kelahiran->bulan=$bulan;
        $kelahiran->id_department=$request->id_department;
        $kelahiran->nama=$request->nama;
        $kelahiran->keterangan=$request->keterangan;
        $kelahiran->save();
        return redirect()->route('payroll')->with('message','Data updated successfully.');
    }
    public function destroyKelahiran($id_kelahiran)
    {
        PayrollKelahiranModel::find($id_kelahiran)->delete();
        // $data->delete();
        return redirect()->route('payroll')->with('message','Data deleted successfully');
    }
    public function storeDukacita(Request $request){
        $validatedData = $request->validate([
            'nama.*' => 'required',
            'keterangan.*' => 'required',
            'id_department' => 'required',
            'bulan' => 'required',
        ]);
        $month = $request->input('bulan');
        // Memecah bulan dan tahun dari input form
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        
        // $bulan = $request->input('bulan');
        $id_department = $request->input('id_department');
        $data = [];
        for ($i = 0; $i < count($request->nama); $i++) {
            $data[] = [
                'bulan' => $bulan,
                'id_department' => $id_department,
                'nama' => $request->nama[$i],
                'keterangan' => $request->keterangan[$i],
            ];
        }
        // dd($data);
        PayrollDukacitaModel::insert($data);
            
        return redirect()->route('payroll')->with('message','Data added successfully.'); 
    }
    
    public function updateDukacita(Request $request,$id_dukacita){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $kelahiran = PayrollDukacitaModel::find($id_dukacita);        
        $kelahiran->bulan=$bulan;
        $kelahiran->id_department=$request->id_department;
        $kelahiran->nama=$request->nama;
        $kelahiran->keterangan=$request->keterangan;
        $kelahiran->save();
        return redirect()->route('payroll')->with('message','Data updated successfully.');
    }
    public function destroyDukacita($id_dukacita)
    {
        PayrollDukacitaModel::find($id_dukacita)->delete();
        // $data->delete();
        return redirect()->route('payroll')->with('message','Data deleted successfully');
    }
    public function storeTerlambat(Request $request){
        $validatedData = $request->validate([
            'nama.*' => 'required',
            'jumlah.*' => 'required',
            'id_department' => 'required',
            'bulan' => 'required',
        ]);
        $month = $request->input('bulan');
        // Memecah bulan dan tahun dari input form
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        
        // $bulan = $request->input('bulan');
        $id_department = $request->input('id_department');
        $data = [];
        for ($i = 0; $i < count($request->nama); $i++) {
            $data[] = [
                'bulan' => $bulan,
                'id_department' => $id_department,
                'nama' => $request->nama[$i],
                'jumlahtelat' => $request->jumlah[$i],
            ];
        }
        // dd($data);
        PayrollTerlambatModel::insert($data);
            
        return redirect()->route('payroll')->with('message','Data added successfully.'); 
    }
    
    public function updateTerlambat(Request $request,$id_terlambat){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $terlambat = PayrollTerlambatModel::find($id_terlambat);        
        $terlambat->bulan=$bulan;
        $terlambat->id_department=$request->id_department;
        $terlambat->nama=$request->nama;
        $terlambat->jumlah=$request->jumlah;
        $terlambat->save();
        return redirect()->route('payroll')->with('message','Data updated successfully.');
    }
    public function destroyTerlambat($id_terlambat)
    {
        PayrollTerlambatModel::find($id_terlambat)->delete();
        // $data->delete();
        return redirect()->route('payroll')->with('message','Data deleted successfully');
    }
    
}
