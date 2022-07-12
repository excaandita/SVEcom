<?php

namespace App\Http\Controllers\Portofolio;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ExperiencesController extends Controller
{
    public function index()
    {
        $experiences = Experience::where('users_id', Auth::user()->id)->get();
        return view('pages.portofolio.experiences', [
            'experiences' => $experiences
        ]);
    }

    public function detail(Request $request)
    {
        $experience = Experience::where('id', $request->id)->first();

        return view('pages.portofolio.experience-detail', [
            'experience' => $experience
        ]);
    }

    public function create(){
        $user = Auth::user();
        $jabatans = Jabatan::all();
         return view('pages.portofolio.experiences-create', [
            'user' => $user,
            'jabatans'=>$jabatans
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->all();

        $experiences = Experience::create($data);

        return redirect()->route('dashboard-experiences');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Experience::findOrFail($id);
        $users = User::all();
        $jabatans = Jabatan::all();
        return view('pages.portofolio.experiences-edit',[
            'item' => $item,
            'users' => $users,
            'jabatans' => $jabatans,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Experience::findOrFail($id);

        $item->update($data);

        return redirect()->route('dashboard-experiences');
    }
    public function destroy($id)
    {
        $item = Experience::findOrFail($id);
        $item->delete();

        return redirect()->route('transaction.index');
    }

}
