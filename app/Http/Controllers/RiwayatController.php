<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Tabungan;
use App\Models\Riwayat;

class RiwayatController extends Controller {
	private $actionRoutes = "riwayat";

	public function index($id) {
		$riwayat = Riwayat::where(["tabungan_id" => $id])->orderBy('created_at','DESC')->paginate(10);
		
		return view($this->actionRoutes. '.index',[
			"data" => $riwayat,
			"id" => $id,
			"title" => ucfirst($this->actionRoutes),
			"actionRoutes" => $this->actionRoutes
		]);
	}

	public function detail(Riwayat $data){
		$riwayat = $data
					->where(['riwayat_tabungan.id' => $data->id])
					->join('tabungan','tabungan_id','=','tabungan.id')
					->join('anggota','tabungan.anggota_id','=','anggota.id')
					->select([
						"riwayat_tabungan.tabungan_id",
						"tabungan.no_rekening",
						DB::raw("anggota.nama AS nama_nasabah"),
						DB::raw("riwayat_tabungan.action AS Aksi"),
						"riwayat_tabungan.value",
					])
					->first();

		
		$riwayat->Aksi = ($riwayat->Aksi == "simpan") ? "Penambahan Saldo" : "Pengambilan Saldo";
		$riwayat->value = "Rp ". \Str::toRp($riwayat->value);

		return view($this->actionRoutes. '.show',[
			"data" => $riwayat,
			"title" => ucfirst($this->actionRoutes),
			"actionRoutes" => $this->actionRoutes
		]);
	}

}