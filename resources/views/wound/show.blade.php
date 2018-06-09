@extends('layouts.app')

@section('content')
    <div class="container container-first">
        <div class="row" style="padding-bottom: 10px">
            <div class="well col-md-12">
                <div class="col-md-4">
                    <img class="img-responsive img-thumbnail profile-img" src="{{ url('image/show/'.$wound->original_image) }}" alt="">
                </div>
                <div class="col-md-8">
                    <h1>
                        <b>{{ $wound->cases->patient->name }} > แผลที่ {{ $wound->id }}</b>
                    </h1>
                    <hr>
                    <h3>
                        <b>บริเวณแผล</b> : {{ $wound->site }}
                    </h3>
                    <h4>
                        <b>สถานะแผล</b> :
                        <span class="label label-warning">{{ $wound->status }}</span>
                    </h4>
                    <p>
                        <b>รหัสเคส</b> : {{ $wound->cases->id }}
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="well" style="margin-bottom: 0">
                <h2>
                    <b>Healing Progress</b>
                    @if(Request::is('admin/*'))
                        <a href="{{ url('admin/wound/progress/create/'.$wound->id) }}" class="btn btn-primary">+</a>
                    @endif
                </h2>
            </div>
            <div class="timeline">
                @foreach($wound->progress->reverse() as $p)
                    <div class="timeline-block @if($loop->index % 2 == 0) timeline-block-right @else timeline-block-left @endif">
                        <div class="marker"></div>
                        <div class="well timeline-content" style="padding: 20px 10px 20px 10px">
                            <h3 >
                                {{ $p->created_at }}
                                @if($p->status == 'Diagnosed')
                                <span class="label label-success">
                                    {{ $p->status }}
                                </span>
                                @else
                                <span class="label label-danger">
                                    {{ $p->status }}
                                </span>
                                @endif

                            </h3>
                            <hr>

                            <div class="col-md-6">
                                <img class="img-thumbnail img-responsive profile-img" src="{{ url('image/show/'.$p->image) }}">
                            </div>
                            <div class="col-md-6" style="text-align: left">
                                <h4>พื้นที่แผล <b>{{ $p->area }}</b> ตารางเซนติเมตร</h4>
                                <hr>
                                @if(Request::is('admin/*'))
                                    <a class="btn btn-default" href="{{ url('admin/wound/progress/'.$p->id) }}">
                                        Detail
                                    </a>
                                @elseif(Request::is('doctor/*'))
                                    <a class="btn btn-default" href="{{ url('doctor/wound/progress/'.$p->id) }}">
                                        Detail
                                    </a>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
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