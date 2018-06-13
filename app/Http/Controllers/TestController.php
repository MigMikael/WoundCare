<?php

namespace App\Http\Controllers;
use App\Progress;
use App\Events\ReceiveWoundImage;
use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        return view('test');
    }

    public function send()
    {
        $progress = [
            'wound_id' => 2,
            'image' => 22,
            'area' => 444,
            'status' => 'Waiting'
        ];
        $progress = Progress::create($progress);

        $user = \Auth::user();

        broadcast(new ReceiveWoundImage($progress, $user))->toOthers();

        return "Event has been sent! ". $progress->id;
    }

    public function testUpload()
    {
        return view('upload');
    }

    public function fileUpload(Request $request)
    {
        $this->validate($request, [
            'input_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('input_img')) {
            $image = $request->file('input_img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);

            return back()->with('success','Image Upload successfully');
        }
    }
}
