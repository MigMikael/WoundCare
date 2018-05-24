@extends('layouts.app')

@section('content')
    <div class="container container-first">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h2>CaseID : <b>{{ $c->id }}</b></h2>
                    </div>

                    <div class="panel-body">
                        <div class="col-md-3">
                            <img class="img-responsive img-thumbnail profile-img" src="{{ url('image/show/'.$c->patient->profile_image) }}" alt="">
                        </div>
                        <div class="col-md-5">
                            <h3>{{ $c->patient->name }}</h3>
                            <p>Tel : {{ $c->patient->phone_number }}</p>
                            <p>Address : {{ $c->patient->address }}</p>
                            <p>
                                Doctor : <a href="">{{ $c->doctor->name }}</a>
                            </p>
                            <h4>
                                Status :
                                @if($c->status == 'Healing')
                                    <span class="label label-warning">{{ $c->status }}</span>
                                @elseif($c->status == 'Closed')
                                    <span class="label label-default">{{ $c->status }}</span>
                                @endif

                            </h4>
                            <br>
                        </div>
                        <div class="col-md-4" style="background: rgba(0, 0, 0, 0.05); padding: 2%">
                            <h4>Next Appointment</h4>
                            <hr>
                            <h3>
                                <b>{{ $c->next_appointment }}</b>
                            </h3>
                        </div>
                    </div>
                    <div class="panel-footer">
                        @if(Request::is('admin/*'))
                            <a href="{{ url('admin/case/'.$c->id.'/edit') }}" class="btn btn-warning">
                                Edit
                            </a>
                        @elseif(Request::is('doctor/*'))
                            @if($c->status == 'Healing')
                            <a href="{{ url('doctor/case/'.$c->id.'/status') }}" class="btn btn-danger">
                                Close Case
                            </a>
                            @elseif($c->status == 'Closed')
                            <a href="{{ url('doctor/case/'.$c->id.'/status') }}" class="btn btn-default">
                                Reopen Case
                            </a>
                            @endif
                            <a href="{{ url('doctor/case/'.$c->id.'/edit') }}" class="btn btn-warning">
                                Edit
                            </a>
                        @endif
                        <a class="btn btn-success" href="{{ url('doctor/case/'.$c->id) }}">
                            Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="well">
            <h3>
                Wounds
                @if(Request::is('admin/*'))
                    <a class="btn btn-primary" href="{{ url('admin/wound/create/'.$c->id) }}">
                        <i class="fa fa-plus"></i>
                    </a>
                @elseif(Request::is('doctor/*'))
                    <a class="btn btn-primary" href="{{ url('doctor/wound/create/'.$c->id) }}">
                        <i class="fa fa-plus"></i>
                    </a>
                @endif
            </h3>
        </div>

        <div class="row col-md-12" style="padding-bottom: 10px">
            @foreach($c->wounds as $wound)
                @include('wound._card')
            @endforeach
        </div>
    </div>
@endsection