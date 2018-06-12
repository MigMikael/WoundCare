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
                    <div class="col-md-4">
                        <img class="img-responsive img-thumbnail profile-img" src="{{ url('image/show/'.$p->image) }}" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2>
                            ขนาดแผล :
                            <b>{{ $p->area }}</b> cm<sup>2</sup>
                        </h2>
                    </div>
                    <div class="col-md-12">
                        <br>
                    </div>
                    <div class="col-md-12">
                        <p>Comment : </p>
                        <div class="well">
                            <p style="font-size: larger">{{ $p->comment }}</p>
                        </div>
                        <p>คำแนะนำ : </p>
                        <div class="well">
                            <p style="font-size: larger">{{ $p->advice }}</p>
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