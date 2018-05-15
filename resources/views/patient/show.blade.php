@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="padding-bottom: 10px">
            <div class="well col-md-2 col-xs-4">
                <img src="{{ url('image/show/'.$patient->profile_image) }}" class="img-responsive" alt="{{ $patient->name }}">
            </div>
            <div class="col-md-10 col-xs-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>{{ $patient->name }}</h2>
                    </div>

                    <div class="panel-body">
                        <div class="col-md-8">
                            <p><b>เพศ : </b>{{ $patient->gender }}</p>
                            <p><b>เกิด : </b>{{ $patient->birthday }}</p>
                            <p><b>ที่อยู่ : </b>{{ $patient->address }}</p>
                            <p><b>โทรศัพท์ : </b>{{ $patient->phone_number }}</p>
                            <p><b>โรคประจำตัว : </b>{{ $patient->congenital_disease }}</p>
                            <p><b>ประวัติการแพ้ : </b>{{ $patient->allergic }}</p>
                        </div>
                        <div class="col-md-4">
                            {!! QrCode::size(250)->generate($patient->token) !!}
                        </div>
                    </div>

                    <div class="panel-footer">
                        <a class="btn btn-primary" href="{{ url('cases/create/'.$patient->id) }}">
                            Add Case
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="well">
                <h3>Patient Case</h3>
            </div>
            @foreach($patient->cases as $c)
                <div class="well col-md-12">
                    <p>Disease : {{ $c->disease }}</p>
                    <p>Status : {{ $c->status }}</p>
                    <p>Appointment : {{ $c->next_appointment }}</p>
                    <hr>
                    @if(Request::is('admin/*'))
                        <a class="btn btn-primary" href="{{ url('admin/case/'.$c->id) }}">Detail</a>
                    @elseif(Request::is('doctor/*'))
                        <a class="btn btn-primary" href="{{ url('doctor/case/'.$c->id) }}">Detail</a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection