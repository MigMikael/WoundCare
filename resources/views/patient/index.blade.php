@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row well-lg">
            <h1>All Patient</h1>
        </div>

        @foreach($patients as $patient)
            <div class="row" style="padding-bottom: 10px">
                <div class="well col-md-2 col-xs-4">
                    <img src="{{ url('image/show/'.$patient->profile_image) }}" class="img-responsive" alt="{{ $patient->name }}">
                </div>
                <div class="col-md-10 col-xs-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>{{ $patient->name }}</h3>
                        </div>

                        <div class="panel-body">
                            <p><b>เพศ : </b>{{ $patient->gender }}</p>
                        </div>

                        <div class="panel-footer">
                            <a class="btn btn-primary" href="{{ url('patient/'.$patient->id) }}">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection