<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Http\Requests\AnggotaRequest as Request;
use Illuminate\Http\Request as DRequest;

class AnggotaController extends Controller
{

    public $actionRoutes = 'anggota';
    public $title = 'Anggota';




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DRequest $r)
    {
        $q = "";
        $perPage = 5;
        $pageNum = 1;
        $eloquent = Anggota::query()->select(["id","nama","email"]);

        if($r->has('page')){
            $pageNum = $r->get('page');
        }

        if($r->has('query')){
            $q = $r->get('query');
            $eloquent->where('nama','like','%' . $q . '%')
                // ->OrWhere('alamat','like','%' . $q . '%')
                ->OrWhere('email','like','%' . $q . '%');
                // ->OrWhere('no_hp','like','%' . $q . '%');
        }
        if($r->has('perpage')){
            if($r->get('perpage').replace("/[a-z][A-Z]/",""))
            $perPage = $r->get('perpage');
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
        ->withouts(['id'])
        ->actions('anggota')
        ->get();

        
        return view('anggota.index',[
            'data' => $data,
            'title' => $this->title,
            'actionRoutes' => $this->actionRoutes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggota.create',[
            'actionRoutes' => $this->actionRoutes,
            'title' => $this->title,
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
        $data = [
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "no_hp" => $request->no_hp,
            "email" => $request->email,
        ];

        $data = new Anggota($data);

        if($data->save()){
            return redirect()->route($this->actionRoutes . '.show',['data' => $data->id])->with('success','Anggota berhasil ditambahkan.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anggota  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $data)
    {

        return view('anggota.show',[
            'data' => $data,
            'title' => $this->title,
            'actionRoutes' => $this->actionRoutes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anggota  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $data)
    {
        return view('anggota.edit',[
            'data' => $data,
            'title' => $this->title,
            'actionRoutes' => $this->actionRoutes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anggota  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggota $data)
    {
        if($data->update($request->all())){
            return redirect()->route($this->actionRoutes . '.show',['data' => $data]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anggota  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggota $data)
    {
        // DB::beginTransaction();
        // try{
            if($data->delete()){
                return redirect()->route($this->actionRoutes . '.index')->with('success','Data berhasil dihapus');
            }

        // }catch(\Exception $e){
        //         return redirect()->route($this->actionRoutes . '.index')->with('error','Data gagal dihapus');
        // }
    }
}
