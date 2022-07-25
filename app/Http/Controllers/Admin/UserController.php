<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\Admin\UserRequest;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            //query datatable
            $query = User::query();

            return DataTablesDataTables::of($query) //bentuk json buat balikin data dataable
                ->addColumn('action', function($item){
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-info dropdown=toggle mr-1 mb-1"
                                        type="button"
                                        data-toggle="dropdown">
                                        Aksi
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="' . route('user.edit', $item->id) .'">
                                        Edit
                                    </a>
                                    <form action="'. route('user.destroy', $item->id) .'" method="POST">
                                        '. method_field('delete').  csrf_field() .'
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ';
                })
                ->addColumn('suspend', function($item){
                   
                    if($item->is_active == '1' ){
                        $bt ='
                            <a class="btn btn-success" href="' . route('update-active', ['id' => $item->id, 'status_code' => 0] ) .'">
                                AKTIF
                            </a>';
                    } else {
                        $bt ='
                            <a class="btn btn-danger" href="' . route('update-active',['id' => $item->id, 'status_code' => 1] ) .'">
                                TIDAK AKTIF
                            </a>';
                    }
                    return $bt;
                })
                ->rawColumns(['action', 'suspend'])
                ->make();
        }

        return view('pages.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();

        $data['password'] = bcrypt($request->password); //dipake laravel untuk membuat password ambil dari library laravel. di enksripsi biar ga kebaca .menggunakan bcrypt karena lebih kuat daripda md5 (md5 mengenkripsi hingga 32 ) sedangkan bcrypt 60 

        User::create($data);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::findOrFail($id); // buat manggil modelnya. findor fail itu fungsinya buat manggil datanya kalo bmisal ga ketmu id yang diminta nampilin 404

        return view('pages.admin.user.edit',[
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $data = $request->all(); //variable data isinya semua data yang masuk

        $item = User::findOrFail($id);
        
        if($request->password) // jika ada password
        {
            $data['password'] = bcrypt($request->password); //maka data password = di bcrypt
        } 
        else  
        {
            unset($data['password']); //kosongin datanya
        }

        $item->update($data);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id); // buat manggil datanya
        $item->delete();

        return redirect()->route('user.index');
    }

    public function updateActive($id, $status_code)
    {
        $item = User::findOrFail($id);
        $item->update([
            'is_active' => $status_code
        ]);

        return redirect()->route('user.index');
    }
}

