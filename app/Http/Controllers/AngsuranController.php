<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Angsuran;
use App\Http\Requests\AngsuranRequest as Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request as DRequest;
use Str;

class AngsuranController extends Controller
{
    public $actionRoutes = "angsuran";
    public $title = "Angsuran";



    public function index($id){
        $peminjaman = Peminjaman::findOrFail($id);
        $data = Angsuran::where(['peminjaman_id' => $id])->paginate(6);

        return view($this->actionRoutes.'.index',[
            "data" => $data,
            "peminjaman" => $peminjaman,
            "title" => $this->title,
            "actionRoutes" => $this->actionRoutes,
        ]);
    }





    public function show(Peminjaman $data)
    {
        $dR["anggota"] = $data->anggota->nama;
        $dR += $data->toArray();
        unset($dR["anggota_id"]);

        $dR["bunga"] = $dR["bunga"]." %";
        $dR["lama_angsur"] = $dR["lama_angsur"]." bulan";

        $dR["pinjaman_awal"] = "Rp " . Str::toRp($dR["pinjaman_awal"]);
        $dR["angsur_perbulan"] = "Rp " . Str::toRp($dR["angsur_perbulan"]);
        $dR["total_pinjaman"] = "Rp " . Str::toRp($dR["total_pinjaman"]);
        $dR["tanggal_pinjam"] = Date('d F Y',strtotime($dR["tanggal_pinjam"]));



        return view('peminjaman.show',[
           
           'title' => $this->title,
            'data' => $dR,
            'actionRoutes' => $this->actionRoutes
        ]);
    }






    public function edit(Peminjaman $peminjaman,Angsuran $data)
    {

        if($data->status == 'dibayar') return abort(403,"Forbidden Access");

        $now = strtotime(Date("Y-m-d",time()));
        $active =  strtotime ( '-10 day' , strtotime ( $data->jatuh_tempo) );
        
        if( $active - $now >= 0 ){
            return abort(403,"Akses ditolak");
        }

        return view('angsuran.edit',[
           
            'title' => $this->title,
            'data' => $data,
            'peminjaman' => $peminjaman,
            'actionRoutes' => $this->actionRoutes
        ]);
    }




    public function update(Request $request, Peminjaman $peminjaman, Angsuran $data)
    {

        $letMeKnow = (
            (strtotime(Date('Y-m-d')) - strtotime($data->jatuh_tempo) ) / (60 * 60 * 24)
        );

        if($letMeKnow  < 0){
            $letMeKnow = 0;
        }

        $denda = floor(request()->cms['denda_perhari'] * $peminjaman->angsur_perbulan * $letMeKnow);
        $totalBayar = $denda + $peminjaman->angsur_perbulan;

        $schema = [
            "status" => "dibayar",
            "tanggal_bayar" => date('Y-m-d'),
            "denda" => $denda,
            "total_bayar" => $totalBayar,
        ];

        if($data->update($schema)){
            return redirect()->route('peminjaman.list_angsuran',['data' => $peminjaman])->with('success','Data berhasil diubah');
        }else{
            return redirect()->route('peminjaman.list_angsuran',['data' => $peminjaman])->with('success','Data berhasil diubah');
        }
    }


}
