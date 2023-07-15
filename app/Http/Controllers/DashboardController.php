<?php

namespace App\Http\Controllers;

use App\Models\PersonInCharge;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Tiket;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('dashboard');
    }

    public function getDataBarChart(){
        
        date_default_timezone_set('Asia/Bangkok');

        $category = [];
        $seriesDataOpen = [];
        $seriesDataClose = [];
        $series = [];

        $dateperson = date( "Y-m-d");
        $datemintujuh = date( "Y-m-d", strtotime("$dateperson -7 day"));

        for($i=$datemintujuh ; $i < $dateperson ; $i++){
            $category[] = $i;

            $seriesDataOpen['name'] = 'OPEN';
            $seriesDataOpen['data'][] = Tiket::whereDate('created_at',$i)->where('status', 1)->count();
            $seriesDataClose['name'] = 'CLOSE';
            $seriesDataClose['data'][] = Tiket::whereDate('created_at',$i)->where('status', 2)->count();
        }
        $series[] = $seriesDataOpen;
        $seriesDataOpen = [];
        
        $series[] = $seriesDataClose;
        $seriesDataClose = [];

        return ([
            'category'  => $category,
            'series'    => $series
        ]);
    }

    public function getDataPieChart(){

        $seriesData = [];
        $series = [];

        $cancel = PersonInCharge::where('status_pic', 3)->count();
        $out_la = PersonInCharge::where('status_pic', 4)->count();
        $meet_sla = PersonInCharge::where('status_pic', 5)->count();
        $all = PersonInCharge::count();
        $rumus_cancel = $cancel / $all * 100;
        $rumus_out_la = $out_la / $all * 100;
        $rumus_meet_sla = $meet_sla / $all * 100;

        $seriesData['name'] = 'JUMLAH';
        $seriesData['data'][] = ['CANCEL (%)', $rumus_cancel];
        $seriesData['data'][] = ['OUT SLA (%)', $rumus_out_la];
        $seriesData['data'][] = ['MEET SLA (%)', $rumus_meet_sla];

        $series[] = $seriesData;
        $seriesData = [];

        return $series;
    }
}
