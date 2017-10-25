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

    public function create(Request $request, $id)
    {
        if($request->is('admin/*')){
            return view('wound.create', [
                'case_id' => $id,
                'url' => 'admin/wound'
            ]);
        }elseif ($request->is('doctor/*')){
            return view('wound.create', [
                'case_id' => $id,
                'url' => 'doctor/wound'
            ]);
        }else{
            return response()->json(['msg' => 'url pattern not found']);
        }
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

    public function storeProgress(Request $request)
    {
        $wound_id = $request->get('wound_id');
        $wound = Wound::findOrFail($wound_id);

        if($request->hasFile('wound_image')){
            $image = $this->storeImage($request->file('wound_image'), 'profile');
            $progress = [
                'wound_id' => $wound->id,
                'image' => $image->id,
                'area' => 5555,
                'status' => 'Waiting'
            ];
            Progress::create($progress);
            return response()->json(['msg' => 'success']);

        }else{
            return response()->json(['msg' => 'wound image not found']);
        }
    }

    public function diagnoseProgress($id){
        $progress = Progress::findOrFail($id);
        return view('progress.edit',[
            'progress' => $progress
        ]);
    }

    public function storeDiagnose(Request $request, $id){
        $progress = Progress::findOrFail($id);

        $progress->comment = $request->get('comment');
        $progress->advice = $request->get('advice');
        $progress->status = 'Diagnosed';

        $progress->save();

        return redirect()->action('WoundController@progress', [
            'id' => $progress->id
        ]);
    }
}
