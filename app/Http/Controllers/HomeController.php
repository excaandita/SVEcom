<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Prodi;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user() != null && Auth::user()->roles == "MAHASISWA") {
            $users = Prodi::join('users', 'prodis.id', '=', 'users.prodis_id')->where('isPublic', 1)->get();
            $skills = null;
            return view('pages.portofolio', [
                'users' => $users,
                'skills' => $skills
            ]);
        }
        else {
            $categories = Category::take(6)->get();
            $products = Product::with(['galleries'])->latest()->take(8)->get();
            $sliders = Slider::take(3)->get();
    
            return view('pages.home',[
                'categories'=> $categories,
                'products' => $products,
                'sliders' => $sliders,
            ]);
        }
    }
}
