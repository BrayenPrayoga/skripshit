<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterTypeKabel extends Model
{
    use HasFactory;

    protected $table = 'master_type_kabel';

    protected $guarded = [];

    public $timestamps = false;

    protected $softDelete = false;
}
