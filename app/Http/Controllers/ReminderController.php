<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifikasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReminderController extends Controller
{
    //
    public function simpan(Request $request)
    {
        $user = User::whereIn('role', [2,4])->get();
        foreach($user as $item){
            Notifikasi::insert([
                'id_dari'       => Auth::guard('users')->user()->id,
                'id_untuk'      => $item->id,
                'keterangan'    => $request->noted,
                'status'        => 0,
                'created_at'    => $request->tanggal
            ]);
        }
        
        return redirect()->back()->with(['success'=>'Berhasil Simpan']);
    }
}
