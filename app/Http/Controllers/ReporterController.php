<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Peminjaman;
use App\Models\Tabungan;
use App\Models\Anggota;
use App\Models\UserModel as User;

class ReporterController extends Controller
{
    public function index(){
    	$peminjamanTotal = Peminjaman::count();
    	$tabunganTotal = Tabungan::count();
    	$anggotaTotal = Anggota::count();
    	$userTotal = User::count();


    	return view('menu',[
			'peminjamanTotal' => $peminjamanTotal,
			'tabunganTotal' => $tabunganTotal,
			'anggotaTotal' => $anggotaTotal,
			'userTotal' => $userTotal,
    	]);

    }
}
