@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="padding-bottom: 10px">
            <div class="well col-md-12">
                <h1>Case ID : {{ $c->id }}</h1>
                <hr>
                <p>Disease : {{ $c->disease }}</p>
                <p>Status : {{ $c->status }}</p>
                <p>Appointment : {{ $c->next_appointment }}</p>
                <hr>
                <a class="btn btn-primary" href="{{ url('wound/create/'.$c->id) }}">Add Wound</a>
            </div>
        </div>


        <div class="row" style="padding-bottom: 10px">
            @foreach($c->wounds as $wound)
                <div class="well col-md-4">
                    <img class="img-responsive" src="{{ url('image/show/'.$wound->original_image) }}" alt="">
                    <br>
                    <p>บริเวณแผล : {{ $wound->site }}</p>
                    <p>สถานะแผล : {{ $wound->status }}</p>
                    <hr>
                    <a class="btn btn-primary" href="{{ url('wound/'.$wound->id) }}">Healing Progress</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection