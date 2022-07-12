<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $products = Product::with(['galleries', 'user'])->latest()->where('users_id', $id)->get();
        $bestSellerProducts = Product::where('users_id', $id) //intinya biar dapat produk berdasarkan id
            ->withCount('transactiondetail') // buat ngitung total jumlah produk dari tabel transaksi detail
            ->orderBy('transactiondetail_count', 'DESC') // diurutin dari jumlah penjualan tergede. kalo mau diurutin dri penjualan paling kecil dignti ASC aja
            ->get();
        $totalProductSold = TransactionDetail::whereHas('product', function ($product) use ($id) { //query buat dapetin produk dari transaksi detail yang produknya sendiri dicari berdasarkan id yg dipilih
            $product->where('users_id', $id); //ngambil produk berdasarkan user id yg dipilih
        })->count();
        
        return view('pages.profile',[
            'users' => $users,
            'products_count' => $products->count(),
            'products' => $products,
            'sellTransactions' => $sellTransactions->count(),
            'bestSellerProducts' => $bestSellerProducts,
            'totalProductSold'=>$totalProductSold
        ]);
    }

    public function detail(Request $request, $slug)         //untuk mengambil produk seusai kategori yang diinginkan
    {
        
    }
}
