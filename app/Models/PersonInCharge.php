<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonInCharge extends Model
{
    use HasFactory;

    protected $table = 'person_in_charge';

    protected $guarded = [];

    public $timestamps = false;

    protected $softDelete = false;

    public function MasterTransaksiCustomer()
    {
        return $this->belongsTo('App\Models\MasterTransaksiCustomer','id_master_transaksi_customer','id')->withDefault();
    }

    public function MasterStatusTiket()
    {
        return $this->belongsTo('App\Models\MasterStatusTiket','status','id')->withDefault();
    }
    
    public function MasterStatusTiketPIC()
    {
        return $this->belongsTo('App\Models\MasterStatusTiket','status_pic','id')->withDefault();
    }

    public function MasterArea()
    {
        return $this->belongsTo('App\Models\MasterArea','id_master_area','id')->withDefault();
    }

    public function MasterCategory()
    {
        return $this->belongsTo('App\Models\MasterCategory','id_master_category','id')->withDefault();
    }

    public function MasterVendor()
    {
        return $this->belongsTo('App\Models\MasterVendor','id_master_vendor','id')->withDefault();
    }
    
    public function Users()
    {
        return $this->belongsTo('App\Models\User','id_users','id')->withDefault();
    }
}
