<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class DashboardSettingController extends Controller
{
    public function store() 
    {
        $user = Auth::user();
        $categories = Category::all();
        
        return view('pages.dashboard-settings',[
            'user' => $user,
            'categories' => $categories,
        ]);
    }

    public function account() 
    {
        $user = Auth::user();

        return view('pages.dashboard-account', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();

        $item->update($data);

        if($request->store_status==0){
            $carts = DB::table('carts')
            ->join('product', 'carts.products_id','=', 'products.id')
            ->select('product.*','carts.*')
            ->where('products.users_id','=', Auth::user()->id);

            $carts->delete();
        }
        
        return redirect()->route($redirect);
    }
}
