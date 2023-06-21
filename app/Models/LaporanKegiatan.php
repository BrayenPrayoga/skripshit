<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKegiatan extends Model
{
    use HasFactory;

    protected $table = 'laporan_kegiatan';

    protected $guarded = [];

    public $timestamps = false;

    protected $softDelete = false;
}
