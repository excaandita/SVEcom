<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $carts = Cart::with(['product.galleries', 'user'])
                ->where('users_id', Auth::user()->id)
                ->get();
        return view('pages.cart', [
            'carts' => $carts,
        ]);
    }

    public function delete(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);

        $cart->delete();
        return redirect()->route('cart');
    }

    public function success() {
        return view('pages.success');
    }
<<<<<<< Updated upstream
=======

    public function updateQuantity(Request $request, Cart $cart) // fungsi untuk mengupdate jumlah produk pada cart
    {
        // Cek berapa stock produk
        $stok_produk = Product::find($cart->products_id)->stock;

        // Cek apa jumlah kurang dari sama dengan stok produk
        if ($request->quantity <= $stok_produk) {
            // Jika jumlah kurang dari sama dengan stok produk, maka update jumlah produk
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back();
        } else {
            // Jika jumlah lebih dari stok produk, maka tampilkan pesan error
            return redirect()->back()->with('error', 'Jumlah produk pada cart melebihi stok');
        }
    }

    public function cekOngkir(Request $request, $regencies_id) {
        // Menghitung berapa jumlah toko dalam cart
        $jumlah_toko = DB::table('carts')
            ->where('carts.users_id', Auth::user()->id)
            ->join('products', 'carts.products_id', '=', 'products.id') // buat join tabel produk sm carts fk di tabel carts pk di tabel produk
            ->selectRaw('count(products.users_id)') //hitung jumlah users produknya ada brp users
            ->groupBy('products.users_id') // fungsinya klo masukin produk yg sama dri toko yg sama digroup gt ga dipisah jadi cuma ditambah qty nya
            ->get()->count();

        // Menghitung ongkos kirim
        $cost = RajaOngkir::ongkosKirim([
            'origin' => 445, // regency id kota surakarta
            'destination' => $regencies_id, // regency id kota pembeli
            'weight' => 1000, // berat dalam gram
            'courier' => 'jne' // kurir pengiriman
        ]);

        $ongkir = $cost->result[0]['costs'][1]['cost'][0]['value']; // mengambil ongkos kirim dari hasil pengambilan data dari RajaOngkir (JNE Reguler)

        return $ongkir * $jumlah_toko; // menghitung total ongkos kirim
    }
>>>>>>> Stashed changes
}
