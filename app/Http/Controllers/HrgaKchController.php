<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KchToptenModel;
use App\KchJmlCodeModel;
use App\KchReceiptUsageModel;
use App\KchTargetSavingModel;
use App\KchInventoryModel;
use App\KchFsnModel;
use App\KchToptenIssuedModel;
use App\KchToptenReceiptModel;
use App\KchDepartmentModel;
use App\KchCostCenterIssuedModel;
use Carbon\Carbon;
use DB;
use implode;


class HrgaKchController extends Controller
{
    public function index(){
        $kch_topten=KchToptenModel::orderBy('bulan', 'desc')->get();
        $kch_code=KchJmlCodeModel::whereYear('bulan', '=', Carbon::now())
                    ->orderBy('bulan', 'desc')
                    ->get();
        $kch_receipt=KchReceiptUsageModel::whereYear('bulan', '=', Carbon::now())
                    ->orderBy('bulan', 'desc')
                    ->get();
        $kch_target=KchTargetSavingModel::orderBy('tahun', 'desc')->get();
        $kch_fsn=KchFsnModel::whereYear('bulan', '=', Carbon::now())
                    ->orderBy('bulan', 'desc')
                    ->get();
        $kch_inventory = KchInventoryModel::join('kch_target_saving','kch_target_saving.idkchtargetsaving','=','kch_inventory.idkchtarget')
                ->whereYear('bulan', '=', Carbon::now())
                ->orderBy('bulan', 'asc')
				->get();
        // dd($a);
        $kch_toptenreceipt=KchToptenReceiptModel::orderBy('bulan', 'desc')->get();
        $kch_toptenissued=KchToptenIssuedModel::orderBy('bulan', 'desc')->get();
        $kch_department=KchDepartmentModel::orderBy('bulan', 'desc')->get();
        $kch_costcenter=KchCostCenterIssuedModel::orderBy('bulan', 'desc')->get();
        // dd($kcs_topten);
        return view('pages.hrga-issues.kch',compact('kch_topten','kch_code','kch_receipt','kch_target','kch_inventory','kch_fsn',
        'kch_toptenreceipt','kch_toptenissued','kch_department','kch_costcenter'
        ));
    }
    public function filter(Request $request){
        $monthrequest = $request->input('bulan');
        $ubah = Carbon::parse($monthrequest);
        $tahunini=$ubah->formatLocalized('%Y');
        $kch_topten=KchToptenModel::orderBy('bulan', 'desc')->where('bulan', 'like', $monthrequest.'%')->get();
        $kch_code=KchJmlCodeModel::orderBy('bulan', 'desc')->whereYear('bulan', $tahunini)->get();
        $kch_receipt=KchReceiptUsageModel::orderBy('bulan', 'desc')->whereYear('bulan', $tahunini)->get();
        $kch_target=KchTargetSavingModel::orderBy('tahun', 'desc')->get();
        $kch_fsn=KchFsnModel::orderBy('bulan', 'desc')->whereYear('bulan', $tahunini)->get();
        $kch_inventory = KchInventoryModel::join('kch_target_saving','kch_target_saving.idkchtargetsaving','=','kch_inventory.idkchtarget')
                ->whereYear('bulan', $tahunini)
                ->orderBy('bulan', 'asc')
				->get();
        // dd($a);
        $kch_toptenreceipt=KchToptenReceiptModel::orderBy('bulan', 'desc')->where('bulan', 'like', $monthrequest.'%')->get();
        $kch_toptenissued=KchToptenIssuedModel::orderBy('bulan', 'desc')->where('bulan', 'like', $monthrequest.'%')->get();
        $kch_department=KchDepartmentModel::orderBy('bulan', 'desc')->where('bulan', 'like', $monthrequest.'%')->get();
        $kch_costcenter=KchCostCenterIssuedModel::orderBy('bulan', 'desc')->where('bulan', 'like', $monthrequest.'%')->get();
        // dd($kcs_topten);
        return view('pages.hrga-issues.kch',compact('kch_topten','kch_code','kch_receipt','kch_target','kch_inventory','kch_fsn',
        'kch_toptenreceipt','kch_toptenissued','kch_department','kch_costcenter'
        ));
    }
    public function storeTop(Request $request){
        $request->validate( [		
            'bulan' => 'required',			
            'kchitem' => 'required',			
                        
        ]);
        $month = $request->input('bulan');
        // Memecah bulan dan tahun dari input form
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $valid = [
            'kchitem' => $request->kchitem,
            'itemdescription' => $request->itemdescription,
            'uom' => $request->uom,
            'onhand' => $request->onhand,
            'itemcost' => $request->itemcost,
            'bulan' => $bulan,
        ];
        KchToptenModel::create($valid);
            
        return redirect()->route('kch')->with('message','Data added successfully.'); 
    }
    public function updateTop(Request $request,$idkchtopten){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $topten = KchToptenModel::find($idkchtopten);        
        $topten->kchitem=$request->kchitem;
        $topten->itemdescription=$request->itemdescription;
        $topten->uom=$request->uom;
        $topten->onhand=$request->onhand;
        $topten->itemcost=$request->itemcost;
        $topten->bulan=$bulan;
        $topten->save();
        return redirect()->route('kch')->with('message','Data updated successfully.');
    }
    public function destroyTop($idkchtopten)
    {
        KchToptenModel::find($idkchtopten)->delete();
        // $data->delete();
        return redirect()->route('kch')->with('message','Data deleted successfully');
    }
    public function storeCode(Request $request){
        $request->validate( [		
            'bulan' => 'required',			
            'jmlitemcode' => 'required',			
                        
        ]);
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $valid = [
            'jmlitemcode' => $request->jmlitemcode,
            'bulan' => $bulan,
            
        ];
        KchJmlCodeModel::create($valid);
            
        return redirect()->route('kch')->with('message','Data added successfully.'); 
    }
    public function updateCode(Request $request,$idkchjmlcode){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $code = KchJmlCodeModel::find($idkchjmlcode);     
        $code->jmlitemcode=$request->jmlitemcode;
        $code->bulan=$bulan;
        $code->save();
        return redirect()->route('kch')->with('message','Data updated successfully.');
    }
    public function destroyCode($idkchjmlcode)
    {
        KchJmlCodeModel::find($idkchjmlcode)->delete();
        // $data->delete();
        return redirect()->route('kch')->with('message','Data deleted successfully');
    }
    public function storeReceipt(Request $request){
        $request->validate( [		
            'bulan' => 'required',			
            'po_receipt' => 'required',			
            'usage' => 'required',			
            'itemusage' => 'required',			
            'itemreceipt' => 'required',			
                        
        ]);
        $month = $request->input('bulan');
        // Memecah bulan dan tahun dari input form
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $valid = [
            'po_receipt' => $request->po_receipt,
            'issued' => $request->usage,
            'itemusage' => $request->itemusage,
            'itemreceipt' => $request->itemreceipt,
            'bulan' => $bulan,
            
        ];
        KchReceiptUsageModel::create($valid);
            
        return redirect()->route('kch')->with('message','Data added successfully.'); 
    }
    public function updateReceipt(Request $request,$idkchreceiptissue){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $code = KchReceiptUsageModel::find($idkchreceiptissue);     
        $code->po_receipt=$request->po_receipt;
        $code->issued=$request->usage;
        $code->itemusage=$request->itemusage;
        $code->itemreceipt=$request->itemreceipt;
        $code->bulan=$bulan;
        $code->save();
        return redirect()->route('kch')->with('message','Data updated successfully.');
    }
    public function destroyReceipt($idkchreceiptissue)
    {
        KchReceiptUsageModel::find($idkchreceiptissue)->delete();
        // $data->delete();
        return redirect()->route('kch')->with('message','Data deleted successfully');
    }
    public function storeTarget(Request $request){
        $request->validate( [		
            'tahun' => 'required',			
                        
        ]);
        
        $valid = [
            'tahun' => $request->tahun,
            'kchtargetsaving' => $request->kchtargetsaving,
            'kchvaluetargetsaving' => $request->kchvaluetargetsaving,
            
        ];
        KchTargetSavingModel::create($valid);
            
        return redirect()->route('kch')->with('message','Data added successfully.'); 
    }
    public function storeInventory(Request $request){
        $request->validate( [		
            'bulan' => 'required',			
            'idkchtarget' => 'required',			
                        
        ]);
        $month = $request->input('bulan');
        // Memecah bulan dan tahun dari input form
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $valid = [
            'bulan' => $bulan,
            'idkchtarget' => $request->idkchtarget,
            'kchvalue_inventory' => $request->kchvalue_inventory,
            
        ];
        KchInventoryModel::create($valid);
            
        return redirect()->route('kch')->with('message','Data added successfully.'); 
    }
    public function updateInventory(Request $request,$idkchinventory){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $inventory = KchInventoryModel::find($idkchinventory);        
        $inventory->bulan=$bulan;
        $inventory->idkchtarget=$request->idkchtarget;
        $inventory->kchvalue_inventory=$request->kchvalue_inventory;
        $inventory->save();
        return redirect()->route('kch')->with('message','Data updated successfully.');
    }
    public function destroyInventory($idkchinventory)
    {
        KchInventoryModel::find($idkchinventory)->delete();
        // $data->delete();
        return redirect()->route('kch')->with('message','Data deleted successfully');
    }
    public function storeFsn(Request $request){
        $request->validate( [		
            'bulan' => 'required',			
                        
        ]);
        $month = $request->input('bulan');
        // Memecah bulan dan tahun dari input form
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $valid = [
            'bulan' => $bulan,
            'fastmoving' => $request->fastmoving,
            'slowmoving' => $request->slowmoving,
            'nonmoving' => $request->nonmoving,
            'deadstock' => $request->deadstock,
            
        ];
        KchFsnModel::create($valid);
            
        return redirect()->route('kch')->with('message','Data added successfully.'); 
    }
    public function updateFsn(Request $request,$idkchfsn){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $fsn = KchFsnModel::find($idkchfsn);        
        $fsn->bulan=$bulan;
        $fsn->fastmoving=$request->fastmoving;
        $fsn->slowmoving=$request->slowmoving;
        $fsn->nonmoving=$request->nonmoving;
        $fsn->deadstock=$request->deadstock;
        $fsn->save();
        return redirect()->route('kch')->with('message','Data updated successfully.');
    }
    public function destroyFsn($idkchfsn)
    {
        KchFsnModel::find($idkchfsn)->delete();
        // $data->delete();
        return redirect()->route('kch')->with('message','Data deleted successfully');
    }
    public function storeTopReceipt(Request $request){
        $request->validate( [		
            'bulan' => 'required',			
                        
        ]);
        $month = $request->input('bulan');
        // Memecah bulan dan tahun dari input form
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $valid = [
            'bulan' => $bulan,
            'costreceipt' => $request->costreceipt,
            'description' => $request->description,
        ];
        KchToptenReceiptModel::create($valid);
            
        return redirect()->route('kch')->with('message','Data added successfully.'); 
    }
    public function updateTopReceipt(Request $request,$idkchtoptenreceipt){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $toptenreceipt = KchToptenReceiptModel::find($idkchtoptenreceipt);        
        $toptenreceipt->bulan=$bulan;
        $toptenreceipt->description=$request->description;
        $toptenreceipt->costreceipt=$request->costreceipt;
        $toptenreceipt->save();
        return redirect()->route('kch')->with('message','Data updated successfully.');
    }
    public function destroyTopReceipt($idkchtoptenreceipt)
    {
        KchToptenReceiptModel::find($idkchtoptenreceipt)->delete();
        // $data->delete();
        return redirect()->route('kch')->with('message','Data deleted successfully');
    }
    public function storeTopIssued(Request $request){
        $request->validate( [		
            'bulan' => 'required',			    
        ]);
        $month = $request->input('bulan');
        // Memecah bulan dan tahun dari input form
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $valid = [
            'bulan' => $bulan,
            'costissued' => $request->costissued,
            'description' => $request->description,
        ];
        KchToptenIssuedModel::create($valid);
            
        return redirect()->route('kch')->with('message','Data added successfully.'); 
    }
    public function updateTopIssued(Request $request,$idkchtoptenissued){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $toptenreceipt = KchToptenIssuedModel::find($idkchtoptenissued);        
        $toptenreceipt->bulan=$bulan;
        $toptenreceipt->description=$request->description;
        $toptenreceipt->costissued=$request->costissued;
        $toptenreceipt->save();
        return redirect()->route('kch')->with('message','Data updated successfully.');
    }
    public function destroyTopIssued($idkchtoptenissued)
    {
        KchToptenIssuedModel::find($idkchtoptenissued)->delete();
        // $data->delete();
        return redirect()->route('kch')->with('message','Data deleted successfully');
    }
    public function storeDepartment(Request $request){
        $validatedData = $request->validate([
            'department.*' => 'required',
            'cost.*' => 'required',
        ]);
        
        $month = $request->input('bulan');
        // Memecah bulan dan tahun dari input form
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $data = [];
        for ($i = 0; $i < count($request->department); $i++) {
            $data[] = [
                'bulan' => $bulan,
                'department' => $request->department[$i],
                'cost' => $request->cost[$i],
            ];
        }
        KchDepartmentModel::insert($data);
            
        return redirect()->route('kch')->with('message','Data added successfully.'); 
    }
    public function updateDepartment(Request $request,$idkchdepartment){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $department = KchDepartmentModel::find($idkchdepartment);        
        $department->bulan=$bulan;
        $department->department=$request->department;
        $department->cost=$request->cost;
        $department->save();
        return redirect()->route('kch')->with('message','Data updated successfully.');
    }
    public function destroyDepartment($idkchdepartment)
    {
        KchDepartmentModel::find($idkchdepartment)->delete();
        // $data->delete();
        return redirect()->route('kch')->with('message','Data deleted successfully');
    }
    public function storeCostCenter(Request $request){
        $validatedData = $request->validate([
            'costcenter.*' => 'required',
            'cost.*' => 'required',
        ]);
        $month = $request->input('bulan');
        // Memecah bulan dan tahun dari input form
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $data = [];
        for ($i = 0; $i < count($request->costcenter); $i++) {
            $data[] = [
                'bulan' => $bulan,
                'costcenter' => $request->costcenter[$i],
                'cost' => $request->cost[$i],
            ];
        }
        // dd($data);
        KchCostCenterIssuedModel::insert($data);
            
        return redirect()->route('kch')->with('message','Data added successfully.'); 
    }
    public function updateCostCenter(Request $request,$idkchcostcenter){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $costcenter = KchCostCenterIssuedModel::find($idkchcostcenter);        
        $costcenter->bulan=$bulan;
        $costcenter->costcenter=$request->costcenter;
        $costcenter->cost=$request->cost;
        $costcenter->save();
        return redirect()->route('kch')->with('message','Data updated successfully.');
    }
    public function destroyCostCenter($idkchcostcenter)
    {
        KchCostCenterIssuedModel::find($idkchcostcenter)->delete();
        // $data->delete();
        return redirect()->route('kch')->with('message','Data deleted successfully');
    }
}
