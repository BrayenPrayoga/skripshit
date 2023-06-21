<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterStatusTiket extends Model
{
    use HasFactory;

    protected $table = 'master_status_tiket';

    protected $guarded = [];

    public $timestamps = false;

    protected $softDelete = false;
}
