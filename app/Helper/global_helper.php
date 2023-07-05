<?php

use App\Models\Role;
use App\Models\Notifikasi;
use App\Models\User;

if (! function_exists('tgl_indo')) {
    function tgl_indo($tgl){
        $tanggal = date('Y-m-d', strtotime($tgl));
        $time = date('H:i:s', strtotime($tgl));
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0] . ' ' .$time;
    }
}

if (! function_exists('getRole')) {
    function getRole($id_role)
    {
        $role = Role::where('id', $id_role)->first();

        return !empty($role) ? $role->role : '';
    }
}

if (! function_exists('PushKeNotifikasi')) {
    function PushKeNotifikasi()
    {
        $hari = date('w');
        if($hari = 5){
            Notifikasi::insert([
                'id_dari'       => 0,
                'id_untuk'      => Auth::guard('users')->user()->id,
                'keterangan'    => 'Belum Membuat Laporan Mingguan Pada Minggu Ini',
                'status'        => 0
            ]);
        }

        return 'success';
    }
}

if (! function_exists('getNotifikasi')) {
    function getNotifikasi($param)
    {
        if($param == 'count'){
            $notif = Notifikasi::where('id_untuk', Auth::guard('users')->user()->id)->where('status', 0)->count();
        }else{
            $notif = Notifikasi::where('id_untuk', Auth::guard('users')->user()->id)->get();
        }

        return !empty($notif) ? $notif : '';
    }
}

?>