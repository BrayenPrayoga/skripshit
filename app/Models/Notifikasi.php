<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi';

    protected $guarded = [];

    public $timestamps = false;

    protected $softDelete = false;

    public function Users()
    {
        return $this->belongsTo('App\Models\User','id_dari','id')->withDefault();
    }
}
