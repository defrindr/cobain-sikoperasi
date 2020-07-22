<?php

namespace App\Models;;

use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    //
    protected $table = "tabungan";

    protected $fillable = [
    	"anggota_id",
        "no_rekening",
        "saldo",
        "pin"
    ];

    public function anggota(){
        return $this->belongsTo('App\Models\Anggota');
    }
    public function riwayat(){
        return $this->hasMany('App\Models\Riwayat');
    }
}
