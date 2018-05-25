@extends('layouts.app')

@section('content')
    <div class="container container-first">
        @if(session('status'))
            <div class="alert alert-success">
                <strong> {{ session('status') }}</strong>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h2>
                            Waiting Cases
                            <a class="btn btn-primary" href="{{ url('doctor/patient/create') }}">
                                <i class="fa fa-plus"></i>
                            </a>
                        </h2>
                    </div>
                </div>
            </div>
            @foreach($doctor->waiting_cases as $c)
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>CaseID : <b>{{ $c->id }}</b></h3>
                        </div>

                        <div class="panel-body">
                            <div class="col-md-3">
                                <img src="{{ url('image/show/'.$c->patient->profile_image) }}" class="img-responsive img-thumbnail profile-img" alt="{{ $c->patient->name }}">
                            </div>
                            <div class="col-md-5">
                                <h3>{{ $c->patient->name }}</h3>
                                <p>Tel : {{ $c->patient->phone_number }}</p>
                                <h4>Disease : <b>{{ $c->disease }}</b></h4>
                                <h4>
                                    Status : <span class="label label-warning">{{ $c->status }}</span>
                                </h4>
                            </div>
                            <div class="col-md-4" style="padding: 2%;background: rgba(0, 0, 0, 0.05)">
                                <h4>Next Appointment</h4>
                                <hr>
                                <h1>{{ $c->next_appointment }}</h1>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <a class="btn btn-primary btn-lg" href="{{ url('doctor/case/'.$c->id) }}">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Diagnosed Cases
                            <span class="label label-default">
                            {{ sizeof($doctor->diagnosed_cases) }}
                            </span>
                        </h2>
                    </div>
                </div>
            </div>

            @foreach($doctor->diagnosed_cases as $c)
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>CaseID : <b>{{ $c->id }}</b></h3>
                        </div>

                        <div class="panel-body">
                            <div class="col-md-3">
                                <img src="{{ url('image/show/'.$c->patient->profile_image) }}" class="img-responsive img-thumbnail profile-img" alt="{{ $c->patient->name }}">
                            </div>
                            <div class="col-md-5">
                                <h3>{{ $c->patient->name }}</h3>
                                <p>Tel : {{ $c->patient->phone_number }}</p>
                                <h4>Disease : <b>{{ $c->disease }}</b></h4>
                                <h4>
                                    Status : <span class="label label-warning">{{ $c->status }}</span>
                                </h4>
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
                            <a class="btn btn-default" href="{{ url('doctor/patient/'.$c->patient->id) }}">
                                Patient
                            </a>
                            <a class="btn btn-primary" href="{{ url('doctor/case/'.$c->id) }}">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection