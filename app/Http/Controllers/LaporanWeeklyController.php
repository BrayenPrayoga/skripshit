<?php

namespace App\Http\Controllers;

use App\Models\MasterCategory;
use App\Models\MasterStatusTiket;
use App\Models\MasterTypeKabel;
use App\Models\PersonInCharge;
use App\Models\Tiket;
use Illuminate\Http\Request;

class LaporanWeeklyController extends Controller
{
    //
    public function index()
    {
        $data['no'] = 1;
        $data['master_category'] = MasterCategory::orderBy('id','ASC')->get();
        $data['master_type_kabel'] = MasterTypeKabel::orderBy('id','ASC')->get();
        $data['master_status'] = MasterStatusTiket::where('role',1)->orderBy('id','ASC')->get();
        $data['master_status_pic'] = MasterStatusTiket::where('role',2)->orderBy('id','ASC')->get();
        $data['person_in_charge'] = PersonInCharge::orderBy('id','ASC')->get();

        return view('laporan-weekly', $data);
    }

    public function simpan(Request $request)
    {
        try{
            date_default_timezone_set('Asia/Bangkok');
            
            $this->validate($request,[
                'no'                =>'required',
                'date'              =>'required',
                'week'              =>'required',
                'area'              =>'required',
                'area_pic'          =>'required',
                'TT_NUMBER'         =>'required',
                'customer'          =>'required',
                'SEGMENT_ID'        =>'required',
                'CID'               =>'required',
                'TR_CID'            =>'required',
                'span'              =>'required',
                'id_fo_cut'         =>'required',
                'NE_IMPACT'         =>'required',
                'IMPACT_TT'         =>'required',
                'ring'              =>'required',
                'start_time'        =>'required',
                'stop_clock'        =>'required',
                'end_time'          =>'required',
                'start_date'        =>'required',
                'end_date'          =>'required',
                'root_cause'        =>'required',
                'status'            =>'required',
                'aging_time'        =>'required',
                'remark'            =>'required',
                'note'              =>'required',
                'status_pic'        =>'required',
                'ceklis'            =>'required',
                'id_type_kabel'     =>'required',
                'tikor'             =>'required',
                'time_travel'       =>'required',
                'time_tracking'     =>'required',
                'join_cut_point'    =>'required',
                'SLA_TROUBLESHOOT'  =>'required',
            ]);

            $data = [
                'no'                =>$request->no,
                'date'              =>$request->date,
                'week'              =>$request->week,
                'area'              =>$request->area,
                'area_pic'          =>$request->area_pic,
                'TT_NUMBER'         =>$request->TT_NUMBER,
                'customer'          =>$request->customer,
                'SEGMENT_ID'        =>$request->SEGMENT_ID,
                'CID'               =>$request->CID,
                'TR_CID'            =>$request->TR_CID,
                'span'              =>$request->span,
                'id_fo_cut'         =>$request->id_fo_cut,
                'NE_IMPACT'         =>$request->NE_IMPACT,
                'IMPACT_TT'         =>$request->IMPACT_TT,
                'ring'              =>$request->ring,
                'start_time'        =>$request->start_time,
                'stop_clock'        =>$request->stop_clock,
                'end_time'          =>$request->end_time,
                'start_date'        =>$request->start_date,
                'end_date'          =>$request->end_date,
                'root_cause'        =>$request->root_cause,
                'status'            =>$request->status,
                'aging_time'        =>$request->aging_time,
                'remark'            =>$request->remark,
                'note'              =>$request->note,
                'status_pic'        =>$request->status_pic,
                'ceklis'            =>$request->ceklis,
                'id_type_kabel'     =>$request->id_type_kabel,
                'tikor'             =>$request->tikor,
                'time_travel'       =>$request->time_travel,
                'time_tracking'     =>$request->time_tracking,
                'join_cut_point'    =>$request->join_cut_point,
                'SLA_TROUBLESHOOT'  =>$request->SLA_TROUBLESHOOT,
                'cut_point'         =>$request->join_cut_point,
                'created_at'        =>date('Y-m-d H:i:s')
            ];
            $person = PersonInCharge::create($data);

            // Update Tiket
            $dateperson = date( "Y-m-d", strtotime($person->date));
            $datemintujuh = date( "Y-m-d", strtotime( "$dateperson -7 day" ) );
            Tiket::where('status',2)->whereDate('created_at','<=',$dateperson)->whereDate('created_at','>=',$datemintujuh)->update(['PIC'=>$request->id]);

            return redirect()->back()->with(['success' => 'Berhasil Simpan']);
        }catch(Exception $e){
            return redirect()->back()->with(['error' => 'Gagal Simpan '.$e]);
        }
    }

    public function update(Request $request)
    {
        try{
            date_default_timezone_set('Asia/Bangkok');

            $this->validate($request,[
                'no'                =>'required',
                'date'              =>'required',
                'week'              =>'required',
                'area'              =>'required',
                'area_pic'          =>'required',
                'TT_NUMBER'         =>'required',
                'customer'          =>'required',
                'SEGMENT_ID'        =>'required',
                'CID'               =>'required',
                'TR_CID'            =>'required',
                'span'              =>'required',
                'id_fo_cut'         =>'required',
                'NE_IMPACT'         =>'required',
                'IMPACT_TT'         =>'required',
                'ring'              =>'required',
                'start_time'        =>'required',
                'stop_clock'        =>'required',
                'end_time'          =>'required',
                'start_date'        =>'required',
                'end_date'          =>'required',
                'root_cause'        =>'required',
                'status'            =>'required',
                'aging_time'        =>'required',
                'remark'            =>'required',
                'note'              =>'required',
                'status_pic'        =>'required',
                'ceklis'            =>'required',
                'id_type_kabel'     =>'required',
                'tikor'             =>'required',
                'time_travel'       =>'required',
                'time_tracking'     =>'required',
                'join_cut_point'    =>'required',
                'SLA_TROUBLESHOOT'  =>'required',
            ]);

            $data = [
                'no'                =>$request->no,
                'date'              =>$request->date,
                'week'              =>$request->week,
                'area'              =>$request->area,
                'area_pic'          =>$request->area_pic,
                'TT_NUMBER'         =>$request->TT_NUMBER,
                'customer'          =>$request->customer,
                'SEGMENT_ID'        =>$request->SEGMENT_ID,
                'CID'               =>$request->CID,
                'TR_CID'            =>$request->TR_CID,
                'span'              =>$request->span,
                'id_fo_cut'         =>$request->id_fo_cut,
                'NE_IMPACT'         =>$request->NE_IMPACT,
                'IMPACT_TT'         =>$request->IMPACT_TT,
                'ring'              =>$request->ring,
                'start_time'        =>$request->start_time,
                'stop_clock'        =>$request->stop_clock,
                'end_time'          =>$request->end_time,
                'start_date'        =>$request->start_date,
                'end_date'          =>$request->end_date,
                'root_cause'        =>$request->root_cause,
                'status'            =>$request->status,
                'aging_time'        =>$request->aging_time,
                'remark'            =>$request->remark,
                'note'              =>$request->note,
                'status_pic'        =>$request->status_pic,
                'ceklis'            =>$request->ceklis,
                'id_type_kabel'     =>$request->id_type_kabel,
                'tikor'             =>$request->tikor,
                'time_travel'       =>$request->time_travel,
                'time_tracking'     =>$request->time_tracking,
                'join_cut_point'    =>$request->join_cut_point,
                'SLA_TROUBLESHOOT'  =>$request->SLA_TROUBLESHOOT,
                'cut_point'         =>$request->join_cut_point,
                'created_at'        =>date('Y-m-d H:i:s')
            ];
            PersonInCharge::where('id', $request->id)->update($data);
            // Update Tiket
            $dateperson = date( "Y-m-d", strtotime($request->date));
            $datemintujuh = date( "Y-m-d", strtotime( "$dateperson -7 day" ) );
            Tiket::where('status',2)->whereDate('created_at','<=',$dateperson)->whereDate('created_at','>=',$datemintujuh)->update(['PIC'=>$request->id]);

            return redirect()->back()->with(['success' => 'Berhasil Update']);
        }catch(Exception $e){
            return redirect()->back()->with(['error' => 'Gagal Update '.$e]);
        }
    }

    public function delete(Request $request)
    {
        try{
            $this->validate($request,[
                'id'=>'required'
            ]);
            PersonInCharge::where('id', $request->id)->delete();

            return redirect()->back()->with(['success' => 'Berhasil Delete']);
        }catch(Exception $e){
            return redirect()->back()->with(['error' => 'Gagal Delete '.$e]);
        }
    }

    public function getTiket(){
        $id_person = $_GET['id'];
        $tiket = Tiket::with('MasterTransaksiCustomer','MasterArea')->where('PIC', $id_person)->get();

        return $tiket;
    }
}
