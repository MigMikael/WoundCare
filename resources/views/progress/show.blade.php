@extends('layouts.app')

@section('content')
    <div class="container container-first">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>
                        <b>
                            <a href="{{ url('/doctor/case/'.$p->wound->cases->id) }}">
                                {{ $p->wound->cases->patient->name }}
                            </a> >
                            <a href="{{ url('/doctor/wound/'.$p->wound->id) }}">
                                แผลที่ {{ $p->wound->id }}
                            </a> >
                            วันที่ {{ explode(" ", $p->created_at)[0] }}
                            เวลา {{ explode(" ", $p->created_at)[1] }}
                        </b>
                    </h1>
                </div>
                <div class="panel-body">
                    <img class="img-responsive img-thumbnail profile-img" src="{{ url('image/show/'.$p->image) }}" alt="">
                    <hr>
                    <h3>
                        ขนาดแผล :
                        <b>{{ $p->area }}</b> cm<sup>2</sup>
                    </h3>
                    <hr>
                    <p>Comment : </p>
                    <div class="well">
                        {{ $p->comment }}
                    </div>
                    <p>Advice : </p>
                    <div class="well">
                        {{ $p->advice }}
                    </div>
                </div>
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
            </div>
        </div>
    </div>
@endsection