<?php

namespace App\Http\Controllers\Seller;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = User::count();
        $revenue = Transaction::sum('total_price');
        $transaction = Transaction::count();
        $pending = Transaction::where('transaction_status', 'PENDING')->count();
        $success = Transaction::where('transaction_status', 'SUCCESS')->count();
        $canceled = Transaction::where('transaction_status', 'CANCELLED')->count();
        $recentlytransaction=Transaction::orderBy('transactions.updated_at', 'desc')->join('users','users.id','transactions.users_id')->limit(3)->get();
        // $bestselling = DB::select("SELECT *, (select count(*) from transaction_details where products.id = transaction_details.products_id) AS count FROM products ORDER BY count DESC");
        $bestselling = DB::select("SELECT *,products.name as nama_produk, categories.name as nama_kategori, (select count(*) from transaction_details where products.id = transaction_details.products_id) AS count FROM products JOIN categories ON products.categories_id = categories.id
        ORDER BY count DESC;");
        // dd($bestselling);
        return view('pages.seller.dashboard', [
            'customer' => $customer,
            'revenue' => $revenue,
            'transaction' => $transaction,
            'pending' => $pending,
            'success' => $success,
            'canceled' => $canceled,
            'recentlytransaction'=>$recentlytransaction,
            'bestselling'=>$bestselling,

        ]);
    }
}
