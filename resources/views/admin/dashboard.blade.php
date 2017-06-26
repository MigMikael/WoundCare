@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Doctor
                </div>
                <div class="panel-body">

                </div>
                <div class="panel-footer">
                    <a class="btn btn-primary" href="{{ url('doctor/create') }}">Create</a>
                </div>
            </div>
        </div>
    </div>
@endsection