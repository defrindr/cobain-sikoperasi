<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Angsuran;
use App\Http\Requests\PeminjamanRequest as Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request as DRequest;
use Str;

class PeminjamanController extends Controller
{
    public $actionRoutes = "peminjaman";
    public $title = "Peminjaman";


    public function index(DRequest $r)
    {
        $q = "";
        $perPage = 5;
        $pageNum = 1;
        $eloquent = Peminjaman::query()->join('anggota','anggota.id' ,'=', 'anggota_id')->select('peminjaman.id','anggota.nama','anggota.email','status','tanggal_pinjam')->orderBy('peminjaman.created_at','DESC');

        if($r->has('page')){
            $pageNum = $r->get('page');
        }

        if($r->has('query')){
            $q = $r->get('query');
            $eloquent->where('status','like','%' . $q . '%')
                ->OrWhere('anggota.nama','like','%' . $q . '%');
        }
        if($r->has('perpage')){
            if($r->get('perpage').replace("/[a-z][A-Z]/",""))
            $perPage = $r->get('perpage');
        }

        // change date format
        foreach ($eloquent as $val) {
            $val->tanggal_pinjam = \Str::date($val->tanggal_pinjam);
        }



        $data = $eloquent->paginate($perPage);


        $data = \GridView::dgv($data,
          $options = [
            'class' => 'table-hover table-borderless'],
           true,
           $perPage,
           $pageNum
        )
              ->numbering()
              ->withouts([
                'id',
                'password',
                'created_at',
                'updated_at',
              ])
              ->actions($this->actionRoutes)
              ->get();

              // dd($data);
        
        return view('peminjaman.index',[
            'title' => $this->title,
            'data' => $data,
            'actionRoutes' => $this->actionRoutes
        ]);
    }




    public function create()
    {

        $anggota = Anggota::orderBy('nama','ASC')->get()->toArray();

        $anggota = \ArrayHelper::map($anggota,["id" => "nama"]);

        return view('peminjaman.create',[
            'title' => $this->title,
            'anggota' => $anggota,
            'actionRoutes' => $this->actionRoutes,
        ]);
    }




    public function store(Request $request)
    {

        $anggota = Anggota::findOrFail($request->anggota_id);
        $check = Peminjaman::where(['anggota_id' => $anggota->id])
                    ->where(['status' => 'belum lunas'])->first();

        if($check){
            return redirect()->route($this->actionRoutes . '.create')->with('error','Anggota masih mempunyai tanggungan pinjaman');
        }else{
            DB::beginTransaction();

            try{

                $total_bunga = $request->pinjaman_awal*($request->bunga/100)*($request->lama_angsur);
                $totalPinjaman = $request->pinjaman_awal+$total_bunga;
                $angsur_perbulan = $totalPinjaman / $request->lama_angsur;

                $schema = [
                    "anggota_id" => $request->anggota_id,
                    "pinjaman_awal" => $request->pinjaman_awal,
                    "lama_angsur" => $request->lama_angsur,
                    "bunga" => $request->bunga,
                    "angsur_perbulan" => $angsur_perbulan,
                    "total_pinjaman" => $totalPinjaman,
                    "tanggal_pinjam" => $request->tanggal_pinjam,
                ];

                $data = new Peminjaman($schema);
                if($data->save()){

                    $loopcount = $data->lama_angsur;
                    $startDate = strtotime($data->tanggal_pinjam);

                    for($i=1;$i <= $loopcount; $i++) {
                        $model = [
                            "peminjaman_id" => $data->id ,
                            "jatuh_tempo" => Date('Y-m-d',strtotime('+' .$i. ' month',$startDate)),
                            "jml_angsur" => $data->angsur_perbulan ,
                            "denda" => 0,
                            "total_bayar" => 0,
                            "tanggal_bayar" => null,
                        ];
                        $angsuran = new Angsuran($model);
                        $angsuran->save();
                    }


                    DB::commit();

                    return redirect()->route($this->actionRoutes . '.show',['data' => $data])->with('success','Data berhasil diubah');
                }

            }catch(\Exception $e){
                DB::rollback();
                return redirect()->route($this->actionRoutes . '.create')->with('error','Data gagal diubah');
            }

        }

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
        $dR["tanggal_pinjam"] = Str::date($dR["tanggal_pinjam"]);



        return view('peminjaman.show',[
           
           'title' => $this->title,
            'data' => $dR,
            'actionRoutes' => $this->actionRoutes
        ]);
    }






    public function edit(Peminjaman $data)
    {

        $angsuran = Angsuran::where([
            "peminjaman_id" => $data->id,
            "status" => "belum dibayar"
        ])->get();

        if( count($angsuran) != $data->lama_angsur) return abort(403,"Angsuran telah dilakukan, Tidak dapat mengubah data");


        $eloquent = Anggota::orderBy('nama','DESC')->get()->toArray();
        $anggota = [];

        foreach ($eloquent as $row) {
            $anggota += [
                $row["id"] => $row["nama"]
            ];
        }

        return view('peminjaman.edit',[
           
           'title' => $this->title,
            'data' => $data,
            'anggota' => $anggota,
            'actionRoutes' => $this->actionRoutes
        ]);
    }




    public function update(Request $request, Peminjaman $data)
    {
        $angsuran = Angsuran::where([
            "peminjaman_id" => $data->id,
            "status" => "belum dibayar"
        ])->get();

        if( count($angsuran) != $data->lama_angsur) return abort(403,"Angsuran telah dilakukan, Tidak dapat mengubah data");

        if($data->update($request->all())){
            return redirect()->route($this->actionRoutes . '.show',['data' => $data])->with('success','Data berhasil diubah');
        }
    }



    public function destroy(Peminjaman $data)
    {
        $angsur = Angsuran::where(['peminjaman_id' => $data->id, 'status' => 'dibayar'])->count();

        if($angsur <= 0 || $data->status == "lunas"){
            DB::beginTransaction();
            try{
                $angsur = Angsuran::where(['peminjaman_id' => $data->id])->get();

                foreach ($angsur as $row) {
                    $row->delete();
                }

                if($data->delete()){
                    DB::commit();
                    return redirect()->route($this->actionRoutes . '.index')->with('success','Data berhasil dihapus');
                }
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->route($this->actionRoutes . '.index')->with('error','Data gagal dihapus');
            }

        }

        return redirect()->route($this->actionRoutes . '.index')->with('error','Harap selesaikan angsuran terlebih dahulu.');
    }


    public function ApiCheckUser($id){
        $data = Anggota::where([ 'id' => $id])->first();
        if($data){
            return response([
                'success' => true,
                'data' => $data
            ]);
        }else{
            return response([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }


}
