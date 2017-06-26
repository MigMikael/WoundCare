@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="padding-bottom: 10px">
            <div class="well col-md-12">
                <div class="col-md-4">
                    <img class="img-responsive" src="{{ url('image/show/'.$wound->original_image) }}" alt="">
                </div>
                <div class="col-md-8">
                    <h2>Case : {{ $wound->cases->id }}</h2>
                    <hr>
                    <p>บริเวณแผล : {{ $wound->site }}</p>
                    <p>สถานะแผล : {{ $wound->status }}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="well" style="margin-bottom: 0">
                <h3>Healing Progress</h3>
            </div>
            <div class="timeline">
                @foreach($wound->progress as $p)
                    <div class="timeline-block @if($loop->index % 2 == 0) timeline-block-right @else timeline-block-left @endif">
                        <div class="marker"></div>
                        <div class="well timeline-content" style="padding: 20px 10px 20px 10px">
                            <h3>{{ $p->created_at }}</h3>
                            <hr>

                            <div class="col-md-6">
                                <img class="img-thumbnail img-responsive" src="{{ url('image/show/'.$p->image) }}">
                            </div>
                            <div class="col-md-6" style="text-align: left">
                                <h4>Area : {{ $p->area }}</h4>
                                <a class="btn btn-primary" href="">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <div class="timeline-block timeline-block-right">
                        <div class="marker"></div>
                        <div class="timeline-content well">
                            <h3>Start</h3>
                        </div>
                    </div>
            </div>


            {{--@foreach($wound->progress as $p)
            <div class="col-md-2 hidden-xs" style="margin: 0;padding: 0">
                @if($loop->first)
                    <img class="img-responsive img-thumbnail" src="{{ URL::asset('images/start2.png') }}" alt="">
                @elseif($loop->last)
                    <img class="img-responsive img-thumbnail" src="{{ URL::asset('images/end1.png') }}" alt="">
                @else
                    <img class="img-responsive img-thumbnail" src="{{ URL::asset('images/between1.png') }}" alt="">
                @endif
            </div>
            <div class="well col-md-10" style="margin: 0">
                <div class="col-md-4">
                    <img class="img-responsive" src="{{ url('image/show/'.$p->image) }}">
                </div>
                <div class="col-md-6">
                    <h4><b>{{ $p->created_at  }}</b></h4>
                    <hr>
                    <p>พื้นที่แผล : {{ $p->area }} ตร.ซม.</p>
                    <p>comment : {{ $p->comment }}</p>
                    <p>advice : {{ $p->advice }}</p>
                </div>
                <div class="col-md-2">
                    @if($p->status == 'Diagnosed')
                    <button class="btn btn-success btn-lg">
                        <i class="fa fa-check-circle"></i>
                    </button>
                    @else
                    <button class="btn btn-danger btn-lg">
                        <i class="fa fa-times-circle"></i>
                    </button>
                    @endif
                </div>
            </div>
            @endforeach--}}
        </div>
    </div>
@endsection