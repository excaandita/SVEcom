<?php

namespace App\Http\Controllers\Buyer;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TransactionDetail;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = User::count();
        $revenue = Transaction::sum('total_price');
        $transaction = Transaction::count();
        // $recentlytransaction = Transaction::orderBy('transaction_details.updated_at', 'desc')->join('transactions', 'transactions.id', 'transaction_details.transactions_id')->join('products', 'products.id', 'transactions.users_id')->limit(3)->get();
        $recentlytransaction = Transaction::orderBy('transactions.updated_at', 'desc')
        ->join('transaction_details','transaction_details.transactions_id','transactions.id')
        ->join('products', 'products.id', 'transaction_details.products_id')
        ->join('product_galleries','product_galleries.id','products.id')
        ->join('users','users.id','products.users_id')
        ->select('*','users.name as store_name','products.name as products_name')
        ->get();
        // dd($recentlytransaction);

        return view('pages.buyer.dashboard', [
            'customer' => $customer,
            'revenue' => $revenue,
            'transaction' => $transaction,
            'recentlytransaction' => $recentlytransaction,

        ]);
    }
}