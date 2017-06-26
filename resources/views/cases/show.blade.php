@extends('layouts.app')

@section('content')
    <div class="container">

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
                            <p>Address : {{ $c->patient->address }}</p>
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

        <div class="panel panel-default">
            <div class="panel-body">
                <h1>
                    Wounds
                    <a class="btn btn-primary btn-lg" href="{{ url('wound/create/'.$c->id) }}">
                        <i class="fa fa-plus"></i>
                    </a>
                </h1>
            </div>
        </div>
        <div class="row col-md-12" style="padding-bottom: 10px">
            @foreach($c->wounds as $wound)
                <div class="col-md-4" style="padding: 0">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <button type="button" class="btn btn-default btn-sm btn-block" data-toggle="collapse" data-target="#wound{{$wound->id}}">
                                View
                            </button>
                            <div id="wound{{$wound->id}}" class="collapse">
                                <img class="img-responsive img-thumbnail" src="{{ url('image/show/'.$wound->original_image) }}" alt="">
                            </div>
                            <hr>
                            <p>บริเวณแผล : {{ $wound->site }}</p>
                            <p>สถานะแผล : {{ $wound->status }}</p>
                        </div>
                        <div class="panel-footer">
                            <a class="btn btn-primary" href="{{ url('wound/'.$wound->id) }}">Healing Progress</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection