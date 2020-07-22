<?php

namespace App\Models;;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    //
    protected $table = "riwayat_tabungan";

    protected $fillable = [
    	"tabungan_id",
        "no_rekening",
        "action",
        "value",
        "created_by"
    ];

    public function anggota(){
        return $this->belongsTo('App\Models\Anggota','id');
    }
    public function angsuran(){
        return $this->hasMany('App\Models\Angsuran');
    }
}
