<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skill;
use App\Models\SkillGallery;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\Admin\SkillGalleryRequest;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class SkillGalleryController extends Controller
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
            $query = SkillGallery::with(['skill']);

            return DataTablesDataTables::of($query)
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
                                    <form action="'. route('product-gallery.destroy', $item->id) .'" method="POST">
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
                ->editColumn('photos', function($item){ //nama fungsinya adalah editColum mau ngedit kolom yang udah ada yaitu photo(buat nampilin foto dari url img)
                    return $item->photos ? '<img src="'. Storage::url($item->photos) .'" style="max-height: 80px" />' : ''; //dikembalikan dalam bentuk url dibuat menggunakan ternary function
                //ngecek ada foto apa ga, kalo ada munculin gambar klo gada kosongan
                    //disimpan img src, memanggil url storage dari foto itu sndiri
                })
                ->rawColumns(['action','photos']) //kalo ga dikasi photos munculnya urlnya
                ->make();
        }

        return view('pages.admin.skill.index');
    }
}

