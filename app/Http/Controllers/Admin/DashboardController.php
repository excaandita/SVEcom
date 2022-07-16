<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Skill;

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
        $done = Transaction::where('transaction_status', 'DONE')->count();
        $recentlytransaction=Transaction::orderBy('transactions.updated_at', 'desc')->join('users','users.id','transactions.users_id')->limit(3)->get();
        $portofoliobaru = Skill::where('status', 'pending')->count();
        $portofolioverifikasi = Skill::where('status', 'verified')->count();


        return view('pages.admin.dashboard', [
            'customer' => $customer,
            'revenue' => $revenue,
            'transaction' => $transaction,
            'pending' => $pending,
            'success' => $success,
            'canceled' => $canceled,
            'done' => $done,
            'recentlytransaction'=>$recentlytransaction,
            'portofoliobaru'=>$portofoliobaru,
            'portofolioverified' => $portofolioverifikasi,


        ]);
    }
}
