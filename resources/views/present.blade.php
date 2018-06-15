@extends('layouts.app')

@section('content')
    <div class="well col-md-12">
        <div class="col-md-12 text-center" style="padding: 5px">
            <h2>ภาพผู้ป่วย</h2>
        </div>
        <div class="col-md-12" style="padding: 5px">
            <img src="{{ url('image/show/'.$image->id) }}" class="img-responsive" style="width: 100%">
        </div>
    </div>
    <div class="well col-md-12">
        <div class="col-md-12 text-center" style="padding: 5px">
            <h2>บริเวณแผลที่จำแนกโดย AI</h2>
        </div>
        <div class="col-md-6" style="padding: 5px">
            <img src="{{ url('/img/alpha'.$image->id.'.png') }}" class="img-responsive" style="width: 100%">
        </div>
        <div class="col-md-6" style="padding: 5px">
            <img src="{{ url('/img/predict'.$image->id.'.png') }}" class="img-responsive" style="width: 100%">
        </div>
    </div>
@endsection