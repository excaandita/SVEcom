<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class SertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) { //manggil data di dalam tabel
            $query = Skill::with(['user']); //untuk nampilin model skill yang berelasi dg user
            

            return DataTablesDataTables::of($query)
                ->addColumn('photo', function ($skill) {
                    $url = $skill->path_url_photo ? Storage::url($skill->path_url_photo) : ''; //untuk manggil photo di tabel skill
                    return '
                    <div>
                    <img src="' . $url . '" border="0" width="100" class="img img-fluid img-rounded" align="center" />
                    </div>
                ';
                })
                ->addColumn('action', function ($item) { //untuk buat button edit mengarah ke edit sertifikat
                    return '
                        <div>
                                    <a href="' . route('sertifikat.edit', $item->id) . '" class="btn btn-info"> 
                                        Edit
                                    </a>
                        </div>
                    ';
                })
                ->rawColumns(['action', 'photo'])
                ->make();
        }

        return view('pages.admin.sertifikat.index');
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Skill::findOrFail($id);

        return view('pages.admin.sertifikat.edit', [
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
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $skill = Skill::where('id', $id)->first();

        $skill['status'] = $request['status'];
        $skill['updated_at'] = Carbon::now();

        $skill->save();

        return redirect()->route('sertifikat.index');
    }
}
