@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row col-md-12" style="padding-bottom: 10px">
            <div class="well col-md-4">
                <img src="{{ url('image/show/'.$doctor->profile_image) }}" class="img-responsive" alt="">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2><b>{{ $doctor->name }}</b></h2>
                    </div>
                    <div class="panel-body">
                        <h4>
                            <b>เชี่ยวชาญ</b> : {{ $doctor->expert }}
                        </h4>
                        <h4>
                            <b>เคสในความดูแล</b> : {{ $doctor->cases->count() }}
                        </h4>
                        <p>สถานะ :
                            <span class="label @if($doctor->status == 'enable')label-success @else label-danger @endif">
                                {{ $doctor->status }}
                            </span>
                        </p>
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-primary" href="">
                            Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

        </div>
    </div>
@endsection