<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\UserModel as User;
use App\Http\Requests\UserRequest as Request;
use Illuminate\Http\Request as DRequest;

class UserController extends Controller
{
    public $actionRoutes = "user";
    public $title = "User";


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
        $eloquent = User::query();

        if($r->has('page')){
            $pageNum = $r->get('page');
        }

        if($r->has('query')){
            $q = $r->get('query');
            $eloquent->where('username','like','%' . $q . '%')
                ->OrWhere('nama','like','%' . $q . '%');
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
              ->withouts([
                'id',
                'password',
                'created_at',
                'updated_at',
              ])
              ->actions('user')
              ->get();
        
        return view('user.index',[
            'title' => $this->title,

            'data' => $data,
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
        return view('user.create',[
            'title' => $this->title,

            'actionRoutes' => $this->actionRoutes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *nama
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
    	"username" => $request->username ,
        "nama" => $request->nama ,
        "password" => Hash::make($request->password) ,
    	"role" => $request->role ,
        ];

        $data = new User($data);

        if($data->save()){
            return redirect()->route('user.show',['user' => $data->id])->with('success','User berhasil ditambahkan.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anggota  $data
     * @return \Illuminate\Http\Response
     */
    public function show(User $data)
    {
        return view('user.show',[
           
           'title' => $this->title,
            'data' => $data,
            'actionRoutes' => $this->actionRoutes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anggota  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(User $data)
    {
        return view('user.edit',[
           
           'title' => $this->title,
            'data' => $data,
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
    public function update(Request $request, User $data)
    {
        if($data->update($request->all())){
            return redirect()->route('user.show',['user' => $data]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anggota  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $data)
    {
        if($data->delete()){
            return redirect()->route('user.index');
        }
    }
}
