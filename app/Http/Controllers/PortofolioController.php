<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Kepanitiaan;
use App\Models\Organisasi;
use App\Models\Pendidikan;
use App\Models\Prodi;
use App\Models\Project;
use App\Models\Skill;
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
        $prodi = Prodi::where('id', $user->prodis_id)->first();
        $kepanitiaans = Kepanitiaan::where('users_id', $request->id)->get();
        $organisasis = Organisasi::where('users_id', $request->id)->get();
        $pendidikans = Pendidikan::where('users_id', $request->id)->get();
        $experiences = Experience::where('users_id', $request->id)->get();
        $projects = Project::where('users_id', $request->id)->get();
        $skills = Skill::where('users_id', $request->id)->get();

        if($user == null) {
            return response(redirect(url('/')), 404);
        }
        return view('pages.portofolio-detail', [
            'user' => $user,
            'prodi' => $prodi,
            'kepanitiaans' => $kepanitiaans,
            'organisasis' => $organisasis,
            'pendidikans' => $pendidikans,
            'experiences' => $experiences,
            'projects' => $projects,
            'skills' => $skills,
        ]);
    }
}
