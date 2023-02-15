<?php

namespace App\Http\Controllers;
use App\RealModel;
use App\MppModel;
use App\TrainingRealization;
use App\Productivity;
use App\HumanCost;
use App\KcsToptenModel;
use App\KchToptenModel;
use App\KcsFsnModel;
use App\KchFsnModel;
use App\KcsJmlCodeModel;
use App\KchJmlCodeModel;
use App\KcsReceiptUsageModel;
use App\KchReceiptUsageModel;
use App\KcsToptenIssuedModel;
use App\KcsToptenReceiptModel;
use App\KchToptenIssuedModel;
use App\KchToptenReceiptModel;
use App\KcsDepartmentModel;
use App\KcsCostCenterIssuedModel;
use App\KchDepartmentModel;
use App\KchCostCenterIssuedModel;
use App\KchInventoryModel;
use App\KcsInventoryModel;
use App\PayrollDepartmentModel;
use App\PayrollOvertimeModel;
use App\PayrollBeritaModel;
use App\PayrollTerlambatModel;
use App\PayrollKelahiranModel;
use App\PayrollDukacitaModel;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $ytd= RealModel::select(DB::raw("year(dateBulan)as year, max(dateBulan), realTotal as ytd "))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytd');
        $mtd= RealModel::select(DB::raw("realTotal as ytd "))
        ->whereYear('dateBulan', '=', Carbon::now())
        ->GroupBy(DB::raw("(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytd');
        $ytdmtd = $ytd->merge($mtd);
        //permanent
        $ytdPermanent= RealModel::select(DB::raw("year(dateBulan)as year, max(realPermanent) as ytdPermanent "))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdPermanent');
        $mtdPermanent= RealModel::select(DB::raw("realPermanent as ytdPermanent "))
        ->whereYear('dateBulan', '=', Carbon::now())
        ->GroupBy(DB::raw("(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdPermanent');
        $ytdmtdPermanent = $ytdPermanent->merge($mtdPermanent);
        //contract
        $ytdContract= RealModel::select(DB::raw("year(dateBulan)as year, max(realContract) as ytdContract "))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdContract');
        $mtdContract= RealModel::select(DB::raw("realContract as ytdContract "))
        ->whereYear('dateBulan', '=', Carbon::now())
        ->GroupBy(DB::raw("(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdContract');
        $ytdmtdContract = $ytdContract->merge($mtdContract);
        //jobsupply
        $ytdJobsupply= RealModel::select(DB::raw("year(dateBulan)as year, max(realJobSupply) as ytdJobsupply "))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdJobsupply');
        // dd($ytdJobsupply);
        $mtdJobsupply= RealModel::select(DB::raw("realJobSupply as ytdJobsupply "))
        ->whereYear('dateBulan', '=', Carbon::now())
        ->GroupBy(DB::raw("(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdJobsupply');
        $ytdmtdJobsupply = $ytdJobsupply->merge($mtdJobsupply);
        $ytdTotal= RealModel::select(DB::raw("year(dateBulan)as year, max(realTotal) as ytdTotal "))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdTotal');
        $mtdTotal= RealModel::select(DB::raw("realTotal as ytdTotal "))
        ->whereYear('dateBulan', '=', Carbon::now())
        ->GroupBy(DB::raw("(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdTotal');
        $ytdmtdTotal = $ytdTotal->merge($mtdTotal);
        // dd($ytdmtdTotal);
        $ytdTotalMpp= RealModel::join('mpp_employee','mpp_employee.idmpp','=','real_employees.mpp_tahun')
        ->select(DB::raw("year(dateBulan)as year, max(mppTotal) as ytdTotal "))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdTotal');
        $mtdTotalMpp= RealModel::join('mpp_employee','mpp_employee.idmpp','=','real_employees.mpp_tahun')
        ->select(DB::raw("mppTotal as ytdTotal"))
        ->whereYear('dateBulan', '=', Carbon::now())
        ->GroupBy(DB::raw("(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdTotal');
        $ytdmtdTotalMpp = $ytdTotalMpp->merge($mtdTotalMpp);
        //bulan
        $bulanMtd=RealModel::select(DB::raw("(DATE_FORMAT(dateBulan,'%M-%Y')) as bulan"))
        ->GroupBy(DB::raw("(DATE_FORMAT(dateBulan,'%M-%Y'))"))
        ->whereYear('dateBulan', '=', Carbon::now())
        ->orderBy('dateBulan', 'asc')
        ->pluck('bulan');
        $bulanYtd=RealModel::select(DB::raw("(DATE_FORMAT(dateBulan,'%Y')) as bulan"))
        ->GroupBy(DB::raw("(DATE_FORMAT(dateBulan,'%Y'))"))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->orderBy('dateBulan', 'asc')
        ->pluck('bulan');
        $bulanytdmtd = $bulanYtd->merge($bulanMtd);
        // dd($bulanytdmtd);
        
        $internalTahun = TrainingRealization::select(DB::raw("year(dateTanggalMulai) as year"),DB::raw('count(IF(txtTrainingType = "Internal",1,NULL)) as internal'))
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))  
        ->GroupBy('txtTrainingType')  
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->orderBy('dateTanggalMulai', 'asc')
        // ->get();      
        ->pluck('internal','year');
        $internalBulan = TrainingRealization::select(DB::raw("month(dateTanggalMulai) as month,year(dateTanggalMulai) as year"),DB::raw('count(IF(txtTrainingType = "Internal",1,NULL)) as internal'))
        ->GroupBy('month','year')
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('internal','month','year');
        // dd($internalBulan);
        $internalTraining = $internalTahun->merge($internalBulan);
        

        $externalTahun = TrainingRealization::select(DB::raw("year(dateTanggalMulai) as year"),DB::raw('count(IF(txtTrainingType = "External",1,NULL)) as external'))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))     
        ->orderBy('dateTanggalMulai', 'asc')   
        ->pluck('external','year');
        $externalBulan = TrainingRealization::select(DB::raw("month(dateTanggalMulai) as month,year(dateTanggalMulai) as year"),DB::raw('count(IF(txtTrainingType = "External",1,NULL)) as external'))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy('month','year')
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('external','month','year');
        $externalTraining = $externalTahun->merge($externalBulan);

        $inhouseTahun = TrainingRealization::select(DB::raw('year(dateTanggalMulai) as year, count(IF(txtTrainingType = "In House",1,NULL)) as inhouse'))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))
        ->orderBy('dateTanggalMulai', 'asc')        
        ->pluck('inhouse','year');
        $inhouseBulan = TrainingRealization::select(DB::raw('count(IF(txtTrainingType = "In House",1,NULL)) as inhouse, month(dateTanggalMulai) as month,year(dateTanggalMulai) as year'))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy('month','year')
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('inhouse','month','year');
        $inhouseTraining = $inhouseTahun->merge($inhouseBulan);
        
        $year=TrainingRealization::select(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%Y')) as tanggal,year(dateTanggalMulai) as year"))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('tanggal','year');
        $month=TrainingRealization::select(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%M %Y')) as tanggal,month(dateTanggalMulai) as month,year(dateTanggalMulai) as year"))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy('month','year')
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('tanggal','month','year');
        $bulan = $year->merge($month);
        // dd($bulan);
        //Pelaksanaan
        $OnlineTahun = TrainingRealization::select(DB::raw('count(IF(txtPelaksanaan = "Online",1,NULL)) as online, year(dateTanggalMulai) as year'))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))  
        ->orderBy('dateTanggalMulai', 'asc')      
        ->pluck('online');
        $OnlineBulan = TrainingRealization::select(DB::raw('count(IF(txtPelaksanaan = "Online",1,NULL)) as online,month(dateTanggalMulai) as month'))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%M-%Y'))"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('online','month','year');
        $OnlineTraining = $OnlineTahun->merge($OnlineBulan);

        $OfflineTahun = TrainingRealization::select(DB::raw('year(dateTanggalMulai) as year, count(IF(txtPelaksanaan = "Offline",1,NULL)) as offline'))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))  
        ->orderBy('dateTanggalMulai', 'asc')      
        ->pluck('offline');
        $OfflineBulan = TrainingRealization::select(DB::raw('count(IF(txtPelaksanaan = "Offline",1,NULL)) as offline,month(dateTanggalMulai) as month'))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%M-%Y'))"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('offline');
        $OfflineTraining = $OfflineTahun->merge($OfflineBulan);

        $BlendedTahun = TrainingRealization::select(DB::raw('year(dateTanggalMulai) as year, count(IF(txtPelaksanaan = "Blended",1,NULL)) as blended'))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)")) 
        ->orderBy('dateTanggalMulai', 'asc')       
        ->pluck('blended');
        $BlendedBulan = TrainingRealization::select(DB::raw('count(IF(txtPelaksanaan = "Blended",1,NULL)) as blended,month(dateTanggalMulai) as month'))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%M-%Y'))"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('blended');
        $BlendedTraining = $BlendedTahun->merge($BlendedBulan);
        //biaya
        $pendaftaranTahun = TrainingRealization::select(DB::raw("CAST(SUM(intTotalCost) as int) as daftar, year(dateTanggalMulai) as year"))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))        
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('daftar');
        $pendaftaranBulan = TrainingRealization::select(DB::raw("CAST(SUM(intTotalCost) as int) as daftar,month(dateTanggalMulai) as month"))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%M-%Y'))"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('daftar');
        $pendaftaranTraining = $pendaftaranTahun->merge($pendaftaranBulan);

        $snackTahun = TrainingRealization::select(DB::raw("year(dateTanggalMulai) as year, CAST(SUM(costSnack) as int) as snack"))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))        
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('snack');
        $snackBulan = TrainingRealization::select(DB::raw("month(dateTanggalMulai) as month, CAST(SUM(costSnack) as int) as snack"))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%M-%Y'))"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('snack');
        $snackTraining = $snackTahun->merge($snackBulan);
        $tahun=TrainingRealization::select(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%Y')) as tanggal"))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%Y'))"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('tanggal');
        $productivbulan = Productivity::select(DB::raw("CAST(SUM((intOutputActual/intTotal)*1000) as int) as pbulan"))
                    ->GroupBy(DB::raw("(DATE_FORMAT(dateBulan,'%M-%Y'))"))
                    ->whereYear('dateBulan', '=', Carbon::now())
                    ->orderBy('dateBulan', 'ASC')
                    ->pluck('pbulan');
        $productivtahun= Productivity::select(DB::raw("CAST(SUM((intOutputActual/intTotal)*1000) as int) as ptahun"))
                    ->whereYear('dateBulan', '<', Carbon::now())
                    ->GroupBy(DB::raw("year(dateBulan)"))
                    ->orderBy('dateBulan', 'ASC')
                    ->pluck('ptahun');
        $productiv = $productivtahun->merge($productivbulan);
        // dd($productiv);
        $actualbulan = Productivity::select(DB::raw("intOutputActual as actual_bulan"))
                    ->GroupBy(DB::raw("(DATE_FORMAT(dateBulan,'%M-%Y'))"))
                    ->whereYear('dateBulan', '=', Carbon::now())
                    ->orderBy('dateBulan', 'ASC')
                    ->pluck('actual_bulan');
        $actualtahun= Productivity::select(DB::raw("CAST(SUM(intOutputActual) as int) as actual_tahun"))
                    ->whereYear('dateBulan', '<', Carbon::now())
                    ->GroupBy(DB::raw("year(dateBulan)"))
                    ->orderBy('dateBulan', 'ASC')
                    ->pluck('actual_tahun');
        $actual = $actualtahun->merge($actualbulan);
        $costActualBulan = HumanCost::select(DB::raw("intCostActual as costActual_bulan"))
                    ->GroupBy(DB::raw("(DATE_FORMAT(dateBulanCost,'%M-%Y'))"))
                    ->whereYear('dateBulanCost', '=', Carbon::now())
					->orderBy('dateBulanCost', 'ASC')
                    ->pluck('costActual_bulan');
        // dd($costActualBulan);
        $costActualTahun= HumanCost::select(DB::raw("CAST(SUM(intCostActual) as int) as costActual_tahun"))
                    ->GroupBy(DB::raw("year(dateBulanCost)"))
                    ->whereYear('dateBulanCost', '<', Carbon::now())
                    ->orderBy('dateBulanCost', 'ASC')
                    ->pluck('costActual_tahun');
        $costActual = $costActualTahun->merge($costActualBulan);
        $bprobulan=Productivity::select(DB::raw("(DATE_FORMAT(dateBulan,'%M %Y')) as bulan"))
                    ->whereYear('dateBulan', '=', Carbon::now())
                    ->GroupBy(DB::raw("(DATE_FORMAT(dateBulan,'%M %Y'))"))
                    ->orderBy('dateBulan', 'ASC')
                    ->pluck('bulan');
        $bprotahun=Productivity::select(DB::raw("(DATE_FORMAT(dateBulan,'%Y')) as bulan"))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateBulan)"))
        ->orderBy('dateBulan', 'asc')
        ->pluck('bulan');
        $bulanProd = $bprotahun->merge($bprobulan);
        // dd($bulanProd);
        $bulanCostBulan=HumanCost::select(DB::raw("(DATE_FORMAT(dateBulanCost,'%M %Y')) as bulanCost"))
                    ->whereYear('dateBulanCost', '=', Carbon::now())
                    ->GroupBy(DB::raw("(DATE_FORMAT(dateBulanCost,'%M %Y'))"))
                    ->orderBy('dateBulanCost', 'ASC')
                    ->pluck('bulanCost');
        $bulanCostTahun=HumanCost::select(DB::raw("(DATE_FORMAT(dateBulanCost,'%Y')) as bulanCost"))
                    ->GroupBy(DB::raw("year(dateBulanCost)"))
                    ->whereYear('dateBulanCost', '<', Carbon::now())
                    ->orderBy('dateBulanCost', 'ASC')
                    ->pluck('bulanCost');
        $bulanCost = $bulanCostTahun->merge($bulanCostBulan);
        //kcs
        $now = Carbon::now();
        $nowbulan=$now->formatLocalized('%B %Y');
        $lasting = $now->subYear();
        $bulanlastyear = $lasting->formatLocalized('%Y-%m');
        $tahunlastyear = $lasting->formatLocalized('%Y');
        $bulanlast = $lasting->formatLocalized('%B %Y');
        $kcsinventorynow = KcsInventoryModel::select(DB::raw("valueinventory as inventorykcs"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->whereYear('bulan', '=', Carbon::now())
        ->pluck('inventorykcs');
        $kcsinventorybefore = KcsInventoryModel::select(DB::raw("valueinventory as inventorykcs"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'desc')
        ->whereYear('bulan', $tahunlastyear)
        ->take(1)
        ->pluck('inventorykcs');
        $kcsinventory = $kcsinventorybefore->merge($kcsinventorynow);
        
        $targetsavingkcsnow = KcsInventoryModel::join('target_saving_kcs','target_saving_kcs.idtargetsaving','=','inventory_kcs.idsavingcost')
        ->select(DB::raw("targetsaving as savingkcs"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->whereYear('bulan', '=', Carbon::now())
        ->pluck('savingkcs');
        $targetsavingkcsbefore = KcsInventoryModel::join('target_saving_kcs','target_saving_kcs.idtargetsaving','=','inventory_kcs.idsavingcost')
        ->select(DB::raw("targetsaving as savingkcs"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'desc')
        ->whereYear('bulan', $tahunlastyear)
        ->take(1)
        ->pluck('savingkcs');
        $targetsavingkcs = $targetsavingkcsbefore->merge($targetsavingkcsnow);
        // dd($targetsavingkcs);
        $bulaninventorykcsnow=KcsInventoryModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as bulanin"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->whereYear('bulan', '=', Carbon::now())
        ->pluck('bulanin');
        $bulaninventorybefore=KcsInventoryModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as bulanin"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'desc')
        ->whereYear('bulan', $tahunlastyear)
        ->take(1)
        ->pluck('bulanin');
        $bulaninventorykcs = $bulaninventorybefore->merge($bulaninventorykcsnow);
        

        $kcs_inventorynow = KcsInventoryModel::join('target_saving_kcs','target_saving_kcs.idtargetsaving','=','inventory_kcs.idsavingcost')
                ->whereYear('bulan', '=', Carbon::now())
                ->orderBy('bulan', 'asc')
				->get();
        $kcs_inventorybefore = KcsInventoryModel::join('target_saving_kcs','target_saving_kcs.idtargetsaving','=','inventory_kcs.idsavingcost')
                ->whereYear('bulan', $tahunlastyear)
                ->orderBy('bulan', 'desc')
                ->take(1)
				->get();
        $kcs_inventory = $kcs_inventorybefore->merge($kcs_inventorynow);
        // dd($kcs_inventory);

        $resultkcs = [];
        $panahkcs=[];
            foreach ($kcs_inventory as $key => $inventory) {
                $j = $key == 0 ? 0 :$key-1;
                $resultkcs[]=
                    ($inventory->valueinventory-$kcs_inventory[$j]->valueinventory)/$kcs_inventory[$j]->valueinventory;
                    if(($inventory->valueinventory < $kcs_inventory[$j]->valueinventory) && ($inventory->valueinventory < $inventory->targetsaving) ){
                        $icon='fa-arrow-down txt-dark-green';
                    }else if(($inventory->valueinventory < $kcs_inventory[$j]->valueinventory) && ($inventory->valueinventory > $inventory->targetsaving)){
                        $icon='fa-arrow-down text-danger';
                    }else if(($inventory->valueinventory > $kcs_inventory[$j]->valueinventory) && ($inventory->valueinventory < $inventory->targetsaving)){
                        $icon='fa-arrow-up txt-dark-green';
                    }else if (($inventory->valueinventory > $kcs_inventory[$j]->valueinventory) && ($inventory->valueinventory > $inventory->targetsaving)){
                        $icon = 'fa-arrow-up text-danger';
                    }else{
                        $icon='text-danger';
                    }
                $panahkcs[]=$icon;
            }
        // dd($panahkcs);
        $fastmov = KcsFsnModel::select(DB::raw("fastmoving as fast"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->pluck('fast');
        $slowmov = KcsFsnModel::select(DB::raw("slowmoving as slow"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->pluck('slow');
        $nonmov = KcsFsnModel::select(DB::raw("nonmoving as nonmov"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->pluck('nonmov');
        $deadstock = KcsFsnModel::select(DB::raw("deadstock as deadstock"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->pluck('deadstock');
        $bulanFsn=KcsFsnModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as tanggal"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->pluck('tanggal');
        // dd($bulanFsn);
        $monthcode=KcsJmlCodeModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as bulancode"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->pluck('bulancode');
        // dd($monthcode);
        $jmlcode = KcsJmlCodeModel::select(DB::raw("jmlCode as code"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->pluck('code');
        $costreceipt = KcsReceiptUsageModel::select(DB::raw("po_receipt as receipt"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->pluck('receipt');
        $costusage = KcsReceiptUsageModel::select(DB::raw("costusage as usagecost"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->pluck('usagecost');
        $itemusage = KcsReceiptUsageModel::select(DB::raw("itemusage as usageitem"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->pluck('usageitem');
        $itemreceipt = KcsReceiptUsageModel::select(DB::raw("itemreceipt as receiptitem"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->pluck('receiptitem');
        $bulanreceiptusage=KcsReceiptUsageModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as bulanru"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->pluck('bulanru');
        
        $topp = KcsToptenModel::whereMonth('bulan', '=', Carbon::now())->get();

            $dataPoints = [];

            foreach ($topp as $tten) {
                
                $dataPoints[] = [
                    "name" => $tten['description'],
                    "y" => floatval($tten['cost']*$tten['onhand'])
                ];
            }
        
        $topreceipt = KcsToptenReceiptModel::whereMonth('bulan', '=', Carbon::now())->get();
        $topissued = KcsToptenIssuedModel::whereMonth('bulan', '=', Carbon::now())->get();
        $dataTopReceipt = [];
        $dataTopIssued = [];
            foreach ($topreceipt as $treceipt) {
                
                $dataTopReceipt[] = [
                    "name" => $treceipt['description'],
                    "y" => floatval($treceipt['costreceipt'])
                ];
            }
            foreach ($topissued as $tissued) {
                
                $dataTopIssued[] = [
                    "name" => $tissued['description'],
                    "y" => floatval($tissued['costissued'])
                ];
            }
        //kch
        $inventorynow = KchInventoryModel::select(DB::raw("kchvalue_inventory as inventorykch"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->whereYear('bulan', '=', Carbon::now())
        ->orderBy('bulan', 'asc')
        ->pluck('inventorykch');
        $inventorybefore = KchInventoryModel::select(DB::raw("kchvalue_inventory as inventorykch"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->whereYear('bulan', $tahunlastyear)
        ->orderBy('bulan', 'desc')
        ->take(1)
        ->pluck('inventorykch');
        $inventory = $inventorybefore->merge($inventorynow);

        $targetsavingkchnow = KchInventoryModel::join('kch_target_saving','kch_target_saving.idkchtargetsaving','=','kch_inventory.idkchtarget')
        ->select(DB::raw("kchtargetsaving as savingkch"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->whereYear('bulan', '=', Carbon::now())
        ->orderBy('bulan', 'asc')
        ->pluck('savingkch');
        $targetsavingkchbefore = KchInventoryModel::join('kch_target_saving','kch_target_saving.idkchtargetsaving','=','kch_inventory.idkchtarget')
        ->select(DB::raw("kchtargetsaving as savingkch"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->whereYear('bulan', $tahunlastyear)
        ->orderBy('bulan', 'desc')
        ->take(1)
        ->pluck('savingkch');
        $targetsavingkch = $targetsavingkchbefore->merge($targetsavingkchnow);

        $bulaninventorynow=KchInventoryModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as bulanin"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->whereYear('bulan', '=', Carbon::now())
        ->orderBy('bulan', 'asc')
        ->pluck('bulanin');
        $bulaninventorybefore=KchInventoryModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as bulanin"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->whereYear('bulan', $tahunlastyear)
        ->orderBy('bulan', 'desc')
        ->take(1)
        ->pluck('bulanin');
        $bulaninventory = $bulaninventorybefore->merge($bulaninventorynow);

        $kch_inventorynow = KchInventoryModel::join('kch_target_saving','kch_target_saving.idkchtargetsaving','=','kch_inventory.idkchtarget')
                ->whereYear('bulan', '=', Carbon::now())
                ->orderBy('bulan', 'asc')
				->get();
        $kch_inventorybefore = KchInventoryModel::join('kch_target_saving','kch_target_saving.idkchtargetsaving','=','kch_inventory.idkchtarget')
                // ->whereYear('bulan', '=', Carbon::now())
                ->orderBy('bulan', 'asc')
				->get();
        $kch_inventory = $kch_inventorybefore->merge($kch_inventorynow);

        $result = [];
        $panah=[];
            foreach ($kch_inventory as $key => $inv) {
                $j = $key == 0 ? 0 :$key-1;
                $result[]=
                    ($inv->kchvalue_inventory-$kch_inventory[$j]->kchvalue_inventory)/$kch_inventory[$j]->kchvalue_inventory;
                if(($inv->kchvalue_inventory < $kch_inventory[$j]->kchvalue_inventory) && ($inv->kchvalue_inventory < $inv->kchtargetsaving) ){
                    $icon='fa-arrow-down txt-dark-green';
                }else if(($inv->kchvalue_inventory < $kch_inventory[$j]->kchvalue_inventory) && ($inv->kchvalue_inventory > $inv->kchtargetsaving)){
                    $icon='fa-arrow-down text-danger';
                }else if(($inv->kchvalue_inventory > $kch_inventory[$j]->kchvalue_inventory) && ($inv->kchvalue_inventory < $inv->kchtargetsaving)){
                    $icon='fa-arrow-up txt-dark-green';
                }else if (($inv->kchvalue_inventory > $kch_inventory[$j]->kchvalue_inventory) && ($inv->kchvalue_inventory > $inv->kchtargetsaving)){
                    $icon = 'fa-arrow-up text-danger';
                }else{
                    $icon='text-danger';
                }
                $panah[]=$icon;
            }
        // dd($result);
        $fastmovkch = KchFsnModel::select(DB::raw("fastmoving as fast"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->pluck('fast');
        // dd($fastmovkch);
        $slowmovkch = KchFsnModel::select(DB::raw("slowmoving as slow"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->pluck('slow');
        $nonmovkch = KchFsnModel::select(DB::raw("nonmoving as nonmov"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->pluck('nonmov');
        $deadstockkch = KchFsnModel::select(DB::raw("deadstock as deadstock"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->pluck('deadstock');
        $bulanfsnkch=KchFsnModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as tanggal"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->pluck('tanggal');
        $toptenkch = KchToptenModel::whereMonth('bulan', '=', Carbon::now())->get();

        $datatopten = [];

        foreach ($toptenkch as $topten) {
            
            $datatopten[] = [
                "name" => $topten['itemdescription'],
                "y" => floatval($topten['itemcost']*$topten['onhand'])
            ];
        }
        $kchtopreceipt = KchToptenReceiptModel::whereMonth('bulan', '=', Carbon::now())->get();
        $kchtopissued = KchToptenIssuedModel::whereMonth('bulan', '=', Carbon::now())->get();
        $kchdataTopReceipt = [];
        $kchdataTopIssued = [];
            foreach ($kchtopreceipt as $treceipt) {
                
                $kchdataTopReceipt[] = [
                    "name" => $treceipt['description'],
                    "y" => floatval($treceipt['costreceipt'])
                ];
            }
            foreach ($kchtopissued as $tissued) {
                
                $kchdataTopIssued[] = [
                    "name" => $tissued['description'],
                    "y" => floatval($tissued['costissued'])
                ];
            }
        $monthcodekch=KchJmlCodeModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as bulancode"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->pluck('bulancode');
        // dd($monthcode);
        $jmlcodekch = KchJmlCodeModel::select(DB::raw("jmlitemcode as code"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->pluck('code');
        $costreceiptkch = KchReceiptUsageModel::select(DB::raw("po_receipt as receipt"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->pluck('receipt');
        $costusagekch = KchReceiptUsageModel::select(DB::raw("issued as usagecost"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->pluck('usagecost');
        $itemusagekch = KchReceiptUsageModel::select(DB::raw("itemusage as usageitem"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->pluck('usageitem');
        $itemreceiptkch = KchReceiptUsageModel::select(DB::raw("itemreceipt as receiptitem"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->pluck('receiptitem');
        $bulanreceiptusagekch=KchReceiptUsageModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as bulanru"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->pluck('bulanru');

        //department and cost center issued
        

        $kcsdepartment = KcsDepartmentModel::select(DB::raw("bulan, department, cost as costissued"))
                        ->GroupBy(DB::raw("(department)"))
                        ->orderBy('department', 'asc')
                        ->whereMonth('bulan', '=', Carbon::now())
                        ->pluck('costissued');
        $kcsdepartmentlastyear = KcsDepartmentModel::select(DB::raw("bulan, department, cost as costissued"))
                        ->GroupBy(DB::raw("(department)"))
                        ->where('bulan', 'like',$bulanlastyear.'%')
                        ->orderBy('department', 'asc')
                        ->pluck('costissued');
        $kcsdepartmentname = KcsDepartmentModel::select(DB::raw("department as depart, cost"))
                        ->GroupBy(DB::raw("(department)"))
                        ->orderBy('department', 'asc')
                        ->whereMonth('bulan', '=', Carbon::now())
                        ->pluck('depart');

        $kcscostcenter = KcsCostCenterIssuedModel::select(DB::raw("bulan, costcenter, cost as costissued"))
                        ->GroupBy(DB::raw("(costcenter)"))
                        ->orderBy('costcenter', 'asc')
                        ->whereMonth('bulan', '=', Carbon::now())
                        ->pluck('costissued');
        $kcscostcenterlastyear = KcsCostCenterIssuedModel::select(DB::raw("bulan, costcenter, cost as costissued"))
                        ->GroupBy(DB::raw("(costcenter)"))
                        ->orderBy('cost', 'asc')
                        ->where('bulan', 'like',$bulanlastyear.'%')
                        ->pluck('costissued');
        $kcscostcentername = KcsCostCenterIssuedModel::select(DB::raw("costcenter as costcentername, cost"))
                        ->GroupBy(DB::raw("(costcenter)"))
                        ->orderBy('costcenter', 'asc')
                        ->whereMonth('bulan', '=', Carbon::now())
                        ->pluck('costcentername');
        // dd($bulanlastyear);

        $kchdepartment = KchDepartmentModel::select(DB::raw("bulan, department, cost as costissued"))
        ->GroupBy(DB::raw("(department)"))
        ->orderBy('department', 'asc')
        ->whereMonth('bulan', '=', Carbon::now())
        ->pluck('costissued');
        // dd($kchdepartment);
        $kchdepartmentlastyear = KchDepartmentModel::select(DB::raw("bulan, department, cost as costissued"))
        ->GroupBy(DB::raw("(department)"))
        ->where('bulan', 'like',$bulanlastyear.'%')
        ->orderBy('department', 'asc')
        ->pluck('costissued');
        $kchdepartmentname = KchDepartmentModel::select(DB::raw("department as depart, cost"))
        ->GroupBy(DB::raw("(department)"))
        ->orderBy('department', 'asc')
        ->whereMonth('bulan', '=', Carbon::now())
        ->pluck('depart');
        //bulanditahunlalu
        

        $kchcostcenter = KchCostCenterIssuedModel::select(DB::raw("bulan, costcenter, cost as costissued"))
        ->GroupBy(DB::raw("(costcenter)"))
        ->orderBy('costcenter', 'asc')
        ->whereMonth('bulan', '=', Carbon::now())
        ->pluck('costissued');
        $kchcostcenterlastyear = KchCostCenterIssuedModel::select(DB::raw("bulan, costcenter, cost as costissued"))
        ->GroupBy(DB::raw("(costcenter)"))
        ->orderBy('cost', 'asc')
        ->where('bulan', 'like',$bulanlastyear.'%')
        ->pluck('costissued');
        $kchcostcentername = KchCostCenterIssuedModel::select(DB::raw("costcenter as costcentername, cost"))
        ->GroupBy(DB::raw("(costcenter)"))
        ->orderBy('costcenter', 'asc')
        ->whereMonth('bulan', '=', Carbon::now())
        ->pluck('costcentername');
        $department=PayrollDepartmentModel::all();
        $otdepartment=PayrollOvertimeModel::orderBy('otweighthour', 'desc')
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
        $namadept=PayrollDepartmentModel::select(DB::raw("department as depart"))
                ->groupBy('iddepartment')
                ->orderBy('department', 'asc')
                ->pluck('depart');
        $dep = PayrollDepartmentModel::orderBy('department', 'asc')->get();

        $jmldukacita = [];
        $jmlkelahiran = [];
        $jmltelat = [];
        $jmlovertime = [];
    
        foreach ($dep as $depa) {
            $duka = PayrollDukacitaModel::where('id_department', $depa->iddepartment)->whereMonth('bulan', '=', Carbon::now())->count();
            $jmldukacita[] = $duka ?: 0;
            $datakelahiran = PayrollKelahiranModel::where('id_department', $depa->iddepartment)->whereMonth('bulan', '=', Carbon::now())->count();
            $jmlkelahiran[] = $datakelahiran ?: 0;
            $dataterlambat = PayrollTerlambatModel::where('id_department', $depa->iddepartment)->whereMonth('bulan', '=', Carbon::now())->sum('jumlahtelat');
            $total = intval($dataterlambat);
            $jmltelat[] = $total ?: 0;
            $dataovertime = PayrollOvertimeModel::where('id_department', $depa->iddepartment)->whereMonth('bulan', '=', Carbon::now())->sum('otweighthour');
            $totalovertime = intval($dataovertime);
            $jmlovertime[] = $totalovertime ?: 0;
        }
        // dd($jmltelat);
        return view('pages.dashboard',compact('ytdmtd','bulanytdmtd','ytdmtdJobsupply','ytdmtdPermanent','ytdmtdContract',
        'month','internalBulan','externalBulan','inhouseBulan',
        'year','internalTahun','externalTahun','inhouseTahun',
        'bulan','internalTraining','externalTraining','inhouseTraining',
        'OnlineTraining','OfflineTraining','BlendedTraining',
        'pendaftaranTraining','snackTraining','ytdmtdTotalMpp','ytdmtdTotal',
        'bulanProd','actual','costActual','bulanCost','productiv','dataPoints',
        'bulanFsn','fastmov','slowmov','nonmov','deadstock','monthcode','jmlcode','costreceipt','costusage',
        'itemreceipt','itemusage','bulanreceiptusage','dataTopReceipt','dataTopIssued',
        'bulanfsnkch','fastmovkch','slowmovkch','nonmovkch','deadstockkch','datatopten',
        'monthcodekch','jmlcodekch','costreceiptkch','costusagekch',
        'itemreceiptkch','itemusagekch','bulanreceiptusagekch','kcsdepartment','kcsdepartmentname',
        'kcscostcenter','kcscostcentername','kchdepartment','kchdepartmentname','kchcostcenter','kchcostcentername',
        'kchdepartmentlastyear','kchcostcenterlastyear','kcsdepartmentlastyear','kcscostcenterlastyear','nowbulan','bulanlast',
        'inventory','bulaninventory','result','targetsavingkch','panah',
        'kcsinventory', 'targetsavingkcs', 'bulaninventorykcs', 'resultkcs', 'panahkcs','kchdataTopReceipt','kchdataTopIssued',
        'otdepartment','department','beritadepartment','terlambat','detailsterlambat',
        'kelahiran','detailskelahiran','dukacita','detailsdukacita','jmltelat','jmlkelahiran','jmldukacita','namadept','jmlovertime'
        ));
    
    }
    public function filter(Request $request){
        $ytd= RealModel::select(DB::raw("year(dateBulan)as year, max(dateBulan), realTotal as ytd "))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytd'); 
        $mtd= RealModel::select(DB::raw("realTotal as ytd "))
        ->whereYear('dateBulan', '=', Carbon::now())
        ->GroupBy(DB::raw("(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytd');
        $ytdmtd = $ytd->merge($mtd);
        //permanent
        $ytdPermanent= RealModel::select(DB::raw("year(dateBulan)as year, max(realPermanent) as ytdPermanent "))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdPermanent');
        $mtdPermanent= RealModel::select(DB::raw("realPermanent as ytdPermanent "))
        ->whereYear('dateBulan', '=', Carbon::now())
        ->GroupBy(DB::raw("(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdPermanent');
        $ytdmtdPermanent = $ytdPermanent->merge($mtdPermanent);
        //contract
        $ytdContract= RealModel::select(DB::raw("year(dateBulan)as year, max(realContract) as ytdContract "))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdContract');
        $mtdContract= RealModel::select(DB::raw("realContract as ytdContract "))
        ->whereYear('dateBulan', '=', Carbon::now())
        ->GroupBy(DB::raw("(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdContract');
        $ytdmtdContract = $ytdContract->merge($mtdContract);
        //jobsupply
        $ytdJobsupply= RealModel::select(DB::raw("year(dateBulan)as year, max(realJobSupply) as ytdJobsupply "))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdJobsupply');
        // dd($ytdJobsupply);
        $mtdJobsupply= RealModel::select(DB::raw("realJobSupply as ytdJobsupply "))
        ->whereYear('dateBulan', '=', Carbon::now())
        ->GroupBy(DB::raw("(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdJobsupply');
        $ytdmtdJobsupply = $ytdJobsupply->merge($mtdJobsupply);
        $ytdTotal= RealModel::select(DB::raw("year(dateBulan)as year, max(realTotal) as ytdTotal "))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdTotal');
        $mtdTotal= RealModel::select(DB::raw("realTotal as ytdTotal "))
        ->whereYear('dateBulan', '=', Carbon::now())
        ->GroupBy(DB::raw("(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdTotal');
        $ytdmtdTotal = $ytdTotal->merge($mtdTotal);
        // dd($ytdmtdTotal);
        $ytdTotalMpp= RealModel::join('mpp_employee','mpp_employee.idmpp','=','real_employees.mpp_tahun')
        ->select(DB::raw("year(dateBulan)as year, max(mppTotal) as ytdTotal "))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdTotal');
        $mtdTotalMpp= RealModel::join('mpp_employee','mpp_employee.idmpp','=','real_employees.mpp_tahun')
        ->select(DB::raw("mppTotal as ytdTotal"))
        ->whereYear('dateBulan', '=', Carbon::now())
        ->GroupBy(DB::raw("(dateBulan)"))
        ->orderBy('dateBulan', 'ASC')
        ->pluck('ytdTotal');
        $ytdmtdTotalMpp = $ytdTotalMpp->merge($mtdTotalMpp);
        //bulan
        $bulanMtd=RealModel::select(DB::raw("(DATE_FORMAT(dateBulan,'%M-%Y')) as bulan"))
        ->GroupBy(DB::raw("(DATE_FORMAT(dateBulan,'%M-%Y'))"))
        ->whereYear('dateBulan', '=', Carbon::now())
        ->orderBy('dateBulan', 'asc')
        ->pluck('bulan');
        $bulanYtd=RealModel::select(DB::raw("(DATE_FORMAT(dateBulan,'%Y')) as bulan"))
        ->GroupBy(DB::raw("(DATE_FORMAT(dateBulan,'%Y'))"))
        ->whereYear('dateBulan', '<', Carbon::now())
        ->orderBy('dateBulan', 'asc')
        ->pluck('bulan');
        $bulanytdmtd = $bulanYtd->merge($bulanMtd);
        // dd($bulanytdmtd);
        
        $internalTahun = TrainingRealization::select(DB::raw("year(dateTanggalMulai) as year"),DB::raw('count(IF(txtTrainingType = "Internal",1,NULL)) as internal'))
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))  
        ->GroupBy('txtTrainingType')  
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->orderBy('dateTanggalMulai', 'asc')
        // ->get();      
        ->pluck('internal','year');
        $internalBulan = TrainingRealization::select(DB::raw("month(dateTanggalMulai) as month,year(dateTanggalMulai) as year"),DB::raw('count(IF(txtTrainingType = "Internal",1,NULL)) as internal'))
        ->GroupBy('month','year')
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('internal','month','year');
        // dd($internalBulan);
        $internalTraining = $internalTahun->merge($internalBulan);
        

        $externalTahun = TrainingRealization::select(DB::raw("year(dateTanggalMulai) as year"),DB::raw('count(IF(txtTrainingType = "External",1,NULL)) as external'))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))     
        ->orderBy('dateTanggalMulai', 'asc')   
        ->pluck('external','year');
        $externalBulan = TrainingRealization::select(DB::raw("month(dateTanggalMulai) as month,year(dateTanggalMulai) as year"),DB::raw('count(IF(txtTrainingType = "External",1,NULL)) as external'))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy('month','year')
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('external','month','year');
        $externalTraining = $externalTahun->merge($externalBulan);

        $inhouseTahun = TrainingRealization::select(DB::raw('year(dateTanggalMulai) as year, count(IF(txtTrainingType = "In House",1,NULL)) as inhouse'))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))
        ->orderBy('dateTanggalMulai', 'asc')        
        ->pluck('inhouse','year');
        $inhouseBulan = TrainingRealization::select(DB::raw('count(IF(txtTrainingType = "In House",1,NULL)) as inhouse, month(dateTanggalMulai) as month,year(dateTanggalMulai) as year'))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy('month','year')
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('inhouse','month','year');
        $inhouseTraining = $inhouseTahun->merge($inhouseBulan);
        
        $year=TrainingRealization::select(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%Y')) as tanggal,year(dateTanggalMulai) as year"))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('tanggal','year');
        $month=TrainingRealization::select(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%M %Y')) as tanggal,month(dateTanggalMulai) as month,year(dateTanggalMulai) as year"))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy('month','year')
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('tanggal','month','year');
        $bulan = $year->merge($month);
        // dd($bulan);
        //Pelaksanaan
        $OnlineTahun = TrainingRealization::select(DB::raw('count(IF(txtPelaksanaan = "Online",1,NULL)) as online, year(dateTanggalMulai) as year'))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))  
        ->orderBy('dateTanggalMulai', 'asc')      
        ->pluck('online');
        $OnlineBulan = TrainingRealization::select(DB::raw('count(IF(txtPelaksanaan = "Online",1,NULL)) as online,month(dateTanggalMulai) as month'))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%M-%Y'))"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('online','month','year');
        $OnlineTraining = $OnlineTahun->merge($OnlineBulan);

        $OfflineTahun = TrainingRealization::select(DB::raw('year(dateTanggalMulai) as year, count(IF(txtPelaksanaan = "Offline",1,NULL)) as offline'))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))  
        ->orderBy('dateTanggalMulai', 'asc')      
        ->pluck('offline');
        $OfflineBulan = TrainingRealization::select(DB::raw('count(IF(txtPelaksanaan = "Offline",1,NULL)) as offline,month(dateTanggalMulai) as month'))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%M-%Y'))"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('offline');
        $OfflineTraining = $OfflineTahun->merge($OfflineBulan);

        $BlendedTahun = TrainingRealization::select(DB::raw('year(dateTanggalMulai) as year, count(IF(txtPelaksanaan = "Blended",1,NULL)) as blended'))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)")) 
        ->orderBy('dateTanggalMulai', 'asc')       
        ->pluck('blended');
        $BlendedBulan = TrainingRealization::select(DB::raw('count(IF(txtPelaksanaan = "Blended",1,NULL)) as blended,month(dateTanggalMulai) as month'))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%M-%Y'))"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('blended');
        $BlendedTraining = $BlendedTahun->merge($BlendedBulan);
        //biaya
        $pendaftaranTahun = TrainingRealization::select(DB::raw("CAST(SUM(intTotalCost) as int) as daftar, year(dateTanggalMulai) as year"))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))        
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('daftar');
        $pendaftaranBulan = TrainingRealization::select(DB::raw("CAST(SUM(intTotalCost) as int) as daftar,month(dateTanggalMulai) as month"))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%M-%Y'))"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('daftar');
        $pendaftaranTraining = $pendaftaranTahun->merge($pendaftaranBulan);

        $snackTahun = TrainingRealization::select(DB::raw("year(dateTanggalMulai) as year, CAST(SUM(costSnack) as int) as snack"))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("year(dateTanggalMulai)"))        
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('snack');
        $snackBulan = TrainingRealization::select(DB::raw("month(dateTanggalMulai) as month, CAST(SUM(costSnack) as int) as snack"))
        ->whereYear('dateTanggalMulai', '=', Carbon::now())
        ->GroupBy(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%M-%Y'))"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('snack');
        $snackTraining = $snackTahun->merge($snackBulan);
        $tahun=TrainingRealization::select(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%Y')) as tanggal"))
        ->whereYear('dateTanggalMulai', '<', Carbon::now())
        ->GroupBy(DB::raw("(DATE_FORMAT(dateTanggalMulai,'%Y'))"))
        ->orderBy('dateTanggalMulai', 'asc')
        ->pluck('tanggal');
        $productivbulan = Productivity::select(DB::raw("CAST(SUM((intOutputActual/intTotal)*1000) as int) as pbulan"))
                    ->GroupBy(DB::raw("(DATE_FORMAT(dateBulan,'%M-%Y'))"))
                    ->orderBy('dateBulan', 'ASC')
                    ->pluck('pbulan');
        $productivtahun= Productivity::select(DB::raw("CAST(SUM((intOutputActual/intTotal)*1000) as int) as ptahun"))
                    ->whereYear('dateBulan', '<', Carbon::now())
                    ->GroupBy(DB::raw("year(dateBulan)"))
                    ->orderBy('dateBulan', 'ASC')
                    ->pluck('ptahun');
        $productiv = $productivtahun->merge($productivbulan);
        // dd($productiv);
        $actual = Productivity::select(DB::raw("intOutputActual as actual"))
                    ->GroupBy(DB::raw("Month(dateBulan)"))
                    ->orderBy('dateBulan', 'ASC')
                    ->pluck('actual');
        $costActual = HumanCost::select(DB::raw("intCostActual as costActual"))
                    ->GroupBy(DB::raw("Month(dateBulanCost)"))
					->orderBy('dateBulanCost', 'ASC')
                    ->pluck('costActual');
        $bulanProd=Productivity::select(DB::raw("(DATE_FORMAT(dateBulan,'%M %Y')) as bulan"))
                    ->GroupBy(DB::raw("(DATE_FORMAT(dateBulan,'%M %Y'))"))
                    ->orderBy('dateBulan', 'ASC')
                    ->pluck('bulan');
        $bulanCost=HumanCost::select(DB::raw("(DATE_FORMAT(dateBulanCost,'%M %Y')) as bulanCost"))
                    ->GroupBy(DB::raw("(DATE_FORMAT(dateBulanCost,'%M %Y'))"))
                    ->orderBy('dateBulanCost', 'ASC')
                    ->pluck('bulanCost');
        
        //kcs
        $monthrequest = $request->input('bulan');
        $ubah = Carbon::parse($monthrequest);
        $tahunini=$ubah->formatLocalized('%Y');
        $nowbulan=$ubah->formatLocalized('%B %Y');
        $lastYear = Carbon::createFromDate($monthrequest,null, 1)->subYear();
        $monthlastyear = $lastYear->formatLocalized('%Y-%m');
        $tahunlalu = $lastYear->formatLocalized('%Y');
        $bulanlast = $lastYear->formatLocalized('%B %Y');
        
        // $now = Carbon::now();
        // $nowbulan=$now->formatLocalized('%B %Y');
        // $lasting = $now->subYear();
        // $bulanlastyear = $lasting->formatLocalized('%Y-%m');
        // $tahunlastyear = $lasting->formatLocalized('%Y');
        // $bulanlast = $lasting->formatLocalized('%B %Y');
        $kcsinventorynow = KcsInventoryModel::select(DB::raw("valueinventory as inventorykcs"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->whereYear('bulan', $tahunini)
        ->pluck('inventorykcs');
        $kcsinventorybefore = KcsInventoryModel::select(DB::raw("valueinventory as inventorykcs"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'desc')
        ->whereYear('bulan', $tahunlalu)
        ->take(1)
        ->pluck('inventorykcs');
        $kcsinventory = $kcsinventorybefore->merge($kcsinventorynow);
        
        $targetsavingkcsnow = KcsInventoryModel::join('target_saving_kcs','target_saving_kcs.idtargetsaving','=','inventory_kcs.idsavingcost')
        ->select(DB::raw("targetsaving as savingkcs"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->whereYear('bulan', $tahunini)
        ->pluck('savingkcs');
        $targetsavingkcsbefore = KcsInventoryModel::join('target_saving_kcs','target_saving_kcs.idtargetsaving','=','inventory_kcs.idsavingcost')
        ->select(DB::raw("targetsaving as savingkcs"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'desc')
        ->whereYear('bulan', $tahunlalu)
        ->take(1)
        ->pluck('savingkcs');
        $targetsavingkcs = $targetsavingkcsbefore->merge($targetsavingkcsnow);
        // dd($targetsavingkcs);
        $bulaninventorykcsnow=KcsInventoryModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as bulanin"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->whereYear('bulan', $tahunini)
        ->pluck('bulanin');
        $bulaninventorybefore=KcsInventoryModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as bulanin"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'desc')
        ->whereYear('bulan', $tahunlalu)
        ->take(1)
        ->pluck('bulanin');
        $bulaninventorykcs = $bulaninventorybefore->merge($bulaninventorykcsnow);
        

        $kcs_inventorynow = KcsInventoryModel::join('target_saving_kcs','target_saving_kcs.idtargetsaving','=','inventory_kcs.idsavingcost')
                ->whereYear('bulan', $tahunini)
                ->orderBy('bulan', 'asc')
				->get();
        $kcs_inventorybefore = KcsInventoryModel::join('target_saving_kcs','target_saving_kcs.idtargetsaving','=','inventory_kcs.idsavingcost')
                ->whereYear('bulan', $tahunlalu)
                ->orderBy('bulan', 'desc')
                ->take(1)
				->get();
        $kcs_inventory = $kcs_inventorybefore->merge($kcs_inventorynow);
        // dd($kcs_inventory);

        $resultkcs = [];
        $panahkcs=[];
            foreach ($kcs_inventory as $key => $inventory) {
                $j = $key == 0 ? 0 :$key-1;
                $resultkcs[]=($inventory->valueinventory-$kcs_inventory[$j]->valueinventory)/$kcs_inventory[$j]->valueinventory;
                    
                    if(($inventory->valueinventory < $kcs_inventory[$j]->valueinventory) && ($inventory->valueinventory < $inventory->targetsaving) ){
                        $icon='fa-arrow-down txt-dark-green';
                    }else if(($inventory->valueinventory < $kcs_inventory[$j]->valueinventory) && ($inventory->valueinventory > $inventory->targetsaving)){
                        $icon='fa-arrow-down text-danger';
                    }else if(($inventory->valueinventory > $kcs_inventory[$j]->valueinventory) && ($inventory->valueinventory < $inventory->targetsaving)){
                        $icon='fa-arrow-up txt-dark-green';
                    }else if (($inventory->valueinventory > $kcs_inventory[$j]->valueinventory) && ($inventory->valueinventory > $inventory->targetsaving)){
                        $icon = 'fa-arrow-up text-danger';
                    }else{
                        $icon='text-danger';
                    }
                $panahkcs[]=$icon;
            }
        // dd($panahkcs);
        $fastmov = KcsFsnModel::select(DB::raw("fastmoving as fast"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->whereYear('bulan', $tahunini)
                ->pluck('fast');
        $slowmov = KcsFsnModel::select(DB::raw("slowmoving as slow"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->whereYear('bulan', $tahunini)
                ->pluck('slow');
        $nonmov = KcsFsnModel::select(DB::raw("nonmoving as nonmov"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->whereYear('bulan', $tahunini)
                ->pluck('nonmov');
        $deadstock = KcsFsnModel::select(DB::raw("deadstock as deadstock"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->whereYear('bulan', $tahunini)
                ->pluck('deadstock');
        $bulanFsn=KcsFsnModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as tanggal"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->whereYear('bulan', $tahunini)
                ->pluck('tanggal');
        // dd($bulanFsn);
        $monthcode=KcsJmlCodeModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as bulancode"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->whereYear('bulan', $tahunini)
                ->pluck('bulancode');
        // dd($monthcode);
        $jmlcode = KcsJmlCodeModel::select(DB::raw("jmlCode as code"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->whereYear('bulan', $tahunini)
                ->pluck('code');
        $costreceipt = KcsReceiptUsageModel::select(DB::raw("po_receipt as receipt"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->whereYear('bulan', $tahunini)
                ->pluck('receipt');
        $costusage = KcsReceiptUsageModel::select(DB::raw("costusage as usagecost"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->whereYear('bulan', $tahunini)
                ->pluck('usagecost');
        $itemusage = KcsReceiptUsageModel::select(DB::raw("itemusage as usageitem"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->whereYear('bulan', $tahunini)
                ->pluck('usageitem');
        $itemreceipt = KcsReceiptUsageModel::select(DB::raw("itemreceipt as receiptitem"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->whereYear('bulan', $tahunini)
                ->pluck('receiptitem');
        $bulanreceiptusage=KcsReceiptUsageModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as bulanru"))
                ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
                ->orderBy('bulan', 'asc')
                ->whereYear('bulan', $tahunini)
                ->pluck('bulanru');
        
        $topp = KcsToptenModel::where('bulan', 'like', $monthrequest.'%')->get();

            $dataPoints = [];

            foreach ($topp as $tten) {
                
                $dataPoints[] = [
                    "name" => $tten['description'],
                    "y" => floatval($tten['cost']*$tten['onhand'])
                ];
            }
        
        $topreceipt = KcsToptenReceiptModel::where('bulan', 'like', $monthrequest.'%')->get();
        $topissued = KcsToptenIssuedModel::where('bulan', 'like', $monthrequest.'%')->get();
        $dataTopReceipt = [];
        $dataTopIssued = [];
            foreach ($topreceipt as $treceipt) {
                
                $dataTopReceipt[] = [
                    "name" => $treceipt['description'],
                    "y" => floatval($treceipt['costreceipt'])
                ];
            }
            foreach ($topissued as $tissued) {
                
                $dataTopIssued[] = [
                    "name" => $tissued['description'],
                    "y" => floatval($tissued['costissued'])
                ];
            }
        //kch
        $inventorynow = KchInventoryModel::select(DB::raw("kchvalue_inventory as inventorykch"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->whereYear('bulan', $tahunini)
        ->orderBy('bulan', 'asc')
        ->pluck('inventorykch');
        $inventorybefore = KchInventoryModel::select(DB::raw("kchvalue_inventory as inventorykch"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->whereYear('bulan', $tahunlalu)
        ->orderBy('bulan', 'desc')
        ->take(1)
        ->pluck('inventorykch');
        $inventory = $inventorybefore->merge($inventorynow);

        $targetsavingkchnow = KchInventoryModel::join('kch_target_saving','kch_target_saving.idkchtargetsaving','=','kch_inventory.idkchtarget')
        ->select(DB::raw("kchtargetsaving as savingkch"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->whereYear('bulan', $tahunini)
        ->orderBy('bulan', 'asc')
        ->pluck('savingkch');
        $targetsavingkchbefore = KchInventoryModel::join('kch_target_saving','kch_target_saving.idkchtargetsaving','=','kch_inventory.idkchtarget')
        ->select(DB::raw("kchtargetsaving as savingkch"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->whereYear('bulan', $tahunlalu)
        ->orderBy('bulan', 'desc')
        ->take(1)
        ->pluck('savingkch');
        $targetsavingkch = $targetsavingkchbefore->merge($targetsavingkchnow);

        $bulaninventorynow=KchInventoryModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as bulanin"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->whereYear('bulan', $tahunini)
        ->orderBy('bulan', 'asc')
        ->pluck('bulanin');
        $bulaninventorybefore=KchInventoryModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as bulanin"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->whereYear('bulan', $tahunlalu)
        ->orderBy('bulan', 'desc')
        ->take(1)
        ->pluck('bulanin');
        $bulaninventory = $bulaninventorybefore->merge($bulaninventorynow);

        $kch_inventorynow = KchInventoryModel::join('kch_target_saving','kch_target_saving.idkchtargetsaving','=','kch_inventory.idkchtarget')
                ->whereYear('bulan', $tahunini)
                ->orderBy('bulan', 'asc')
				->get();
        $kch_inventorybefore = KchInventoryModel::join('kch_target_saving','kch_target_saving.idkchtargetsaving','=','kch_inventory.idkchtarget')
                ->whereYear('bulan', $tahunlalu)
                ->orderBy('bulan', 'desc')
                ->take(1)
				->get();
        $kch_inventory = $kch_inventorybefore->merge($kch_inventorynow);

        $result = [];
        $panah=[];
            foreach ($kch_inventory as $key => $inv) {
                $j = $key == 0 ? 0 :$key-1;
                $result[]=
                    ($inv->kchvalue_inventory-$kch_inventory[$j]->kchvalue_inventory)/$kch_inventory[$j]->kchvalue_inventory;
                if(($inv->kchvalue_inventory < $kch_inventory[$j]->kchvalue_inventory) && ($inv->kchvalue_inventory < $inv->kchtargetsaving) ){
                    $icon='fa-arrow-down txt-dark-green';
                }else if(($inv->kchvalue_inventory < $kch_inventory[$j]->kchvalue_inventory) && ($inv->kchvalue_inventory > $inv->kchtargetsaving)){
                    $icon='fa-arrow-down text-danger';
                }else if(($inv->kchvalue_inventory > $kch_inventory[$j]->kchvalue_inventory) && ($inv->kchvalue_inventory < $inv->kchtargetsaving)){
                    $icon='fa-arrow-up txt-dark-green';
                }else if (($inv->kchvalue_inventory > $kch_inventory[$j]->kchvalue_inventory) && ($inv->kchvalue_inventory > $inv->kchtargetsaving)){
                    $icon = 'fa-arrow-up text-danger';
                }else{
                    $icon='text-danger';
                }
                $panah[]=$icon;
            }
        // dd($result);
        $fastmovkch = KchFsnModel::select(DB::raw("fastmoving as fast"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->whereYear('bulan', $tahunini)
        ->pluck('fast');
        // dd($fastmovkch);
        $slowmovkch = KchFsnModel::select(DB::raw("slowmoving as slow"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->whereYear('bulan', $tahunini)
        ->pluck('slow');
        $nonmovkch = KchFsnModel::select(DB::raw("nonmoving as nonmov"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->whereYear('bulan', $tahunini)
        ->pluck('nonmov');
        $deadstockkch = KchFsnModel::select(DB::raw("deadstock as deadstock"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->whereYear('bulan', $tahunini)
        ->pluck('deadstock');
        $bulanfsnkch=KchFsnModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as tanggal"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->whereYear('bulan', $tahunini)
        ->pluck('tanggal');
        $toptenkch = KchToptenModel::where('bulan', 'like', $monthrequest.'%')->get();

        $datatopten = [];

        foreach ($toptenkch as $topten) {
            
            $datatopten[] = [
                "name" => $topten['itemdescription'],
                "y" => floatval($topten['itemcost']*$topten['onhand'])
            ];
        }
        $kchtopreceipt = KchToptenReceiptModel::where('bulan', 'like', $monthrequest.'%')->get();
        $kchtopissued = KchToptenIssuedModel::where('bulan', 'like', $monthrequest.'%')->get();
        $kchdataTopReceipt = [];
        $kchdataTopIssued = [];
            foreach ($kchtopreceipt as $treceipt) {
                
                $kchdataTopReceipt[] = [
                    "name" => $treceipt['description'],
                    "y" => floatval($treceipt['costreceipt'])
                ];
            }
            foreach ($kchtopissued as $tissued) {
                
                $kchdataTopIssued[] = [
                    "name" => $tissued['description'],
                    "y" => floatval($tissued['costissued'])
                ];
            }
        $monthcodekch=KchJmlCodeModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as bulancode"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->whereYear('bulan', $tahunini)
        ->pluck('bulancode');
        // dd($monthcode);
        $jmlcodekch = KchJmlCodeModel::select(DB::raw("jmlitemcode as code"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->whereYear('bulan', $tahunini)
        ->pluck('code');
        $costreceiptkch = KchReceiptUsageModel::select(DB::raw("po_receipt as receipt"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->whereYear('bulan', $tahunini)
        ->pluck('receipt');
        $costusagekch = KchReceiptUsageModel::select(DB::raw("issued as usagecost"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->whereYear('bulan', $tahunini)
        ->pluck('usagecost');
        $itemusagekch = KchReceiptUsageModel::select(DB::raw("itemusage as usageitem"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->whereYear('bulan', $tahunini)
        ->pluck('usageitem');
        $itemreceiptkch = KchReceiptUsageModel::select(DB::raw("itemreceipt as receiptitem"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->whereYear('bulan', $tahunini)
        ->pluck('receiptitem');
        $bulanreceiptusagekch=KchReceiptUsageModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as bulanru"))
        ->GroupBy(DB::raw("(DATE_FORMAT(bulan,'%M-%Y'))"))
        ->orderBy('bulan', 'asc')
        ->whereYear('bulan', $tahunini)
        ->pluck('bulanru');

        //department and cost center issued
        

        $kcsdepartment = KcsDepartmentModel::select(DB::raw("bulan, department, cost as costissued"))
                        ->GroupBy(DB::raw("(department)"))
                        ->orderBy('department', 'asc')
                        ->where('bulan', 'like', $monthrequest.'%')
                        ->pluck('costissued');
        $kcsdepartmentlastyear = KcsDepartmentModel::select(DB::raw("bulan, department, cost as costissued"))
                        ->GroupBy(DB::raw("(department)"))
                        ->where('bulan', 'like',$monthlastyear.'%')
                        ->orderBy('department', 'asc')
                        ->pluck('costissued');
        $kcsdepartmentname = KcsDepartmentModel::select(DB::raw("department as depart, cost"))
                        ->GroupBy(DB::raw("(department)"))
                        ->orderBy('department', 'asc')
                        ->where('bulan', 'like', $monthrequest.'%')
                        ->pluck('depart');

        $kcscostcenter = KcsCostCenterIssuedModel::select(DB::raw("bulan, costcenter, cost as costissued"))
                        ->GroupBy(DB::raw("(costcenter)"))
                        ->orderBy('costcenter', 'asc')
                        ->where('bulan', 'like', $monthrequest.'%')
                        ->pluck('costissued');
        $kcscostcenterlastyear = KcsCostCenterIssuedModel::select(DB::raw("bulan, costcenter, cost as costissued"))
                        ->GroupBy(DB::raw("(costcenter)"))
                        ->orderBy('cost', 'asc')
                        ->where('bulan', 'like',$monthlastyear.'%')
                        ->pluck('costissued');
        $kcscostcentername = KcsCostCenterIssuedModel::select(DB::raw("costcenter as costcentername, cost"))
                        ->GroupBy(DB::raw("(costcenter)"))
                        ->orderBy('costcenter', 'asc')
                        ->where('bulan', 'like', $monthrequest.'%')
                        ->pluck('costcentername');
        // dd($bulanlastyear);

        $kchdepartment = KchDepartmentModel::select(DB::raw("bulan, department, cost as costissued"))
        ->GroupBy(DB::raw("(department)"))
        ->orderBy('department', 'asc')
        ->where('bulan', 'like', $monthrequest.'%')
        ->pluck('costissued');
        $kchdepartmentlastyear = KchDepartmentModel::select(DB::raw("bulan, department, cost as costissued"))
        ->GroupBy(DB::raw("(department)"))
        ->where('bulan', 'like',$monthlastyear.'%')
        ->orderBy('department', 'asc')
        ->pluck('costissued');
        $kchdepartmentname = KchDepartmentModel::select(DB::raw("department as depart, cost"))
        ->GroupBy(DB::raw("(department)"))
        ->orderBy('department', 'asc')
        ->where('bulan', 'like', $monthrequest.'%')
        ->pluck('depart');
        //bulanditahunlalu
        

        $kchcostcenter = KchCostCenterIssuedModel::select(DB::raw("bulan, costcenter, cost as costissued"))
        ->GroupBy(DB::raw("(costcenter)"))
        ->orderBy('costcenter', 'asc')
        ->where('bulan', 'like', $monthrequest.'%')
        ->pluck('costissued');
        $kchcostcenterlastyear = KchCostCenterIssuedModel::select(DB::raw("bulan, costcenter, cost as costissued"))
        ->GroupBy(DB::raw("(costcenter)"))
        ->orderBy('cost', 'asc')
        ->where('bulan', 'like',$monthlastyear.'%')
        ->pluck('costissued');
        $kchcostcentername = KchCostCenterIssuedModel::select(DB::raw("costcenter as costcentername, cost"))
        ->GroupBy(DB::raw("(costcenter)"))
        ->orderBy('costcenter', 'asc')
        ->where('bulan', 'like', $monthrequest.'%')
        ->pluck('costcentername');
        $department=PayrollDepartmentModel::all();
        $otdepartment=PayrollOvertimeModel::orderBy('otweighthour', 'desc')
                ->where('bulan', 'like', $monthrequest.'%')
                ->get();
        $beritadepartment=PayrollBeritaModel::join('department','department.iddepartment','=','payroll_berita.id_department')
                ->orderBy('department', 'desc')
                ->where('bulan', 'like', $monthrequest.'%')
                ->get();
        $detailsterlambat=PayrollTerlambatModel::join('department','department.iddepartment','=','payroll_terlambat.id_department')
                ->orderBy('department', 'desc')
                ->where('bulan', 'like', $monthrequest.'%')
                ->get();
        $terlambat=PayrollDepartmentModel::join('payroll_terlambat','payroll_terlambat.id_department','=','department.iddepartment')
                ->select(DB::raw("department.*, bulan, sum(jumlahtelat) as telat"))
                ->groupBy('iddepartment')
                ->where('bulan', 'like', $monthrequest.'%')
                ->get();
        $detailskelahiran=PayrollKelahiranModel::join('department','department.iddepartment','=','payroll_kelahiran.id_department')
                ->orderBy('department', 'desc')
                ->where('bulan', 'like', $monthrequest.'%')
                ->get();
        $kelahiran=PayrollDepartmentModel::join('payroll_kelahiran','payroll_kelahiran.id_department','=','department.iddepartment')
                ->select(DB::raw("department.*, bulan, nama, count(nama) as jmlkelahiran"))
                ->groupBy('iddepartment')
                ->where('bulan', 'like', $monthrequest.'%')
                ->get();
        $detailsdukacita=PayrollDukacitaModel::join('department','department.iddepartment','=','payroll_dukacita.id_department')
                ->orderBy('department', 'desc')
                ->where('bulan', 'like', $monthrequest.'%')
                ->get();
        $dukacita=PayrollDepartmentModel::join('payroll_dukacita','payroll_dukacita.id_department','=','department.iddepartment')
                ->select(DB::raw("department.*, bulan,nama, count(nama) as jmldukacita"))
                ->groupBy('iddepartment')
                ->where('bulan', 'like', $monthrequest.'%')
                ->get();
        $namadept=PayrollDepartmentModel::select(DB::raw("department as depart"))
                ->groupBy('iddepartment')
                ->orderBy('department', 'asc')
                ->pluck('depart');
        $dep = PayrollDepartmentModel::orderBy('department', 'asc')->get();

        $jmldukacita = [];
        $jmlkelahiran = [];
        $jmltelat = [];
        $jmlovertime = [];
    
        foreach ($dep as $depa) {
            $duka = PayrollDukacitaModel::where('id_department', $depa->iddepartment)->where('bulan', 'like', $monthrequest.'%')->count();
            $jmldukacita[] = $duka ?: 0;
            $datakelahiran = PayrollKelahiranModel::where('id_department', $depa->iddepartment)->where('bulan', 'like', $monthrequest.'%')->count();
            $jmlkelahiran[] = $datakelahiran ?: 0;
            $dataterlambat = PayrollTerlambatModel::where('id_department', $depa->iddepartment)->where('bulan', 'like', $monthrequest.'%')->sum('jumlahtelat');
            $total = intval($dataterlambat);
            $jmltelat[] = $total ?: 0;
            $dataovertime = PayrollOvertimeModel::where('id_department', $depa->iddepartment)->where('bulan', 'like', $monthrequest.'%')->sum('otweighthour');
            $totalovertime = intval($dataovertime);
            $jmlovertime[] = $totalovertime ?: 0;
        }
        // dd($kcsdepartmentname);
        return view('pages.dashboard',compact('ytdmtd','bulanytdmtd','ytdmtdJobsupply','ytdmtdPermanent','ytdmtdContract',
        'month','internalBulan','externalBulan','inhouseBulan',
        'year','internalTahun','externalTahun','inhouseTahun',
        'bulan','internalTraining','externalTraining','inhouseTraining',
        'OnlineTraining','OfflineTraining','BlendedTraining',
        'pendaftaranTraining','snackTraining','ytdmtdTotalMpp','ytdmtdTotal',
        'bulanProd','actual','costActual','bulanCost','productiv','dataPoints',
        'bulanFsn','fastmov','slowmov','nonmov','deadstock','monthcode','jmlcode','costreceipt','costusage',
        'itemreceipt','itemusage','bulanreceiptusage','dataTopReceipt','dataTopIssued',
        'bulanfsnkch','fastmovkch','slowmovkch','nonmovkch','deadstockkch','datatopten',
        'monthcodekch','jmlcodekch','costreceiptkch','costusagekch',
        'itemreceiptkch','itemusagekch','bulanreceiptusagekch','kcsdepartment','kcsdepartmentname',
        'kcscostcenter','kcscostcentername','kchdepartment','kchdepartmentname','kchcostcenter','kchcostcentername',
        'kchdepartmentlastyear','kchcostcenterlastyear','kcsdepartmentlastyear','kcscostcenterlastyear','nowbulan','bulanlast',
        'inventory','bulaninventory','result','targetsavingkch','panah',
        'kcsinventory', 'targetsavingkcs', 'bulaninventorykcs', 'resultkcs', 'panahkcs','kchdataTopReceipt','kchdataTopIssued',
        'department','otdepartment','beritadepartment','terlambat','detailsterlambat',
        'kelahiran','detailskelahiran','dukacita','detailsdukacita','jmltelat','jmlkelahiran','jmldukacita','namadept','jmlovertime'
        ));
    
    }

    
}
