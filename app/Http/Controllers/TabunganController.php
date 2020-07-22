<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request as DRequest ;
use App\Http\Requests\TabunganRequest as Request ;

use App\Models\Tabungan;
use App\Models\Anggota;
use App\Models\Riwayat;

use App\Exports\HistoryExport;



class TabunganController extends Controller
{
    public $actionRoutes = "tabungan";
    public $title = "";



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DRequest $r)
    {
        $data = Tabungan::query()->join('anggota','anggota.id','=','anggota_id')->select(["tabungan.id","anggota.nama","email","no_rekening"]);
        $q = "";

        if($r->has('query') ){
            $q .= $r->get('query');

            $data = $data->where('no_rekening','like',"%". $q ."%")
                ->OrWhere('anggota.nama','like',"%". $q ."%");
        }

        $data = $data->orderBy('tabungan.created_at')->paginate(5);

        $template = \GridView::dgv($data,[
            "class" => "table table-hover table-borderless"
        ])->withouts([
            "id"
        ])->numbering()
        ->actions($this->actionRoutes,["show","delete"])
        ->get();

        return view($this->actionRoutes . ".index",[
            "data" => $template,
            "title" => $this->title,
            "actionRoutes" => $this->actionRoutes
        ],[
            "id"
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggota = Anggota::orderBy('nama','ASC')->select('id','nama')->get()->toArray();
        $anggota = \ArrayHelper::map($anggota,["id" => "nama"]);

        $no_rekening = "";

        for ($i=0; $i < 16 ; $i++) { 
            $no_rekening .= random_int(0, 9);
        }



        return view($this->actionRoutes . '.create',[
            "data" => [],
            "anggota" => $anggota,
            "title" => $this->title,
            "no_rekening" => $no_rekening,
            "actionRoutes" => $this->actionRoutes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try{
            $data = new Tabungan($request->all());

            if($data->save()){
                $riwayat = new Riwayat([
                    "tabungan_id" => $data->id,
                    "action" => "simpan",
                    "value" => $data->saldo,
                    "created_by" => \Auth::user()->id
                ]);

                $riwayat->save();
                DB::commit();

                return redirect()->route($this->actionRoutes . '.show',["data" => $data->id])->with('success','Data berhasil disimpan.');
            }else{
                DB::rollback();
                return redirect()->route($this->actionRoutes . '.create')->with('error','Data gagal disimpan.');
            }
        }catch(\Exception $e){
            dd($e);
            DB::rollback();
            return redirect()->route($this->actionRoutes . '.create')->with('error','Terjadi sebuah kesaahan yang belum diketahui.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tabungan $data)
    {

        $riwayat = Riwayat::where(['tabungan_id' => $data->id])->orderBy('created_at','DESC')->first();
        if($riwayat){
            $riwayat = \Str::datetime($riwayat->created_at);
        }else{
            $riwayat = "-";
        }

        $data->nama_nasabah = $data->anggota->nama;
        $data->total_saldo = \Str::toRp($data->saldo);
        $data->no_HP = $data->anggota->no_hp;
        $data->email = $data->anggota->email;
        $data->alamat = $data->anggota->alamat;
        $data->transaksi_terakhir = $riwayat;
        unset($data->saldo);
        unset($data->anggota_id);

        return view($this->actionRoutes. '.show',[
            "data" => $data,
            "title" => $this->title,
            "actionRoutes" => $this->actionRoutes
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Tabungan $data)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tabungan $data)
    {
        //
    }

    public function form_transact(Tabungan $data) {
        return view('tabungan.form_transact',[
            "data" => $data,
            "actionRoutes" => $this->actionRoutes,
            "title" => $this->title
        ]);
    }

    public function transact(DRequest $r, Tabungan $data) {
        DB::beginTransaction();

        if($r->action == "ambil"){
            if($data->saldo - $r->value >= $r->cms["saldo_awal_minimal"]){ 
                try{
                    $sisa = $data->saldo - $r->value;
                    $id = $data->id;

                    $schema = [
                        "tabungan_id" => $id,
                        "action" => $r->action,
                        "value" => $r->value,
                        "created_by" => \Auth::user()->id
                    ];

                    $riwayat = new Riwayat($schema);

                    if($riwayat->save()){
                        $data->update(["saldo" => $sisa]);
                        $data->touch();

                        DB::commit();

                        return redirect()->route($this->actionRoutes. ".show",["data" => $data])->with("success","Transaksi berhasil dilakukan. Terima Kasih");
                    }
                
                }catch(\Exception $e){
                    return redirect()->route($this->actionRoutes. ".show",["data" => $data])->with("error","Transaksi gagal dilakukan. Silahkan Check kembali");
                }
            }else{
                return redirect()->route($this->actionRoutes. ".transact",["data" => $data])->with("error","Sisa saldo tidak boleh kurang dari ". \Str::toRp($r->cms["saldo_awal_minimal"]));
            }
        }else if($r->action == "simpan"){
            try{
                $sisa = $data->saldo + $r->value;
                $id = $data->id;
                $schema = [
                    "tabungan_id" => $id,
                    "action" => $r->action,
                    "value" => $r->value,
                    "created_by" => \Auth::user()->id
                ];
                $riwayat = new Riwayat($schema);
                if($riwayat->save()){
                    $data->update(["saldo" => $sisa]);
                    $data->touch();
                    DB::commit();
                    return redirect()->route($this->actionRoutes. ".show",["data" => $data])->with("success","Transaksi berhasil dilakukan. Terima Kasih");
                }
            
            }catch(\Exception $e){
                return redirect()->route($this->actionRoutes. ".show",["data" => $data])->with("error","Transaksi gagal dilakukan. Silahkan Check kembali");
            }
        }else{
            return redirect()->route($this->actionRoutes. ".transact",["data" => $data])->with("error","Aksi tida diketahui");
        }



    }


    public function exportHistory(DRequest $r,Tabungan $tabungan){
        if(!isset($r->month)){
            $r->month = now();
        }
        $month = Date('m',strtotime($r->month. "-01"));
        $year = Date('Y',strtotime($r->year. "-01"));



		return \Excel::download(new HistoryExport($month,$year,$tabungan),
			$this->fileName('riwayat_tabungan_' . str_replace(' ','_',$tabungan->anggota->nama)));
		
    }

    public function fileName($names){
        return $names. "_" . Date('Y-m-d__H:i:s') . ".xlsx";
    }


}
