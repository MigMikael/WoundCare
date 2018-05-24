@extends('layouts.app')

@section('content')
    <div class="container container-first text-center">
        <div class="col-md-6 col-md-offset-3">
            <div class="well" style="margin-bottom: 5px">
                <img class="img-responsive img-thumbnail profile-img" src="{{ url('image/show/'.$doctor->profile_image) }}" alt="">
            </div>
            <div class="panel panel-default">
                <div class="panel-heading heading-center">
                    <h1>{{ $doctor->name }}</h1>
                </div>
                <div class="panel-body">

                    <p>Email : {{ $doctor->user->email }}</p>
                    <p>Expert : {{ $doctor->expert }}</p>
                </div>
                <div class="panel-footer footer-center">
                    <a href="" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection