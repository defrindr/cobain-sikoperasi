<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
	protected $table="anggota";
    protected $fillable = [
    	"nama","alamat","no_hp","email"
    ];
}
