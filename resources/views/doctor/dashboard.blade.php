@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('status'))
            <div class="alert alert-success">
                <strong> {{ session('status') }}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Waiting Cases
                            <span class="label label-danger">
                                {{ sizeof($doctor->waiting_cases) }}
                            </span>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a class="btn btn-primary btn-block" href="{{ url('doctor/patient/create') }}">
                            {{--<h3>Create</h3>--}}
                            <h3><i class="fa fa-plus"></i></h3>
                        </a>
                    </div>
                </div>
            </div>

            @foreach($doctor->waiting_cases as $c)
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>CaseID : <b>{{ $c->id }}</b></h2>
                    </div>

                    <div class="panel-body">
                        <div class="col-md-2">
                            <img class="img-responsive img-thumbnail" src="{{ url('image/show/'.$c->patient->profile_image) }}" alt="">
                        </div>
                        <div class="col-md-6">
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


        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>
                            Diagnosed Cases
                            <span class="label label-default">
                            {{ sizeof($doctor->diagnosed_cases) }}
                            </span>

                            {{--<a class="btn btn-primary btn-lg" href="{{ url('patient/create') }}">
                                <i class="fa fa-plus"></i>
                            </a>--}}
                        </h3>
                    </div>
                </div>
            </div>

            @foreach($doctor->diagnosed_cases as $c)
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>CaseID : <b>{{ $c->id }}</b></h2>
                        </div>

                        <div class="panel-body">
                            <div class="col-md-2">
                                <img class="img-responsive img-thumbnail" src="{{ url('image/show/'.$c->patient->profile_image) }}" alt="">
                            </div>
                            <div class="col-md-6">
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
                            <a class="btn btn-default btn-lg" href="{{ url('doctor/patient/'.$c->patient->id) }}">
                                Patient
                            </a>
                            <a class="btn btn-primary btn-lg" href="{{ url('doctor/case/'.$c->id) }}">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection