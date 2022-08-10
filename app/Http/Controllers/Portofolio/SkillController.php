<?php

namespace App\Http\Controllers\Portofolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::where('users_id', Auth::user()->id)->get();
        return view('pages.portofolio.skills', [
            'skills' => $skills
        ]);
    }

    public function uploadGallery(Request $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/skill', 'public');

        SkillGallery::create($data);

        return redirect()->route('dashboard-product-details', $request->products_id);
    }

    public function create()
    {
        return view('pages.portofolio.skill-create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis' => 'string|max:255',
            'no_sertifikat' => 'string|max:255',
            'lembaga' => 'string|max:255',
            'tanggal' => 'date',
            'tanggal_expired' => 'date|nullable',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $data = $request->all();
        $data['path_url_photo'] = $request->file('photo')->store('assets/skill', 'public');
        // $skill = Skill::create($request->toArray());
        Skill::create($data);

        return redirect()->route('portofolio-skills');
    }
    public function destroy($id)
    {
        $item = Skill::findOrFail($id);
        $item->delete();

        return redirect()->route('portofolio-skills');
    }
}
