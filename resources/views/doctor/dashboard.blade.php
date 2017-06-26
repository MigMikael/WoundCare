@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>
                            Cases
                            <a class="btn btn-primary btn-lg" href="{{ url('patient/create') }}">
                                <i class="fa fa-plus"></i>
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        @foreach($doctor->cases as $c)
            <div class="row">
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
                            <div class="col-md-4" style="background: rgba(0, 0, 0, 0.05)">
                                <h4>Next Appointment</h4>
                                <hr>
                                <h1>{{ $c->next_appointment }}</h1>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <a class="btn btn-primary btn-lg" href="{{ url('cases/'.$c->id) }}">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection