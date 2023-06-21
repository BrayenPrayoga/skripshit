<?php

use App\Models\Role;

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

?>