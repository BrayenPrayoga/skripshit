<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterVendor extends Model
{
    use HasFactory;

    protected $table = 'master_vendor';

    protected $guarded = [];

    public $timestamps = false;

    protected $softDelete = false;
}
