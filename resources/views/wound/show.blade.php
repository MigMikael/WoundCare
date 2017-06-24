@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="padding-bottom: 10px">
            <div class="well col-md-12">
                <div class="col-md-4">
                    <img class="img-responsive" src="{{ url('image/show/'.$wound->original_image) }}" alt="">
                </div>
                <div class="col-md-8">
                    <p>บริเวณแผล : {{ $wound->site }}</p>
                    <p>สถานะแผล : {{ $wound->status }}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="well">
                <h3>Healing Progress</h3>
            </div>

            @foreach($wound->progress as $p)
            <div class="well col-md-12">
                <div class="col-md-4">
                    <img class="img-responsive" src="{{ url('image/show/'.$p->image) }}" alt="">
                </div>
                <div class="col-md-4">
                    <h4><b>{{ $p->created_at  }}</b></h4>
                    <hr>
                    <p>พื้นที่แผล : {{ $p->area }} ตร.ซม.</p>
                    <p>comment : {{ $p->comment }}</p>
                    <p>advice : {{ $p->advice }}</p>
                    <p>status : {{ $p->status }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection