@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Diagnose</h1>
                </div>
                <div class="panel-body">
                    <img class="img-responsive" src="{{ url('image/show/'.$progress->image) }}" alt="">
                    <hr>
                    <h3>Area :
                        <b>{{ $progress->area }}</b> cm<sup>2</sup>
                    </h3>
                    <hr>
                    {!! Form::model($progress, ['url' => 'doctor/wound/progress/'.$progress->id.'/diagnose', 'method' =>'patch', 'class' => 'form-horizontal', 'files' => 'true']) !!}
                    @include('progress._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection