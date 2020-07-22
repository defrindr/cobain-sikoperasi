<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
	protected $table="angsuran";

    protected $fillable = [
    	"peminjaman_id",
    	"jatuh_tempo",
    	"jml_angsur",
    	"denda",
    	"total_bayar",
    	"tanggal_bayar",
        "status",
    ];

    public function peminjaman(){
    	return $this->belongsTo('App\Models\Peminjaman');
    }
}
