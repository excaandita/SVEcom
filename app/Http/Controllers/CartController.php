<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()                     //index untuk menampilkan di halaman utama cart
    {                           
        // varible untuk menampilkan data di cart
        $carts = Cart::with(['product.galleries', 'user']) //megambil data relasi di bagian cart untuk product & user
                ->where('users_id', Auth::user()->id) //melihat cart bedasarkan user yang sedang aktif
                ->get();
        return view('pages.cart', [
            'carts' => $carts,
        ]);
    }

    public function delete(Request $request, $id)  //fungsi untuk mengahpus data cart 
    {
        $cart = Cart::findOrFail($id);          //mencari data dari cart berdasarkan idnya

        $cart->delete();            //mengahpus data cart padda id yang dicari diatas
        return redirect()->route('cart');
    }

    public function success() {
        return view('pages.success');
    }
}
