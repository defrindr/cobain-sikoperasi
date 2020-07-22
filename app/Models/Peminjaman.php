<?php

namespace App\Models;;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    //
    protected $table = "peminjaman";

    protected $fillable = [
    	"anggota_id",
    	"pinjaman_awal",
    	"angsur_perbulan",
    	"lama_angsur",
    	"bunga",
    	"status",
    	"tanggal_pinjam",
    	"total_pinjaman"
    ];

    public function anggota(){
        return $this->belongsTo('App\Models\Anggota');
    }
    public function angsuran(){
        return $this->hasMany('App\Models\Angsuran');
    }
}
