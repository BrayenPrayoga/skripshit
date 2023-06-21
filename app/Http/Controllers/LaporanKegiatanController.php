<?php

namespace App\Http\Controllers;

use App\Models\PersonInCharge;
use App\Models\Tiket;
use App\Models\LaporanKegiatan;
use Illuminate\Http\Request;
use Auth;

class LaporanKegiatanController extends Controller
{
    //
    public function index()
    {
        $data['no'] = 1;
        $data['laporan_kegiatan'] = LaporanKegiatan::orderBy('id','ASC')->get();

        return view('laporan-kegiatan', $data);
    }

    public function simpan(Request $request)
    {
        try{
            date_default_timezone_set('Asia/Bangkok');
            
            $this->validate($request,[
                'kegiatan'  =>'required',
                'image'     =>'required|mimes:jpeg,png,jpg|max:2048',
                'deskripsi' =>'required',
                'tanggal'   =>'required'
            ]);

            if($request->hasFile('image')){
                $file = $request->file('image');
                $filePath = public_path().'/upload/kegiatan/';
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $file->move($filePath,$fileName);
            }else{
                $fileName = NULL;
            }

            $data = [
                'kegiatan'      =>$request->kegiatan,
                'image'         =>$fileName,
                'deskripsi'     =>$request->deskripsi,
                'tanggal'       =>$request->tanggal,
                'created_at'    =>date('Y-m-d H:i:s')
            ];
            LaporanKegiatan::create($data);

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
                'kegiatan'  =>'required',
                'deskripsi' =>'required',
                'tanggal'   =>'required'
            ]);

            if($request->hasFile('image')){
                $file = $request->file('image');
                $filePath = public_path().'/upload/kegiatan/';
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $file->move($filePath,$fileName);
            }else{
                $kegiatan = LaporanKegiatan::where('id', $request->id)->first();
                $fileName = $kegiatan->image;
            }

            $data = [
                'kegiatan'      =>$request->kegiatan,
                'image'         =>$fileName,
                'deskripsi'     =>$request->deskripsi,
                'tanggal'       =>$request->tanggal,
                'updated_at'    =>date('Y-m-d H:i:s')
            ];
            LaporanKegiatan::where('id', $request->id)->update($data);

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
            LaporanKegiatan::where('id', $request->id)->delete();

            return redirect()->back()->with(['success' => 'Berhasil Delete']);
        }catch(Exception $e){
            return redirect()->back()->with(['error' => 'Gagal Delete '.$e]);
        }
    }
}
