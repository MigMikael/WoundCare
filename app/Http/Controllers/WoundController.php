<?php

namespace App\Http\Controllers;

use App\Progress;
use App\Wound;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class WoundController extends Controller
{
    use ImageTrait;

    public function show($id)
    {
        $wound = Wound::findOrFail($id);
        return view('wound.show', ['wound' => $wound]);
    }

    public function create($id)
    {
        return view('wound.create', ['case_id' => $id]);
    }

    public function store(Request $request)
    {
        $image = $this->storeImage($request->file('original_image'), 'profile');

        $wound = [
            'case_id' => $request->get('case_id'),
            'site' => $request->get('site'),
            'status' => 'Healing',
            'original_image' => $image->id
        ];
        $wound = Wound::create($wound);

        return redirect()->route('case.show', ['id' => $wound->case_id]);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }

    public function progress($id)
    {
        $progress = Progress::findOrFail($id);
        return view('progress.show', [
            'p' => $progress
        ]);
    }

    public function createProgress()
    {
        return view('progress.create');
    }
}
