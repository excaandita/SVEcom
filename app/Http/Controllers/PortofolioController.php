<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('isPublic', 1)->get();
        return view('pages.portofolio', [
            'users' => $users,
        ]);
    }

    public function detail(Request $request)
    {
        $user = User::where('id', $request->id)->where('isPublic', 1)->first();

        if($user == null) {
            return response(redirect(url('/')), 404);
        }
        return view('pages.portofolio-detail', [
            'user' => $user,
        ]);
    }
}
