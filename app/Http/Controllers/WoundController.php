<?php

namespace App\Http\Controllers;

use App\Progress;
use App\Wound;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Events\ReceiveWoundImage;

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

        if($request->is('admin/*')){
            return redirect('admin/case/'.$wound->case_id);

        }elseif ($request->is('doctor/*')){
            return redirect('doctor/case/'.$wound->case_id);

        }else{
            return response()->json(['msg' => 'url pattern not found']);
        }
    }

    public function edit($id)
    {
        $wound = Wound::findOrFail($id);

        return view('wound.edit', ['wound' => $wound, 'case_id' => $wound->case_id]);
    }

    public function update(Request $request, $id)
    {
        $wound = Wound::findOrFail($id);
        $wound->case_id = $request->get('case_id');
        $wound->site = $request->get('site');

        if($request->hasFile('original_image')){
            $image = $this->storeImage($request->file('original_image'), 'profile');
            $wound->original_image = $image->id;
        }

        $wound->save();

        if($request->is('admin/*')){
            return redirect('admin/case/'.$wound->case_id);

        }elseif ($request->is('doctor/*')){
            return redirect('doctor/case/'.$wound->case_id);

        }else{
            return response()->json(['msg' => 'url pattern not found']);
        }

    }

    public function destroy(Request $request, $id)
    {
        $wound = Wound::findOrFail($id);
        $case_id = $wound->case_id;

        $wound->delete();

        if($request->is('admin/*')){
            return redirect('admin/case/'.$case_id);

        }elseif ($request->is('doctor/*')){
            return redirect('doctor/case/'.$case_id);

        }else{
            return response()->json(['msg' => 'url pattern not found']);
        }
    }

    public function progress($id)
    {
        $progress = Progress::findOrFail($id);
        return view('progress.show', [
            'p' => $progress
        ]);
    }

    public function createProgress($id)
    {
        return view('progress.create', ['wound_id' => $id]);
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
            $progress = Progress::create($progress);

            // Broadcast notification to doctor
            #broadcast(new ReceiveWoundImage($progress))->toOthers();

            #return response()->json(['msg' => 'success']);

            if(env('APP_ENV','local') == 'production'){
                $root_path = '/var/www/html/WoundCare/';

                system('python3 '. $root_path .'public/identify_contour.py --image '. $root_path .'storage/app/'.$image->name. ' --width 0.9');
            }

            return view('patient.contour', ['progress' => $progress]);
        }else{
            return response()->json(['msg' => 'wound image not found']);
        }
    }

    public function editProgress($id)
    {
        
    }

    public function updateProgress(Request $request, $id)
    {
        
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

        broadcast(new ReceiveWoundImage($progress))->toOthers();

        return redirect()->action('WoundController@progress', [
            'id' => $progress->id
        ]);
    }

    public function selectContour(Request $request)
    {

    }
}
