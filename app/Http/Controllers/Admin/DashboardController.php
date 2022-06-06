<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;





class DashboardController extends Controller
{
    public function index()
    {
        $customer = User::count();
        $revenue = Transaction::count();
        $transaction = Transaction::sum('total_price');

        return view('pages.admin.dashboard', [
            'customer' => $customer,
            'revenue' => $revenue,
            'transaction' => $transaction,
            
        ]);
    }
}
