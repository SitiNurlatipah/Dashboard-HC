<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KcsToptenModel;
use App\KcsJmlCodeModel;
use App\KcsReceiptUsageModel;
use App\KcsTargetSavingModel;
use App\KcsInventoryModel;
use App\KcsFsnModel;
use App\KcsToptenIssuedModel;
use App\KcsToptenReceiptModel;
use App\KcsDepartmentModel;
use App\KcsCostCenterIssuedModel;
use Carbon\Carbon;
use DB;

class HrgaKcsController extends Controller
{
    public function index(){
        $kcs_topten=KcsToptenModel::orderBy('bulan', 'desc')->get();
        $kcs_code=KcsJmlCodeModel::orderBy('bulan', 'desc')->get();
        $kcs_fsn=KcsFsnModel::orderBy('bulan', 'desc')->get();
        $kcs_receipt=KcsReceiptUsageModel::orderBy('bulan', 'desc')->get();
        $kcs_target=KcsTargetSavingModel::orderBy('tahun', 'desc')->get();
        $kcs_inventory = KcsInventoryModel::join('target_saving_kcs','target_saving_kcs.idtargetsaving','=','inventory_kcs.idsavingcost')
				->orderBy('bulan', 'asc')
                ->whereYear('bulan', '=', Carbon::now())
				->get();
        $kcs_toptenreceipt=KcsToptenReceiptModel::all();
        $kcs_toptenissued=KcsToptenIssuedModel::all();
        $kcs_department=KcsDepartmentModel::orderBy('bulan', 'desc')->get();
        $kcs_costcenter=KcsCostCenterIssuedModel::orderBy('bulan', 'desc')->get();

        // dd($kcs_topten);
        return view('pages.hrga-issues.kcs',compact('kcs_topten','kcs_code','kcs_receipt','kcs_target','kcs_inventory','kcs_fsn',
        'kcs_toptenreceipt','kcs_toptenissued','kcs_department','kcs_costcenter'
        ));
    }
    public function filterTop(Request $request){
        $monthrequest = $request->input('bulan');
        $ubah = Carbon::parse($monthrequest);
        $tahunini=$ubah->formatLocalized('%Y');
        $kcs_topten=KcsToptenModel::orderBy('bulan', 'desc')
                    ->where('bulan', 'like', $monthrequest.'%')
                    ->get();
        $kcs_code=KcsJmlCodeModel::orderBy('bulan', 'desc')
                    ->whereYear('bulan', $tahunini)
                    ->get();
        $kcs_fsn=KcsFsnModel::orderBy('bulan', 'desc')
                    ->whereYear('bulan', $tahunini)
                    ->get();
        $kcs_receipt=KcsReceiptUsageModel::orderBy('bulan', 'desc')
                    ->whereYear('bulan', $tahunini)
                    ->get();
        $kcs_target=KcsTargetSavingModel::orderBy('tahun', 'desc')->get();
        $kcs_inventory = KcsInventoryModel::join('target_saving_kcs','target_saving_kcs.idtargetsaving','=','inventory_kcs.idsavingcost')
				->orderBy('bulan', 'asc')
                ->whereYear('bulan', $tahunini)
				->get();
        $kcs_toptenreceipt=KcsToptenReceiptModel::where('bulan', 'like', $monthrequest.'%')->get();
        $kcs_toptenissued=KcsToptenIssuedModel::where('bulan', 'like', $monthrequest.'%')->get();
        $kcs_department=KcsDepartmentModel::orderBy('bulan', 'desc')
                ->where('bulan', 'like', $monthrequest.'%')
                ->get();
        $kcs_costcenter=KcsCostCenterIssuedModel::orderBy('bulan', 'desc')
                ->where('bulan', 'like', $monthrequest.'%')
                ->get();

        // dd($kcs_topten);
        return view('pages.hrga-issues.kcs',compact('kcs_topten','kcs_code','kcs_receipt','kcs_target','kcs_inventory','kcs_fsn',
        'kcs_toptenreceipt','kcs_toptenissued','kcs_department','kcs_costcenter'
        ));
    }
    public function storeTop(Request $request){
        $request->validate( [		
            'bulan' => 'required',			
            'item' => 'required',			
                        
        ]);
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $valid = [
            'item' => $request->item,
            'description' => $request->description,
            'uom' => $request->uom,
            'onhand' => $request->onhand,
            'cost' => $request->cost,
            'bulan' => $bulan,
        ];
        KcsToptenModel::create($valid);
            
        return redirect()->route('kcs')->with('message','Data added successfully.'); 
    }
    public function updateTop(Request $request,$idtopten){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $topten = KcsToptenModel::find($idtopten);        
        $topten->item=$request->item;
        $topten->description=$request->description;
        $topten->uom=$request->uom;
        $topten->onhand=$request->onhand;
        $topten->cost=$request->cost;
        $topten->bulan=$bulan;
        $topten->save();
        return redirect()->route('kcs')->with('message','Data updated successfully.');
    }
    public function destroyTop($idtopten)
    {
        KcsToptenModel::find($idtopten)->delete();
        // $data->delete();
        return redirect()->route('kcs')->with('message','Data deleted successfully');
    }
    public function storeCode(Request $request){
        $request->validate( [		
            'bulan' => 'required',			
            'jmlCode' => 'required',			
                        
        ]);
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $valid = [
            'jmlCode' => $request->jmlCode,
            'bulan' => $bulan,
            
        ];
        KcsJmlCodeModel::create($valid);
            
        return redirect()->route('kcs')->with('message','Data added successfully.'); 
    }
    public function updateCode(Request $request,$idJmlCode){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $code = KcsJmlCodeModel::find($idJmlCode);     
        $code->jmlCode=$request->jmlCode;
        $code->bulan=$bulan;
        $code->save();
        return redirect()->route('kcs')->with('message','Data updated successfully.');
    }
    public function destroyCode($idJmlCode)
    {
        KcsJmlCodeModel::find($idJmlCode)->delete();
        // $data->delete();
        return redirect()->route('kcs')->with('message','Data deleted successfully');
    }
    public function storeReceipt(Request $request){
        $request->validate( [		
            'bulan' => 'required',			
            'po_receipt' => 'required',			
            'costusage' => 'required',			
            'itemusage' => 'required',			
            'itemreceipt' => 'required',			
                        
        ]);
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $valid = [
            'po_receipt' => $request->po_receipt,
            'costusage' => $request->costusage,
            'itemusage' => $request->itemusage,
            'itemreceipt' => $request->itemreceipt,
            'bulan' => $bulan,
            
        ];
        KcsReceiptUsageModel::create($valid);
            
        return redirect()->route('kcs')->with('message','Data added successfully.'); 
    }
    public function updateReceipt(Request $request,$idreceiptissue){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $code = KcsReceiptUsageModel::find($idreceiptissue);     
        $code->po_receipt=$request->po_receipt;
        $code->costusage=$request->costusage;
        $code->itemusage=$request->itemusage;
        $code->itemreceipt=$request->itemreceipt;
        $code->bulan=$bulan;
        $code->save();
        return redirect()->route('kcs')->with('message','Data updated successfully.');
    }
    public function destroyReceipt($idreceiptissue)
    {
        KcsReceiptUsageModel::find($idreceiptissue)->delete();
        // $data->delete();
        return redirect()->route('kcs')->with('message','Data deleted successfully');
    }
    public function storeTarget(Request $request){
        $request->validate( [		
            'tahun' => 'required',			
                        
        ]);
        
        $valid = [
            'tahun' => $request->tahun,
            'targetsaving' => $request->targetsaving,
            'valuetargetsaving' => $request->valuetargetsaving,
            
        ];
        KcsTargetSavingModel::create($valid);
            
        return redirect()->route('kcs')->with('message','Data added successfully.'); 
    }
    public function storeInventory(Request $request){
        $request->validate( [		
            'bulan' => 'required',			
            'idsavingcost' => 'required',			
                        
        ]);
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $valid = [
            'bulan' => $bulan,
            'idsavingcost' => $request->idsavingcost,
            'valueinventory' => $request->valueinventory,
            // 'valuesaving' => $request->valuesaving,
            
        ];
        KcsInventoryModel::create($valid);
            
        return redirect()->route('kcs')->with('message','Data added successfully.'); 
    }
    public function updateInventory(Request $request,$idinventory){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $inventory = KcsInventoryModel::find($idinventory);        
        $inventory->bulan=$bulan;
        $inventory->idsavingcost=$request->idsavingcost;
        $inventory->valueinventory=$request->valueinventory;
        // $inventory->valuesaving=$request->valuesaving;
        $inventory->save();
        return redirect()->route('kcs')->with('message','Data updated successfully.');
    }
    public function destroyInventory($idinventory)
    {
        KcsInventoryModel::find($idinventory)->delete();
        // $data->delete();
        return redirect()->route('kcs')->with('message','Data deleted successfully');
    }
    public function storeFsn(Request $request){
        $request->validate( [		
            'bulan' => 'required',			
                        
        ]);
        $month = $request->input('bulan');
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
        KcsFsnModel::create($valid);
            
        return redirect()->route('kcs')->with('message','Data added successfully.'); 
    }
    public function updateFsn(Request $request,$idkcsfsn){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $fsn = KcsFsnModel::find($idkcsfsn);        
        $fsn->bulan=$bulan;
        $fsn->fastmoving=$request->fastmoving;
        $fsn->slowmoving=$request->slowmoving;
        $fsn->nonmoving=$request->nonmoving;
        $fsn->deadstock=$request->deadstock;
        $fsn->save();
        return redirect()->route('kcs')->with('message','Data updated successfully.');
    }
    public function destroyFsn($idkcsfsn)
    {
        KcsFsnModel::find($idkcsfsn)->delete();
        // $data->delete();
        return redirect()->route('kcs')->with('message','Data deleted successfully');
    }
    public function storeTopReceipt(Request $request){
        $request->validate( [		
            'bulan' => 'required',			
                        
        ]);
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $valid = [
            'bulan' => $bulan,
            'costreceipt' => $request->costreceipt,
            'description' => $request->description,
        ];
        KcsToptenReceiptModel::create($valid);
            
        return redirect()->route('kcs')->with('message','Data added successfully.'); 
    }
    public function updateTopReceipt(Request $request,$idkcstoptenreceipt){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $toptenreceipt = KcsToptenReceiptModel::find($idkcstoptenreceipt);        
        $toptenreceipt->bulan=$bulan;
        $toptenreceipt->description=$request->description;
        $toptenreceipt->costreceipt=$request->costreceipt;
        $toptenreceipt->save();
        return redirect()->route('kcs')->with('message','Data updated successfully.');
    }
    public function destroyTopReceipt($idkcstoptenreceipt)
    {
        KcsToptenReceiptModel::find($idkcstoptenreceipt)->delete();
        // $data->delete();
        return redirect()->route('kcs')->with('message','Data deleted successfully');
    }
    public function storeTopIssued(Request $request){
        $request->validate( [		
            'bulan' => 'required',			    
        ]);
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $valid = [
            'bulan' => $bulan,
            'costissued' => $request->costissued,
            'description' => $request->description,
        ];
        KcsToptenIssuedModel::create($valid);
            
        return redirect()->route('kcs')->with('message','Data added successfully.'); 
    }
    public function updateTopIssued(Request $request,$idkcstoptenissued){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $toptenreceipt = KcsToptenIssuedModel::find($idkcstoptenissued);        
        $toptenreceipt->bulan=$bulan;
        $toptenreceipt->description=$request->description;
        $toptenreceipt->costissued=$request->costissued;
        $toptenreceipt->save();
        return redirect()->route('kcs')->with('message','Data updated successfully.');
    }
    public function destroyTopIssued($idkcstoptenissued)
    {
        KcsToptenIssuedModel::find($idkcstoptenissued)->delete();
        // $data->delete();
        return redirect()->route('kcs')->with('message','Data deleted successfully');
    }
    public function storeDepartment(Request $request){
        $validatedData = $request->validate([
            'department.*' => 'required',
            'cost.*' => 'required',
        ]);
        $month = $request->input('bulan');
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
        KcsDepartmentModel::insert($data);
            
        return redirect()->route('kcs')->with('message','Data added successfully.'); 
    }
    public function updateDepartment(Request $request,$idkcsdepartment){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $department = KcsDepartmentModel::find($idkcsdepartment);        
        $department->bulan=$bulan;
        $department->department=$request->department;
        $department->cost=$request->cost;
        $department->save();
        return redirect()->route('kcs')->with('message','Data updated successfully.');
    }
    public function destroyDepartment($idkcsdepartment)
    {
        KcsDepartmentModel::find($idkcsdepartment)->delete();
        // $data->delete();
        return redirect()->route('kcs')->with('message','Data deleted successfully');
    }
    public function storeCostCenter(Request $request){
        $validatedData = $request->validate([
            'costcenter.*' => 'required',
            'cost.*' => 'required',
        ]);
        $month = $request->input('bulan');
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
        KcsCostCenterIssuedModel::insert($data);
            
        return redirect()->route('kcs')->with('message','Data added successfully.'); 
    }
    public function updateCostCenter(Request $request,$idkcscostcenter){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $costcenter = KcsCostCenterIssuedModel::find($idkcscostcenter);        
        $costcenter->bulan=$bulan;
        $costcenter->costcenter=$request->costcenter;
        $costcenter->cost=$request->cost;
        $costcenter->save();
        return redirect()->route('kcs')->with('message','Data updated successfully.');
    }
    public function destroyCostCenter($idkcscostcenter)
    {
        KcsCostCenterIssuedModel::find($idkcscostcenter)->delete();
        // $data->delete();
        return redirect()->route('kcs')->with('message','Data deleted successfully');
    }
}