<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RecruitmentModel;

class RecruitmentController extends Controller
{
    public function index(){
        $progress = RecruitmentModel::orderBy('updated_at','desc')->get();
        return view('pages.recruitment.index',compact('progress'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'recruitmentStatus' => 'required',
            'jobtitle' => 'required',
            ]);
            $validated = [
                'nama' => $request->nama,
                'recruitmentStatus' => $request->recruitmentStatus,
                'jobtitle' => $request->jobtitle,
                'fptkStatus' => $request->fptkStatus,
                'progressrecruitment' => $request->progressrecruitment,
                'interviewHrStatus' => $request->interviewHrStatus,
                'interviewUser1Status' => $request->interviewUser1Status,
                'interviewUser2Status' => $request->interviewUser2Status,
                'interviewUser3Status' => $request->interviewUser3Status,
                'user1' => $request->user1,
                'user2' => $request->user2,
                'user3' => $request->user3,
                'psikotesStatus' => $request->psikotesStatus,
                'mcuStatus' => $request->mcuStatus,
                'ttdStatus' => $request->ttdStatus,
                'joinStatus' => $request->joinStatus,
                'note' => $request->note,
                'tanggalFptk' => $request->tanggalFptk,
                'tanggalInterviewHr' => $request->tanggalInterviewHr,
                'tanggalInterviewUser1' => $request->tanggalInterviewUser1,
                'tanggalInterviewUser2' => $request->tanggalInterviewUser2,
                'tanggalInterviewUser3' => $request->tanggalInterviewUser3,
                'tanggalPsikotes' => $request->tanggalPsikotes,
                'tanggalMcu' => $request->tanggalMcu,
                'tanggalTtd' => $request->tanggalTtd,
                'tanggalJoin' => $request->tanggalJoin,
                
            ];
            $tambah=RecruitmentModel::create($validated);
            if ($tambah){
                return redirect()->route('recruitment')->with('message','Data added successfully.'); 
            }else{
                return redirect()->route('recruitment')->with('message','Data tidak berhasil ditambahkan.'); 
            }
    }   

    public function update(Request $request, $idRecruitment)
    {
        $p = RecruitmentModel::find($idRecruitment);
        $p->nama = $request->nama;
        $p->recruitmentStatus = $request->recruitmentStatus;
        $p->progressrecruitment = $request->progressrecruitment;
        $p->jobtitle = $request->jobtitle;
        $p->fptkStatus = $request->fptkStatus;
        $p->interviewHrStatus = $request->interviewHrStatus;
        $p->interviewUser1Status = $request->interviewUser1Status;
        $p->interviewUser2Status = $request->interviewUser2Status;
        $p->interviewUser3Status = $request->interviewUser3Status;
        $p->user1 = $request->user1;
        $p->user2 = $request->user2;
        $p->user3 = $request->user3;
        $p->psikotesStatus = $request->psikotesStatus;
        $p->mcuStatus = $request->mcuStatus;
        $p->ttdStatus = $request->ttdStatus;
        $p->joinStatus = $request->joinStatus;
        $p->note = $request->note;
        $p->tanggalFptk = $request->tanggalFptk;
        $p->tanggalInterviewHr = $request->tanggalInterviewHr;
        $p->tanggalInterviewUser1 = $request->tanggalInterviewUser1;
        $p->tanggalInterviewUser2 = $request->tanggalInterviewUser2;
        $p->tanggalInterviewUser3 = $request->tanggalInterviewUser3;
        $p->tanggalPsikotes = $request->tanggalPsikotes;
        $p->tanggalMcu = $request->tanggalMcu;
        $p->tanggalTtd = $request->tanggalTtd;
        $p->tanggalJoin = $request->tanggalJoin;
        $p->save();
        return redirect()->route('recruitment')->with('message','Data updated successfully.');
    }

    public function destroy($idRecruitment)
    {
        RecruitmentModel::find($idRecruitment)->delete();
        // $data->delete();
        return redirect()->route('recruitment')->with('message','Data deleted successfully');
    }
}