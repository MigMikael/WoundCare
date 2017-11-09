<?php

namespace App\Http\Controllers;
use App\Progress;
use App\Events\ReceiveWoundImage;
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

        broadcast(new ReceiveWoundImage($progress))->toOthers();

        return "Event has been sent! ". $progress->id;
    }
}
