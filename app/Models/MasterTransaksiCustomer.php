<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterTransaksiCustomer extends Model
{
    use HasFactory;

    protected $table = 'master_transaksi_customer';

    protected $guarded = [];

    public $timestamps = false;

    protected $softDelete = false;
}
