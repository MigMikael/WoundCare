@extends('layouts.app')

@section('content')
    <div class="container container-first">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h1><b>{{ $c->patient->name }}</b></h1>
                    </div>

                    <div class="panel-body">
                        <div class="col-md-3">
                            <img class="img-responsive img-thumbnail profile-img" src="{{ url('image/show/'.$c->patient->profile_image) }}" alt="">
                        </div>
                        <div class="col-md-5">
                            <h2>
                                สถานะ :
                                @if($c->status == 'Healing')
                                    <span class="label label-warning">{{ $c->status }}</span>
                                @elseif($c->status == 'Closed')
                                    <span class="label label-default">{{ $c->status }}</span>
                                @endif
                            </h2>
                            <h3>รหัสเคส : {{ $c->id }}</h3>
                            <hr>
                            <p>
                                <b>โทรศัพท์</b> : {{ $c->patient->phone_number }}
                            </p>
                            <p>
                                <b>ที่อยู่</b> : {{ $c->patient->address }}
                            </p>
                            <p>
                                <b>แพทย์ผู้รับผิดชอบ</b> : <a href="">{{ $c->doctor->name }}</a>
                            </p>
                            <br>
                        </div>
                        <div class="col-md-4" style="background: rgba(0, 0, 0, 0.05); padding: 2%">
                            <h4>
                                <b>นัดหมายครั้งต่อไป</b>
                            </h4>
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

        <div class="well">
            <h1>
                <b>บาดแผล</b>
                @if(Request::is('admin/*'))
                    <a class="btn btn-primary" href="{{ url('admin/wound/create/'.$c->id) }}">
                        <i class="fa fa-plus"></i>
                    </a>
                @elseif(Request::is('doctor/*'))
                    <a class="btn btn-primary" href="{{ url('doctor/wound/create/'.$c->id) }}">
                        <i class="fa fa-plus"></i>
                    </a>
                @endif
            </h1>
        </div>

        <div class="row col-md-12" style="padding-bottom: 10px">
            @foreach($c->wounds as $wound)
                @include('wound._card')
            @endforeach
        </div>
    </div>
@endsection