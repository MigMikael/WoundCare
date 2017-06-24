@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row well-lg">
            <h1>All Doctor</h1>
        </div>

        @foreach($doctors as $doctor)
        <div class="row" style="padding-bottom: 10px">
            <div class="well col-md-4 col-xs-4">
                <img src="{{ url('image/show/'.$doctor->profile_image) }}" class="img-responsive" alt="{{ $doctor->name }}">
            </div>
            <div class="col-md-8 col-xs-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>{{ $doctor->name }}</h3>
                    </div>

                    <div class="panel-body">
                        <p><b>เชี่ยวชาญ :</b>{{ $doctor->expert }}</p>
                    </div>
                </div>
            </div>

            @foreach($doctor->cases as $c)
                <div class="well col-md-12 col-xs-12">
                    Next Appointment : {{ $c->next_appointment }}
                </div>
            @endforeach
        </div>
        @endforeach
    </div>
@endsection