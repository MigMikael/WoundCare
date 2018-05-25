@extends('layouts.app')

@section('content')
    <div class="container container-first">
        <div class="row well" style="padding-bottom: 10px">
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="panel panel-success">
                        <div class="panel-body">
                            <img src="{{ url('image/show/'.$patient->profile_image) }}" class="img-responsive img-thumbnail profile-img" alt="{{ $patient->name }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel panel-success">
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
                            <div class="col-md-4" style="border: #0a602c solid 1px">
                                {!! QrCode::size(200)->generate($patient->token) !!}
                            </div>
                        </div>
                        @if(Request::is('admin/*'))
                            <div class="panel-footer">
                                <a class="btn btn-primary" href="{{ url('admin/case/create/') }}">
                                    Add Case
                                </a>
                            </div>
                        @elseif(Request::is('doctor/*'))
                            <div class="panel-footer">
                                <a class="btn btn-primary" href="{{ url('doctor/case/create/') }}">
                                    Add Case
                                </a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="well">
                <h3>Patient Case</h3>
            </div>
            @if(sizeof($patient->cases) > 0)
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
            @else
                <div class="well col-md-12 text-center">
                    <p>No Case</p>
                </div>
            @endif
        </div>
    </div>
@endsection