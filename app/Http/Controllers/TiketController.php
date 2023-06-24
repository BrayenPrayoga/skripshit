<?php

namespace App\Http\Controllers;

use App\Models\MasterArea;
use App\Models\MasterCategory;
use App\Models\MasterStatusTiket;
use App\Models\MasterTransaksiCustomer;
use App\Models\MasterVendor;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Auth;

class TiketController extends Controller
{
    //
    public function index()
    {
        $id_users = Auth::guard('users')->user()->id;
        $data['no'] = 1;
        $data['master_tr_customer'] = MasterTransaksiCustomer::orderBy('id','ASC')->get();
        $data['master_area'] = MasterArea::orderBy('id','ASC')->get();
        $data['master_category'] = MasterCategory::orderBy('id','ASC')->get();
        $data['master_vendor'] = MasterVendor::orderBy('id','ASC')->get();
        $data['master_status'] = MasterStatusTiket::where('role',1)->orderBy('id','ASC')->get();
        if(Auth::guard('users')->user()->role == 1){
            $data['tiket'] = Tiket::where('id_users', $id_users)->orderBy('id','ASC')->get();
        }else{
            $data['tiket'] = Tiket::orderBy('id','ASC')->get();
        }

        return view('tiket', $data);
    }

    public function simpan(Request $request)
    {
        try{
            date_default_timezone_set('Asia/Bangkok');
            
            $this->validate($request,[
                'id_master_transaksi_customer'=>'required',
                'TT_FLP'=>'required',
                'id_master_area'=>'required',
                'span_problem'=>'required',
                'ring'=>'required',
                'CID'=>'required',
                'span_length'=>'required',
                'id_master_category'=>'required',
                'down_time'=>'required',
                'clear_time'=>'required',
                'duration'=>'required',
                'root_cause'=>'required',
                'problem_location'=>'required',
                'id_master_vendor'=>'required',
                'note'=>'required'
            ]);

            $data = [
                'id_users'                      => Auth::guard('users')->user()->id,
                'id_master_transaksi_customer'  => $request->id_master_transaksi_customer,
                'TT_FLP'                        => $request->TT_FLP,
                'id_master_area'                => $request->id_master_area,
                'span_problem'                  => $request->span_problem,
                'ring'                          => $request->ring,
                'CID'                           => $request->CID,
                'span_length'                   => $request->span_length,
                'id_master_category'            => $request->id_master_category,
                'down_time'                     => date("Y-m-d H:i:s", strtotime($request->down_time)),
                'clear_time'                    => date("Y-m-d H:i:s", strtotime($request->clear_time)),
                'duration'                      => $request->duration,
                'root_cause'                    => $request->root_cause,
                'problem_location'              => $request->problem_location,
                'status'                        => 1,
                'id_master_vendor'              => $request->id_master_vendor,
                'note'                          => $request->note,
                'created_at'                    => date('Y-m-d H:i:s')
            ];
            Tiket::create($data);

            return redirect()->back()->with(['success' => 'Berhasil Simpan']);
        }catch(Exception $e){
            return redirect()->back()->with(['error' => 'Gagal Simpan '.$e]);
        }
    }

    public function update(Request $request)
    {
        try{
            $this->validate($request,[
                'id_master_transaksi_customer'=>'required',
                'TT_FLP'=>'required',
                'id_master_area'=>'required',
                'span_problem'=>'required',
                'ring'=>'required',
                'CID'=>'required',
                'span_length'=>'required',
                'id_master_category'=>'required',
                'down_time'=>'required',
                'clear_time'=>'required',
                'duration'=>'required',
                'root_cause'=>'required',
                'problem_location'=>'required',
                'id_master_vendor'=>'required',
                'note'=>'required'
            ]);

            $data = [
                'id_users'                      => Auth::guard('users')->user()->id,
                'id_master_transaksi_customer'  => $request->id_master_transaksi_customer,
                'TT_FLP'                        => $request->TT_FLP,
                'id_master_area'                => $request->id_master_area,
                'span_problem'                  => $request->span_problem,
                'ring'                          => $request->ring,
                'CID'                           => $request->CID,
                'span_length'                   => $request->span_length,
                'id_master_category'            => $request->id_master_category,
                'down_time'                     => date("Y-m-d H:i:s", strtotime($request->down_time)),
                'clear_time'                    => date("Y-m-d H:i:s", strtotime($request->clear_time)),
                'duration'                      => $request->duration,
                'root_cause'                    => $request->root_cause,
                'problem_location'              => $request->problem_location,
                'status'                        => 2,
                'id_master_vendor'              => $request->id_master_vendor,
                'note'                          => $request->note
            ];
            Tiket::where('id', $request->id)->update($data);

            return redirect()->back()->with(['success' => 'Berhasil Update']);
        }catch(Exception $e){
            return redirect()->back()->with(['error' => 'Gagal Update '.$e]);
        }
    }

    public function update_status(Request $request)
    {
        try{
            date_default_timezone_set('Asia/Bangkok');

            $this->validate($request,[
                'id'=>'required',
                'id_master_status'=>'required'
            ]);
            Tiket::where('id', $request->id)->update([
                'status'        => $request->id_master_status,
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);
            
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
            Tiket::where('id', $request->id)->delete();

            return redirect()->back()->with(['success' => 'Berhasil Delete']);
        }catch(Exception $e){
            return redirect()->back()->with(['error' => 'Gagal Delete '.$e]);
        }
    }
}
