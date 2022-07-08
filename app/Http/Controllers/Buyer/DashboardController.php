<?php

namespace App\Http\Controllers\Buyer;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;





class DashboardController extends Controller
{
    public function index()
    {
        $customer = User::count();
        $revenue = Transaction::sum('total_price');
        $transaction = Transaction::count();

        return view('pages.buyer.dashboard', [
            'customer' => $customer,
            'revenue' => $revenue,
            'transaction' => $transaction,

        ]);
    }
}
