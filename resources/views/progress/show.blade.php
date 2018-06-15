@extends('layouts.app')

@section('content')
    <div class="container container-first">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 style="display: inline-block">
                        <b>
                        @if(Request::is('doctor/*'))
                            <a href="{{ url('/doctor/case/'.$p->wound->cases->id) }}">
                                {{ $p->wound->cases->patient->name }}
                            </a> >
                        @elseif(Request::is('patient/*'))
                            <a href="{{ url('/patient/dashboard') }}">
                                {{ $p->wound->cases->patient->name }}
                            </a> >
                        @endif
                        </b>
                    </h1>

                    <h1 style="display: inline-block">
                        <b>
                        @if(Request::is('doctor/*'))
                            <a href="{{ url('/doctor/wound/'.$p->wound->id) }}">
                                แผลที่ {{ $p->wound->id }}
                            </a> >
                        @elseif(Request::is('patient/*'))
                            <a href="{{ url('/patient/wound/'.$p->wound->id) }}">
                                แผลที่ {{ $p->wound->id }}
                            </a> >
                        @endif
                        </b>
                    </h1>
                    <h1 style="display: inline-block">
                        <b>
                            วันที่ {{ explode(" ", $p->created_at)[0] }}
                        </b>
                    </h1>
                    <h1 style="display: inline-block">
                        <b>
                            เวลา {{ explode(" ", $p->created_at)[1] }}
                        </b>
                    </h1>
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <img class="img-responsive img-thumbnail large-img" src="{{ url('image/show/'.$p->image) }}" alt="">
                    </div>
                    <div class="col-md-6 text-center" style="color: #000000">
                        <h1>
                            ขนาดแผล :
                            <b>{{ $p->area }}</b> cm<sup>2</sup>
                        </h1>
                    </div>
                    <div class="col-md-12">
                        <br>
                    </div>
                    <div class="col-md-12" style="color: #000000">
                        <h2>Comment : </h2>
                        <div class="well">
                            <h3 style="font-size: larger">{{ $p->comment }}</h3>
                        </div>
                        <h2>คำแนะนำ : </h2>
                        <div class="well">
                            <h3 style="font-size: larger">{{ $p->advice }}</h3>
                        </div>
                    </div>
                </div>
                @if(Request::is('doctor/*'))
                <div class="panel-footer">
                    @if($p->status == 'Diagnosed')
                        <a class="btn btn-primary" href="{{ url('doctor/wound/progress/'.$p->id.'/diagnose') }}">
                            Edit Diagnose
                        </a>
                    @else
                        <a class="btn btn-primary" href="{{ url('doctor/wound/progress/'.$p->id.'/diagnose') }}">
                            Diagnose
                        </a>
                    @endif
                </div>
                @elseif(Request::is('patient/*'))

                @endif
            </div>
        </div>
    </div>
@endsection